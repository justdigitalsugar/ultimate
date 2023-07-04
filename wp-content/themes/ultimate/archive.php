<?php get_header(); ?>
<div class="bg-black py-12">
    <h1 class="text-center text-white"><?php echo get_the_archive_title( '', false ); ?></h1>
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
        <div class="p-4 lg:p-8 border text-center flex flex-col justify-between">
            <a class="font-light" href="<?php echo get_permalink();?>">
                <h3 class="m-0 text-lg lg:text-xl uppercase"><?php the_title(); ?></h3>
            </a>
            <div class="mt-6">
                <a href="<?php echo get_permalink();?>" class="button">Read More</a>
            </div>

        </div>

        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    </div>
    <?php endif; ?>


</div><!-- #content -->

<?php get_footer(); ?>