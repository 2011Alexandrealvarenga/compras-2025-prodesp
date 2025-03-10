<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Prodesp
 */

?>

<footer class="entry-footer">
	<div class="entry-meta"><?php
		Prodesp_post_tags ( array(
			'prefix'    => __( 'Tags:', 'Prodesp' ),
			'delimiter' => ''
		) );
	?></div>
</footer><!-- .entry-footer -->