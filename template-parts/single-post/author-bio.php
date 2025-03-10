<?php
/**
 * The template for displaying author bio.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Prodesp
 * @subpackage widgets
 */

$is_enabled = Prodesp_Theme()->customizer->get_value( 'single_author_block' );

if ( ! $is_enabled ) {
	return;
}

?>
<div class="post-author-bio">
	<div class="post-author__avatar"><?php
		Prodesp_get_post_author_avatar();
	?></div>
	<div class="post-author__content">
		<h4 class="post-author__title"><?php
			Prodesp_get_post_author();
		?></h4>
		<div class="post-author__content"><?php
			Prodesp_get_author_meta();
		?></div>
	</div>
</div>
