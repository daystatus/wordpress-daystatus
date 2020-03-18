<?php 
/*
*
*	***** Daystatus *****
*
*	Dashboard Widgets
*	
*/
// If this file is called directly, abort. //
if ( ! defined( 'WPINC' ) ) {die;} // end if

// Function that outputs the contents of the dashboard widget
function d_custom_dashboard_widget_function( $post, $callback_args ) {
	echo "WordPress version health check for daystatus.com";
}
// Function used in the action hook
function d_add_dashboard_widgets() {
	wp_add_dashboard_widget('dashboard_widget', 'Daystatus Welcome Screen', 'd_custom_dashboard_widget_function');
}
// Register the new dashboard widget with the 'wp_dashboard_setup' action
add_action('wp_dashboard_setup', 'd_add_dashboard_widgets' );