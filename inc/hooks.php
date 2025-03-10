<?php
/**
 * Theme hooks.
 *
 * @package Prodesp
 */

// Adds the meta viewport to the header.
add_action( 'wp_head', 'Prodesp_meta_viewport', 0 );

// Additional body classes.
add_filter( 'body_class', 'Prodesp_extra_body_classes' );

// Enqueue sticky menu if required.
add_filter( 'Prodesp-theme/assets-depends/script', 'Prodesp_enqueue_misc' );

// Additional image sizes for media gallery.
add_filter( 'image_size_names_choose', 'Prodesp_image_size_names_choose' );

// Modify a comment form.
add_filter( 'comment_form_defaults', 'Prodesp_modify_comment_form' );


/**
 * Adds the meta viewport to the header.
 *
 * @since  1.0.0
 * @return string `<meta>` tag for viewport.
 */
function Prodesp_meta_viewport() {
	$home_url = home_url();
	echo "<meta name='viewport' content='width=device-width, initial-scale=1' />	
	<meta property='og:image' content='$home_url/wp-content/uploads/2023/09/logo-sp-gov-br.png'>
	<meta property='og:title' content='Portal de Compras'>
	<meta property='og:type' content='website'>
	<meta property='og:url' content={ $home_url }>
    <link rel='icon' href='https://compras.sp.gov.br/wp-content/uploads/2023/10/favicon.png' sizes='32x32' />
	<meta property='og:site_name' content='Conheça o sistema compras.sp.gov.br'>";
}

/**
 * Add extra body classes
 *
 * @param  array $classes Existing classes.
 * @return array
 */
function Prodesp_extra_body_classes( $classes ) {

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	if ( ! Prodesp_is_top_panel_visible() ) {
		$classes[] = 'top-panel-invisible';
	}

	// Adds a options-based classes.
	$options_based_classes = array();

	$layout      = Prodesp_Theme()->customizer->get_value( 'container_type' );
	$blog_layout = Prodesp_Theme()->customizer->get_value( 'blog_layout_type' );
	$sb_position = Prodesp_Theme()->sidebar_position;
	$sidebar     = Prodesp_Theme()->customizer->get_value( 'sidebar_width' );

	array_push( $options_based_classes, 'layout-' . $layout, 'blog-' . $blog_layout );
	if( 'none' !== $sb_position ) {
		array_push( $options_based_classes, 'sidebar_enabled', 'position-' . $sb_position, 'sidebar-' . str_replace( '/', '-', $sidebar ) );
	}

	return array_merge( $classes, $options_based_classes );
}

/**
 * Add misc to theme script dependencies if required.
 *
 * @param  array $depends Default dependencies.
 * @return array
 */
function Prodesp_enqueue_misc( $depends ) {
	$totop_visibility = Prodesp_Theme()->customizer->get_value( 'totop_visibility' );

	if ( $totop_visibility ) {
		$depends[] = 'jquery-totop';
	}

	return $depends;
}

/**
 * Add image sizes for media gallery
 *
 * @param  array $classes Existing classes.
 * @return array
 */
function Prodesp_image_size_names_choose( $image_sizes ) {
	$image_sizes['post-thumbnail'] = __( 'Post Thumbnail', 'Prodesp' );

	return $image_sizes;
}

/**
 * Add placeholder attributes for comment form fields.
 *
 * @param  array $args Argumnts for comment form.
 * @return array
 */
function Prodesp_modify_comment_form( $args ) {
	$args = wp_parse_args( $args );

	if ( ! isset( $args['format'] ) ) {
		$args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';
	}

	$req       = get_option( 'require_name_email' );
	$aria_req  = ( $req ? " aria-required='true'" : '' );
	$html_req  = ( $req ? " required='required'" : '' );
	$html5     = 'html5' === $args['format'];
	$commenter = wp_get_current_commenter();

	$args['label_submit'] = esc_html__( 'Submit Comment', 'Prodesp' );

	$args['fields']['author'] = '<p class="comment-form-author"><input id="author" class="comment-form__field" name="author" type="text" placeholder="' . esc_attr__( 'Name', 'Prodesp' ) . ( $req ? ' *' : '' ) . '" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' /></p>';

	$args['fields']['email'] = '<p class="comment-form-email"><input id="email" class="comment-form__field" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' placeholder="' . esc_attr__( 'E-mail', 'Prodesp' ) . ( $req ? ' *' : '' ) . '" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req  . ' /></p>';

	$args['fields']['url'] = '<p class="comment-form-url"><input id="url" class="comment-form__field" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' placeholder="' . esc_attr__( 'Website', 'Prodesp' ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>';

	$args['comment_field'] = '<p class="comment-form-comment"><textarea id="comment" class="comment-form__field" name="comment" placeholder="' . esc_attr__( 'Comments *', 'Prodesp' ) . '" cols="45" rows="7" aria-required="true" required="required"></textarea></p>';

	return $args;
}