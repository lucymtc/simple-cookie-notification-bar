<?php
/** 
 * @package    Simple Cookie Notification Bar
 * @subpackage Main class
 * @author     Lucy Tomás
 * @since 	   1.0
 */
 
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;


if( !class_exists( 'SCNB_Main' )){
 
class SCNB_Main {
	
	
	private static $instance = null;
	
	/**
	 * Instance
	 * @since 1.0
	 * @return the only true instance
	 */
	public static function instance (){
			
		if( self::$instance == null ){
					
			self::$instance = new SCNB_Main;
			
		}
			
		return self::$instance;
	}
	
	/**
	 * contructor 
	 * @since 1.0
	 */
	
	private function __construct (){

		require_once( SCNB_PLUGIN_DIR . 'includes/custom-style.php');
		
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ));
		add_action( 'wp_footer', array( $this, 'add_cookiebar') );
		add_action( 'scbn_custom_style', array( 'SCNB_Style', 'custom_sytle' ) );
	}
	
	/**
	 * add_dynamic_style
	 * @since 1.0
	 * @deprecated 1.4
	 */

	function add_dynamic_style(){

		 _deprecated_function( 'add_dynamic_style', '1.4', 'SCNB_Style::custom_sytle' );
		 return SCNB_Style::custom_sytle( SCNB::get_options() );

	}

	/**
	 * add_cookiebar
	 */
	 
	 public function add_cookiebar (){
	 	
		$options = SCNB::get_options();


		do_action( 'scbn_custom_style', $options );

		require_once( SCNB_PLUGIN_DIR . 'includes/front-cookiebar.php');
		
	 }
	 
	 /**
	 * add_cookiebar
	 */
	 
	 public function enqueue_scripts (){
	 	
		wp_enqueue_script( 'scnb-cookiebar-js', SCNB_PLUGIN_URL . 'assets/js/script.js', array('jquery'), SCNB_PLUGIN_VERSION );

		wp_localize_script('scnb-cookiebar-js', 'scnb_vars', array(
			'domain_name' => $_SERVER['HTTP_HOST']
		));

		( defined('WP_DEBUG') &&  WP_DEBUG === true ) ? $style = 'style.css' : $style = 'style.min.css';

		wp_enqueue_style('scnb-cookiebar-css', SCNB_PLUGIN_URL . 'assets/css/' . $style, array(), SCNB_PLUGIN_VERSION);
		
	 }



	
}// class
}// if
	