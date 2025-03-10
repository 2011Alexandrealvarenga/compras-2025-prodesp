<?php
/**
 * Template part for posts navigation.
 *
 * @package Prodesp
 */

do_action( 'Prodesp-theme/blog/posts-navigation-before' );

$navigation_type = Prodesp_Theme()->customizer->get_value( 'blog_navigation_type' );

switch ( $navigation_type ) {
	case 'navigation':
		the_posts_navigation(
			apply_filters( 'Prodesp-theme/posts/navigation-args',
							array(
								'prev_text' => sprintf( '
									<span class="screen-reader-text">%1$s</span>
									<i class="fa fa-angle-left" aria-hidden="true"></i> %1$s',
									esc_html__( 'Older Posts', 'Prodesp' ) ),
								'next_text' => sprintf( '
									<span class="screen-reader-text">%1$s</span>
									%1$s <i class="fa fa-angle-right" aria-hidden="true"></i>',
									esc_html__( 'Newer Posts', 'Prodesp' ) ),
							)
			)
		);
		break;
	case 'pagination':
		the_posts_pagination( 
			apply_filters( 'Prodesp-theme/posts/pagination-args',
							array(
								'prev_text' => sprintf( '
									<span class="screen-reader-text">%1$s</span>
									<i class="fa fa-angle-left" aria-hidden="true"></i> %1$s',
									esc_html__( 'Prev', 'Prodesp' ) ),
								'next_text' => sprintf( '
									<span class="screen-reader-text">%1$s</span>
									%1$s <i class="fa fa-angle-right" aria-hidden="true"></i>',
									esc_html__( 'Next', 'Prodesp' ) ),
							)
			)
		);
		break;
}



do_action( 'Prodesp-theme/blog/posts-navigation-after' );
