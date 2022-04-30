<?php
/*
The 404 error page 
*/
get_header(); ?>

<div class="relative pt-36 px-6 mx-auto">
    <div class="absolute top-0 h-36 left-0 right-0 opacity-30 z-10" style="background-image: url(<?php echo esc_url(get_theme_file_uri('/assets/images/banner-background.png')); ?>)"></div>

</div>
<div class="flex flex-row items-center justify-center h-[50vh]">

    <h2 class="font-poppins text-lg md:text-xl lg:text-xl text-text"><?php esc_html_e('Page not found', 'dogger'); ?></h2>

</div>

<?php get_footer();
