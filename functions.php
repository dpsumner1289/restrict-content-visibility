<?php 
/*----------------------------------------------------
## Setup plugin after theme
----------------------------------------------------*/

add_action( 'after_setup_theme', 'rc_plugin_setup' );
 
if ( ! function_exists( 'rc_plugin_setup' ) ) {
    function rc_plugin_setup() {
 
        add_action( 'init', 'rc_buttons' );
    }
}

/*----------------------------------------------------
## TinyMCE Buttons
----------------------------------------------------*/

if ( ! function_exists( 'rc_buttons' ) ) {
    function rc_buttons() {
        if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
            return;
        }
        if ( get_user_option( 'rich_editing' ) !== 'true' ) {
            return;
        }
 
        add_filter( 'mce_external_plugins', 'rc_add_tmce_buttons' );
        add_filter( 'mce_buttons', 'rc_register_buttons' );
    }
}
 
if ( ! function_exists( 'rc_add_tmce_buttons' ) ) {
    function rc_add_tmce_buttons( $plugin_array ) {
        $plugin_array['mybutton'] = plugins_url( 'restrict-content-visibility/assets/js/tiny-mce-button.js', dirname(__FILE__) );
        return $plugin_array;
    }
}
 
if ( ! function_exists( 'rc_register_buttons' ) ) {
    function rc_register_buttons( $buttons ) {
        array_push( $buttons, 'mybutton' );
        return $buttons;
    }
}
 
add_action ( 'after_wp_tiny_mce', 'rc_tinymce_extra_vars' );
 
if ( !function_exists( 'rc_tinymce_extra_vars' ) ) {
	function rc_tinymce_extra_vars() { ?>
		<script type="text/javascript">
			var tinyMCE_object = <?php echo json_encode(
				array(
					'button_name' => esc_html__('Add Restrictions', 'restrict-content-visibility'),
					'button_title' => esc_html__('Content Restriction Options', 'restrict-content-visibility'),
					'image_title' => esc_html__('Image', 'restrict-content-visibility'),
					'image_button_title' => esc_html__('Upload image', 'restrict-content-visibility'),
				)
				);
			?>;
		</script><?php
	}
}

/*----------------------------------------------------
## Enqueue scripts and styles
----------------------------------------------------*/
if(is_admin()) {
	function rc_enqueue_assets() {
		// Styles
		wp_enqueue_style( 'rc-main-styles', plugins_url( 'restrict-content-visibility/assets/css/rc_main_styles.css', dirname(__FILE__) ), array(), 'all' );
	}

	add_action('admin_enqueue_scripts', 'rc_enqueue_assets');
}