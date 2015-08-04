<?php
/** 
 * @package    Simple Cookie Notification Bar
 * @subpackage Admin class
 * @author     Lucy Tomás
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
	 		
	 	register_setting('scnb_settings_group', 'scnb_settings', array( 'SCNB_Admin', 'sanitize_options') );
	 	
	 }

	 /**
	  * sanitize_options
	  */

	 public static function sanitize_options( $options ){

	 	$allowed = array(
				    'a' => array(
				        'href' 	=> array(),
				        'title' => array(),
				        'class' => array(),
				        'id' 	=> array(),
					),
				    'br' => array(),
				    'em' => array(),
				    'i' => array(),
				    'strong' => array(),
				    'b' => array()
		);

	 	$options['message'] 		= wp_kses( $options['message'], $allowed );
	 	$options['more-info-label'] = sanitize_text_field( $options['more-info-label'] );
	 	$options['ok-label'] 		= sanitize_text_field( $options['ok-label'] );
	 	$options['more-info-url'] 	= esc_url_raw( $options['more-info-url'] );

	 	$options['font-size'] 		= absint( $options['font-size'] );
	 	$options['text-align'] 		= sanitize_text_field( $options['text-align'] );

	 	( isset( $options['display-shadow'] ) ) ? $options['display-shadow'] = absint( $options['display-shadow'] ) : $options['display-shadow'] = 0;

	 	$options['background-color']	= sanitize_text_field( $options['background-color'] );
	 	$options['text-color']			= sanitize_text_field( $options['text-color'] );
	 	$options['border-color']		= sanitize_text_field( $options['border-color'] );
	 	$options['ok-background-color'] = sanitize_text_field( $options['ok-background-color'] );
	 	$options['button-border-color'] = sanitize_text_field( $options['button-border-color'] );


	 	return $options;

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
			
			wp_enqueue_script( 'scnb-admin-script', SCNB_PLUGIN_URL . 'assets/js/admin.js', array('jquery', 'wp-color-picker'), SCNB_PLUGIN_VERSION );
			wp_enqueue_style('scnb-admin-style', SCNB_PLUGIN_URL . 'assets/css/admin.css', array(), SCNB_PLUGIN_VERSION);
			
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

	/**
	 * save_default_options
	 * runed on activation of the plugin
	 * helps with comatibility with polylang and wpml
	 * @since 1.4
	 */

	public static function save_default_options() {

		$options = get_option( 'scnb_settings' );
		
		if( empty($options) ) {
			$options = SCNB::get_options();
			update_option( 'scnb_settings', $options );
		}

		return;

		

	}

 

	
}// class
}// if


	