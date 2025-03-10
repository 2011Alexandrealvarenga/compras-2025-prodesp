<?php
/**
 * Menus configuration.
 *
 * @package Prodesp
 */

add_action( 'after_setup_theme', 'Prodesp_register_menus', 5 );
function Prodesp_register_menus() {

	register_nav_menus( array(
		'main'   => esc_html__( 'Main', 'Prodesp' ),
		'main_mobile_version'   => esc_html__( 'Principal versão celular', 'Prodesp' ),
		'main_hamburguer'   => esc_html__( 'Lateral Hamburguer', 'Prodesp' ),
		'footer' => esc_html__( 'Footer', 'Prodesp' ),
		'social' => esc_html__( 'Social', 'Prodesp' ),
	) );
	
}
