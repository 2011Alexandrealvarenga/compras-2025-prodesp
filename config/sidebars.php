<?php
/**
 * Sidebars configuration.
 *
 * @package Prodesp
 */

add_action( 'after_setup_theme', 'Prodesp_register_sidebars', 5 );
function Prodesp_register_sidebars() {

	Prodesp_widget_area()->widgets_settings = apply_filters( 'Prodesp-theme/widget_area/default_settings', array(
		'sidebar' => array(
			'name'           => esc_html__( 'Sidebar', 'Prodesp' ),
			'description'    => '',
			'before_widget'  => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'   => '</aside>',
			'before_title'   => '<h4 class="widget-title">',
			'after_title'    => '</h4>',
			'before_wrapper' => '<div id="%1$s" %2$s role="complementary">',
			'after_wrapper'  => '</div>',
			'is_global'      => true,
		),
		'sidebar-shop' => array(
			'name'           => esc_html__( 'Shop Sidebar', 'Prodesp' ),
			'description'    => '',
			'before_widget'  => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'   => '</aside>',
			'before_title'   => '<h3 class="widget-title">',
			'after_title'    => '</h3>',
			'before_wrapper' => '<div id="%1$s" %2$s role="complementary">',
			'after_wrapper'  => '</div>',
			'is_global'      => true,
		)
	) );
}
