<?php
get_header(); ?>

<!-- BANNER   -->
<div class="relative pt-24 px-6 pb-12">
    <div class="absolute top-0 bottom-0 left-0 right-0 opacity-30 -z-10" style="background-image: url(<?php echo esc_url(get_theme_file_uri('/assets/images/banner-background.png')); ?>)"></div>
    <div class="flex flex-col items-center w-full">
        <div class="w-4/5 py-3 px-6 mx-auto">
            <div class="relative w-3/5 mx-auto">
                <svg class="w-1/2 mx-auto" version="1.1" viewBox="0 0 13.229 13.229" xmlns="http://www.w3.org/2000/svg">
                    <g transform="translate(-116.5 -121.17)">
                        <g transform="matrix(.96421 0 0 .96421 19.233 -17.318)" fill="#f7a905">
                            <path d="m103.82 154.93 0.24281-0.70901 0.27195-0.67987s0.33993-0.60216 0.34964-0.64101c0.01-0.0388 0.34965-0.58274 0.34965-0.58274l0.44677-0.56332 0.42734-0.34965 0.49533-0.3108 0.57303-0.2428 0.60217-0.13598 0.47591-0.0583 0.40792 0.0291 0.54389 0.14568 0.52441 0.30899 0.46014 0.35712 0.54254 0.51508 0.60436 0.78291 0.61809 0.96835 0.21977 0.37086 0.17856 0.40519 0.20603 0.52194 0.0893 0.48761 0.0137 0.26097-0.0343 0.35712-0.0824 0.24724-0.20603 0.26097-0.19229 0.15796-0.29531 0.13048s-0.23351 0.0275-0.26784 0.0343c-0.0343 7e-3 -0.22664 0.0137-0.26098 0.0137-0.0343 0-0.39146-0.0412-0.39146-0.0412s-0.38459-0.16483-0.41892-0.16483c-0.0343 0-0.52882-0.21976-0.52882-0.21976l-0.42579-0.17857-0.43267-0.14422-0.36196-0.0808-0.24281-5e-3s-0.22339 5e-3 -0.26709 5e-3 -0.36422 0.0388-0.36422 0.0388l-0.31565 0.0923-0.37393 0.13111-0.56388 0.20656-0.35025 0.13048-0.33995 0.10645-0.39833 0.0858-0.18886 0.0275-0.2129-3e-3 -0.20603-0.0343-0.27958-0.10626-0.22825-0.15539-0.1991-0.22339-0.14083-0.20396-0.11655-0.30108-0.0437-0.25252-5e-3 -0.26224 0.0388-0.28166z" />
                            <g fill-rule="evenodd">
                                <ellipse transform="rotate(-35.073)" cx="-2.1835" cy="182.13" rx="1.4607" ry="2.4318" stop-color="#000000" style="font-variation-settings:normal" />
                                <ellipse transform="rotate(-19.624)" cx="50.133" cy="173.46" rx="1.4607" ry="2.4318" stop-color="#000000" style="font-variation-settings:normal" />
                                <ellipse transform="rotate(17.144)" cx="148.26" cy="107.37" rx="1.4607" ry="2.4318" stop-color="#000000" style="font-variation-settings:normal" />
                                <ellipse transform="rotate(32.676)" cx="175.92" cy="65.451" rx="1.4607" ry="2.4318" stop-color="#000000" style="font-variation-settings:normal" />
                            </g>
                        </g>
                    </g>
                </svg>
            </div>
        </div>
        <div class="text-text text-center py-8 px-4">
            <h1 class="font-paytone font-bold text-4xl pb-3 lg:text-5xl">Adopt a dog!</h1>
            <p class="font-poppins pb-6 lg:text-lg">Lorem ipsum dolor sit amet, consectetur, sed do eiusmod tempor incididun.</p>
            <a href="<?php echo esc_url(get_post_type_archive_link('dog')); ?>" class="font-poppins bg-secondary hover:bg-primary border border-primary hover:border-secondary border-solid text-text px-2 py-2 uppercase rounded cursor-pointer">Check Our Dogs</a>
        </div>
    </div>
</div>

<div class="container mx-auto">

    <!-- DOGS   -->
    <div class="px-4 py-4">
        <div class="bg-text  py-3 px-3 rounded-md mb-5">
            <h1 class="text-white text-3xl text-center font-bold py-5 lg:text-5xl">Aren't they wonderful?</h1>
            <div class="flex flex-col items-center md:flex md:flex-row md:flex-wrap md:items-center md:justify-evenly md:space-x-3">
                <?php
                $dogsQuery = new WP_Query(array(
                    'post_type'         => 'dog',
                    'posts_per_page'    => 6,
                ));
                while ($dogsQuery->have_posts()) {
                    $dogsQuery->the_post();
                    $dogPhoto = get_field('dog_photo');

                ?>

                    <div class="md:basis-1/4 w-full text-center py-5">
                        <img class="w-40 h-40 rounded-full m-auto pb-4" src="<?php echo esc_url($dogPhoto['sizes']['bannerDog']); ?>" alt="<?php echo esc_attr($dogPhoto['alt']); ?>">
                        <h3 class="font-paytone text-2xl text-white font-semibold lg:text-3xl"><?php echo get_field('dog_name'); ?></h3>
                        <a class="font-poppins text-primary text-sm md:text-base lg:text-lg" href="<?php esc_url(the_permalink()); ?>">Meet <?php echo get_field('dog_name'); ?></a>
                    </div>
                <?php }
                ?>
            </div>
        </div>
    </div>

    <!-- SERVICES   -->
    <div class="bg-bg2 text-center pt-6 pb-3">
        <div class="mb-8">
            <h1 class="text-text font-bold text-4xl pb-5">Our Services</h1>
            <a href="<?php echo esc_url(site_url('contact')); ?>" class="font-poppins bg-secondary hover:bg-primary border border-primary hover:border-secondary border-solid text-text px-2 py-2 my-3 uppercase rounded cursor-pointer">Contact Us</a>
        </div>
        <div class="flex flex-col flex-wrap items-center md:flex-row md:justify-evenly md:items-stretch md:space-x-4 mx-auto px-4">
            <svg style="display:none;">
                <symbol id="1" viewBox="0 0 1440 320" preserveAspectRatio="none">
                    <path fill="white" d="M0,96L20,117.3C40,139,80,181,120,192C160,203,200,181,240,154.7C280,128,320,96,360,117.3C400,139,440,213,480,229.3C520,245,560,203,600,197.3C640,192,680,224,720,208C760,192,800,128,840,122.7C880,117,920,171,960,208C1000,245,1040,267,1080,256C1120,245,1160,203,1200,208C1240,213,1280,267,1320,261.3C1360,256,1400,192,1420,160L1440,128L1440,320L1420,320C1400,320,1360,320,1320,320C1280,320,1240,320,1200,320C1160,320,1120,320,1080,320C1040,320,1000,320,960,320C920,320,880,320,840,320C800,320,760,320,720,320C680,320,640,320,600,320C560,320,520,320,480,320C440,320,400,320,360,320C320,320,280,320,240,320C200,320,160,320,120,320C80,320,40,320,20,320L0,320Z"></path>
                </symbol>
                <symbol id="2" viewBox="0 0 1440 320" preserveAspectRatio="none">
                    <path fill="white" d="M0,224L20,229.3C40,235,80,245,120,245.3C160,245,200,235,240,197.3C280,160,320,96,360,106.7C400,117,440,203,480,218.7C520,235,560,181,600,149.3C640,117,680,107,720,96C760,85,800,75,840,106.7C880,139,920,213,960,245.3C1000,277,1040,267,1080,234.7C1120,203,1160,149,1200,128C1240,107,1280,117,1320,112C1360,107,1400,85,1420,74.7L1440,64L1440,320L1420,320C1400,320,1360,320,1320,320C1280,320,1240,320,1200,320C1160,320,1120,320,1080,320C1040,320,1000,320,960,320C920,320,880,320,840,320C800,320,760,320,720,320C680,320,640,320,600,320C560,320,520,320,480,320C440,320,400,320,360,320C320,320,280,320,240,320C200,320,160,320,120,320C80,320,40,320,20,320L0,320Z"></path>
                </symbol>
                <symbol id="3" viewBox="0 0 1440 320" preserveAspectRatio="none">
                    <path fill="white" d="M0,288L20,261.3C40,235,80,181,120,144C160,107,200,85,240,96C280,107,320,149,360,154.7C400,160,440,128,480,133.3C520,139,560,181,600,170.7C640,160,680,96,720,64C760,32,800,32,840,64C880,96,920,160,960,181.3C1000,203,1040,181,1080,197.3C1120,213,1160,267,1200,250.7C1240,235,1280,149,1320,101.3C1360,53,1400,43,1420,37.3L1440,32L1440,320L1420,320C1400,320,1360,320,1320,320C1280,320,1240,320,1200,320C1160,320,1120,320,1080,320C1040,320,1000,320,960,320C920,320,880,320,840,320C800,320,760,320,720,320C680,320,640,320,600,320C560,320,520,320,480,320C440,320,400,320,360,320C320,320,280,320,240,320C200,320,160,320,120,320C80,320,40,320,20,320L0,320Z"></path>
                </symbol>
            </svg>

            <?php
            $servicesQuery = new WP_Query(array(
                'post_type'         => 'service',
                'posts_per_page'    => -1,
            ));
            while ($servicesQuery->have_posts()) {

                $servicesQuery->the_post();
                $service_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'bannerDog');
            ?>
                <div class="bg-white w-full shadow-card p-0 border-none rounded mb-4 basis-1/4 md:basis-[30%] lg:flex lg:flex-col lg:justify-between">
                    <div class="relative w-full">
                        <img src="<?php if (!empty($service_image_url[0])) echo esc_url($service_image_url[0]); ?>" class="w-full m-auto" alt="<?php echo esc_attr($service_image_url['alt']); ?>">
                        <svg class="absolute bottom-0 left-0 h-20 w-full ">
                            <use xlink:href="#<?php echo rand(1, 3); ?>"></use>
                        </svg>
                    </div>
                    <div class="px-3 pb-4">
                        <h3 class="font-paytone text-text text-2xl font-semibold pb-3"><?php esc_html(the_title()); ?></h3>
                        <p class="font-poppins text-primary text-lg"><a href="<?php esc_url(the_permalink()); ?>">Check service </a></p>
                    </div>
                </div>

            <?php
                wp_reset_postdata();
            }

            ?>
        </div>
    </div>

    <!-- TEAM   -->
    <div class="text-center pt-8 pb-5 px-4">
        <div class="">
            <h1 class="text-text font-bold text-4xl pb-1">Meet Our Team</h1>
            <div class="flex flex-col items-center pb-4 px-4 md:flex md:flex-row md:flex-wrap md:justify-evenly md:items-stretch">
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
                    <div class="flex flex-col items-center justify-between bg-primary w-full sm:w-[75%] md:w-[45%] lg:w-[30%] h-auto rounded-lg py-3 px-5 my-8 shadow-card">
                        <div class="flex-1 w-1/2 lg:w-1/2 order-1 px-2">
                            <img class="rounded-full w-full" src="<?php echo esc_url($teamPhoto['sizes']['bannerDog']); ?>" alt="<?php echo esc_attr($teamPhoto['alt']); ?>">
                        </div>
                        <div class="flex-1 w-1/2 lg:w-1/2 order-2 px-2">
                            <a class="font-paytone text-text hover:text-white text-2xl flex-1 order-1 pr-3 font-semibold" href="<?php esc_url(the_permalink()); ?>"><?php esc_html(the_title()); ?></a>
                        </div>
                        <div class="flex-1 lg:w-1/2 order-3 px-2">
                            <p class="font-poppins text-text flex-1 order-3"><?php echo esc_html(get_field('team_role')); ?></p>
                        </div>

                    </div>
                <?php }
                ?>
            </div>
        </div>
    </div>

    <!-- LATEST POSTS   -->
    <div class="text-center bg-bg2 py-3">
        <h1 class="text-text font-bold text-4xl pb-6">Latest posts</h1>
        <a href="<?php echo esc_url(get_post_type_archive_link('post')); ?>" class="bg-secondary hover:bg-primary border border-primary hover:border-secondary border-solid text-text uppercase px-2 py-3 rounded cursor-pointer">See All Posts</a>
        <div class="flex flex-col items-center md:flex md:flex-row md:flex-wrap md:justify-evenly md:items-stretch lg:space-x-4  px-4">
            <?php
            $postsQuery = new WP_Query(array(
                'post_type'         => 'post',
                'posts_per_page'    =>  3,
                'orderby'           => 'date',
                'order'             => 'DESC'
            ));
            while ($postsQuery->have_posts()) {
                $postsQuery->the_post();
                $postPhoto = get_the_post_thumbnail($post->ID, 'bannerDog');

            ?>
                <div class="bg-white flex flex-col items-center justify-between w-full lg:w-1/4 md:basis-[30%] h-auto rounded-lg pb-3 my-8 shadow-card">
                    <div class="w-full">
                        <img class="w-full rounded-t" alt="<?php echo esc_attr(get_the_title()); ?>" src="<?php echo esc_url(get_the_post_thumbnail_url($post->ID, 'bannerDog')); ?>">
                    </div>
                    <div class="flex flex-col items-center card-body px-2 py-3">
                        <a class="font-paytone text-text text-2xl font-semibold" href="<?php esc_url(the_permalink()); ?>"><?php esc_html(the_title()); ?></a>
                        <a class="font-poppins text-primary text-lg pt-3" href="<?php esc_url(the_permalink()); ?>">Read</a>
                    </div>
                </div>
            <?php }
            ?>
        </div>
    </div>
</div>
<?php


get_footer();
