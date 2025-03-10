<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Prodesp
 */

?>

<?php 

do_action( 'Prodesp-theme/sidebar/before' );

if ( is_active_sidebar( 'sidebar' ) && 'none' !== Prodesp_Theme()->sidebar_position ) : ?>
	<aside id="secondary" <?php Prodesp_secondary_content_class( array( 'widget-area' ) ); ?>>
		<?php dynamic_sidebar( 'sidebar' ); ?>
	</aside><!-- #secondary -->
<?php endif; 

do_action( 'Prodesp-theme/sidebar/after' );
