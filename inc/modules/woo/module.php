<?php
/**
 * WooCommerce integration module
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! class_exists( 'Prodesp_Woo_Module' ) ) {

	/**
	 * Define Prodesp_Woo_Module class
	 */
	class Prodesp_Woo_Module extends Prodesp_Module_Base {

		/**
		 * Module ID
		 *
		 * @return string
		 */
		public function module_id() {
			return 'woo';
		}

		/**
		 * Module filters
		 *
		 * @return void
		 */
		public function filters() {

			/**
			 * Disable the default WooCommerce stylesheet.
			 *
			 * Removing the default WooCommerce stylesheet and enqueing your own will
			 * protect you during WooCommerce core updates.
			 *
			 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
			 */
			add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

			add_filter( 'Prodesp-theme/assets-depends/script', array( $this, 'assets_depends_script' ) );

			add_filter( 'Prodesp-theme/customizer/options', array( $this, 'customizer_options' ) );

			add_filter( 'cx_customizer/core_sections', array(  $this, 'Prodesp_customizer_core_sections' ) );
		}

		/**
		 * Add WooCommerce customizer sections
		*/
		public function Prodesp_customizer_core_sections( $sections ) {
			$sections[] = 'woocommerce_settings';
			return $sections;
		}

		/**
		 * Add WooCommerce customizer options
		 *
		 * @param  array $options Options list
		 *
		 * @return array
		 */
		public function customizer_options( $options ) {

			$new_options = array(
				'woocommerce_accent_color' => array(
					'title'    => esc_html__( 'WooCommerce Accent color', 'Prodesp' ),
					'section'  => 'color_scheme',
					'priority' => 10,
					'default'  => '#27d18b',
					'field'    => 'hex_color',
					'type'     => 'control',
				),
				/** `Woocommerce Settings` panel */
				'woocommerce_settings' => array(
					'title'           => esc_html__( 'WooCommerce Options', 'Prodesp' ),
					'priority'        => 200,
					'type'            => 'panel',
				),
				'single_product_layout' => array(
					'title'    => esc_html__( 'Single product layout', 'Prodesp' ),
					'panel'    => 'woocommerce_settings',
					'priority' => 1,
					'type'     => 'section',
				),
				'single_product_container_type' => array(
					'title'   => esc_html__( 'Single product container type', 'Prodesp' ),
					'section' => 'single_product_layout',
					'default' => 'fullwidth',
					'field'   => 'select',
					'choices' => array(
						'boxed'     => esc_html__( 'Boxed', 'Prodesp' ),
						'fullwidth' => esc_html__( 'Fullwidth', 'Prodesp' ),
					),
					'type' => 'control',	 
				),
			);

			$options['options'] = array_merge( $new_options, $options['options'] );

			return $options;

		}

		/**
		 * Include appropriate module files.
		 *
		 * @return void
		 */
		public function includes() {
			require_once get_theme_file_path( 'inc/modules/woo/includes/wc-content-product-functions.php' );
			require_once get_theme_file_path( 'inc/modules/woo/includes/wc-single-product-functions.php' );
			require_once get_theme_file_path( 'inc/modules/woo/includes/wc-archive-product-functions.php' );
			require_once get_theme_file_path( 'inc/modules/woo/includes/wc-customizer.php' );
			require_once get_theme_file_path( 'inc/modules/woo/includes/wc-integration.php' );
		}

		/**
		 * Module condition callback.
		 *
		 * @return bool|callable
		 */
		public function condition_cb() {
			return class_exists( 'WooCommerce' );
		}

		/**
		 * Add module script dependencies
		 *
		 * @param $scripts_depends
		 *
		 * @return int
		 */
		public function assets_depends_script( $scripts_depends ) {
			array_push( $scripts_depends, 'Prodesp-woo-module-script' );

			return $scripts_depends;
		}

		/**
		 * Enqueue module scripts.
		 *
		 * @return void
		 */
		public function enqueue_scripts() {
			// register scripts
			wp_register_script(
				'Prodesp-woo-module-script',
				get_theme_file_uri( 'inc/modules/woo/assets/js/woo-module-script.js' ),
				array( 'jquery' ),
				Prodesp_Theme()->version(),
				true
			);
		}

		/**
		 * Enqueue module styles.
		 *
		 * @return void
		 */
		public function enqueue_styles() {
			$font_path   = WC()->plugin_url() . '/assets/fonts/';
			$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
			}';

			wp_add_inline_style(
				'Prodesp-woocommerce-style',
				$inline_font
			);

			wp_enqueue_style(
				'Prodesp-woocommerce-style',
				get_template_directory_uri() . '/inc/modules/woo/assets/css/woo-module' . ( is_rtl() ? '-rtl' : '' ) . '.css',
				false,
				Prodesp_Theme()->version()
			);

		}

	}

}
