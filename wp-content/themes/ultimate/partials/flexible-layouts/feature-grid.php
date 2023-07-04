<div class="<?php if ( get_sub_field( 'remove_bottom_margin' ) != 1 ) : ?>section <?php endif; ?> bg-white py-24">

    <div class="container">
        <div class="text-center mb-8">
            <h2 class="mb-0 uppercase"><?php the_sub_field( 'heading' ); ?></h2>
        </div>

        <?php if ( have_rows( 'grid_row' ) ) : ?>
        <?php while ( have_rows( 'grid_row' ) ) : the_row(); ?>
            <?php 
            $reverse = get_sub_field( 'reverse_row' ); 
            ?>
        <?php if ( have_rows( 'row_items' ) ) : ?>
            
        <div class="grid lg:grid-cols-4 gap-2 mb-2">
            <?php $i = 0; while ( have_rows( 'row_items' ) ) : the_row(); ?>
            <div class="<?php if(($i == 0 && $reverse == 0) || ($i == 2 && $reverse == 1 )) : ?> col-span-2 lg:col-span-2 <?php else: ?> col-span-2 lg:col-span-1 <?php endif;?> relative">
                <div class="relative z-50 min-h-[250px]">
                   
                    <div class="absolute bottom-6 left-6">
                        <h3 class="mb-0 text-white font-normal uppercase text-3xl"><?php the_sub_field( 'heading' ); ?></h3>
                    <?php $link = get_sub_field( 'link' ); 
                     $target = ! empty( $link['target'] ) ? ' target="' . $link['target'] . '"' : '';
                     if ( $link && $link['target'] == '_blank' ) {
                         $target .= ' rel="noopener noreferrer"';
                     }
                    ?>
                    <?php if ( $link ) : ?>
                    <a class="button hover:!text-white" href="<?php echo esc_url( $link['url'] ); ?>"
                    <?php echo $target; ?>><?php echo esc_html( $link['title'] ); ?></a>
                    <?php endif; ?>
                    </div>
                    
                </div>
                

                <?php $img_acf = GetACFImage( get_sub_field( 'image' ) );

                if ( $img_acf ) : ?>
                <div class="absolute left-0 top-0 h-full w-full">
                    <img class='h-full w-full object-cover' src="<?php echo esc_url( $img_acf->get_src()[0] ); ?>"
                        title="<?php echo esc_attr( $img_acf->get_title() ); ?>"
                        srcset="<?php echo esc_attr( $img_acf->get_srcset() ); ?>"
                        sizes="<?php echo esc_attr( $img_acf->get_srcset_sizes() ); ?>"
                        alt="<?php echo $img_acf->get_alt_text() ?>" loading="lazy" height="300" width="200">
                </div>

                <?php endif; ?>

                <div class="bg-gradient-to-t from-black/70 via-gray-900/70 to-transparent absolute top-0 left-0 h-full w-full z-10"></div>
            </div>
            <?php $i++; endwhile; ?>
        </div>
        <?php endif; ?>

        <?php endwhile; ?>
        <?php endif; ?>


        <div class="text-center mt-4">
        <?php get_template_part( 'template-parts/global/button-primary' ) ?>
        </div>
    </div>

</div>