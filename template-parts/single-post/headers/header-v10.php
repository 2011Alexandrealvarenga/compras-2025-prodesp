<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Prodesp
 */

$has_post_thumbnail = has_post_thumbnail();
$has_post_thumbnail_class = $has_post_thumbnail ? 'has-post-thumbnail' : '';

?>

<div class="single-header-10 invert <?php echo esc_attr( $has_post_thumbnail_class ); ?>">
	<?php Prodesp_post_thumbnail( 'Prodesp-thumb-xl', array( 'link' => false ) ); ?>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title h3-style">', '</h1>' ); ?>
					<div class="entry-header-bottom">
						<div class="entry-meta"><?php
							if ( Prodesp_Theme()->customizer->get_value( 'single_post_author' ) ) : ?>
								<span class="post-author">
									<span class="post-author__avatar"><?php
										Prodesp_get_post_author_avatar( array(
											'size' => 50
										) );
									?></span>
									<?php Prodesp_posted_by();
								?></span>
							<?php endif; ?>
							<?php
								Prodesp_posted_in( array(
									'prefix'  => __( 'In', 'Prodesp' ),
								) );
								Prodesp_posted_on( array(
									'prefix'  => __( 'Posted', 'Prodesp' ),
								) );
						?></div><!-- .entry-meta -->
						<div class="entry-meta"><?php
							Prodesp_post_comments( array(
								'prefix' => '<i class="fa fa-comment" aria-hidden="true"></i>',
								'class'  => 'comments-button'
							) );
						?></div><!-- .entry-meta -->
					</div>
				</header><!-- .entry-header -->
			</div>
		</div>
	</div>
</div>

