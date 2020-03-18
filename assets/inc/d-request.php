<?php 
/*
*
*	***** Daystatus *****
*
*	Plugin Request Page
*	
*/
// If this file is called directly, abort. //
if ( ! defined( 'WPINC' ) ) {die;} // end if
class DRequestPage
{
    public function getToken()
    {
        $options = get_option( 'my_option_name' );
        return $options['token'];
    }
}
