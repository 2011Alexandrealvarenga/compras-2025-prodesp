<?php
/**
 * The template for displaying the default footer layout.
 *
 * @package Prodesp
 */
?>

<?php do_action( 'Prodesp-theme/widget-area/render', 'footer-area' ); ?>

<div <?php Prodesp_footer_class(); ?>>
	<div class="space-between-content"><?php
		Prodesp_footer_copyright();
		Prodesp_social_list( 'footer' );
	?></div>
</div><!-- .container -->
<style>
	.site-footer__wrap.container {
    display: none;
}
</style>
<link rel="stylesheet" type="text/css" href="https://www.saopaulo.sp.gov.br/barra-govsp/css/rodape-padrao-govsp.min.css"> 
  <section id="govsp-rodape">         
      <div class="container">
        <div class="linha-botoes">
            <div class="coluna-4">
              <a href="https://www.ouvidoria.sp.gov.br/Portal/Default.aspx" target="_blank" class="btn btn-model">Ouvidoria</a>
            </div> 
    
            <div class="coluna-4">
              <a href="http://www.transparencia.sp.gov.br/" class="btn btn-model" target="_blank">Transparência</a>
            </div> 
    
            <div class="coluna-4">
              <a href="http://www.sic.sp.gov.br/" class="btn btn-model" target="_blank">SIC</a>
            </div> 
        </div>
        </div>
    
        <div class="container rodape">    
          <div class="logo-rodape">
            <p>
              <a href="https://www.saopaulo.sp.gov.br/">
                <img src="https://www.saopaulo.sp.gov.br/barra-govsp/img/logo-rodape-governo-do-estado-sp.png" alt="Logo" width="206" height="38">
              </a>
            </p>
          </div>
    
        </div>
  </section>
