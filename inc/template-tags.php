<?php

//Pagination function 

function dogger_pagination()
{
    $allowed_html_tags = array(
        'span'  => array(
            'class' => array()
        ),
        'a'     => array(
            'class' => array(),
            'href'  => array()
        ),
    );

    $args = array(
        'before_page_number'        => '<span class="border border-solid border-text mr-2 py-1 px-2">',
        'after_page_number'         => '</span>',
        'prev_text'                 => is_search() ? '&laquo; Previous results' : '&laquo; Previous posts',
        'next_text'                 => is_search() ? 'Next results &raquo;' : 'Next posts &raquo;',
        'format'                    => '?paged=%#%'
    );

    printf('<nav class="flex flex-row items-center space-x-2">%s</nav>', wp_kses(paginate_links($args), $allowed_html_tags));
}
