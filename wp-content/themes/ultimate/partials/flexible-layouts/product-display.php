<section class="<?php if (get_sub_field('remove_bottom_margin') != 1): ?> section<?php endif; ?>">
    <div class="container">

        <?php if(get_sub_field('sub_heading')): ?>
        <p class="text-lg font-medium mb-3 text-center uppercase">
            <?php the_sub_field('sub_heading'); ?>
        </p>
        <?php endif;?>
        <div class="mb-10 text-center">
            <?php the_sub_field('content'); ?>
        </div>

        <div class="overflow-hidden carousel">
            <div class="glide__track" data-glide-el="track">
                <div class="glide__slides w-full flex items-stretch">

                    <?php
                    $cat_id = get_sub_field("product_category");
                    $display_type = get_sub_field('display_type');

                    var_dump($cat_id);
                    var_dump($display_type);

                    switch ($display_type) {

                        case 'Sub Categories':

                            var_dump($cat_id);
                            $args = array(
                                'parent' => $cat_id,
                                'hide_empty' => false,
                                'taxonomy' => 'product_cat',
                                'orderby' => 'name',
                                'order' => 'ASC',
                            );

                            $subcategories = get_categories($args);

                            if ($subcategories): ?>


                                <?php foreach ($subcategories as $subcategory):

                                    $thumbnail_id = get_term_meta($subcategory->term_id, 'thumbnail_id', true);
                                    $thumbnail = wp_get_attachment_url($thumbnail_id);

                                    ?>

                                    <div
                                        class="glide__slide mb-4  text-center border border-dashed border-gray-300 rounded overflow-hidden bg-white">
                                        <a href="<?php echo get_term_link($subcategory->slug, 'product_cat') ?>">
                                            <div class="h-[150px] lg:h-[250px] w-full rounded">
                                                <img src="<?php echo $thumbnail; ?>" class="block object-contain w-full h-full relative"
                                                    height="600" width="600" loading="lazy" alt="<?php the_title(); ?>">

                                            </div>
                                            <div class=" p-6 lg:p-8">
                                                <h3 class="text-xl font-semibold mb-6">
                                                    <?php echo $subcategory->name ?>
                                                </h3>
                                            </div>
                                        </a>
                                    </div>


                                <?php endforeach; ?>

                            <?php endif;

                            break;

                        case 'Products':

                            $args = array(
                                'posts_per_page' => 16,
                                'post_type' => 'product',
                                'post_status' => 'publish',
                                'order' => 'ASC',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'product_cat',
                                        'field' => 'term_id',
                                        'terms' => $cat_id,
                                        'operator' => 'IN',
                                    ),
                                )
                            );
                            $loop = new WP_Query($args);

                            if ($loop->have_posts()): ?>

                                <!-- the loop -->
                                <?php while ($loop->have_posts()):
                                    $loop->the_post();
                                    $product = wc_get_product( get_the_ID() );
                                    ?>
                                    <div
                                        class="glide__slide mb-4  text-center border border-dashed border-gray-300 rounded overflow-hidden bg-white">
                                        <a href="<?php the_permalink(); ?>">
                                            <div class="h-[150px] lg:h-[250px] w-full rounded">
                                                <?php echo get_the_post_thumbnail($post_id, 'full', array('class' => 'w-full h-full object-contain rounded')); ?>
                                            </div>
                                            <div class=" p-6 lg:p-8">
                                                <h3 class="text-xl font-semibold mb-6 uppercase">
                                                    <?php the_title(); ?>
                                                </h3>
                                                <p class="lg:text-lg w-1/2 text-right font-bold"><?php echo $product->get_price_html(); ?></p>
                                            </div>

                                        </a>
                                    </div>
                                <?php endwhile; ?>
                                <!-- end of the loop -->
                            <?php endif;

                            break;

                        case 'Main Categories':

                            // Taxonomy for product categories
                            $taxonomy = 'product_cat';

                            // Get parent product categories
                            $categories = get_terms( $taxonomy, array( 'parent' => 0, 'orderby' => 'slug', 'hide_empty' => true ) );


                            if ($categories): ?>


                                <?php foreach ($categories as $category):

                                    $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                                    $thumbnail = wp_get_attachment_url($thumbnail_id);

                                    ?>

                                    <div
                                        class="glide__slide mb-4  text-center rounded overflow-hidden bg-white">
                                        <a href="<?php echo get_term_link($category->slug, 'product_cat') ?>">
                                            <div class="h-[150px] lg:h-[250px] w-full rounded">
                                                <img src="<?php echo $thumbnail; ?>" class="block object-contain w-full h-full relative"
                                                    height="600" width="600" loading="lazy" alt="<?php the_title(); ?>">

                                            </div>
                                            <div class="p-6 lg:p-8">
                                                <h3 class="text-xl font-semibold mb-6">
                                                    <?php echo $category->name;?>
                                                </h3>
                                            </div>
                                        </a>
                                    </div>


                                <?php endforeach; ?>

                            <?php endif;

                            break;

                    } //end switch
                    ?>


                </div>
            </div>
            <div class="glide__arrows mt-6  text-center" data-glide-el="controls">
                <button class="glide__arrow glide__arrow--prev bg-primary p-3" data-glide-dir="&lt;"
                    aria-label="Previous">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                    </svg>
                </button>
                <button class="glide__arrow glide__arrow--next bg-primary p-3" data-glide-dir="&gt;"
                    aria-label="Next">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <?php $button_link = get_sub_field('link'); ?>
    <?php if ($button_link): ?>
        <div class="text-center mt-10 block">
            <a class="button w-fit text-center mx-auto" href="<?php echo esc_url($button_link['url']); ?>"
                target="<?php echo esc_attr($button_link['target']); ?>">
                <span>
                    <?php echo esc_html($button_link['title']); ?>
                </span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-3" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                </svg>
            </a>
        </div>
    <?php endif; ?>



</section>