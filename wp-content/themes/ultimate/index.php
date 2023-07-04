<?php get_header();?>
<div class="bg-gray-800 pt-48 pb-40 lg:pb-28 sm:section header-clip">
    <div class="text-white text-center">
        <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
    </div>
    <h1 class="text-center text-white">Blog</h1>
</div>
<div id="content" class="max-w-7xl mx-auto py-8 sm:py-16 px-4" role="main">

    <?php 
                    $the_query = new WP_Query( array(
                        'posts_per_page' => -1,
                    )); 
                    ?>

    <?php if ( $the_query->have_posts() ) : ?>
    <div class="grid lg:grid-cols-3 gap-4">
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <div class="border flex flex-col justify-between rounded-lg overflow-hidden">
            <?php if(has_post_thumbnail()){ ?>

            <?php
                    $img_id = get_post_thumbnail_id();
                    $size = 'large';
                    $img_src = wp_get_attachment_image_url( $img_id, $size );
                    $img_srcset = wp_get_attachment_image_srcset( $img_id, $size );
                    $title = get_post($img_id)->post_title;
                    $alt = isset(get_post_meta($img_id, '_wp_attachment_image_alt')[0]) ? get_post_meta($img_id, '_wp_attachment_image_alt')[0] : $title;
                    $caption = wp_get_attachment_caption($img_id);
                    ?>
            <div
                class="block relative w-ful max-w-full overflow-hidden pb-[56.25%] hover:cursor-pointer h-[225px] lg:h-[250px]">
                <a class="font-light" href="<?php echo get_permalink();?>">
                    <img src="<?php echo esc_url( $img_src ); ?>" data-srcset="<?php echo esc_attr( $img_srcset ); ?>"
                        data-sizes="
                    (max-width: 768px) 800px,
                    (max-width: 1400px) 1400px,
                    (max-width: 2000px) 2000px" alt="<?php echo $alt; ?>"
                        class="absolute top-0 left-0 object-cover object-center w-full h-full lazy">
                </a>
            </div>
            <?php } ?>
            <div class="p-6 flex flex-col justify-between flex-grow">
                <a class="font-light flex-grow" href="<?php echo get_permalink();?>">
                    <h3 class="m-0 text-lg lg:text-2xl text-center"><?php the_title(); ?></h3>
                </a>
                <div class="mt-6 text-center">
                    <a href="<?php echo get_permalink();?>" class="button button-primary w-fit mx-auto">Read More</a>
                </div>
            </div>


        </div>

        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    </div>
    <?php endif; ?>


</div><!-- #content -->

<?php get_footer();?>