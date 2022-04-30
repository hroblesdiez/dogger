<?php
/*
The single page to show a single post from team  
*/

get_header(); ?>
<div class="relative pt-36 pb-0 mx-auto">
    <div class="absolute top-0 h-36 left-0 right-0 opacity-30 -z-10" style="background-image: url(<?php echo get_theme_file_uri('/assets/images/banner-background.png'); ?>)"></div>
</div>
<div id="main" class="flex flex-col lg:flex lg:flex-row lg:items-stretch lg:justify-center max-w-[70%] mx-auto my-8">

    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>

            <div class="relative lg:basis-[40%] lg:mr-6 flex flex-rel items-center justify-center min-h-[350px]" style="background-image:url('<?php echo get_field('team_photo')['url']; ?>'); background-repeat:no-repeat; background-position:50% 20%;  background-size: cover;">
                <div class="flex flex-col mb-8">
                    <h1 class="text-white font-paytone text-xl md:text-2xl lg:text-3xl relative top-36 text-center uppercase font-semibold z-50"><a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a></h1>
                    <h3 class="text-white font-poppins text-lg md:text-xl relative top-[150px] text-center capitalize z-50"><?php echo get_field('team_role'); ?></h3>
                </div>
                <span class="absolute top-0 left-0 right-0 h-full w-full bg-[rgba(0,0,0,.3)]"></span>
                <!--post-title-->
            </div>
            <div class="flex flex-col items-start justify-between lg:basis-[60%] font-poppins text-base text-text lg:max-w-[70%] mt-10 lg:mt-0">
                <div><?php the_content(); ?></div>
                <div class="flex flex-row items-center justify-start mt-6">
                    <span class="text-2xl pr-3 text-text hover:text-primary"><a href=""><i class="fa-brands fa-facebook"></i></span></a>
                    <span class="text-2xl pr-3 text-text hover:text-primary"><a href=""><i class="fa-brands fa-twitter"></i></span></a>
                    <span class="text-2xl pr-3 text-text hover:text-primary"><a href=""><i class="fa-brands fa-linkedin"></i></span></a>
                </div>
            </div>
</div>
<!--end main -->
<div class="max-w-[75%] mx-auto mt-20">
    <h2 class="text-center font-paytone text-text text-lg md:text-xl lg:text-2xl mt-7"><?php the_title(); ?>'s mates: </h2>
    <div class="w-full flex flex-col items-center md:flex-row md:items-stretch flex-wrap md:justify-evenly mx-2 my-3 p-3">
        <?php
            $obj = get_queried_object();
            if ($obj->post_type === 'team') {
                $postid = $obj->ID;
            }

            $args = array(
                'post_type'                 => 'team',
                'posts_per_page'            => 3,
                'post__not_in'              => array($postid),
                'meta_key'                  => 'team_order',
                'orderby'                   => 'meta_val_num',
                'order'                     => 'ASC'
            );

            $teamMates = new WP_Query($args);

            if ($teamMates->have_posts()) :
                while ($teamMates->have_posts()) : $teamMates->the_post(); ?>
                <div class="flex flex-col flex-wrap md:mx-2 items-center justify-between lg:flex lg:flex-col lg:justify-evenly lg:basis-[25%]  bg-secondary bg-opacity-60 w-full sm:w-3/5 md:w-1/3 h-auto rounded-lg py-6 px-1 my-8 shadow-card">

                    <a class="font-paytone text-text text-center hover:text-primary transition-colors ease-in duration-300 text-2xl flex-1 w-full lg:w-1/2 pb-3 font-semibold" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    <div class="w-[50%] flex-1 flex flex-col items-center justify-center"><a href="<?php the_permalink(); ?>"><img class="rounded-full w-full max-h-[65%] object-cover cursor-pointer" src="<?php echo get_field('team_photo')['url']; ?>"></a></div>
                    <p class="font-poppins text-text text-center flex-1 w-full order-3 text-base"><?php echo get_field('team_role'); ?></p>

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