<?php

/**
 * Create custom meta box for dog breed 
 *
 * @package dooger
 */
/* Fire our meta box setup function on the post editor screen. */
// add_action('load-post.php', 'dogger_post_meta_boxes_setup');
// add_action('load-post-new.php', 'dogger_post_meta_boxes_setup');

// /* Meta box setup function. */
// function dogger_post_meta_boxes_setup()
// {
//     /* Add meta boxes on the 'add_meta_boxes' hook. */
//     add_action('add_meta_boxes', 'dogger_add_post_meta_boxes');
// }


// /* Create one or more meta boxes to be displayed on the dog editor screen. */
// function dogger_add_post_meta_boxes()
// {
//     add_meta_box('dogger-dog-breed', esc_html__('Dog Breed', 'dogger'), 'dogger_dog_breed_meta_box', 'dog', 'side', 'high');
// }

// /*Display the custom meta box*/

// function dogger_dog_breed_meta_box($post)
// {
//     wp_nonce_field('dogger', 'dog_breed_meta_box_nonce');
//     echo '<select name="breed">';
//     echo '<option value="" selected="selected">' . __('Select dog breed', 'dogger') . '</option>';
//     echo '<option value="Labrador Retriever">Labrador Retriever</option>';
//     echo '<option value="Golden Retriever">Golden Retriever</option>';
//     echo '<option value="German Shepherd">German Shepherd</option>';
//     echo '<option value="Bulldog">Bulldog</option>';
//     echo '</select>';
// }
