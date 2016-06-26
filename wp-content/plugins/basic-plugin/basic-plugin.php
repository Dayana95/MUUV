<?php  

	/*
		Plugin Name: Basic PLugin
		Plugin URI: http://www.example.com
		Description: Just trying to learn something
		Author: Dayana
		Version: 1.0


	*/

		function dwwp_remove_dashboard_widget(){
			remove_meta_box('dashboard_primary', 'dashboard', 'side');
		}

		add_action('wp_dashboard_setup', 'dwwp_remove_dashboard_widget');


		function dwwp_add_google_link(){
				global $wp_admin_bar;
				//var_dump($wp_admin_bar);
				$wp_admin_bar->add_menu(array(
						'id' => 'google_analytics',
						'title' => 'Google Analytics',
						'href' => 'http://google.com/analytics'
					));

		}

		add_action('wp_before_admin_bar_render', 'dwwp_add_google_link');
		

?>