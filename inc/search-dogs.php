<?php

/**
 * Create Custom Query Vars
 * https://codex.wordpress.org/Function_Reference/get_query_var#Custom_Query_Vars
 */
function dogger_register_query_vars($vars)
{
    // add custom query vars that will be public
    // https://codex.wordpress.org/WordPress_Query_Vars
    $vars[] = 'dog_search';
    $vars[] = 'dog_breed';
    $vars[] = 'dog_sex';
    $vars[] = 'dog_age';
    $vars[] = 'dog_weight';
    return $vars;
}
add_filter('query_vars', 'dogger_register_query_vars');


/**
 * Override Dog Archive Query
 * https://codex.wordpress.org/Plugin_API/Action_Reference/pre_get_posts
 */

function dogger_dog_archive($query)
{
    // only run this query if we're on the dog archive page and not on the admin side
    if ($query->is_archive('dog') && $query->is_main_query() && !is_admin()) {

        // get query vars from url.
        // https://codex.wordpress.org/Function_Reference/get_query_var#Examples

        // dogger.com/dog/?breed=bulldog
        $breed = get_query_var('dog_breed', FALSE);
        // dogger.com/dog/?sex=male
        $sex = get_query_var('dog_sex', FALSE);
        // dogger.com/dog/?age=8
        $age = get_query_var('dog_age', FALSE);
        // dogger.com/dog/?weight=25
        $weight = get_query_var('dog_weight', FALSE);

        // used to conditionally build the meta_query
        // the meta_query is used for searching against custom fields
        $meta_query_array = array('relation' => 'AND');

        // conditionally add arrays to the meta_query based on values in the URL
        // the `key` is the name of my custom fields
        $sex ? array_push($meta_query_array, array('key' => 'dog_sex', 'value' => ' " ' . $sex . ' " ', 'compare' => 'LIKE')) : null;
        $age ? array_push($meta_query_array, array('key' => 'dog_age', 'value' => ' " ' . $age . ' " ', 'compare' => '=<')) : null;
        $weight ? array_push($meta_query_array, array('key' => 'dog_weight', 'value' => ' " ' . $weight . ' " ', 'compare' => '=<')) : null;


        // final meta_query
        $query->set('meta_query', $meta_query_array);

        // used to conditionally build the tax_query
        // the tax_query is used for a custom taxonomy assigned to the post type
        // i'm using the `'relation' => 'OR'` to make the search more broad
        $tax_query_array = array('relation' => 'OR');

        // conditionally add arrays to the tax_query based on values in the URL
        // `dog_breed` is the name of my custom taxonomy
        $breed ? array_push($tax_query_array, array('taxonomy' => 'dog_breed', 'field' => 'term_id', 'terms' => $breed)) : null;

        // final tax_query
        $query->set('tax_query', $tax_query_array);
    }
}
add_action('pre_get_posts', 'dogger_dog_archive');
