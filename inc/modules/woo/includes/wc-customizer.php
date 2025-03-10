<?php
/**
 * WooCommerce customizer options
 *
 * @package Prodesp
 */

if ( ! function_exists( 'Prodesp_set_wc_dynamic_css_options' ) ) {

	/**
	 * Add dynamic WooCommerce styles
	 *
	 * @param $options
	 *
	 * @return mixed
	 */
	function Prodesp_set_wc_dynamic_css_options( $options ) {

		array_push( $options['css_files'], get_theme_file_path( 'inc/modules/woo/assets/css/dynamic/woo-module-dynamic.css' ) );

		return $options;

	}

}
add_filter( 'Prodesp-theme/dynamic_css/options', 'Prodesp_set_wc_dynamic_css_options' );