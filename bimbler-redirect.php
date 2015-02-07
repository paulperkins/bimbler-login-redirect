<?php 
    /*
    Plugin Name: Bimbler Login Redirect
    Plugin URI: http://www.bimblers.com
    Description: Plugin to redirect user on login back to home page.
    Author: Paul Perkins
    Version: 0.1
    Author URI: http://www.bimblers.com
    */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
        die;
} // end if

require_once( plugin_dir_path( __FILE__ ) . 'class-bimbler-redirect.php' );

Bimbler_Redirect::get_instance();
