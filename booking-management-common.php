<?php 
add_action('admin_menu', 'mpbm_myprobooking_plugin_setup_menu');
if (function_exists('register_deactivation_hook'))
	register_deactivation_hook(__FILE__, 'mpbm_myprobooking_deinstall');

 /**
 * Delete options in database
 */
function mpbm_myprobooking_deinstall() {
	if(get_option("myprobooking_livekey") <> False) delete_option('myprobooking_livekey');
	if(get_option("myprobooking_accesskey") <> False) delete_option('myprobooking_accesskey');
	if(get_option("myprobooking_previewurl") <> False) delete_option('myprobooking_previewurl');
}

/**
* Add the page for backend Booking management
*/
function mpbm_myprobooking_plugin_setup_menu(){
        add_menu_page( 'Booking Management', 'Booking Management', 'manage_options', 'booking_management_plugin', 'mpbm_plugin_init' );
}

/**
* Start the plugin
*/
function mpbm_plugin_init(){
	$livekey = (get_option("myprobooking_livekey") <> False ) ? (base64_decode(get_option("myprobooking_livekey"))) : "";
	$accesskey = (get_option("myprobooking_accesskey") <> False) ? (base64_decode(get_option("myprobooking_accesskey"))) : "";
	$options = get_option( 'my_myprobooking_options' );
	$emailaddress = isset( $options['emailaddress']) ? esc_attr( $options['emailaddress']) : '';
    echo mpbm_outputManagementPage($livekey, $accesskey, $emailaddress);
}

function mpbm_outputHoverMenu()
{
	$res = "";
	if(get_option("myprobooking_previewurl") <> False){
		$previewurl = str_replace("http://", "https://", base64_decode(get_option("myprobooking_previewurl")));
		$servicedir = "https://admin.myprobooking.com/PluginFrames/Wordpress/images/hoverpop";
		$res = "<div class='myprobooking92ie-wrapper'>
		<div class='myprobooking92ie'>
			<ul>
				<li>
					<a href='$previewurl/ibookingsignup' class='mpbmiframe'>
						<div><img src='$servicedir/join-wh1.png' /></div>
						<div>Book</div> 
					</a>
				</li>
				<li>
					<a href='$previewurl/bookingservices' class='mpbmiframe'>
						<div><img src='$servicedir/services-wh1.png' /></div>
						<div>Schedule</div>
					</a>
				</li>
				<li>
					<a href='$previewurl/bookingcalendar' class='mpbmiframe'>
						<div><img src='$servicedir/calendar-wh1.png' /></div>
						<div>Calendar</div>
					</a>
				</li>			
				<li>
					<a href='$previewurl/login' class='mpbm-smiframe'>
						<div><img src='$servicedir/member-wh1.png' /></div>
						<div>Login</div>
					</a>
				</li>
			</ul>
		</div>
		</div>";
	}
	
	return $res;
	
}


/**
* Link to the signup or management page.
* No livekey and accesskey then we out the signup button.
*/
function mpbm_outputManagementPage($livekey, $accesskey, $emailaddress)
{
	$newservicevieweurl = mpbm_getAccessURL($livekey, $accesskey, $emailaddress);
	
	$imagename = "accountbtn.png";
	$pagetitle = "Create Your Account";
	$pageinfo  = "Click on the button below to create your account.";
	$installationinfo = mpbm_installation_info();
	if(get_option("myprobooking_livekey") <> False && get_option("myprobooking_accesskey") <> False)
	{
	
		$imagename = "cpbtn.png";
		$pagetitle = "Booking Management";
		$pageinfo  = "Click on the button below to go to the booking management page.";
		$installationinfo = "";
	}
	
	$resurlfromserviewparse = "<div class='wrap'>
									<h2>$pagetitle</h2>
									<p>$pageinfo</p>
									<p><a href='$newservicevieweurl' target='_blank'><img src='".MPBM__PLUGIN_URL."/images/$imagename'></a></p>
									$installationinfo
								</div>";

	$res = sprintf($resurlfromserviewparse,$newservicevieweurl);
	return $res;
}

function mpbm_installation_info()
{
	return "<div style='margin-top:20px;'>
			<h2>Step by step:</h2>
			<p>More on installation: <a href='http://news.myprobooking.com/wordpress-plugin-setup' target='blank'>Installation Tutorial</a></p>
			<ul>
				<li><h3>1. Click on 'Create Account' button & create your account</h3></li>
				<li><h3>2. Copy and paste plugin password to 'Booking Management' Setting page (Password is auto-generated & emailed to you)</h3></li>
				<li><h3>3. Now you can start using the calendar, service schedule, and login shortcode buttons. Find more info here: <a href='http://news.myprobooking.com/more-on-wordpress' target='_blank'> more info.</a> </h3></li>

			</ul>
			</div>";
}

/**
* append the keys to service url for request.
*/
function mpbm_getAccessURL($livekey, $accesskey, $emailaddress)
{
	if(!empty($livekey) && !empty($accesskey) && !empty($emailaddress))
	{
		$_url = MPBM_SERVICE_VIEW_URL."?lk=%s&ak=%s&username=%s&appuid=%s";	
		$_url = sprintf($_url, $livekey, $accesskey, $emailaddress, MPBM_APP_UID);
	}	
	return !empty($_url) ? $_url : MPBM_SERVICE_VIEW_URL;
}

?>