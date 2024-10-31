<?php

if ( !defined('WP_UNINSTALL_PLUGIN') ) {
    exit();
}

delete_option('myprobooking_livekey');
delete_option('myprobooking_accesskey');

?>