<?php
/** 
 * This file runs when plugin is uninstalled
 * 
 * @package    Simple Cookie Notification Bar
 * @subpackage uninstall
 * @author     Lucy Tomás
 * @since 	   1.0
 */
 
 // If uninstall not called from WordPress exit
if( !defined( 'WP_UNINSTALL_PLUGIN' ) ) exit ();


delete_option('scnb_settings');