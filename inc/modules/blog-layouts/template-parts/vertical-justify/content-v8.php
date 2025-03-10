<?php
/**
 * Template part for displaying style-v8 posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Prodesp
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'posts-list__item justify-item' ); ?>>
	<div class="justify-item-inner invert">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="justify-item__thumbnail" <?php Prodesp_post_overlay_thumbnail( Prodesp_justify_thumbnail_size(1) );?>></div>
		<?php endif; ?>
		<div class="justify-item-wrap">
			<div class="entry-meta__top">
				<?php
					Prodesp_posted_in( array(
						'prefix' => '',
						'delimiter' => ''
					) );
					Prodesp_post_tags();
				?>
			</div><!-- .entry-meta -->
			<header class="entry-header">
				<h4 class="entry-title"><?php
					Prodesp_sticky_label();
					the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' );
				?></h4>
			</header><!-- .entry-header -->
			<div class="justify-item-wrap__animated">
				<?php Prodesp_post_excerpt(); ?>
				<?php Prodesp_post_link(); ?>
			</div><!-- .justify-item-wrap__animated-->
			<footer class="entry-footer">
				<div class="entry-meta">
					<?php
					Prodesp_posted_by();
					Prodesp_posted_on( array(
						'prefix' => __( 'Posted ', 'Prodesp' ),
					) );
					Prodesp_post_comments( array(
						'postfix' => __( 'comments', 'Prodesp' ),
					) );
					?>
				</div>
			</footer><!-- .entry-footer -->
		</div><!-- .justify-item-wrap-->
	</div><!-- .justify-item-inner-->
	<?php Prodesp_edit_link(); ?>
</article><!-- #post-<?php the_ID(); ?> -->