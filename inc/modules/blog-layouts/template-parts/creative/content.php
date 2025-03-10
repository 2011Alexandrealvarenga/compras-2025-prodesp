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
		<div class="creative-item__thumbnail" <?php Prodesp_post_overlay_thumbnail(); ?>></div>
	<?php endif; ?>

	<div class="container">

		<?php if ( Prodesp_Theme()->customizer->get_value( 'blog_post_categories' ) ) : ?>
			<div class="creative-item__before-content"><?php
				Prodesp_posted_in( array(
					'prefix'    => '',
					'delimiter' => '',
					'before'    => '<div class="cat-links">',
					'after'     => '</div>'
				) );
			?></div>
		<?php endif; ?>

		<div class="creative-item__content">
			<header class="entry-header">
				<h3 class="entry-title"><?php 
					Prodesp_sticky_label();
					the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' );
				?></h3>
			</header><!-- .entry-header -->

			<?php Prodesp_post_excerpt(); ?>

			<footer class="entry-footer">
				<div class="entry-meta">
					<div>
						<?php
							Prodesp_posted_by();
							Prodesp_posted_on( array(
								'prefix' => __( 'Posted', 'Prodesp' )
							) );
							Prodesp_post_tags( array(
								'prefix' => __( 'Tags:', 'Prodesp' )
							) );
						?>
					</div>
					<?php
						Prodesp_post_comments( array(
							'postfix' => __( 'Comment(s)', 'Prodesp' )
						) );
					?>
				</div>
				<?php Prodesp_edit_link(); ?>
			</footer><!-- .entry-footer -->
		</div>

		<?php if ( 'none' !== Prodesp_Theme()->customizer->get_value( 'blog_read_more_type' ) ) : ?>
			<div class="creative-item__after-content"><?php
				Prodesp_post_link();
			?></div>
		<?php endif; ?>

	</div>

</article><!-- #post-<?php the_ID(); ?> -->
