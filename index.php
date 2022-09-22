<?php
/**
 * @package HOT
 * @version 1.13
 */
/*
Plugin Name: pechenki-custom-script
Description: pechenki-custom-script
Author: Pechenki
Version: 0.1
Author URI: https://pechenki.top
*/
//////////////////////////////////
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
define( 'PCS_DIR', plugin_dir_path( __FILE__ ) );
define( 'PCS_DIR_URL',  plugin_dir_url(__FILE__) );
define( 'PCS_DIR_NAME', dirname( plugin_basename( __FILE__ ) ) );



require_once( PCS_DIR . 'autoload.php' );

use pechenki\pcs\src\settings;

$Pcs = new settings();
$Pcs->init();
