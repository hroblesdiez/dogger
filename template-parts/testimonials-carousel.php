<?php

/**
 * Testimonials carousel
 * 
 * @package dogger
 */
$args = array(
    'posts_per_page'    => 3,
    'post_type'         => 'testimonial',
);

$customers_query = new WP_Query($args);

?>
<!-- Slider main container -->
<div class="!overflow-y-visible swiper">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
        <!-- Slides -->
        <?php
        if ($customers_query->have_posts()) :
            while ($customers_query->have_posts()) :
                $customers_query->the_post(); ?>

                <div class="swiper-slide">
                    <div class="w-full flex flex-col items-center">
                        <img class="rounded-full" src="<?php echo esc_url(get_field('customer_photo')['sizes']['bannerDog']); ?>" alt="<?php esc_attr(get_the_title()); ?>">
                        <p class="font-poppins text-text font-semibold text-base"><?php echo esc_html(get_field('customer_name')); ?></p>
                        <p><span class="font-poppins text-text  text-base pr-2"><?php echo esc_html(get_field('customer_role')); ?></span>|<span class="font-poppins text-text  text-base pl-2"><?php echo esc_html(get_field('customer_company')); ?></span></p>
                    </div>
                    <div class="text-center font-poppins text-sm">
                        <?php echo esc_html(the_content()); ?>
                    </div>
                </div>

        <?php endwhile;

        endif;

        wp_reset_postdata();
        ?>
    </div>

    <!-- pagination -->
    <div class="swiper-pagination static -bottom-3"></div>

</div>