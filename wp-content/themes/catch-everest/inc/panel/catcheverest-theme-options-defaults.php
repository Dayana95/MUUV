<?php
/**
 * @package Catch Themes
 * @subpackage Catch_Everest
 * @since Catch Everest 1.0
 */

/**
 * Set the default values for all the settings. If no user-defined values
 * is available for any setting, these defaults will be used.
 */
global $catcheverest_options_defaults;
$catcheverest_options_defaults = array(
	'enable_featured_header_image'			=> 'allpage',
	'featured_header_image_url'				=> '',
	'featured_header_image_alt'				=> '',
	'featured_header_image_base'			=> '0',
	'disable_responsive'					=> '0',
 	'fav_icon'								=> get_template_directory_uri().'/images/favicon.ico',
 	'remove_favicon'						=> '1',
	'web_clip'								=> get_template_directory_uri().'/images/apple-touch-icon.png',
 	'remove_web_clip'						=> '1',
	'disable_header_right_sidebar'			=> '0',
 	'custom_css'							=> '',
 	'disable_scrollup'						=> '0',
	'sidebar_layout'						=> 'right-sidebar',
	'content_layout'						=> 'full',
	'reset_layout'							=> '2',
	'more_tag_text'							=> __( 'Continue Reading &rarr;', 'catch-everest' ),
	'excerpt_length'						=> 30,
 	'search_display_text'					=> __( 'Search &hellip;', 'catch-everest' ),
	'feed_url'								=> '',
	'homepage_headline'						=> __( 'Homepage Headline', 'catch-everest' ),
	'homepage_subheadline'					=> __( 'You can edit or disable it through Theme Options', 'catch-everest' ),
	'disable_homepage_headline'				=> '0',
	'disable_homepage_subheadline'			=> '0',
	'disable_homepage_featured'				=> '0',
	'homepage_featured_headline'			=> '',
	'homepage_featured_qty'					=> 3,
	'homepage_featured_image'				=> array(),
	'homepage_featured_url'					=> array(),
	'homepage_featured_base'				=> array(),
	'homepage_featured_title'				=> array(),
	'homepage_featured_content'				=> array(),
	'enable_posts_home'						=> '0',
 	'front_page_category'					=> array(),
	'enable_slider'							=> 'enable-slider-homepage',
	'slider_qty'							=> 4,
 	'transition_effect'						=> 'fade',
 	'transition_delay'						=> 4,
 	'transition_duration'					=> 1,
	'exclude_slider_post'					=> 0,
	'featured_slider'						=> array(),
 	'social_facebook'						=> '',
 	'social_twitter'						=> '',
 	'social_googleplus'						=> '',
 	'social_pinterest'						=> '',
 	'social_youtube'						=> '',
 	'social_vimeo'							=> '',
 	'social_linkedin'						=> '',
 	'social_slideshare'						=> '',
 	'social_foursquare'						=> '',
 	'social_flickr'							=> '',
 	'social_tumblr'							=> '',
 	'social_deviantart'						=> '',
 	'social_dribbble'						=> '',
 	'social_myspace'						=> '',
 	'social_wordpress'						=> '',
 	'social_rss'							=> '',
 	'social_delicious'						=> '',
 	'social_lastfm'							=> '',
	'social_instagram'						=> '',
	'social_github'							=> '',
	'social_vkontakte'						=> '',
	'social_myworld'						=> '',
	'social_odnoklassniki'					=> '',
	'social_goodreads'						=> '',
	'social_skype'							=> '',
	'social_soundcloud'						=> '',
	'social_email'							=> '',
	'social_contact'						=> '',
	'social_xing'							=> '',
 	'google_verification'					=> '',
 	'yahoo_verification'					=> '',
 	'bing_verification'						=> '',
 	'analytic_header'						=> '',
 	'analytic_footer'						=> ''
);
global $catcheverest_options_settings;
$catcheverest_options_settings = catcheverest_options_set_defaults( $catcheverest_options_defaults );

function catcheverest_options_set_defaults( $catcheverest_options_defaults ) {
	$catcheverest_options_settings = array_merge( $catcheverest_options_defaults, (array) get_option( 'catcheverest_options', array() ) );
	return $catcheverest_options_settings;
}


/**
 * Returns an array of sidebar layout options
 *
 * @since Catch Everest 2.5
 */
function catcheverest_sidebar_layout_options() {
	$options = array(
		'right-sidebar' 		=> __( 'Right Sidebar', 'catch-everest' ),
		'left-sidebar' 			=> __( 'Left Sidebar', 'catch-everest' ),
		'no-sidebar'			=> __( 'No Sidebar', 'catch-everest' ),
		'no-sidebar-full-width' => __( 'No Sidebar, Full Width', 'catch-everest' )
	);

	return apply_filters( 'catcheverest_sidebar_layout_options', $options );
}


/**
 * Returns an array of content layout options
 *
 * @since Catch Everest 2.5
 */
function catcheverest_content_layout_options() {
	$options = array(
		'full' 		=> __( 'Full Content Display', 'catch-everest' ),
		'excerpt' 	=> __( 'Excerpt/Blog Display', 'catch-everest' ),
	);

	return apply_filters( 'catcheverest_content_layout_options', $options );
}

/**
 * Returns an array of featured post slider enable options
 *
 * @since Catch Everest 2.5
 */
function catcheverest_enable_slider_options() {
	$options = array(
		'enable-slider-homepage'=> __( 'Homepage / Frontpage', 'catch-everest' ),
		'enable-slider-allpage' => __( 'Entire Site', 'catch-everest' ),
		'disable-slider' 		=> __( 'Disable', 'catch-everest' ),
	);

	return apply_filters( 'catcheverest_content_layout_options', $options );
}


/**
 * Returns an array of slider transition effects
 *
 * @since Catch Everest 2.5
 */
function catcheverest_transition_effects() {
	$options = array(
		'fade'			=> __( 'fade', 'catch-everest' ),
		'wipe' 			=> __( 'wipe', 'catch-everest' ),
		'scrollUp' 		=> __( 'scrollUp', 'catch-everest' ),
		'scrollDown'	=> __( 'scrollDown', 'catch-everest' ),
		'scrollUp' 		=> __( 'scrollUp', 'catch-everest' ),
		'scrollLeft'	=> __( 'scrollLeft', 'catch-everest' ),
		'scrollRight'	=> __( 'scrollRight', 'catch-everest' ),
		'blindX' 		=> __( 'blindX', 'catch-everest' ),
		'blindY' 		=> __( 'blindY', 'catch-everest' ),
		'blindZ' 		=> __( 'blindZ', 'catch-everest' ),
		'cover' 		=> __( 'cover', 'catch-everest' ),
		'shuffle' 		=> __( 'shuffle', 'catch-everest' ),
	);

	return apply_filters( 'catcheverest_transition_effects', $options );
}

