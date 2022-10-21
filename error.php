<?php
  date_default_timezone_set('America/Los_Angeles');

  header("Access-Control-Allow-Origin: *");
  header('Access-Control-Allow-Credentials: true');
  header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS');
  header('Content-Type: application/json');

  echo json_encode([ 'error' => 'verifica que la direccion que deseas consultar sea correcta' ]);
?>