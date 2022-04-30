<?php

/**
 * Register custom query vars
 *
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/query_vars
 */
function dogger_register_query_vars($vars)
{
    $vars[] = 'sex';
    $vars[] = 'breed';
    // $vars[] = 'weight';
    return $vars;
}
add_filter('query_vars', 'dogger_register_query_vars');

/**
 * Build a custom query based on several conditions
 * The pre_get_posts action gives developers access to the $query object by reference
 * any changes you make to $query are made directly to the original object - no return value is requested
 *
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/pre_get_posts
 *
 */
function dogger_pre_get_posts($query)
{
    // check if the user is requesting an admin page or current query is not the main query

    if (is_admin() || !$query->is_main_query()) {
        return;
    }
    // edit the query only when post type is 'dog' if it isn't, return
    if (!is_post_type_archive('dog')) {
        return;
    }

    $meta_query = array();

    // add meta_query elements
    if (!empty(get_query_var('sex'))) {
        $meta_query[] = array(
            'key'          => 'dog_sex',
            'value'        => get_query_var('sex'),
            'compare'      => 'LIKE'
        );
    }
    if (!empty(get_query_var('breed'))) {
        $meta_query[] = array(
            'key'          => 'dog_breed',
            'value'        => get_query_var('breed'),
            'compare'      => 'LIKE'
        );
    }
    // if (!empty(get_query_var('weight'))) {
    //     $meta_query[] = array(
    //         'key'          => 'dog_weight',
    //         'value'        => array(get_query_var('weight') - 5, get_query_var('weight') + 5),
    //         'type'         => 'numeric',
    //         'compare'      => 'BETWEEN'
    //     );
    // }

    if (count($meta_query) > 1) {
        $meta_query['relation'] = 'AND';
    }
    if (count($meta_query) > 0) {
        $query->set('meta_query', $meta_query);
    }
}

add_action('pre_get_posts', 'dogger_pre_get_posts', 1);



//define the callback function that will produce the HTML of a form containing select fields
function dogger_dog_search_form()
{
    // meta_query expects nested arrays even if you only have one query
    $query_args = array(
        'post_type'          => 'dog',
        'posts_per_page'     => '-1',
        'meta_query'         => array(
            array(
                'key'               => 'dog_sex',
            )
        )
    );
    $dogger_query = new WP_Query($query_args);

    //The Loop for dog sex 
    if ($dogger_query->have_posts()) {
        $sexs = array();
        while ($dogger_query->have_posts) {
            $dogger_query->the_post();
            //$sex = get_post_meta(get_the_ID(), 'dog_sex', true);
            $sex = get_field('dog_sex');
            echo '<pre/>';
            print_r($sex);
            wp_die();
            // populate an array of all occurrences (non duplicated)
            if (!in_array($sex, $sexs)) {
                $sexs[] = $sex;
            }
        }
    } else {
        echo 'No dog sex yet!';
        return;
    }
    /* Restore original Post Data */
    wp_reset_postdata();

    if (count($sexs) === 0) {
        return;
    }
    asort($sexs);

    $select_sex = '<select name="sex">';
    $select_sex .= '<option value="" selected="selected">' . __('Select sex', 'dogger') . '</option>';

    foreach ($sexs as $sex) {
        $select_sex .= '<option value=" ' . $sex . ' ">' . $sex  . ' </option>';
    }
    $select_sex .= '</select>' . '\n';
    reset($sexs);


    //dog breed 
    $query_args_breed = array(
        'post_type'          => 'dog',
        'posts_per_page'     => '-1',
        'meta_query'         => array(
            array(
                'key'               => 'dog_breed',
            )
        )
    );
    $dogger_breed_query = new WP_Query($query_args_breed);
    //The Loop for dog breed 
    if ($dogger_breed_query->have_posts()) {
        $breeds = array();
        while ($dogger_breed_query->have_posts) {
            $dogger_breed_query->the_post();
            //$breed = get_post_meta(get_the_ID(), 'dog_breed', true);
            $breed = get_field('dog_breed');

            // populate an array of all occurrences (non duplicated)
            if (!in_array($breed, $breeds)) {
                $breeds[] = $breed;
            }
        }
    } else {
        echo 'No dog breed yet!';
        return;
    }
    /* Restore original Post Data */
    wp_reset_postdata();

    if (count($breeds) === 0) {
        return;
    }
    asort($breeds);

    $select_breed = '<select name="breed">';
    $select_breed .= '<option value="" selected="selected">' . __('Select breed', 'dogger') . '</option>';

    foreach ($breeds as $breed) {
        $select_breed .= '<option value=" ' . $breed . ' ">' . $breed  . ' </option>';
    }
    $select_breed .= '</select>' . '\n';
    reset($breeds);

    //dog weight 
    // $query_args_weight = array(
    //     'post_type'          => 'dog',
    //     'posts_per_page'     => '-1',
    //     'meta_query'         => array(
    //         array(
    //             'key'               => 'dog-weight',
    //         )
    //     )
    // );
    // $dogger_weight_query = new WP_Query($query_args_weight);
    // //The Loop for dog breed 
    // if ($dogger_weight_query->have_posts()) {
    //     $weights = array();
    //     while ($dogger_weight_query->have_posts) {
    //         $dogger_weight_query->the_post();
    //         $weight = get_post_meta(get_the_ID(), 'dog_weight', true);

    //         // populate an array of all occurrences (non duplicated)
    //         if (!in_array($weight, $weights)) {
    //             $weights[] = $weight;
    //         }
    //     }
    // } else {
    //     echo 'No dog weight yet!';
    //     return;
    // }
    // /* Restore original Post Data */
    // wp_reset_postdata();

    // if (count($weights) === 0) {
    //     return;
    // }
    // asort($weights);

    //$select_weight = '<input type="text" id="weight" name="weight" value=" ' . get_query_var('dog_weight')  . '">';


    //reset($weights);

    //print put the form 
    $output = '<form action=" ' . esc_url(home_url()) . ' "  method="GET" role="search">';

    $output .=  '<div class="">' . esc_html($select_sex) . '</div>';
    $output .=  '<div class="">' . esc_html($select_breed) . '</div>';
    //$output .=  '<div class=""><label for="weight">Weight:</label><br>' . esc_html($select_weight) . '</div>';
    $output .=  '<input type="hidden" name="post_type" value="dog" />';
    $output .=  '<p><input type="submit" value="Search!" class="button" /></p></form>';

    return $output;
}


add_action('init', 'dogger_dog_search_form');
