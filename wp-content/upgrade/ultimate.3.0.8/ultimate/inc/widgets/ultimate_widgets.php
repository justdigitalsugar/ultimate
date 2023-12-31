<?php
/**
 * Contains all the functions related to sidebar and widget.
 *
 * @package Theme Horse
 * @subpackage Ultimate
 * @since Ultimate 1.0
 */
/****************************************************************************************/
add_action('widgets_init', 'ultimate_widgets_init');
/**
 * Function to register the widget areas(sidebar) and widgets.
 */
function ultimate_widgets_init() {
	// Registering main left sidebar
	register_sidebar(array(
			'name'          => __('Left Sidebar', 'ultimate'),
			'id'            => 'ultimate_left_sidebar',
			'description'   => __('Shows widgets at Left side.', 'ultimate'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		));
	// Registering main right sidebar
	register_sidebar(array(
			'name'          => __('Right Sidebar', 'ultimate'),
			'id'            => 'ultimate_right_sidebar',
			'description'   => __('Shows widgets at Right side.', 'ultimate'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		));
	// Registering Business Page template sidebar
	register_sidebar(array(
			'name'          => __('Business Page Section', 'ultimate'),
			'id'            => 'ultimate_business_page_sidebar',
			'description'   => __('Shows widgets on Business Page Template. Suitable widget: TH: Featured Recent Work, TH: Testimonial, TH: Services, TH: PromoBox', 'ultimate'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		));
	// Registering contact Page sidebar
	register_sidebar(array(
			'name'          => __('Contact Page Sidebar', 'ultimate'),
			'id'            => 'ultimate_contact_page_sidebar',
			'description'   => __('Shows widgets on Contact Page Template.', 'ultimate'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		));
	/**
	 * Registering footer sidebar 1
	 * For upgrade compatible reason footer id not kept ultimate_footer_column1
	 */
	register_sidebar(array(
			'name'          => __('Footer - Column1', 'ultimate'),
			'id'            => 'ultimate_footer_sidebar',
			'description'   => __('Shows widgets at footer Column 1.', 'ultimate'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		));
	// Registering footer sidebar 2
	register_sidebar(array(
			'name'          => __('Footer - Column2', 'ultimate'),
			'id'            => 'ultimate_footer_column2',
			'description'   => __('Shows widgets at footer Column 2.', 'ultimate'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		));
	// Registering footer sidebar 3
	register_sidebar(array(
			'name'          => __('Footer - Column3', 'ultimate'),
			'id'            => 'ultimate_footer_column3',
			'description'   => __('Shows widgets at footer Column 3.', 'ultimate'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		));
	// Registering widgets
	register_widget("ultimate_custom_tag_widget");
	register_widget("ultimate_service_widget");
	register_widget("ultimate_promobox_widget");
	register_widget("ultimate_recent_work_widget");
	register_widget("ultimate_Widget_Testimonial" );
}
/****************************************************************************************/
/**
 * Extends class wp_widget
 *
 * Creates a function CustomTagWidget
 * $widget_ops option array passed to wp_register_sidebar_widget().
 * $control_ops option array passed to wp_register_widget_control().
 * $name, Name for this widget which appear on widget bar.
 */
class ultimate_custom_tag_widget extends WP_Widget {
	function __construct() {
		$widget_ops  = array('classname' => 'widget_custom-tagcloud', 'description' => __('Displays Custom Tag Cloud', 'ultimate'));
		$control_ops = array('width'     => 200, 'height'     => 250);
		parent::__construct(false, $name = __('TH: Custom Tag Cloud', 'ultimate'), $widget_ops, $control_ops);
	}
	/** Displays the Widget in the front-end.
	 *
	 * $args Display arguments including before_title, after_title, before_widget, and after_widget.
	 * $instance The settings for the particular instance of the widget
	 */
	function widget($args, $instance) {
		extract($args);
		extract($instance);
		$title = empty($instance['title'])?'Tags':$instance['title'];
		echo $before_widget;
		if ($title):
		echo $before_title.$title.$after_title;
		endif;
		wp_tag_cloud('smallest=13&largest=13px&unit=px');
		echo $after_widget;
	}
	/**
	 * update the particular instant
	 *
	 * This function should check that $new_instance is set correctly.
	 * The newly calculated value of $instance should be returned.
	 * If "false" is returned, the instance won't be saved/updated.
	 *
	 * $new_instance New settings for this instance as input by the user via form()
	 * $old_instance Old settings for this instance
	 * Settings to save or bool false to cancel saving
	 */
	function update($new_instance, $old_instance) {
		$instance          = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}
	/**
	 * Creates the form for the widget in the back-end which includes the Title
	 * $instance Current settings
	 */
	function form($instance) {
		$instance = wp_parse_args(( array ) $instance, array('title' => 'Tags'));
		$title    = esc_attr($instance['title']);
		?>
				<p>
				<label for="<?php echo $this->get_field_id('title');?>">
		<?php _e('Title:', 'ultimate');?>
				</label>
				<input id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo $title;?>" />
				</p>
		<?php
	}
}
/**
 * Widget for business layout that shows selected page content,title and featured image.
 * Construct the widget.
 * i.e. Name, description and control options.
 */
class ultimate_service_widget extends WP_Widget {
	function __construct() {
		$widget_ops  = array('classname' => 'widget_service', 'description' => __('Display Services ( Business Layout )', 'ultimate'));
		$control_ops = array('width'     => 200, 'height'     => 250);
		parent::__construct(false, $name = __('TH: Services', 'ultimate'), $widget_ops, $control_ops);
	}
	function form($instance) {
		$instance           = wp_parse_args((array) $instance, array('checkbox' => ''));
		for ($i = 0; $i < 3; $i++) {
			$var            = 'page_id'.$i;
			$defaults[$var] = '';
		}
		$instance = wp_parse_args((array) $instance, $defaults);
		for ($i = 0; $i < 3; $i++) {
			$var = 'page_id'.$i;
			$var = absint($instance[$var]);
		}
				$checkbox = esc_attr($instance['checkbox']);
		?>
		<p>
      	<input id="<?php echo $this->get_field_id('checkbox'); ?>" name="<?php echo $this->get_field_name('checkbox'); ?>" type="checkbox" value="1" <?php checked( '1', $checkbox ); ?>/>
    	<label for="<?php echo $this->get_field_id('checkbox'); ?>"><?php _e('Check to display content as center','ultimate'); ?></label>
    </p>
		<?php for ($i = 0; $i < 3; $i++) {?>
					<p>
						<label for="<?php echo $this->get_field_id(key($defaults));?>">
							<?php _e('Page', 'ultimate');?>
						:</label>
						<?php wp_dropdown_pages(array('show_option_none' => ' ', 'name' => $this->get_field_name(key($defaults)), 'selected' => $instance[key($defaults)]));?>
					</p>
		<?php
			next($defaults);// forwards the key of $defaults array
				}
	}
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['checkbox'] = strip_tags($new_instance['checkbox']);
		for ($i = 0; $i < 3; $i++) {
			$var            = 'page_id'.$i;
			$instance[$var] = absint($new_instance[$var]);
		}
		return $instance;
	}
	function widget($args, $instance) {
		$checkbox    = esc_attr('checkbox', empty($instance['checkbox'])?'':$instance['checkbox'], $instance);
		extract($args);
		extract($instance);
		global $post;
		$page_array = array();
		for ($i = 0; $i < 3; $i++) {
			$var     = 'page_id'.$i;
			$page_id = isset($instance[$var])?$instance[$var]:'';
			if (!empty($page_id)) {
				array_push($page_array, $page_id);
			}
			// Push the page id in the array
		}
		$get_featured_pages = new WP_Query(array(
				'posts_per_page' => -1,
				'post_type'      => array('page'),
				'post__in'       => $page_array,
				'orderby'        => 'post__in'
			));
		echo $before_widget;?>
		<div class="container clearfix">
			<div class="column <?php if ( $instance['checkbox'] == true ) { echo "display-center"; } ?> clearfix">
				<?php
					$j = 1;
					while ($get_featured_pages->have_posts()):$get_featured_pages->the_post();
					$page_title = get_the_title();
						if ($j%2 == 1 && $j > 1) {
							$service_class = "one-third clearfix-half";
						} elseif ($j%3 == 1 && $j > 1) {
							$service_class = "one-third clearfix-third";
						} else {
							$service_class = "one-third";
						}
				?>
				<div class="<?php echo $service_class;?>">
					<div class="service-item clearfix">
						<?php
						if (has_post_thumbnail()) {
							echo '<div class="service-icon">'.get_the_post_thumbnail($post->ID, 'services').'</div>';
						}
						?>
						<h3 class="service-title"><?php echo esc_html($page_title);?></h3>
					</div><!-- .service-item -->
					<article>
						<?php the_excerpt();?>
					</article>
					<a class="more-link" title="<?php the_title_attribute();?>" href="<?php the_permalink();?>">
						<?php _e('Read more', 'ultimate');?>
					</a> 
				</div><!-- .one-fourth -->
		<?php $j++;?>
			<?php endwhile;
		// Reset Post Data
		wp_reset_query();
		?>
			</div><!-- .column -->
		</div><!-- .container clearfix -->
		<?php echo $after_widget;
	}
}
/**************************************************************************************/
/**
 * Widget for business layout that shows Promo Box.
 * Construct the widget.
 * i.e. Home Page PromoBox1, Home Page PromoBox2, Redirect Button Text and Redirect Button Link
 */
class ultimate_promobox_widget extends WP_Widget {
	function __construct() {
		$widget_ops  = array('classname' => 'widget_promotional_bar', 'description' => __('Display PromoBox ( Business Layout )', 'ultimate'));
		$control_ops = array('width'     => 200, 'height'     => 250);
		parent::__construct(false, $name = __('TH: PromoBox', 'ultimate'), $widget_ops, $control_ops);
	}
	function widget($args, $instance) {
		extract($args);
		$promotional_img_background = apply_filters( 'promotional_img_background', empty( $instance['promotional_img_background'] ) ? '' : $instance['promotional_img_background'], $instance,  $this->id_base );
		$widget_primary   = apply_filters('widget_primary', empty($instance['widget_primary'])?'':$instance['widget_primary'], $instance, $this->id_base);
		$widget_secondary = apply_filters('widget_secondary', empty($instance['widget_secondary'])?'':$instance['widget_secondary'], $instance, $this->id_base);
		$redirect_text    = apply_filters('redirect_text', empty($instance['redirect_text'])?'':$instance['redirect_text'], $instance);
		$widget_redirecturl = apply_filters('widget_redirecturl', empty($instance['widget_redirecturl'])?'':$instance['widget_redirecturl'], $instance, $this->id_base);
		echo $before_widget; ?>
		<div class="promotional_bar_content" <?php if(!empty($promotional_img_background)){ ?> style="background-image:url('<?php echo esc_url($promotional_img_background);?>');" <?php } ?> >
		<?php
			if (!empty($widget_primary)) {echo '<div class="container"><div class="promotional-text">'.esc_html($widget_primary);}?> <span> <?php echo esc_html($widget_secondary);
			?> </span> <?php echo '</div><!-- .promotional-text -->';
			?> 
			<?php if ( !empty($redirect_text) && !empty($widget_redirecturl) ) { ?><a class="call-to-action" href="<?php echo esc_html($widget_redirecturl);?>" title="<?php echo esc_html($redirect_text);?>"><?php echo esc_html($redirect_text);
			?></a><?php } ?></div><!-- .container -->
		</div><!-- .promotional_bar_content -->
		<?php
		echo $after_widget;
	}
	function update($new_instance, $old_instance) {
		$instance                       = $old_instance;
		$instance['promotional_img_background']     = strip_tags($new_instance['promotional_img_background']);
		$instance['widget_primary']     = esc_textarea($new_instance['widget_primary']);
		$instance['widget_secondary']   = esc_textarea($new_instance['widget_secondary']);
		$instance['widget_redirecturl'] = esc_url($new_instance['widget_redirecturl']);
		$instance['redirect_text']      = strip_tags($new_instance['redirect_text']);
		$instance['filter'] = isset($new_instance['filter']);
		return $instance;
	}
	function form($instance) {
		$instance           = wp_parse_args((array) $instance, array('promotional_img_background' => '','widget_primary' => '', 'widget_secondary' => '', 'redirect_text' => '', 'widget_redirecturl' => ''));
		$promotional_img_background      = strip_tags($instance['promotional_img_background']);
		$widget_primary     = esc_textarea($instance['widget_primary']);
		$widget_secondary   = esc_textarea($instance['widget_secondary']);
		$redirect_text      = strip_tags($instance['redirect_text']);
		$widget_redirecturl = esc_url($instance['widget_redirecturl']);
		?>
			<p>
				<label for="<?php echo $this->get_field_id('promotional_img_background');?>">
						<?php _e('Background Image:', 'ultimate');?>
				</label>
					<input type="text" class="upload1" id="<?php echo $this->get_field_id( 'promotional_img_background' ); ?>" name="<?php echo $this->get_field_name('promotional_img_background'); ?>" value="<?php echo esc_url($promotional_img_background); ?>"/>

         		<input type="button" class="button  custom_media_button"name="<?php echo $this->get_field_name('promotional_img_background'); ?>" id="custom_media_button_services" value="<?php esc_attr_e( 'Upload', 'ultimate' ); ?>" onclick="mediaupload.uploader( '<?php echo $this->get_field_id( 'promotional_img_background' ); ?>' ); return false;"/>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('widget_primary');?>">
					<?php _e('Primary Promotional:', 'ultimate');?>
				</label>
				<textarea class="widefat" rows="8" cols="20" id="<?php echo $this->get_field_id('widget_primary');?>" name="<?php echo $this->get_field_name('widget_primary');?>"><?php echo esc_textarea($widget_primary);
		?></textarea>
			</p>
					<?php _e('Secondary Promotional', 'ultimate');?>
				<textarea class="widefat" rows="8" cols="20" id="<?php echo $this->get_field_id('widget_secondary');?>" name="<?php echo $this->get_field_name('widget_secondary');?>"><?php echo esc_textarea($widget_secondary); ?></textarea>
			<p>
				<label for="<?php echo $this->get_field_id('redirect_text');?>">
					<?php _e('Redirect Text:', 'ultimate');?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id('redirect_text');?>" name="<?php echo $this->get_field_name('redirect_text');?>" type="text" value="<?php echo esc_attr($redirect_text);?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('widget_redirecturl');?>">
					<?php _e('Redirect Url:', 'ultimate');?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id('widget_redirecturl');?>" name="<?php echo $this->get_field_name('widget_redirecturl');?>" type="text" value="<?php echo esc_url($widget_redirecturl);?>" />
			</p>
		<?php
	}
}
/**************************************************************************************/
/**
 * Widget for business layout that shows Featured page title and featured image.
 * Construct the widget.
 * Widget for the recent work
 * i.e. Name, description and control options.
 */
class ultimate_recent_work_widget extends WP_Widget {
	function __construct() {
		$widget_ops  = array('classname' => 'widget_recent_work', 'description' => __('Use this widget to show recent work, portfolio or any pages as your wish ( Business Layout )', 'ultimate'));
		$control_ops = array('width'     => 200, 'height'     => 250);
		parent::__construct(false, $name = __('TH: Featured Recent Work', 'ultimate'), $widget_ops, $control_ops);
	}
	function form($instance) {
		for ($i = 0; $i < 4; $i++) {
			$var            = 'page_id'.$i;
			$defaults[$var] = '';
		}
		$att_defaults                        = $defaults;
		$att_defaults['title']               = '';
		$att_defaults['text']                = '';
		$instance = wp_parse_args((array) $instance, $att_defaults);
		for ($i = 0; $i < 4; $i++) {
			$var = 'page_id'.$i;
			$var = absint($instance[$var]);
		}
		$title               = esc_attr($instance['title']);
		$text                = esc_textarea($instance['text']);
		?>
			<p>
				<label for="<?php echo $this->get_field_id('title');?>">
					<?php _e('Title:', 'ultimate');?>
				</label>
				<input id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo esc_attr($title);?>" />
			</p>
					<?php _e('Description', 'ultimate');?>
				<textarea class="widefat" rows="10" cols="20" id="<?php echo $this->get_field_id('text');?>" name="<?php echo $this->get_field_name('text');?>"><?php echo esc_textarea($text);
		?></textarea>
		<?php
		for ($i = 0; $i < 4; $i++) {
			?>
			<p>
				<label for="<?php echo $this->get_field_id(key($defaults));?>">
					<?php _e('Page', 'ultimate');?>
				:</label>
					<?php wp_dropdown_pages(array('show_option_none' => ' ', 'name' => $this->get_field_name(key($defaults)), 'selected' => $instance[key($defaults)]));?>
			</p>
			<?php
			next($defaults);// forwards the key of $defaults array
		}
	}
	function update($new_instance, $old_instance) {
		$instance                        = $old_instance;
		$instance['title']               = strip_tags($new_instance['title']);
		for ($i = 0; $i < 4; $i++) {
			$var            = 'page_id'.$i;
			$instance[$var] = absint($new_instance[$var]);
		}
		if (current_user_can('unfiltered_html')) {
			$instance['text'] = $new_instance['text'];
		} else {
			$instance['text'] = stripslashes(wp_filter_post_kses(addslashes($new_instance['text'])));
		}
		// wp_filter_post_kses() expects slashed
		$instance['filter'] = isset($new_instance['filter']);
		return $instance;
	}

	function widget($args, $instance) {
		extract($args);
		extract($instance);
		global $post;
		$title               = isset($instance['title'])?$instance['title']:'';
		$text                = apply_filters('widget_text', empty($instance['text'])?'':$instance['text'], $instance);
		$page_array         = array();
		for ($i = 0; $i < 6; $i++) {
			$var     = 'page_id'.$i;
			$page_id = isset($instance[$var])?$instance[$var]:'';
			if (!empty($page_id)) {
				array_push($page_array, $page_id);
			}
			// Push the page id in the array
		}
		$get_featured_pages = new WP_Query(array(
				'posts_per_page' => -1,
				'post_type'      => array('page'),
				'post__in'       => $page_array,
				'orderby'        => 'post__in'
			));
		echo $before_widget;
		echo '<div class="container clearfix">';
				if (!empty($title)) {echo $before_title.esc_html($title).$after_title; 
					if (!empty($text)) { ?>
						<p><?php echo esc_textarea($text);?></p>
		<?php  } }
			echo '<div class="column clearfix">';
		$j = 1;
		while ($get_featured_pages->have_posts()):$get_featured_pages->the_post();
		$page_title = get_the_title();
			if( $j % 4 == 3 && $j > 1 ) {
				$service_class = "one-fourth clearfix-half";
			}
			elseif ( $j % 4 == 1 && $j > 1 ) {
				$service_class = "one-fourth clearfix-half clearfix-fourth";
			}	
			else {
				$service_class = "one-fourth";
			}
		?>
		<div class="<?php echo $service_class;?>">
		<?php
			if (has_post_thumbnail()) {
				echo '<a title="'.get_the_title().'" '.'href="'.get_permalink().'">'.get_the_post_thumbnail($post->ID, 'gallery').'</a>';
			}
		?>
			<h3 class="custom-gallery-title"><a href="<?php the_permalink();?>" title=""><?php echo esc_html($page_title);
		?></a>
			</h3>
			<p><?php echo get_the_excerpt();?></p>
		</div><!-- .one-fourth -->
		<?php $j++;
		endwhile;
		// Reset Post Data
		wp_reset_query();
		echo '</div></div><!-- .container clearfix -->';
		echo $after_widget .'<!-- .widget_recent_work -->';
	}
}
/**************************************************************************************/
 /**
 * Testimonial widget
 */
class ultimate_Widget_Testimonial extends WP_Widget {
	function __construct() {
 		$widget_ops = array( 'classname' => 'widget_testimonial', 'description' => __( 'Display Testimonial ( Business Layout ) recommendation size ( 168 * 168 )', 'ultimate' ) );
		$control_ops = array( 'width' => 200, 'height' =>250 ); 
		parent::__construct( false, $name = __( 'TH: Testimonial', 'ultimate' ), $widget_ops, $control_ops);
 	}
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'image1' => '', 'text1' => '', 'name1' =>'', 'designation1'=>'','company_name1'=>'','company_name1'=>'','company_link1'=>'', 'image2'=>'', 'text2'=>'','name2'=>'','designation2'=>'','company_name2'=>'','company_link2'=>'' ) );
		$title = strip_tags($instance['title']);
		for ( $i=1; $i<=2; $i++ ) {
 			$image = 'image'.$i;	
 			$text  = 'text'.$i;
 			$name  = 'name'.$i;
 			$designation = 'designation'.$i;
 			$company_name = 'company_name'.$i;
 			$company_link = 'company_link'.$i;
 			$instance[ $image ] = esc_url( $instance[ $image ] );
 			$instance[ $text ] = strip_tags( $instance[ $text ] );
 			$instance[ $name ] = strip_tags( $instance[ $name ] );
 			$instance[ $designation ] = strip_tags( $instance[ $designation ] );
 			$instance[ $company_name ] = strip_tags( $instance[ $company_name ] );
 			$instance[ $company_link ] = esc_url( $instance[ $company_link ] );
 		}
		?>
		<p>
		  <label for="<?php echo $this->get_field_id('title'); ?>">
		    <?php _e( 'Title:', 'ultimate' ); ?>
		  </label>
		  <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
 		<?php for ( $i=1; $i<=2; $i++ ) {
 			$image = 'image'.$i;	
 			$text  = 'text'.$i;
 			$name  = 'name'.$i;
 			$designation = 'designation'.$i;
 			$company_name = 'company_name'.$i;
 			$company_link = 'company_link'.$i;
 			$instance[ $image ] = esc_url( $instance[ $image ] );
 			$instance[ $text ] = strip_tags( $instance[ $text ] );
 			$instance[ $name ] = strip_tags( $instance[ $name ] );
 			$instance[ $designation ] = strip_tags( $instance[ $designation ] );
 			$instance[ $company_name ] = strip_tags( $instance[ $company_name ] );
 			$instance[ $company_link ] = esc_url( $instance[ $company_link ] );
 			?>
		<p>	
			<?php _e( 'Testimonial Description ','ultimate'); ?>
			<textarea class="widefat" rows="8" cols="20" id="<?php echo $this->get_field_id($text); ?>" name="<?php echo $this->get_field_name($text); ?>"><?php echo esc_html( $instance[$text] ); ?></textarea>
		</p>
		<p>
			<input class="upload1" type="text" id="<?php echo $this->get_field_id( $image ); ?>" name="<?php echo $this->get_field_name($image); ?>" value="<?php if (isset($instance[$image])) echo esc_url($instance[$image]); ?>" />
			<input class="button  custom_media_button" name="image-add" id="custom_media_button_services" type="button" value="<?php esc_attr_e('Add Image', 'ultimate'); ?>" onclick="mediaupload.uploader( '<?php echo $this->get_field_id( $image ); ?>' ); return false;"/>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('name'); ?>">
				<?php _e( 'Name ', 'ultimate' ); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id($name); ?>" name="<?php echo $this->get_field_name($name); ?>" type="text" value="<?php if(isset ( $instance[$name] ) ) echo esc_attr( $instance[$name] ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('designation'); ?>">
				<?php _e( 'Designation ', 'ultimate' ); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id($designation); ?>" name="<?php echo $this->get_field_name($designation); ?>" type="text" value="<?php if(isset ( $instance[$designation] ) ) echo esc_attr( $instance[$designation] ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('company_name'); ?>">
				<?php _e( 'Comapany Name ', 'ultimate' ); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id($company_name); ?>" name="<?php echo $this->get_field_name($company_name); ?>" type="text" value="<?php if(isset ( $instance[$company_name] ) ) echo esc_attr( $instance[$company_name] ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('company_link'); ?>">
				<?php _e( 'Company Link ', 'ultimate' ); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id($company_link); ?>" name="<?php echo $this->get_field_name($company_link); ?>" type="text" value="<?php if(isset ( $instance[$company_link] ) ) echo esc_url_raw( $instance[$company_link] ); ?>" />
		</p>
		<p>&nbsp; </p>
		<hr>
		<p>&nbsp; </p>
 			<?php
 		}
 	}
 	function update( $new_instance, $old_instance ) {
 		$instance = $old_instance;
 		$instance['title'] = strip_tags($new_instance['title']);
 		for( $i=1; $i<=2; $i++ ) {
 			$image = 'image'.$i;	
 			$text  = 'text'.$i;
 			$name  = 'name'.$i;
 			$designation = 'designation'.$i;
 			$company_name = 'company_name'.$i;
 			$company_link = 'company_link'.$i;
 			$instance[ $image ] = esc_url_raw( $new_instance[ $image ] );
 			$instance[ $text ] = strip_tags( $new_instance[ $text ] );
 			$instance[ $name ] = strip_tags( $new_instance[ $name ] );
 			$instance[ $designation ] = strip_tags( $new_instance[ $designation ] );
 			$instance[ $company_name ] = strip_tags( $new_instance[ $company_name ] );
 			$instance[ $company_link ] = esc_url_raw( $new_instance[ $company_link ] );
 		}
 		return $instance;
 	}
 	function widget( $args, $instance ) {
 		extract($args);
 		$title = empty( $instance['title'] ) ? '' : $instance['title'];
 		$image_array = array();
 		$text_array = array();
 		$name_array = array();
 		$designation_array = array();
 		$company_name_array = array();
 		$company_link_array = array();
 		for( $i=1; $i<=2; $i++ ) {
 			$image = 'image'.$i;	
 			$text  = 'text'.$i;
 			$name  = 'name'.$i;
 			$designation = 'designation'.$i;
 			$company_name = 'company_name'.$i;
 			$company_link = 'company_link'.$i;
 			$image = isset( $instance[ $image ] ) ? $instance[ $image ] : '';
 			$text = isset( $instance[ $text ] ) ? $instance[ $text ] : ''; 	
 			$name = isset( $instance[ $name ] ) ? $instance[ $name ] : '';
 			$designation = isset( $instance[ $designation ] ) ? $instance[ $designation ] : ''; 
 			$company_name = isset( $instance[ $company_name ] ) ? $instance[ $company_name ] : '';
 			$company_link = isset( $instance[ $company_link ] ) ? $instance[ $company_link ] : ''; 
	 	if( !empty( $image )  || !empty( $text ) || !empty( $name ) || !empty( $designation )|| !empty( $company_name )|| !empty( $company_link ))  {
	 			if( !empty( $image ) )
	 				array_push( $image_array, $image ); 
	 			else array_push($image_array, "");
	 			if( !empty( $text ) )
	 				array_push( $text_array, $text ); 
	 			else array_push($text_array, "");
	 			if( !empty( $name ) )
					array_push( $name_array, $name );
					else array_push($name_array, ""); 
				if( !empty( $designation ) )
					array_push( $designation_array, $designation ); 
				else array_push($designation_array, "");
				if( !empty( $company_name ) )
					array_push( $company_name_array, $company_name ); 
				else array_push($company_name_array, "");
				if( !empty( $company_link ) )
					array_push( $company_link_array, $company_link );
				else array_push($company_link_array, "");
		}
	}
			echo $before_widget;
			echo '<div class="container clearfix">';
		if ( !empty( $title ) ) { echo $before_title . esc_html( $title ) . $after_title; } ?>
		<div class="column clearfix">
			<?php
			$j = 1;
			for( $i=0; $i<2; $i++ ) {
				if( $j % 2 == 1 && $j > 1 ) {
					$testimonial_class = "one-half clearfix";
				}else{
					$testimonial_class = "one-half";
				}
					if((!empty($image_array[$i])) ||(!empty($name_array[$i])) ||(!empty($text_array[$i])) ||(!empty($designation_array[$i])) ||
					(!empty($company_name_array[$i])) ||(!empty($company_link_array[$i])) ){ ?>
				<div class="<?php echo $testimonial_class; ?>">
					<?php if(!empty($image_array[$i])){ ?> 
					<div class="testimonial-image"> <img src="<?php if(!empty($image_array[$i])){ echo $image_array[$i]; } ?>" title="<?php if(!empty($name_array[$i])){ echo $name_array[$i]; } ?>" alt="<?php if(!empty($name_array[$i])){ echo $name_array[$i]; } ?>" /> </div>
					<?php }?>
					<?php if((!empty($text_array[$i])) ||(!empty($name_array[$i])) ||(!empty($designation_array[$i]))||(!empty($company_name_array[$i]))||(!empty($company_link_array[$i]))){ ?>
					<div class="testimonial-content">
						<p><?php if(!empty($text_array[$i])){ echo $text_array[$i]; }?></p>
						<div class="testimonial-meta"> <strong><?php if(!empty($name_array[$i])){ echo $name_array[$i]; } ?></strong> <?php if(!empty($designation_array[$i])){ echo $designation_array[$i]; } if(!empty($company_name_array[$i])){  echo ' - '; } ?> <a href="<?php 
						if(!empty($company_link_array[$i])){  echo $company_link_array[$i]; } ?>" title="<?php if(!empty($company_link_array[$i])){ echo $company_link_array[$i]; } ?>" target="_blank" rel="noopener noreferrer"> <?php if(!empty($company_name_array[$i])){ echo $company_name_array[$i]; }?></a> </div>
					</div>
					<?php } ?>
				</div>
			<?php } 
				$j++;
			}?>
		</div>
		<?php 
		echo '</div><!-- .container -->' .$after_widget;
	}
}
?>
