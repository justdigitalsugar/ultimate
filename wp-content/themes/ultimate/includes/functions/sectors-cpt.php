<?php 

function create_sectors_posttype() {

  
  register_post_type( 'sectors',

  array(
    'labels' => array(
     'name' => __( 'Sectors' ),
     'singular_name' => __( 'sector' )
    ),
    'public' => true,
    'publicly_queryable'  => true,
    'has_archive' => false,
    'rewrite' => array('slug' => 'sectors'),
    'menu_icon' => 'dashicons-format-quote',   )
  );
}

add_action( 'init', 'create_sectors_posttype' );