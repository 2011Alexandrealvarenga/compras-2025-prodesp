<?php
/**
 * Template part for displaying dtyle-7 posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Prodesp
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'posts-list__item justify-item' ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="justify-item__thumbnail" <?php Prodesp_post_overlay_thumbnail( Prodesp_justify_thumbnail_size(1) );?>></div>
	<?php endif; ?>
	<header class="entry-header">
			<h4 class="entry-title"><?php 
				Prodesp_sticky_label();
				the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' );
			?></h4>
			<div class="entry-meta">
				<?php
				Prodesp_posted_by();
				Prodesp_posted_in( array(
					'prefix' => __( 'In', 'Prodesp' ),
					'delimiter' => ', '
				) ); 
				Prodesp_posted_on( array(
					'prefix' => __( 'Posted', 'Prodesp' ),
				) ); 
				?>
			</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
	<?php Prodesp_post_excerpt(); ?>
	<footer class="entry-footer">
		<div class="entry-meta">
			<?php
			Prodesp_post_tags();

			$post_more_btn_enabled = strlen( Prodesp_Theme()->customizer->get_value( 'blog_read_more_text' ) ) > 0 ? true : false;
			$post_comments_enabled = Prodesp_Theme()->customizer->get_value( 'blog_post_comments' );

			if( $post_more_btn_enabled || $post_comments_enabled ) {
				?><div class="space-between-content"><?php
				Prodesp_post_link();
				Prodesp_post_comments();
				?></div><?php
			}
			?>
		</div>
	</footer><!-- .entry-footer -->
	<?php Prodesp_edit_link(); ?>
</article><!-- #post-<?php the_ID(); ?> -->
