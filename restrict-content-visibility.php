<?php

/*
Plugin Name: Restrict Content Visibility
Plugin URI: https://buildcreate.com/
Description: Allows content to be hidden/shown based on user roles and permissions
Author: Douglas Sumner @ Build/Create Studios
Author URI:  https://buildcreate.com/
Author Email: doug@buildcreatestudios.com
Version: 1.0
*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

// define version
define( 'HOOKTURN_ITEM_VERSION', '1.0' );

// Define Path
if ( ! defined( 'RC_PATH' ) ) {
	define( 'RC_PATH' , plugin_dir_url( __FILE__ ) );
}

require_once( plugin_dir_path( __FILE__ ) . 'file-funnel.php' );

// function load_rc_scripts() {

// 	/* Styles */
// 	// wp_enqueue_style( 'register_form-style', '/'.RC_PATH.'/styles/register_form.css', array(), null, 'all' );

// 	/* Scripts */
// 	wp_enqueue_script( 'tiny-mce-button-js', '/'.RC_PATH.'/assets/scripts/tiny-mce-button.js', array(), '1.0.0', true );
// }
// add_action( 'wp_enqueue_scripts', 'load_rc_scripts' );

/* Environment: This is the plugin's main PHP file */

// Hook into WordPress's admin_init action hook
add_action('admin_init', 'rc_load_scripts');

function rc_load_scripts() {

    // Enqueue the needed JavaScript
    // wp_enqueue_script( 'tinymce_buttons', get_template_directory_uri().'/assets/js/tinymce_buttons.js');

    /*
    * This is an outside function.
    * It returns a PHP array of the names of site options
    * that are storing keyboard shortcut bindings
    */
    // function roles_array() {
    //     global $wp_roles;
    //      $roles = $wp_roles->get_names();

    //      // Below code will print the all list of roles.
    //      return $roles;
    // }

    // Get site options to create array of currently saved bindings
    // $rolesToList = array();
    // foreach( $get_editable_roles_array as $role ) {
    //     $rolesToList[] = get_option( $name );
    // }

    // 'keys' will contain an array of currently saved bindings
    // $dataToPass = array(
    //     'keys' => $bindingsToPass
    // );

    /* 
    * Actual function to pass PHP to JavaScript. Args: 
    * 1. The target JavaScript file has the handle 'tinymce_buttons' (this is the file we just enqueued)
    * 2. The data will be called 'passedData' by the JS file
    * 3. 'passedData' will contain the data in $dataToPass
    */
    // wp_localize_script( 'tinymce_buttons', 'userRoles', $roles);
}