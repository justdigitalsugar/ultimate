<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package contactdb
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function contactdb_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'contactdb_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function contactdb_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'contactdb_pingback_header' );


add_action( 'wp_enqueue_scripts', 'app_scripts' );
function app_scripts() {

		// register the Vue build script.
		// wp_register_script(
		// 	'vue_app',
		// 	get_stylesheet_directory_uri() . '/app/src/main.js',
		// 	array(),
		// 	false,
		// 	true
		// );
           
		// wp_enqueue_script( 'vue_app' );

    wp_register_script(
			'vue_app',
			'http://localhost:8080/dist/build.js',
		);

    global $post;
    wp_localize_script(
      'vue_app', // vue script handle defined in wp_register_script.
      'wpData', // javascript object that will made availabe to Vue.
      array( // wordpress data to be made available to the Vue app in 'wpData'
      'template_directory_uri' => get_stylesheet_directory_uri(), // child theme directory path.
      'rest_url' => untrailingslashit( esc_url_raw( rest_url() ) ), // URL to the REST endpoint.
      'app_path' => $post->post_name, // page where the custom page template is loaded.
      'nonce' => wp_create_nonce( 'wp_rest' ),
      'post_categories' => get_terms( array(
        'taxonomy' => 'category', // default post categories.
        'hide_empty' => true,
        'fields' => 'names',
      ) ),
    ) );
           
		wp_enqueue_script( 'vue_app' );	
}

function codex_result_init() {
	$labels = array(
		'name'               => _x( 'Contacts', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Contacts', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Contacts', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Contacts', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'Contacts', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Contacts', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Contacts', 'your-plugin-textdomain' ),
	
		'edit_item'          => __( 'Edit Contacts', 'your-plugin-textdomain' ),
	
		'view_item'          => __( 'View Contacts', 'your-plugin-textdomain' ),
	
		'all_items'          => __( 'All Contacts', 'your-plugin-textdomain' ),
	
		'search_items'       => __( 'Search Contacts', 'your-plugin-textdomain' ),
	
		'parent_item_colon'  => __( 'Parent Contacts:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Contacts found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Contacts found in Trash.', 'your-plugin-textdomain' )
	);
	
	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_rest'       => true,
		'query_var'          => true,
		'menu_icon'          => 'dashicons-admin-users',
		'rewrite' => array( 'slug' => __('contacts', 'contacts')),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'rest_base'          => 'contacts',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'menu_position'      => 5,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
		'taxonomies'       => array('result','category', 'post_tag')
	
	);
	
	register_post_type( 'contacts', $args );
	}
	  add_action( 'init', 'codex_result_init' );