<?php
get_header(); ?>

<div class="relative pt-36 px-6 mx-auto">
    <div class="absolute top-0 h-36 left-0 right-0 opacity-30 z-10" style="background-image: url(<?php echo esc_url(get_theme_file_uri('/assets/images/banner-background.png')); ?>)"></div>

</div>
<div class="flex flex-col items-center lg:flex lg:flex-row lg:items-start lg:justify-center lg:space-x-16 p-6">

    <?php the_content(); ?>

</div>

</div>


<?php get_footer();
