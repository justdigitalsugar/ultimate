<?php 

function create_posttype() {

  
  register_post_type( 'jobs',

  array(
    'labels' => array(
     'name' => __( 'Jobs' ),
     'singular_name' => __( 'Job' )
    ),
    'public' => true,
    'publicly_queryable'  => true,
    'has_archive' => false,
    'rewrite' => array('slug' => 'job'),
    'menu_icon' => 'dashicons-format-quote',   )
  );
}

add_action( 'init', 'create_posttype' );