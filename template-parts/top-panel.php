<?php
/**
 * Template part for top panel in header.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Prodesp
 */

// Don't show top panel if all elements are disabled.
if ( ! Prodesp_is_top_panel_visible() ) {
	return;
} ?>
<!-- <div class="top-panel container">
	<div class="space-between-content">
		<div class="top-panel-content__left">
				<?php do_action( 'Prodesp-theme/top-panel/elements-left' ); ?>
				<?php Prodesp_site_description(); ?>
		</div>
		<div class="top-panel-content__right">
				<?php Prodesp_social_list( 'header' ); ?>
				<?php do_action( 'Prodesp-theme/top-panel/elements-right' ); ?>
		</div>
	</div>
</div> -->
<link rel="stylesheet" type="text/css" href="https://saopaulo.sp.gov.br/barra-govsp/css/topo-padrao-govsp.min.css">
<link rel="stylesheet" type="text/css" href="https://saopaulo.sp.gov.br/barra-govsp/css/barra-contraste-govsp.min.css">
  <style type="text/css" id="operaUserStyle"></style>
  <section class="govsp-topo">     
        <div id="govsp-topbarGlobal" class="blu-e">
                <div id="topbarGlobal">
                    <div id="topbarLink" class="govsp-black">
                    <div class="govsp-portal">
                        <a href="https://www.saopaulo.sp.gov.br" accesskey="1" title="Governo SP" target="_blank"><img src="https://saopaulo.sp.gov.br/barra-govsp/img/logo-governo-do-estado-sp.png" alt="Logo Governo SP" height="38" class="logo">
                    </a></div><a href="https://www.saopaulo.sp.gov.br" accesskey="1" title="Governo SP" target="_blank"> 
                </a></div><a href="https://www.saopaulo.sp.gov.br" accesskey="1" title="Governo SP" target="_blank">
                </a><nav class="govsp-navbar govsp-navbar-expand-lg"><a href="https://www.saopaulo.sp.gov.br" accesskey="1" title="Governo SP" target="_blank">
                    
                        </a><a class="govsp-link digital" href="https://spmaisdigital.sp.gov.br" title="site SP + Digital (nova janela)" target="_blank">SP + Digital</a>
    
                        <a class="govsp-social" href="https://www.flickr.com/governosp/" target="_blank" title="Flickr Governo de São Paulo (nova janela)"><img class="govsp-icon-social" src="https://saopaulo.sp.gov.br/barra-govsp/img/i-flickr.png" alt="Flickr Governo de São Paulo"></a>
                                           
                        <a class="govsp-social" href="https://www.linkedin.com/company/governosp/" target="_blank" title="Linkedin Governo de São Paulo (nova janela)"><img class="govsp-icon-social" src="https://saopaulo.sp.gov.br/barra-govsp/img/i-linkedin.png" alt="Linkedin Governo de São Paulo"></a>
    
                        <a class="govsp-social" href="https://www.tiktok.com/@governosp" target="_blank" title="TikTok Governo de São Paulo (nova janela)"><img class="govsp-icon-social" src="https://saopaulo.sp.gov.br/barra-govsp/img/i-tiktok.png" alt="TikTok Governo de São Paulo"></a>                        
                        
                        <a class="govsp-social" href="https://www.youtube.com/governosp/" target="_blank" title="Youtube Governo de São Paulo (nova janela)"><img class="govsp-icon-social" src="https://saopaulo.sp.gov.br/barra-govsp/img/i-youtube.png" alt="Youtube Governo de São Paulo"></a>
                        
                        <a class="govsp-social" href="https://www.twitter.com/governosp/" target="_blank" title="Twitter Governo de São Paulo (nova janela)"><img class="govsp-icon-social" src="https://saopaulo.sp.gov.br/barra-govsp/img/i-twitter.png" alt="Twitter Governo de São Paulo"></a>
    
                        <a class="govsp-social" href="https://www.instagram.com/governosp/" target="_blank" title="Instagram Governo de São Paulo"><img class="govsp-icon-social" src="https://saopaulo.sp.gov.br/barra-govsp/img/i-insta.png" alt="Instagram Governo de São Paulo"></a>
                        
                        <a class="govsp-social" href="https://www.facebook.com/governosp/" target="_blank" title="Facebook Governo de São Paulo (nova janela)"><img class="govsp-icon-social" src="https://saopaulo.sp.gov.br/barra-govsp/img/i-facebook.png" alt="Facebook Governo de São Paulo"></a>                       
                        
                        <p class="govsp-social">/governosp</p>
                        <div id="separador-nav"></div>
                        <a class="govsp-acessibilidade" href="#" id="aumentaFonte" accesskey="2" title="Aumentar Fonte"><img class="govsp-acessibilidade" src="https://saopaulo.sp.gov.br/barra-govsp/img/i-big-font.png" alt="Aumentar Fonte"></a>

                        <a class="govsp-acessibilidade" href="#" id="reduzFonte" accesskey="3" title="Diminuir Fonte"><img class="govsp-acessibilidade" src="https://saopaulo.sp.gov.br/barra-govsp/img/i-small-font.png" alt="Diminuir Fonte"></a>

                        <a class="govsp-acessibilidade" href="#" id="altocontraste" accesskey="4" title="Aplicar contraste"><img class="govsp-acessibilidade" src="https://saopaulo.sp.gov.br/barra-govsp/img/i-contrast.png" alt="Contraste"></a>

                        <a class="govsp-acessibilidade" href="https://www.saopaulo.sp.gov.br/fale-conosco/comunicar-erros/" accesskey="5" target="_blank"><img class="govsp-acessibilidade" src="https://saopaulo.sp.gov.br/barra-govsp/img/i-error-report.png" alt="Símbolo de exclamação dentro de triângulo"></a>                        
                </nav>
            </div>
            <div class="govsp-kebab" id="govsp-kebab">
                    <figure></figure>
                    <figure class="govsp-middle" id="govsp-middle"></figure>
                    <span class="govsp-cross" id="govsp-cross"></span>
                    <figure></figure>
                    <ul class="govsp-dropdown" id="govsp-dropdown">               
                        <li><a class="govsp-link digital" href="https://spmaisdigital.sp.gov.br" target="_blank" title="Site SP + Digital">SP + Digital</a>

                        </li><li><a class="govsp-social" href="https://www.flickr.com/governosp/" target="_blank" title="Flickr Governo de São Paulo"><img class="govsp-icon-social" src="https://saopaulo.sp.gov.br/barra-govsp/img/i-flickr.png" alt="Flickr Governo de São Paulo"></a></li>
                        
                        <li><a class="govsp-social" href="https://www.linkedin.com/company/governosp/" target="_blank" title="Linkedin Governo de São Paulo"><img class="govsp-icon-social" src="https://saopaulo.sp.gov.br/barra-govsp/img/i-linkedin.png" alt="Linkedin Governo de São Paulo"></a></li>

                        <li><a class="govsp-social" href="https://www.tiktok.com/@governosp" target="_blank" title="TikTok Governo de São Paulo"><img class="govsp-icon-social" src="https://saopaulo.sp.gov.br/barra-govsp/img/i-tiktok.png" alt="TikTok Governo de São Paulo"></a></li>

                        <li><a class="govsp-social" href="https://www.twitter.com/governosp/" target="_blank" title="Twitter Governo de São Paulo"><img class="govsp-icon-social" src="https://saopaulo.sp.gov.br/barra-govsp/img/i-twitter.png" alt="Twitter Governo de São Paulo"></a></li>
                        
                        <li><a class="govsp-social" href="https://www.youtube.com/governosp/" target="_blank" title="Youtube Governo de São Paulo"><img class="govsp-icon-social" src="https://saopaulo.sp.gov.br/barra-govsp/img/i-youtube.png" alt="Youtube Governo de São Paulo"></a></li> 

                        <li><a class="govsp-social" href="https://www.instagram.com/governosp/" target="_blank" title="Instagram Governo de São Paulo"><img class="govsp-icon-social" src="https://saopaulo.sp.gov.br/barra-govsp/img/i-insta.png" alt="Instagram Governo de São Paulo"></a></li>
                      
                        <li><a class="govsp-social" href="https://www.facebook.com/governosp/" target="_blank" title="Acessar o Facebook do Governo de São Paulo"><img class="govsp-icon-social" src="https://saopaulo.sp.gov.br/barra-govsp/img/i-facebook.png" alt="Acessar o Facebook Governo de São Paulo"></a></li>
                        
                        <li><p class="govsp-social">/governosp</p></li>
                    </ul> 
            </div>
        </div>
        
        <script src="https://saopaulo.sp.gov.br/barra-govsp/js/script-topo.js"></script>
        <script src="https://saopaulo.sp.gov.br/barra-govsp/js/script-contrast-govsp.js"></script>
        <script src="https://saopaulo.sp.gov.br/barra-govsp/js/script-tamanho-fonte-govsp.js"></script>
        <script src="https://saopaulo.sp.gov.br/barra-govsp/js/script-scroll.js"></script>
        <noscript>
          Seu navegador não tem suporte a JavaScript ou está desativado!</noscript>
    </section>
    <hr class="line-header-buy">
    <?php get_template_part( 'template-parts/menu-hamburguer-lateral' ); ?>