<?php
/**
 * Template part for displaying creative posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Prodesp
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'posts-list__item creative-item invert-hover' ); ?>>

	<?php if ( has_post_thumbnail() ) : ?>
		<div class="creative-item__thumbnail" <?php Prodesp_post_overlay_thumbnail( 'Prodesp-thumb-m' ); ?>></div>
	<?php endif; ?>

	<header class="entry-header">
		<?php
			Prodesp_posted_in();
			Prodesp_posted_on( array(
				'prefix' => __( 'Posted', 'Prodesp' )
			) );
		?>
		<h4 class="entry-title"><?php 
			Prodesp_sticky_label();
			the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' );
		?></h4>
	</header><!-- .entry-header -->

	<?php Prodesp_post_excerpt(); ?>

	<footer class="entry-footer">
		<div class="entry-meta">
			<div>
				<?php
					Prodesp_posted_by();
					Prodesp_post_comments( array(
						'prefix' => '<i class="fa fa-comment" aria-hidden="true"></i>'
					) );
					Prodesp_post_tags( array(
						'prefix' => __( 'Tags:', 'Prodesp' )
					) );
				?>
			</div>
			<?php
				Prodesp_post_link();
			?>
		</div>
		<?php Prodesp_edit_link(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
