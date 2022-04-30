<?php
/*
Block Paterns
@pakage dogger
*/

add_action('init', 'dogger_register_block_patterns');
add_action('init', 'dogger_register_block_patterns_categories');

function get_pattern_content($template_path)
{
    ob_start();

    get_template_part($template_path);

    $pattern_content = ob_get_contents();

    ob_end_clean();

    return $pattern_content;
}

function dogger_register_block_patterns()
{
    if (function_exists('dogger_register_block_patterns')) {

        /**
         * Cover pattern
         */

        $cover_content = get_pattern_content('template-parts/patterns/cover');

        register_block_pattern(
            'dogger/cover',
            array(
                'title'             => __('Dogger Cover', 'dogger'),
                'description'       => __('Dogger Block with image and text'),
                'categories'          => ['cover'],
                'content'           => $cover_content,
            ),
        );
    }
}



function dogger_register_block_patterns_categories()
{

    $pattern_categories = [
        'cover'     => __('Cover', 'dogger'),
        'carousel'  => __('Carousel', 'dogger')
    ];

    if (!empty($pattern_categories) && is_array($pattern_categories)) {
        foreach ($pattern_categories as $pattern_category => $pattern_category_label) {
            register_block_pattern_category(
                $pattern_category,
                array('label' => __($pattern_category_label, 'dogger')),
            );
        }
    }
}
