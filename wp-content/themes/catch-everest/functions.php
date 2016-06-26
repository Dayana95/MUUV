<?php
/**
 * Catch Everest functions and definitions
 *
 * @package Catch Themes
 * @subpackage Catch Everest
 * @since Catch Everest 1.0
 */


if ( ! function_exists( 'catcheverest_content_width' ) ) :
	/**
	 * Set the content width in pixels, based on the theme's design and stylesheet.
	 *
	 * Priority 0 to make it available to lower priority callbacks.
	 *
	 * @global int $content_width
	 */
	function catcheverest_content_width() {
		$layout  = catcheverest_get_theme_layout();

		$content_width = 690;

		if( $layout == 'no-sidebar-full-width' ) {
			$content_width = 1040; /* pixels */
		}

		$GLOBALS['content_width'] = apply_filters( 'catcheverest_content_width', $content_width );
	}
endif;
add_action( 'after_setup_theme', 'catcheverest_content_width', 0 );


if ( ! function_exists( 'catcheverest_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since Catch Everest 1.0
 */
function catcheverest_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Catch Everest, use a find and replace
	 * to change 'catch-everest' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'catch-everest', get_template_directory() . '/languages' );

	/**
	 * Add callback for custom TinyMCE editor stylesheets. (editor-style.css)
	 * @see http://codex.wordpress.org/Function_Reference/add_editor_style
	 */
	add_editor_style();

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/*
	* Let WordPress manage the document title.
	* By adding theme support, we declare that this theme does not use a
	* hard-coded <title> tag in the document head, and expect WordPress to
	* provide it for us.
	*/
	add_theme_support( 'title-tag' );

	/**
	 * Theme Options Defaults
	 */
	require( get_template_directory() . '/inc/panel/catcheverest-theme-options-defaults.php' );

	/**
	 * Custom Theme Options
	 */
	require( get_template_directory() . '/inc/panel/theme-options.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	require( get_template_directory() . '/inc/catcheverest-functions.php' );

	/**
	 * Metabox
	 */
	require( get_template_directory() . '/inc/catcheverest-metabox.php' );

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Register Sidebar and Widget.
	 */
	require( get_template_directory() . '/inc/widgets.php' );

	/*
	 * This theme supports custom background color and image, and here
	 * we also set up the default background color.
	 */
	add_theme_support( 'custom-background', array(
		'default-image'	=> get_template_directory_uri() . '/images/noise.png',

	) );

	/**
     * This feature enables custom-menus support for a theme.
     * @see http://codex.wordpress.org/Function_Reference/register_nav_menus
     */
	register_nav_menu( 'primary', __( 'Primary Menu', 'catch-everest' ) );

	/**
	 * Add support for the Aside Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio' ) );

	/**
     * This feature enables Jetpack plugin Infinite Scroll
     */
    add_theme_support( 'infinite-scroll', array(
		'type'           => 'click',
        'container'      => 'content',
        'footer_widgets' => array( 'sidebar-2', 'sidebar-3', 'sidebar-4' ),
        'footer'         => 'page'
    ) );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'slider', 1140, 450, true); //Featured Post Slider Image
	add_image_size( 'featured', 690, 462, true); //Featured Image
	add_image_size( 'small-featured', 390, 261, true); //Small Featured Image

	//@remove Remove check when WordPress 4.8 is released
	if ( function_exists( 'has_custom_logo' ) ) {
		/**
		* Setup Custom Logo Support for theme
		* Supported from WordPress version 4.5 onwards
		* More Info: https://make.wordpress.org/core/2016/03/10/custom-logo/
		*/
		add_theme_support( 'custom-logo',
			array(
				'height'      => 125,
				'width'       => 300,
				'flex-height' => true,
				'flex-width'  => true,
			)
		);
	}

}
endif; // catcheverest_setup
add_action( 'after_setup_theme', 'catcheverest_setup' );


if ( ! function_exists( 'catcheverest_get_theme_layout' ) ) :
	/**
	 * Returns Theme Layout prioritizing the meta box layouts
	 *
	 * @uses  get_options
	 *
	 * @action wp_head
	 *
	 * @since Catch Everest 2.7
	 */
	function catcheverest_get_theme_layout() {
		$id = '';

		global $post, $wp_query;

	    // Front page displays in Reading Settings
		$page_on_front  = get_option('page_on_front') ;
		$page_for_posts = get_option('page_for_posts');

		// Get Page ID outside Loop
		$page_id = $wp_query->get_queried_object_id();

		// Blog Page or Front Page setting in Reading Settings
		if ( $page_id == $page_for_posts || $page_id == $page_on_front ) {
	        $id = $page_id;
	    }
	    else if ( is_singular() ) {
	 		if ( is_attachment() ) {
				$id = $post->post_parent;
			}
			else {
				$id = $post->ID;
			}
		}

		//Get appropriate metabox value of layout
		if ( '' != $id ) {
			$layout = get_post_meta( $id, 'catcheverest-sidebarlayout', true );
		}
		else {
			$layout = 'default';
		}

		//Load options data
		global $catcheverest_options_settings;
   		$options = $catcheverest_options_settings;

   		//check empty and load default
		if ( empty( $layout ) || 'default' == $layout ) {
			$layout = $options['sidebar_layout'];
		}

		return $layout;
	}
endif; //catcheverest_get_theme_layout

/**
 * Implement the Custom Header feature
 */
require( get_template_directory() . '/inc/custom-header.php' );


/**
 * Customizer Options
 */
require( get_template_directory() . '/inc/panel/customizer/customizer.php' );


/**
 * Migrate Logo to New WordPress core Custom Logo
 *
 * Runs if version number saved in theme_mod "logo_version" doesn't match current theme version.
 */
function catcheverest_logo_migrate() {
	$ver = get_theme_mod( 'logo_version', false );

	// Return if update has already been run
	if ( version_compare( $ver, '3.6' ) >= 0 ) {
		return;
	}

	if ( function_exists( 'the_custom_logo' ) ) {

		$header_image = get_header_image();

		if ( ! empty( $header_image ) ) {
			// Since previous logo was stored a URL, convert it to an attachment ID
			$logo = attachment_url_to_postid( $header_image );

			if ( is_int( $logo ) ) {
				set_theme_mod( 'custom_logo', $logo );
			}
		}

		//Remove header image previously set as logo
		set_theme_mod( 'header_image', '' );

		set_theme_mod( 'header_image_data', array() );

  		// Update to match logo_version so that script is not executed continously
		set_theme_mod( 'logo_version', '3.6' );
	}
}
add_action( 'after_setup_theme', 'catcheverest_logo_migrate' );

/**
 * Migrate Custom Favicon to WordPress core Site Icon
 *
 * Runs if version number saved in theme_mod "site_icon_version" doesn't match current theme version.
 */
function catcheverest_site_icon_migrate() {
	$ver = get_theme_mod( 'site_icon_version', false );

	//Return if update has already been run
	if ( version_compare( $ver, '3.6' ) >= 0 ) {
		return;
	}

	/**
	 * Get Theme Options Values
	 */
	global $catcheverest_options_settings;
   	$options = $catcheverest_options_settings;

   	// If a logo has been set previously, update to use logo feature introduced in WordPress 4.5
	if ( function_exists( 'has_site_icon' ) ) {
		if( isset( $options['fav_icon'] ) && '' != $options['fav_icon'] ) {
			// Since previous logo was stored a URL, convert it to an attachment ID
			$site_icon = attachment_url_to_postid( $options['fav_icon'] );

			if ( is_int( $site_icon ) ) {
				update_option( 'site_icon', $site_icon );
			}
		}

	  	// Update to match site_icon_version so that script is not executed continously
		set_theme_mod( 'site_icon_version', '3.6' );
	}
}
add_action( 'after_setup_theme', 'catcheverest_site_icon_migrate' );
