<?php
/*
Plugin Name: Gesimatica Polylang switcher block
Description: Plugin to use the polylang switcher language inside a block, enabling the full site editing to use it.
Version:     1
Author:      Carmelo Andres
Author URI:  https://carmeloandres.com
Text Domain: gsmtc-pll
License:     GPLv2 or later
 */

if ( ! defined( 'ABSPATH' ) ) {die;} ; // to prevent direct access

if ( ! defined('GSMTC_PLL_DIR')) define ('GSMTC_PLL_DIR',plugin_dir_path(__FILE__));
if ( ! defined('GSMTC_PLL_URL')) define ('GSMTC_PLL_URL',plugin_dir_url(__FILE__));

require_once(dirname(__FILE__).'/includes/class-gsmtc-pll.php');

$base = new Gsmtc_Pll();



