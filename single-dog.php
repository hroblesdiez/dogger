<?php
/*
The single page to show a single post from dogs 
*/

get_header(); ?>
<div class="relative pt-36 pb-0 mx-auto">
    <div class="absolute top-0 h-36 left-0 right-0 opacity-30 -z-10" style="background-image: url(<?php echo esc_url(get_theme_file_uri('/assets/images/banner-background.png')); ?>)"></div>
</div>
<div id="main" class="flex flex-col">

    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <div class="relative flex flex-rel items-center justify-center min-h-[350px]" style="background:url('<?php echo esc_url((has_post_thumbnail()) ? get_the_post_thumbnail_url($post->ID) : get_field('dog_photo')['url']); ?>') no-repeat center; background-size:cover;">
                <div class="flex flex-col items-center">
                    <h1 class="text-white font-paytone text-xl md:text-2xl lg:text-3xl text-center uppercase font-semibold z-50"><a href="<?php esc_url(the_permalink()); ?>"><?php esc_html(the_title()); ?> </a></h1>
                </div>
                <span class="absolute top-0 left-0 right-0 h-full w-full bg-[rgba(0,0,0,.3)]"></span>
                <!--post-title-->
            </div>
            <div class="font-poppins text-base m-auto mb-10 text-text max-w-[70%] mt-10">

                <?php the_content(); ?>
                <div>
                    <h2 class="font-paytone text-text text-lg md:text-xl lg:text-2xl mt-7"><?php esc_html(the_title()); ?>'s friends: </h2>
                    <div class="w-full flex flex-col items-center md:flex-row md:items-stretch flex-wrap md:justify-evenly mx-2 my-3 p-3">
                        <?php
                        $obj = get_queried_object();
                        if ($obj->post_type === 'dog') {
                            $postid = $obj->ID;
                        }

                        $args = array(
                            'post_type'                 => 'dog',
                            'posts_per_page'            => 3,
                            'post__not_in'              => array($postid),
                        );

                        $dogFriends = new WP_Query($args);

                        if ($dogFriends->have_posts()) :
                            while ($dogFriends->have_posts()) : $dogFriends->the_post();
                                $terms = wp_get_post_terms(get_the_ID(), array('breed', 'sex', 'age', 'weight'), ['fields' => 'names']);
                        ?>
                                <div class="md:basis-[45%] lg:basis-[25%] lg:mr-4 w-[80%] sm:w-[70%] text-center mb-4 py-5 bg-secondary shadow-lg rounded-xl md:mx-3">
                                    <img class="w-40 h-40 rounded-full m-auto pb-4 opacity-70 hover:opacity-100 transition-all .3s ease-in" src="<?php echo esc_url(get_field('dog_photo')['sizes']['bannerDog']); ?>" alt="<?php echo esc_attr($dogPhoto['alt']); ?>">
                                    <a href="<?php esc_url(the_permalink()); ?>">
                                        <h3 class="font-paytone text-2xl text-text font-semibold lg:text-3xl hover:text-primary"><?php esc_html(the_title()); ?></h3>
                                    </a>
                                    <p class="text-text text-base font-poppins">Breed: <?php echo esc_html($terms[2]); ?></p>
                                    <p class="text-text text-base font-poppins">Sex: <?php echo esc_html($terms[3]);  ?></p>
                                    <p class="text-text text-base font-poppins">Age: <?php echo esc_html($terms[1]) . ' years';  ?></p>
                                    <p class="text-text text-base font-poppins">Weight: <?php echo esc_html($terms[0]) . ' kg';  ?></p>

                                </div>
                        <?php endwhile;
                        endif;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
            <!--post-content-->
        <?php endwhile; ?>
    <?php endif; ?>


</div>
<!--end content-->

<?php get_footer(); ?>