<?php 

 function crunchify_remove_version() {
    return '';
    }
    add_filter('the_generator', 'crunchify_remove_version');

    remove_action('wp_head', 'rest_output_link_wp_head', 10);
    remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
    remove_action('template_redirect', 'rest_output_link_header', 11, 0);

    remove_action ('wp_head', 'rsd_link');
    remove_action( 'wp_head', 'wlwmanifest_link');
    remove_action( 'wp_head', 'wp_shortlink_wp_head');

    function crunchify_cleanup_query_string( $src ){
    $parts = explode( '?', $src );
    return $parts[0];
    }
    add_filter( 'script_loader_src', 'crunchify_cleanup_query_string', 15, 1 );
    add_filter( 'style_loader_src', 'crunchify_cleanup_query_string', 15, 1 );

    function my_deregister_scripts(){
    wp_deregister_script( 'wp-embed' );
    }
    add_action( 'wp_footer', 'my_deregister_scripts' );

    remove_action('wp_head', 'print_emoji_detection_script', 7); remove_action('wp_print_styles', 'print_emoji_styles');

?>