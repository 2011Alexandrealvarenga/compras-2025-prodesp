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

	<div class="creative-item__content">

		<header class="entry-header">
			<h2 class="entry-title"><?php 
				Prodesp_sticky_label();
				the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' );
			?></h2>
		</header><!-- .entry-header -->

		<?php Prodesp_post_excerpt(); ?>

	</div>

	<footer class="entry-footer">
		<div class="entry-meta">
			<div>
				<?php
					Prodesp_posted_by();
					Prodesp_posted_in( array(
						'prefix'    => __( 'In', 'Prodesp' ),
					) );
					Prodesp_posted_on( array(
						'prefix' => __( 'Posted', 'Prodesp' )
					) );
					Prodesp_post_tags( array(
						'prefix' => __( 'Tags:', 'Prodesp' )
					) );
					Prodesp_post_comments( array(
						'postfix' => __( 'Comment(s)', 'Prodesp' )
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
