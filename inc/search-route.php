<?php
function dogger_register_search()
{
    register_rest_route('dogger/v1', 'search', array(
        'methods'   => WP_REST_SERVER::READABLE,
        'callback'  => 'doggerSearchResults'
    ));
}

function doggerSearchResults($data)
{
    $mainQuery = new WP_Query(array(
        'post_type' => array('dog', 'service', 'team', 'testimonial', 'post', 'page'),
        's'         => sanitize_text_field($data['term'])
    ));

    $results = array(
        'dog'      => array(),
        'service'   => array(),
        'team'   => array(),
        'testimonial'   => array(),
        'post'   => array(),
        'page'   => array(),

    );

    while ($mainQuery->have_posts()) {
        $mainQuery->the_post();

        if (get_post_type() === 'post') {
            array_push($results['post'], array(
                'title'     => get_the_title(),
                'link'      => get_the_permalink()
            ));
        }
        if (get_post_type() === 'page') {
            array_push($results['page'], array(
                'title'     => get_the_title(),
                'link'      => get_the_permalink()
            ));
        }
        if (get_post_type() === 'dog') {
            array_push($results['dog'], array(
                'title'     => get_the_title(),
                'link'      => get_the_permalink()
            ));
        }
        if (get_post_type() === 'team') {
            array_push($results['team'], array(
                'title'     => get_the_title(),
                'link'      => get_the_permalink()
            ));
        }
        if (get_post_type() === 'testimonial') {
            array_push($results['testimonial'], array(
                'title'     => get_the_title(),
                'link'      => get_the_permalink()
            ));
        }
    }

    return $results;
}

add_action('rest_api_init', 'dogger_register_search');
