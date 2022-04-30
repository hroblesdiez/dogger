<?php get_header();
?>

<div class="relative pt-36 px-6 pb-12 mx-auto">
    <div class="absolute top-0 h-36 left-0 right-0 opacity-30 -z-10" style="background-image: url(<?php echo esc_url(get_theme_file_uri('/assets/images/banner-background.png')); ?>)"></div>
    <!-- OUR HISTORY -->
    <div class="container mx-auto flex flex-col py-12">
        <h1 class="text-text text-center font-bold text-4xl pb-4">Our History</h1>
        <p class="font-poppins text-text text-base">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Soluta laudantium praesentium sit maxime fugit nesciunt ea quam, deleniti id tempora quisquam pariatur sapiente velit culpa ducimus sed excepturi atque aut sint, rem cumque enim impedit corporis. Ad, ipsum modi eveniet quod, sapiente omnis ipsa quaerat nostrum similique commodi vero velit dolor debitis veniam a! Ipsum non itaque alias quibusdam totam.</p>
    </div>

    <!-- INSTALLATIONS -->

    <div class="container mx-auto flex flex-col items-center pb-12">
        <h1 class="text-text text-center font-bold text-4xl pb-6">Our Installations</h1>
        <div class="flex flex-col items-center border-b border-text border-opacity-50 border-solid lg:flex lg:flex-row lg:items-stretch lg:justify-between lg:space-x-4 lg:pb-4">
            <div class="mapouter shrink basis-1/2">
                <div class="gmap_canvas">
                    <iframe height="500" width="500" id="gmap_canvas" src="https://maps.google.com/maps?q=Plaza%20Regla,%202&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><br>
                    <style>
                        iframe {
                            max-width: 80vw;
                            height: 500;
                        }

                        .mapouter {
                            position: relative;
                            text-align: right;
                            height: 500;
                            max-width: 80vw;
                        }
                    </style>
                    <style>
                        .gmap_canvas {
                            overflow: hidden;
                            background: none !important;
                            height: 500;
                            max-width: 80vw;
                        }
                    </style>
                </div>
            </div>
            <div class="basis-1/2 pb-3">
                <h2 class="text-text text-center font-paytone font-bold text-2xl pb-5">Dogger León Centro</h2>
                <p class="text-text font-poppins text-base">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et culpa atque quibusdam, similique porro facilis voluptates eveniet incidunt? Ullam blanditiis atque, harum ipsa quas excepturi quibusdam, laudantium vero tempora repellat facilis molestias ipsum iure nemo ex aspernatur sunt, aliquam neque quidem pariatur molestiae impedit eius.</p>
            </div>
        </div>


        <div class="flex flex-col items-center lg:flex lg:flex-row lg:items-stretch lg:justify-between lg:space-x-4 lg:pt-4">
            <div class="basis-1/2 pt-3">
                <h2 class="text-text text-center font-paytone font-bold text-2xl pb-5">Dogger León Norte</h2>
                <p class="text-text font-poppins text-base pb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et culpa atque quibusdam, similique porro facilis voluptates eveniet incidunt? Ullam blanditiis atque, harum ipsa quas excepturi quibusdam, laudantium vero tempora repellat facilis molestias ipsum iure nemo ex aspernatur sunt, aliquam neque quidem pariatur molestiae impedit eius.</p>
            </div>
            <div class="mapouter basis-1/2">
                <div class="gmap_canvas"><iframe height="500" width="500" id="gmap_canvas" src="https://maps.google.com/maps?q=Leon,%20cronista%20luis%20pastrana&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><br>
                    <style>
                        iframe {
                            max-width: 80vw;
                            height: 500;
                        }

                        .mapouter {
                            position: relative;
                            text-align: right;
                            height: 500;
                            max-width: 80vw;
                        }
                    </style>
                    <style>
                        .gmap_canvas {
                            overflow: hidden;
                            background: none !important;
                            height: 500;
                            max-width: 80vw;
                        }
                    </style>
                </div>
            </div>

        </div>
    </div>

    <!-- OUR TEAM -->
    <div class="text-center pb-5 px-4">
        <div class="">
            <h1 class="text-text font-bold text-4xl pb-1">Meet Our Team</h1>
            <div class="flex flex-col items-center md:flex md:flex-row md:items-stretch md:flex-wrap md:justify-evenly pb-4 px-4 lg:space-x-4">
                <?php
                $teamQuery = new WP_Query(array(
                    'post_type'         => 'team',
                    'posts_per_page'    => -1,
                    'meta_key'          => 'team_order',
                    'orderby'           => 'meta_val_num',
                    'order'             => 'ASC'
                ));
                while ($teamQuery->have_posts()) {
                    $teamQuery->the_post();
                    $teamPhoto = get_field('team_photo');

                ?>
                    <div class="flex flex-col group flex-wrap md:mx-2 items-center justify-between lg:flex lg:flex-col lg:justify-evenly lg:basis-[20%]  bg-secondary bg-opacity-60 w-full sm:w-3/5 md:w-1/3 h-auto rounded-lg py-4 px-1 my-8 shadow-card">

                        <div class="flex flex-row group items-center justify-center space-x-2 order-2 rounded-full mx-auto my-3 h-36 w-36 bg-center bg-cover bg-opacity-100 group-hover:bg-opacity-20 transition-all ease-in duration-300" style="background-image: url(<?php echo esc_url($teamPhoto['sizes']['bannerDog']); ?>);">
                            <span class="hidden group-hover:flex transition-all ease-in duration-300 text-2xl pr-3 text-white hover:text-primary"><a href=""><i class="fa-brands fa-facebook"></i></span></a>
                            <span class="hidden group-hover:flex transition-all ease-in duration-300 text-2xl pr-3 text-white hover:text-primary"><a href=""><i class="fa-brands fa-twitter"></i></span></a>
                            <span class="hidden group-hover:flex transition-all ease-in duration-300 text-2xl pr-3 text-white hover:text-primary"><a href=""><i class="fa-brands fa-linkedin"></i></span></a>
                        </div>

                        <a class="font-paytone text-text hover:text-primary transition-colors ease-in duration-300 text-2xl flex-1 w-full lg:w-1/2 order-1 pb-3 font-semibold" href="<?php esc_url(the_permalink()); ?>"><?php esc_html(the_title()); ?></a>
                        <p class="font-poppins text-text flex-1 w-full order-3 text-base"><?php echo get_field('team_role'); ?></p>

                    </div>
                <?php }
                ?>
            </div>
        </div>
    </div>

</div>

<?php
get_footer();
?>