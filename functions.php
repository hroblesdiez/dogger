<?php
//Enqueueing assets

add_action('wp_enqueue_scripts', 'dogger_enqueue_assets');

function dogger_enqueue_assets()
{
    wp_enqueue_style('dogger_main_style', get_theme_file_uri('/build/main.css'));
    wp_enqueue_style('customgoogle_fonts', '//fonts.googleapis.com/css2?family=Paytone+One&family=Poppins:wght@300;400;500;600;700&display=swap');

    wp_enqueue_script('font-awesome', '//kit.fontawesome.com/03d62932bb.js');
    wp_enqueue_script('dogger_main_js', get_theme_file_uri('/build/main.js'), array('jquery'), '1.0', true);
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
    add_image_size('pageBanner', 1500, 350, true);
    add_image_size('bannerDog', 250, 250, true);
}

//Function for the Banner 

function pageBanner($args = NULL)
{

    if (!$args['title']) {
        $args['title'] = get_the_title();
    }
    if (!$args['subtitle']) {
        $args['subtitle'] = get_field('page_banner_subtitle');
    }
    if (!$args['photo']) {
        if (get_field('page_banner_background_image') and !is_archive() and !is_home()) {
            $args['photo'] = get_field('page_banner_background_image')['sizes']['pageBanner'];
        } else {
            $args['photo'] = get_theme_file_uri('/images/ocean.jpg');
        }
    }

?>
    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?php echo $args['photo']; ?>);"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title"><?php echo $args['title']; ?></h1>
            <div class="page-banner__intro">
                <p><?php echo $args['subtitle']; ?></p>
            </div>
        </div>
    </div>
<?php }

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
