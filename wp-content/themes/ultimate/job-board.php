<?php
/*
Template Name: Job Board
*/
?>

<?php get_header(); ?>
<div class="bg-gray-800 pt-48 pb-40 lg:pb-28 section header-clip">
<div class="text-white text-center">
                        <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
                    </div>
  <h1 class="text-center text-white">Job Board</h1>
</div>


<div id="primary" class="max-w-7xl mx-auto section -mt-20 lg:mt-0">
  <main id="main" class="site-main" role="main">

    <?php
    $args = array(
      'post_type' => 'jobs',
      'post_status' => 'publish',
      'posts_per_page' => -1
    );

    $jobs = new WP_Query($args);

    if ($jobs->have_posts()) : ?>
    <div class="grid lg:grid-cols-2 gap-4">
    <?php  while ($jobs->have_posts()) :
        $jobs->the_post();
        $job_data = get_post_field('post_content', get_the_ID());
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('bg-gray-100 p-8 flex flex-col justify-between'); ?>>
          <header class="entry-header flex-grow">
            <h3 class="text-center"><?php the_title(); ?></h3>
          </header>
          <div class="flex lg:space-x-2 flex-wrap flex-row mb-8 justify-center">
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
      endwhile; ?>
      </div>
    <?php endif;
    ?>

  </main>
</div>

<?php get_footer(); ?>