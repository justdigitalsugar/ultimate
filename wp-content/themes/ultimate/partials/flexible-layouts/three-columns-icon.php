<section class="<?php if ( get_sub_field( 'remove_bottom_margin' ) != 1 ) : ?>section <?php endif; ?>">
    <div class="container">
    <div class="lg:w-2/3 mb-8 lg:mb-8 text-center mx-auto">
        <div class="mb-6 leading-7">
            <?php the_sub_field( 'content' ); ?>
        </div>
        <?php get_template_part( 'template-parts/global/button-primary' ) ?>
    </div>

    <?php if ( have_rows( 'columns' ) ) : ?>
    <div class="grid lg:grid-cols-3 gap-4 lg:gap-4">
        <?php while ( have_rows( 'columns' ) ) : the_row(); ?>
        <div class="bg-gray-100 p-4 lg:p-8 relative overflow-hidden rounded-lg">
            <?php $img_acf = GetACFImage( get_sub_field( 'icon' ) );

        if ( $img_acf ) : ?>
            <div class="h-16 w-16 lg:h-20 lg:w-20 rounded-full bg-primary border p-4 mb-6 relative z-10">
                <img class="h-full w-full object-contain invert" loading="lazy" height="200" width="200"
                    src="<?php echo esc_url( $img_acf->get_src()[0] ); ?>"
                    title="<?php echo esc_attr( $img_acf->get_title() ); ?>"
                    srcset="<?php echo esc_attr( $img_acf->get_srcset() ); ?>"
                    sizes="<?php echo esc_attr( $img_acf->get_srcset_sizes() ); ?>"
                    alt="<?php echo $img_acf->get_alt_text() ?>">
            </div>


            <?php endif; ?>

            <h3 class="text-lg lg:text-2xl"><?php the_sub_field( 'heading' ); ?></h3>
            <div class="">
                <?php the_sub_field( 'content' ); ?>
            </div>
            <div class="text-center lg:text-left">
                    <?php get_template_part( 'template-parts/global/button-primary' ) ?>
                </div>


            <div class="absolute -right-32 -bottom-32 h-60 w-60 bg-secondary bg-opacity-30 rounded-full"></div>
        </div>

        <?php endwhile; ?>
    </div>
    <?php else : ?>
    <?php // no rows found ?>
    <?php endif; ?>

    </div>
    
</section>