<?php
add_action( 'init', 'mpbm_myprobookingbtn_buttons' );

 /**
*Add button filters
*/
function mpbm_myprobookingbtn_buttons() {
	add_filter("mce_external_plugins", "mpbm_myprobookingbtn_add_buttons");
    add_filter('mce_buttons', 'mpbm_myprobookingbtn_register_buttons');
}	

/**
*Return the url of button plugin js
*/
function mpbm_myprobookingbtn_add_buttons($plugin_array) {
	$plugin_array['mpbmbtn'] = plugins_url( 'myprobookingbtn-plugin.js', __FILE__ );
	return $plugin_array;
}
/**
*Register the button types
*/
function mpbm_myprobookingbtn_register_buttons($buttons) {
	array_push( $buttons, 'mpbbookingschedulecmd', 'mpbcalendar', 'mpbmemberlogin', 'mpbsignup' );
	return $buttons;
}

?>