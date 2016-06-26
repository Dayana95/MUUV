<?php
/**
 * Catch Everest Theme Options
 *
 * @package Catch Themes
 * @subpackage Catch_Everest
 * @since Catch Everest 1.0
 */
add_action( 'admin_init', 'catcheverest_register_settings' );
add_action( 'admin_menu', 'catcheverest_options_menu' );


/**
 * Enqueue admin script and styles
 *
 * @uses wp_register_script, wp_enqueue_script, wp_enqueue_media and wp_enqueue_style
 * @Calling jquery, jquery-ui-tabs,jquery-cookie, jquery-ui-sortable, jquery-ui-draggable
 */
function catcheverest_admin_scripts() {
    //jQuery Cookie
    wp_register_script( 'jquery-cookie', get_template_directory_uri() . '/inc/panel/js/jquery.cookie.min.js', array( 'jquery' ), '1.0', true );

    wp_enqueue_script( 'catcheverest_admin', get_template_directory_uri().'/inc/panel/js/admin.min.js', array( 'jquery', 'jquery-ui-tabs', 'jquery-cookie', 'jquery-ui-sortable', 'jquery-ui-draggable' ) );

    wp_enqueue_media();

    wp_enqueue_script( 'catcheverest_upload', get_template_directory_uri().'/inc/panel/js/add_image_scripts.js', array( 'jquery' ) );

    wp_enqueue_style( 'catcheverest_admin_style',get_template_directory_uri().'/inc/panel/admin.min.css', '', '1.0', 'screen' );
}
add_action('admin_print_styles-appearance_page_theme_options', 'catcheverest_admin_scripts');


/*
 * Create a function for Theme Options Page
 *
 * @uses add_menu_page
 * @add action admin_menu
 */
function catcheverest_options_menu() {

    add_theme_page(
        __( 'Theme Options', 'catch-everest' ),           // Name of page
        __( 'Theme Options', 'catch-everest' ),           // Label in menu
        'edit_theme_options',                           // Capability required
        'theme_options',                                // Menu slug, used to uniquely identify the page
        'catcheverest_theme_options_do_page'             // Function that renders the options page
    );

}


/*
 * Register options and validation callbacks
 *
 * @uses register_setting
 * @action admin_init
 */
function catcheverest_register_settings(){
    register_setting( 'catcheverest_options', 'catcheverest_options', 'catcheverest_theme_options_validate' );
}


/*
 * Render Catch Everest Theme Options page
 *
 * @uses settings_fields, get_option, bloginfo
 * @Settings Updated
 */
function catcheverest_theme_options_do_page() {
    if (!isset($_REQUEST['settings-updated']))
        $_REQUEST['settings-updated'] = false;
    ?>

    <div id="catchthemes" class="wrap">

        <form method="post" action="options.php">
            <?php
                settings_fields( 'catcheverest_options' );
                global $catcheverest_options_settings;
                $options = $catcheverest_options_settings;
            ?>
            <?php if (false !== $_REQUEST['settings-updated']) : ?>
                <div class="updated fade"><p><strong><?php _e('Options Saved', 'catch-everest'); ?></strong></p></div>
            <?php endif; ?>

            <div id="theme-option-header">
                <div id="theme-option-title">
                    <h2 class="title"><?php _e( 'Theme Options By', 'catch-everest' ); ?></h2>
                    <h2 class="logo">
                        <a href="<?php echo esc_url( __( 'http://catchthemes.com/', 'catch-everest' ) ); ?>" title="<?php esc_attr_e( 'Catch Themes', 'catch-everest' ); ?>" target="_blank">
                            <img src="<?php echo get_template_directory_uri().'/inc/panel/images/catch-themes.png'; ?>" alt="<?php _e( 'Catch Themes', 'catch-everest' ); ?>" />
                        </a>
                    </h2>
                </div><!-- #theme-option-title -->

                <div id="upgradepro">
                    <a class="button" href="<?php echo esc_url(__('http://catchthemes.com/themes/catch-everest-pro/','catch-everest')); ?>" title="<?php esc_attr_e('Upgrade to Catch Everest Pro', 'catch-everest'); ?>" target="_blank"><?php printf(__('Upgrade to Catch Everest Pro','catch-everest')); ?></a>
                </div><!-- #upgradepro -->

                <div id="theme-support">
                    <ul>
                        <li><a class="button donate" href="<?php echo esc_url(__('http://catchthemes.com/donate/','catch-everest')); ?>" title="<?php esc_attr_e('Donate to Catch Everest', 'catch-everest'); ?>" target="_blank"><?php printf(__('Donate Now','catch-everest')); ?></a></li>
                        <li><a class="button" href="<?php echo esc_url(__('http://catchthemes.com/support/','catch-everest')); ?>" title="<?php esc_attr_e('Support', 'catch-everest'); ?>" target="_blank"><?php printf(__('Support','catch-everest')); ?></a></li>
                        <li><a class="button" href="<?php echo esc_url(__('http://catchthemes.com/theme-instructions/catch-everest/','catch-everest')); ?>" title="<?php esc_attr_e('Theme Instruction', 'catch-everest'); ?>" target="_blank"><?php printf(__('Theme Instruction','catch-everest')); ?></a></li>
                        <li><a class="button" href="<?php echo esc_url(__('https://www.facebook.com/catchthemes/','catch-everest')); ?>" title="<?php esc_attr_e('Like Catch Themes on Facebook', 'catch-everest'); ?>" target="_blank"><?php printf(__('Facebook','catch-everest')); ?></a></li>
                        <li><a class="button" href="<?php echo esc_url(__('https://twitter.com/catchthemes/','catch-everest')); ?>" title="<?php esc_attr_e('Follow Catch Themes on Twitter', 'catch-everest'); ?>" target="_blank"><?php printf(__('Twitter','catch-everest')); ?></a></li>
                        <li><a class="button" href="<?php echo esc_url(__('http://wordpress.org/support/view/theme-reviews/catch-everest','catch-everest')); ?>" title="<?php esc_attr_e('Rate us 5 Star on WordPress', 'catch-everest'); ?>" target="_blank"><?php printf(__('5 Star Rating','catch-everest')); ?></a></li>
                    </ul>
                </div><!-- #theme-support -->

                <div id="theme-option-header-notice">
                    <p class="notice">
                        <?php printf( _x( 'Theme Options Panel will be retired on future versions. Please use %1$s Customizer %2$s instead.','1: Customizer Link Start, 2: Customizer Link End' , 'catch-everest' ) , '<a href="' . esc_url ( admin_url( 'customize.php' ) ) . '">', '</a>' ); ?>
                    </p>
                </div><!-- #theme-option-header -->

            </div><!-- #theme-option-header -->


            <div id="catcheverest_ad_tabs">
                <ul class="tabNavigation" id="mainNav">
                    <li><a href="#themeoptions"><?php _e( 'Theme Options', 'catch-everest' );?></a></li>
                    <li><a href="#homepagesettings"><?php _e( 'Homepage Settings', 'catch-everest' );?></a></li>
                    <li><a href="#slidersettings"><?php _e( 'Featured Post Slider', 'catch-everest' );?></a></li>
                    <li><a href="#sociallinks"><?php _e( 'Social Links', 'catch-everest' );?></a></li>
                    <li><a href="#webmaster"><?php _e( 'Webmaster Tools', 'catch-everest' );?></a></li>
                </ul><!-- .tabsNavigation #mainNav -->


                <!-- Option for Design Settings -->
                <div id="themeoptions">

                    <div class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Responsive Design', 'catch-everest' ); ?></a></h3>
                        <div class="option-content inside">
                            <table class="form-table">
                                <tbody>
                                    <tr>
                                        <th scope="row"><?php _e( 'Disable Responsive Design?', 'catch-everest' ); ?></th>
                                        <input type='hidden' value='0' name='catcheverest_options[disable_responsive]'>
                                        <td><input type="checkbox" id="headerlogo" name="catcheverest_options[disable_responsive]" value="1" <?php checked( '1', $options['disable_responsive'] ); ?> /> <?php _e('Check to disable', 'catch-everest'); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save', 'catch-everest' ); ?>" /></p>
                        </div><!-- .option-content -->
                    </div><!-- .option-container -->

                    <div class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Upload Logo', 'catch-everest' ); ?></a></h3>
                        <div class="option-content inside">
                            <p><?php printf(__('Custom Logo. Need to Add or Remove Logo?','catch-everest')); ?> <?php printf(__('<a class="button" href="%s">Click here</a>', 'catch-everest'), admin_url('customize.php?autofocus[control]=custom_logo')); ?></p>
                        </div><!-- .option-content -->
                    </div><!-- .option-container -->

                    <div class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Header Image', 'catch-everest' ); ?></a></h3>
                        <div class="option-content inside">
                            <p><?php printf(__('Custom Header. Need to Add or Remove Header Image?','catch-everest')); ?> <?php printf(__('<a class="button" href="%s">Click here</a>', 'catch-everest'), admin_url('customize.php?autofocus[control]=header_image')); ?></p>
                        </div><!-- .option-content -->
                    </div><!-- .option-container -->

                    <?php
                    //@remove Remove if block when WordPress 4.8 is released
                    if( !function_exists( 'has_site_icon' ) ) {
                    ?>
                        <div class="option-container">
                            <h3 class="option-toggle"><a href="#"><?php _e( 'Favicon', 'catch-everest' ); ?></a></h3>
                            <div class="option-content inside">
                                <table class="form-table">
                                    <tbody>
                                        <tr>
                                            <th scope="row"><?php _e( 'Disable Favicon?', 'catch-everest' ); ?></th>
                                             <input type='hidden' value='0' name='catcheverest_options[remove_favicon]'>
                                            <td><input type="checkbox" id="favicon" name="catcheverest_options[remove_favicon]" value="1" <?php checked( '1', $options['remove_favicon'] ); ?> /> <?php _e('Check to disable', 'catch-everest'); ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?php _e( 'Fav Icon URL:', 'catch-everest' ); ?></th>
                                            <td><?php if ( !empty ( $options[ 'fav_icon' ] ) ) { ?>
                                                    <input class="upload-url" size="65" type="text" name="catcheverest_options[fav_icon]" value="<?php echo esc_url( $options [ 'fav_icon' ] ); ?>" />
                                                <?php } else { ?>
                                                    <input class="upload-url" size="65" type="text" name="catcheverest_options[fav_icon]" value="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" alt="fav" />
                                                <?php }  ?>
                                                <input ref="<?php esc_attr_e( 'Insert as Fav Icon','catch-everest' );?>" class="catcheverest_upload_image button" name="wsl-image-add" type="button" value="<?php esc_attr_e( 'Change Fav Icon','catch-everest' );?>" />
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row"><?php _e( 'Preview: ', 'catch-everest' ); ?></th>
                                            <td>
                                                <?php
                                                    if ( !empty( $options[ 'fav_icon' ] ) ) {
                                                        echo '<img src="'.esc_url( $options[ 'fav_icon' ] ).'" alt="fav" />';
                                                    } else {
                                                        echo '<img src="'. get_template_directory_uri().'/images/favicon.ico" alt="fav" />';
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save', 'catch-everest' ); ?>" /></p>
                            </div><!-- .option-content -->
                        </div><!-- .option-container -->

                        <div class="option-container">
                            <h3 class="option-toggle"><a href="#"><?php _e( 'Web Clip Icon Options', 'catch-everest' ); ?></a></h3>
                            <div class="option-content inside">
                                <table class="form-table">
                                    <tbody>
                                        <tr>
                                            <th scope="row"><?php _e( 'Disable Web Clip Icon?', 'catch-everest' ); ?></th>
                                             <input type='hidden' value='0' name='catcheverest_options[remove_web_clip]'>
                                            <td><input type="checkbox" id="favicon" name="catcheverest_options[remove_web_clip]" value="1" <?php checked( '1', $options['remove_web_clip'] ); ?> /> <?php _e('Check to disable', 'catch-everest'); ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?php _e( 'Web Clip Icon URL:', 'catch-everest' ); ?></th>
                                            <td><?php if ( !empty ( $options[ 'web_clip' ] ) ) { ?>
                                                    <input class="upload-url" size="65" type="text" name="catcheverest_options[web_clip]" value="<?php echo esc_url( $options [ 'web_clip' ] ); ?>" class="upload" />
                                                <?php } else { ?>
                                                    <input size="65" type="text" name="catcheverest_options[web_clip]" value="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png" alt="fav" />
                                                <?php }  ?>
                                                <input ref="<?php esc_attr_e( 'Insert as Web Clip Icon','catch-everest' );?>" class="catcheverest_upload_image button" name="wsl-image-add" type="button" value="<?php esc_attr_e( 'Change Web Clip Icon','catch-everest' );?>" />
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row"><?php _e( 'Preview: ', 'catch-everest' ); ?></th>
                                            <td>
                                                <?php
                                                    if ( !empty( $options[ 'web_clip' ] ) ) {
                                                        echo '<img src="'.esc_url( $options[ 'web_clip' ] ).'" alt="fav" />';
                                                    } else {
                                                        echo '<img src="'. get_template_directory_uri().'/images/favicon.ico" alt="fav" />';
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p><?php esc_attr_e( 'Note: Web Clip Icon for Apple devices. Recommended Size - Width 144px and Height 144px height, which will support High Resolution Devices like iPad Retina.', 'catch-everest' ); ?></p>
                                <p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save', 'catch-everest' ); ?>" /></p>
                            </div><!-- .option-content -->
                        </div><!-- .option-container -->
                    <?php
                    }
                    ?>

                    <div class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Header Right Section', 'catch-everest' ); ?></a></h3>
                        <div class="option-content inside">
                            <table class="form-table">
                                <tbody>
                                    <tr>
                                        <th scope="row"><?php _e( 'Disable Header Right Section?', 'catch-everest' ); ?></th>
                                        <input type='hidden' value='0' name='catcheverest_options[disable_header_right_sidebar]'>
                                        <td><input type="checkbox" id="favicon" name="catcheverest_options[disable_header_right_sidebar]" value="1" <?php checked( '1', $options['disable_header_right_sidebar'] ); ?> /> <?php _e( 'Check to disable', 'catch-everest'); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save', 'catch-everest' ); ?>" /></p>
                        </div><!-- .option-content -->
                    </div><!-- .option-container -->

                    <div class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Background', 'catch-everest' ); ?></a></h3>
                        <div class="option-content inside">
                            <p><?php printf(__('Custom Background. Need to replace or remove background?','catch-everest')); ?> <?php printf(__('<a class="button" href="%s">Click here</a>', 'catch-everest'), admin_url('themes.php?page=custom-background')); ?></p>
                        </div><!-- .option-content -->
                    </div><!-- .option-container -->

                    <div class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Search Text Settings', 'catch-everest' ); ?></a></h3>
                        <div class="option-content inside">
                            <table class="form-table">
                                <tbody>
                                    <tr>
                                        <th scope="row"><label><?php _e( 'Default Display Text in Search', 'catch-everest' ); ?></label></th>
                                        <td><input type="text" size="45" name="catcheverest_options[search_display_text]" value="<?php echo esc_attr( $options[ 'search_display_text'] ); ?>" />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save', 'catch-everest' ); ?>" /></p>
                        </div><!-- .option-content -->
                    </div><!-- .option-container -->

                    <div class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Excerpt / More Tag Settings', 'catch-everest' ); ?></a></h3>
                        <div class="option-content inside">
                            <table class="form-table">
                                <tbody>
                                    <tr>
                                        <th scope="row"><label><?php _e( 'More Tag Text', 'catch-everest' ); ?></label></th>
                                        <td><input type="text" size="45" name="catcheverest_options[more_tag_text]" value="<?php echo esc_attr( $options[ 'more_tag_text' ] ); ?>" />
                                        </td>
                                    </tr>
                                     <tr>
                                        <th scope="row"><?php _e( 'Excerpt length(words)', 'catch-everest' ); ?></th>
                                        <td><input type="text" size="3" name="catcheverest_options[excerpt_length]" value="<?php echo intval( $options[ 'excerpt_length' ] ); ?>" /></td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save', 'catch-everest' ); ?>" /></p>
                        </div><!-- .option-content -->
                    </div><!-- .option-container -->

                    <div class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Feed Redirect', 'catch-everest' ); ?></a></h3>
                        <div class="option-content inside">
                            <table class="form-table">
                                <tbody>
                                    <tr>
                                        <th scope="row"><label><?php _e( 'Feed Redirect URL', 'catch-everest' ); ?></label></th>
                                        <td><input type="text" size="70" name="catcheverest_options[feed_url]" value="<?php echo esc_attr( $options[ 'feed_url' ] ); ?>" /> <?php _e( 'Add in the Feedburner URL', 'catch-everest' ); ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save', 'catch-everest' ); ?>" /></p>
                        </div><!-- .option-content -->
                    </div><!-- .option-container -->

                    <div class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Layout Options', 'catch-everest' ); ?></a></h3>
                        <div class="option-content inside">
                            <table class="form-table content-layout">
                                <tbody>
                                    <tr>
                                        <th scope="row"><label><?php _e( 'Sidebar Layout Options', 'catch-everest' ); ?></label></th>
                                        <td>
                                            <label title="right-sidebar" class="box"><img src="<?php echo get_template_directory_uri(); ?>/inc/panel/images/right-sidebar.png" alt="Content-Sidebar" /><br />
                                            <input type="radio" name="catcheverest_options[sidebar_layout]" id="right-sidebar" <?php checked($options['sidebar_layout'], 'right-sidebar') ?> value="right-sidebar"  />
                                            <?php _e( 'Right Sidebar', 'catch-everest' ); ?>
                                            </label>

                                            <label title="left-Sidebar" class="box"><img src="<?php echo get_template_directory_uri(); ?>/inc/panel/images/left-sidebar.png" alt="Content-Sidebar" /><br />
                                            <input type="radio" name="catcheverest_options[sidebar_layout]" id="left-sidebar" <?php checked($options['sidebar_layout'], 'left-sidebar') ?> value="left-sidebar"  />
                                            <?php _e( 'Left Sidebar', 'catch-everest' ); ?>
                                            </label>

                                            <label title="no-sidebar" class="box"><img src="<?php echo get_template_directory_uri(); ?>/inc/panel/images/no-sidebar.png" alt="Content-Sidebar" /><br />
                                            <input type="radio" name="catcheverest_options[sidebar_layout]" id="no-sidebar" <?php checked($options['sidebar_layout'], 'no-sidebar') ?> value="no-sidebar"  />
                                            <?php _e( 'No Sidebar', 'catch-everest' ); ?>
                                            </label>

                                            <label title="no-sidebar-full-width" class="box"><img src="<?php echo get_template_directory_uri(); ?>/inc/panel/images/no-sidebar-fullwidth.png" alt="No Sidebar, Full Width" /><br />
                                            <input type="radio" name="catcheverest_options[sidebar_layout]" id="no-sidebar-full-width" <?php checked($options['sidebar_layout'], 'no-sidebar-full-width'); ?> value="no-sidebar-full-width"  />
                                            <?php _e( 'No Sidebar, Full Width', 'catch-everest' ); ?>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><label><?php _e( 'Content Layout', 'catch-everest' ); ?></label></th>
                                        <td>
                                            <label title="content-full" class="box"><input type="radio" name="catcheverest_options[content_layout]" id="content-full" <?php checked($options['content_layout'], 'full') ?> value="full"  />
                                            <?php _e( 'Full Content Display', 'catch-everest' ); ?>
                                            </label>

                                            <label title="content-excerpt" class="box"><input type="radio" name="catcheverest_options[content_layout]" id="content-excerpt" <?php checked($options['content_layout'], 'excerpt') ?> value="excerpt"  />
                                            <?php _e( 'Excerpt/Blog Display', 'catch-everest' ); ?>
                                            </label>
                                        </td>
                                    </tr>
                                    <?php if( $options[ 'reset_layout' ] == "1" ) { $options[ 'reset_layout' ] = "0"; } ?>
                                    <tr>
                                        <th scope="row"><?php _e( 'Reset Layout?', 'catch-everest' ); ?></th>
                                        <input type='hidden' value='0' name='catcheverest_options[reset_layout]'>
                                        <td>
                                            <input type="checkbox" id="headerlogo" name="catcheverest_options[reset_layout]" value="1" <?php checked( '1', $options['reset_layout'] ); ?> /> <?php _e('Check to reset', 'catch-everest'); ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save', 'catch-everest' ); ?>" /></p>
                        </div><!-- .option-content -->
                    </div><!-- .option-container -->

                    <div class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Custom CSS', 'catch-everest' ); ?></a></h3>
                        <div class="option-content inside">
                            <table class="form-table">
                                <tbody>
                                    <tr>
                                        <th scope="row"><?php _e( 'Enter your custom CSS styles.', 'catch-everest' ); ?></th>
                                        <td>
                                            <textarea name="catcheverest_options[custom_css]" id="custom-css" cols="90" rows="12"><?php echo esc_attr( $options[ 'custom_css' ] ); ?></textarea>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row"><?php _e( 'CSS Tutorial from W3Schools.', 'catch-everest' ); ?></th>
                                        <td>
                                            <a class="button" href="<?php echo esc_url( __( 'http://www.w3schools.com/css/default.asp','catch-everest' ) ); ?>" title="<?php esc_attr_e( 'CSS Tutorial', 'catch-everest' ); ?>" target="_blank"><?php _e( 'Click Here to Read', 'catch-everest' );?></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save', 'catch-everest' ); ?>" /></p>
                        </div><!-- .option-content -->
                    </div><!-- .option-container -->

                    <div class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Scroll Up', 'catch-everest' ); ?></a></h3>
                        <div class="option-content inside">
                            <table class="form-table">
                                <tbody>
                                    <tr>
                                        <th scope="row"><?php _e( 'Disable Scroll Up?', 'catch-everest' ); ?></th>
                                        <input type='hidden' value='0' name='catcheverest_options[disable_scrollup]'>
                                        <td><input type="checkbox" id="headerlogo" name="catcheverest_options[disable_scrollup]" value="1" <?php checked( '1', $options['disable_scrollup'] ); ?> /> <?php _e('Check to disable', 'catch-everest'); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'catch-everest' ); ?>" /></p>
                        </div><!-- .option-content -->
                    </div><!-- .option-container -->

                </div><!-- #themeoptions -->

                <!-- Options for Homepage Settings -->
                <div id="homepagesettings">

                    <div class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Homepage Headline Options', 'catch-everest' ); ?></a></h3>
                        <div class="option-content inside">
                            <table class="form-table">
                                <tbody>
                                    <tr>
                                        <th scope="row"><?php _e( 'Homepage Headline', 'catch-everest' ); ?>
                                            <p><small><?php _e( 'The appropriate length for Headine is around 10 words.', 'catch-everest' ); ?></small></p>
                                        </th>
                                        <td>
                                            <textarea class="textarea input-bg" name="catcheverest_options[homepage_headline]" cols="65" rows="3"><?php echo esc_textarea( $options[ 'homepage_headline' ] ); ?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?php _e( 'Homepage Subheadline Headline', 'catch-everest' ); ?>
                                            <p><small><?php _e( 'The appropriate length for Headine is around 10 words.', 'catch-everest' ); ?></small></p>
                                        </th>
                                        <td>
                                            <textarea class="textarea input-bg" name="catcheverest_options[homepage_subheadline]" cols="65" rows="3"><?php echo esc_textarea( $options[ 'homepage_subheadline' ] ); ?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?php _e( 'Disable Homepage Headline?', 'catch-everest' ); ?></th>
                                        <input type='hidden' value='0' name='catcheverest_options[disable_homepage_headline]'>
                                        <td><input type="checkbox" id="favicon" name="catcheverest_options[disable_homepage_headline]" value="1" <?php checked( '1', $options['disable_homepage_headline'] ); ?> /> <?php _e( 'Check to disable', 'catch-everest'); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?php _e( 'Disable Homepage Subheadline?', 'catch-everest' ); ?></th>
                                        <input type='hidden' value='0' name='catcheverest_options[disable_homepage_subheadline]'>
                                        <td><input type="checkbox" id="favicon" name="catcheverest_options[disable_homepage_subheadline]" value="1" <?php checked( '1', $options['disable_homepage_subheadline'] ); ?> /> <?php _e( 'Check to disable', 'catch-everest'); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save', 'catch-everest' ); ?>" /></p>
                        </div><!-- .option-content -->
                    </div><!-- .option-container -->

                    <div class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Homepage Featured Content Options', 'catch-everest' ); ?></a></h3>
                        <div class="option-content inside">
                            <table class="form-table">
                                <tbody>
                                    <tr>
                                        <th scope="row"><?php _e( 'Disable Homepage Featured Content?', 'catch-everest' ); ?></th>
                                        <input type='hidden' value='0' name='catcheverest_options[disable_homepage_featured]'>
                                        <td><input type="checkbox" id="favicon" name="catcheverest_options[disable_homepage_featured]" value="1" <?php checked( '1', $options['disable_homepage_featured'] ); ?> /> <?php _e( 'Check to disable', 'catch-everest'); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <?php _e( 'Headline', 'catch-everest' ); ?>
                                        </th>
                                        <td>
                                            <input type="text" size="65" name="catcheverest_options[homepage_featured_headline]" value="<?php echo esc_attr( $options[ 'homepage_featured_headline' ] ); ?>" /> <?php _e( 'Leave empty if you want to remove headline', 'catch-everest' ); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?php _e( 'Number of Featured Content', 'catch-everest' ); ?></th>
                                        <td>
                                            <input type="text" size="2" name="catcheverest_options[homepage_featured_qty]" value="<?php echo intval( $options[ 'homepage_featured_qty' ] ); ?>" size="2" />
                                        </td>
                                    </tr>
                                    <?php for ( $i = 1; $i <= $options[ 'homepage_featured_qty' ]; $i++ ): ?>
                                    <tr>
                                        <th scope="row">
                                            <strong><?php printf( esc_attr__( 'Featured Content #%s', 'catch-everest' ), $i ); ?></strong>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <?php _e( 'Image', 'catch-everest' ); ?>
                                        </th>
                                        <td>
                                            <input class="upload-url" size="65" type="text" name="catcheverest_options[homepage_featured_image][<?php echo $i; ?>]" value="<?php if( array_key_exists( 'homepage_featured_image', $options ) && array_key_exists( $i, $options[ 'homepage_featured_image' ] ) ) echo esc_url( $options[ 'homepage_featured_image' ][ $i ] ); ?>" />
                                            <input ref="<?php printf( esc_attr__( 'Insert as Featured Content #%s', 'catch-everest' ), $i ); ?>" class="catcheverest_upload_image button" name="wsl-image-add" type="button" value="<?php if( array_key_exists( 'homepage_featured_image', $options ) && array_key_exists( $i, $options[ 'homepage_featured_image' ] ) ) { esc_attr_e( 'Change Image','catch-everest' ); } else { esc_attr_e( 'Add Image','catch-everest' ); } ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><label><?php _e( 'Link URL', 'catch-everest' ); ?></label></th>
                                        <td><input type="text" size="65" name="catcheverest_options[homepage_featured_url][<?php echo absint( $i ); ?>]" value="<?php if( array_key_exists( 'homepage_featured_url', $options ) && array_key_exists( $i, $options[ 'homepage_featured_url' ] ) ) echo esc_url( $options[ 'homepage_featured_url' ][ $i ] ); ?>" /> <?php _e( 'Add in the Target URL for the content', 'catch-everest' ); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><label><?php _e( 'Target. Open Link in New Window?', 'catch-everest' ); ?></label></th>
                                        <input type='hidden' value='0' name='catcheverest_options[homepage_featured_base][<?php echo absint( $i ); ?>]'>
                                        <td><input type="checkbox" name="catcheverest_options[homepage_featured_base][<?php echo absint( $i ); ?>]" value="1" <?php if( array_key_exists( 'homepage_featured_base', $options ) && array_key_exists( $i, $options[ 'homepage_featured_base' ] ) ) checked( '1', $options[ 'homepage_featured_base' ][ $i ] ); ?> /> <?php _e( 'Check to open in new window', 'catch-everest' ); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <?php _e( 'Title', 'catch-everest' ); ?>
                                        </th>
                                        <td>
                                            <input type="text" size="65" name="catcheverest_options[homepage_featured_title][<?php echo absint( $i ); ?>]" value="<?php if( array_key_exists( 'homepage_featured_title', $options ) && array_key_exists( $i, $options[ 'homepage_featured_title' ] ) ) echo esc_attr( $options[ 'homepage_featured_title' ][ $i ] ); ?>" /> <?php _e( 'Leave empty if you want to remove title', 'catch-everest' ); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?php _e( 'Content', 'catch-everest' ); ?>
                                            <p><small><?php _e( 'The appropriate length for Content is around 10 words.', 'catch-everest' ); ?></small></p>
                                        </th>
                                        <td>
                                            <textarea class="textarea input-bg" name="catcheverest_options[homepage_featured_content][<?php echo absint( $i ); ?>]" cols="80" rows="3"><?php if( array_key_exists( 'homepage_featured_content', $options ) && array_key_exists( $i, $options[ 'homepage_featured_content' ] ) ) echo esc_html( $options[ 'homepage_featured_content' ][ $i ] ); ?></textarea>
                                        </td>
                                    </tr>
                                    <?php endfor; ?>
                                </tbody>
                            </table>
                            <p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save', 'catch-everest' ); ?>" /></p>
                        </div><!-- .option-content -->
                    </div><!-- .option-container -->

                    <div class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Homepage / Frontpage Settings', 'catch-everest' ); ?></a></h3>
                        <div class="option-content inside">
                            <table class="form-table">
                                <tbody>
                                    <tr>
                                        <th scope="row"><?php _e( 'Enable Latest Posts?', 'catch-everest' ); ?></th>
                                        <input type='hidden' value='0' name='catcheverest_options[enable_posts_home]'>
                                        <td><input type="checkbox" id="headerlogo" name="catcheverest_options[enable_posts_home]" value="1" <?php checked( '1', $options['enable_posts_home'] ); ?> /> <?php _e( 'Check to Enable', 'catch-everest'); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?php _e( 'Add Page instead of Latest Posts', 'catch-everest' ); ?></th>
                                        <td><a class="button" href="<?php echo esc_url( admin_url( 'options-reading.php' ) ) ; ?>" title="<?php esc_attr_e( 'Widgets', 'catch-everest' ); ?>" target="_blank"><?php _e( 'Click Here to Set Static Front Page Instead of Latest Posts', 'catch-everest' );?></a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <?php _e( 'Homepage posts categories:', 'catch-everest' ); ?>
                                            <p>
                                                <small><?php _e( 'Only posts that belong to the categories selected here will be displayed on the front page.', 'catch-everest' ); ?></small>
                                            </p>
                                        </th>
                                        <td>
                                            <select name="catcheverest_options[front_page_category][]" id="frontpage_posts_cats" multiple="multiple" class="select-multiple">
                                                <option value="0" <?php if ( empty( $options['front_page_category'] ) ) { echo 'selected="selected"'; } ?>><?php _e( '--Disabled--', 'catch-everest' ); ?></option>
                                                <?php /* Get the list of categories */
                                                    $categories = get_categories();
                                                    if( empty( $options[ 'front_page_category' ] ) ) {
                                                        $options[ 'front_page_category' ] = array();
                                                    }
                                                    foreach ( $categories as $category) :
                                                ?>
                                                <option value="<?php echo $category->cat_ID; ?>" <?php if ( in_array( $category->cat_ID, $options['front_page_category'] ) ) {echo 'selected="selected"';}?>><?php echo $category->cat_name; ?></option>
                                                <?php endforeach; ?>
                                            </select><br />
                                            <span class="description"><?php _e( 'You may select multiple categories by holding down the CTRL key.', 'catch-everest' ); ?></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save', 'catch-everest' ); ?>" /></p>
                        </div><!-- .option-content -->
                    </div><!-- .option-container -->
                </div><!-- #homepagesettings -->

                <!-- Options for Slider Settings -->
                <div id="slidersettings">
                    <div class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Slider Options', 'catch-everest' ); ?></a></h3>
                        <div class="option-content inside">
                            <table class="form-table">
                                <tr>
                                    <th scope="row"><label><?php _e( 'Enable Slider', 'catch-everest' ); ?></label></th>
                                    <td>
                                        <label title="enable-slider-homepager" class="box">
                                        <input type="radio" name="catcheverest_options[enable_slider]" id="enable-slider-homepage" <?php checked($options['enable_slider'], 'enable-slider-homepage') ?> value="enable-slider-homepage"  />
                                        <?php _e( 'Homepage / Frontpage', 'catch-everest' ); ?>
                                        </label>
                                        <label title="enable-slider-allpage" class="box">
                                        <input type="radio" name="catcheverest_options[enable_slider]" id="enable-slider-allpage" <?php checked($options['enable_slider'], 'enable-slider-allpage') ?> value="enable-slider-allpage"  />
                                         <?php _e( 'Entire Site', 'catch-everest' ); ?>
                                        </label>
                                        <label title="disable-slider" class="box">
                                        <input type="radio" name="catcheverest_options[enable_slider]" id="disable-slider" <?php checked($options['enable_slider'], 'disable-slider') ?> value="disable-slider"  />
                                         <?php _e( 'Disable', 'catch-everest' ); ?>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php _e( 'Number of Slides', 'catch-everest' ); ?></th>
                                    <td><input type="text" name="catcheverest_options[slider_qty]" value="<?php echo intval( $options[ 'slider_qty' ] ); ?>" size="2" /></td>
                                </tr>
                                <tr>
                                    <th>
                                        <label for="catcheverest_cycle_style"><?php _e( 'Transition Effect:', 'catch-everest' ); ?></label>
                                    </th>
                                    <td>
                                        <select id="catcheverest_cycle_style" name="catcheverest_options[transition_effect]">
                                            <option value="fade" <?php selected('fade', $options['transition_effect']); ?>><?php _e( 'fade', 'catch-everest' ); ?></option>
                                            <option value="wipe" <?php selected('wipe', $options['transition_effect']); ?>><?php _e( 'wipe', 'catch-everest' ); ?></option>
                                            <option value="scrollUp" <?php selected('scrollUp', $options['transition_effect']); ?>><?php _e( 'scrollUp', 'catch-everest' ); ?></option>
                                            <option value="scrollDown" <?php selected('scrollDown', $options['transition_effect']); ?>><?php _e( 'scrollDown', 'catch-everest' ); ?></option>
                                            <option value="scrollLeft" <?php selected('scrollLeft', $options['transition_effect']); ?>><?php _e( 'scrollLeft', 'catch-everest' ); ?></option>
                                            <option value="scrollRight" <?php selected('scrollRight', $options['transition_effect']); ?>><?php _e( 'scrollRight', 'catch-everest' ); ?></option>
                                            <option value="blindX" <?php selected('blindX', $options['transition_effect']); ?>><?php _e( 'blindX', 'catch-everest' ); ?></option>
                                            <option value="blindY" <?php selected('blindY', $options['transition_effect']); ?>><?php _e( 'blindY', 'catch-everest' ); ?></option>
                                            <option value="blindZ" <?php selected('blindZ', $options['transition_effect']); ?>><?php _e( 'blindZ', 'catch-everest' ); ?></option>
                                            <option value="cover" <?php selected('cover', $options['transition_effect']); ?>><?php _e( 'cover', 'catch-everest' ); ?></option>
                                            <option value="shuffle" <?php selected('shuffle', $options['transition_effect']); ?>><?php _e( 'shuffle', 'catch-everest' ); ?></option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php _e( 'Transition Delay', 'catch-everest' ); ?></th>
                                    <td>
                                        <input type="text" name="catcheverest_options[transition_delay]" value="<?php echo $options[ 'transition_delay' ]; ?>" size="2" />
                                       <span class="description"><?php _e( 'second(s)', 'catch-everest' ); ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php _e( 'Transition Length', 'catch-everest' ); ?></th>
                                    <td>
                                        <input type="text" name="catcheverest_options[transition_duration]" value="<?php echo $options[ 'transition_duration' ]; ?>" size="2" />
                                        <span class="description"><?php _e( 'second(s)', 'catch-everest' ); ?></span>
                                    </td>
                                </tr>

                            </table>
                            <p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save', 'catch-everest' ); ?>" /></p>
                        </div><!-- .option-content -->
                    </div><!-- .option-container -->


                    <div class="option-container post-slider">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Featured Post Slider Options', 'catch-everest' ); ?></a></h3>
                        <div class="option-content inside">
                            <table class="form-table">
                                <tr>
                                    <th scope="row"><?php _e( 'Exclude Slider post from Homepage posts?', 'catch-everest' ); ?></th>
                                     <input type='hidden' value='0' name='catcheverest_options[exclude_slider_post]'>
                                    <td><input type="checkbox" id="headerlogo" name="catcheverest_options[exclude_slider_post]" value="1" <?php checked( '1', $options['exclude_slider_post'] ); ?> /> <?php _e('Check to exclude', 'catch-everest'); ?></td>
                                </tr>
                                <tbody class="sortable">
                                    <?php for ( $i = 1; $i <= $options[ 'slider_qty' ]; $i++ ): ?>
                                    <tr>
                                        <th scope="row"><label class="handle"><?php _e( 'Featured Slider Post #', 'catch-everest' ); ?><span class="count"><?php echo absint( $i ); ?></span></label></th>
                                        <td><input type="text" name="catcheverest_options[featured_slider][<?php echo absint( $i ); ?>]" value="<?php if( array_key_exists( 'featured_slider', $options ) && array_key_exists( $i, $options[ 'featured_slider' ] ) ) echo absint( $options[ 'featured_slider' ][ $i ] ); ?>" />
                                        <a href="<?php bloginfo ( 'wpurl' );?>/wp-admin/post.php?post=<?php if( array_key_exists ( 'featured_slider', $options ) && array_key_exists ( $i, $options[ 'featured_slider' ] ) ) echo absint( $options[ 'featured_slider' ][ $i ] ); ?>&action=edit" class="button" title="<?php esc_attr_e( 'Click Here To Edit', 'catch-everest' ); ?>" target="_blank"><?php _e( 'Click Here To Edit', 'catch-everest' ); ?></a>
                                        </td>
                                    </tr>
                                    <?php endfor; ?>
                                </tbody>
                            </table>
                            <p><?php _e( 'Note: Here You can put your Post IDs which displays on Homepage as slider.', 'catch-everest' ); ?> </p>
                            <p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save', 'catch-everest' ); ?>" /></p>
                        </div><!-- .option-content -->
                    </div><!-- .option-container -->
                </div><!-- #slidersettings -->


                <!-- Options for Social Links -->
                <div id="sociallinks">
                    <div class="option-container">
                        <table class="form-table">
                            <tbody>
                                <tr>
                                    <th scope="row"><h4><?php _e( 'Facebook', 'catch-everest' ); ?></h4></th>
                                    <td><input type="text" size="45" name="catcheverest_options[social_facebook]" value="<?php echo esc_url( $options[ 'social_facebook' ] ); ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><h4><?php _e( 'Twitter', 'catch-everest' ); ?> </h4></th>
                                    <td><input type="text" size="45" name="catcheverest_options[social_twitter]" value="<?php echo esc_url( $options[ 'social_twitter'] ); ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><h4><?php _e( 'Google+', 'catch-everest' ); ?> </h4></th>
                                    <td><input type="text" size="45" name="catcheverest_options[social_googleplus]" value="<?php echo esc_url( $options[ 'social_googleplus'] ); ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><h4><?php _e( 'Pinterest', 'catch-everest' ); ?> </h4></th>
                                    <td><input type="text" size="45" name="catcheverest_options[social_pinterest]" value="<?php echo esc_url( $options[ 'social_pinterest'] ); ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><h4><?php _e( 'Youtube', 'catch-everest' ); ?></h4></th>
                                    <td><input type="text" size="45" name="catcheverest_options[social_youtube]" value="<?php echo esc_url( $options[ 'social_youtube' ] ); ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><h4><?php _e( 'Vimeo', 'catch-everest' ); ?></h4></th>
                                    <td><input type="text" size="45" name="catcheverest_options[social_vimeo]" value="<?php echo esc_url( $options[ 'social_vimeo' ] ); ?>" />
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row"><h4><?php _e( 'Linkedin', 'catch-everest' ); ?> </h4></th>
                                    <td><input type="text" size="45" name="catcheverest_options[social_linkedin]" value="<?php echo esc_url( $options[ 'social_linkedin'] ); ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><h4><?php _e( 'Slideshare', 'catch-everest' ); ?> </h4></th>
                                    <td><input type="text" size="45" name="catcheverest_options[social_slideshare]" value="<?php echo esc_url( $options[ 'social_slideshare'] ); ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><h4><?php _e( 'Foursquare', 'catch-everest' ); ?></h4></th>
                                    <td><input type="text" size="45" name="catcheverest_options[social_foursquare]" value="<?php echo esc_url( $options[ 'social_foursquare' ] ); ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><h4><?php _e( 'Flickr', 'catch-everest' ); ?></h4></th>
                                    <td><input type="text" size="45" name="catcheverest_options[social_flickr]" value="<?php echo esc_url( $options[ 'social_flickr' ] ); ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><h4><?php _e( 'Tumblr', 'catch-everest' ); ?></h4></th>
                                    <td><input type="text" size="45" name="catcheverest_options[social_tumblr]" value="<?php echo esc_url( $options[ 'social_tumblr' ] ); ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><h4><?php _e( 'deviantART', 'catch-everest' ); ?></h4></th>
                                    <td><input type="text" size="45" name="catcheverest_options[social_deviantart]" value="<?php echo esc_url( $options[ 'social_deviantart' ] ); ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><h4><?php _e( 'Dribbble', 'catch-everest' ); ?></h4></th>
                                    <td><input type="text" size="45" name="catcheverest_options[social_dribbble]" value="<?php echo esc_url( $options[ 'social_dribbble' ] ); ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><h4><?php _e( 'MySpace', 'catch-everest' ); ?></h4></th>
                                    <td><input type="text" size="45" name="catcheverest_options[social_myspace]" value="<?php echo esc_url( $options[ 'social_myspace' ] ); ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><h4><?php _e( 'WordPress', 'catch-everest' ); ?></h4></th>
                                    <td><input type="text" size="45" name="catcheverest_options[social_wordpress]" value="<?php echo esc_url( $options[ 'social_wordpress' ] ); ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><h4><?php _e( 'RSS', 'catch-everest' ); ?> </h4></th>
                                    <td><input type="text" size="45" name="catcheverest_options[social_rss]" value="<?php echo esc_url( $options[ 'social_rss' ] ); ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><h4><?php _e( 'Delicious', 'catch-everest' ); ?></h4></th>
                                    <td><input type="text" size="45" name="catcheverest_options[social_delicious]" value="<?php echo esc_url( $options[ 'social_delicious' ] ); ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><h4><?php _e( 'Last.fm', 'catch-everest' ); ?> </h4></th>
                                    <td><input type="text" size="45" name="catcheverest_options[social_lastfm]" value="<?php echo esc_url( $options[ 'social_lastfm' ] ); ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><h4><?php _e( 'Instagram', 'catch-everest' ); ?></h4></th>
                                    <td><input type="text" size="45" name="catcheverest_options[social_instagram]" value="<?php echo esc_url( $options[ 'social_instagram' ] ); ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><h4><?php _e( 'GitHub', 'catch-everest' ); ?></h4></th>
                                    <td><input type="text" size="45" name="catcheverest_options[social_github]" value="<?php echo esc_url( $options[ 'social_github' ] ); ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><h4><?php _e( 'Vkontakte', 'catch-everest' ); ?></h4></th>
                                    <td><input type="text" size="45" name="catcheverest_options[social_vkontakte]" value="<?php echo esc_url( $options[ 'social_vkontakte'] ); ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><h4><?php _e( 'My World', 'catch-everest' ); ?></h4></th>
                                    <td><input type="text" size="45" name="catcheverest_options[social_myworld]" value="<?php echo esc_url( $options[ 'social_myworld' ] ); ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><h4><?php _e( 'Odnoklassniki', 'catch-everest' ); ?></h4></th>
                                    <td><input type="text" size="45" name="catcheverest_options[social_odnoklassniki]" value="<?php echo esc_url( $options[ 'social_odnoklassniki' ] ); ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><h4><?php _e( 'Goodreads', 'catch-everest' ); ?></h4></th>
                                    <td><input type="text" size="45" name="catcheverest_options[social_goodreads]" value="<?php echo esc_url( $options[ 'social_goodreads' ] ); ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><h4><?php _e( 'Skype', 'catch-everest' ); ?></h4></th>
                                    <td><input type="text" size="45" name="catcheverest_options[social_skype]" value="<?php echo esc_attr( $options[ 'social_skype' ] ); ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><h4><?php _e( 'Soundcloud', 'catch-everest' ); ?></h4></th>
                                    <td><input type="text" size="45" name="catcheverest_options[social_soundcloud]" value="<?php echo esc_url( $options[ 'social_soundcloud' ] ); ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><h4><?php _e( 'Email', 'catch-everest' ); ?></h4></th>
                                    <td><input type="text" size="45" name="catcheverest_options[social_email]" value="<?php echo sanitize_email( $options[ 'social_email' ] ); ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php _e( 'Contact', 'catch-everest' ); ?></th>
                                    <td><input type="text" size="45" name="catcheverest_options[social_contact]" value="<?php echo esc_url( $options[ 'social_contact' ] ); ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php _e( 'Xing', 'catch-everest' ); ?></th>
                                    <td><input type="text" size="45" name="catcheverest_options[social_xing]" value="<?php echo esc_attr( $options[ 'social_xing' ] ); ?>" />
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save', 'catch-everest' ); ?>" /></p>
                    </div><!-- .option-container -->
                </div><!-- #sociallinks -->


                <!-- Options for Webmaster Tools -->
                <div id="webmaster">

                    <div class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Header and Footer Codes', 'catch-everest' ); ?></a></h3>
                        <div class="option-content inside">
                            <table class="form-table">
                                <tbody>
                                    <tr>
                                        <th scope="row"><?php _e( 'Code to display on Header', 'catch-everest' ); ?></th>
                                        <td>
                                        <textarea name="catcheverest_options[analytic_header]" id="analytics" rows="7" cols="80" ><?php echo esc_html( $options[ 'analytic_header' ] ); ?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td><td><?php _e('Note: Note: Here you can put scripts from Google, Facebook, Twitter, Add This etc. which will load on Header', 'catch-everest' ); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?php _e('Code to display on Footer', 'catch-everest' ); ?></th>
                                        <td>
                                         <textarea name="catcheverest_options[analytic_footer]" id="analytics" rows="7" cols="80" ><?php echo esc_html( $options[ 'analytic_footer' ] ); ?></textarea>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td><td><?php _e( 'Note: Here you can put scripts from Google, Facebook, Twitter, Add This etc. which will load on footer', 'catch-everest' ); ?></td>
                                    </tr>
                                </tbody>
                            </table>

                            <p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save', 'catch-everest' ); ?>" /></p>
                        </div><!-- .option-content -->
                    </div><!-- .option-container -->
                </div><!-- #webmaster -->

            </div><!-- #catcheverest_ad_tabs -->
        </form>
    </div><!-- .wrap -->
<?php
}


/**
 * Validate content options
 * @param array $options
 * @uses esc_url_raw, absint, esc_textarea, sanitize_text_field, catcheverest_invalidate_caches
 * @return array
 */
function catcheverest_theme_options_validate( $options ) {
    global $catcheverest_options_settings;
    $input_validated = $catcheverest_options_settings;

    global $catcheverest_options_defaults;
    $defaults = $catcheverest_options_defaults;

    $input = array();
    $input = $options;


    // Data validation for Large Header Image
    if ( isset( $input[ 'featured_header_image_alt' ] ) ) {
        $input_validated[ 'featured_header_image_alt' ] = sanitize_text_field( $input[ 'featured_header_image_alt' ] );
    }
    if ( isset( $input[ 'featured_header_image_url' ] ) ) {
        $input_validated[ 'featured_header_image_url' ] = esc_url_raw( $input[ 'featured_header_image_url' ] );
    }
    if ( isset( $input['featured_header_image_base'] ) ) {
        // Our checkbox value is either 0 or 1
        $input_validated[ 'featured_header_image_base' ] = $input[ 'featured_header_image_base' ];
    }
    if ( isset( $input[ 'enable_featured_header_image' ] ) ) {
        $input_validated[ 'enable_featured_header_image' ] = $input[ 'enable_featured_header_image' ];
    }

    // Data Validation for Resonsive Design
    if ( isset( $input['disable_responsive'] ) ) {
        // Our checkbox value is either 0 or 1
        $input_validated[ 'disable_responsive' ] = $input[ 'disable_responsive' ];
    }

    // Data Validation for Favicon
    if ( isset( $input[ 'fav_icon' ] ) ) {
        $input_validated[ 'fav_icon' ] = esc_url_raw( $input[ 'fav_icon' ] );
    }
    if ( isset( $input['remove_favicon'] ) ) {
        // Our checkbox value is either 0 or 1
        $input_validated[ 'remove_favicon' ] = $input[ 'remove_favicon' ];
    }

    // Data Validation for web clip icon
    if ( isset( $input[ 'web_clip' ] ) ) {
        $input_validated[ 'web_clip' ] = esc_url_raw( $input[ 'web_clip' ] );
    }
    if ( isset( $input['remove_web_clip'] ) ) {
        // Our checkbox value is either 0 or 1
        $input_validated[ 'remove_web_clip' ] = $input[ 'remove_web_clip' ];
    }

    // Data Validation for Header Sidebar
    if ( isset( $input[ 'disable_header_right_sidebar' ] ) ) {
        $input_validated[ 'disable_header_right_sidebar' ] = $input[ 'disable_header_right_sidebar' ];
    }


    // Data Validation for Custom CSS Style
    if ( isset( $input['custom_css'] ) ) {
        $input_validated['custom_css'] = wp_kses_stripslashes($input['custom_css']);
    }

    // Data Validation for Disable Scroll Up
    if ( isset( $input['disable_scrollup'] ) ) {
        // Our checkbox value is either 0 or 1
        $input_validated[ 'disable_scrollup' ] = $input[ 'disable_scrollup' ];
    }

    // Data Validation for Homepage Headline Message
    if( isset( $input[ 'homepage_headline' ] ) ) {
        $input_validated['homepage_headline'] =  sanitize_text_field( $input[ 'homepage_headline' ] ) ? $input [ 'homepage_headline' ] : $defaults[ 'homepage_headline' ];
    }
    if( isset( $input[ 'homepage_subheadline' ] ) ) {
        $input_validated['homepage_subheadline'] =  sanitize_text_field( $input[ 'homepage_subheadline' ] ) ? $input [ 'homepage_subheadline' ] : $defaults[ 'homepage_subheadline' ];
    }
    if ( isset( $input[ 'disable_homepage_headline' ] ) ) {
        $input_validated[ 'disable_homepage_headline' ] = $input[ 'disable_homepage_headline' ];
    }
    if ( isset( $input[ 'disable_homepage_subheadline' ] ) ) {
        $input_validated[ 'disable_homepage_subheadline' ] = $input[ 'disable_homepage_subheadline' ];
    }


    // Data Validation for Homepage Featured Content
    if ( isset( $input[ 'disable_homepage_featured' ] ) ) {
        $input_validated[ 'disable_homepage_featured' ] = $input[ 'disable_homepage_featured' ];
    }
    if( isset( $input[ 'homepage_featured_headline' ] ) ) {
        $input_validated['homepage_featured_headline'] =  sanitize_text_field( $input[ 'homepage_featured_headline' ] ) ? $input [ 'homepage_featured_headline' ] : $defaults[ 'homepage_featured_headline' ];
    }
    if ( isset( $input[ 'homepage_featured_image' ] ) ) {
        $input_validated[ 'homepage_featured_image' ] = array();
    }
    if ( isset( $input[ 'homepage_featured_url' ] ) ) {
        $input_validated[ 'homepage_featured_url' ] = array();
    }
    if ( isset( $input[ 'homepage_featured_base' ] ) ) {
        $input_validated[ 'homepage_featured_base' ] = array();
    }
    if ( isset( $input[ 'homepage_featured_title' ] ) ) {
        $input_validated[ 'homepage_featured_title' ] = array();
    }
    if ( isset( $input[ 'homepage_featured_content' ] ) ) {
        $input_validated[ 'homepage_featured_content' ] = array();
    }
    if ( isset( $input[ 'homepage_featured_qty' ] ) ) {
        $input_validated[ 'homepage_featured_qty' ] = absint( $input[ 'homepage_featured_qty' ] ) ? $input [ 'homepage_featured_qty' ] : $defaults[ 'homepage_featured_qty' ];
        for ( $i = 1; $i <= $input [ 'homepage_featured_qty' ]; $i++ ) {
            if ( !empty( $input[ 'homepage_featured_image' ][ $i ] ) ) {
                $input_validated[ 'homepage_featured_image' ][ $i ] = esc_url_raw($input[ 'homepage_featured_image' ][ $i ] );
            }
            if ( !empty( $input[ 'homepage_featured_url' ][ $i ] ) ) {
                $input_validated[ 'homepage_featured_url'][ $i ] = esc_url_raw($input[ 'homepage_featured_url'][ $i ]);
            }
            if ( !empty( $input[ 'homepage_featured_base' ][ $i ] ) ) {
                $input_validated[ 'homepage_featured_base'][ $i ] = $input[ 'homepage_featured_base'][ $i ];
            }
            if ( !empty( $input[ 'homepage_featured_title' ][ $i ] ) ) {
                $input_validated[ 'homepage_featured_title'][ $i ] = sanitize_text_field($input[ 'homepage_featured_title'][ $i ]);
            }
            if ( !empty( $input[ 'homepage_featured_content' ][ $i ] ) ) {
                $input_validated[ 'homepage_featured_content'][ $i ] = wp_kses_stripslashes($input[ 'homepage_featured_content'][ $i ]);
            }
        }
    }

    // Data Validation for Homepage
    if ( isset( $input[ 'enable_posts_home' ] ) ) {
        $input_validated[ 'enable_posts_home' ] = $input[ 'enable_posts_home' ];
    }


    if ( isset( $input['exclude_slider_post'] ) ) {
        // Our checkbox value is either 0 or 1
        $input_validated[ 'exclude_slider_post' ] = $input[ 'exclude_slider_post' ];

    }
    // Front page posts categories
    if( isset( $input['front_page_category' ] ) ) {
        $input_validated['front_page_category'] = $input['front_page_category'];
    }


    // data validation for Enable Slider
    if( isset( $input[ 'enable_slider' ] ) ) {
        $input_validated[ 'enable_slider' ] = $input[ 'enable_slider' ];
    }
    // data validation for number of slides
    if ( isset( $input[ 'slider_qty' ] ) ) {
        $input_validated[ 'slider_qty' ] = absint( $input[ 'slider_qty' ] ) ? $input [ 'slider_qty' ] : 4;
    }
    // data validation for transition effect
    if( isset( $input[ 'transition_effect' ] ) ) {
        $input_validated['transition_effect'] = wp_filter_nohtml_kses( $input['transition_effect'] );
    }
    // data validation for transition delay
    if ( isset( $input[ 'transition_delay' ] ) && is_numeric( $input[ 'transition_delay' ] ) ) {
        $input_validated[ 'transition_delay' ] = $input[ 'transition_delay' ];
    }
    // data validation for transition length
    if ( isset( $input[ 'transition_duration' ] ) && is_numeric( $input[ 'transition_duration' ] ) ) {
        $input_validated[ 'transition_duration' ] = $input[ 'transition_duration' ];
    }

    // data validation for Featured Post Slider
    if ( isset( $input[ 'featured_slider' ] ) ) {
        $input_validated[ 'featured_slider' ] = array();
    }
    if ( isset( $input[ 'slider_qty' ] ) )  {
        for ( $i = 1; $i <= $input [ 'slider_qty' ]; $i++ ) {
            if ( !empty( $input[ 'featured_slider' ][ $i ] ) && intval( $input[ 'featured_slider' ][ $i ] ) ) {
                $input_validated[ 'featured_slider' ][ $i ] = absint($input[ 'featured_slider' ][ $i ] );
            }
        }
    }


    // data validation for Social Icons
    if( isset( $input[ 'social_facebook' ] ) ) {
        $input_validated[ 'social_facebook' ] = esc_url_raw( $input[ 'social_facebook' ] );
    }
    if( isset( $input[ 'social_twitter' ] ) ) {
        $input_validated[ 'social_twitter' ] = esc_url_raw( $input[ 'social_twitter' ] );
    }
    if( isset( $input[ 'social_googleplus' ] ) ) {
        $input_validated[ 'social_googleplus' ] = esc_url_raw( $input[ 'social_googleplus' ] );
    }
    if( isset( $input[ 'social_pinterest' ] ) ) {
        $input_validated[ 'social_pinterest' ] = esc_url_raw( $input[ 'social_pinterest' ] );
    }
    if( isset( $input[ 'social_youtube' ] ) ) {
        $input_validated[ 'social_youtube' ] = esc_url_raw( $input[ 'social_youtube' ] );
    }
    if( isset( $input[ 'social_vimeo' ] ) ) {
        $input_validated[ 'social_vimeo' ] = esc_url_raw( $input[ 'social_vimeo' ] );
    }
    if( isset( $input[ 'social_linkedin' ] ) ) {
        $input_validated[ 'social_linkedin' ] = esc_url_raw( $input[ 'social_linkedin' ] );
    }
    if( isset( $input[ 'social_slideshare' ] ) ) {
        $input_validated[ 'social_slideshare' ] = esc_url_raw( $input[ 'social_slideshare' ] );
    }
    if( isset( $input[ 'social_foursquare' ] ) ) {
        $input_validated[ 'social_foursquare' ] = esc_url_raw( $input[ 'social_foursquare' ] );
    }
    if( isset( $input[ 'social_flickr' ] ) ) {
        $input_validated[ 'social_flickr' ] = esc_url_raw( $input[ 'social_flickr' ] );
    }
    if( isset( $input[ 'social_tumblr' ] ) ) {
        $input_validated[ 'social_tumblr' ] = esc_url_raw( $input[ 'social_tumblr' ] );
    }
    if( isset( $input[ 'social_deviantart' ] ) ) {
        $input_validated[ 'social_deviantart' ] = esc_url_raw( $input[ 'social_deviantart' ] );
    }
    if( isset( $input[ 'social_dribbble' ] ) ) {
        $input_validated[ 'social_dribbble' ] = esc_url_raw( $input[ 'social_dribbble' ] );
    }
    if( isset( $input[ 'social_myspace' ] ) ) {
        $input_validated[ 'social_myspace' ] = esc_url_raw( $input[ 'social_myspace' ] );
    }
    if( isset( $input[ 'social_wordpress' ] ) ) {
        $input_validated[ 'social_wordpress' ] = esc_url_raw( $input[ 'social_wordpress' ] );
    }
    if( isset( $input[ 'social_rss' ] ) ) {
        $input_validated[ 'social_rss' ] = esc_url_raw( $input[ 'social_rss' ] );
    }
    if( isset( $input[ 'social_delicious' ] ) ) {
        $input_validated[ 'social_delicious' ] = esc_url_raw( $input[ 'social_delicious' ] );
    }
    if( isset( $input[ 'social_lastfm' ] ) ) {
        $input_validated[ 'social_lastfm' ] = esc_url_raw( $input[ 'social_lastfm' ] );
    }
    if( isset( $input[ 'social_instagram' ] ) ) {
        $input_validated[ 'social_instagram' ] = esc_url_raw( $input[ 'social_instagram' ] );
    }
    if( isset( $input[ 'social_github' ] ) ) {
        $input_validated[ 'social_github' ] = esc_url_raw( $input[ 'social_github' ] );
    }
    if( isset( $input[ 'social_vkontakte' ] ) ) {
        $input_validated[ 'social_vkontakte' ] = esc_url_raw( $input[ 'social_vkontakte' ] );
    }
    if( isset( $input[ 'social_myworld' ] ) ) {
        $input_validated[ 'social_myworld' ] = esc_url_raw( $input[ 'social_myworld' ] );
    }
    if( isset( $input[ 'social_odnoklassniki' ] ) ) {
        $input_validated[ 'social_odnoklassniki' ] = esc_url_raw( $input[ 'social_odnoklassniki' ] );
    }
    if( isset( $input[ 'social_goodreads' ] ) ) {
        $input_validated[ 'social_goodreads' ] = esc_url_raw( $input[ 'social_goodreads' ] );
    }
    if( isset( $input[ 'social_skype' ] ) ) {
        $input_validated[ 'social_skype' ] = sanitize_text_field( $input[ 'social_skype' ] );
    }
    if( isset( $input[ 'social_soundcloud' ] ) ) {
        $input_validated[ 'social_soundcloud' ] = esc_url_raw( $input[ 'social_soundcloud' ] );
    }
    if( isset( $input[ 'social_email' ] ) ) {
        $input_validated[ 'social_email' ] = sanitize_email( $input[ 'social_email' ] );
    }
    if( isset( $input[ 'social_contact' ] ) ) {
        $input_validated[ 'social_contact' ] = esc_url_raw( $input[ 'social_contact' ] );
    }
    if( isset( $input[ 'social_xing' ] ) ) {
        $input_validated[ 'social_xing' ] = esc_url_raw( $input[ 'social_xing' ] );
    }

    //Webmaster Tool Verification
    if( isset( $input[ 'google_verification' ] ) ) {
        $input_validated[ 'google_verification' ] = wp_filter_post_kses( $input[ 'google_verification' ] );
    }
    if( isset( $input[ 'yahoo_verification' ] ) ) {
        $input_validated[ 'yahoo_verification' ] = wp_filter_post_kses( $input[ 'yahoo_verification' ] );
    }
    if( isset( $input[ 'bing_verification' ] ) ) {
        $input_validated[ 'bing_verification' ] = wp_filter_post_kses( $input[ 'bing_verification' ] );
    }
    if( isset( $input[ 'analytic_header' ] ) ) {
        $input_validated[ 'analytic_header' ] = wp_kses_stripslashes( $input[ 'analytic_header' ] );
    }
    if( isset( $input[ 'analytic_footer' ] ) ) {
        $input_validated[ 'analytic_footer' ] = wp_kses_stripslashes( $input[ 'analytic_footer' ] );
    }

    // Layout settings verification
    if( isset( $input[ 'sidebar_layout' ] ) ) {
        $input_validated[ 'sidebar_layout' ] = $input[ 'sidebar_layout' ];
    }
    if( isset( $input[ 'content_layout' ] ) ) {
        $input_validated[ 'content_layout' ] = $input[ 'content_layout' ];
    }

    if( isset( $input[ 'more_tag_text' ] ) ) {
        $input_validated[ 'more_tag_text' ] = sanitize_text_field ( $input[ 'more_tag_text' ] );
    }

    if( isset( $input[ 'search_display_text' ] ) ) {
        $input_validated[ 'search_display_text' ] = sanitize_text_field( $input[ 'search_display_text' ] ) ? $input [ 'search_display_text' ] : $defaults[ 'search_display_text' ];
    }

    if ( isset( $input['reset_layout'] ) ) {
        // Our checkbox value is either 0 or 1
        $input_validated[ 'reset_layout' ] = $input[ 'reset_layout' ];
    }

    //Reset Color Options
    if( $input[ 'reset_layout' ] == 1 ) {
        global $catcheverest_options_defaults;
        $defaults = $catcheverest_options_defaults;

        $input_validated[ 'sidebar_layout' ] = $defaults[ 'sidebar_layout' ];
        $input_validated[ 'content_layout' ] = $defaults[ 'content_layout' ];
    }

    //data validation for excerpt length
    if ( isset( $input[ 'excerpt_length' ] ) ) {
        $input_validated[ 'excerpt_length' ] = absint( $input[ 'excerpt_length' ] ) ? $input [ 'excerpt_length' ] : $defaults[ 'excerpt_length' ];
    }

    //Feed Redirect
    if ( isset( $input[ 'feed_url' ] ) ) {
        $input_validated['feed_url'] = esc_url_raw($input['feed_url']);
    }

    //Clearing the theme option cache
    if( function_exists( 'catcheverest_themeoption_invalidate_caches' ) ) catcheverest_themeoption_invalidate_caches();

    return $input_validated;
}


/*
 * Clearing the cache if any changes in Admin Theme Option
 */
function catcheverest_themeoption_invalidate_caches(){
    delete_transient( 'catcheverest_favicon' );   // favicon on cpanel/ backend and frontend
    delete_transient( 'catcheverest_web_clip' ); // web clip icons
    delete_transient( 'catcheverest_post_sliders' ); // featured post slider
    delete_transient( 'catcheverest_homepage_headline' ); // Homepage Headline Message
    delete_transient( 'catcheverest_homepage_featured_content' ); // Homepage Featured Content
    delete_transient( 'catcheverest_social_networks' ); // Social Networks
    delete_transient( 'catcheverest_webmaster' ); // scripts which loads on header
    delete_transient( 'catcheverest_footercode' ); // scripts which loads on footer
    delete_transient( 'catcheverest_inline_css' ); // Custom Inline CSS
    delete_transient( 'catcheverest_scrollup' ); // Scroll up Navigation
    delete_transient( 'catcheverest_featured_image' );//Header image
}


/*
 * Clearing the cache if any changes in post or page
 */
function catcheverest_post_invalidate_caches(){
    delete_transient( 'catcheverest_post_sliders' );
}
//Add action hook here save post
add_action( 'save_post', 'catcheverest_post_invalidate_caches' );


/**
 * Function to display the current year.
 *
 * @uses date() Gets the current year.
 * @return string
 */
function catcheverest_the_year() {
    return date( __( 'Y', 'catch-everest' ) );
}


/**
 * Function to display a link back to the site.
 *
 * @uses get_bloginfo() Gets the site link
 * @return string
 */
function catcheverest_site_link() {
    return '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" ><span>' . get_bloginfo( 'name', 'display' ) . '</span></a>';
}


/**
 * Function to display a link to WordPress.org.
 *
 * @return string
 */
function catcheverest_wp_link() {
    return '<a href="http://wordpress.org" target="_blank" title="' . esc_attr__( 'WordPress', 'catch-everest' ) . '"><span>' . __( 'WordPress', 'catch-everest' ) . '</span></a>';
}


/**
 * Function to display a link to Theme Link.
 *
 * @return string
 */
function catcheverest_theme_name() {
    return '<span class="theme-name">' . __( 'Catch Everest Theme by ', 'catch-everest' ) . '</span>';
}
/**
 * Function to display a link to Theme Link.
 *
 * @return string
 */
function catcheverest_theme_author() {

    return '<span class="theme-author"><a href="' . esc_url( 'http://catchthemes.com/' ) . '" target="_blank" title="' . esc_attr__( 'Catch Themes', 'catch-everest' ) . '">' . __( 'Catch Themes', 'catch-everest' ) . '</a></span>';

}


/**
 * Function to display Catch Everest assets
 *
 * @return string
 */
function catcheverest_assets(){
    $catcheverest_content = '<div class="copyright">'. esc_attr__( 'Copyright', 'catch-everest' ) . ' &copy; '. catcheverest_the_year() . ' ' . catcheverest_site_link() . ' ' . esc_attr__( 'All Rights Reserved', 'catch-everest' ) . '.</div><div class="powered">'. catcheverest_theme_name() . catcheverest_theme_author() . '</div>';
    return $catcheverest_content;
}
