<?php
/** 
 * @package    Simple Cookie Notification Bar
 * @subpackage Main class
 * @author     Lucy Tomás - Digiworks
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
		
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ));
		add_action( 'wp_footer', array( $this, 'add_cookiebar') );
		add_action( 'wp_head', array( $this, 'add_dynamic_style') );
	}
	
	/**
	 * add_dynamic_style
	 * @since 1.0
	 */

	function add_dynamic_style(){

		$options = SCNB::get_options();

		?>
			<style type='text/css'>

				#scnb-cookie-bar{
					
					background-color: <?php echo esc_attr( $options['background-color']) ?>;
					color: 			  <?php echo esc_attr( $options['text-color']) ?>;
					font-size: 		  <?php echo esc_attr( $options['font-size']) ?>px;

					<?php if( esc_attr( $options['border-color'] != '' ) )  { ?>
							border-top: 3px solid <?php echo esc_attr( $options['border-color'] ) ?>;
					<?php } ?>
				}

				.scnb-buttons a{
					
					background-color: <?php echo esc_attr( $options['ok-background-color']) ?>;
					color: 			  <?php echo esc_attr( $options['ok-text-color']) ?>;
				}

				<?php if( $options['more-info-url'] != '' ){  ?>

					.scnb-text{
						width: 70%;
					}

					.scnb-buttons{
						width: 	27%;
						margin-left: 3%;
					}

				<?php  } ?>

			</style>
		<?php
	}

	/**
	 * add_cookiebar
	 */
	 
	 public function add_cookiebar (){
	 	
		$options = SCNB::get_options();
		require_once( SCNB_PLUGIN_DIR . 'includes/view-cookie.php');
		
	 }
	 
	 /**
	 * add_cookiebar
	 */
	 
	 public function enqueue_scripts (){
	 	
		wp_enqueue_script( 'scnb-cookiebar-js', SCNB_PLUGIN_URL . 'includes/assets/js/script.js', array('jquery'), SCNB_PLUGIN_VERSION );
		wp_enqueue_style('scnb-cookiebar-css', SCNB_PLUGIN_URL . 'includes/assets/css/style.css', array(), SCNB_PLUGIN_VERSION);;
		
	 }



	
}// class
}// if
	