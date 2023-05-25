<?php
//$contact = get_page_by_title('contato');

function api_email_post($request)
{
  $name = $request['contact-name'];
  $phone = $request['contact-phone'];
  $email = $request['contact-email'];


  $to = "davi4alves@gmail.com";
  $subject = $phone;
  $message = $request['contact-message'];
  $headers = "From: " . $name . " <" . $email . ">\r\n";

  if (wp_mail($to, $subject, $message, $headers)) {
    $response = array(
      'success' => 'Email enviado com sucesso, aguarde o contato',
      'status' => 'Email enviado',
      'method' => 'POST',
      'email' => [
        'name' => $name,
        'phone' => $phone,
        'email' => $email,
        'message' => $message
      ]
    );
  } else {
    $response = array(
      'code'=> false,
      'err'=> 'Houve um erro no envio do email',
      'status' => 'Email falhou',
    );
  }


  return rest_ensure_response($response);
}

function registrar_api_email_post($request)
{
  register_rest_route('api', '/email', [
    [
      'methods' => WP_REST_Server::CREATABLE,
      'callback' => 'api_email_post'
    ]
  ]);
}

add_action('rest_api_init', 'registrar_api_email_post');
