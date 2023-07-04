<div class="<?php if ( get_sub_field( 'remove_bottom_margin' ) != 1 ) : ?>section <?php endif; ?>max-w-7xl mx-auto px-4">
    <?php $img_acf = GetACFImage( get_sub_field( 'image' ) );

if ( $img_acf ) : ?>

    <div class="h-[300px] lg:h-[450px] overflow-hidden rounded mb-6 lg:mb-12">
        <img class="h-full w-full object-cover" loading="lazy" height="700" width="700"
            src="<?php echo esc_url( $img_acf->get_src()[0] ); ?>"
            title="<?php echo esc_attr( $img_acf->get_title() ); ?>"
            srcset="<?php echo esc_attr( $img_acf->get_srcset() ); ?>"
            sizes="<?php echo esc_attr( $img_acf->get_srcset_sizes() ); ?>"
            alt="<?php echo $img_acf->get_alt_text() ?>">
    </div>
    <?php endif; ?>
    <div class="lg:w-2/3 text-center mx-auto">
        <div class="mb-6 leading-7">
            <?php the_sub_field( 'content' ); ?>

        </div>
        <?php get_template_part( 'template-parts/global/button-primary' ) ?>
    </div>

</div>