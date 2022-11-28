<?php
  date_default_timezone_set('America/Los_Angeles');

  header("Access-Control-Allow-Origin: *");
  header('Access-Control-Allow-Credentials: true');
  header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS');
  header('Content-Type: application/json');

  echo json_encode([ '505' => 'Internal server error' ]);
?>