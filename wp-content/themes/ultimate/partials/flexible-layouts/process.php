<div class="<?php if ( get_sub_field( 'remove_bottom_margin' ) != 1 ) : ?>section <?php endif; ?> bg-white py-24">

    <div class="container">
        <div class="text-center mb-12">
            <?php the_sub_field( 'content' ); ?>
        </div>

            <?php if ( have_rows( 'process_steps' ) ) : ?>
                <ul class="tab-controls">
				<?php $i = 0; while ( have_rows( 'process_steps' ) ) : the_row(); ?>
                <li class="tab-item"><button class="js-tab-title tab-title <?php if($i == 0) :?>is-active<?php endif;?>" data-target="tab-<?php echo $i;?>"><?php the_sub_field( 'heading' ); ?></button></li>
					
				<?php $i++; endwhile; ?>
            </ul>
			<?php endif; ?>

            <?php if ( have_rows( 'process_steps' ) ) : ?>
                <ul class="tab-section">
				<?php $i = 0; while ( have_rows( 'process_steps' ) ) : the_row(); ?>
                <li class="tab-item">
                <button class="js-tab-title tab-title <?php if($i == 0) :?>is-active<?php endif;?>" data-target="tab-<?php echo $i;?>"><?php the_sub_field( 'heading' ); ?></button>
                <div id="tab-<?php echo $i;?>" class="max-w-5xl mx-auto px-4 tab-content <?php if($i == 0) :?>is-active<?php endif;?>">
                    <?php the_sub_field( 'content' ); ?>
                </div>
            </li>
					
				<?php $i++; endwhile; ?>
            </ul>
			<?php endif; ?>


        <?php $link = get_sub_field( 'link' ); ?>
        <?php if ( $link ) : ?>
        <div class="text-center mt-4">
            <a class="button" href="<?php echo esc_url( $link['url'] ); ?>"
                target="<?php echo esc_attr( $link['target'] ); ?>"><?php echo esc_html( $link['title'] ); ?></a>
        </div>
        <?php endif; ?>
    </div>

</div>