<?php
/*
Plugin Name: International 5o5 PL Rankomat
Text Domain: international-5o5-pl-rankomat
Plugin URI: http://iworks.pl/international-5o5-pl-rankomat/
Description:
Version: PLUGIN_VERSION
Author: Marcin Pietrzak
Author URI: http://iworks.pl/
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Copyright 2023-PLUGIN_TILL_YEAR Marcin Pietrzak (marcin@iworks.pl)

this program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * static options
 */
define( 'IWORKS_INTERNATIONAL_5O5_PL_RANKOMAT_VERSION', 'PLUGIN_VERSION' );
define( 'IWORKS_INTERNATIONAL_5O5_PL_RANKOMAT_PREFIX', 'iworks_international-5o5-pl-rankomat_' );
$base   = dirname( __FILE__ );
$vendor = $base . '/includes';

/**
 * require: Iworksinternational-5o5-pl-rankomat Class
 */
if ( ! class_exists( 'iworks_international_5o5_pl_rankomat' ) ) {
	require_once $vendor . '/iworks/class-international-5o5-pl-rankomat.php';
}
/**
 * configuration
 */
require_once $base . '/etc/options.php';
/**
 * require: IworksOptions Class
 */
if ( ! class_exists( 'iworks_options' ) ) {
	require_once $vendor . '/iworks/options/options.php';
}

/**
 * i18n
 */
load_plugin_textdomain( 'international-5o5-pl-rankomat', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );

/**
 * load options
 */
global $iworks_international_5o5_pl_rankomat_options;
$iworks_international_5o5_pl_rankomat_options = new iworks_options();
$iworks_international_5o5_pl_rankomat_options->set_option_function_name( 'iworks_international_5o5_pl_rankomat_options' );
$iworks_international_5o5_pl_rankomat_options->set_option_prefix( IWORKS_INTERNATIONAL_5O5_PL_RANKOMAT_PREFIX );

function iworks_international_5o5_pl_rankomat_get_options() {
	global $iworks_international_5o5_pl_rankomat_options;
	return $iworks_international_5o5_pl_rankomat_options;
}

function iworks_international_5o5_pl_rankomat_options_init() {
	global $iworks_international_5o5_pl_rankomat_options;
	$iworks_international_5o5_pl_rankomat_options->options_init();
}

function iworks_international_5o5_pl_rankomat_activate() {
	$iworks_international_5o5_pl_rankomat_options = new iworks_options();
	$iworks_international_5o5_pl_rankomat_options->set_option_function_name( 'iworks_international_5o5_pl_rankomat_options' );
	$iworks_international_5o5_pl_rankomat_options->set_option_prefix( IWORKS_INTERNATIONAL_5O5_PL_RANKOMAT_PREFIX );
	$iworks_international_5o5_pl_rankomat_options->activate();
}

function iworks_international_5o5_pl_rankomat_deactivate() {
	global $iworks_international_5o5_pl_rankomat_options;
	$iworks_international_5o5_pl_rankomat_options->deactivate();
}

$iworks_international_5o5_pl_rankomat = new iworks_international_5o5_pl_rankomat();

/**
 * install & uninstall
 */
register_activation_hook( __FILE__, 'iworks_international_5o5_pl_rankomat_activate' );
register_deactivation_hook( __FILE__, 'iworks_international_5o5_pl_rankomat_deactivate' );
