<?php
/**
 * Blog layouts module
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! class_exists( 'Prodesp_Blog_Layouts_Module' ) ) {

	/**
	 * Define Prodesp_Blog_Layouts_Module class
	 */
	class Prodesp_Blog_Layouts_Module extends Prodesp_Module_Base {
		/**
		 * properties.
		 */
		private $layout_type;
		private $layout_style;
		private $sidebar_enabled = true;
		private $fullwidth_enabled = true;

		/**
		 * Sidebar list.
		 */
		private $sidebar_list = array (
			'default'          => array( 'default','v2','v3','v4','v5','v6','v8','v10' ),
			'creative'         => array( 'v3','v5','v8' ),
			'grid'             => array( 'v3','v10' ),
			'masonry'          => array( 'v3','v5','v6','v7','v10' ),
			'vertical-justify' => array(),
		);

		/**
		 * Fullwidth list.
		 */
		private $fullwidth_list = array (
			'default'          => array( 'v9' ),
			'grid'             => array( 'v4','v5','v9' ),
			'masonry'          => array( 'v4','v9' ),
			'vertical-justify' => array( 'v4','v5','v6','v9','v10' ),
			'creative'         => array( 'default','v2' )
		);

		/**
		 * Module ID
		 *
		 * @return string
		 */
		public function module_id() {

			return 'blog-layouts';

		}

		/**
		 * Module filters
		 *
		 * @return void
		 */
		public function filters() {

			add_action( 'wp_head', array( $this, 'module_init_properties' ) );
			add_filter( 'Prodesp-theme/customizer/options', array( $this, 'customizer_options' ) );
			add_filter( 'Prodesp-theme/customizer/blog-sidebar-enabled', array( $this, 'customizer_blog_sidebar_enabled' ) );
			add_filter( 'Prodesp-theme/posts/template-part-slug', array( $this, 'apply_layout_template' ) );
			add_filter( 'Prodesp-theme/posts/post-style', array( $this, 'apply_style_template' ) );
			add_filter( 'Prodesp-theme/posts/list-class', array( $this, 'add_list_class' ) );
			add_filter( 'Prodesp-theme/site-content/container-enabled', array( $this, 'disable_site_content_container' ) );

		}

		/**
		 * Init module properties
		 *
		 * @return void
		 */
		public function module_init_properties() {

			$this->layout_type  = Prodesp_Theme()->customizer->get_value( 'blog_layout_type' );
			$this->layout_style = Prodesp_Theme()->customizer->get_value( 'blog_style' );

			if ( isset( $this->sidebar_list[$this->layout_type] ) && $this->is_blog_archive() ) {
				$this->sidebar_enabled = in_array( $this->layout_style, $this->sidebar_list[$this->layout_type] );
			}

			if( ! empty( $this->fullwidth_list[$this->layout_type] ) && $this->is_blog_archive() ) {
				$this->fullwidth_enabled = ! in_array( $this->layout_style, $this->fullwidth_list[$this->layout_type] );
			}

			if ( ! $this->sidebar_enabled ) {
				Prodesp_Theme()->sidebar_position = 'none';
			}

		}

		/**
		 * Apply new blog layout
		 *
		 * @return array
		 */
		public function apply_layout_template( $layout ) {

			$blog_post_template = 'template-parts/grid/content';

			if ( 'default' === $this->layout_type ) {
				$blog_post_template = 'template-parts/default/content';
			}

			if ( 'creative' === $this->layout_type ) {
				$blog_post_template = 'template-parts/creative/content';
			}

			if ( 'vertical-justify' === $this->layout_type ) {
				$blog_post_template = 'template-parts/vertical-justify/content';
			}

			if ( 'masonry' === $this->layout_type ) {
				$blog_post_template = 'template-parts/masonry/content';
			}

			return 'inc/modules/blog-layouts/' . $blog_post_template;

		}

		/**
		 * Apply style template
		 *
		 * @param  string $style Current style template suuffix
		 *
		 * @return [type]        [description]
		 */
		public function apply_style_template( $style ) {

			$blog_layout_style = $this->layout_style;

			if( 'default' === $this->layout_style ) {
				$blog_layout_style = false;
			}

			return $blog_layout_style;

		}

		/**
		 * Add list class
		 *
		 * @param  string   list class
		 *
		 * @return [type]   modified list class
		 */
		public function add_list_class( $list_class ) {

			$list_class .= ' posts-list--' . sanitize_html_class( ! is_search() ? $this->layout_type : 'default' );
			$list_class .= ' list-style-' . sanitize_html_class( $this->layout_style ); 

			return $list_class;

		}

		/**
		 * Add blog related customizer options
		 *
		 * @param  array $options Options list
		 * @return array
		 */
		public function customizer_options( $options ) {

			$new_options = array(
				'blog_layout_type' => array(
					'title'    => esc_html__( 'Layout', 'Prodesp' ),
					'priority' => 1,
					'section'  => 'blog',
					'default'  => 'default',
					'field'    => 'select',
					'choices'  => array(
						'default'          => esc_html__( 'Listing', 'Prodesp' ),
						'grid'             => esc_html__( 'Grid', 'Prodesp' ),
						'masonry'          => esc_html__( 'Masonry', 'Prodesp' ),
						'vertical-justify' => esc_html__( 'Vertical Justify', 'Prodesp' ),
						'creative'         => esc_html__( 'Creative', 'Prodesp' ),
					),
					'type' => 'control',
				),
				'blog_style' => array(
					'title'    => esc_html__( 'Style', 'Prodesp' ),
					'section'  => 'blog',
					'priority' => 2,
					'default'  => 'default',
					'field'    => 'select',
					'choices'  => array(
						'default' => esc_html__( 'Style 1', 'Prodesp' ),
						'v2'      => esc_html__( 'Style 2', 'Prodesp' ),
						'v3'      => esc_html__( 'Style 3', 'Prodesp' ),
						'v4'      => esc_html__( 'Style 4', 'Prodesp' ),
						'v5'      => esc_html__( 'Style 5', 'Prodesp' ),
						'v6'      => esc_html__( 'Style 6', 'Prodesp' ),
						'v7'      => esc_html__( 'Style 7', 'Prodesp' ),
						'v8'      => esc_html__( 'Style 8', 'Prodesp' ),
						'v9'      => esc_html__( 'Style 9', 'Prodesp' ),
						'v10'     => esc_html__( 'Style 10', 'Prodesp' ),
					),
					'type' => 'control',
				),
			);

			$options['options'] = array_merge( $new_options, $options['options'] );

			return $options;

		}

		/**
		 * Check blog archive pages
		 *
		 * @return bool
		 */
		public function is_blog_archive() {

			if ( is_home() || ( is_archive() && ! is_tax() && ! is_post_type_archive() ) ) {
				return true;
			}

			return false;

		}

		/**
		 * Disable site content container
		 *
		 * @return boolean
		 */
		public function disable_site_content_container() {

			return $this->fullwidth_enabled;

		}

		/**
		 * Customizer blog sidebar enabled
		 *
		 * @return boolean
		 */
		public function customizer_blog_sidebar_enabled() {

			return $this->sidebar_enabled;

		}

		/**
		 * Blog layouts styles
		 *
		 * @return void
		 */
		public function enqueue_styles() {

			wp_enqueue_style(
				'blog-layouts-module',
				get_theme_file_uri( 'inc/modules/blog-layouts/assets/css/blog-layouts-module.css' ),
				false,
				Prodesp_Theme()->version()
			);

			if ( is_rtl() ) {
				wp_enqueue_style(
					'blog-layouts-module-rtl',
					get_theme_file_uri( 'inc/modules/blog-layouts/assets/css/rtl.css' ),
					false,
					Prodesp_Theme()->version()
				);
			}

		}

	}

}
