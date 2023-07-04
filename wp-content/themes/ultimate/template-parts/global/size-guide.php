<?php if ( have_rows( 'sizes', 'option' ) ) : ?>
    <div class="px-4 section">

    <h2>Ring Sizing Chart</h2>
        <div class="border">
    <div class="flex bg-black text-white">
        <div class="py-2 px-4 w-1/2">
            <h3 class="m-0">US</h3>
        </div>
        <div class="py-2 px-4 w-1/2">
            <h3 class="m-0">UK</h3>
        </div>
    </div>
    <?php while ( have_rows( 'sizes', 'option' ) ) : the_row(); ?>

    <div class="flex border-b">
        <div class="py-2 px-4 w-1/2 border-r">
            <?php the_sub_field( 'us' ); ?>
        </div>
        <div class="py-2 px-4 w-1/2">
            <?php the_sub_field( 'uk' ); ?>
        </div>
    </div>
    <?php endwhile; ?>
</div>
    </div>

<?php else : ?>
<?php // no rows found ?>
<?php endif; ?>