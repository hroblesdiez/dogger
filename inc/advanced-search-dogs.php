<?php
/* Template Name: Advanced Dog Search */

?>

<main class="content">

    <?php

    //Get all searched variables 
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $search_string = get_query_var('dog-search');
    $breed = get_query_var('dog-breed');
    $sex = get_query_var('dog-sex');
    $weight = get_query_var('dog-weight');
    $age = get_query_var('dog-age');

    //Search form 

    global $post; ?>

    <form method="GET" action="#" role="search">
        <ul class="">
            <li>
                <label for="dog-search"><?php esc_html_e('Search...', 'dogger'); ?></label>
                <input type="text" id="dog-search" name="dog-search" value="<?php echo $search_string; ?>" />
            </li>
            <li>
                <label for="dog-breed"><?php esc_html_e('Breed', 'dogger'); ?></label>
                <?php
                wp_dropdown_categories([
                    'taxonomy'          => 'dog_breed',
                    'name'              => 'dog-breed',
                    'id'                => 'dog-breed',
                    'value_field'       => 'slug',
                    'selected'          => $breed,
                    'show_option_none'  => __('Any dog breed', 'dogger'),
                    'option_none_value' => '',
                    'hierarchical'      => true,
                    'hide_if_empty'     => false

                ]);
                ?>
            </li>
            <li>
                <label for="dog-sex"><?php esc_html_e('Sex', 'dogger'); ?></label>
                <select name="dog-sex">
                    <?php echo '<option value="" selected="selected">' . __('Select sex', 'dogger') . '</option>'; ?>
                    <option value="<?php esc_attr_e('Male', 'dogger'); ?>"><?php esc_html_e('Male', 'dogger'); ?></option>
                    <option value="<?php esc_attr_e('Female', 'dogger'); ?>"><?php esc_html_e('Female', 'dogger'); ?></option>
                </select>
            </li>
            <li>
                <label for="dog-age"><?php esc_html_e('Age', 'dogger'); ?></label>
                <select name="dog-age">
                    <?php echo '<option value="" selected="selected">' . __('Select dog age', 'dogger') . '</option>'; ?>
                    <option value="<?php esc_attr_e('1-5', 'dogger'); ?>"><?php esc_html_e('1-5', 'dogger'); ?></option>
                    <option value="<?php esc_attr_e('5-10', 'dogger'); ?>"><?php esc_html_e('5-10', 'dogger'); ?></option>
                    <option value="<?php esc_attr_e('10-15', 'dogger'); ?>"><?php esc_html_e('10-15', 'dogger'); ?></option>

                </select>
            </li>
        </ul>

        <input class="cursor-pointer" type="submit" value="<?php esc_attr_e('Search', 'dogger'); ?>" />

    </form>
    <?php

    //Reset the wp_query object in order to ensure that pagination works for our custom query
    $tmp_wpquery = $wp_query;
    $wp_query = null;

    //Set up arguments and run custom query
    $args = [
        'post_type'         => 'dog',
        'posts_per_page'    => -1,
        'paged'             => $paged
    ];

    $meta_query = [];
    $tax_query = [];

    if (!empty($search_string)) {
        $args['s'] = $search_string;
    }

    if (!empty($breed)) {
        $tax_query[] = [
            'taxonomy'      => 'dog_breed',
            'field'         => 'slug',
            'terms'         => $breed
        ];
    }

    if (!empty($sex)) {
        $meta_query[] = [
            'key'       => 'dog_sex',
            'value'     => $sex,
            'compare'   => 'LIKE'
        ];
    }

    if (!empty($age)) {
        $meta_query[] = [
            'key'       => 'dog_age',
            'value'     => $age,
            'compare'   => 'LIKE'
        ];
    }

    if (!empty($meta_query)) {
        $args['meta_query'] = $meta_query;
    }
    if (!empty($tax_query)) {
        $args['tax_query'] = $tax_query;
    }

    // Perform query and assign it to wp_query
    $dogs = new WP_Query($args);
    $wp_query = $dogs;

    if (have_posts()) {
        while (have_posts()) : the_post();
            get_template_part('content', 'dog-search');
        endwhile;

        the_posts_pagination([
            'mid_size' => 2,
            'prev_text' => __('« Previous', 'txdomain'),
            'next_text' => __('Next »', 'txdomain')
        ]);
    } else { ?>
        <p class=""><?php echo esc_html__('No dogs found. Please try another search', 'dogger');  ?></p>
    <?php }

    //Reset the wp_query back to what it was
    $wp_query = null;
    $wp_query = $tmp_wpquery; ?>

</main>