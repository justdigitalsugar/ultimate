<div class="<?php if ( get_sub_field( 'remove_bottom_margin' ) != 1 ) : ?>section <?php endif; ?> <?php if ( get_sub_field( 'negative_top_margin' ) == 1 ) : ?>mt-[-150px] lg:mt-[-100px]<?php endif; ?>">

    <?php if(get_sub_field('content')) :?>
<div class="text-center mb-12 max-w-6xl mx-auto">
    <?php the_sub_field('content');?>
</div>
<?php endif;?>

<?php if ( have_rows( 'blocks' ) ) : ?>
    <div class="max-w-7xl mx-auto">
    <div class="grid lg:grid-cols-2 gap-2">
<?php while ( have_rows( 'blocks' ) ) : the_row(); ?>
<div class=" bg-primary relative z-20 mb-6 generic rounded">

    <div class="lg:col-span-2 lg:p-0">
        <div class="p-6 lg:p-10 text-center">
            <div class="text-white">
                <?php the_sub_field( 'content' ); ?>

            </div>  
            <?php $button_link = get_sub_field( 'link' ); ?>
            <?php if ( $button_link ) : ?>
            <div class="">
                <a class="button w-fit button-primary" href="<?php echo esc_url( $button_link['url'] ); ?>"
                    target="<?php echo esc_attr( $button_link['target'] ); ?>"><?php echo esc_html( $button_link['title'] ); ?></a>
            </div>
            <?php endif; ?>             
        </div>
           
       
    </div>
</div>
<?php endwhile; ?>
</div>
</div>
<?php endif; ?>
</div>