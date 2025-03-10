<?php
  /**
   * Template Name: [ITSM] FORMULARIO CONCLUIDO
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

  /* CAMPOS */

// 
  $tokenAuth   = $_POST['tokenID'];
  $request     = isset( $_POST['request'] ) ? $_POST['request'] : '';

  $subject     = isset( $_POST['subject'] ) ? $_POST['subject'] : '';
  $fullname    = isset( $_POST['fullname'] ) ? $_POST['fullname'] : '';
  $cpf         = isset( $_POST['cpf'] ) ? $_POST['cpf'] : '';
  $cnpj        = isset( $_POST['cnpj'] ) ? $_POST['cnpj'] : '';
  $email       = isset( $_POST['email'] ) ? $_POST['email'] : '';
  $phones       = isset( $_POST['phones'] ) ? $_POST['phones'] : '';
  $number_uasg = isset( $_POST['number_uasg'] ) ? $_POST['number_uasg'] : '';
  $compra_contrato = isset( $_POST['compra_contrato'] ) ? $_POST['compra_contrato'] : '';
  $description = isset( $_POST['description'] ) ? $_POST['description'] : '';

	   if(isset($_FILES['attachment']) && $_FILES['attachment']['error'] === 0) {

		$upload_dir = wp_upload_dir();

		$randomico = $randomico.rand(0,99);		
		
		$temp_file  = $_FILES['attachment']['tmp_name'];
		$file_name  = $_FILES['attachment']['name'];
				
		$final_file = '/incidentes/'.$randomico.'-' . $file_name;
		
		$target_path = $upload_dir['basedir'] . $final_file;
		   
		move_uploaded_file( $temp_file, $target_path );
		$url_itsm = home_url().'/wp-content/uploads'.$final_file;

	}

  $has_request     = $request ? "Tipo: |$request|\n" : '';
  $has_subject     = $subject ? "Assunto: |$subject| \n" : '';
  $has_fullname    = $fullname ? "Nome Completo: |$fullname|\n" : '';
  $has_cpf    = $cpf ? "CPF: |$cpf|\n" : '';
  $has_cnpj        = $cnpj ? "CNPJ (Fornecedor): |$cnpj|\n" : '';
  $has_email       = $email ? "E-mail: |$email|\n" : '';
  $has_phones      = $phones ? "Telefone/Celular: |$phones|\n" : '';
  $has_number_uasg = $number_uasg ? "Número da UASG: |$number_uasg|\n" : '';
  $has_compra_contrato = $compra_contrato ? "Número da Compra/Contrato: |$compra_contrato|\n" : '';
  $has_description = $description ? "Descrição: |$description|\n" : '';
  $has_anexo 	   = $url_itsm ? "Anexo: |$url_itsm|" : '';

	$fields = "$has_request$has_subject$has_fullname$has_cpf$has_cnpj$has_email$has_mobile$has_phones$has_number_uasg$has_compra_contrato$has_description$has_anexo";

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

  /* API REST - URL */
  $endpoint = 'https://panelas-app2:8443/api/arsys/v1.0/entry/HPD:IncidentInterface_Create?fields=values(Incident%20Number)';

  $payload = [
    'values' => [
      'z1D_Action'          => 'CREATE',
      'Corporate ID'        => 'INTEGRACAO_COMPRAS_GOV_BR',
      'TemplateID'          => $templateID,
      'Detailed_Decription' => $fields,
		      'z1D_Details'             => 'anexo',
		  'z1D_Activity_Type'       => 8000,
		  'z1D_CommunicationSource' => 9000,
		  'z1D_Secure_Log'          => 0,
		  'z1D_View_Access'         => 0,

    ],
  ];

  $data = json_encode( $payload );

  /* API REST - CHAMADA */
  $response = wp_remote_post( $endpoint, [
    'method'    => 'POST',
    'sslverify' => false,
    'params'    => ['fields' => 'values(Incident Number)'],
    'headers'   => ['Authorization' => 'AR-JWT ' . $tokenAuth . '', 'Content-Type' => 'application/json'], 
	  'body'      => $data,
    'cookies'   => [],
  ],
  );


  /* API REST - TRATAMENTO DA RESPOSTA */
  if ( is_wp_error( $response ) ) {
    echo $response->get_error_message();
    return false;

  } else {
    $api_response    = json_decode( wp_remote_retrieve_body( $response ), true );
    $protocoloNumber = $api_response['values']['Incident Number'];

    /* API REST - LOGOUT */
    $responseToken = wp_remote_post(
      'https://panelas-app2:8443/api/jwt/logout',
      [
        'method'      => 'POST',
        'sslverify'   => FALSE,
        'timeout'     => 100,
        'redirection' => 5,
        'httpversion' => '1.0',
        'blocking'    => true,
        'headers'     => ['Authorization' => 'AR-JWT ' . $tokenAuth . '', 'Content-Type' => 'application/json'],
      ]
    );
	  
  $content_email = 
  'Sua requisição foi enviada. Em breve, entraremos em contato! <br> 
  O protocolo do seu atendimento é: <b>'.$protocoloNumber.'</b><br>
  Segue abaixo os dados informados:<br><br> '.
  
  'Tipo: '.$request.'<br>'.	 
  'Assunto: '.$subject.'<br>'.
  'Nome Completo: '.$fullname.'<br>'.
  'CPF: '.$cpf.'<br>'.
  'CNPJ (Fornecedor): '.$cnpj.'<br>'.
  'E-mail: '.$email.'<br>'.
  'Telefone/Celular: '. $phones.'<br>'.
  'Número da UASG: '. $number_uasg.'<br>'.
  'Número da Compra/Contrato: '. $compra_contrato.'<br>'.
  'Descrição: '. $description;

  $to = $email;
  $subject = $subject;
  $body = $content_email;
	  
    $headers = array('Content-Type: text/html; charset=UTF-8');
    
    wp_mail( $to, $subject, $body, $headers);
	
// 	$target_path_exclude = $upload_dir['basedir'] . '/incidentes/' . $_FILES['attachment']['name'];

// 	if ( file_exists( $target_path_exclude ) ) {
// 	  unlink( $target_path_exclude );
// 	}
  }

?>
<section id="itsm">
  <div class="container">
    <div class="col-md-12 mb-2">
      <h2>Solicitação</h2>
      <h4>Sua requisição foi enviada. Em breve, entraremos em contato!<br> O protocolo do seu atendimento é: <span class="elementor-heading-title"><?php echo $protocoloNumber; ?></span><br/><br/>Segue abaixo os dados informado:</h4>
      <p><b>Tipo: </b><?php echo $request; ?></p>
	  <p><b>Assunto: </b><?php echo $subject ?></p>
      <p><b>Nome Completo: </b><?php echo $fullname ?></p>
      <p><b>CPF: </b><?php echo $cpf ?></p>
      <?php echo $cnpj ? "<p><b>CNPJ (Fornecedor):</b> $cnpj</p>" : ''; ?>
      <p><b>E-mail: </b><?php echo $email ?></p>
      <p><b>Telefone/Celular:</b> <?php echo $phones; ?></p>
<?php echo $number_uasg ? "<p><b>Número da UASG:</b> $number_uasg</p>" : ''; ?>
		<p><b>Número da Compra/Contrato:</b> <?php echo $compra_contrato; ?></p>
      <p><b>Descrição: </b><?php echo $description  ?></p>				
    </div>
  </div>
</section>

<?php

//     if ( !$protocoloNumber ) {
//       wp_redirect( 'formulario-itsm' );
//     }

get_footer();