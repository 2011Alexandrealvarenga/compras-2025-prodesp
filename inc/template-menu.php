<?php
/**
 * Menu Template Functions.
 *
 * @package Prodesp
 */

/**
 * Show main menu.
 *
 * @since  1.0.0
 * @return void
 */
function Prodesp_main_menu() {

	$classes[] = 'main-navigation';

	?>
		<!-- menu desktop  -->
		<nav id="site-navigation" class="<?php echo join( ' ', $classes ); ?> menu-desktop-version" role="navigation">
			<div class="main-navigation-inner">
				<?php
					$args = apply_filters( 'Prodesp-theme/menu/main-menu-args', array(
						'theme_location'   => 'main',
						'container'        => '',
						'menu_id'          => 'main-menu',
						'fallback_cb'      => 'Prodesp_set_nav_menu',
						'fallback_message' => esc_html__( 'Set main menu', 'Prodesp' ),
					) );

					wp_nav_menu( $args );
				?>
			</div>
		</nav>
	<?php
}

/**
 * Show footer menu.
 *
 * @since  1.0.0
 * @return void
 */
function Prodesp_footer_menu() { ?>
	<nav id="footer-navigation" class="footer-menu" role="navigation">
	<?php
		$args = apply_filters( 'Prodesp-theme/menu/footer-menu-args', array(
			'theme_location'   => 'footer',
			'container'        => '',
			'menu_id'          => 'footer-menu-items',
			'menu_class'       => 'footer-menu__items',
			'depth'            => 1,
			'fallback_cb'      => '__return_empty_string',
			'fallback_message' => esc_html__( 'Set footer menu', 'Prodesp' ),
		) );

		wp_nav_menu( $args );
	?>
	</nav><!-- #footer-navigation -->
	<?php
}

/**
 * Get social nav menu.
 *
 * @since  1.0.0
 * @since  1.0.1  Added arguments to the filter.
 * @param  string $context Current post context - 'single' or 'loop'.
 * @param  string $type    Content type - icon, text or both.
 * @return string
 */
function Prodesp_get_social_list( $context, $type = 'icon' ) {
	static $instance = 0;
	$instance++;

	$container_class = array( 'social-list' );

	if ( ! empty( $context ) ) {
		$container_class[] = sprintf( 'social-list--%s', sanitize_html_class( $context ) );
	}

	$container_class[] = sprintf( 'social-list--%s', sanitize_html_class( $type ) );

	$args = apply_filters( 'Prodesp-theme/social/list-args', array(
		'theme_location'   => 'social',
		'container'        => 'div',
		'container_class'  => join( ' ', $container_class ),
		'menu_id'          => "social-list-{$instance}",
		'menu_class'       => 'social-list__items inline-list',
		'depth'            => 1,
		'link_before'      => ( 'icon' == $type ) ? '<span class="screen-reader-text">' : '',
		'link_after'       => ( 'icon' == $type ) ? '</span>' : '',
		'echo'             => false,
		'fallback_cb'      => 'Prodesp_set_nav_menu',
		'fallback_message' => esc_html__( 'Set social menu', 'Prodesp' ),
	), $context, $type );

	return wp_nav_menu( $args );
}

/**
 * Set callback function for nav menu.
 *
 * @param  array $args Nav menu arguments.
 * @return void
 */
function Prodesp_set_nav_menu( $args ) {

	if ( ! current_user_can( 'edit_theme_options' ) ) {
		return null;
	}

	$format = '<div class="set-menu %3$s"><a href="%2$s" target="_blank" class="set-menu_link">%1$s</a></div>';
	$label  = $args['fallback_message'];
	$url    = esc_url( admin_url( 'nav-menus.php' ) );

	printf( $format, $label, $url, $args['container_class'] );
}
