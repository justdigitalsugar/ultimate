<section class="<?php if ( get_sub_field( 'remove_bottom_margin' ) != 1 ) : ?>section <?php endif; ?>">
    <div class="relative block px-4 xl:px-0 large-hero py-12 lg:py-32">

        <div class="relative max-w-5xl mx-auto p-4 z-30 border border-white lg:p-12 text-center">
            <div>
                <div class="text-white text-lg">
                    <?php the_sub_field( 'content' ); ?>
                </div>
                <?php get_template_part( 'template-parts/global/button-primary' ) ?>
            </div>
        </div>
        <?php $img_acf = GetACFImage( get_sub_field( 'image' ) );

    if ( $img_acf ) : ?>
        <div class="absolute left-0 top-0 h-full w-full">
            <img class='h-full w-full object-cover' src="<?php echo esc_url( $img_acf->get_src()[0] ); ?>"
                title="<?php echo esc_attr( $img_acf->get_title() ); ?>"
                srcset="<?php echo esc_attr( $img_acf->get_srcset() ); ?>"
                sizes="<?php echo esc_attr( $img_acf->get_srcset_sizes() ); ?>"
                alt="<?php echo $img_acf->get_alt_text() ?>"  loading="lazy" height="700" width="700">
        </div>

        <?php endif; ?>

    </div>

</section>