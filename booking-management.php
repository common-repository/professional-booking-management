<?php
/*
 Plugin Name: Professional Booking Management
 Plugin URI: http://news.myprobooking.com/wordpress-plugin-setup
 Description: Add service calendar, booking schedule, booking checkout, and members login to your posts or pages. Manage booking services using Professional Booking Management System. For installation instruction visit <a href="http://news.myprobooking.com/wordpress-plugin-setup" target="_blank">Setup Instruction</a>. 
 Version: 1.0.0
 Author: myprobooking
 Author URI: https://www.myprobooking.com
 Text Domain: myprobooking-booking-management
 */

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

define('MPBM_SERVICE_VIEW_URL', "https://admin.myprobooking.com/PluginFrames/Wordpress/booking.aspx");
define('MPBM_SERVICE_HANDLER', "https://admin.myprobooking.com/handlers/wordpresshandler.ashx");

/*Application ID identifying the request is from Wordpress. Public Identifier. */
define('MPBM_APP_UID', "298414fc-cf15-4e7a-b6c8-577e7f87e1bc"); 

register_activation_hook( __FILE__, 'mpbm_member_create_db' );
define('MPBM__PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define('MPBM__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

/**
*create the myprobooking code database for the embedcode
*/
function mpbm_member_create_db() {

	global $wpdb;
  	$version = get_option( 'myprobooking_booking_plugin_version', '0.0.1' );
	$charset_collate = $wpdb->get_charset_collate();
	$table_name = $wpdb->prefix . 'myprobooking';

	$sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		embedcode text NOT NULL,
		embedname varchar(250) NOT NULL,
		embeddescription varchar(500) NOT NULL,
		UNIQUE KEY id (id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
}

require_once (MPBM__PLUGIN_DIR.'/booking-management-common.php');
if (is_admin()){ 
	require_once (MPBM__PLUGIN_DIR.'/booking-management-options.php');
}
if (is_admin()){ 
	require_once (MPBM__PLUGIN_DIR.'/booking-management-buttons.php');
}


add_shortcode('myprobooking-code', 'mpbm_myprobooking_embedcode');

/**
*Return booking management shortcodes
*/
function mpbm_myprobooking_embedcode($atts)
{
	extract( shortcode_atts( array(
	'control' => 'schedule',
	), $atts ) );
	
	$html = " <script type='text/javascript' id='myprobooking_widget' src='https://admin.myprobooking.com/js/IFrameWidget2.js'></script>";
	
	$dictionary = array("login" => "login",
				  "calendar" => "bookingcalendar",
				  "schedule" => "bookingservices",
				  "signup" => "ibookingsignup");
	
	if (array_key_exists($control, $dictionary)) {
		$rows = mpbm_getEmbedCodeInformation($dictionary[$control]);
		if(count($rows) > 0)
		{
			foreach($rows as $row){
				$html .= base64_decode($row->embedcode);
				break;
			}
		}
	 
	}
	
	return $html;
}

add_action( 'wp_enqueue_scripts', 'mpbm_load_scripts' );

/**
 * Add Shortcode JS Script to frontend
 */
function mpbm_load_scripts() {
	wp_enqueue_style( 'mpbm1.6.3ColorBoxStyle', 'https://admin.myprobooking.com/PluginFrames/Wordpress/css/hoverpop.css' );
	wp_enqueue_script( 'mpbm1.0.2_script', 'https://admin.myprobooking.com/js/IFrameWidget2.js', array('jquery'), '1.0.2');
	wp_enqueue_script( 'mpbm1.6.3Colorbox', 'https://admin.myprobooking.com/PluginFrames/Wordpress/js/jquery.hoverwcolorbox.js', array('jquery'), '1.6.3', true);	
}

/**
*Return embedcode information
*/
function mpbm_getEmbedCodeInformation($emedcodename)
{
	global $wpdb;
	$embedcodename = trim($embedcodename);
	$table_name = $wpdb->prefix . 'myprobooking';
	$searchfor = preg_replace("/[^a-zA-Z0-9]+/", "", $emedcodename);
	$sql = "Select * from ". $table_name." where embedname = '".$searchfor."';";
	$res = $wpdb->get_results($sql);
	return $res;
}

/**
* Add footer if user set it to display
*/
function mpbm_footer() {
     
	$options = get_option( 'my_myprobooking_options' );
	$mpbhoverpop = isset( $options['mpbhoverpop']) ? esc_attr( $options['mpbhoverpop']) : '';
	if($mpbhoverpop == '1') print mpbm_outputHoverMenu();
	 
}

add_action('wp_footer', 'mpbm_footer');

?>