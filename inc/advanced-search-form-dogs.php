<?php
/*
The search form in the Dog Archive
*/
?>
<form method="GET" action="<?php echo get_post_type_archive_link('dog'); ?>">
    <!-- gather data to use in form fields  -->
    <?php

    $breeds = get_terms(array(
        'taxonomy'      => 'dog_breed',
        'hide_empty'    => false
    ));
    if (!empty($breeds)) { ?>
        <div>
            <?php
            foreach ($breeds as $breed) { ?>
                <input type="checkbox" id="<?php echo $breed->name; ?>" value="<?php echo $breed->name; ?>" name="dog_breed[]" <?php echo in_array($breed->term_id, $breeds) ? 'checked' : null; ?> />
                <label for="<?php echo $breed->name; ?>"><?php echo $breed->name; ?></label>

            <?php } ?>

        </div>
    <?php } ?>
    <div>
        <label for="dog_sex">Sex</label>
        <select name="dog_sex" id="dog-sex">
            <option value="">Any</option>
            <option value="Male" <?php echo get_query_var('dog_sex', FALSE) == 'Male' ? 'selected' : null; ?>>Male</option>
            <option value="Female" <?php echo get_query_var('dog_sex', FALSE) == 'Female' ? 'selected' : null; ?>>Female</option>
        </select>

        <label for="dog_age">Maximum Age</label>
        <input type="text" name="dog_age" id="dog_age" value="<?php echo get_query_var('dog_age', FALSE); ?>" />

        <label for="dog_weight">Maximum Weight</label>
        <input type="text" name="dog_weight" id="dog_weight" value="<?php echo get_query_var('dog_weight', FALSE); ?>" />

    </div>
    <input type="submit" value="<?php _e('Search', 'dogger'); ?>" />
</form>