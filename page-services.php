<?php get_header();

?>

<div class="flex flex-col flex-wrap items-center lg:flex md:flex-row  lg:justify-center lg:pr-12 relative pt-36 px-6 pb-12">
    <div class="absolute top-0 h-36 left-0 right-0 opacity-30 -z-10" style="background-image: url(<?php echo esc_url(get_theme_file_uri('/assets/images/banner-background.png')); ?>)"></div>

    <!-- OUR SERVICES -->
    <div class="mx-auto text-center pt-6 pb-3">
        <div class="mb-8">
            <h1 class="text-text font-bold text-4xl pb-5">Our Services</h1>
            <a href="<?php echo esc_url(site_url('contact')); ?>" class="font-poppins bg-secondary hover:bg-primary border border-primary hover:border-secondary border-solid text-text px-2 py-2 my-3 uppercase rounded cursor-pointer">Contact Us</a>
        </div>
        <div class="flex flex-col flex-wrap items-center mx-auto px-4 md:flex md:flex-row md:flex-wrap md:items-stretch md:justify-evenly">

            <?php
            $servicesQuery = new WP_Query(array(
                'post_type'         => 'service',
                'posts_per_page'    => -1,
            ));
            while ($servicesQuery->have_posts()) {

                $servicesQuery->the_post();
                $service_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'bannerDog');
            ?>
                <div class="bg-white w-full shadow-card p-0 border-none rounded mb-4 basis-1/4 sm:basis-[46%] lg:basis-[35%] sm:flex sm:flex-col sm:justify-between sm:items-center sm:mb-12 sm:mr-2">
                    <div class="relative w-full lg:basis-1/3">
                        <img src="<?php if (!empty($service_image_url[0])) echo esc_url($service_image_url[0]); ?>" class="w-full h-full object-cover m-auto" alt="<?php echo esc_attr($service_image_url['alt']); ?>">

                    </div>
                    <div class="px-3 py-4 text-left lg:p-6 lg:basis-2/3">
                        <h3 class="font-paytone text-text text-2xl font-semibold pb-3"><?php esc_html(the_title()); ?></h3>
                        <p class="font-poppins text-text text-base"><?php the_excerpt(); ?></p>
                    </div>
                </div>

            <?php
                wp_reset_postdata();
            }

            ?>
        </div>
    </div>

    <!-- NOT CONVINCED -->
    <div class="mx-auto text-center pt-6 pb-3">
        <div class="flex flex-col lg:flex lg:flex-row lg:items-stretch lg:justify-between lg:px-8 px-0">
            <div class="basis-1/2">
                <div class="flex flex-col pb-12 lg:pr-12">
                    <h1 class="font-paytone text-text text-3xl font-bold text-left capitalize pb-4">Not convinced yet?</h1>
                    <p class="font-poppins text-text text-base text-left">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                </div>
                <div class="flex flex-wrap items-start lg:items-center lg:flex lg:flex-row  lg:justify-center lg:pr-12">

                    <div class="basis-1/2 lg:p-3 pl-0 pr-2 pb-3">
                        <div>
                            <span class="text-2xl"><i class="fas fa-hotdog"></i></span>
                        </div>
                        <div class="basis-1/2  p-3">
                            <h3 class="font-paytone text-text text-xl">The best food</h3>
                            <p class="font-poppins text-text text-base">Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>


                    <div class="basis-1/2 lg:p-3 pl-0 pr-2 pb-3">
                        <div>
                            <span class="text-2xl"><i class="fas fa-bone"></i></span>
                        </div>
                        <div>
                            <h3 class="font-paytone text-text text-xl">Recreative areas</h3>
                            <p class="font-poppins text-text text-base">Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>


                    <div class="basis-1/2 lg:p-3 pl-0 pr-2 pb-3">
                        <div>
                            <span class="text-2xl"><i class="fas fa-shower"></i></span>
                        </div>
                        <div class="">
                            <h3 class="font-paytone text-text text-xl">Dogs always clean</h3>
                            <p class="font-poppins text-text text-base">Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>

                    <div class="basis-1/2 lg:p-3 pl-0 pr-2 pb-3">
                        <div>
                            <span class="text-2xl"><i class="fas fa-hand-holding-medical"></i></span>
                        </div>
                        <div>
                            <h3 class="font-paytone text-text text-xl">We care the health</h3>
                            <p class="font-poppins text-text text-base">Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="basis-1/2 mt-8">
                <div class="lg:max-h-[400px] sm:max-h-[300px] w-[50%] m-auto">
                    <img class="w-full lg:max-h-[400px] sm:max-h-[300px] object-cover rounded-tl-full rounded-br-full" src="<?php echo esc_url(get_theme_file_uri('/assets/images/post6.jpg')); ?>" alt="<?php esc_attr(get_the_title()); ?>">
                </div>

            </div>
        </div>
    </div>
</div>
<!-- PRICING -->
<div class="bg-secondary bg-opacity-30 w-full mx-auto text-center pt-12 pb-12 px-5">
    <div class=" flex flex-col items-center space-y-4 lg:flex lg:flex-row lg:items-start lg:justify-evenly lg:space-x-3">
        <div class="text-left">
            <h2 class="text-primary font-paytone font-semibold text-xl pb-3">Pricing Plan</h2>
            <h1 class="text-text font-paytone font-bold text-2xl capitalize pb-4">Choose what you need</h1>
            <div>
                <span class=" text-text"><i class="pr-3 fa-regular fa-square-check"></i>We accept</span>
                <p class="pb-4"><span class="text-text text-lg pr-3"><i class="fa-brands fa-cc-visa"></i></span><span class="text-text text-lg pr-3"><i class="fa-brands fa-cc-mastercard"></i></span><span class="text-text text-lg pr-3"><i class="fa-solid fa-money-check-dollar"></i></span></span></p>
                <span class="pr-3 text-text"><i class="pr-3 fa-regular fa-square-check"></i>Pay in 2 rates</span>

            </div>
        </div>
        <div class="flex flex-col items-center md:flex-row md:items-stretch md:justify-between px-4 py-3 lg:mt-0 lg:pt-0">
            <div class="bg-white shadow-lg rounded-lg py-5 px-5 mb-4 md:basis[45%] md:mb-0 md:mr-4">
                <h2 class="text-primary font-paytone font-semibold text-xl pb-6">Hotel</h2>
                <div class="flex flex-row items-center justify-items-stretch pb-10">
                    <div class="bg-text rounded-lg p-3 group hover:bg-primary duration-300 ease-in">
                        <h3 class="text-white font-paytone font-semibold text-xl  group-hover:text-text duration-300 ease-in">30 €</h3>
                    </div>
                    <div class="flex flex-col text-left pl-6">
                        <p class="font-poppins text-text text-base"><i class="pr-3 fa-solid fa-circle-check"></i>1 night</p>
                        <p class="font-poppins text-text text-base"><i class="pr-3 fa-solid fa-circle-check"></i>Lorem, ipsum dolor.</p>
                    </div>
                </div>
                <div class="flex flex-row items-center justify-items-stretch pb-10">
                    <div class="bg-text rounded-lg p-3 group hover:bg-primary duration-300 ease-in">
                        <h3 class="text-white font-paytone font-semibold text-xl group-hover:text-text duration-300 ease-in">95 €</h3>
                    </div>
                    <div class="flex flex-col text-left pl-6">
                        <p class="font-poppins text-text text-base"><i class="pr-3 fa-solid fa-circle-check"></i>3 nights</p>
                        <p class="font-poppins text-text text-base"><i class="pr-3 fa-solid fa-circle-check"></i>Lorem, ipsum dolor.</p>
                    </div>
                </div>
                <div class="flex flex-row items-center justify-items-stretch pb-10">
                    <div class="bg-text rounded-lg p-3 group hover:bg-primary duration-300 ease-in">
                        <h3 class="text-white font-paytone font-semibold text-xl group-hover:text-text duration-300 ease-in">210 €</h3>
                    </div>
                    <div class="flex flex-col text-left pl-6">
                        <p class="font-poppins text-text text-base"><i class="pr-3 fa-solid fa-circle-check"></i>7 nights</p>
                        <p class="font-poppins text-text text-base"><i class="pr-3 fa-solid fa-circle-check"></i>Lorem, ipsum dolor.</p>
                    </div>
                </div>
            </div>
            <div class="bg-white shadow-lg rounded-lg py-5 px-5 md:basis[45%]">
                <h2 class="text-primary font-paytone font-semibold text-xl pb-6">Training</h2>
                <div class="flex flex-row items-center justify-items-stretch pb-10">
                    <div class="bg-text rounded-lg p-3 group hover:bg-primary duration-300 ease-in">
                        <h3 class="text-white font-paytone font-semibold text-xl group-hover:text-text duration-300 ease-in">120 €</h3>
                    </div>
                    <div class="flex flex-col text-left pl-6">
                        <p class="font-poppins text-text text-base"><i class="pr-3 fa-solid fa-circle-check"></i>1-day course</p>
                        <p class="font-poppins text-text text-base"><i class="pr-3 fa-solid fa-circle-check"></i>Lorem, ipsum dolor.</p>
                    </div>
                </div>
                <div class="flex flex-row items-center justify-items-stretch pb-10">
                    <div class="bg-text rounded-lg p-3 group hover:bg-primary duration-300 ease-in">
                        <h3 class="text-white font-paytone font-semibold text-xl group-hover:text-text duration-300 ease-in">240 €</h3>
                    </div>
                    <div class="flex flex-col text-left pl-6">
                        <p class="font-poppins text-text text-base"><i class="pr-3 fa-solid fa-circle-check"></i>3-day course</p>
                        <p class="font-poppins text-text text-base"><i class="pr-3 fa-solid fa-circle-check"></i>Lorem, ipsum dolor.</p>
                    </div>
                </div>
                <div class="flex flex-row items-center justify-items-stretch pb-10">
                    <div class="bg-text rounded-lg p-3 group hover:bg-primary duration-300 ease-in">
                        <h3 class="text-white font-paytone font-semibold text-xl group-hover:text-text duration-300 ease-in">360 €</h3>
                    </div>
                    <div class="flex flex-col text-left pl-6">
                        <p class="font-poppins text-text text-base"><i class="pr-3 fa-solid fa-circle-check"></i>7-day course</p>
                        <p class="font-poppins text-text text-base"><i class="pr-3 fa-solid fa-circle-check"></i>Lorem, ipsum dolor.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>

<!-- Whats our clients says    -->
<div class="flex flex-col flex-wrap items-center py-4 px-6 md:flex md:flex-row md:items-center md:justify-center md:pr-6 lg:pr-12">
    <div class="md:basis[30%] lg:py-6 lg:px-3">
        <div class="">
            <img class="w-full max-h-[300px] object-cover rounded-tl-full rounded-br-full" src="<?php echo esc_url(get_theme_file_uri('/assets/images/post6.jpg')); ?>" width="300" height="300" alt="<?php esc_attr(get_the_title()); ?>">
        </div>

    </div>
    <div class="max-w-[90%] md:basis[70%] lg:max-w-[600px] mt-4">
        <?php get_template_part('template-parts/testimonials-carousel');  ?>
    </div>

</div>


<?php
get_footer();
?>