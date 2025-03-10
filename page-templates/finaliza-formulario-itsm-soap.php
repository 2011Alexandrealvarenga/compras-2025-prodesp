<?php
  /**
   * Template Name: FORMULARIO CONCLUIDO soap novo
   * Template Post Type: post, page, event
   *
   * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
   *
   * @package Prodesp
   */

  get_header();

  /* ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
   *
   * [ITSM - HOMOLOGAÇÃO] - POST para pegar o token de acesso
   * @since 1.0.0
   * Author: Gabriel Gouveia
   *
   * ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
   **/


// inicio - verificacao se marcou o captcha
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recaptchaResponse = $_POST['g-recaptcha-response'];

    // Verifique se o reCAPTCHA foi marcado
    if (empty($recaptchaResponse)) {
		header('location: fale-conosco');
		exit;
    } 
}
// fim -- verificacao se marcou o captcha
// inicio - Verifica se foram enviados dados senão redireciona para a pagina inicial
if(
	!isset($_POST['fullname']) ||
	!isset($_POST['cpf']) ||
	!isset($_POST['email']) ||
	!isset($_POST['phones'])	
){
	header('location: fale-conosco');
	exit;
}
// fim - Verifica se foram enviados dados senão redireciona para a pagina inicial

// inicio - validar se o arquivo contem  caracter especial
// function validar_nome_arquivo($file_name) {

// 	if (preg_match('/[^a-zA-Z0-9._-]/', $file_name)) {
//         return false; 
//     }
//     return true; 
// }
// fim - validar se o arquivo contem  caracter especial

// inicio
if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] === UPLOAD_ERR_OK) {
  $fileTmpPath = $_FILES['attachment']['tmp_name'];
  $file_name = $_FILES['attachment']['name'];
		
  $file_size = $_FILES['attachment']['size'];
  $file_type = htmlspecialchars($_FILES['attachment']['type']);
  
  $fileContent = file_get_contents($fileTmpPath);
    
  $file_size_str = (string) $file_size;
  $base64Encoded = base64_encode($fileContent);
	
	// 	verificar a extensão
	$fileExtension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
	
	if ($fileExtension === 'js') {		
		header('location: fale-conosco');
		exit;
	}else{
		$file_name;
	}
	
	    // Validando o nome do arquivo se tem caracteres especiais
//     if (validar_nome_arquivo($file_name)) {

//     } else {
// 		header('location: fale-conosco');
// 		exit;
//     }
	
	
} else {
	//   echo "Error uploading file. Error code: " . $_FILES['attachment']['error'];
}
// fim
// 	 $phones       = $_POST['phones'] ='123456';
// 	 
   $request     = isset( $_POST['request'] ) ? sanitize_text_field($_POST['request']) : '';
   $subject     = isset( $_POST['subject'] ) ? sanitize_text_field($_POST['subject']) : '';
   $fullname    = isset( $_POST['fullname'] ) ? sanitize_text_field($_POST['fullname']) : '';
   $cpf         = isset( $_POST['cpf'] ) ? sanitize_text_field($_POST['cpf']) : '';   
   $email       = isset( $_POST['email'] ) ? sanitize_email($_POST['email']) : '';
   $phones       = isset( $_POST['phones'] ) ? sanitize_text_field($_POST['phones']) : '';
   $number_uasg = isset( $_POST['number_uasg'] ) ? sanitize_text_field($_POST['number_uasg']) : '';
   $cnpj        = isset( $_POST['cnpj'] ) ? sanitize_text_field($_POST['cnpj']) : '';

// 	if(strlen($number_uasg) == 6 || strlen($cnpj) == 18 ){			
// 	}else{		
// 		header('location: fale-conosco');
// 		exit;
// 	}
// 	if(strlen($phones) == 14 ){			
// 	}else{		
// 		 echo '<p style="color: red;">Número de telefone incorreto, tente digitar novamente</p>';   
// 	}
// 	if(strlen($cpf) == 14 ){	
// 	}else{		
// 		header('location: fale-conosco');
// 		exit;
// 	}

   $compra_contrato = isset( $_POST['compra_contrato'] ) ? sanitize_text_field($_POST['compra_contrato']) : '';
   $description = isset( $_POST['description'] ) ? sanitize_textarea_field($_POST['description']) : '';

   $has_request     = $request ? "Tipo: |$request|\n" : '';
   $has_subject     = $subject ? "Assunto: |$subject| \n" : '';
   $has_fullname    = $fullname ? "Nome Completo: |$fullname|\n" : '';
   $has_cpf    = $cpf ? "CPF: |$cpf|\n" : '';
   $has_cnpj        = $cnpj ? "CNPJ (Fornecedor): |$cnpj|\n" : '';
   $has_email       = $email ? "E-mail: |$email|\n" : '';
   $has_phones      = $phones ? "Telefone/Celular: |$phones|\n" : '';
   $has_number_uasg = $number_uasg ? "UASG (Unidade): |$number_uasg|\n" : '';
   $has_compra_contrato = $compra_contrato ? "Número da Compra/Contrato: |$compra_contrato|\n" : '';
   $has_description = $description ? "Descrição: |$description|\n" : '';  
 
   $fields = "$has_request$has_subject$has_fullname$has_cpf$has_email$has_phones$has_cnpj$has_number_uasg$has_compra_contrato$has_description";


switch ( $request ) {
  case 'Solicitação':
    $templateID = 'AGGAA5V0H21J7ASGBHS8SFAQBDUQSB';
    break;
  case 'Dúvida':
    $templateID = 'AGGAA5V0H21J7ASGBHY7SFAQHBUQUE';
    break;
  case 'Falha':
    $templateID = 'AGGAA5V0H21J7ASGBICZSFAQ19UQWA';
    break;
  }

$tem_tipo       = $request ? "Tipo: $request<br>" : "<br>";
$tem_assunto       = $subject ? "Assunto: $subject<br>" : "<br>";
$tem_nome       = $fullname ? "Nome Completo: $fullname<br>" : "<br>";
$tem_cpf       = $cpf ? "CPF: $cpf<br>" : "<br>";
$tem_email       = $email ? "E-mail: $email<br>" : "<br>";
$tem_phones       = $phones ? "Telefone/Celular: $phones<br>" : "<br>";
$tem_anexo       = $file_name ? "Arquivo enviado: $file_name<br>" : "";
$tem_uasg        = $number_uasg ? "UASG (Unidade): $number_uasg<br>" : "";
$tem_cnpj        = $cnpj ? "CNPJ (Fornecedor): $cnpj<br>" : "";
$tem_compra_contrato        = $compra_contrato ? "Número da Compra/Contrato: $compra_contrato<br>" : "";
$tem_description       = $description ? "Descrição: $description<br>" : "";
  
$username = "INTEGRACAO_COMPRAS_GOV_BR";
$password = "INTEGRACAO_COMPRAS_GOV_BR";
$soapHeaders = array(
    "Content-Type: text/xml; charset=utf-8",
    "SOAPAction: \"\"" 
);


$soapRequest = <<<XML
<?xml version="1.0" encoding="utf-8"?>
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:urn="urn:HPD_IncidentInterface_Create_WS">
   <soapenv:Header>
      <urn:AuthenticationInfo>
         <urn:userName>$username</urn:userName>
         <urn:password>$password</urn:password>
      </urn:AuthenticationInfo>
   </soapenv:Header>
   <soapenv:Body>
      <urn:HelpDesk_Submit_Service>
         <urn:First_Name>Usuario Automatico</urn:First_Name>
         <urn:Impact></urn:Impact>
         <urn:Last_Name>INTEGRACAO COMPRAS GOV BR</urn:Last_Name>
         <urn:Reported_Source></urn:Reported_Source>
         <urn:Service_Type></urn:Service_Type>
         <urn:Status></urn:Status>
         <urn:Summary></urn:Summary>
         <urn:Urgency></urn:Urgency>
         <urn:Action>CREATE</urn:Action>
         <urn:Corporate_ID>INTEGRACAO_COMPRAS_GOV_BR</urn:Corporate_ID>
         <urn:TemplateID>$templateID</urn:TemplateID>
         <urn:Notes>$fields</urn:Notes>
         <urn:Work_Info_Summary>Compras Gov</urn:Work_Info_Summary>
         <urn:Work_Info_Notes>Anexo Compras Gov</urn:Work_Info_Notes>
         <urn:Work_Info_Type>8000</urn:Work_Info_Type>
         <urn:Work_Info_Locked>0</urn:Work_Info_Locked>
         <urn:Work_Info_View_Access>0</urn:Work_Info_View_Access>
		<urn:WorkInfoAttachment1Name>$file_name</urn:WorkInfoAttachment1Name>
         <urn:WorkInfoAttachment1Data>$base64Encoded</urn:WorkInfoAttachment1Data>
         <urn:WorkInfoAttachment1OrigSize>$file_size</urn:WorkInfoAttachment1OrigSize>
      </urn:HelpDesk_Submit_Service>
   </soapenv:Body>
</soapenv:Envelope>
XML;

$ch = curl_init();
// homologacao
if(get_site_url() == 'http://compras.homologacao.sp.gov.br') :
    $soapUrl    = "http://lajedo-app1/arsys/services/ARService?server=panelas-app2&webService=HPD_IncidentInterface_Create_WS";

// produção
elseif(get_site_url() == 'https://compras.sp.gov.br') :
    $soapUrl    = "https://servicesintegracoes.prodesp.sp.gov.br:8443/api/arsys/v1.0/entry/HPD:IncidentInterface_Create?fields=values(Incident%20Number)";

// não for produção ou homologação
else :
   $soapUrl    = '';
endif;

curl_setopt($ch, CURLOPT_URL, "http://lajedo-app1/arsys/services/ARService?server=panelas-app2&webService=HPD_IncidentInterface_Create_WS");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $soapRequest);
curl_setopt($ch, CURLOPT_HTTPHEADER, $soapHeaders);

curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'cURL Error: ' . curl_error($ch);
} else {
    $response;
}
$protocoloNumber = $response;
   // inicio - envio email
      $content_email = 
      'Sua requisição foi enviada. Em breve, entraremos em contato! <br> 
      O protocolo do seu atendimento é: <b>'.$protocoloNumber.'</b><br>
      Segue abaixo os dados informados:<br><br> '.
		  		  
		$tem_tipo.      
		$tem_assunto.     
		$tem_nome.      
		$tem_cpf.      
		$tem_email.     
		$tem_phones.                
		$tem_uasg.       
		$tem_cnpj.
		$tem_compra_contrato. 
		$tem_description.
		$tem_anexo;      

      $to = $email;
      $subject = $subject;
      $body = $content_email;
         
      $headers = array('Content-Type: text/html; charset=UTF-8');
      
      wp_mail( $to, $subject, $body, $headers);
   // fim - envio de email
curl_close($ch);
?>

<section id="itsm">
  <div class="container">
    <div class="col-md-12 mb-2">
      <h2>Solicitação</h2>
      <h4>Sua requisição foi enviada. Em breve, entraremos em contato!<br> O protocolo do seu atendimento é: <span class="elementor-heading-title"><?php echo $protocoloNumber; ?></span><br/><br/>
		  Seguem abaixo os dados informados:</h4>
      <p><b>Tipo: </b><?php echo $request; ?></p>
	  <p><b>Assunto: </b><?php echo $subject ?></p>
      <p><b>Nome Completo: </b><?php echo $fullname ?></p>
      <p><b>CPF: </b><?php echo $cpf ?></p>     
      <p><b>E-mail: </b><?php echo $email ?></p>
      <p><b>Telefone/Celular:</b> <?php echo $phones; ?></p>			  				
		<?php echo $cnpj ? "<p><b>CNPJ (Fornecedor):</b> $cnpj</p>" : ''; ?>
		<?php echo $number_uasg ? "<p><b>UASG (Unidade):</b> $number_uasg</p>" : ''; ?>	
		<?php echo $compra_contrato ? "<p><b>Número da Compra/Contrato:</b> $compra_contrato</p>" : ''; ?>
      <p><b>Descrição: </b><?php echo $description  ?></p>
		<?php echo $file_name ? "<p><b>Arquivo enviado:</b> $file_name</p>" : ''; ?>
		
		
    </div>
  </div>
</section> 

<?php

//     if ( !$protocoloNumber ) {
//       wp_redirect( 'formulario-itsm' );
//     }

get_footer();