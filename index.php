<?php
/*
Plugin Name: Care Of Haus Support
Description: Easy support mashup for sustainable customer relations.
Plugin URL:
Version: 0.1
Author: Digital United
Author URI: http://www.careofhaus.io
Text Domain: coh_support
*/

if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require __DIR__ . '/vendor/autoload.php';
}

DigitalUnited\Support\DashboardPage::listen_for_action();

if( function_exists( 'register_activation_hook' )) {
 //   register_activation_hook( __FILE__, array('\DigitalUnited\Support\Plugin', 'plugin_activated'));
}
