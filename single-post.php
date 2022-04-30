<?php
/*
The single page to show a single post from the blog 
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
            <div class="font-poppins text-base m-auto mb-10 text-text max-w-[70%] mt-3">
                <p class="font-poppins text-text text-sm mb-5"><span class="mr-2"><i class="fa-solid fa-user"></i></span><?php the_author_posts_link(); ?> | <?php echo get_the_date('j F,Y'); ?> | <?php echo get_the_category_list(', '); ?></p>
                <?php the_content(); ?>
            </div>
            <div class="flex flex-col items-start font-poppins text-base mb-10 text-text mt-3 lg:justify-start lg:items-center">
                <h2 class="text-text font-paytone text-base md:text-lg lg:text-xl text-left font-semibold mb-5">Maybe you are interested also in:</h2>
                <div class="flex flex-col flex-wrap w-full items-center md:flex-row md:items-stretch md:justify-center">
                    <?php
                    $obj = get_queried_object();
                    $post_categories = wp_get_post_categories(get_the_ID());

                    if ($obj->post_type === 'post') {
                        $postid = $obj->ID;
                    }

                    $args = array(
                        'post_type'                 => 'post',
                        'posts_per_page'            => 3,
                        'post__not_in'              => array($postid),
                        'category__in'              => $post_categories
                    );

                    $relatedPosts = new WP_Query($args);

                    if ($relatedPosts->have_posts()) :
                        while ($relatedPosts->have_posts()) : $relatedPosts->the_post(); ?>

                            <div class="bg-white flex flex-col items-center justify-start w-full md:w-2/5 md:mr-6 lg:w-[20%] h-auto rounded-lg my-8 lg:my-0 shadow-card">

                                <div class="w-full relative">
                                    <img class="w-full rounded-t" src="<?php echo get_the_post_thumbnail_url($post->ID, 'bannerDog'); ?>" alt="<?php echo get_the_title(); ?>">
                                    <span class="absolute top-0 left-0 right-0 h-full w-full bg-[rgba(0,0,0,.5)]"></span>
                                    <h2 class="font-paytone text-white text-center hover:text-primary transition-all ease-in duration-300 text-2xl font-semibold absolute top-[50%] md:top-[30%] px-2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <p class="font-poppins text-white text-center  text-sm absolute top-[80%] md:top-[60%] px-2">Posted by <?php the_author_posts_link(); ?> | <?php echo get_the_date('j F,Y'); ?> | <?php echo get_the_category_list(', '); ?></p>
                                </div>
                            </div>
                    <?php endwhile;
                    endif;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>


            <!--post-content-->
        <?php endwhile; ?>
    <?php endif; ?>


</div>
<!--end content-->

<?php get_footer(); ?>