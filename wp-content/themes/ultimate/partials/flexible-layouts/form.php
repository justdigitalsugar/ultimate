<section class="<?php if ( get_sub_field( 'remove_bottom_margin' ) != 1 ) : ?>section <?php endif; ?>">
    <div class="max-w-3xl mx-auto px-4">
        <div class="text-center">
            <?php the_sub_field( 'content' ); ?>
        </div>
        <?php the_sub_field( 'form' ); ?>
    </div>
</section>
<!--/Form -->