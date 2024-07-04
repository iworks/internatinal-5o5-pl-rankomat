<?php
/*

Copyright 2018-PLUGIN_TILL_YEAR Marcin Pietrzak (marcin@iworks.pl)

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

if ( class_exists( 'iworks_international_5o5_pl_rankomat' ) ) {
	return;
}

require_once( dirname( __FILE__ ) . '/class-international-5o5-pl-rankomat-base.php' );

class iworks_international_5o5_pl_rankomat extends iworks_international_5o5_pl_rankomat_base {

	private $capability;

	public function __construct() {
		parent::__construct();
		$this->version    = 'PLUGIN_VERSION';
		/**
		 * admin init
		 */
		add_action( 'admin_init', array( $this, 'admin_init' ) );
		/**
		 * is active?
		 */
		add_filter( 'international-5o5-pl-rankomat/is_active', '__return_true' );
		add_shortcode( 'int505pl_ranking', array( $this, 'shortcode_int505pl_ranking' ) );
	}

	public function shortcode_int505pl_ranking( $atts, $content ) {
		$args = wp_parse_args(
			array(),
			$atts
		);
		d($args);

		return $content;
	}

	public function admin_init() {
		add_filter( 'plugin_row_meta', array( $this, 'plugin_row_meta' ), 10, 2 );
	}

	public function init() {
	}

	/**
	 * Plugin row data
	 */
	public function plugin_row_meta( $links, $file ) {
		if ( $this->dir . '/international-5o5-pl-rankomat.php' == $file ) {
			if ( ! is_multisite() && current_user_can( $this->capability ) ) {
				$links[] = '<a href="admin.php?page=' . $this->dir . '/admin/index.php">' . __( 'Settings' ) . '</a>';
			}
			/* start:free */
			$links[] = '<a href="http://iworks.pl/donate/international-5o5-pl-rankomat.php">' . __( 'Donate' ) . '</a>';
			/* end:free */
		}
		return $links;
	}

}
