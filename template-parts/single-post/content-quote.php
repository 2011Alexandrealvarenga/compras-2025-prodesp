<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Prodesp
 */

?>

<?php do_action( 'Prodesp_extra_post_format_quote' ); ?>

<div class="entry-content">
	<?php the_content(); ?>
	<?php wp_link_pages( array(
		'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'Prodesp' ),
		'after'       => '</div>',
		'link_before' => '<span>',
		'link_after'  => '</span>',
	) ); ?>
</div><!-- .entry-content -->
