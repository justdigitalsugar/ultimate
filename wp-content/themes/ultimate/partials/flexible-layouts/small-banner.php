<section class="<?php if ( get_sub_field( 'remove_bottom_margin' ) != 1 ) : ?>mb-6 lg:mb-20 <?php endif; ?>">
    <div
        class="header-clip  after:absolute after:h-full after:w-full after:top-0 after:left-0 after after:bg-gray-800/90">
        <div class="relative large-hero py-40 lg:pt-40 lg:pb-32">

            <div class="relative z-50 max-w-7xl flex items-center">
                <div class="w-full lg:w-1/2 text-center lg:text-left">
                    <div class="text-white">
                        <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
                    </div>
                    <h1 class="text-white"><?php the_sub_field('heading');?></h1>

                    <?php $button_link = get_sub_field( 'button' ); ?>
                    <?php if ( $button_link ) : ?>
                    <div class="">
                        <a class="button button-primary"
                            href="<?php echo esc_url( $button_link['url'] ); ?>"><?php echo esc_html( $button_link['title'] ); ?></a>
                    </div>

                    <?php endif; ?>
                </div>
                <?php if ( get_sub_field( 'hide_form' ) != 1 ) : ?>
                    <?php if(get_sub_field('form')) :?>
                <div class="w-1/2 hidden lg:block pl-12">
                    <div class="bg-primary py-8 px-20 z-50 rounded-lg relative text-white">
                         <div class="relative z-20">
                        <div class="">
                            <h3 class="text-center text-3xl mb-0">Request a call</h3>
                        </div>

                        <div class="relative z-30 w-full mx-auto bg-dark lg:flex">
                            <div class="w-full">
                                <?php the_sub_field( 'form' ); ?>
                            </div>
                        </div>
                    </div>
                    <img class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 h-[70%] w-[70%] object-contain invert opacity-20" loading="lazy" height="200" width="200" src="<?php echo get_site_url(); ?>/wp-content/uploads/2023/04/RC_black.png" title="RC_black" srcset="<?php echo get_site_url(); ?>/wp-content/uploads/2023/04/RC_black.png 1424w, <?php echo get_site_url(); ?>/wp-content/uploads/2023/04/RC_black-300x300.png 300w, <?php echo get_site_url(); ?>/wp-content/uploads/2023/04/RC_black-1024x1024.png 1024w, <?php echo get_site_url(); ?>/wp-content/uploads/2023/04/RC_black-150x150.png 150w, <?php echo get_site_url(); ?>/wp-content/uploads/2023/04/RC_black-768x768.png 768w" sizes="(max-width: 1424px) 100vw, 1424px" alt="">
                    </div>
                </div>
                <?php endif; ?>
                <?php endif; ?>
            </div>
            <?php $img_acf = GetACFImage( get_sub_field( 'image' ) );

        if ( $img_acf ) : ?>
            <img class='absolute left-0 top-0 h-full w-full object-cover'
                src="<?php echo esc_url( $img_acf->get_src()[0] ); ?>"
                title="<?php echo esc_attr( $img_acf->get_title() ); ?>"
                srcset="<?php echo esc_attr( $img_acf->get_srcset() ); ?>"
                sizes="<?php echo esc_attr( $img_acf->get_srcset_sizes() ); ?>"
                alt="<?php echo $img_acf->get_alt_text() ?>" height="700" width="1000">

            <?php endif; ?>

        </div>

    </div>

    <?php if ( get_sub_field( 'hide_form' ) != 1 ) : ?>
        <?php if(get_sub_field('form')) :?>
    <div class="px-4 lg:hidden mb-16">
    <div class="bg-primary py-8 px-4 z-50 rounded-lg relative">
                         <div class="relative z-20">
                        <div class="">
                            <h3 class="text-center text-3xl text-white mb-0">Request a call</h3>
                        </div>

                        <div class="relative z-30 w-full mx-auto bg-dark lg:flex">
                            <div class="w-full">
                                <?php the_sub_field( 'form' ); ?>
                            </div>
                        </div>
                    </div>
                    <img class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 h-[70%] w-[70%] object-contain invert opacity-20" loading="lazy" height="200" width="200" src="<?php echo get_site_url(); ?>/wp-content/uploads/2023/04/RC_black.png" title="RC_black" srcset="<?php echo get_site_url(); ?>/wp-content/uploads/2023/04/RC_black.png 1424w, <?php echo get_site_url(); ?>/wp-content/uploads/2023/04/RC_black-300x300.png 300w, <?php echo get_site_url(); ?>/wp-content/uploads/2023/04/RC_black-1024x1024.png 1024w, <?php echo get_site_url(); ?>/wp-content/uploads/2023/04/RC_black-150x150.png 150w, <?php echo get_site_url(); ?>/wp-content/uploads/2023/04/RC_black-768x768.png 768w" sizes="(max-width: 1424px) 100vw, 1424px" alt="">
                    </div>
    </div>

    <?php endif; ?>
    <?php endif; ?>

</section>