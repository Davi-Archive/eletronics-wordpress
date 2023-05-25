<?php
//$contact = get_page_by_title('contato');


function api_email_post($request)
{
  $name = $request['contact-name'];
  $phone = $request['contact-phone'];
  $email = $request['contact-email'];


  $to = "contato@codewave.fun";
  $subject = 'Contato da Loja(Form)';
  $message = $request['contact-message'];
  $headers = "From: " . $name . " <" . $email . ">\r\n";

  if (
    !empty($name) &&
    !empty($email) &&
    !empty($phone) &&
    !empty($message)
  ) {

    $formatted_message = "Mensagem do site shop.codewave.fun\nNome: $name\nEmail: $email\nTelefone: $phone \nMensagem: $message";

    $sent = wp_mail($to, $subject, $formatted_message, $headers);
    if ($sent) {
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
        'code' => false,
        'err' => 'Houve um erro no envio do email',
        'status' => 'Email falhou'
      );
    }
  } else {
    $_MESSAGE = "O campo não pode ser vazio";
    $response = array(
      'code' => false,
      'err' => 'Houve um erro no envio do email',
      'status' => 'Email falhou'
    );
    if (empty($subject)) {
      $response['phone'] = $_MESSAGE;
    }
    if (empty($email)) {
      $response['email'] = $_MESSAGE;
    }
    if (empty($name)) {
      $response['name'] = $_MESSAGE;
    }
    if (empty($message)) {
      $response['message'] = $_MESSAGE;
    }
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
