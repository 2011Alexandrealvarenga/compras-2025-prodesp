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

	<?php if ( Prodesp_Theme()->customizer->get_value( 'blog_post_publish_date' ) ) : ?>
		<div class="creative-item__post-date">
			<?php
				Prodesp_posted_on();
			?>
		</div>
	<?php endif; ?>

	<div class="creative-item__content">
		<header class="entry-header">
			<h3 class="entry-title"><?php 
				Prodesp_sticky_label();
				the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' );
			?></h3>
			<div class="entry-meta"><?php
				Prodesp_posted_by();
				Prodesp_posted_in( array(
					'prefix' => __( 'In', 'Prodesp' ),
				) );
			?></div>
		</header><!-- .entry-header -->

		<?php Prodesp_post_excerpt(); ?>

		<footer class="entry-footer">
			<div class="entry-meta"><?php
				Prodesp_post_tags( array(
					'prefix' => __( 'Tags:', 'Prodesp' )
				) );
				?><div><?php
					Prodesp_post_comments( array(
						'prefix' => '<i class="fa fa-comment" aria-hidden="true"></i>',
						'class'  => 'comments-button'
					) );
					Prodesp_post_link();
				?></div>
			</div>
			<?php Prodesp_edit_link(); ?>
		</footer><!-- .entry-footer -->
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
