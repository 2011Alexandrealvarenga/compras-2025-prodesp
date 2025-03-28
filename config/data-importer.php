<?php
add_action( 'init', 'Prodesp_data_importer_config', 9 );

/**
 * Register Jet Data Importer config
 * @return void
 */
function Prodesp_data_importer_config() {

	if ( ! is_admin() ) {
		return;
	}

	if ( ! function_exists( 'jet_data_importer_register_config' ) ) {
		return;
	}

	jet_data_importer_register_config( array(
		'xml' => false,
		'advanced_import' => array(
			'from_path' => 'https://monstroid.zemez.io/wp-content/uploads/static/wizard-skins.json'
		),
		'slider' => array(
			'path' => 'https://raw.githubusercontent.com/JetImpex/wizard-slides/master/slides.json',
		),
		'success-links' => array(
			'home' => array(
				'label'  => esc_html__( 'View your site', 'Prodesp' ),
				'type'   => 'primary',
				'target' => '_self',
				'icon'   => 'dashicons-welcome-view-site',
				'desc'   => esc_html__( 'Take a look at your site', 'Prodesp' ),
				'url'    => home_url( '/' ),
			),
			'edit' => array(
				'label'  => esc_html__( 'Start editing', 'Prodesp' ),
				'type'   => 'primary',
				'target' => '_self',
				'icon'   => 'dashicons-welcome-write-blog',
				'desc'   => esc_html__( 'Proceed to editing pages', 'Prodesp' ),
				'url'    => admin_url( 'edit.php?post_type=page' ),
			),
			'documentation' => array(
				'label'  => esc_html__( 'Check documentation', 'Prodesp' ),
				'type'   => 'primary',
				'target' => '_blank',
				'icon'   => 'dashicons-welcome-learn-more',
				'desc'   => esc_html__( 'Get more info from documentation', 'Prodesp' ),
				'url'    => 'http://documentation.zemez.io/wordpress/index.php?project=Prodesp',
			),
			'knowledge-base' => array(
				'label'  => esc_html__( 'Knowledge Base', 'Prodesp' ),
				'type'   => 'primary',
				'target' => '_blank',
				'icon'   => 'dashicons-sos',
				'desc'   => esc_html__( 'Access the vast knowledge base', 'Prodesp' ),
				'url'    => 'https://zemez.io/wordpress/support/knowledge-base-category/Prodesp/',
			),
			'community' => array(
				'label'  => esc_html__( 'Community', 'Prodesp' ),
				'type'   => 'primary',
				'target' => '_blank',
				'icon'   => 'dashicons-facebook',
				'desc'   => esc_html__( 'Join community to stay tuned to the latest news', 'Prodesp' ),
				'url'    => 'https://www.facebook.com/groups/ZemezJetCommunity/',
			),
		),
		'export' => array(
			'options' => array(
				'woocommerce_default_country',
				'woocommerce_techguide_page_id',
				'woocommerce_shop_page_id',
				'woocommerce_default_catalog_orderby',
				'techguide_catalog_image_size',
				'techguide_single_image_size',
				'techguide_thumbnail_image_size',
				'woocommerce_cart_page_id',
				'woocommerce_checkout_page_id',
				'woocommerce_terms_page_id',
				'tm_woowishlist_page',
				'tm_woocompare_page',
				'tm_woocompare_enable',
				'tm_woocompare_show_in_catalog',
				'tm_woocompare_show_in_single',
				'tm_woocompare_compare_text',
				'tm_woocompare_remove_text',
				'tm_woocompare_page_btn_text',
				'tm_woocompare_show_in_catalog',
				'site_icon',
				'elementor_cpt_support',
				'elementor_disable_color_schemes',
				'elementor_disable_typography_schemes',
				'elementor_container_width',
				'elementor_css_print_method',
				'elementor_global_image_lightbox',
				'jet-elements-settings',
				'jet_menu_options',
				'highlight-and-share',
				'stockticker_defaults',
				'wsl_settings_social_icon_set',
				'jet_woo_builder',
				'booking_styles',
			),
			'tables' => array(
				'revslider_css',
				'revslider_layer_animations',
				'revslider_navigations',
				'revslider_sliders',
				'revslider_slides',
				'revslider_static_slides',
				'mphb_sync_logs',
				'mphb_sync_queue',
				'mphb_sync_stats',
				'mphb_sync_urls',
				'mprm_customer',
				'eg_navigation_skins',
				'eg_item_skins',
				'eg_item_elements',	
				'eg_grids',
			),
		),
	) );
}