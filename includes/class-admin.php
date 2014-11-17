<?php
/** 
 * @package    Simple Cookie Notification Bar
 * @subpackage Admin class
 * @author     Lucy Tomás - Digiworks
 * @since 	   1.0
 */
 
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;


if( !class_exists( 'SCNB_Admin' )){
 
class SCNB_Admin {
	
	/**
	 * contructor 
	 * @since 1.0
	 */
	
	private function __construct (){
		
		
		
	}
	
	/**
	 * register_plugin_settings
	 * @since 1.0
	 */
	 
	 public static function register_settings (){
	 		
	 	register_setting('scnb_settings_group', 'scnb_settings', 'scnb_sanitize_options' );
		
	 }

	 
	 /**
	 * set_settings_link_page
	 * @since 1.0
	 */
	 
	 public static function set_settings_link (){
	 		
	 	add_options_page('Simple Cookie Bar', 'Simple Cookie Bar', 'manage_options', 'scnb-options', array( 'SCNB_Admin' , 'settings_page'));
		
	 }
	 
	/**
	 * settings_page
	 * @since 1.0
	 */
	
	public static function settings_page() {
		
		$options = SCNB::get_options();
		require_once( SCNB_PLUGIN_DIR . 'includes/view-admin.php' );
	
	}
	
	/**
	 * enqueue_scripts
	 * @since 1.0
	 */
	 
	 public static function enqueue_scripts (){
	 	
			wp_enqueue_script('jquery');

			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script( 'wp-color-picker' );
			
			wp_enqueue_script( 'scnb-admin-script', SCNB_PLUGIN_URL . 'includes/assets/js/admin.js', array('jquery', 'wp-color-picker'), SCNB_PLUGIN_VERSION );
			wp_enqueue_style('scnb-admin-style', SCNB_PLUGIN_URL . 'includes/assets/css/admin.css', array(), SCNB_PLUGIN_VERSION);
			
	 }

	 /**
	  * add_action_links
	  * @since 1.0
	  */


	 public static function add_action_links( $links ) {
 
	    $url = get_admin_url(null, 'options-general.php?page=scnb-options');
	 
	    $links[] = '<a href="'. $url .'">Settings</a>';
	    return $links;
	}
 



	
}// class
}// if

function scnb_sanitize_options( $options ){

		foreach( $options as $key => $value ) {
			
			
			switch ($key) {
				
				case 'font-size' :
					$options[$key] = absint( esc_attr( $value ) );
				break;

				case 'message' :
					$options[$key] = sanitize_text_field( $value );
				break;

				case 'more-info-url' :
					$options[$key] = esc_url($value);
				break;

				default:
					$options[$key] = esc_attr($value);
				break;
			}

		
		}

		return $options;

}
	