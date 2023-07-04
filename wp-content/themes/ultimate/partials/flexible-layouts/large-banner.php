<section class="<?php if ( get_sub_field( 'remove_bottom_margin' ) != 1 ) : ?>section <?php endif; ?> relative header-clip after:absolute after:h-full after:w-full after:top-0 after:left-0 after after:bg-gray-800/90">
    <div class="relative block px-4 py-56 lg:pb-48 lg:pt-60">

        <div class="">
            <div class="relative max-w-6xl mx-auto z-30">
                <div>
                    <h1 class="text-4xl xl:text-6xl text-center text-white"><?php the_sub_field('heading');?></h1>

                    <?php if(get_sub_field('content')) :?>
                    <div class="text-center text-xl font-medium">
                        <?php the_sub_field('content');?>
                    </div>
                    <?php endif;?>

                    <?php $button_link = get_sub_field( 'button' ); ?>
                    <?php if ( $button_link ) : ?>
                    <div class="text-center">
                        <a class="button button-primary"
                            href="<?php echo esc_url( $button_link['url'] ); ?>"><?php echo esc_html( $button_link['title'] ); ?></a>
                    </div>

                    <?php endif; ?>
                </div>

            </div>
        </div>
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
</section>