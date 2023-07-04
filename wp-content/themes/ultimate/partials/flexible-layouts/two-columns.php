    <div
        class="<?php if ( get_sub_field( 'remove_bottom_margin' ) != 1 ) : ?>section <?php endif; ?>relative  <?php if ( get_sub_field( 'reverse_columns' ) == 1 ) : ?> bg-after-reverse <?php else: ?> bg-after <?php endif; ?>">
        <div class="max-w-7xl mx-auto lg:flex lg:items-center relative z-20">
            <div
                class="relative lg:w-6/12 <?php if ( get_sub_field( 'reverse_columns' ) == 1 ) : ?>lg:order-last <?php endif; ?> pb-8 lg:pb-0">
                <?php $img_acf = GetACFImage( get_sub_field( 'image' ) );

            if ( $img_acf ) : ?>

                    <img class="aspect-square rounded-full w-4/5 lg:w-full mx-auto" loading="lazy" height="700"
                        width="700" src="<?php echo esc_url( $img_acf->get_src()[0] ); ?>"
                        title="<?php echo esc_attr( $img_acf->get_title() ); ?>"
                        srcset="<?php echo esc_attr( $img_acf->get_srcset() ); ?>"
                        sizes="<?php echo esc_attr( $img_acf->get_srcset_sizes() ); ?>"
                        alt="<?php echo $img_acf->get_alt_text() ?>">
                <?php endif; ?>

            </div>
            <div
                class="<?php if ( get_sub_field( 'reverse_columns' ) == 1 ) : ?> lg:pr-16 <?php else : ?>lg:pl-16 <?php endif; ?> lg:w-6/12 block-style">
                <?php if ( get_sub_field('subheading') ) : ?>
                <p class="text-black-400"><?php the_sub_field( 'subheading' ); ?></p>
                <?php endif; ?>
                <div class="">
                    <?php the_sub_field( 'content' ); ?>
                </div>

                <div class="text-center lg:text-left">
                    <?php get_template_part( 'template-parts/global/button-primary' ) ?>
                </div>


            </div>
        </div>
    </div>