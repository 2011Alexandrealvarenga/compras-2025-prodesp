<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Prodesp
 */

?>

<header class="entry-header">
	<?php the_title( '<h1 class="entry-title h2-style">', '</h1>' ); ?>
	<div class="entry-meta">
		<?php
			Prodesp_posted_by();
			Prodesp_posted_in( array(
				'prefix'  => __( 'In', 'Prodesp' ),
			) );
			Prodesp_posted_on( array(
				'prefix'  => __( 'Posted', 'Prodesp' ),
			) );
			Prodesp_post_comments( array(
				'postfix' => __( 'Comment(s)', 'Prodesp' ),
			) );
		?>
	</div><!-- .entry-meta -->
</header><!-- .entry-header -->

<?php Prodesp_post_thumbnail( 'Prodesp-thumb-l', array( 'link' => false ) ); ?>