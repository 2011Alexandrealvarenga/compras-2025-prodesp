<?php

  /* ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
   *
   * [ITSM - PRODUÇÃO] - POST para pegar o token de acesso
   * @since 1.0.0
   * Author: Gabriel Gouveia
   *
   * ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
   **/

  add_shortcode( 'form_itsm_soap', 'form_itsm_shortcode_soap' );

  function form_itsm_shortcode_soap() {
    ob_start();

    $finalize_form = home_url( 'formulario-concluido-soap' );

    $subjects = [
		'Audesp',
		'Cadastro/HOD',
		'Cadterc',
		'Catálogo',
		'ContabilizaSP',
		'Contratação Direta',
		'Contratos',
		'e-Sanções',
		'ETP',
		'Gestão de Riscos',
		'Integração AUDESP / TCE',
		'Licitação',
		'Normativos',
		'Obrasgov',	
		'Outros',
		'Painéis',
		'PCA',
		'Pesquisa de Preços',
		'SICAF',
		'Termo de Referência',
		
		
    ];
     ?>
<style>.cnpj_field,.uasg_field{display:none}.toggle1:checked~#itsm_conteudo .cnpj_field,.toggle2:checked~#itsm_conteudo .uasg_field{display:block}.compra_area{margin-top:22px}.modal-content-fc .modal{display:none;position:fixed;z-index:1;left:0;top:0;width:100%;height:100%;overflow:auto;background-color:rgb(0 0 0 / .4)}.modal-content-fc .modal .title{text-align:center;color:red;font-weight:700}.modal-content-fc .modal .paragrafo{text-align:center;font-weight:400;margin:0}.modal-content-fc .modal .zip{text-align:center}.modal-content-fc .modal-content{position:relative;background-color:#fefefe;margin:15% auto;padding:20px;border:1px solid #888;width:50%}.modal-content-fc .close{color:#aaa;float:right;font-size:28px;font-weight:700}.btn.btn-close{position:absolute;right:24px;bottom:20px}.modal-content-fc .close:hover,.modal-content-fc .close:focus{color:#000;text-decoration:none;cursor:pointer}@media (max-width:576px){.modal-content-fc .modal-content{width:80%}}.modalCExemplo{display:none;position:fixed;z-index:1;left:0;top:0;width:100%;height:100%;overflow:auto;background-color:#000;background-color:rgb(0 0 0 / .4)}.modal-content-cExemplo{background-color:#fefefe;margin:2% auto;padding:4px;border:1px solid #888;width:70%}.closeCExemplo{color:#aaa;float:right;font-size:28px;font-weight:700}.closeCExemplo:hover,.closeCExemplo:focus{color:#000;text-decoration:none;cursor:pointer}.modalCExemplo img{max-width:100%;height:auto}#callExemplo{cursor:pointer}.content-callExemplo{display:flex;align-items:center}.icon-mao-vermelha{width:48px;height:48px;margin-right:8px}.content-callExemplo p{hyphens:none;margin:0;font-weight:600;font-size:12px}@media screen and (max-width:520px){.modal-content-cExemplo{width:95%}}</style>
<section id="itsm-form">
  <form class="row" id="form_itsm" method="post" action="<?php echo $finalize_form; ?>" enctype="multipart/form-data">
    <div class="col-md-12 mb-2">
      <h6>Campos com a marcação <small>*</small> são obrigatórios.</h6>
    </div>
    <input type="hidden" name="tokenID" value="<?php print( $responceData );?>">
    <div class="col-sm-12 col-md-6 mb-3 item-validation">
      <label for="type_request" class="form-label"><small>*</small> Tipo</label>
      <select id="type_request" class="form-select" name="request">
        <option selected value="">Selecionar</option>
        <option value="Dúvida">Dúvida</option>
        <option value="Falha">Falha</option>		
      </select>
    </div>
    <div class="col-sm-12 col-md-6 mb-3 item-validation">
      <label for="subject" class="form-label"><small>*</small> Assunto</label>
      <select id="subject" class="form-select" name="subject">
        <option selected value="">Selecionar</option>
        <?php
        foreach ( $subjects as $subject ) {?>
        <option value="<?php echo $subject; ?>"><?php echo $subject; ?></option>
        <?php }?>
      </select>
    </div>
    <div class="col-sm-12 col-md-6 mb-3 item-validation">
      <label for="fullname" class="form-label"><small>*</small> Nome Completo</label>
      <input type="text" class="form-control" id="fullname" name="fullname" >
    </div>
    <div class="col-sm-12 col-md-6 mb-3 item-validation">
      <label for="cpf" class="form-label"><small>*</small> CPF</label>
      <input type="text" class="form-control" id="cpf" name="cpf" >
    </div>
	<div class="col-sm-12 col-md-6 mb-3 item-validation">
      <label for="email" class="form-label"><small>*</small> E-mail</label>
      <input type="email" class="form-control" id="email" name="email" >
    </div>
    <div class="col-sm-12 col-md-6 mb-3 item-validation">
      <label for="mobile" class="form-label"><small>*</small> Telefone/Celular</label>
      <input type="tel" class="form-control" id="phones" name="phones" >
    </div>
	<div class="col-sm-12 col-md-6 mb-3">
		  <input type=radio id="toggle2" name="toggle" class="toggle2" checked>
		  <label for="toggle2">UASG (Unidade)   </label>  
		  <input type=radio id="toggle1" name="toggle" class="toggle1">
		  <label for="toggle1" style="margin-right: 8px;">CNPJ (Fornecedor) </label>

		 <section id="itsm_conteudo">
			  <div class="cnpj_field item-validation">
				  <label for="cnpj" class="form-label"><small style="margin-right: 4px;">*</small>Preencha o CNPJ</label>
				  <input type="text" class="form-control" id="cnpj" name="cnpj" maxlength="18">
			  </div>
			  <div class="uasg_field item-validation">
				  <label for="number_uasg" class="form-label"><small style="margin-right: 4px;">*</small>Preencha o número da UASG</label>
				  <input type="text" class="form-control" id="number_uasg" name="number_uasg" maxlength="6" >
			  </div>			  
		  </section>
	</div>
	<div class="col-sm-12 col-md-6 mb-3 item-validation compra_area">
		<label for="compra_contrato" class="form-label"> Número da Compra/Contrato</label>
		<input type="text" class="form-control" id="compra_contrato" name="compra_contrato" aria-invalid="false">			 
    </div>
    <div class="col-md-12 mb-3 item-validation">
      <label for="description" class="form-label"><small>*</small> Descrição Detalhada (2200 caracteres)</label>
      <textarea class="form-control" id="description" style="height: 100px" name="description"></textarea>
    </div>

     <div class="col-md-6 mb-3 item-validation campo_anexo">
<!-- 		<label for="file" class="form-label">Anexar Evidência (Tipos: doc, docx, pdf, jpg, png | Tamanho: 2MB)</label> -->
		  <label for="file" class="form-label">Caso necessite anexar algum documento utilize o campo abaixo: </label>	<br>
		 <label for="file" class="form-label">Tipo de documento: doc, docx, pdf, jpg, png | Tamanho máximo: 2MB</label>	<br><br>
		<input class="form-control" type="file" name="attachment" id="attachment" />			 
	  </div>
	  <div class="col-md-6 mb-3 item-validation campo_anexo">
		  <div class="content-callExemplo">	
			  <img class="icon-mao-vermelha" src="https://compras.sp.gov.br/wp-content/uploads/2024/08/exclamacao-v2.png" >
			  <p>Atenção! Para agilizar o atendimento, sugerimos que anexe o documento conforme <u id="callExemplo">modelo.</u></p>
			  
		  </div>		  
	  </div>
      <div class="col-md-12 mb-3 recaptcha">
        <div class="g-recaptcha" data-sitekey="6Lf4WS8pAAAAAJt92Ez_nvEkJXv7Por8JPwABkJh"></div>		 
      </div> 
    <div class="col-sm-12 col-md-3">
      <button id="sendAPI" type="submit" class="btn btn-primary mb-2">Enviar</button>
    </div>
  </form>

</section>
 <div class="modal-content-fc">
   <div id="myModal" class="modal">
     <div class="modal-content">
       <span class="close fechar">&times;</span>
		<h3 class="title">Atenção!</h3>
       	<p class="paragrafo">A imagem enviada é muito grande. Por favor, envie uma menor que 2MB</p>
		<p class="zip">Sugestão: compactar (zipar) um arquivo ou uma pasta.</p>
		<!-- 		 <div class="btn btn-close fechar">OK</div> -->
     </div>
   </div>
 </div>
<!-- inicio - modal exemplo de imagem  -->
<div id="modalExemplo" class="modalCExemplo">
    <div class="modal-content-cExemplo">
        <span class="closeCExemplo">&times;</span>
        <img src="https://compras.sp.gov.br/wp-content/uploads/2024/08/compras-fale-conosco-exemplo-de-anexo.jpg" alt="Modal Image">
    </div>
</div>

<?php
return ob_get_clean();
}



