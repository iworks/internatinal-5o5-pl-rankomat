<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function iworks_international_5o5_pl_rankomat_options() {
	$options = array();
	//$parent = SET SOME PAGE;
	/**
	 * main settings
	 */
	$options['index'] = array(
		'version'    => '0.0',
		'page_title' => __( 'Configuration', 'international-5o5-pl-rankomat' ),
		'menu'       => 'options',
		// 'parent' => $parent,
		'options'    => array(),
		'metaboxes'  => array(),
		'pages'      => array(),
	);
	return $options;
}

