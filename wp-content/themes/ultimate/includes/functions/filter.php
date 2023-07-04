<?php

//======================================================================
// Hook into query and add filtering
//======================================================================



function custom_product_query( $q ){

    $category = get_queried_object();

    if($category->slug == 'courses'){
        return;
    }

    $colors = $_GET['color'] ? explode(',',$_GET['color']) : [];
    $lengths = $_GET['length'] ? explode(',',$_GET['length']) : [];

    $tax_query = $q->get( 'tax_query' ) ?? [];

    if(count($colors) > 0) {


        $tax_query[] = array(
            'taxonomy' => 'pa_colour',
            'field' => 'slug',
            'terms' => $colors,
            'operator' => 'IN',
        );

        
    }

    if(count($lengths) > 0) {


        $tax_query[] = array(
            'taxonomy' => 'pa_length',
            'field' => 'slug',
            'terms' => $lengths,
            'operator' => 'IN',
        );


    }

    $tax_query['relation'] = 'AND';
    
    $q->set('tax_query', $tax_query);

}

add_action( 'woocommerce_product_query', 'custom_product_query' );