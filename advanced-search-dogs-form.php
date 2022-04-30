<?php
/*
 The advanced search form to include in the search results 
*/
?>
<form class="w-full sm:max-w-[400px] my-3 p-3 bg-white rounded" method="GET" action="<?php bloginfo('url'); ?>/dogs-search-results/">

    <?php $taxonomies = get_object_taxonomies('dog', 'names');
    foreach ($taxonomies as $taxonomy) {
        echo buildSelect($taxonomy);
    }
    ?>
    <button class="font-poppins bg-secondary hover:bg-primary text-text px-2 py-2 uppercase rounded cursor-pointer" type="submit" value="Search" role="search">Search</button>
</form>