<?php
/**
 * Template part for default Header layout.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Prodesp
 */
?>

<?php get_template_part( 'template-parts/top-panel' ); ?>

<div <?php Prodesp_header_class(); ?>>
	<?php do_action( 'Prodesp-theme/header/before' ); ?>
	<div class="menu-sem-espaco space-between-content">

		<div <?php Prodesp_site_branding_class(); ?>>
			<div class="content-brand">

				<div class="menu_icon_box">
					<img id="btn-menu-desktop" class="btn-ham-open btn-style"  src="https://compras.sp.gov.br/wp-content/uploads/2024/03/btn-icon-menu.svg">
					<img id="btn-menu-mobile" class="btn-ham-open btn-style"  src="https://compras.sp.gov.br/wp-content/uploads/2024/03/btn-icon-menu.svg">
					<!-- <img id="btn-menu-desktop" class="btn-ham-open" src="https://compras.sp.gov.br/wp-content/uploads/2024/03/hamburguer-icon.png" alt=""> -->
					<!-- <img id="btn-menu-mobile" class="btn-ham-open" src="https://compras.sp.gov.br/wp-content/uploads/2024/03/hamburguer-icon.png" alt=""> -->
				</div>
				<?php Prodesp_header_logo(); ?>		
				<!-- inicio icone hamburguer novo -->
				<!-- fim icone hamburguer novo -->
		
			</div>
		</div>
		<?php Prodesp_main_menu(); ?>
	</div>
	<?php get_template_part( 'template-parts/busca-header' ); ?>
	<?php do_action( 'Prodesp-theme/header/after' ); ?>
</div>
