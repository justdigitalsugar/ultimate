<?php

//Register menus
require_once(__DIR__ . '/includes/functions/register-menus.php');

// Register ACF options
require_once(__DIR__ . '/includes/functions/register-acf-options.php');

// Add featured image theme support
require_once(__DIR__ . '/includes/functions/add-thumbnails.php');

// WooCommerce
require_once(__DIR__ . '/includes/functions/woocommerce-setup.php');

// Dequeue unnecessary scripts
require_once(__DIR__ . '/includes/functions/dequeue-scripts.php');

// Schema options
require_once(__DIR__ . '/includes/functions/schema.php');

// Jobs CPT
require_once(__DIR__ . '/includes/functions/vacancies-cpt.php');
require_once(__DIR__ . '/includes/functions/sectors-cpt.php');

// Dequeue CF7 scripts
// require_once( __DIR__ . '/includes/functions/dequeue-cf7-scripts.php');

// // Remove <p> and <br /> from Contact Form 7
// require_once( __DIR__ . '/includes/functions/remove-cf7-tags.php');

// Remove uneccessary Wordpress header scripts and code
require_once(__DIR__ . '/includes/functions/remove-wp-includes.php');



remove_action('shutdown', 'wp_ob_end_flush_all', 1);

function enable_svg_upload($upload_mimes)
{
  $upload_mimes['svg'] = 'image/svg+xml';
  $upload_mimes['svgz'] = 'image/svg+xml';
  return $upload_mimes;
}
add_filter('upload_mimes', 'enable_svg_upload', 10, 1);

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
      'post_categories' => get_terms( array(
        'taxonomy' => 'category', // default post categories.
        'hide_empty' => true,
        'fields' => 'names',
      ) ),
    ) );
           
		wp_enqueue_script( 'vue_app' );	
}


//custom image type
class ACFImage
{
  public $src;
  public $srcset;
  public $srcset_sizes;
  public $alt_text;
  public $meta;
  public $title;
  public $caption;

  // setters

  function set_src($src)
  {
    $this->src = $src;
  }

  function set_srcset($srcset)
  {
    $this->srcset = $srcset;
  }

  function set_srcset_sizes($srcset_sizes)
  {
    $this->srcset_sizes = $srcset_sizes;
  }

  function set_alt_text($alt_text)
  {
    $this->alt_text = $alt_text;
  }

  function set_meta($meta)
  {
    $this->meta = $meta;
  }

  function set_title($title)
  {
    $this->title = $title;
  }

  function set_caption($caption)
  {
    $this->caption = $caption;
  }

  //getters

  function get_src()
  {
    return $this->src;
  }

  function get_srcset()
  {
    return $this->srcset;
  }

  function get_srcset_sizes()
  {
    return $this->srcset_sizes;
  }

  function get_alt_text()
  {
    return $this->alt_text;
  }

  function get_meta()
  {
    return $this->meta;
  }

  function get_title()
  {
    return $this->title;
  }

  function get_caption()
  {
    return $this->caption;
  }

}

function GetACFImage($img)
{

  if ($img) {

    $output = new ACFImage;

    $output->set_src(wp_get_attachment_image_src($img, null));
    $output->set_srcset(wp_get_attachment_image_srcset($img, null));
    $output->set_srcset_sizes(wp_get_attachment_image_sizes($img, null));
    $output->set_alt_text(get_post_meta($img, '_wp_attachment_image_alt', true));
    $output->set_meta(wp_get_attachment_metadata($img));
    $output->set_title(get_the_title($img));
    $output->set_caption(get_the_excerpt($img));

    return $output;

  } else {

    return null;
  }

}

?>