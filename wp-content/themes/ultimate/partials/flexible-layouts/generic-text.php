<div class="<?php if ( get_sub_field( 'remove_bottom_margin' ) != 1 ) : ?>section <?php endif; ?>max-w-5xl mx-auto px-4">
    <div
        class="<?php if ( get_sub_field( 'text_align' ) == 'center' ) : ?> text-center <?php elseif( get_sub_field( 'text_align' ) == 'right' ) : ?> text-right <?php else: ?> text-left <?php endif; ?>">
        <div class="mb-6 block-style">
            <?php the_sub_field( 'content' ); ?>

        </div>
        <?php get_template_part( 'template-parts/global/button-primary' ) ?>
    </div>

</div>