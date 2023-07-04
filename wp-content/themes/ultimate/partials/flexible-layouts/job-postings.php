<section class="<?php if ( get_sub_field( 'remove_bottom_margin' ) != 1 ) : ?>section <?php endif; ?> bg-gray-800 py-12 lg:py-20">
    <div class="container">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-white lg:mb-0">Recent Jobs</h2>
            <?php $link = get_sub_field( 'link' ); 
                     $target = ! empty( $link['target'] ) ? ' target="' . $link['target'] . '"' : '';
                     if ( $link && $link['target'] == '_blank' ) {
                         $target .= ' rel="noopener noreferrer"';
                     }
                    ?>
                    <?php if ( $link ) : ?>
                    <a class="button button-primary mt-0" href="<?php echo esc_url( $link['url'] ); ?>"
                    <?php echo $target; ?>><?php echo esc_html( $link['title'] ); ?></a>
                    <?php endif; ?>
        </div>
        <?php
    $args = array(
      'post_type' => 'jobs',
      'post_status' => 'publish',
      'posts_per_page' => 6
    );

    $jobs = new WP_Query($args);

    if ($jobs->have_posts()) : ?>
        <div class="grid lg:grid-cols-3 gap-4">
            <?php  while ($jobs->have_posts()) :
        $jobs->the_post();
        $job_data = get_post_field('post_content', get_the_ID());
        ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('bg-gray-100 p-8 flex flex-col justify-between rounded-lg'); ?>>
                <header class="entry-header flex-grow text-center">
                    <h3><?php the_title(); ?></h3>
                </header>
                <div class="flex lg:space-x-2 flex-wrap flex-row justify-center">
                <div class="flex items-center mb-2">
                        <div class="bg-primary text-white inline-block py-1 px-4 rounded-full">
                            <p class="mb-0 capitalize"><?php the_field('location');?></p>
                        </div>
                    </div>
                    <div class="flex items-center mb-2">
                        <div class="bg-primary text-white inline-block py-1 px-4 rounded-full">
                            <p class="mb-0 capitalize"><?php the_field('salary');?></p>
                        </div>
                    </div>
                </div>

                <a href="<?php the_permalink(); ?>" class="button button-primary w-fit mx-auto">View job</a>


            </article>
            <?php
      wp_reset_postdata();
      endwhile; ?>
        </div>
        <?php endif;
    ?>
    </div>

</section>