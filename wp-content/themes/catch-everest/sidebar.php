<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Catch Themes
 * @subpackage Catch Everest
 * @since Catch Everest 1.0
 */
?>

<?php
/**
 * catcheverest_above_secondary hook
 */
do_action( 'catcheverest_before_secondary' );

$catcheverest_layout = catcheverest_get_theme_layout();

if ( $catcheverest_layout == 'left-sidebar' || $catcheverest_layout == 'right-sidebar' ) {
	?>

	<div id="secondary" class="widget-area" role="complementary">
		<?php
		/**
		 * catcheverest_before_widget_start hook
		 */
		do_action( 'catcheverest_before_widget_start' );

		if ( is_active_sidebar( 'sidebar-1' ) ) {
			dynamic_sidebar( 'sidebar-1' );
		}
		else { ?>
			<aside id="search" class="widget widget_search">
				<?php get_search_form(); ?>
			</aside>

			<aside id="archives" class="widget">
				<h1 class="widget-title"><?php _e( 'Archives', 'catch-everest' ); ?></h1>
				<ul>
					<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
				</ul>
			</aside>

		<?php
		} // end sidebar widget area ?>

		<?php
		/**
		 * catcheverest_after_widget_ends hook
		 */
		do_action( 'catcheverest_after_widget_ends' ); ?>
	</div><!-- #secondary .widget-area -->

	<?php
	}

/**
 * catcheverest_after_secondary hook
 */
do_action( 'catcheverest_after_secondary' );
