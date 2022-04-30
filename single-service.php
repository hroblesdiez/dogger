<?php
/*
The single page to show a single post of the services
*/

get_header(); ?>
<div class="relative pt-36 pb-0 mx-auto">
    <div class="absolute top-0 h-36 left-0 right-0 opacity-30 -z-10" style="background-image: url(<?php echo get_theme_file_uri('/assets/images/banner-background.png'); ?>)"></div>
</div>
<div id="main" class="flex flex-col">

    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <div class="relative flex flex-rel items-center justify-center min-h-[350px]" style="background:url('<?php echo (has_post_thumbnail()) ? get_the_post_thumbnail_url($post->ID, 'pageBanner') : ''; ?>') no-repeat center;">
                <div class="flex flex-col items-center">
                    <h1 class="text-white font-paytone text-xl md:text-2xl lg:text-3xl text-center uppercase font-semibold z-50"><a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a></h1>
                </div>
                <span class="absolute top-0 left-0 right-0 h-full w-full bg-[rgba(0,0,0,.3)]"></span>
                <!--post-title-->
            </div>
            <div class="font-poppins text-base m-auto mt-10 text-text max-w-[70%]">

                <?php the_content(); ?>

            </div>
            <?php
            $servicePost = get_post();
            $postID = $servicePost->ID;
            ?>

            <div class="flex flex-col flex-wrap items-center max-w-[70%] md:flex md:flex-row md:flex-wrap md:items-stretch md:justify-center mt-10 mx-auto">
                <div class="flex flex-col items-center basis-[25%] py-4 px-2 rounded-[10px] mb-5 md:mb-0    md:mx-6 bg-text">
                    <span class="text-white text-lg mb-3"><?php
                                                            switch ($postID) {
                                                                case 74:
                                                                    echo '<i class="fa-solid fa-hotel"></i>';
                                                                    break;
                                                                case 72:
                                                                    echo '<i class="fa-solid fa-dog"></i>';
                                                                    break;
                                                                case 70:
                                                                    echo '<i class="fa-solid fa-clock"></i>';
                                                                    break;
                                                            } ?>

                    </span>
                    <p class="text-white font-poppins text-base text-center lg:text-lg"><?php
                                                                                        switch ($postID) {
                                                                                            case 74:
                                                                                                echo '55 Dog Beds';
                                                                                                break;
                                                                                            case 72:
                                                                                                echo 'Many Breeds';
                                                                                                break;
                                                                                            case 70:
                                                                                                echo '5 hour day training';
                                                                                                break;
                                                                                        }

                                                                                        ?>
                    </p>
                </div>
                <div class="flex flex-col items-center basis-[25%] py-4 px-2 rounded-[10px] mb-5 md:mb-0 md:mx-6 bg-text">
                    <span class="text-white text-lg mb-3"><?php
                                                            switch ($postID) {
                                                                case 74:
                                                                    echo '<i class="fa-solid fa-person-walking"></i>';
                                                                    break;
                                                                case 72:
                                                                    echo '<i class="fa-solid fa-hotdog"></i>';
                                                                    break;
                                                                case 70:
                                                                    echo '<i class="fa-solid fa-bone"></i>';
                                                                    break;
                                                            } ?>

                    </span>
                    <p class="text-white font-poppins text-base text-center  lg:text-lg"><?php
                                                                                            switch ($postID) {
                                                                                                case 74:
                                                                                                    echo '3 Walks A Day';
                                                                                                    break;
                                                                                                case 72:
                                                                                                    echo 'Well Nourished';
                                                                                                    break;
                                                                                                case 70:
                                                                                                    echo 'Funny Games';
                                                                                                    break;
                                                                                            } ?>



                    </p>
                </div>
                <div class="flex flex-col items-center basis-[25%] py-4 px-2 rounded-[10px] mb-5 md:mb-0 md:mx-6 bg-text">
                    <span class="text-white text-lg mb-3"><?php
                                                            switch ($postID) {
                                                                case 74:
                                                                    echo '<i class="fa-solid fa-shield-dog"></i>';
                                                                    break;
                                                                case 72:
                                                                    echo '<i class="fa-solid fa-heart"></i>';
                                                                    break;
                                                                case 70:
                                                                    echo '<i class="fa-solid fa-trophy"></i>';
                                                                    break;
                                                            } ?>

                    </span>
                    <p class="text-white font-poppins text-base text-center  lg:text-lg"><?php
                                                                                            switch ($postID) {
                                                                                                case 74:
                                                                                                    echo 'Veterinarian';
                                                                                                    break;
                                                                                                case 72:
                                                                                                    echo 'Really Lovely Dogs';
                                                                                                    break;
                                                                                                case 70:
                                                                                                    echo 'Rewards';
                                                                                                    break;
                                                                                            } ?>

                    </p>
                </div>
            </div>

            <div class="flex flex-col items-center mt-16">
                <h1 class="text-text font-paytone text-lg md:text-xl uppercase font-semibold">Our other services</h1>
                <div class="w-full flex flex-col items-center md:flex-row md:items-stretch flex-wrap md:justify-center mx-2 my-3 p-3">
                    <?php
                    $obj = get_queried_object();
                    if ($obj->post_type === 'service') {
                        $postid = $obj->ID;
                    }

                    $args = array(
                        'post_type'                 => 'service',
                        'posts_per_page'            => -1,
                        'post__not_in'              => array($postid),
                    );

                    $otherServices = new WP_Query($args);

                    if ($otherServices->have_posts()) :
                        while ($otherServices->have_posts()) : $otherServices->the_post();
                            $service_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'bannerDog');
                    ?>
                            <div class="bg-white w-full shadow-card p-0 border-none rounded mb-4 basis-1/4 md:basis-[25%] md:mr-6 lg:mr-9 lg:flex lg:flex-col lg:justify-between">
                                <div class="relative w-full">
                                    <img src="<?php if (!empty($service_image_url[0])) echo esc_url($service_image_url[0]); ?>" class="w-full m-auto" alt="<?php echo $service_image_url['alt']; ?>">
                                </div>
                                <div class="flex flex-col justify-between h-full px-3 py-4">
                                    <h3 class="font-paytone text-text text-2xl font-semibold pb-3"><?php the_title(); ?></h3>
                                    <p class="font-poppins text-primary text-sm md:text-base lg:text-lg"><a href="<?php the_permalink(); ?>" target="_self">Check service </a></p>
                                </div>
                            </div>
                    <?php endwhile;
                        wp_reset_postdata();
                    endif; ?>
                </div>

            </div>
            <!--post-contetn-->
        <?php endwhile; ?>
    <?php endif; ?>


</div>
<!--end content-->

<?php get_footer(); ?>