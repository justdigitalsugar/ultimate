<section class="<?php if ( get_sub_field( 'remove_bottom_margin' ) != 1 ) : ?>section <?php endif; ?> bg-gray-100 py-12 lg:py-28">
    <div class="container">
        <div class="">
            <div class="text-center">
                <?php the_sub_field('content');?>
            </div>

            <div class="overflow-hidden glide" id="single-posts">
                <div class="glide__track" data-glide-el="track">
                    <div class="glide__slides w-full flex items-stretch">
                        <?php $temp = $wp_query; $wp_query= null; $wp_query = new WP_Query(); $wp_query->query('posts_per_page=5' . '&paged='.$paged); while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                        <article class="relative bg-white glide__slide">
                            <a aria-label="Read more of the article"
                                class="block h-full overflow-hidden font-normal no-underline text-inherit hover:opacity-100"
                                href="<?php the_permalink(); ?>" title="Read more">

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
                                    class="block relative w-ful max-w-full overflow-hidden pb-[56.25%] video hover:cursor-pointer img-overlay h-[275px] lg:h-[300px]">
                                    <img src="<?php echo esc_url( $img_src ); ?>"
                                        data-srcset="<?php echo esc_attr( $img_srcset ); ?>" data-sizes="
                                    (max-width: 768px) 800px,
                                    (max-width: 1400px) 1400px,
                                    (max-width: 2000px) 2000px" alt="<?php echo $alt; ?>"
                                        class="absolute top-0 left-0 object-cover object-center w-full h-full lazy">
                                </div>
                                <?php } ?>

                                <div class="p-6 pt-4 pb-6 xl:!pb-0 xl:p-8 xl:pt-3">
                                    <h3 class="mb-4 text-2xl leading-normal">
                                        <?php the_title(); ?>
                                    </h3>
                                </div>
                            </a>
                        </article>
                        <?php endwhile; ?>

                        <?php wp_reset_query(); ?>

                    </div>
                </div>
                <div class="glide__arrows mt-4 text-center" data-glide-el="controls">
                        <button class="glide__arrow glide__arrow--prev bg-gray-800 p-3 rounded" data-glide-dir="&lt;"
                            aria-label="Previous">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                            </svg>
                        </button>
                        <button class="glide__arrow glide__arrow--next bg-gray-800 p-3 rounded" data-glide-dir="&gt;"
                            aria-label="Next">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </button>
                    </div>
            </div>


        </div>
    </div>
</section>