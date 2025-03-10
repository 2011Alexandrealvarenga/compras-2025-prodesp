<?php
/**
 * Template part for displaying creative posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Prodesp
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'posts-list__item creative-item' ); ?>>

	<?php
		if ( has_post_thumbnail() ) {
			?><div class="post-thumbnail" <?php Prodesp_post_overlay_thumbnail( 'Prodesp-thumb-l' ); ?>></div><?php
		}
	?>

	<div class="creative-item__content">

		<header class="entry-header">
			<h4 class="entry-title"><?php 
				Prodesp_sticky_label();
				the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' );
			?></h4>
		</header><!-- .entry-header -->

		<?php Prodesp_post_excerpt(); ?>

		<footer class="entry-footer">
			<div class="entry-meta"><?php
				Prodesp_posted_in();
				Prodesp_posted_by();
				Prodesp_posted_on( array(
					'prefix' => __( 'Posted', 'Prodesp' )
				) );
				Prodesp_post_tags( array(
					'prefix' => __( 'Tags:', 'Prodesp' )
				) );
				?><div><?php
					Prodesp_post_link();
					Prodesp_post_comments( array(
						'prefix' => '<i class="fa fa-comment" aria-hidden="true"></i>',
					) );
				?></div>
			</div>
			<?php Prodesp_edit_link(); ?>
		</footer><!-- .entry-footer -->

	</div>

</article><!-- #post-<?php the_ID(); ?> -->
