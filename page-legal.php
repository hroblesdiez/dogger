<?php
/*
The Terms of Use page 
*/
get_header(); ?>

<div class="relative pt-36 px-6 mx-auto">
    <div class="absolute top-0 h-36 left-0 right-0 opacity-30 z-10" style="background-image: url(<?php echo esc_url(get_theme_file_uri('/assets/images/banner-background.png')); ?>)"></div>

</div>
<div class="font-poppins text-text text-base md:text-lg py-12 px-24">

    <?php the_content(); ?>

</div>

<?php get_footer();
