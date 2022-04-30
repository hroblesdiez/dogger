<?php

/**
 * Search result page.
 * @package Dogger
 */

get_header();
global $wp_query;

?>
<div class="relative pt-48 px-6 pb-12 mx-auto">
    <div class="absolute top-0 h-36 left-0 right-0 opacity-30 -z-10" style="background-image: url(<?php echo esc_url(get_theme_file_uri('/assets/images/banner-background.png')); ?>)"></div>

    <div class="mb-8">
        <h1 class="text-center text-text font-poppins text-lg"> <?php echo $wp_query->found_posts; ?>
            <?php esc_html_e('Search Results Found For', 'dogger'); ?>: "<?php the_search_query(); ?>"
        </h1>
    </div>

    <?php

    if (have_posts()) { ?>

        <div class="flex flex-col flex-wrap items-center mx-auto px-4 md:flex md:flex-row md:justify-evenly md:items-stretch md:flex-wrap lg:mx-auto lg:flex lg:flex-row lg:items-stretch lg:justify-evenly">

            <?php while (have_posts()) {
                the_post(); ?>
                <!-- CARD -->
                <div class="bg-white w-full flex flex-col justify-start shadow-card p-0 border-none rounded mb-4 lg:basis-[30%] md:basis-[45%]">
                    <div class="relative w-full lg:basis-1/3">
                        <a class="w-full" href="<?php echo esc_url(get_the_permalink()); ?>">
                            <?php

                            $dog_photo = wp_get_attachment_image(get_field('dog_photo')['ID'], 'bannerDog', false, array('class' => 'w-full', 'loading' => 'lazy'));
                            $team_photo = wp_get_attachment_image(get_field('team_photo')['ID'], 'bannerDog', false, array('class' => 'w-full', 'loading' => 'lazy'));
                            $testimonial_photo = wp_get_attachment_image(get_field('customer_photo')['ID'], 'bannerDog', false, array('class' => 'w-full', 'loading' => 'lazy'));
                            $service_photo = wp_get_attachment_image(get_field('service_photo')['ID'], 'bannerDog', false, array('class' => 'w-full', 'loading' => 'lazy'));

                            if (has_post_thumbnail()) {
                                echo get_the_post_thumbnail($post->ID, 'bannerDog', array(

                                    'class'         => 'w-full',
                                    'loading'       => 'lazy'
                                ));
                            } else if (get_post_type() === 'dog' && !empty($dog_photo)) {
                                echo $dog_photo;
                            } else if (get_post_type() === 'team' && !empty($team_photo)) {
                                echo $team_photo;
                            } else if (get_post_type() === 'testimonial' && !empty($testimonial_photo)) {
                                echo $testimonial_photo;
                            } else if (get_post_type() === 'service' && !empty($service_photo)) {
                                echo $service_photo;
                            } else if (!has_post_thumbnail() || empty($dog_photo) || empty($team_photo) || empty($testimonial_photo)) {
                                echo '<img src=" ' . get_theme_file_uri('/assets/images/search.jpg')  . ' ">';
                            }
                            ?>
                        </a>
                    </div>
                    <div class="px-3 pb-4 text-left lg:p-6 lg:basis-2/3">
                        <h3 class="font-paytone text-text text-2xl font-semibold py-3"><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php esc_html(the_title()); ?></a></h3>
                        <p class="font-poppins text-text text-base"><?php the_excerpt(); ?></p>
                    </div>
                </div>
                <!-- CARD  END-->
            <?php } ?>

        </div>
        <div class="flex flex-row items-center justify-center space-x-3">
            <?php dogger_pagination() ?>
        </div>

    <?php } else { ?>
        <div class="mx-auto flex flex-col items-center justify-center">
            <div>
                <p class="text-text text-center font-poppins text-base mb-6">No results found. Please, try with another term</p>
            </div>
        <?php } ?>

        </div>

</div>
<?php get_footer(); ?>