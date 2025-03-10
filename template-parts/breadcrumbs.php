<?php
/**
 * Template part for breadcrumbs.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Prodesp
 */

$breadcrumbs_visibillity = Prodesp_Theme()->customizer->get_value( 'breadcrumbs_visibillity' );

/**
 * [$breadcrumbs_visibillity description]
 * @var [type]
 */
$breadcrumbs_visibillity = apply_filters( 'Prodesp-theme/breadcrumbs/breadcrumbs-visibillity', $breadcrumbs_visibillity );

if ( ! $breadcrumbs_visibillity ) {
	return;
}

$breadcrumbs_front_visibillity = Prodesp_Theme()->customizer->get_value( 'breadcrumbs_front_visibillity' );

if ( !$breadcrumbs_front_visibillity && is_front_page() ) {
	return;
}

do_action( 'Prodesp-theme/breadcrumbs/breadcrumbs-before-render' );

?><div <?php echo Prodesp_get_container_classes( 'site-breadcrumbs' ); ?>>
	<div <?php Prodesp_breadcrumbs_class(); ?>>
		<?php do_action( 'Prodesp-theme/breadcrumbs/before' ); ?>
		<?php do_action( 'cx_breadcrumbs/render' ); ?>
		<?php do_action( 'Prodesp-theme/breadcrumbs/after' ); ?>
	</div>
</div><?php

do_action( 'Prodesp-theme/breadcrumbs/breadcrumbs-after-render' );
