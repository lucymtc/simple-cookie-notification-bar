<?php
/** 
 * @package    Simple Cookie Notification Bar
 * @subpackage Custom Style
 * @author     Lucy Tomás
 * @since      1.4
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;


if( !class_exists( 'SCNB_Style' )){
 
class SCNB_Style {
 	
	/**
	 * Class contructor
	 * 
	 * @since 1.0
	 */

	private function __construct() {}

    /**
     * Called in wp_head hook from the main plugin file
     *
     * @param string $type 'post_type' being tested
     * @return string
     */
    public static function custom_sytle( $options ) {
        
        $stylesheet = get_stylesheet();

        /* Get the cached style. */
        $style = wp_cache_get( "{$stylesheet}_custom_scbn");

        /* If the style is available, output it and return. */
       /* if ( !empty( $style ) ) {
            echo $style;
            return;
        }*/

        $style = self::get_styles( $options );

        /* Put the final style output together. */
        $style = "\n" . '<style type="text/css" id="custom_scbn_style">' . trim( $style ) . '</style>' . "\n";

        /* Cache the style, so we don't have to process this on each page load. */
        wp_cache_set( "{$stylesheet}_custom_scbn", $style );

        /* Output the custom style. */
        echo $style;
    }

    /**
     * Formats the styles for output.
     *
     * @since  1.0
     * @access protected
     * @return string
     */

    protected static function get_styles( $options ){
       
        $style = '';

         /* colors and font */
        $style .= '#scnb-cookie-bar{';
            $style .= 'background-color: '. esc_attr( $options['background-color']) . ';';
            $style .= 'color: ' . esc_attr( $options['text-color']) . ';';
            $style .= 'font-size: '. esc_attr( $options['font-size']) .'px;';

             /* border */
            if( $options['border-color'] != '' )  { 
              $style .= 'border-top: 3px solid '. esc_attr( $options['border-color'] ) .';';
            }

             /* shadow */
            if( absint( $options['display-shadow'] ) == 1 ) {
              
              $style .= '-webkit-box-shadow: 0 0 5px 2px #CCCCCC;';
              $style .= 'box-shadow: 0 0 5px 2px #CCCCCC;';
            }
        
        $style .= '}';

       
      /* buttons */
        $style .= '.scnb-buttons a{';
           $style .= 'background-color: '. esc_attr( $options['ok-background-color']) .';';
           $style .= 'color: '. esc_attr( $options['ok-text-color']) .';';
           //$style .= 'line-height: '. esc_attr( $options['font-size'] * 2) .'px;';

           if( $options['button-border-color'] != '' )  { 
              $style .= 'border: 2px solid '. esc_attr( $options['button-border-color'] ) .';';
           }

        $style .= '}';

       /* text */
         $style .= '.scnb-text{ text-align: ' . esc_attr( $options['text-align']) . '; }';

        if( $options['more-info-url'] != '' ){ 

           $style .= ' .scnb-text{ width: 70%; } .scnb-buttons{ width:  27%; margin-left: 3%; }';

         }



        return str_replace( array( "\r", "\n", "\t" ), '', $style );

    }

	 
   
}//class
}