<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Prodesp
 */

get_header();

	if ( get_post_type( get_the_ID() ) != 'produto' ) {

		do_action( 'Prodesp-theme/site/site-content-before', 'single' ); ?>

		<div <?php Prodesp_content_class() ?>>
			<div class="row">

				<?php do_action( 'Prodesp-theme/site/primary-before', 'single' ); ?>

				<div id="primary" <?php Prodesp_primary_content_class(); ?>>

					<?php do_action( 'Prodesp-theme/site/main-before', 'single' ); ?>

					<main id="main" class="site-main"><?php
						while ( have_posts() ) : the_post();

							Prodesp_Theme()->do_location( 'single', 'template-parts/content-post' );

						endwhile; // End of the loop.
					?></main><!-- #main -->

					<?php do_action( 'Prodesp-theme/site/main-after', 'single' ); ?>

				</div><!-- #primary -->

				<?php do_action( 'Prodesp-theme/site/primary-after', 'single' ); ?>

				<?php get_sidebar(); // Loads the sidebar.php template.  ?>
			</div>
		</div>

		<?php do_action( 'Prodesp-theme/site/site-content-after', 'single' );

	} else { 

		Prodesp_Theme()->do_location( 'single', 'post-templates/single-produtos' );
		
	}

get_footer();
