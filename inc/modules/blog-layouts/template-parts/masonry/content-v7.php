<?php
/**
 * Template part for displaying style-v7 posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Prodesp
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'posts-list__item masonry-item' ); ?>>
	<div class="masonry-item-wrap">
		<?php Prodesp_post_thumbnail( 'Prodesp-thumb-masonry' ); ?>
		<div class="masonry-item-wrap__content">
			<header class="entry-header">
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
				<h4 class="entry-title"><?php 
					Prodesp_sticky_label();
					the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' );
				?></h4>
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
		</div>
	</div><!-- .masonry-item-wrap-->
	<?php Prodesp_edit_link(); ?>
</article><!-- #post-<?php the_ID(); ?> -->
