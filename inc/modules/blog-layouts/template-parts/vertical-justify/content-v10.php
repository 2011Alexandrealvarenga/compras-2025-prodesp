<?php
/**
 * Template part for displaying style-v10 posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Prodesp
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'posts-list__item justify-item' ); ?>>
	<div class="justify-item-inner invert">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="justify-item__thumbnail" <?php Prodesp_post_overlay_thumbnail( Prodesp_justify_thumbnail_size(1) ); ?>></div>
		<?php endif; ?>
		<h3 class="entry-title"><?php 
			Prodesp_sticky_label();
			the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' );
		?></h3>
	</div><!-- .justify-item-inner-->
	<div class="justify-item-wrap">
		<header class="entry-header">
			<div class="entry-meta">
				<?php
				Prodesp_posted_by();
				Prodesp_posted_in( array(
					'prefix' => __( 'In', 'Prodesp' ),
					'delimiter' => ', '
				) ); 
				Prodesp_posted_on( array(
					'prefix' => __( 'Posted ', 'Prodesp' ),
				) );
				Prodesp_post_tags(); 
				Prodesp_post_comments( array(
					'postfix' => __( 'comments', 'Prodesp' ),
				) );
				?>
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->
		<?php Prodesp_post_excerpt(); ?>
		<footer class="entry-footer">
			<div class="entry-meta">
				<?php
				$post_more_btn_enabled = strlen( Prodesp_Theme()->customizer->get_value( 'blog_read_more_text' ) ) > 0 ? true : false;

				if( $post_more_btn_enabled ) {
					?><div class="space-between-content"><?php
					Prodesp_post_link();
					?></div><?php
				}
				?>
			</div>
		</footer><!-- .entry-footer -->
	</div><!-- .justify-item-wrap-->
	<?php Prodesp_edit_link(); ?>
</article><!-- #post-<?php the_ID(); ?> -->
