<?php

add_action( 'jet-theme-core/register-config', 'Prodesp_core_config' );

function Prodesp_core_config( $manager ) {
	$manager->register_config(
		array(
			'dashboard_page_name' => esc_html__( 'Prodesp', 'Prodesp' ),
			'menu_icon'           => 'dashicons-admin-generic',
			'api'                 => array(
				'enabled'   => true,
				'base'      => 'https://monstroid.zemez.io/',
				'path'      => 'wp-json/croco/v1',
				'id'        => 9,
				'endpoints' => array(
					'templates'  => '/templates/',
					'keywords'   => '/keywords/',
					'categories' => '/categories/',
					'info'       => '/info/',
					'template'   => '/template/',
					'plugins'    => '/plugins/',
					'plugin'     => '/plugin/',
				),
			),
			'guide' => array(
				'title' => esc_html__( 'Learn More About Prodesp', 'Prodesp' ),
				'links' => array(
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
					'video-tutorials' => array(
						'label' => esc_html__( 'View Video', 'Prodesp' ),
						'type'   => 'primary',
						'target' => '_blank',
						'icon'   => 'dashicons-format-video',
						'desc'   => esc_html__( 'View video tutorials', 'Prodesp' ),
						'url'    => 'https://zemez.io/wordpress/support/video-tutorials/',
					),
				),
			),
		)
	);
}
