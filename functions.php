<?php

require_once dirname(__FILE__) . '/inc/search-route.php';
require_once dirname(__FILE__) . '/inc/template-tags.php';
require_once dirname(__FILE__) . '/inc/block-patterns.php';

//Enqueueing assets

add_action('wp_enqueue_scripts', 'dogger_enqueue_assets');

function dogger_enqueue_assets()
{
    wp_enqueue_style('swiper-core-css', get_theme_file_uri('/dist/swiper-bundle.min.css'), [], false, 'all');
    wp_enqueue_style('dogger_main_style', get_theme_file_uri('/dist/index.css'), [], filemtime(get_stylesheet_directory() . '/dist/index.css'), 'all');
    wp_enqueue_style('customgoogle_fonts', '//fonts.googleapis.com/css2?family=Paytone+One&family=Poppins:wght@300;400;500;600;700&display=swap');

    wp_enqueue_script('swiper-core-js', get_theme_file_uri('/dist/swiper-bundle.min.js'), [], false, true);
    wp_enqueue_script('font-awesome', '//kit.fontawesome.com/03d62932bb.js');
    wp_enqueue_script('dogger_main_js', get_theme_file_uri('/dist/index.js'), [], '1.0', true);

    // Remove Gutenberg Block Library CSS from loading on the front-end 
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_localize_script('dogger_main_js', 'doggerData', array(
        'root_url' => get_site_url()

    ));
}

//Adding feature setup
add_action('after_setup_theme', 'dogger_features');

function dogger_features()
{
    register_nav_menu('headerMenu', __('Header Menu'));
    register_nav_menu('footerMenu1', __('Footer Menu 1'));
    register_nav_menu('footerMenu2', __('Footer Menu 2'));
    add_theme_support('title');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script'));
    add_theme_support('widgets');
    add_theme_support('customize-selective-refresh-widgets');

    // Gutenberg theme support 
    /**
     * Some blocks in Gutenberg like tables, quotes, separator benefit from structural styles (margin, padding, border etc…)
     * They are applied visually only in the editor (back-end) but not on the front-end to avoid the risk of conflicts with the styles wanted in the theme.
     * If you want to display them on front to have a base to work with, in this case, you can add support for wp-block-styles, as done below.
     * @see Theme Styles.
     * @link https://make.wordpress.org/core/2018/06/05/whats-new-in-gutenberg-5th-june/, https://developer.wordpress.org/block-editor/developers/themes/theme-support/#default-block-styles
     */
    add_theme_support('wp-block-styles');

    /**
     * Some blocks such as the image block have the possibility to define
     * a “wide” or “full” alignment by adding the corresponding classname
     * to the block’s wrapper ( alignwide or alignfull ). A theme can opt-in for this feature by calling
     * add_theme_support( 'align-wide' ), like we have done below.
     *
     * @see Wide Alignment
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#wide-alignment
     */
    add_theme_support('align-wide');

    /**
     * Loads the editor styles in the Gutenberg editor.
     *
     * Editor Styles allow you to provide the CSS used by WordPress’ Visual Editor so that it can match the frontend styling.
     * If we don't add this, the editor styles will only load in the classic editor ( tiny mice )
     *
     * @see https://developer.wordpress.org/block-editor/developers/themes/theme-support/#editor-styles
     */
    add_theme_support('editor-styles');

    /**
     *
     * Path to our custom editor style.
     * It allows you to link a custom stylesheet file to the TinyMCE editor within the post edit screen.
     *
     * Since we are not passing any parameter to the function,
     * it will by default, link the editor-style.css file located directly under the current theme directory.
     * In our case since we are passing 'assets/build/css/editor.css' path it will use that.
     * You can change the name of the file or path and replace the path here.
     *
     * @see add_editor_style(
     * @link https://developer.wordpress.org/reference/functions/add_editor_style/
     */
    add_editor_style('dist/editor.css');

    //Remove the core block patterns 
    remove_theme_support('core-block-patterns');

    remove_theme_support('widgets-block-editor');
    add_image_size('pageBanner', 1500, 350, true);
    add_image_size('bannerDog', 250, 250, true);
}

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function dogger_excerpt_length($length)
{
    return 20;
}
add_filter('excerpt_length', 'dogger_excerpt_length', 999);

//Modify the excerpt 
add_filter('excerpt_more', 'dogger_custom_excerpt', 999);

function dogger_custom_excerpt($more)
{
    global $post;
    if (get_post_type($post) == 'post') {
        return '<a class="text-primary text-sm md:text-base cursor-pointer" href="' . get_the_permalink() . '"> ...Read more</a>';
    } elseif (get_post_type($post) == 'service') {
        return '<a class="text-primary text-sm md:text-base cursor-pointer" href="' . get_the_permalink() . '"> ...Check service</a>';
    }
}


//Add a class to the_content() in the testimonials slider to italic the content

function dogger_add_class_for_p_tag_content($content)
{
    if (is_page('services')) {
        $content = str_replace('<p>', '<p class="italic">', $content);
    }
    return $content;
}
add_filter('the_content', 'dogger_add_class_for_p_tag_content', 9999);

//Sidebars 
function dogger_register_sidebars()
{
    register_sidebar(
        array(
            'id'            => 'primary',
            'name'          => __('Blog Page Sidebar', 'dogger'),
            'description'   => __('Sidebar for the blog page.', 'dogger'),
            'before_widget' => '<div id="%1$s" class="widget %2$s flex flex-col items-start justify-start font-poppins text-text text-sm lg:flex lg:text-base lg:basis-1/2">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title mb-3">',
            'after_title'   => '</h3>',
            'class'         => 'mysidebar'
        )
    );
    register_sidebar(
        array(
            'id'            => 'dogs',
            'name'          => __('Archive Dogs Sidebar', 'dogger'),
            'description'   => __('Sidebar for the dog list page.', 'dogger'),
            'before_widget' => '<div id="%1$s" class="widget %2$s flex flex-col items-start justify-start font-poppins text-text text-sm lg:flex lg:text-base lg:basis-1/2">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title mb-3">',
            'after_title'   => '</h3>',
            'class'         => 'mysidebar'
        )
    );
}

add_action('widgets_init', 'dogger_register_sidebars');

//Function that will return the HTML for the advanced-search-dogs-form 

function buildSelect($tax)
{
    $terms = get_terms($tax);
    $selectHTML = '<select name="' . $tax . '" class="bg-white w-full text-text text-base font-poppins flex flex-col mb-3 border-b border-solid border-text">';
    $selectHTML .= '<option value=""> ' . ucfirst($tax) . ' </option>';
    foreach ($terms as $term) {
        $selectHTML .= '<option value="' . $term->slug . ' "> ' . $term->slug . ' </option>';
    }
    $selectHTML .= '</select>';
    return $selectHTML;
}

//Include All Categories in the filter by category (Widget) in the blog page 

add_filter('widget_categories_args', 'dogger_add_view_all_to_categories_widget');
function dogger_add_view_all_to_categories_widget($args)
{
    $args['show_option_all'] = 'All';

    return $args;
}
