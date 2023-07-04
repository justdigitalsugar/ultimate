<section class="<?php if ( get_sub_field( 'remove_bottom_margin' ) != 1 ) : ?>section <?php endif; ?> bg-primary py-12 lg:py-20">
    <div class="container">
        <div class="lg:flex justify-between items-center mb-6">
            <h2 class="lg:mb-0 text-center lg:text-left text-white">Sectors we work in</h2>
            <?php $link = get_sub_field( 'link' ); 
                     $target = ! empty( $link['target'] ) ? ' target="' . $link['target'] . '"' : '';
                     if ( $link && $link['target'] == '_blank' ) {
                         $target .= ' rel="noopener noreferrer"';
                     }
                    ?>
                    <?php if ( $link ) : ?>
                    <a class="button button-primary mt-0 hidden lg:block" href="<?php echo esc_url( $link['url'] ); ?>"
                    <?php echo $target; ?>><?php echo esc_html( $link['title'] ); ?></a>
                    <?php endif; ?>
        </div>
        <?php
    $args = array(
      'post_type' => 'sectors',
      'post_status' => 'publish',
      'posts_per_page' => 6
    );

    $jobs = new WP_Query($args);

    if ($jobs->have_posts()) : ?>
        <div class="grid lg:grid-cols-3 gap-4">
            <?php  while ($jobs->have_posts()) :
        $jobs->the_post();
        $job_data = unserialize(get_post_field('post_content', get_the_ID()));
        ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('bg-white p-8 flex flex-col justify-between rounded-lg text-center'); ?>>
                <header class="entry-header flex-grow">
                    <h3 class="entry-title"><?php the_title(); ?></h3>
                </header>


                <a href="<?php the_permalink(); ?>" class="button button-primary w-fit mx-auto">Find out more</a>


            </article>
            <?php
      wp_reset_postdata();
      endwhile; ?>
        </div>
        <?php endif;
    ?>
    </div>

</section>