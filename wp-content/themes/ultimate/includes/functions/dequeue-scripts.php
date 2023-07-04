<?php
function dm_remove_wp_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
    }
    add_action( 'wp_enqueue_scripts', 'dm_remove_wp_block_library_css' );

/** * Completely Remove jQuery From WordPress */
// function my_init() {
//     if (!is_admin()) {
//         wp_deregister_script('jquery');
//         wp_register_script('jquery', false);
//     }
// }
// add_action('init', 'my_init');

add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );
function wps_deregister_styles() {
    wp_deregister_style( 'contact-form-7' );
}

//emojis
function disable_wp_emojicons() {

    // all actions related to emojis
   
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
   
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
   
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
   
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
   
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
   
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
   
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
   
    // filter to remove TinyMCE emojis
   
    add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
   
   }
   
   add_action( 'init', 'disable_wp_emojicons' );
   
   function disable_emojicons_tinymce( $plugins ) {
   
    if ( is_array( $plugins ) ) {
   
    return array_diff( $plugins, array( 'wpemoji' ) );
   
    } else {
   
    return array();
   
    }
   
   }
?>