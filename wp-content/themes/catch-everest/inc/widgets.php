<?php
/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since Catch Everest 1.0
 */
function catcheverest_widgets_init() {
	
	// Register Custom Widgets
	register_widget( 'catcheverest_social_widget' );
	register_widget( 'catcheverest_adspace_widget' );
	
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'catch-everest' ),
		'id' => 'sidebar-1',
		'description'   	=> __( 'Shows the Widgets at the side of Content', 'catch-everest' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
	
	//Footer One Sidebar
	register_sidebar( array(
		'name' => __( 'Footer Area One', 'catch-everest' ),
		'id' => 'sidebar-2',
		'description' => __( 'An optional widget area for your site footer', 'catch-everest' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );

	//Footer Two Sidebar
	register_sidebar( array(
		'name' => __( 'Footer Area Two', 'catch-everest' ),
		'id' => 'sidebar-3',
		'description' => __( 'An optional widget area for your site footer', 'catch-everest' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );

	//Footer Three Sidebar
	register_sidebar( array(
		'name' => __( 'Footer Area Three', 'catch-everest' ),
		'id' => 'sidebar-4',
		'description' => __( 'An optional widget area for your site footer', 'catch-everest' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );		
	
}
add_action( 'widgets_init', 'catcheverest_widgets_init' );

/**
 * Makes a custom Widget for Displaying Social Icons
 *
 * Learn more: http://codex.wordpress.org/Widgets_API#Developing_Widgets
 *
 * @package Catch Themes
 * @subpackage Catch_Everest
 * @since Catch Everest 1.0
 */
class catcheverest_social_widget extends WP_Widget {
	
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'widget_catcheverest_social_widget', // Base ID
			__( 'CT: Social Icons', 'catch-everest' ), // Name
			array( 'description' => __( 'Use this widget to add Social Icons from Social Icons Settings as a widget.', 'catch-everest' ) ) // Args
		);
	}

	/**
	 * Creates the form for the widget in the back-end which includes the Title , adcode, image, alt
	 * $instance Current settings
	 */
	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
		$title = esc_attr( $instance[ 'title' ] );
		?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title (optional):','catch-everest'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
        </p>
        <?php
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
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		
		return $instance;
	}	
	
	/**
	 * Displays the Widget in the front-end.
	 * 
	 * $args Display arguments including before_title, after_title, before_widget, and after_widget.
	 * $instance The settings for the particular instance of the widget
	 */
	function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );
		$title = !empty( $instance['title'] ) ? $instance[ 'title' ] : '';
			
		echo $before_widget;
		if ( $title != '' ) {
			echo $before_title . apply_filters( 'widget_title', $title, $instance, $this->id_base ) . $after_title;
		} 

		catcheverest_social_networks();
		
		echo $after_widget;
	}

}


/**
 * Makes a custom Widget for Displaying Ads
 *
 * Learn more: http://codex.wordpress.org/Widgets_API#Developing_Widgets
 *
 * @package Catch Themes
 * @subpackage Catch_Everest
 * @since Catch Everest 1.0
 */
class catcheverest_adspace_widget extends WP_Widget {
	
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'widget_catcheverest_adspace_widget', // Base ID
			__( 'CT: Advertisement', 'catch-everest' ), // Name
			array( 'description' => __( 'Use this widget to add any type of Advertisement as a widget.', 'catch-everest' ) ) // Args
		);
	}

	/**
	 * Creates the form for the widget in the back-end which includes the Title , adcode, image, alt
	 * $instance Current settings
	 */
	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'adcode' => '', 'image' => '', 'href' => '', 'target' => '0', 'alt' => '' ) );
		$title = esc_attr( $instance[ 'title' ] );
		$adcode = esc_textarea( $instance[ 'adcode' ] );
		$image = esc_url( $instance[ 'image' ] );
		$href = esc_url( $instance[ 'href' ] );
		$target = $instance['target'] ? 'checked="checked"' : '';
		$alt = esc_attr( $instance[ 'alt' ] );
		?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title (optional):','catch-everest'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
        </p>
        <?php if ( current_user_can( 'unfiltered_html' ) ) : // Only show it to users who can edit it ?>
            <p>
                <label for="<?php echo $this->get_field_id('adcode'); ?>"><?php _e('Advertisement Code:','catch-everest'); ?></label>
                <textarea name="<?php echo $this->get_field_name('adcode'); ?>" class="widefat" id="<?php echo $this->get_field_id('adcode'); ?>"><?php echo $adcode; ?></textarea>
            </p>
            <p><strong>or</strong></p>
        <?php endif; ?>
        <p>
            <label for="<?php echo $this->get_field_id('image'); ?>"><?php _e('Image Url:','catch-everest'); ?></label>
        <input type="text" name="<?php echo $this->get_field_name('image'); ?>" value="<?php echo $image; ?>" class="widefat" id="<?php echo $this->get_field_id('image'); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('href'); ?>"><?php _e('Link URL:','catch-everest'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('href'); ?>" value="<?php echo esc_url( $href ); ?>" class="widefat" id="<?php echo $this->get_field_id('href'); ?>" />
        </p>
		<p>
			<input class="checkbox" type="checkbox" <?php echo $target; ?> id="<?php echo $this->get_field_id('target'); ?>" name="<?php echo $this->get_field_name('target'); ?>" /> <label for="<?php echo $this->get_field_id('target'); ?>"><?php _e( 'Open Link in New Window', 'catch-everest' ); ?></label>
		</p>        
        <p>
            <label for="<?php echo $this->get_field_id('alt'); ?>"><?php _e('Alt text:','catch-everest'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('alt'); ?>" value="<?php echo $alt; ?>" class="widefat" id="<?php echo $this->get_field_id('alt'); ?>" />
        </p>
        <?php
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
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['adcode'] = wp_kses_stripslashes($new_instance['adcode']);
		$instance['image'] = esc_url_raw($new_instance['image']);
		$instance['href'] = esc_url_raw($new_instance['href']);
		$instance[ 'target' ] = isset( $new_instance[ 'target' ] ) ? 1 : 0;
		$instance['alt'] = sanitize_text_field($new_instance['alt']);
		
		return $instance;
	}	
	
	/**
	 * Displays the Widget in the front-end.
	 * 
	 * $args Display arguments including before_title, after_title, before_widget, and after_widget.
	 * $instance The settings for the particular instance of the widget
	 */
	function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );
		$title = !empty( $instance['title'] ) ? $instance[ 'title' ] : '';
		$adcode = !empty( $instance['adcode'] ) ? $instance[ 'adcode' ] : '';
		$image = !empty( $instance['image'] ) ? $instance[ 'image' ] : '';
		$href = !empty( $instance['href'] ) ? $instance[ 'href' ] : '';
		$target = !empty( $instance[ 'target' ] ) ? 'true' : 'false';
		$alt = !empty( $instance['alt'] ) ? $instance[ 'alt' ] : '';

		if ( $target == "true" ) :
			$base = '_blank'; 	
		else:
			$base = '_self'; 	
		endif;	
			
		echo $before_widget;
		if ( $title != '' ) {
			echo $before_title . apply_filters( 'widget_title', $title, $instance, $this->id_base ) . $after_title;
		} 

		if ( $adcode != '' ) {
			echo $adcode;
		}
		elseif ( $image != '' ) {
        	echo '<a href="'.$href.'" target="'.$base.'"><img src="'. $image.'" alt="'.$alt.'" /></a>';
		}
		else {
			_e( 'Add Advertisement Code or Image URL', 'catch-everest' );
		}
		echo $after_widget;
	}

} 