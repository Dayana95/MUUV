<?php  

	/*
		Plugin Name: My first plugin
		Plugin URI: http://www.example.com
		Description: Just trying to learn something
		Author: Dayana
		Version: 1.0


	*/


		add_action('admin_menu', 'myfirstplugin_admin_actions');
		function myfirstplugin_admin_actions(){

			add_menu_page('MyFirstPlugin', 'MyFirstPlugin', 'manage_options', __FILE__, 'myfirstplugin_admin', 'dashicons-visibility');
		}

		function myfirstplugin_admin(){

			?>

			<div class="wrap">
				<h2>Hello word!!!</h2>
				<h3>This plugin will search the DB for all draft posts and display their Title and ID</h3>
				<p>CLick the button below to begin the search</p>
				</br>
				<form action="" method="POST">
					<input type="submit" name="search_draft_posts" value="search" class="button-primary">
				</form></br>
				<table class="widefat">
				<thead>
				<tr>
				<th>Post title</th>
				<th>Post ID</th>
				</tr>
				</thead>
				<tfoot>
				<tr>
				<th>Post Title</th>
				<th>Post ID</th>
				</tr>
				</tfoot>
				<tbody>
						<?php

							global $wpdb;
							$mytestdrafts = array();
							if(isset($_POST['search_draft_posts'])){

							$mytestdrafts = $wpdb->get_results(

								"
									SELECT ID, post_title
									FROM $wpdb->posts
									WHERE post_status = 'draft'
								"

								);
							update_option('myfirstplugin_draft_posts', $mytestdrafts); //Store the results in WP option table
						}
							else if (get_option('myfirstplugin_draft_posts'))

							{
								$mytestdrafts = get_option('myfirstplugin_draft_posts');
							}
						

								foreach ($mytestdrafts as $mytestdraft)
								{
						?>			
									<tr>
						<?php
									echo "<td>".$mytestdraft->post_title."</td>";
									echo "<td>".$mytestdraft->ID."</td>";
var_dump($mytestdraft);

						?>	

									</tr>
						<?php		
								
							}
						?>

				</tbody>

			</div>

				<?php

		}



?>