<?php
/**
 * Template part for displaying style-v5 posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Prodesp
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'posts-list__item justify-item' ); ?>>
	<div class="justify-item-inner invert">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="justify-item__thumbnail" <?php Prodesp_post_overlay_thumbnail( Prodesp_justify_thumbnail_size(0) );?>></div>
		<?php endif; ?>
		<div class="justify-item-wrap invert">
			<?php
				Prodesp_posted_in( array(
					'prefix' => false,
					'delimiter' => false,
				) );
			?>
			<header class="entry-header">
				<div class="entry-meta">
					<?php
					Prodesp_posted_by();
					Prodesp_posted_on( array(
						'prefix' => '',
					) );
					?>
				</div><!-- .entry-meta -->
				<h4 class="entry-title"><?php
					Prodesp_sticky_label();
					the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' );
				?></h4>
			</header><!-- .entry-header -->
			<div class="justify-item-wrap__animated">
			<?php Prodesp_post_excerpt(); ?>

				<footer class="entry-footer">
					<div class="entry-meta">
						<?php

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
			</div><!-- .justify-item-wrap__animated-->
		</div><!-- .justify-item-wrap-->
	</div><!-- .justify-item-inner-->
	<?php Prodesp_edit_link(); ?>
</article><!-- #post-<?php the_ID(); ?> -->
