<?php
/**
 * Catch Everest Customizer/Theme Options
 *
 * @package Catch Themes
 * @subpackage Catch Everest
 * @since Catch Everest 2.5
 */

/**
 * Implements Catch Everest theme options into Theme Customizer.
 *
 * @param $wp_customize Theme Customizer object
 * @return void
 *
 * @since Catch Everest 2.5
 */
function catcheverest_customize_register( $wp_customize ) {
	global $catcheverest_options_settings, $catcheverest_options_defaults;

    $options = $catcheverest_options_settings;

	$defaults = $catcheverest_options_defaults;

	//Custom Controls
	require get_template_directory() . '/inc/panel/customizer/customizer-custom-controls.php';

	$theme_slug = 'catcheverest_';

	$settings_page_tabs = array(
		'theme_options' => array(
			'id' 			=> 'theme_options',
			'title' 		=> __( 'Theme Options', 'catch-everest' ),
			'description' 	=> __( 'Basic theme Options', 'catch-everest' ),
			'sections' 		=> array(
				'responsive_design' => array(
					'id' 			=> 'responsive_design',
					'title' 		=> __( 'Responsive Design', 'catch-everest' ),
					'description' 	=> '',
				),
				'favicon' => array(
					'id' 			=> 'favicon',
					'title' 		=> __( 'Favicon', 'catch-everest' ),
					'description' 	=> '',
				),
				'web_clip_icon_options' => array(
					'id' 			=> 'web_clip_icon_options',
					'title' 		=> __( 'Webclip Icon Options', 'catch-everest' ),
					'description' 	=> __( 'Web Clip Icon for Apple devices. Recommended Size - Width 144px and Height 144px height, which will support High Resolution Devices like iPad Retina', 'catch-everest' )
				),
				'header_right_section' => array(
					'id' 			=> 'header_right_section',
					'title' 		=> __( 'Header Right Section', 'catch-everest' ),
					'description' 	=> '',
				),
				'search_text_settings' => array(
					'id' 			=> 'search_text_settings',
					'title' 		=> __( 'Search Text Settings', 'catch-everest' ),
					'description' 	=> '',
				),
				'excerpt_more_tag_settings' => array(
					'id' 			=> 'excerpt_more_tag_settings',
					'title' 		=> __( 'Excerpt / More Tag Settings', 'catch-everest' ),
					'description' 	=> '',
				),
				'feed_redirect' => array(
					'id' 			=> 'feed_redirect',
					'title' 		=> __( 'Feed Redirect', 'catch-everest' ),
					'description' 	=> '',
				),
				'layout_options' => array(
					'id' 			=> 'layout_options',
					'title' 		=> __( 'Layout Options', 'catch-everest' ),
					'description' 	=> '',
				),
				'header_options' => array(
					'id' 			=> 'header_options',
					'title' 		=> __( 'Header Options', 'catch-everest' ),
					'description' 	=> '',
				),
				'content_featured_image_options' => array(
					'id' 			=> 'content_featured_image_options',
					'title' 		=> __( 'Content Featured Image Options', 'catch-everest' ),
					'description' 	=> '',
				),
				'promotion_headline_options' => array(
					'id' 			=> 'promotion_headline_options',
					'title' 		=> __( 'Promotion Headline Options', 'catch-everest' ),
					'description' 	=> '',
				),
				'homepage_settings' => array(
					'id' 			=> 'homepage_settings',
					'title' 		=> __( 'Homepage/Frontpage Settings', 'catch-everest' ),
					'description' 	=> '',
				),
				'custom_css' => array(
					'id' 			=> 'custom_css',
					'title' 		=> __( 'Custom CSS', 'catch-everest' ),
					'description' 	=> '',
				),
				'scrollup_options' => array(
					'id' 			=> 'scrollup_options',
					'title' 		=> __( 'Scroll Up', 'catch-everest' ),
					'description' 	=> '',
				),

			),
		),
		'homepage_settings' => array(
			'id' 			=> 'homepage_settings',
			'title' 		=> __( 'Homepage Settings', 'catch-everest' ),
			'description' 	=> __( 'Homepage Settings', 'catch-everest' ),
			'sections' 		=> array(
				'homepage_headline_options' => array(
					'id' 			=> 'homepage_headline_options',
					'title' 		=> __( 'Homepage Headline Options', 'catch-everest' ),
					'description' 	=> '',
				),
				'homepage_featured_content_options' => array(
					'id' 			=> 'homepage_featured_content_options',
					'title' 		=> __( 'Homepage Featured Content options', 'catch-everest' ),
					'description' 	=> '',
				),
				'homepage_featured_content_options' => array(
					'id' 			=> 'homepage_featured_content_options',
					'title' 		=> __( 'Homepage Featured Content Options', 'catch-everest' ),
					'description' 	=> '',
				),
				'homepage_frontpage_settings' => array(
					'id' 			=> 'homepage_frontpage_settings',
					'title' 		=> __( 'Homepage / Frontpage Settings', 'catch-everest' ),
					'description' 	=> '',
				),
			)
		),

		'featured_post_slider' => array(
			'id' 			=> 'featured_post_slider',
			'title' 		=> __( 'Featured Post Slider', 'catch-everest' ),
			'description' 	=> __( 'Featured Post Slider', 'catch-everest' ),
			'sections' 		=> array(
				'slider_options' => array(
					'id' 			=> 'slider_options',
					'title' 		=> __( 'Slider Options', 'catch-everest' ),
					'description' 	=> '',
				),
			)
		),

		'social_links' => array(
			'id' 			=> 'social_links',
			'title' 		=> __( 'Social Links', 'catch-everest' ),
			'description' 	=> __( 'Add your social links here', 'catch-everest' ),
			'sections' 		=> array(
				'predefined_social_icons' => array(
					'id' 			=> 'predefined_social_icons',
					'title' 		=> __( 'Predefined Social Icons', 'catch-everest' ),
					'description' 	=> '',
				),
			),
		),
		'webmaster_tools' => array(
			'id' 			=> 'webmaster_tools',
			'title' 		=> __( 'Webmaster Tools', 'catch-everest' ),
			'description' 	=>  sprintf( __( 'Webmaster Tools falls under Plugins Territory according to Theme Review Guidelines in WordPress.org. This feature will be depreciated in future versions from Catch Box free version. If you want this feature, then you can add <a target="_blank" href="%s">Catch Web Tools</a>  plugin.', 'catch-everest' ), esc_url( 'https://wordpress.org/plugins/catch-web-tools/' ) ),
			'sections' 		=> array(
				'webmaster_tools' => array(
					'id' 			=> 'webmaster_tools',
					'title' 		=> __( 'Webmaster Tools', 'catch-everest' ),
					'description' 	=>  sprintf( __( 'Webmaster Tools falls under Plugins Territory according to Theme Review Guidelines in WordPress.org. This feature will be depreciated in future versions from Catch Box free version. If you want this feature, then you can add <a target="_blank" href="%s">Catch Web Tools</a>  plugin.', 'catch-everest' ), esc_url( 'https://wordpress.org/plugins/catch-web-tools/' ) ),
				),
			),
		),
	);

	//Add Panels and sections
	foreach ( $settings_page_tabs as $panel ) {
		$wp_customize->add_panel(
			$theme_slug . $panel['id'],
			array(
				'priority' 		=> 200,
				'capability' 	=> 'edit_theme_options',
				'title' 		=> $panel['title'],
				'description' 	=> $panel['description'],
			)
		);

		// Loop through tabs for sections
		foreach ( $panel['sections'] as $section ) {
			$params = array(
								'title'			=> $section['title'],
								'description'	=> $section['description'],
								'panel'			=> $theme_slug . $panel['id']
							);

			if ( isset( $section['active_callback'] ) ) {
				$params['active_callback'] = $section['active_callback'];
			}

			$wp_customize->add_section(
				// $id
				$theme_slug . $section['id'],
				// parameters
				$params

			);
		}
	}

	$settings_parameters = array(
		//Header Featured Image
		'enable_featured_header_image' => array(
			'id' 			=> 'enable_featured_header_image',
			'title' 		=> __( 'Enable Featured Header Image', 'catch-everest' ),
			'description'	=> '',
			'field_type' 	=> 'select',
			'priority' 		=> 1,
			'sanitize' 		=> 'catcheverest_sanitize_select',
			'section' 		=> 'header_image',
			'default' 		=> $defaults['enable_featured_header_image'],
			'choices'		=> array(
				'allpage'  => __( 'Entire Site', 'catch-everest' ),
				'homepage' => __( 'Homepage', 'catch-everest' ),
			)
		),
		'featured_header_image_alt' => array(
			'id' 			=> 'featured_header_image_alt',
			'title' 		=> __( 'Featured Header Image Alt/Title Tag', 'catch-everest' ),
			'description'	=> '',
			'field_type' 	=> 'text',
			'sanitize' 		=> 'sanitize_text_field',
			'section' 		=> 'header_image',
			'default' 		=> $defaults['featured_header_image_alt'],
		),
		'featured_header_image_url' => array(
			'id' 			=> 'featured_header_image_url',
			'title' 		=> __( 'Featured Header Image Link URL', 'catch-everest' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'section' 		=> 'header_image',
			'default' 		=> $defaults['featured_header_image_url'],
		),
		'featured_header_image_base' => array(
			'id' 			=> 'featured_header_image_base',
			'title' 		=> __( 'Check to Open Link in New Window', 'catch-everest' ),
			'description'	=> '',
			'field_type' 	=> 'checkbox',
			'sanitize' 		=> 'catcheverest_sanitize_checkbox',
			'section' 		=> 'header_image',
			'default' 		=> $defaults['featured_header_image_base'],
		),

		'disable_responsive' => array(
			'id' 			=> 'disable_responsive',
			'title' 		=> __( 'Check to Disable Responsive Design', 'catch-everest' ),
			'description'	=> '',
			'field_type' 	=> 'checkbox',
			'sanitize' 		=> 'catcheverest_sanitize_select',
			'section' 		=> 'responsive_design',
			'default' 		=> $defaults['disable_responsive'],
		),

		'disable_header_right_sidebar' => array(
			'id' 			=> 'disable_header_right_sidebar',
			'title' 		=> __( 'Check to Disable Header Right Section', 'catch-everest' ),
			'description'	=> '',
			'field_type' 	=> 'checkbox',
			'sanitize' 		=> 'catcheverest_sanitize_checkbox',
			'panel' 		=> 'theme_options',
			'section' 		=> 'header_right_section',
			'default' 		=> $defaults['disable_header_right_sidebar']
		),

		//Search Settings
		'search_display_text' => array(
			'id' 			=> 'search_display_text',
			'title' 		=> __( 'Default Display Text in Search', 'catch-everest' ),
			'description'	=> '',
			'field_type' 	=> 'text',
			'sanitize' 		=> 'sanitize_text_field',
			'panel' 		=> 'theme_options',
			'section' 		=> 'search_text_settings',
			'default' 		=> $defaults['search_display_text']
		),

		//Excerpt More Settings
		'more_tag_text' => array(
			'id' 			=> 'more_tag_text',
			'title' 		=> __( 'More Tag Text', 'catch-everest' ),
			'description'	=> '',
			'field_type' 	=> 'text',
			'sanitize' 		=> 'sanitize_text_field',
			'panel' 		=> 'theme_options',
			'section' 		=> 'excerpt_more_tag_settings',
			'default' 		=> $defaults['more_tag_text']
		),
		'excerpt_length' => array(
			'id' 			=> 'excerpt_length',
			'title' 		=> __( 'Excerpt length(words)', 'catch-everest' ),
			'description'	=> '',
			'field_type' 	=> 'number',
			'sanitize' 		=> 'catcheverest_sanitize_number_range',
			'panel' 		=> 'theme_options',
			'section' 		=> 'excerpt_more_tag_settings',
			'default' 		=> $defaults['excerpt_length'],
			'input_attrs' 	=> array(
					            'style' => 'width: 45px;',
					            'min'   => 0,
					            'max'   => 999999,
					            'step'  => 1,
					        	)
		),

		'feed_url' => array(
			'id' 				=> 'feed_url',
			'title' 			=> __( 'Feed Redirect URL', 'catch-everest' ),
			'description' 		=> __( ' Add in the Feedburner URL', 'catch-everest' ),
			'field_type' 		=> 'url',
			'sanitize' 			=> 'esc_url_raw',
			'panel' 			=> 'theme_options',
			'section' 			=> 'feed_redirect',
			'default' 			=> $defaults['feed_url'],
			'active_callback'	=> 'catcheverest_is_feed_url_present'
		),

		//Layout Options
		'sidebar_layout' => array(
			'id' 			=> 'sidebar_layout',
			'title' 		=> __( 'Sidebar Layout Options', 'catch-everest' ),
			'description'	=> '',
			'field_type' 	=> 'select',
			'sanitize' 		=> 'catcheverest_sanitize_select',
			'panel' 		=> 'theme_options',
			'section' 		=> 'layout_options',
			'default' 		=> $defaults['sidebar_layout'],
			'choices'		=> catcheverest_sidebar_layout_options(),
		),
		'content_layout' => array(
			'id' 			=> 'content_layout',
			'title' 		=> __( 'Full Content Display', 'catch-everest' ),
			'description'	=> '',
			'field_type' 	=> 'select',
			'sanitize' 		=> 'catcheverest_sanitize_select',
			'panel' 		=> 'theme_options',
			'section' 		=> 'layout_options',
			'default' 		=> $defaults['content_layout'],
			'choices'		=> catcheverest_content_layout_options(),
		),
		'reset_layout' => array(
			'id' 			=> 'reset_layout',
			'title' 		=> __( 'Check to Reset Layout', 'catch-everest' ),
			'description'	=> __( 'Please refresh the customizer after saving if reset option is used', 'catch-everest' ),
			'field_type' 	=> 'checkbox',
			'sanitize' 		=> 'catcheverest_sanitize_reset_layout',
			'panel' 		=> 'theme_options',
			'section' 		=> 'layout_options',
			'default' 		=> $defaults['reset_layout']
		),

		//Custom Css
		'custom_css' => array(
			'id' 			=> 'custom_css',
			'title' 		=> __( 'Enter your custom CSS styles', 'catch-everest' ),
			'description' 	=> '',
			'field_type' 	=> 'textarea',
			'sanitize' 		=> 'catcheverest_sanitize_custom_css',
			'panel' 		=> 'theme_options',
			'section' 		=> 'custom_css',
			'default' 		=> $defaults['homepage_headline']
		),

		//Update Notifier
		'disable_scrollup' => array(
			'id' 			=> 'disable_scrollup',
			'title' 		=> __( 'Check to Disable Scroll Up', 'catch-everest' ),
			'description' 	=> '',
			'field_type' 	=> 'checkbox',
			'sanitize' 		=> 'catcheverest_sanitize_checkbox',
			'panel' 		=> 'theme_options',
			'section' 		=> 'scrollup_options',
			'default' 		=> $defaults['disable_scrollup']
		),

		//Homepage Headline Options
		'homepage_headline' => array(
			'id' 			=> 'homepage_headline',
			'title' 		=> __( 'Homepage Headline Text', 'catch-everest' ),
			'description' 	=> __( 'Appropriate Words: 10', 'catch-everest' ),
			'field_type' 	=> 'textarea',
			'sanitize' 		=> 'wp_kses_post',
			'panel' 		=> 'homepage_settings',
			'section' 		=> 'homepage_headline_options',
			'default' 		=> $defaults['homepage_headline']
		),
		'homepage_subheadline' => array(
			'id' 			=> 'homepage_subheadline',
			'title' 		=> __( 'Homepage Subheadline Text', 'catch-everest' ),
			'description' 	=> __( 'Appropriate Words: 15', 'catch-everest' ),
			'field_type' 	=> 'textarea',
			'sanitize' 		=> 'wp_kses_post',
			'panel' 		=> 'homepage_settings',
			'section' 		=> 'homepage_headline_options',
			'default' 		=> $defaults['homepage_subheadline']
		),
		'disable_homepage_headline' => array(
			'id' 			=> 'disable_homepage_headline',
			'title' 		=> __( 'Check to Disable Homepage Headline', 'catch-everest' ),
			'description'	=> '',
			'field_type' 	=> 'checkbox',
			'sanitize' 		=> 'catcheverest_sanitize_checkbox',
			'panel' 		=> 'homepage_settings',
			'section' 		=> 'homepage_headline_options',
			'default' 		=> $defaults['disable_homepage_headline']
		),
		'disable_homepage_subheadline' => array(
			'id' 			=> 'disable_homepage_subheadline',
			'title' 		=> __( 'Check to Disable Homepage Subheadline', 'catch-everest' ),
			'description'	=> '',
			'field_type' 	=> 'checkbox',
			'sanitize' 		=> 'catcheverest_sanitize_checkbox',
			'panel' 		=> 'homepage_settings',
			'section' 		=> 'homepage_headline_options',
			'default' 		=> $defaults['disable_homepage_subheadline']
		),

		//Homepage/Frontpage Settings
		'enable_posts_home' => array(
			'id' 			=> 'enable_posts_home',
			'title' 		=> __( 'Check to Enable Latest Posts', 'catch-everest' ),
			'description'	=> '',
			'field_type' 	=> 'checkbox',
			'sanitize' 		=> 'catcheverest_sanitize_checkbox',
			'panel' 		=> 'homepage_settings',
			'section' 		=> 'homepage_frontpage_settings',
			'default' 		=> $defaults['enable_posts_home']
		),
		'front_page_category' => array(
			'id' 			=> 'front_page_category',
			'title' 		=> __( 'Homepage posts categories:', 'catch-everest' ),
			'description'	=> __( 'Only posts that belong to the categories selected here will be displayed on the front page', 'catch-everest' ),
			'field_type' 	=> 'category-multiple',
			'sanitize' 		=> 'catcheverest_sanitize_category_list',
			'panel' 		=> 'homepage_settings',
			'section' 		=> 'homepage_frontpage_settings',
			'default' 		=> $defaults['front_page_category']
		),

		//Featured Content
		'disable_homepage_featured' => array(
			'id' 			=> 'disable_homepage_featured',
			'title' 		=> __( 'Check to Disable Homepage Featured Content', 'catch-everest' ),
			'description'	=> '',
			'field_type' 	=> 'checkbox',
			'sanitize' 		=> 'catcheverest_sanitize_checkbox',
			'panel' 		=> 'homepage_settings',
			'section' 		=> 'homepage_featured_content_options',
			'default' 		=> $defaults['disable_homepage_featured'],
		),
		'homepage_featured_headline' => array(
			'id' 			=> 'homepage_featured_headline',
			'title' 		=> __( 'Featured Content Headline Text', 'catch-everest' ),
			'description'	=> __( 'Leave empty if you want to remove headline', 'catch-everest' ),
			'field_type' 	=> 'text',
			'sanitize' 		=> 'sanitize_text_field',
			'panel' 		=> 'homepage_settings',
			'section' 		=> 'homepage_featured_content_options',
			'default' 		=> $defaults['homepage_featured_headline']
		),
		'homepage_featured_qty' => array(
			'id' 			=> 'homepage_featured_qty',
			'title' 		=> __( 'Number of Featured Content', 'catch-everest' ),
			'description'		=> __( 'Customizer page needs to be refreshed after saving if number of featured content is changed', 'catch-everest' ),
			'field_type' 	=> 'number',
			'sanitize' 		=> 'catcheverest_sanitize_number_range',
			'panel' 		=> 'homepage_settings',
			'section' 		=> 'homepage_featured_content_options',
			'default' 		=> $defaults['homepage_featured_qty'],
			'input_attrs' 	=> array(
					            'style' => 'width: 45px;',
					            'min'   => 0,
					            'max'   => 24,
					            'step'  => 1,
					        	)
		),

		//Slider Options
		'enable_slider' => array(
			'id' 			=> 'enable_slider',
			'title' 		=> __( 'Enable Slider', 'catch-everest' ),
			'description'	=> '',
			'field_type' 	=> 'select',
			'sanitize' 		=> 'catcheverest_sanitize_select',
			'panel' 		=> 'featured_slider',
			'section' 		=> 'slider_options',
			'default' 		=> $defaults['enable_slider'],
			'choices'		=> catcheverest_enable_slider_options(),
		),
		'slider_qty' => array(
			'id' 				=> 'slider_qty',
			'title' 			=> __( 'Number of Slides', 'catch-everest' ),
			'description'		=> __( 'Customizer page needs to be refreshed after saving if number of slides is changed', 'catch-everest' ),
			'field_type' 		=> 'number',
			'sanitize' 			=> 'catcheverest_sanitize_number_range',
			'panel' 			=> 'featured_slider',
			'section' 			=> 'slider_options',
			'default' 			=> $defaults['slider_qty'],
			'input_attrs' 		=> array(
						            'style' => 'width: 45px;',
						            'min'   => 0,
						            'max'   => 20,
						            'step'  => 1,
						        	)
		),

		'transition_effect' => array(
			'id' 				=> 'transition_effect',
			'title' 			=> __( 'Transition Effect', 'catch-everest' ),
			'description'		=> '',
			'field_type' 		=> 'select',
			'sanitize' 			=> 'catcheverest_sanitize_select',
			'panel' 			=> 'featured_slider',
			'section' 			=> 'slider_options',
			'default' 			=> $defaults['transition_effect'],
			'choices'			=> catcheverest_transition_effects(),
		),
		'transition_delay' => array(
			'id' 				=> 'transition_delay',
			'title' 			=> __( 'Transition Delay', 'catch-everest' ),
			'description'		=> '',
			'field_type' 		=> 'number',
			'sanitize' 			=> 'catcheverest_sanitize_number_range',
			'panel' 			=> 'featured_slider',
			'section' 			=> 'slider_options',
			'default' 			=> $defaults['transition_delay'],
			'input_attrs' 		=> array(
						            'style' => 'width: 45px;',
						            'min'   => 0,
						            'max'   => 999999999,
						            'step'  => 1,
						        	)
		),
		'transition_duration' => array(
			'id' 				=> 'transition_duration',
			'title' 			=> __( 'Transition Length', 'catch-everest' ),
			'description'		=> '',
			'field_type' 		=> 'number',
			'sanitize' 			=> 'catcheverest_sanitize_number_range',
			'panel' 			=> 'featured_slider',
			'section' 			=> 'slider_options',
			'default' 			=> $defaults['transition_duration'],
			'input_attrs' 		=> array(
						            'style' => 'width: 45px;',
						            'min'   => 0,
						            'max'   => 999999999,
						            'step'  => 1,
						        	)
		),

		//Featured Post Slider
		'exclude_slider_post' => array(
			'id' 				=> 'exclude_slider_post',
			'title' 			=> __( 'Check to Exclude Slider posts from Homepage posts', 'catch-everest' ),
			'description'		=> __( 'Please refresh the customizer after saving if reset option is used', 'catch-everest' ),
			'field_type' 		=> 'checkbox',
			'sanitize' 			=> 'catcheverest_sanitize_checkbox',
			'panel' 			=> 'featured_slider',
			'section' 			=> 'slider_options',
			'default' 			=> $defaults['exclude_slider_post'],
		),

		//Social Links
		'social_facebook' => array(
			'id' 			=> 'social_facebook',
			'title' 		=> __( 'Facebook', 'catch-everest' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'panel' 		=> 'social_links',
			'section' 		=> 'predefined_social_icons',
			'default' 		=> $defaults['social_facebook']
		),
		'social_twitter' => array(
			'id' 			=> 'social_twitter',
			'title' 		=> __( 'Twitter', 'catch-everest' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'panel' 		=> 'social_links',
			'section' 		=> 'predefined_social_icons',
			'default' 		=> $defaults['social_twitter']
		),
		'social_googleplus' => array(
			'id' 			=> 'social_googleplus',
			'title' 		=> __( 'Google+', 'catch-everest' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'panel' 		=> 'social_links',
			'section' 		=> 'predefined_social_icons',
			'default' 		=> $defaults['social_googleplus']
		),
		'social_pinterest' => array(
			'id' 			=> 'social_pinterest',
			'title' 		=> __( 'Pinterest', 'catch-everest' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'panel' 		=> 'social_links',
			'section' 		=> 'predefined_social_icons',
			'default' 		=> $defaults['social_pinterest']
		),
		'social_youtube' => array(
			'id' 			=> 'social_youtube',
			'title' 		=> __( 'Youtube', 'catch-everest' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'panel' 		=> 'social_links',
			'section' 		=> 'predefined_social_icons',
			'default' 		=> $defaults['social_youtube']
		),
		'social_vimeo' => array(
			'id' 			=> 'social_vimeo',
			'title' 		=> __( 'Vimeo', 'catch-everest' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'panel' 		=> 'social_links',
			'section' 		=> 'predefined_social_icons',
			'default' 		=> $defaults['social_vimeo']
		),
		'social_linkedin' => array(
			'id' 			=> 'social_linkedin',
			'title' 		=> __( 'LinkedIn', 'catch-everest' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'panel' 		=> 'social_links',
			'section' 		=> 'predefined_social_icons',
			'default' 		=> $defaults['social_linkedin']
		),
		'social_slideshare' => array(
			'id' 			=> 'social_slideshare',
			'title' 		=> __( 'Slideshare', 'catch-everest' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'panel' 		=> 'social_links',
			'section' 		=> 'predefined_social_icons',
			'default' 		=> $defaults['social_slideshare']
		),
		'social_foursquare' => array(
			'id' 			=> 'social_foursquare',
			'title' 		=> __( 'Foursquare', 'catch-everest' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'panel' 		=> 'social_links',
			'section' 		=> 'predefined_social_icons',
			'default' 		=> $defaults['social_foursquare']
		),
		'social_flickr' => array(
			'id' 			=> 'social_flickr',
			'title' 		=> __( 'Flickr', 'catch-everest' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'panel' 		=> 'social_links',
			'section' 		=> 'predefined_social_icons',
			'default' 		=> $defaults['social_flickr']
		),
		'social_tumblr' => array(
			'id' 			=> 'social_tumblr',
			'title' 		=> __( 'Tumblr', 'catch-everest' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'panel' 		=> 'social_links',
			'section' 		=> 'predefined_social_icons',
			'default' 		=> $defaults['social_tumblr']
		),
		'social_deviantart' => array(
			'id' 			=> 'social_deviantart',
			'title' 		=> __( 'deviantART', 'catch-everest' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'panel' 		=> 'social_links',
			'section' 		=> 'predefined_social_icons',
			'default' 		=> $defaults['social_deviantart']
		),
		'social_dribbble' => array(
			'id' 			=> 'social_dribbble',
			'title' 		=> __( 'Dribbble', 'catch-everest' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'panel' 		=> 'social_links',
			'section' 		=> 'predefined_social_icons',
			'default' 		=> $defaults['social_dribbble']
		),
		'social_myspace' => array(
			'id' 			=> 'social_myspace',
			'title' 		=> __( 'MySpace', 'catch-everest' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'panel' 		=> 'social_links',
			'section' 		=> 'predefined_social_icons',
			'default' 		=> $defaults['social_myspace']
		),
		'social_wordpress' => array(
			'id' 			=> 'social_wordpress',
			'title' 		=> __( 'WordPress', 'catch-everest' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'panel' 		=> 'social_links',
			'section' 		=> 'predefined_social_icons',
			'default' 		=> $defaults['social_wordpress']
		),
		'social_rss' => array(
			'id' 			=> 'social_rss',
			'title' 		=> __( 'RSS', 'catch-everest' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'panel' 		=> 'social_links',
			'section' 		=> 'predefined_social_icons',
			'default' 		=> $defaults['social_rss']
		),
		'social_delicious' => array(
			'id' 			=> 'social_delicious',
			'title' 		=> __( 'Delicious', 'catch-everest' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'panel' 		=> 'social_links',
			'section' 		=> 'predefined_social_icons',
			'default' 		=> $defaults['social_delicious']
		),
		'social_lastfm' => array(
			'id' 			=> 'social_lastfm',
			'title' 		=> __( 'Last.fm', 'catch-everest' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'panel' 		=> 'social_links',
			'section' 		=> 'predefined_social_icons',
			'default' 		=> $defaults['social_lastfm']
		),
		'social_instagram' => array(
			'id' 			=> 'social_instagram',
			'title' 		=> __( 'Instagram', 'catch-everest' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'panel' 		=> 'social_links',
			'section' 		=> 'predefined_social_icons',
			'default' 		=> $defaults['social_instagram']
		),
		'social_github' => array(
			'id' 			=> 'social_github',
			'title' 		=> __( 'GitHub', 'catch-everest' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'panel' 		=> 'social_links',
			'section' 		=> 'predefined_social_icons',
			'default' 		=> $defaults['social_github']
		),
		'social_vkontakte' => array(
			'id' 			=> 'social_vkontakte',
			'title' 		=> __( 'Vkontakte', 'catch-everest' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'panel' 		=> 'social_links',
			'section' 		=> 'predefined_social_icons',
			'default' 		=> $defaults['social_vkontakte']
		),
		'social_myworld' => array(
			'id' 			=> 'social_myworld',
			'title' 		=> __( 'My World', 'catch-everest' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'panel' 		=> 'social_links',
			'section' 		=> 'predefined_social_icons',
			'default' 		=> $defaults['social_myworld']
		),
		'social_odnoklassniki' => array(
			'id' 			=> 'social_odnoklassniki',
			'title' 		=> __( 'Odnoklassniki', 'catch-everest' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'panel' 		=> 'social_links',
			'section' 		=> 'predefined_social_icons',
			'default' 		=> $defaults['social_odnoklassniki']
		),
		'social_goodreads' => array(
			'id' 			=> 'social_goodreads',
			'title' 		=> __( 'Goodreads', 'catch-everest' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'panel' 		=> 'social_links',
			'section' 		=> 'predefined_social_icons',
			'default' 		=> $defaults['social_goodreads']
		),
		'social_skype' => array(
			'id' 			=> 'social_skype',
			'title' 		=> __( 'Skype', 'catch-everest' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'sanitize_text_field',
			'panel' 		=> 'social_links',
			'section' 		=> 'predefined_social_icons',
			'default' 		=> $defaults['social_skype']
		),
		'social_soundcloud' => array(
			'id' 			=> 'social_soundcloud',
			'title' 		=> __( 'Soundcloud', 'catch-everest' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'panel' 		=> 'social_links',
			'section' 		=> 'predefined_social_icons',
			'default' 		=> $defaults['social_soundcloud']
		),
		'social_email' => array(
			'id' 			=> 'social_email',
			'title' 		=> __( 'Email', 'catch-everest' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'sanitize_email',
			'panel' 		=> 'social_links',
			'section' 		=> 'predefined_social_icons',
			'default' 		=> $defaults['social_email']
		),
		'social_contact' => array(
			'id' 			=> 'social_contact',
			'title' 		=> __( 'Contact', 'catch-everest' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'panel' 		=> 'social_links',
			'section' 		=> 'predefined_social_icons',
			'default' 		=> $defaults['social_contact']
		),
		'social_xing' => array(
			'id' 			=> 'social_xing',
			'title' 		=> __( 'Xing', 'catch-everest' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'panel' 		=> 'social_links',
			'section' 		=> 'predefined_social_icons',
			'default' 		=> $defaults['social_xing']
		),

		//Webmaster Tools
		'analytic_header' => array(
			'id' 				=> 'analytic_header',
			'title' 			=> __( 'Code to display on Header', 'catch-everest' ),
			'description' 		=> __( 'Here you can put scripts from Google, Facebook, Twitter, Add This etc. which will load on Header', 'catch-everest' ),
			'field_type' 		=> 'textarea',
			'sanitize' 			=> 'wp_kses_stripslashes',
			'panel' 			=> 'webmaster_tools',
			'section' 			=> 'webmaster_tools',
			'active_callback'	=> 'catcheverest_is_header_code_present',
			'default' 			=> ''
		),
		'analytic_footer' => array(
			'id' 				=> 'analytic_footer',
			'title' 			=> __( 'Code to display on Footer', 'catch-everest' ),
			'description' 		=> __( 'Here you can put scripts from Google, Facebook, Twitter, Add This etc. which will load on footer', 'catch-everest' ),
			'field_type' 		=> 'textarea',
			'sanitize' 			=> 'wp_kses_stripslashes',
			'panel' 			=> 'webmaster_tools',
			'section' 			=> 'webmaster_tools',
			'active_callback'	=> 'catcheverest_is_footer_code_present',
			'default' 		=> ''
		),
	);


	//@remove Remove if block when WordPress 4.8 is released
	if( !function_exists( 'has_site_icon' ) ) {
		$settings_site_icon = array(
			//Favicon
			'remove_favicon' => array(
				'id' 				=> 'remove_favicon',
				'title' 			=> __( 'Check to Disable Favicon', 'catch-everest' ),
				'description'		=> '',
				'field_type' 		=> 'checkbox',
				'sanitize' 			=> 'catcheverest_sanitize_checkbox',
				'panel' 			=> 'theme_options',
				'section' 			=> 'favicon',
				'default' 			=> $defaults['remove_favicon'],
				'active_callback'	=> 'catcheverest_is_site_icon_active'
			),
			'fav_icon' => array(
				'id' 				=> 'fav_icon',
				'title' 			=> __( 'Fav Icon', 'catch-everest' ),
				'description'		=> '',
				'field_type' 		=> 'image',
				'sanitize' 			=> 'catcheverest_sanitize_image',
				'panel' 			=> 'theme_options',
				'section' 			=> 'favicon',
				'default' 			=> $defaults['fav_icon'],
				'active_callback'	=> 'catcheverest_is_site_icon_active'
			),

			//Web Clip Icon
			'remove_web_clip' => array(
				'id' 				=> 'remove_web_clip',
				'title' 			=> __( 'Check to Disable Web Clip Icon', 'catch-everest' ),
				'description'		=> '',
				'field_type' 		=> 'checkbox',
				'sanitize' 			=> 'catcheverest_sanitize_checkbox',
				'panel' 			=> 'theme_options',
				'section' 			=> 'web_clip_icon_options',
				'default' 			=> $defaults['remove_web_clip'],
				'active_callback'	=> 'catcheverest_is_site_icon_active'
			),
			'web_clip' => array(
				'id' 				=> 'web_clip',
				'title' 			=> __( 'Web Clip Icon', 'catch-everest' ),
				'description'		=> '',
				'field_type' 		=> 'image',
				'sanitize' 			=> 'catcheverest_sanitize_image',
				'panel' 			=> 'theme_options',
				'section' 			=> 'web_clip_icon_options',
				'default' 			=> $defaults['web_clip'],
				'active_callback'	=> 'catcheverest_is_site_icon_active'
			),
		);
		$settings_parameters = array_merge( $settings_parameters, $settings_site_icon);
	}

	foreach ( $settings_parameters as $option ) {
		if( 'image' == $option['field_type'] ) {
			$wp_customize->add_setting(
				// $id
				$theme_slug . 'options[' . $option['id'] . ']',
				// parameters array
				array(
					'type'				=> 'option',
					'sanitize_callback'	=> $option['sanitize'],
					'default'			=> $option['default']
				)
			);

			$params = array(
						'label'		=> $option['title'],
						'section'   => $theme_slug . $option['section'],
						'settings'  => $theme_slug . 'options[' . $option['id'] . ']',
					);

			if ( isset( $option['active_callback']  ) ){
				$params['active_callback'] = $option['active_callback'];
			}

			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,$theme_slug . 'options[' . $option['id'] . ']',
					$params
				)
			);
		}
		else if ('checkbox' == $option['field_type'] ) {
			$wp_customize->add_setting(
				// $id
				$theme_slug . 'options[' . $option['id'] . ']',
				// parameters array
				array(
					'type'				=> 'option',
					'sanitize_callback'	=> $option['sanitize'],
					'default'			=> $option['default'],				)
			);

			$params = array(
						'label'		=> $option['title'],
						'settings'  => $theme_slug . 'options[' . $option['id'] . ']',
						'name'  	=> $theme_slug . 'options[' . $option['id'] . ']',
					);

			if ( isset( $option['active_callback']  ) ){
				$params['active_callback'] = $option['active_callback'];
			}

			if ( 'header_image' == $option['section'] ){
				$params['section'] = $option['section'];
			}
			else {
				$params['section']	= $theme_slug . $option['section'];
			}

			$wp_customize->add_control(
				new CatchEverest_Customize_Checkbox(
					$wp_customize,$theme_slug . 'options[' . $option['id'] . ']',
					$params
				)
			);
		}
		else if ('category-multiple' == $option['field_type'] ) {
			$wp_customize->add_setting(
				// $id
				$theme_slug . 'options[' . $option['id'] . ']',
				// parameters array
				array(
					'type'				=> 'option',
					'sanitize_callback'	=> $option['sanitize'],
					'default'			=> $option['default']
				)
			);

			$params = array(
						'label'			=> $option['title'],
						'section'		=> $theme_slug . $option['section'],
						'settings'		=> $theme_slug . 'options[' . $option['id'] . ']',
						'description'	=> $option['description'],
						'name'	 		=> $theme_slug . 'options[' . $option['id'] . ']',
					);

			if ( isset( $option['active_callback']  ) ){
				$params['active_callback'] = $option['active_callback'];
			}

			$wp_customize->add_control(
				new CatchEverest_Customize_Dropdown_Categories_Control (
					$wp_customize,
					$theme_slug . 'options[' . $option['id'] . ']',
					$params
				)
			);
		}
		else {
			//Normal Loop
			$wp_customize->add_setting(
				// $id
				$theme_slug . 'options[' . $option['id'] . ']',
				// parameters array
				array(
					'default'			=> $option['default'],
					'type'				=> 'option',
					'sanitize_callback'	=> $option['sanitize']
				)
			);

			// Add setting control
			$params = array(
					'label'			=> $option['title'],
					'settings'		=> $theme_slug . 'options[' . $option['id'] . ']',
					'type'			=> $option['field_type'],
					'description'   => $option['description'],
				) ;

			if ( isset( $option['priority']  ) ){
				$params['priority'] = $option['priority'];
			}

			if ( isset( $option['choices']  ) ){
				$params['choices'] = $option['choices'];
			}

			if ( isset( $option['active_callback']  ) ){
				$params['active_callback'] = $option['active_callback'];
			}

			if ( isset( $option['input_attrs']  ) ){
				$params['input_attrs'] = $option['input_attrs'];
			}

			if ( 'header_image' == $option['section'] ){
				$params['section'] = $option['section'];
			}
			else {
				$params['section']	= $theme_slug . $option['section'];
			}

			$wp_customize->add_control(
				// $id
				$theme_slug . 'options[' . $option['id'] . ']',
				$params
			);
		}
	}

	//Add featured content elements with respect to no of featured content
	for ( $i = 1; $i <= $options[ 'homepage_featured_qty' ]; $i++ ) {
		$wp_customize->add_setting(
			// $id
			$theme_slug . 'options[homepage_featured_content_note][' . $i . ']',
			// parameters array
			array(
				'type'				=> 'option',
				'sanitize_callback'	=> 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			new CatchEverest_Note_Control(
				$wp_customize, $theme_slug . 'options[homepage_featured_content_note][' . $i . ']',
				array(
					'label'		=> sprintf( __( 'Featured Content #%s', 'catch-everest' ), $i ),
					'section'   => $theme_slug .'homepage_featured_content_options',
					'settings'  => $theme_slug . 'options[homepage_featured_content_note][' . $i . ']',
				)
			)
		);

		$wp_customize->add_setting(
			// $id
			$theme_slug . 'options[homepage_featured_image][' . $i . ']',
			// parameters array
			array(
				'type'				=> 'option',
				'sanitize_callback'	=> 'catcheverest_sanitize_image'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize, $theme_slug . 'options[homepage_featured_image][' . $i . ']',
				array(
					'label'		=> __( 'Image', 'catch-everest' ),
					'section'   => $theme_slug .'homepage_featured_content_options',
					'settings'  => $theme_slug . 'options[homepage_featured_image][' . $i . ']',
				)
			)
		);

		$wp_customize->add_setting(
			// $id
			$theme_slug . 'options[homepage_featured_url][' . $i . ']',
			// parameters array
			array(
				'type'				=> 'option',
				'sanitize_callback'	=> 'esc_url_raw'
			)
		);

		$wp_customize->add_control(
			$theme_slug . 'options[homepage_featured_url][' . $i . ']',
			array(
				'label'		=> __( 'Link URL', 'catch-everest' ),
				'section'	=> $theme_slug .'homepage_featured_content_options',
				'settings'	=> $theme_slug . 'options[homepage_featured_url][' . $i . ']',
				'type'		=> 'url'
			)
		);

		$wp_customize->add_setting(
			// $id
			$theme_slug . 'options[homepage_featured_base][' . $i . ']',
			// parameters array
			array(
				'type'				=> 'option',
				'sanitize_callback'	=> 'catcheverest_sanitize_checkbox'
			)
		);

		$wp_customize->add_control(
			$theme_slug . 'options[homepage_featured_base][' . $i . ']',
			array(
				'label'		=> __( 'Target. Open Link in New Window?', 'catch-everest' ),
				'section'	=> $theme_slug .'homepage_featured_content_options',
				'settings'	=> $theme_slug . 'options[homepage_featured_base][' . $i . ']',
				'type'		=> 'text'
			)
		);

		$wp_customize->add_setting(
			// $id
			$theme_slug . 'options[homepage_featured_title][' . $i . ']',
			// parameters array
			array(
				'type'				=> 'option',
				'sanitize_callback'	=> 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			$theme_slug . 'options[homepage_featured_title][' . $i . ']',
			array(
				'label'			=> __( 'Title', 'catch-everest' ),
				'section'		=> $theme_slug .'homepage_featured_content_options',
				'settings'		=> $theme_slug . 'options[homepage_featured_title][' . $i . ']',
				'description'	=> __( 'Leave empty if you want to remove title', 'catch-everest' ),
				'type'			=> 'text'
			)
		);

		$wp_customize->add_setting(
			// $id
			$theme_slug . 'options[homepage_featured_content][' . $i . ']',
			// parameters array
			array(
				'type'				=> 'option',
				'sanitize_callback'	=> 'wp_kses_post'
			)
		);

		$wp_customize->add_control(
			$theme_slug . 'options[homepage_featured_content][' . $i . ']',
			array(
				'label'			=> __( 'Content', 'catch-everest' ),
				'section'		=> $theme_slug .'homepage_featured_content_options',
				'settings'		=> $theme_slug . 'options[homepage_featured_content][' . $i . ']',
				'description'	=> __( 'Appropriate Words: 10', 'catch-everest' ),
				'type'			=> 'textarea'
			)
		);
	}

	//Add featured post elements with respect to no of featured sliders
	for ( $i = 1; $i <= $options[ 'slider_qty' ]; $i++ ) {
		$wp_customize->add_setting(
			// $id
			$theme_slug . 'options[featured_slider][' . $i . ']',
			// parameters array
			array(
				'type'				=> 'option',
				'sanitize_callback'	=> 'catcheverest_sanitize_post_id'
			)
		);

		$wp_customize->add_control(
			$theme_slug . 'options[featured_slider][' . $i . ']',
			array(
				'label'		=> sprintf( __( 'Featured Post Slider #%s', 'catch-everest' ), $i ),
				'section'   => $theme_slug .'slider_options',
				'settings'  => $theme_slug . 'options[featured_slider][' . $i . ']',
				'type'		=> 'text',
					'input_attrs' => array(
	        		'style' => 'width: 100px;'
	    		),
			)
		);
	}


	// Reset all settings to default
	$wp_customize->add_section( 'catcheverest_reset_all_settings', array(
		'description'	=> __( 'Caution: Reset all settings to default. Refresh the page after save to view full effects.', 'catch-everest' ),
		'priority' 		=> 700,
		'title'    		=> __( 'Reset all settings', 'catch-everest' ),
	) );

	$wp_customize->add_setting( 'catcheverest_options[reset_all_settings]', array(
		'capability'		=> 'edit_theme_options',
		'sanitize_callback' => 'catcheverest_reset_all_settings',
		'transport'			=> 'postMessage',
	) );

	$wp_customize->add_control( 'catcheverest_options[reset_all_settings]', array(
		'label'    => __( 'Check to reset all settings to default', 'catch-everest' ),
		'section'  => 'catcheverest_reset_all_settings',
		'settings' => 'catcheverest_options[reset_all_settings]',
		'type'     => 'checkbox'
	) );
	// Reset all settings to default end

	//Important Links
	$wp_customize->add_section( 'important_links', array(
		'priority' 		=> 999,
		'title'   	 	=> __( 'Important Links', 'catch-everest' ),
	) );

	/**
	 * Has dummy Sanitizaition function as it contains no value to be sanitized
	 */
	$wp_customize->add_setting( 'important_links', array(
		'sanitize_callback'	=> 'catcheverest_sanitize_important_link',
	) );

	$wp_customize->add_control( new CatchEverest_Important_Links( $wp_customize, 'important_links', array(
        'label'   	=> __( 'Important Links', 'catch-everest' ),
        'section'  	=> 'important_links',
        'settings' 	=> 'important_links',
        'type'     	=> 'important_links',
    ) ) );
    //Important Links End
}
add_action( 'customize_register', 'catcheverest_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously for catcheverest.
 * And flushes out all transient data on preview
 *
 * @since Catch Everest 1.6.3
 */
function catcheverest_customize_preview() {
	//Remove transients on preview
	catcheverest_themeoption_invalidate_caches();

	global $catcheverest_options_defaults ,$catcheverest_options_settings;

	$catcheverest_options_settings = catcheverest_options_set_defaults( $catcheverest_options_defaults );
}
add_action( 'customize_preview_init', 'catcheverest_customize_preview' );
add_action( 'customize_save', 'catcheverest_customize_preview' );


/**
 * Custom scripts and styles on Customizer for Catch Everest
 *
 * @since Catch Everest 1.4
 */
function catcheverest_customize_scripts() {
	wp_register_script( 'catcheverest_customizer_custom', get_template_directory_uri() . '/inc/panel/js/customizer-custom-scripts.js', array( 'jquery' ), '20140108', true );

    $catcheverest_misc_links = array(
							'upgrade_link' 				=> esc_url( 'http://catchthemes.com/themes/catch-everest-pro/' ),
							'upgrade_text'	 			=> __( 'Upgrade To Pro &raquo;', 'catch-everest' ),
		);

    //Add More Theme Options Button
    wp_localize_script( 'catcheverest_customizer_custom', 'catcheverest_misc_links', $catcheverest_misc_links );

    wp_enqueue_script( 'catcheverest_customizer_custom' );

    wp_enqueue_style( 'catcheverest_customizer_custom', get_template_directory_uri() . '/inc/panel/catcheverest-customizer.css');
}
add_action( 'customize_controls_enqueue_scripts', 'catcheverest_customize_scripts' );


//Active callbacks for customizer
require get_template_directory() . '/inc/panel/customizer/customizer-active-callbacks.php';

//Sanitize functions for customizer
require get_template_directory() . '/inc/panel/customizer/customizer-sanitize-functions.php';
