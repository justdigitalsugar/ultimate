<?php
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
   add_theme_support( 'woocommerce' );
}    

add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
function jk_dequeue_styles( $enqueue_styles ) {
	unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
	unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
	unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
	return $enqueue_styles;
}

// total
add_filter( 'woocommerce_add_to_cart_fragments', 'iconic_cart_total_fragments', 10, 1 );
 
function iconic_cart_total_fragments( $fragmentstwo ) {
    
    $fragmentstwo['span.header-cart-total'] = '<span class="header-cart-total">' . WC()->cart->get_cart_total() . ' </span>';
    
    return $fragmentstwo;
    
}

// counter
add_filter( 'woocommerce_add_to_cart_fragments', 'iconic_cart_count_fragments', 10, 1 );
 
function iconic_cart_count_fragments( $fragments ) {
    
    $fragments['span.header-cart-count'] = '<span class="header-cart-count">' . WC()->cart->get_cart_contents_count() . ' </span>';
    
    return $fragments;
    
}

add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

// function so_43922864_add_content() { 

    
// }
// add_action( 'woocommerce_single_product_summary', 'so_43922864_add_content', 15 );


// add_action( 'woocommerce_single_product_summary', 'so_43922864_add_content', 15 );

// Fix pagination links from page/1/ to root
add_filter('paginate_links', function($link) {
    $pos = strpos($link, 'page/1/');
    if($pos !== false) {
        $link = substr($link, 0, $pos);
    }
    return $link;
});

// Add trust signal logo
add_action('woocommerce_single_product_summary', 'bt_custom_product_description', 15);
function bt_custom_product_description () { ?>
 <?php $silver_type = get_field("silver_type");
    
    if($silver_type) { ?>

    <span class="w-fit mx-auto lg:mx-0 text-sm rounded font-semibold text-center uppercase mb-4 block lg:text-left bg-black text-white px-6 py-2"><?php echo $silver_type; ?>
    Silver</span>

    <?php }   
}

//Animated Icon
// Add trust signal logo
add_action('woocommerce_shop_loop_item_title', 'trending_animation', 5);
function trending_animation () { ?>
<?php if ( get_field( 'feature_animation' ) == 1 ) : ?>
    <div class="items-center absolute top-2 left-2 text-center h-14 w-14 lg:h-[70px] lg:w-[70px] flex justify-center bg-gray-100 rounded-full">
        <div>
            <img src="/wp-content/uploads/2022/12/wind.png" class="element !h-5 !w-5 mx-auto mb-1 lg:mb-2">
        <p class="mb-0 text-[10px] leading-[1] uppercase">Going<br>Fast</p>
        </div>
        
    </div>
<?php endif; ?>
<?php }

//Remove company from checkout
add_filter( 'woocommerce_checkout_fields' , 'remove_company_name' );

function remove_company_name( $fields ) {
     unset($fields['billing']['billing_company']);
     return $fields;
}

function disable_shipping_calc_on_cart( $show_shipping ) {
    if( is_cart() ) {
        return false;
    }
    return $show_shipping;
}
add_filter( 'woocommerce_cart_ready_to_calc_shipping', 'disable_shipping_calc_on_cart', 99 );

add_action( 'woocommerce_after_cart_table', 'woocommerce_cross_sell_display' );
 

add_filter( 'woocommerce_loop_add_to_cart_args', 'remove_rel', 10, 2 );
function remove_rel( $args, $product ) {
    unset( $args['attributes']['rel'] );

}

// define the woocommerce_before_variations_form callback 
function action_woocommerce_before_variations_form(  ) { ?>
<div class="mb-6">
    <?php
         if ( has_term('Silver Rings', 'product_cat', null) ) { ?>

    <div
        class="flex items-center justify-center lg:justify-start mb-6 w-fit mx-auto lg:mx-0 rounded">
        <div class="mr-3">
            <svg xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision"
                text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd"
                clip-rule="evenodd" class="h-6 w-6" viewBox="0 0 355 512.57">
                <path
                    d="M267.28 205.33C319.75 233.91 355 286.98 355 347.74c0 91.04-79.11 164.83-176.71 164.83-97.58 0-176.7-73.79-176.7-164.83 0-61.03 35.57-114.3 88.41-142.79l29.76 33.26c-47.95 21.3-81.24 67.97-81.24 122.12 0 74.25 62.58 134.45 139.77 134.45 77.2 0 139.78-60.2 139.78-134.45 0-53.72-32.75-100.07-80.1-121.61l29.31-33.39zm6.73-108.82h-1.07c0-8.7-3.25-16.29-9.75-22.79s-14.1-9.75-22.8-9.75V62.9c8.7 0 16.3-3.25 22.8-9.76 6.5-6.52 9.75-14.11 9.75-22.78h1.07c0 8.7 3.25 16.29 9.74 22.79 6.51 6.5 14.1 9.75 22.8 9.75v1.07c-8.7 0-16.29 3.25-22.8 9.75-6.49 6.5-9.74 14.09-9.74 22.79zM128.6 66.15h-1.07c0-8.7-3.25-16.29-9.75-22.79s-14.1-9.75-22.79-9.75v-1.07c8.69 0 16.29-3.25 22.79-9.76 6.5-6.52 9.75-14.11 9.75-22.78h1.07c0 8.7 3.25 16.29 9.74 22.79 6.51 6.5 14.1 9.75 22.8 9.75v1.07c-8.7 0-16.29 3.25-22.8 9.75-6.49 6.5-9.74 14.09-9.74 22.79zm-94.99 97.18h-1.06c0-17.53-15.01-32.54-32.55-32.54v-1.07c17.53 0 32.55-15.01 32.55-32.54h1.06c0 17.53 15.01 32.54 32.54 32.54v1.07c-17.53 0-32.54 15.01-32.54 32.54zm180.78-3.54-27.16-50.21h-16.29l-28.49 50.21h71.94zm-84.65 0 29.08-51.13h-24.09l-38 51.14.37-.01h32.64zm69.47-51.13 27.72 51.13h32.56c.21 0 .42.02.63.04l-36.81-51.17h-24.1zm-56.73 62.25 29.31 44.65h13.5l28.9-44.65h-71.71zm84.46 0-28.9 44.65h24.39l37.56-44.67-.5.02h-32.55zm-38.48 55.76-.39.01H168.8l-.07-.01-35.72.01c-1.64 0-3.11-.79-4.08-2.03l-47.86-55.5c-1.91-2.21-1.8-5.62.21-7.69l47.16-62.03c1.04-1.23 2.49-1.86 3.94-1.86l93.34-.03c1.73 0 3.27.89 4.24 2.25l45.65 62.02c1.79 2.2 1.65 5.46-.24 7.49l-46.65 55.49a5.102 5.102 0 0 1-3.94 1.87l-36.32.01zm-29.48-11.11-29.31-44.65H97.1l-.27-.01 38.51 44.66h23.64z" />
            </svg>
        </div>
        <div>
            <p class="text-sm m-0"><a href="https://silverjewelleryuk.co.uk/guides/ring-sizing-guide/" target="_blank"
                    class="text-gray-800">Ring
                    Sizing Guide</a>
            </p>
        </div>
    </div>

    <?php } ?>
</div>

<?php }; 
             
    // add the action 
    add_action( 'woocommerce_before_variations_form', 'action_woocommerce_before_variations_form', 10, 0 ); 

    function sv_remove_product_page_skus( $enabled ) {
        if ( ! is_admin() && is_product() ) {
            return false;
        }
    
        return $enabled;
    }
    add_filter( 'wc_product_sku_enabled', 'sv_remove_product_page_skus' );
?>

