<?php
/**
Plugin Name: Simple Cookie Notification Bar
Description: Displays a simple cookie notification bar on the bottom of the page, customizable colours and texts.
Version: 	 1.1
Author: 	 Lucy Tomás
Author URI:  https://wordpress.org/support/profile/lucymtc
License: 	 GPLv2
*/
 
 /* Copyright 2014 Lucy Tomás (email: lucy@wptips.me)
  
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

 // If this file is called directly, exit.
if ( !defined( 'ABSPATH' ) ) exit;

if( !class_exists('SCNB') ) {
	
	/**
	 * Main class
	 * @since   1.0
	 */
	
final class SCNB {

		private static $instance = null;


		/**
		 * vars
		 */	
	
		public $default_options = array();
		public static $options = null;
		
		/**
		 * Instance
		 * This functions returns the only one true instance of the plugin main class
		 * 
		 * @return object instance
		 * @since  1.0
		 */
		
		public static function instance (){
			
			if( self::$instance == null ){
					
				self::$instance = new SCNB;
				self::$instance->constants();
				self::$instance->includes();
				self::$instance->load_textdomain();
				
			}
			
			return self::$instance;
		}
		
		/**
		 * Class Contructor
		 * 
		 * @since 1.0
		 */

		 private function __construct () {
		 
			$this->default_options = array(	
											'more-info-label'     => '',
											'more-info-url'    	  => '',
											'ok-label'  	  	  => __('Accept', 'scnb_domain'),
											'ok-background-color' => '#2f6d94',
											'ok-text-color' 	  => '#fff',
											'background-color' 	  => '#fff',
											'text-color' 	   	  => '#000',
											'message' 	 		  => __('We use our own and third party cookies. If you continue browsing we consider you accept the use of cookies.', 'scnb_domain'),
											'border' 			  => true,
											'border-color' 		  => '#ccc',
											'font-size' 		  => 12
			);

			add_action( 'admin_init', 			 array( 'SCNB_Admin', 'register_settings' ));
			add_action( 'admin_menu', 			 array( 'SCNB_Admin', 'set_settings_link' ));
			add_action( 'admin_enqueue_scripts', array( 'SCNB_Admin', 'enqueue_scripts' ));

			add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), array( 'SCNB_Admin', 'add_action_links') );
			
			
		 }
		 
		
		 /**
		  * includes
		  * 
		  * @since 1.0
		  */
		  
		  private function includes () {
		  	
			require_once( SCNB_PLUGIN_DIR . 'includes/class-cookie.php');
			require_once( SCNB_PLUGIN_DIR . 'includes/class-admin.php');

			SCNB_Main::instance();
			
		 }

		
	     /**
		  * constants
		  * @since 1.0
		  */
		  
		  private function constants() {
		  	
		  	if( !defined('SCNB_PLUGIN_DIR') )  	{ define('SCNB_PLUGIN_DIR', plugin_dir_path( __FILE__ )); }
			if( !defined('SCNB_PLUGIN_URL') )  	{ define('SCNB_PLUGIN_URL', plugin_dir_url( __FILE__ ));  }
			if( !defined('SCNB_PLUGIN_FILE') ) 	{ define('SCNB_PLUGIN_FILE',  __FILE__ );  }
			if( !defined('SCNB_PLUGIN_VERSION') )  { define('SCNB_PLUGIN_VERSION', '1.1');  } 
			
		  }


		 /**
		  * get_options
		  * @since 1.0
		  */
		  
		 public static  function get_options(){
		 	
			if( self::$options == null ) {
			
				$options = get_option( 'scnb_settings' );
				
				if( empty($options) ){
					$options = SCNB::instance()->default_options;
				}
			
				 self::$options = $options;
			}
			
			return self::$options;
			
		 } 
		
		
		/**
		 * load_textdomain
		 * @since 1.0
		 */
		public function load_textdomain() {
			
			load_plugin_textdomain('scnb_domain', false,  dirname( plugin_basename( SCNB_PLUGIN_FILE ) ) . '/languages/' );	
	 	}


	 
		
		
}// class
	
	
}// if !class_exists


SCNB::instance();