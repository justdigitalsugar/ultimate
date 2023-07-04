<?php if ( get_field( 'show_popup', 'option' ) == 1 ) : ?>
<div id="modal" class="popup-modal hide">
    <div class="modalcontent !bg-primary-500 text-center">

    <?php $img_acf = GetACFImage( get_field( 'image', 'option' ) );
    if ( $img_acf ) : ?>
        <div class="h-[150px] lg:h-[250px] w-full">
            <img class='h-full w-full object-cover' height="600" width="1000" loading="lazy"
                src="<?php echo esc_url( $img_acf->get_src()[0] ); ?>"
                title="<?php echo esc_attr( $img_acf->get_title() ); ?>"
                srcset="<?php echo esc_attr( $img_acf->get_srcset() ); ?>"
                sizes="<?php echo esc_attr( $img_acf->get_srcset_sizes() ); ?>"
                alt="<?php echo $img_acf->get_alt_text() ?>" />
        </div>
        <?php endif; ?>
        <div class="bg-black h-12 w-12 flex items-center justify-center absolute top-0 right-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="w-6 h-6 cursor-pointer text-white" id="close">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </div>
        <div class="px-6 lg:px-12 pt-12">
            <p class="text-xl lg:text-3xl font-bold mb-0"><?php the_field( 'pop_up_title', 'option' ); ?></p>
        </div>


        <div class="px-6 lg:px-12 pb-10">
            <div class="">
                <p><?php the_field( 'pop_up_content', 'option' ); ?></p>
            </div>

            <!-- <div class="popup-form">
                < ?php echo do_shortcode('[contact-form-7 id="1431" title="Modal Contact Form" html_class="coupon-modal"]');?>
            </div> -->
            <div class="coupon-div">
                <p class="text-sm text-center font-bold mb-2"><?php the_field( 'copy_code_text', 'option' ); ?></p>
                <p class="mb-0 text-sm tracking-widest hidden" id="code"><?php the_field( 'code_text', 'option' ); ?></p>
                <div class="border border-dashed border-gray-200 py-2 px-6 w-fit mx-auto cursor-pointer" id="copy-content">
                    <p class="mb-0 text-sm tracking-widest"><?php the_field( 'code_text', 'option' ); ?></p>
                </div>
            </div>
        </div>


    </div>
</div>
<?php endif; ?>

