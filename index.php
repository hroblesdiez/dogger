<?php get_header();
?>

<div class="relative pt-36 px-6 pb-12">
    <div class="absolute top-0 h-36 left-0 right-0 opacity-30 -z-10" style="background-image: url(<?php echo get_theme_file_uri('/assets/images/banner-background.png'); ?>)"></div>
    <?php
    while (have_posts()) {
        the_post();
    ?>
        <div class="bg-white flex flex-col items-center justify-between w-full h-auto rounded-lg pb-3 my-8 shadow-card">


            <img class="w-full rounded-t" src="<?php echo get_the_post_thumbnail_url($post->ID, 'bannerDog'); ?>" alt="">
            <div class="flex flex-row flex-wrap font-poppins text-text text-xs w-full pl-2 pt-2 pb-3">
                <p>Posted by <?php the_author_posts_link(); ?> | <?php echo get_the_date('j F,Y'); ?> | <?php echo get_the_category_list(', '); ?></p>
            </div>
            <div class="px-2 text-left">
                <h2 class="font-paytone text-text text-2xl font-semibold "><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <p class="font-poppins text-text text-lg pt-3"><?php the_excerpt(); ?></p>

            </div>
        </div>
    <?php }
    echo paginate_links();
    ?>
</div>

<?php
get_footer();
?>