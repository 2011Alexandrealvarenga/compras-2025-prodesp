<?php
/**
 * Theme Customizer.
 *
 * @package Prodesp
 */

/**
 * Retrieve a holder for Customizer options.
 *
 * @since  1.0.0
 * @return array
 */

function Prodesp_get_customizer_options() {
	/**
	 * Filter a holder for Customizer options (for theme/plugin developer customization).
	 *
	 * @since 1.0.0
	 */
	return apply_filters( 'Prodesp-theme/customizer/options' , array(
		'prefix'        => 'Prodesp',
		'path'          => get_theme_file_path( 'framework/modules/customizer/' ),
		'capability'    => 'edit_theme_options',
		'type'          => 'theme_mod',
		'fonts_manager' => new CX_Fonts_Manager(),
		'options'       => array(


			/** `Site Indentity` section */
			'show_tagline' => array(
				'title'    => esc_html__( 'Show tagline on top panel', 'Prodesp' ),
				'section'  => 'title_tagline',
				'priority' => 60,
				'default'  => true,
				'field'    => 'checkbox',
				'type'     => 'control',
			),
			'totop_visibility' => array(
				'title'   => esc_html__( 'Show ToTop button', 'Prodesp' ),
				'section' => 'title_tagline',
				'priority' => 61,
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'page_preloader' => array(
				'title'    => esc_html__( 'Show page preloader', 'Prodesp' ),
				'section'  => 'title_tagline',
				'priority' => 62,
				'default'  => true,
				'field'    => 'checkbox',
				'type'     => 'control',
			),

			/* Booking styles */

			'booking_styles' => array(
				'title'       => esc_html__( 'Booking styles', 'Prodesp' ),
				'priority'    => 40,
				'type'        => 'panel',
			),

			/** `Colors  */

			'mphb_colors_variables' => array(
				'title'       => esc_html__( 'Colors', 'Prodesp' ),
				'priority'    => 25,
				'panel'       => 'booking_styles',
				'type'        => 'section',
			),
			'mphb_bg_accent_color' => array(
			    'title'   => esc_html__( 'Background colors', 'Prodesp' ),
				'description'   => esc_html__( 'Accent', 'Prodesp' ),
				'section' => 'mphb_colors_variables',
				'default' => '#5f45ea',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'mphb_bg_accent_color2' => array(
				'description'   => esc_html__( 'Accent 2', 'Prodesp' ),
				'section' => 'mphb_colors_variables',
				'default' => '#162541',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'mphb_bg_primary_color' => array(
				'description'   => esc_html__( 'Primary', 'Prodesp' ),
				'section' => 'mphb_colors_variables',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'mphb_bg_secondary_color' => array(
				'description'   => esc_html__( 'Secondary', 'Prodesp' ),
				'section' => 'mphb_colors_variables',
				'default' => '#f5f5f5',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'mphb_txt_accent_color' => array(
				'title'   => esc_html__( 'Text color', 'Prodesp' ),
				'description'   => esc_html__( 'Accent', 'Prodesp' ),
				'section' => 'mphb_colors_variables',
				'default' => '#5f45ea',
				'field'   => 'hex_color',
				'type'    => 'control',

			),
			'mphb_txt_accent_color2' => array(
				'description'   => esc_html__( 'Accent 2', 'Prodesp' ),
				'section' => 'mphb_colors_variables',
				'default' => '#5f45ea',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'mphb_txt_primary_color' => array(
				'description'   => esc_html__( 'Primary', 'Prodesp' ),
				'section' => 'mphb_colors_variables',
				'default' => '#7f7d8e',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'mphb_txt_secondary_color' => array(
				'description'   => esc_html__( 'Secondary', 'Prodesp' ),
				'section' => 'mphb_colors_variables',
				'default' => '#b0aebe',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'mphb_txt_secondary_color2' => array(
				'description'   => esc_html__( 'Secondary 2', 'Prodesp' ),
				'section' => 'mphb_colors_variables',
				'default' => '#b0aebe',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'mphb_txt_invert_color' => array(
				'description'   => esc_html__( 'Invert', 'Prodesp' ),
				'section' => 'mphb_colors_variables',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'mphb_link_color' => array(
				'description'   => esc_html__( 'Link', 'Prodesp' ),
				'section' => 'mphb_colors_variables',
				'default' => '#5f45ea',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'mphb_link_hover_color' => array(
				'description'   => esc_html__( 'Link Hover', 'Prodesp' ),
				'section' => 'mphb_colors_variables',
				'default' => '#34314b',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'mphb_button_bg' => array(
				'description'   => esc_html__( 'Button', 'Prodesp' ),
				'section' => 'mphb_colors_variables',
				'default' => '#5f45ea',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'mphb_button_bg_invert' => array(
				'description'   => esc_html__( 'Invert Button', 'Prodesp' ),
				'section' => 'mphb_colors_variables',
				'default' => '#34314b',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Typography  */

			'mphb_typography' => array(
				'title'       => esc_html__( 'Typography', 'Prodesp' ),
				'priority'    => 25,
				'panel'       => 'booking_styles',
				'type'        => 'section',
			),


			/*           Body text                  */


			'mphb_bt_font_family' => array(
				'title'   => esc_html__( 'Body text', 'Prodesp' ),
				'description' => esc_html__( 'Font Family', 'Prodesp' ),
				'section' => 'mphb_typography',
				'default' => 'Open Sans, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'mphb_bt_font_style' => array(
				'description' => esc_html__( 'Font Style', 'Prodesp' ),
				'section' => 'mphb_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => Prodesp_get_font_styles(),
				'type'    => 'control',
			),
			'mphb_bt_font-weight' => array(
				'description' => esc_html__( 'Font Weight', 'Prodesp' ),
				'section' => 'mphb_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => Prodesp_get_font_weight(),
				'type'    => 'control',
			),
			'mphb_bt_font_size' => array(
				'description' => esc_html__( 'Font Size, px', 'Prodesp' ),
				'section'     => 'mphb_typography',
				'default'     => '15',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 120,
					'step' => 1,
				),
				'type' => 'control',
			),
			'mphb_bt_line_height' => array(
				'description' => esc_html__( 'Line Height, em', 'Prodesp' ),
				'section'     => 'mphb_typography',
				'default'     => '1.4',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'mphb_bt_letter_spacing' => array(
				'description' => esc_html__( 'Letter Spacing, px', 'Prodesp' ),
				'section'     => 'mphb_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'mphb_bt_text_transform' => array(
				'description' => esc_html__( 'Text Transform', 'Prodesp' ),
				'section' => 'mphb_typography',
				'default' => 'none',
				'field'   => 'select',
				'choices' => array(
                                'capitalize'     => esc_html__( 'capitalize', 'Prodesp' ),
                                'lowercase' => esc_html__( 'lowercase', 'Prodesp' ),
                                'uppercase' => esc_html__( 'uppercase', 'Prodesp' ),
                                'none' => esc_html__( 'none', 'Prodesp' ),
                            ),
				'type'    => 'control',
			),


			/*           entry title                  */


			'mphb_et_font_family' => array(
				'title'   => esc_html__( 'Entry title', 'Prodesp' ),
				'description' => esc_html__( 'Font Family', 'Prodesp' ),
				'section' => 'mphb_typography',
				'default' => 'Hind, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'mphb_et_font_style' => array(
				'description' => esc_html__( 'Font Style', 'Prodesp' ),
				'section' => 'mphb_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => Prodesp_get_font_styles(),
				'type'    => 'control',
			),
			'mphb_et_font_weight' => array(
				'description' => esc_html__( 'Font Weight', 'Prodesp' ),
				'section' => 'mphb_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => Prodesp_get_font_weight(),
				'type'    => 'control',
			),
			'mphb_et_font_size' => array(
				'description' => esc_html__( 'Font Size, px', 'Prodesp' ),
				'section'     => 'mphb_typography',
				'default'     => '70',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 120,
					'step' => 1,
				),
				'type' => 'control',
			),
			'mphb_et_line_height' => array(
				'description' => esc_html__( 'Line Height, em', 'Prodesp' ),
				'section'     => 'mphb_typography',
				'default'     => '1.1',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'mphb_et_letter_spacing' => array(
				'description' => esc_html__( 'Letter Spacing, px', 'Prodesp' ),
				'section'     => 'mphb_typography',
				'default'     => '-1.4',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'mphb_et_text_transform' => array(
				'description' => esc_html__( 'Text Transform', 'Prodesp' ),
				'section' => 'mphb_typography',
				'default' => 'uppercase',
				'field'   => 'select',
				'choices' => array(
                                'capitalize'     => esc_html__( 'capitalize', 'Prodesp' ),
                                'lowercase' => esc_html__( 'lowercase', 'Prodesp' ),
                                'uppercase' => esc_html__( 'uppercase', 'Prodesp' ),
                                'none' => esc_html__( 'none', 'Prodesp' ),
                            ),
				'type'    => 'control',
			),


			/*           title                  */


			'mphb_title_font_family' => array(
				'title'   => esc_html__( 'Title', 'Prodesp' ),
				'description' => esc_html__( 'Font Family', 'Prodesp' ),
				'section' => 'mphb_typography',
				'default' => 'Hind, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'mphb_title_font_style' => array(
				'description' => esc_html__( 'Font Style', 'Prodesp' ),
				'section' => 'mphb_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => Prodesp_get_font_styles(),
				'type'    => 'control',
			),
			'mphb_title_font_weight' => array(
				'description' => esc_html__( 'Font Weight', 'Prodesp' ),
				'section' => 'mphb_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => Prodesp_get_font_weight(),
				'type'    => 'control',
			),
			'mphb_title_font_size' => array(
				'description' => esc_html__( 'Font Size, px', 'Prodesp' ),
				'section'     => 'mphb_typography',
				'default'     => '30',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 120,
					'step' => 1,
				),
				'type' => 'control',
			),
			'mphb_title_line_height' => array(
				'description' => esc_html__( 'Line Height, em', 'Prodesp' ),
				'section'     => 'mphb_typography',
				'default'     => '1.1',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'mphb_title_letter_spacing' => array(
				'description' => esc_html__( 'Letter Spacing, px', 'Prodesp' ),
				'section'     => 'mphb_typography',
				'default'     => '-0.6',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'mphb_title_text_transform' => array(
				'description' => esc_html__( 'Text Transform', 'Prodesp' ),
				'section' => 'mphb_typography',
				'default' => 'uppercase',
				'field'   => 'select',
				'choices' => array(
                                'capitalize'     => esc_html__( 'capitalize', 'Prodesp' ),
                                'lowercase' => esc_html__( 'lowercase', 'Prodesp' ),
                                'uppercase' => esc_html__( 'uppercase', 'Prodesp' ),
                                'none' => esc_html__( 'none', 'Prodesp' ),
                            ),
				'type'    => 'control',
			),


			/*           subtitle                  */


			'mphb_st_font_family' => array(
				'title'   => esc_html__( 'Subtitle', 'Prodesp' ),
				'description' => esc_html__( 'Font Family', 'Prodesp' ),
				'section' => 'mphb_typography',
				'default' => 'Open Sans, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'mphb_st_font_style' => array(
				'description' => esc_html__( 'Font Style', 'Prodesp' ),
				'section' => 'mphb_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => Prodesp_get_font_styles(),
				'type'    => 'control',
			),
			'mphb_st_font_weight' => array(
				'description' => esc_html__( 'Font Weight', 'Prodesp' ),
				'section' => 'mphb_typography',
				'default' => '900',
				'field'   => 'select',
				'choices' => Prodesp_get_font_weight(),
				'type'    => 'control',
			),
			'mphb_st_font_size' => array(
				'description' => esc_html__( 'Font Size, px', 'Prodesp' ),
				'section'     => 'mphb_typography',
				'default'     => '12',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 120,
					'step' => 1,
				),
				'type' => 'control',
			),
			'mphb_st_line_height' => array(
				'description' => esc_html__( 'Line Height, em', 'Prodesp' ),
				'section'     => 'mphb_typography',
				'default'     => '1.667',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'mphb_st_letter_spacing' => array(
				'description' => esc_html__( 'Letter Spacing, px', 'Prodesp' ),
				'section'     => 'mphb_typography',
				'default'     => '0.96',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'mphb_st_text_transform' => array(
				'description' => esc_html__( 'Text Transform', 'Prodesp' ),
				'section' => 'mphb_typography',
				'default' => 'uppercase',
				'field'   => 'select',
				'choices' => array(
                                'capitalize'     => esc_html__( 'capitalize', 'Prodesp' ),
                                'lowercase' => esc_html__( 'lowercase', 'Prodesp' ),
                                'uppercase' => esc_html__( 'uppercase', 'Prodesp' ),
                                'none' => esc_html__( 'none', 'Prodesp' ),
                            ),
				'type'    => 'control',
			),


			/*           price                  */


			'mphb_price_font_family' => array(
				'title'   => esc_html__( 'Price', 'Prodesp' ),
				'description' => esc_html__( 'Font Family', 'Prodesp' ),
				'section' => 'mphb_typography',
				'default' => 'Hind, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'mphb_price_font_style' => array(
				'description' => esc_html__( 'Font Style', 'Prodesp' ),
				'section' => 'mphb_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => Prodesp_get_font_styles(),
				'type'    => 'control',
			),
			'mphb_price_font_weight' => array(
				'description' => esc_html__( 'Font Weight', 'Prodesp' ),
				'section' => 'mphb_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => Prodesp_get_font_weight(),
				'type'    => 'control',
			),
			'mphb_price_font_size' => array(
				'description' => esc_html__( 'Font Size, px', 'Prodesp' ),
				'section'     => 'mphb_typography',
				'default'     => '15',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 120,
					'step' => 1,
				),
				'type' => 'control',
			),
			'mphb_price_line_height' => array(
				'description' => esc_html__( 'Line Height, em', 'Prodesp' ),
				'section'     => 'mphb_typography',
				'default'     => '1.2667',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),

/*



----------- End Booking Styles -------------------------------------------------------------




 */
			'general_settings' => array(
				'title'       => esc_html__( 'General Site settings', 'Prodesp' ),
				'priority'    => 40,
				'type'        => 'panel',
			),

			/** `Favicon` section */
			'favicon' => array(
				'title'       => esc_html__( 'Favicon', 'Prodesp' ),
				'priority'    => 25,
				'panel'       => 'general_settings',
				'type'        => 'section',
			),

			/** `Breadcrumbs` section */
			'breadcrumbs' => array(
				'title'    => esc_html__( 'Breadcrumbs', 'Prodesp' ),
				'priority' => 30,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'breadcrumbs_visibillity' => array(
				'title'   => esc_html__( 'Enable Breadcrumbs', 'Prodesp' ),
				'section' => 'breadcrumbs',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'breadcrumbs_front_visibillity' => array(
				'title'   => esc_html__( 'Enable Breadcrumbs on front page', 'Prodesp' ),
				'section' => 'breadcrumbs',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'breadcrumbs_page_title' => array(
				'title'   => esc_html__( 'Enable page title in breadcrumbs area', 'Prodesp' ),
				'section' => 'breadcrumbs',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'breadcrumbs_path_type' => array(
				'title'   => esc_html__( 'Show full/minified path', 'Prodesp' ),
				'section' => 'breadcrumbs',
				'default' => 'minified',
				'field'   => 'select',
				'choices' => array(
					'full'     => esc_html__( 'Full', 'Prodesp' ),
					'minified' => esc_html__( 'Minified', 'Prodesp' ),
				),
				'type'    => 'control',
			),

			/** `Social links` section */
			'social_links' => array(
				'title'    => esc_html__( 'Social links', 'Prodesp' ),
				'priority' => 50,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'header_social_links' => array(
				'title'   => esc_html__( 'Show social links in header', 'Prodesp' ),
				'section' => 'social_links',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'footer_social_links' => array(
				'title'   => esc_html__( 'Show social links in footer', 'Prodesp' ),
				'section' => 'social_links',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Page Layout` section */
			'page_layout' => array(
				'title'    => esc_html__( 'Page Layout', 'Prodesp' ),
				'priority' => 55,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'container_type' => array(
				'title'   => esc_html__( 'Container type', 'Prodesp' ),
				'section' => 'page_layout',
				'default' => 'fullwidth',
				'field'   => 'select',
				'choices' => array(
					'boxed'     => esc_html__( 'Boxed', 'Prodesp' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'Prodesp' ),
				),
				'type' => 'control',
			),
			'sidebar_width' => array(
				'title'   => esc_html__( 'Sidebar width', 'Prodesp' ),
				'section' => 'page_layout',
				'default' => '1/3',
				'field'   => 'select',
				'choices' => array(
					'1/3' => '1/3',
					'1/4' => '1/4',
				),
				'sanitize_callback' => 'sanitize_text_field',
				'type'              => 'control',
			),

			/** `Color Scheme` panel */
			'color_scheme' => array(
				'title'       => esc_html__( 'Color Scheme', 'Prodesp' ),
				'description' => esc_html__( 'Configure Color Scheme', 'Prodesp' ),
				'priority'    => 40,
				'type'        => 'section',
			),
			'accent_color' => array(
				'title'   => esc_html__( 'Accent color', 'Prodesp' ),
				'section' => 'color_scheme',
				'default' => '#5f45ea',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'primary_text_color' => array(
				'title'   => esc_html__( 'Primary Text color', 'Prodesp' ),
				'section' => 'color_scheme',
				'default' => '#7f7d8e',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'secondary_text_color' => array(
				'title'   => esc_html__( 'Secondary Text color', 'Prodesp' ),
				'section' => 'color_scheme',
				'default' => '#b0aebe',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_text_color' => array(
				'title'   => esc_html__( 'Invert Text color', 'Prodesp' ),
				'section' => 'color_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'link_color' => array(
				'title'   => esc_html__( 'Link color', 'Prodesp' ),
				'section' => 'color_scheme',
				'default' => '#5f45ea',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'link_hover_color' => array(
				'title'   => esc_html__( 'Link hover color', 'Prodesp' ),
				'section' => 'color_scheme',
				'default' => '#34314b',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'h1_color' => array(
				'title'   => esc_html__( 'H1 color', 'Prodesp' ),
				'section' => 'color_scheme',
				'default' => '#34314b',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'h2_color' => array(
				'title'   => esc_html__( 'H2 color', 'Prodesp' ),
				'section' => 'color_scheme',
				'default' => '#34314b',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'h3_color' => array(
				'title'   => esc_html__( 'H3 color', 'Prodesp' ),
				'section' => 'color_scheme',
				'default' => '#34314b',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'h4_color' => array(
				'title'   => esc_html__( 'H4 color', 'Prodesp' ),
				'section' => 'color_scheme',
				'default' => '#34314b',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'h5_color' => array(
				'title'   => esc_html__( 'H5 color', 'Prodesp' ),
				'section' => 'color_scheme',
				'default' => '#34314b',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'h6_color' => array(
				'title'   => esc_html__( 'H6 color', 'Prodesp' ),
				'section' => 'color_scheme',
				'default' => '#34314b',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Typography Settings` panel */
			'typography' => array(
				'title'       => esc_html__( 'Typography', 'Prodesp' ),
				'description' => esc_html__( 'Configure typography settings', 'Prodesp' ),
				'priority'    => 45,
				'type'        => 'panel',
			),

			/** `Body text` section */
			'body_typography' => array(
				'title'       => esc_html__( 'Body text', 'Prodesp' ),
				'priority'    => 5,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'body_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'Prodesp' ),
				'section' => 'body_typography',
				'default' => 'Open Sans, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'body_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'Prodesp' ),
				'section' => 'body_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => Prodesp_get_font_styles(),
				'type'    => 'control',
			),
			'body_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'Prodesp' ),
				'section' => 'body_typography',
				'default' => '300',
				'field'   => 'select',
				'choices' => Prodesp_get_font_weight(),
				'type'    => 'control',
			),
			'body_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'Prodesp' ),
				'section'     => 'body_typography',
				'default'     => '14',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type' => 'control',
			),
			'body_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'Prodesp' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'Prodesp' ),
				'section'     => 'body_typography',
				'default'     => '1.6',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'body_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'Prodesp' ),
				'section'     => 'body_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'body_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'Prodesp' ),
				'section' => 'body_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => Prodesp_get_character_sets(),
				'type'    => 'control',
			),
			'body_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'Prodesp' ),
				'section' => 'body_typography',
				'default' => 'left',
				'field'   => 'select',
				'choices' => Prodesp_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H1 Heading` section */
			'h1_typography' => array(
				'title'       => esc_html__( 'H1 Heading', 'Prodesp' ),
				'priority'    => 10,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h1_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'Prodesp' ),
				'section' => 'h1_typography',
				'default' => 'Hind, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h1_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'Prodesp' ),
				'section' => 'h1_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => Prodesp_get_font_styles(),
				'type'    => 'control',
			),
			'h1_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'Prodesp' ),
				'section' => 'h1_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => Prodesp_get_font_weight(),
				'type'    => 'control',
			),
			'h1_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'Prodesp' ),
				'section'     => 'h1_typography',
				'default'     => '56',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h1_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'Prodesp' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'Prodesp' ),
				'section'     => 'h1_typography',
				'default'     => '1.4',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h1_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'Prodesp' ),
				'section'     => 'h1_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h1_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'Prodesp' ),
				'section' => 'h1_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => Prodesp_get_character_sets(),
				'type'    => 'control',
			),
			'h1_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'Prodesp' ),
				'section' => 'h1_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => Prodesp_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H2 Heading` section */
			'h2_typography' => array(
				'title'       => esc_html__( 'H2 Heading', 'Prodesp' ),
				'priority'    => 15,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h2_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'Prodesp' ),
				'section' => 'h2_typography',
				'default' => 'Hind, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h2_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'Prodesp' ),
				'section' => 'h2_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => Prodesp_get_font_styles(),
				'type'    => 'control',
			),
			'h2_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'Prodesp' ),
				'section' => 'h2_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => Prodesp_get_font_weight(),
				'type'    => 'control',
			),
			'h2_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'Prodesp' ),
				'section'     => 'h2_typography',
				'default'     => '40',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h2_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'Prodesp' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'Prodesp' ),
				'section'     => 'h2_typography',
				'default'     => '1.4',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h2_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'Prodesp' ),
				'section'     => 'h2_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h2_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'Prodesp' ),
				'section' => 'h2_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => Prodesp_get_character_sets(),
				'type'    => 'control',
			),
			'h2_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'Prodesp' ),
				'section' => 'h2_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => Prodesp_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H3 Heading` section */
			'h3_typography' => array(
				'title'       => esc_html__( 'H3 Heading', 'Prodesp' ),
				'priority'    => 20,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h3_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'Prodesp' ),
				'section' => 'h3_typography',
				'default' => 'Hind, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h3_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'Prodesp' ),
				'section' => 'h3_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => Prodesp_get_font_styles(),
				'type'    => 'control',
			),
			'h3_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'Prodesp' ),
				'section' => 'h3_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => Prodesp_get_font_weight(),
				'type'    => 'control',
			),
			'h3_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'Prodesp' ),
				'section'     => 'h3_typography',
				'default'     => '28',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h3_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'Prodesp' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'Prodesp' ),
				'section'     => 'h3_typography',
				'default'     => '1.4',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h3_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'Prodesp' ),
				'section'     => 'h3_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h3_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'Prodesp' ),
				'section' => 'h3_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => Prodesp_get_character_sets(),
				'type'    => 'control',
			),
			'h3_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'Prodesp' ),
				'section' => 'h3_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => Prodesp_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H4 Heading` section */
			'h4_typography' => array(
				'title'       => esc_html__( 'H4 Heading', 'Prodesp' ),
				'priority'    => 25,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h4_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'Prodesp' ),
				'section' => 'h4_typography',
				'default' => 'Hind, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h4_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'Prodesp' ),
				'section' => 'h4_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => Prodesp_get_font_styles(),
				'type'    => 'control',
			),
			'h4_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'Prodesp' ),
				'section' => 'h4_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => Prodesp_get_font_weight(),
				'type'    => 'control',
			),
			'h4_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'Prodesp' ),
				'section'     => 'h4_typography',
				'default'     => '20',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h4_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'Prodesp' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'Prodesp' ),
				'section'     => 'h4_typography',
				'default'     => '1.5',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h4_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'Prodesp' ),
				'section'     => 'h4_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h4_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'Prodesp' ),
				'section' => 'h4_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => Prodesp_get_character_sets(),
				'type'    => 'control',
			),
			'h4_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'Prodesp' ),
				'section' => 'h4_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => Prodesp_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H5 Heading` section */
			'h5_typography' => array(
				'title'       => esc_html__( 'H5 Heading', 'Prodesp' ),
				'priority'    => 30,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h5_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'Prodesp' ),
				'section' => 'h5_typography',
				'default' => 'Hind, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h5_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'Prodesp' ),
				'section' => 'h5_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => Prodesp_get_font_styles(),
				'type'    => 'control',
			),
			'h5_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'Prodesp' ),
				'section' => 'h5_typography',
				'default' => '300',
				'field'   => 'select',
				'choices' => Prodesp_get_font_weight(),
				'type'    => 'control',
			),
			'h5_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'Prodesp' ),
				'section'     => 'h5_typography',
				'default'     => '18',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h5_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'Prodesp' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'Prodesp' ),
				'section'     => 'h5_typography',
				'default'     => '1.5',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h5_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'Prodesp' ),
				'section'     => 'h5_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h5_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'Prodesp' ),
				'section' => 'h5_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => Prodesp_get_character_sets(),
				'type'    => 'control',
			),
			'h5_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'Prodesp' ),
				'section' => 'h5_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => Prodesp_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H6 Heading` section */
			'h6_typography' => array(
				'title'       => esc_html__( 'H6 Heading', 'Prodesp' ),
				'priority'    => 35,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h6_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'Prodesp' ),
				'section' => 'h6_typography',
				'default' => 'Hind, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h6_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'Prodesp' ),
				'section' => 'h6_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => Prodesp_get_font_styles(),
				'type'    => 'control',
			),
			'h6_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'Prodesp' ),
				'section' => 'h6_typography',
				'default' => '500',
				'field'   => 'select',
				'choices' => Prodesp_get_font_weight(),
				'type'    => 'control',
			),
			'h6_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'Prodesp' ),
				'section'     => 'h6_typography',
				'default'     => '14',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h6_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'Prodesp' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'Prodesp' ),
				'section'     => 'h6_typography',
				'default'     => '1.5',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h6_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'Prodesp' ),
				'section'     => 'h6_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h6_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'Prodesp' ),
				'section' => 'h6_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => Prodesp_get_character_sets(),
				'type'    => 'control',
			),
			'h6_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'Prodesp' ),
				'section' => 'h6_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => Prodesp_get_text_aligns(),
				'type'    => 'control',
			),

			/** `Logo text` section */
			'logo_typography' => array(
				'title'       => esc_html__( 'Logo text', 'Prodesp' ),
				'priority'    => 40,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'header_logo_font_family' => array(
				'title'           => esc_html__( 'Font Family', 'Prodesp' ),
				'section'         => 'logo_typography',
				'default'         => 'Montserrat, sans-serif',
				'field'           => 'fonts',
				'type'            => 'control',
			),
			'header_logo_font_style' => array(
				'title'           => esc_html__( 'Font Style', 'Prodesp' ),
				'section'         => 'logo_typography',
				'default'         => 'normal',
				'field'           => 'select',
				'choices'         => Prodesp_get_font_styles(),
				'type'            => 'control',
			),
			'header_logo_font_weight' => array(
				'title'           => esc_html__( 'Font Weight', 'Prodesp' ),
				'section'         => 'logo_typography',
				'default'         => '700',
				'field'           => 'select',
				'choices'         => Prodesp_get_font_weight(),
				'type'            => 'control',
			),
			'header_logo_font_size' => array(
				'title'           => esc_html__( 'Font Size, px', 'Prodesp' ),
				'section'         => 'logo_typography',
				'default'         => '26',
				'field'           => 'number',
				'input_attrs'     => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type'            => 'control',
			),
			'header_logo_character_set' => array(
				'title'           => esc_html__( 'Character Set', 'Prodesp' ),
				'section'         => 'logo_typography',
				'default'         => 'latin',
				'field'           => 'select',
				'choices'         => Prodesp_get_character_sets(),
				'type'            => 'control',
			),

			/** `Menu` section */
			'menu_typography' => array(
				'title'       => esc_html__( 'Menu', 'Prodesp' ),
				'priority'    => 45,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'menu_font_family' => array(
				'title'           => esc_html__( 'Font Family', 'Prodesp' ),
				'section'         => 'menu_typography',
				'default'         => 'Hind, sans-serif',
				'field'           => 'fonts',
				'type'            => 'control',
			),
			'menu_font_style' => array(
				'title'           => esc_html__( 'Font Style', 'Prodesp' ),
				'section'         => 'menu_typography',
				'default'         => 'normal',
				'field'           => 'select',
				'choices'         => Prodesp_get_font_styles(),
				'type'            => 'control',
			),
			'menu_font_weight' => array(
				'title'           => esc_html__( 'Font Weight', 'Prodesp' ),
				'section'         => 'menu_typography',
				'default'         => '400',
				'field'           => 'select',
				'choices'         => Prodesp_get_font_weight(),
				'type'            => 'control',
			),
			'menu_font_size' => array(
				'title'           => esc_html__( 'Font Size, px', 'Prodesp' ),
				'section'         => 'menu_typography',
				'default'         => '14',
				'field'           => 'number',
				'input_attrs'     => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type'            => 'control',
			),
			'menu_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'Prodesp' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'Prodesp' ),
				'section'     => 'menu_typography',
				'default'     => '1.4',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'menu_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'Prodesp' ),
				'section'     => 'menu_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'menu_character_set' => array(
				'title'           => esc_html__( 'Character Set', 'Prodesp' ),
				'section'         => 'menu_typography',
				'default'         => 'latin',
				'field'           => 'select',
				'choices'         => Prodesp_get_character_sets(),
				'type'            => 'control',
			),

			/** `Breadcrumbs` section */
			'breadcrumbs_typography' => array(
				'title'       => esc_html__( 'Breadcrumbs', 'Prodesp' ),
				'priority'    => 50,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'breadcrumbs_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'Prodesp' ),
				'section' => 'breadcrumbs_typography',
				'default' => 'Open Sans, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'breadcrumbs_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'Prodesp' ),
				'section' => 'breadcrumbs_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => Prodesp_get_font_styles(),
				'type'    => 'control',
			),
			'breadcrumbs_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'Prodesp' ),
				'section' => 'breadcrumbs_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => Prodesp_get_font_weight(),
				'type'    => 'control',
			),
			'breadcrumbs_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'Prodesp' ),
				'section'     => 'breadcrumbs_typography',
				'default'     => '11',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type' => 'control',
			),
			'breadcrumbs_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'Prodesp' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'Prodesp' ),
				'section'     => 'breadcrumbs_typography',
				'default'     => '1.5',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'breadcrumbs_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'Prodesp' ),
				'section'     => 'breadcrumbs_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'breadcrumbs_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'Prodesp' ),
				'section' => 'breadcrumbs_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => Prodesp_get_character_sets(),
				'type'    => 'control',
			),
			/** `Button` section */
			'button_typography' => array(
				'title'       => esc_html__( 'Button', 'Prodesp' ),
				'priority'    => 55,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'button_font_family' => array(
				'title'           => esc_html__( 'Font Family', 'Prodesp' ),
				'section'         => 'button_typography',
				'default'         => 'Hind, sans-serif',
				'field'           => 'fonts',
				'type'            => 'control',
			),
			'button_font_style' => array(
				'title'           => esc_html__( 'Font Style', 'Prodesp' ),
				'section'         => 'button_typography',
				'default'         => 'normal',
				'field'           => 'select',
				'choices'         => Prodesp_get_font_styles(),
				'type'            => 'control',
			),
			'button_font_weight' => array(
				'title'           => esc_html__( 'Font Weight', 'Prodesp' ),
				'section'         => 'button_typography',
				'default'         => '900',
				'field'           => 'select',
				'choices'         => Prodesp_get_font_weight(),
				'type'            => 'control',
			),
			'button_font_size' => array(
				'title'           => esc_html__( 'Font Size, px', 'Prodesp' ),
				'section'         => 'button_typography',
				'default'         => '11',
				'field'           => 'number',
				'input_attrs'     => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type'            => 'control',
			),
			'button_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'Prodesp' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'Prodesp' ),
				'section'     => 'button_typography',
				'default'     => '1',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'button_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'Prodesp' ),
				'section'     => 'button_typography',
				'default'     => '1',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'button_character_set' => array(
				'title'           => esc_html__( 'Character Set', 'Prodesp' ),
				'section'         => 'button_typography',
				'default'         => 'latin',
				'field'           => 'select',
				'choices'         => Prodesp_get_character_sets(),
				'type'            => 'control',
			),

			/** `Header` panel */
			'header_options' => array(
				'title'       => esc_html__( 'Header', 'Prodesp' ),
				'priority'    => 60,
				'type'        => 'panel',
			),

			/** `Header styles` section */
			'header_styles' => array(
				'title'       => esc_html__( 'Styles', 'Prodesp' ),
				'priority'    => 5,
				'panel'       => 'header_options',
				'type'        => 'section',
			),
			'header_bg_color' => array(
				'title'           => esc_html__( 'Background Color', 'Prodesp' ),
				'section'         => 'header_styles',
				'field'           => 'hex_color',
				'default'         => '#ffffff',
				'type'            => 'control',
			),
			'header_bg_image' => array(
				'title'   => esc_html__( 'Background Image', 'Prodesp' ),
				'section' => 'header_styles',
				'field'   => 'image',
				'type'    => 'control',
			),
			'header_bg_repeat' => array(
				'title'   => esc_html__( 'Background Repeat', 'Prodesp' ),
				'section' => 'header_styles',
				'default' => 'repeat',
				'field'   => 'select',
				'choices' => array(
					'no-repeat'  => esc_html__( 'No Repeat', 'Prodesp' ),
					'repeat'     => esc_html__( 'Tile', 'Prodesp' ),
					'repeat-x'   => esc_html__( 'Tile Horizontally', 'Prodesp' ),
					'repeat-y'   => esc_html__( 'Tile Vertically', 'Prodesp' ),
				),
				'type' => 'control',
			),
			'header_bg_position_x' => array(
				'title'   => esc_html__( 'Background Position', 'Prodesp' ),
				'section' => 'header_styles',
				'default' => 'center',
				'field'   => 'select',
				'choices' => array(
					'left'   => esc_html__( 'Left', 'Prodesp' ),
					'center' => esc_html__( 'Center', 'Prodesp' ),
					'right'  => esc_html__( 'Right', 'Prodesp' ),
				),
				'type' => 'control',
			),
			'header_bg_attachment' => array(
				'title'   => esc_html__( 'Background Attachment', 'Prodesp' ),
				'section' => 'header_styles',
				'default' => 'scroll',
				'field'   => 'select',
				'choices' => array(
					'scroll' => esc_html__( 'Scroll', 'Prodesp' ),
					'fixed'  => esc_html__( 'Fixed', 'Prodesp' ),
				),
				'type' => 'control',
			),

			/** `Top Panel` section */
			'header_top_panel' => array(
				'title'       => esc_html__( 'Top Panel', 'Prodesp' ),
				'priority'    => 10,
				'panel'       => 'header_options',
				'type'        => 'section',
			),
			'top_panel_enable' => array(
				'title'   => esc_html__( 'Enable Top Panel', 'Prodesp' ),
				'section' => 'header_top_panel',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'top_panel_bg' => array(
				'title'   => esc_html__( 'Background color', 'Prodesp' ),
				'section' => 'header_top_panel',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Footer` panel */
			'footer_options' => array(
				'title'    => esc_html__( 'Footer', 'Prodesp' ),
				'priority' => 110,
				'type'     => 'section',
			),

			'footer_copyright' => array(
				'title'   => esc_html__( 'Copyright text', 'Prodesp' ),
				'section' => 'footer_options',
				'default' => Prodesp_get_default_footer_copyright(),
				'field'   => 'textarea',
				'type'    => 'control',
			),

			/** `Blog Settings` panel */
			'blog_settings' => array(
				'title'       => esc_html__( 'Blog Settings', 'Prodesp' ),
				'priority'    => 115,
				'type'        => 'panel',
			),

			/** `Blog` section */
			'blog' => array(
				'title'           => esc_html__( 'Blog', 'Prodesp' ),
				'panel'           => 'blog_settings',
				'priority'        => 10,
				'type'            => 'section',
				//'active_callback' => 'is_home',
			),
			'blog_sidebar_position' => array(
				'title'    => esc_html__( 'Sidebar', 'Prodesp' ),
				'section'  => 'blog',
				'default'  => 'one-right-sidebar',
				'field'    => 'select',
				'priority' => 10,
				'choices' => array(
					'one-left-sidebar'  => esc_html__( 'Sidebar on left side', 'Prodesp' ),
					'one-right-sidebar' => esc_html__( 'Sidebar on right side', 'Prodesp' ),
					'none'              => esc_html__( 'No sidebar', 'Prodesp' ),
				),
				'type' => 'control',
				'active_callback' => 'Prodesp_is_blog_sidebar_enabled',
			),
			'blog_navigation_type' => array(
				'title'   => esc_html__( 'Navigation type', 'Prodesp' ),
				'section' => 'blog',
				'default' => 'navigation',
				'field'   => 'select',
				'choices' => array(
					'navigation' => esc_html__( 'Navigation', 'Prodesp' ),
					'pagination' => esc_html__( 'Pagination', 'Prodesp' ),
				),
				'type' => 'control',
			),
			'blog_sticky_type' => array(
				'title'    => esc_html__( 'Sticky label type', 'Prodesp' ),
				'section'  => 'blog',
				'default'  => 'icon',
				'field'    => 'select',
				'priority' => 15,
				'choices' => array(
					'label' => esc_html__( 'Text Label', 'Prodesp' ),
					'icon'  => esc_html__( 'Font Icon', 'Prodesp' ),
					'both'  => esc_html__( 'Text with Icon', 'Prodesp' ),
				),
				'type' => 'control',
			),
			'blog_sticky_label' => array(
				'title'           => esc_html__( 'Featured Post Label', 'Prodesp' ),
				'description'     => esc_html__( 'Label for sticky post', 'Prodesp' ),
				'section'         => 'blog',
				'default'         => esc_html__( 'Featured', 'Prodesp' ),
				'field'           => 'text',
				'priority'        => 20,
				'active_callback' => 'Prodesp_is_sticky_text',
				'type'            => 'control',
			),
			'blog_post_author' => array(
				'title'    => esc_html__( 'Show post author', 'Prodesp' ),
				'section'  => 'blog',
				'default'  => true,
				'field'    => 'checkbox',
				'priority' => 25,
				'type'     => 'control',
			),
			'blog_post_publish_date' => array(
				'title'    => esc_html__( 'Show publish date', 'Prodesp' ),
				'section'  => 'blog',
				'default'  => true,
				'field'    => 'checkbox',
				'priority' => 30,
				'type'     => 'control',
			),
			'blog_post_categories' => array(
				'title'    => esc_html__( 'Show categories', 'Prodesp' ),
				'section'  => 'blog',
				'default'  => true,
				'field'    => 'checkbox',
				'priority' => 35,
				'type'     => 'control',
			),
			'blog_post_tags' => array(
				'title'    => esc_html__( 'Show tags', 'Prodesp' ),
				'section'  => 'blog',
				'default'  => true,
				'field'    => 'checkbox',
				'priority' => 40,
				'type'     => 'control',
			),
			'blog_post_comments' => array(
				'title'    => esc_html__( 'Show comments', 'Prodesp' ),
				'section'  => 'blog',
				'default'  => true,
				'field'    => 'checkbox',
				'priority' => 45,
				'type'     => 'control',
			),
			'blog_post_excerpt' => array(
				'title'   => esc_html__( 'Show Excerpt', 'Prodesp' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'priority' => 50,
				'type'    => 'control'
			),
			'blog_post_excerpt_words_count' => array(
				'title'       => esc_html__( 'Excerpt Words Count', 'Prodesp' ),
				'section'     => 'blog',
				'default'     => '50',
				'priority'    => 55,
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1,
					'max'  => 100,
					'step' => 1,
				),
				'type' => 'control',
			),
			'blog_read_more_type' => array(
				'title'    => esc_html__( 'Read more button type', 'Prodesp' ),
				'section'  => 'blog',
				'default'  => 'text',
				'field'    => 'select',
				'priority' => 60,
				'choices' => array(
					'text'      => esc_html__( 'Text', 'Prodesp' ),
					'icon'      => esc_html__( 'Icon', 'Prodesp' ),
					'text_icon' => esc_html__( 'Text & Icon', 'Prodesp' ),
					'none'      => esc_html__( 'None', 'Prodesp' ),
				),
				'type'    => 'control',
			),
			'blog_read_more_text' => array(
				'title'           => esc_html__( 'Read more button text', 'Prodesp' ),
				'section'         => 'blog',
				'default'         => esc_html__( 'More', 'Prodesp' ),
				'field'           => 'text',
				'priority'        => 65,
				'type'            => 'control',
				'active_callback' => 'Prodesp_is_blog_read_more_btn_text',
			),

			/** `Post` section */
			'blog_post' => array(
				'title'           => esc_html__( 'Post', 'Prodesp' ),
				'panel'           => 'blog_settings',
				'priority'        => 20,
				'type'            => 'section',
				'active_callback' => 'callback_single',
			),
			'single_sidebar_position' => array(
				'title'   => esc_html__( 'Sidebar', 'Prodesp' ),
				'section' => 'blog_post',
				'default' => 'one-right-sidebar',
				'field'   => 'select',
				'choices' => array(
					'one-left-sidebar'  => esc_html__( 'Sidebar on left side', 'Prodesp' ),
					'one-right-sidebar' => esc_html__( 'Sidebar on right side', 'Prodesp' ),
					'none'              => esc_html__( 'No sidebar', 'Prodesp' ),
				),
				'type' => 'control',
			),
			'single_post_author' => array(
				'title'   => esc_html__( 'Show post author', 'Prodesp' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_publish_date' => array(
				'title'   => esc_html__( 'Show publish date', 'Prodesp' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_categories' => array(
				'title'   => esc_html__( 'Show categories', 'Prodesp' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_tags' => array(
				'title'   => esc_html__( 'Show tags', 'Prodesp' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_comments' => array(
				'title'   => esc_html__( 'Show comments', 'Prodesp' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_author_block' => array(
				'title'   => esc_html__( 'Enable the author block after each post', 'Prodesp' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Related Posts` section */
			'related_posts' => array(
				'title'           => esc_html__( 'Related posts block', 'Prodesp' ),
				'panel'           => 'blog_settings',
				'priority'        => 30,
				'type'            => 'section',
				'active_callback' => 'callback_single',
			),
			'related_posts_visible' => array(
				'title'   => esc_html__( 'Show related posts block', 'Prodesp' ),
				'section' => 'related_posts',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'related_posts_block_title' => array(
				'title'   => esc_html__( 'Related posts block title', 'Prodesp' ),
				'section' => 'related_posts',
				'default' => esc_html__( 'Related Posts', 'Prodesp' ),
				'field'   => 'text',
				'type'    => 'control',
			),
			'related_posts_count' => array(
				'title'   => esc_html__( 'Number of post', 'Prodesp' ),
				'section' => 'related_posts',
				'default' => '4',
				'field'   => 'text',
				'type'    => 'control',
			),
			'related_posts_grid' => array(
				'title'   => esc_html__( 'Layout', 'Prodesp' ),
				'section' => 'related_posts',
				'default' => '2',
				'field'   => 'select',
				'choices' => array(
					'2'        => esc_html__( '2 columns', 'Prodesp' ),
					'3'        => esc_html__( '3 columns', 'Prodesp' ),
					'4'        => esc_html__( '4 columns', 'Prodesp' ),
				),
				'type' => 'control',
			),
			'related_posts_image' => array(
				'title'   => esc_html__( 'Show post image', 'Prodesp' ),
				'section' => 'related_posts',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'related_posts_publish_date' => array(
				'title'   => esc_html__( 'Show post publish date', 'Prodesp' ),
				'section' => 'related_posts',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'related_posts_author' => array(
				'title'   => esc_html__( 'Show post author', 'Prodesp' ),
				'section' => 'related_posts',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'related_posts_title' => array(
				'title'   => esc_html__( 'Show post title', 'Prodesp' ),
				'section' => 'related_posts',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'related_posts_excerpt' => array(
				'title'   => esc_html__( 'Display excerpt', 'Prodesp' ),
				'section' => 'related_posts',
				'default' => false,
				'field'   => 'checkbox',
				'type' => 'control',
			),


			/* 'related_posts_categories' => array(
				'title'   => esc_html__( 'Show post categories', 'Prodesp' ),
				'section' => 'related_posts',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			), */
			/* 'related_posts_tags' => array(
				'title'   => esc_html__( 'Show post tags', 'Prodesp' ),
				'section' => 'related_posts',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			), */
			/* 'related_posts_comment_count' => array(
				'title'   => esc_html__( 'Show post comment count', 'Prodesp' ),
				'section' => 'related_posts',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			), */
	) ) );
}

/**
 * Return true if value of passed setting is not equal with passed value.
 *
 * @param  object $control Parent control.
 * @param  string $setting Setting name to check.
 * @param  string $value   Setting value to compare.
 * @return bool
 */
function Prodesp_is_not_setting( $control, $setting, $value ) {

	if ( $value !== $control->manager->get_setting( $setting )->value() ) {
		return true;
	}

	return false;

}

/**
 * Return true if sticky label type set to text or text with icon.
 *
 * @param  object $control
 * @return bool
 */
function Prodesp_is_sticky_text( $control ) {
	return Prodesp_is_not_setting( $control, 'blog_sticky_type', 'icon' );
}

/**
 * Return true if sticky label type set to icon or text with icon.
 *
 * @param  object $control
 * @return bool
 */
function Prodesp_is_sticky_icon( $control ) {
	return Prodesp_is_not_setting( $control, 'blog_sticky_type', 'label' );
}


/**
 * Move native `site_icon` control (based on WordPress core) into custom section.
 *
 * @since 1.0.0
 * @param  object $wp_customize
 * @return void
 */
function Prodesp_customizer_change_core_controls( $wp_customize ) {
	$wp_customize->get_control( 'site_icon' )->section      = 'Prodesp_favicon';
	$wp_customize->get_control( 'background_color' )->label = esc_html__( 'Body Background Color', 'Prodesp' );
}

// Move native `site_icon` control (based on WordPress core) in custom section.
add_action( 'customize_register', 'Prodesp_customizer_change_core_controls', 20 );

/**
 * Get font styles
 *
 * @since 1.0.0
 * @return array
 */
function Prodesp_get_font_styles() {
	return apply_filters( 'Prodesp-theme/font/styles', array(
		'normal'  => esc_html__( 'Normal', 'Prodesp' ),
		'italic'  => esc_html__( 'Italic', 'Prodesp' ),
		'oblique' => esc_html__( 'Oblique', 'Prodesp' ),
		'inherit' => esc_html__( 'Inherit', 'Prodesp' ),
	) );
}

/**
 * Get character sets
 *
 * @since 1.0.0
 * @return array
 */
function Prodesp_get_character_sets() {
	return apply_filters( 'Prodesp-theme/font/character_sets', array(
		'latin'        => esc_html__( 'Latin', 'Prodesp' ),
		'greek'        => esc_html__( 'Greek', 'Prodesp' ),
		'greek-ext'    => esc_html__( 'Greek Extended', 'Prodesp' ),
		'vietnamese'   => esc_html__( 'Vietnamese', 'Prodesp' ),
		'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'Prodesp' ),
		'latin-ext'    => esc_html__( 'Latin Extended', 'Prodesp' ),
		'cyrillic'     => esc_html__( 'Cyrillic', 'Prodesp' ),
	) );
}

/**
 * Get text aligns
 *
 * @since 1.0.0
 * @return array
 */
function Prodesp_get_text_aligns() {
	return apply_filters( 'Prodesp-theme/font/text-aligns', array(
		'inherit' => esc_html__( 'Inherit', 'Prodesp' ),
		'center'  => esc_html__( 'Center', 'Prodesp' ),
		'justify' => esc_html__( 'Justify', 'Prodesp' ),
		'left'    => esc_html__( 'Left', 'Prodesp' ),
		'right'   => esc_html__( 'Right', 'Prodesp' ),
	) );
}

/**
 * Get font weights
 *
 * @since 1.0.0
 * @return array
 */
function Prodesp_get_font_weight() {
	return apply_filters( 'Prodesp-theme/font/weight', array(
		'100' => '100',
		'200' => '200',
		'300' => '300',
		'400' => '400',
		'500' => '500',
		'600' => '600',
		'700' => '700',
		'800' => '800',
		'900' => '900',
	) );
}

/**
 * Return array of arguments for dynamic CSS module
 *
 * @return array
 */

function Prodesp_get_dynamic_css_options() {
	return apply_filters( 'Prodesp-theme/dynamic_css/options', array(
		'prefix'        => 'Prodesp',
		'type'          => 'theme_mod',
		'parent_handles' => array(
			'css' => 'Prodesp-theme-style',
			'js'  => 'Prodesp-theme-js',
		),
		'css_files'      => array(
			get_theme_file_path( 'assets/css/dynamic.css' ),
			get_theme_file_path( 'assets/css/dynamic/header.css' ),
			get_theme_file_path( 'assets/css/dynamic/menus.css' ),
			get_theme_file_path( 'assets/css/dynamic/social.css' ),
			get_theme_file_path( 'assets/css/dynamic/navigation.css' ),
			get_theme_file_path( 'assets/css/dynamic/buttons.css' ),
			get_theme_file_path( 'assets/css/dynamic/forms.css' ),
			get_theme_file_path( 'assets/css/dynamic/post.css' ),
			get_theme_file_path( 'assets/css/dynamic/page.css' ),
			get_theme_file_path( 'assets/css/dynamic/post-grid.css' ),
			get_theme_file_path( 'assets/css/dynamic/post-justify.css' ),
			get_theme_file_path( 'assets/css/dynamic/post-masonry.css' ),
			get_theme_file_path( 'assets/css/dynamic/widgets.css' ),
			get_theme_file_path( 'assets/css/dynamic/plugins.css' ),
			get_theme_file_path( 'assets/css/dynamic/mphb.css' ),
		),
		'options_cb'     => 'get_theme_mods',
	) );
}

/**
 * Get default footer copyright.
 *
 * @since  1.0.0
 * @return string
 */
function Prodesp_get_default_footer_copyright() {
	return esc_html__( '&copy; %%year%% Prodesp | Multipurpose WP Theme with Elementor Page Builder', 'Prodesp' );
}

/**
 * Return true if blog sidebar enabled.
 *
 * @return bool
 */
function Prodesp_is_blog_sidebar_enabled() {
	return apply_filters( 'Prodesp-theme/customizer/blog-sidebar-enabled', true );
}


/**
 * Return true if option Read More button type is text type. Otherwise - return false.
 *
 * @return bool
 */
function Prodesp_is_blog_read_more_btn_text() {
	$btn_type = Prodesp_Theme()->customizer->get_value( 'blog_read_more_type' );
	return 'text' === $btn_type || 'text_icon' === $btn_type ? true : false;
}
