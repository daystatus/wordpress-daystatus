<?php 
/*
*
*	***** Daystatus *****
*
*	This file initializes all D Core components
*	
*/
// If this file is called directly, abort. //
if ( ! defined( 'WPINC' ) ) {die;} // end if
// Define Our Constants
define('D_CORE_INC',dirname( __FILE__ ).'/assets/inc/');
define('D_CORE_IMG',plugins_url( 'assets/img/', __FILE__ ));
define('D_CORE_CSS',plugins_url( 'assets/css/', __FILE__ ));
define('D_CORE_JS',plugins_url( 'assets/js/', __FILE__ ));
/*
*
*  Register CSS
*
*/
function d_register_core_css(){
wp_enqueue_style('d-core', D_CORE_CSS . 'd-core.css',null,time('s'),'all');
};
add_action( 'wp_enqueue_scripts', 'd_register_core_css' );    
/*
*
*  Register JS/Jquery Ready
*
*/
function d_register_core_js(){
// Register Core Plugin JS	
wp_enqueue_script('d-core', D_CORE_JS . 'd-core.js','jquery',time(),true);
};
add_action( 'wp_enqueue_scripts', 'd_register_core_js' );    
/*
*
*  Includes
*
*/ 
// Load the Functions
if ( file_exists( D_CORE_INC . 'd-core-functions.php' ) ) {
	require_once D_CORE_INC . 'd-core-functions.php';
}     
// Load the ajax Request
if ( file_exists( D_CORE_INC . 'd-ajax-request.php' ) ) {
	require_once D_CORE_INC . 'd-ajax-request.php';
} 
// Load the Shortcodes
if ( file_exists( D_CORE_INC . 'd-shortcodes.php' ) ) {
	require_once D_CORE_INC . 'd-shortcodes.php';
} 
// Load the Dashboard Widgets
if ( file_exists( D_CORE_INC . 'd-dash-widgets.php' ) ) {
	require_once D_CORE_INC . 'd-dash-widgets.php';
} 
// Load the Plugin Options Panel
if ( file_exists( D_CORE_INC . 'd-options-panel.php' ) ) {
	require_once D_CORE_INC . 'd-options-panel.php';
}
// Load the Plugin Options Panel
if ( file_exists( D_CORE_INC . 'd-request.php' ) ) {
  require_once D_CORE_INC . 'd-request.php';
}