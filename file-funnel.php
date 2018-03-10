<?php
require_once( plugin_dir_path( __FILE__ ) . 'inc/shortcode.php' );

if(is_admin()){
	require_once( plugin_dir_path( __FILE__ ) . 'inc/visual-editor-buttons.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'functions.php' );
}