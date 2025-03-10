<?php
/**
 * Template part for displaying default posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Prodesp
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('posts-list__item default-item'); ?>>

	<?php if ( has_post_thumbnail() ) : ?>
		<div class="default-item__thumbnail" <?php Prodesp_post_overlay_thumbnail( 'Prodesp-thumb-m-2' ); ?>></div>
	<?php endif; ?>

	<div class="default-item__content">

		<header class="entry-header">
			<h3 class="entry-title"><?php 
				Prodesp_sticky_label();
				the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' );
			?></h3>
			<div class="entry-meta">
				<?php
					Prodesp_posted_by();
					Prodesp_posted_in( array(
						'prefix' => __( 'In', 'Prodesp' ),
					) );
					Prodesp_posted_on( array(
						'prefix' => __( 'Posted', 'Prodesp' )
					) );
				?>
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->

		<?php Prodesp_post_excerpt(); ?>

		<footer class="entry-footer">
			<div class="entry-meta">
				<?php
					Prodesp_post_tags( array(
						'prefix' => __( 'Tags:', 'Prodesp' )
					) );
				?>
				<div><?php
					Prodesp_post_link();
					Prodesp_post_comments( array(
						'prefix' => '<i class="fa fa-comment" aria-hidden="true"></i>',
						'class'  => 'comments-button'
					) );
				?></div>
			</div>
			<?php Prodesp_edit_link(); ?>
		</footer><!-- .entry-footer -->
	
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
