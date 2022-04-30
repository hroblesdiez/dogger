<?php
/*
* Template for dispaying the archive page filterred by categories or by date
*/

get_header();

?>

<div class="relative pt-36 px-6 pb-12">
    <div class="absolute top-0 h-36 left-0 right-0 opacity-30 -z-10" style="background-image: url(<?php echo esc_url(get_theme_file_uri('/assets/images/banner-background.png')); ?>)"></div>
    <div class="py-4">
        <?php get_sidebar(); ?>
    </div>
    <div class="md:flex md:flex-row md:flex-wrap md:justify-around lg:flex lg:flex-row lg:flex-wrap lg:items-stretch lg:justify-evenly lg:space-x-4">
        <?php
        while (have_posts()) {
            the_post();
        ?>
            <div class="bg-white flex flex-col items-center justify-start w-full md:w-2/5 md:mr-6 lg:w-[30%] h-auto rounded-lg pb-3 my-8 shadow-card">

                <div class="w-full">
                    <img class="w-full rounded-t opacity-70 hover:opacity-100 transition-opacity duration-300" src="<?php echo esc_url(get_the_post_thumbnail_url($post->ID, 'bannerDog')); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                </div>
                <div>
                    <div class="flex flex-row flex-wrap font-poppins text-text text-xs w-full pl-2 pt-2 pb-3">
                        <p class="font-poppins text-text text-sm">Posted by <?php esc_html(the_author_posts_link()); ?> | <?php echo esc_html(get_the_date('j F,Y')); ?> | <?php echo get_the_category_list(', '); ?></p>
                    </div>
                    <div class="px-2 text-left">
                        <h2 class="font-paytone text-text text-2xl font-semibold "><a href="<?php esc_url(the_permalink()); ?>"><?php esc_html(the_title()); ?></a></h2>
                        <p class="font-poppins text-text text-sm md:text-base pt-3"><?php echo get_the_excerpt(); ?></p>

                    </div>
                </div>
            </div>
        <?php }

        ?>
    </div>
    <div class="flex justify-center text-text font-poppins lg:text-lg">
        <?php esc_html(dogger_pagination()); ?>
    </div>
</div>

<?php
get_footer();
?>