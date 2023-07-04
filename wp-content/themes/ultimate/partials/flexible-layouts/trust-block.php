<section class="max-w-7xl mx-auto px-4 <?php if ( get_sub_field( 'remove_bottom_margin' ) != 1 ) : ?>section <?php endif; ?>">

    <?php if(get_sub_field('alt_layout') != 1): ?>
        <div class="lg:flex flex-wrap">
        <div class="lg:w-1/2 lg:pr-20 pb-10 lg:pb-0">
            <div class=""><?php the_sub_field('content');?></div>

            <div class="text-center lg:text-left">
             <?php get_template_part( 'template-parts/global/button-primary' ) ?>
            </div>

        </div>
        <div class="lg:w-1/2">

        <?php if ( have_rows( 'images' ) ) : ?>
            <div class="flex flex-wrap justify-center">
				<?php while ( have_rows( 'images' ) ) : the_row(); ?>
                <?php $img_acf = GetACFImage( get_sub_field( 'image' ) );

                if ( $img_acf ) : ?>
                <div class="mb-2 lg:mb-0 w-1/3">
                    <div class="px-1 lg:px-2">
                        <div class="border flex items-center justify-center bg-white lg:mb-4 h-20 lg:h-36 p-2">
                        <img class='w-full h-full object-contain' src="<?php echo esc_url( $img_acf->get_src()[0] ); ?>"
                        title="<?php echo esc_attr( $img_acf->get_title() ); ?>"
                        srcset="<?php echo esc_attr( $img_acf->get_srcset() ); ?>"
                        sizes="<?php echo esc_attr( $img_acf->get_srcset_sizes() ); ?>"
                        alt="<?php echo $img_acf->get_alt_text() ?>"  loading="lazy" height="100" width="50">
                    </div>
                    </div>
                    
                    
                </div>

                <?php endif; ?>
				<?php endwhile; ?>
                </div>
			<?php endif; ?>
           
        </div>
    </div>
    <?php else: ?>

        <?php if(get_sub_field('content')) :?>
            <div class="text-center mb-6"><?php the_sub_field('content');?></div>
        <?php endif;?>

        <?php if ( have_rows( 'images' ) ) : ?>
            <div class="flex flex-wrap justify-center">
				<?php while ( have_rows( 'images' ) ) : the_row(); ?>
                <?php $img_acf = GetACFImage( get_sub_field( 'image' ) );

                if ( $img_acf ) : ?>
                <div class="mb-2 lg:mb-0 w-1/3 lg:w-1/6">
                    <div class="px-1 lg:px-2">
                        <div class="border flex items-center justify-center bg-white lg:mb-4 h-20 lg:h-36 p-2">
                        <img class='w-[90%] h-full object-contain' src="<?php echo esc_url( $img_acf->get_src()[0] ); ?>"
                        title="<?php echo esc_attr( $img_acf->get_title() ); ?>"
                        srcset="<?php echo esc_attr( $img_acf->get_srcset() ); ?>"
                        sizes="<?php echo esc_attr( $img_acf->get_srcset_sizes() ); ?>"
                        alt="<?php echo $img_acf->get_alt_text() ?>" loading="lazy">
                    </div>
                    </div>
                    
                    
                </div>

                <?php endif; ?>
				<?php endwhile; ?>
                </div>
			<?php endif; ?>

            <div class="text-center">
            <?php get_template_part( 'template-parts/global/button-primary' ) ?>
            </div>
           
    <?php endif; ?>



</section>