<?php
/**
 *
 * @remove Remove this file and its include WordPress 4.8 is released
 *
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * You can add an optional custom header image to header.php like so ...

	<?php $header_image = get_header_image();
	if ( ! empty( $header_image ) ) { ?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
			<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" />
		</a>
	<?php } // if ( ! empty( $header_image ) ) ?>

 *
 * @package Catch Everest
 * @since Catch Everest 1.0
 */

/**
 * Setup the WordPress core custom header feature.
 *
 * Use add_theme_support to register support for WordPress 3.4+
 * as well as provide backward compatibility for previous versions.
 * Use feature detection of wp_get_theme() which was introduced
 * in WordPress 3.4.
 *
 * @todo Rework this function to remove WordPress 3.4 support when WordPress 3.6 is released.
 *
 * @uses catcheverest_header_style()
 * @uses catcheverest_admin_header_style()
 * @uses catcheverest_admin_header_image()
 *
 * @package Catch Everest
 */
function catcheverest_custom_header_setup() {
	$args = array(
		// Text color and image (empty to use none).
		'default-text-color'     => '000',
		'default-image'          => '',

		// Set height and width, with a maximum value for the width.
		'height'                 => 125,
		'width'                  => 300,

		// Support flexible height and width.
		'flex-height'            => true,
		'flex-width'             => true,

		// Random image rotation off by default.
		'random-default'         => false,

		// Callbacks for styling the header and the admin preview.
		'wp-head-callback'       => 'catcheverest_header_style',
		'admin-head-callback'    => 'catcheverest_admin_header_style',
		'admin-preview-callback' => 'catcheverest_admin_header_image',
	);

	if( function_exists( 'has_custom_logo' ) ) {
		/* Previously, custom header was being used as logo, but with implementation of custom logo
		 * from WordPress version 4.5 onwards, we have migrated custom header to custom logo
		 * and Our custom field for header to core custom header
		 */
		$args['height'] = 450;
		$args['width']  = 1140;
	}

	$args = apply_filters( 'catcheverest_custom_header_args', $args );

	add_theme_support( 'custom-header', $args );

}
add_action( 'after_setup_theme', 'catcheverest_custom_header_setup' );


/**
 * Shiv for get_custom_header().
 *
 * get_custom_header() was introduced to WordPress
 * in version 3.4. To provide backward compatibility
 * with previous versions, we will define our own version
 * of this function.
 *
 * @todo Remove this function when WordPress 3.6 is released.
 * @return stdClass All properties represent attributes of the curent header image.
 *
 * @package Catch Everest
 * @since Catch Everest 1.1
 */

if ( ! function_exists( 'get_custom_header' ) ) {
	function get_custom_header() {
		return (object) array(
			'url'           => get_header_image(),
			'thumbnail_url' => get_header_image(),
			'width'         => HEADER_IMAGE_WIDTH,
			'height'        => HEADER_IMAGE_HEIGHT,
		);
	}
}


if ( ! function_exists( 'catcheverest_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see catcheverest_custom_header_setup().
 *
 * @since Catch Everest 1.0
 */
function catcheverest_header_style() {

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
	if ( HEADER_TEXTCOLOR == get_header_textcolor() )
		return;
	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == get_header_textcolor() ) :
	?>
		#hgroup.with-logo { padding: 0; }
		#site-title,
		#site-description {
			position: absolute !important;
			clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that
		else :
	?>
		#site-title a,
		#site-description {
			color: #<?php echo get_header_textcolor(); ?> !important;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // catcheverest_header_style


if ( ! function_exists( 'catcheverest_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see catcheverest_custom_header_setup().
 *
 * @since Catch Everest 1.0
 */
function catcheverest_admin_header_style() {
?>
	<style type="text/css">
	.appearance_page_custom-header #headimg {
		border: none;
	}
	#headimg h1,
	#desc {
	}
	#headimg h1 {
	}
	#headimg h1 a {
	}
	#desc {
	}
	#headimg img {
	}
	</style>
<?php
}
endif; // catcheverest_admin_header_style


if ( ! function_exists( 'catcheverest_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see catcheverest_custom_header_setup().
 *
 * @since Catch Everest 1.0
 */
function catcheverest_admin_header_image() { ?>
	<div id="headimg">
		<?php
		if ( 'blank' == get_header_textcolor() || '' == get_header_textcolor() )
			$style = ' style="display:none;"';
		else
			$style = ' style="color:#' . get_header_textcolor() . ';"';
		?>
		<h1><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<div id="desc"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></div>
		<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) : ?>
			<img src="<?php echo esc_url( $header_image ); ?>" alt="" />
		<?php endif; ?>
	</div>
<?php }
endif; // catcheverest_admin_header_image


if ( ! function_exists( 'catcheverest_featured_image' ) ) :
/**
 * Template for Featured Header Image from theme options
 *
 * To override this in a child theme
 * simply create your own catcheverest_featured_image(), and that function will be used instead.
 *
 * @since Catch Everest
 */
function catcheverest_featured_image() {
	if ( !function_exists( 'has_custom_logo' ) ) {
		//Bail early if WP version is less than 4.5 as custom header was used as logo
		return;
	}

	// Getting Data from Theme Options Panel
	global $catcheverest_options_settings, $catcheverest_options_defaults;
   	$options = $catcheverest_options_settings;
	$enableheaderimage =  $options[ 'enable_featured_header_image' ];

	if ( $enableheaderimage == 'allpage' || ( $enableheaderimage == 'homepage' && ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) ) ) {
		$header_image = get_header_image();

		if ( ! empty( $header_image ) ){
			$catcheverest_featured_image = '<div id="header-image">';

			// Header Image Link Target
			if ( !empty( $options[ 'featured_header_image_base' ] ) ) :
				$base = '_blank';
			else:
				$base = '_self';
			endif;

			// Header Image Title/Alt
			if ( !empty( $options[ 'featured_header_image_alt' ] ) ) :
				$title = $options[ 'featured_header_image_alt' ];
			else:
				$title = '';
			endif;

			// Header Image Link
			if ( !empty( $options[ 'featured_header_image_url' ] ) ) :
				$catcheverest_featured_image .= '<a title="' . esc_attr( $title ) . '" href="' . esc_url( $options[ 'featured_header_image_url' ] ) .'" target="' . $base . '"><img id="main-feat-img" class="wp-post-image" alt="' . esc_attr( $title ) . '" src="' . esc_url( $header_image ) . ' " /></a>';
			else:
				// if empty featured_header_image on theme options, display default
				$catcheverest_featured_image .= '<img id="main-feat-img" class="wp-post-image" alt="' . esc_attr( $title ) . '" src="' . esc_url( $header_image ) . '" />';
			endif;

		$catcheverest_featured_image .= '</div><!-- #header-image -->';

		echo $catcheverest_featured_image;
		}
	}
} // catcheverest_featured_image
endif;
add_action( 'catcheverest_after_hgroup_wrap', 'catcheverest_featured_image', 9 );
