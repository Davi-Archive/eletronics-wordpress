<?php

function api_usuario_post($request)
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
      'status'=> 'Email enviado',
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
      'status' => 'Email falhou',
    );
  }


  return rest_ensure_response($response);
}

function api_usuario_get($request)
{
  $response = array(
    'nome' => 'Davi',
    'lol' => 'xp',
    'method' => 'GET'
  );
  return rest_ensure_response($response);
}

function registrar_api_usuario_get($request)
{
  register_rest_route('api', '/usuario', [
    [
      'methods' => WP_REST_Server::READABLE,
      'callback' => 'api_usuario_get'
    ]
  ]);
}

function registrar_api_usuario_post($request)
{
  register_rest_route('api', '/email', [
    [
      'methods' => WP_REST_Server::CREATABLE,
      'callback' => 'api_usuario_post'
    ]
  ]);
}

add_action('rest_api_init', 'registrar_api_usuario_get');
add_action('rest_api_init', 'registrar_api_usuario_post');
