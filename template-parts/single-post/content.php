<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Prodesp
 */

?>
<div class="entry-content">
	<?php the_content(); ?>
	<?php wp_link_pages( array(
		'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'Prodesp' ),
		'after'       => '</div>',
		'link_before' => '<span>',
		'link_after'  => '</span>',
	) ); ?>
<?php if(in_category(array('portaria','resolucao','noticias'))){

    $link_category = '/'. get_the_category( $id )[0]->name;

	echo "
	<div class='content-btn-voltar'>
	<a class='link' href={$link_category}>
				<span class='elementor-button-icon elementor-align-icon-left'>
					<i aria-hidden='true' class='far fa-arrow-alt-circle-left'></i>			
				</span>
				<span class='txt-back'>Voltar </span>
			</span>
		</a>
	</div>
	";
} ;
?>
</div><!-- .entry-content -->