<div class="<?php if ( get_sub_field( 'remove_bottom_margin' ) != 1 ) : ?>section <?php endif; ?>">

    <div class="text-center mb-12 max-w-6xl mx-auto">
        <?php the_sub_field('content');?>
    </div>

    <?php if ( have_rows( 'blocks' ) ) : ?>
    <?php while ( have_rows( 'blocks' ) ) : the_row(); ?>
    <div class="max-w-7xl px-4 mx-auto lg:grid grid-cols-3 relative z-20 mb-6 generic" id="<?php the_sub_field('id');?>">
        <div
            class="bg-white relative lg:col-span-1 <?php if ( get_sub_field( 'reverse_columns' ) == 1 ) : ?>lg:order-last <?php endif; ?>">
            <?php $img_acf = GetACFImage( get_sub_field( 'image' ) );

            if ( $img_acf ) : ?>

            <div class="h-[250px] <?php if(get_sub_field('image_position') == 'object-cover') : ?>lg:h-full <?php else: ?> lg:pt-10 pt-6<?php endif; ?> overflow-hidden relative">
                <img class="h-full w-full <?php the_sub_field( 'image_position' ); ?>" loading="lazy" height="700"
                    width="700" src="<?php echo esc_url( $img_acf->get_src()[0] ); ?>"
                    title="<?php echo esc_attr( $img_acf->get_title() ); ?>"
                    srcset="<?php echo esc_attr( $img_acf->get_srcset() ); ?>"
                    sizes="<?php echo esc_attr( $img_acf->get_srcset_sizes() ); ?>"
                    alt="<?php echo $img_acf->get_alt_text() ?>">
            </div>
            <?php endif; ?>

        </div>
        <div class="lg:col-span-2 lg:p-0 block-style bg-white">
        <?php if ( have_rows( 'features' ) ) : ?>
            <div class="flex w-full justify-between flex-wrap">
                <?php while ( have_rows( 'features' ) ) : the_row(); ?>
                <div class="p-3 text-center w-full lg:w-1/3 uppercase font-medium text-sm feature-item border-b"><?php the_sub_field( 'feature' ); ?></div>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>
            <div class="p-6 lg:p-10">
                <div class="stacked">
                    <?php the_sub_field( 'content' ); ?>
                </div>               
            </div>
                <?php $button_link = get_sub_field( 'link' ); ?>
                <?php if ( $button_link ) : ?>
                <div class="text-center">
                    <a class="button w-full mt-0" href="<?php echo esc_url( $button_link['url'] ); ?>"
                        target="<?php echo esc_attr( $button_link['target'] ); ?>"><?php echo esc_html( $button_link['title'] ); ?></a>
                </div>
                <?php endif; ?>
           
        </div>
    </div>
    <?php endwhile; ?>
    <?php else : ?>
    <?php // no rows found ?>
    <?php endif; ?>
</div>