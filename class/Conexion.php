<?php
  header("Access-Control-Allow-Origin: *");
  header('Access-Control-Allow-Credentials: true');
  header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS');
  header('Content-Type: application/json');

  class Conexion extends PDO {
    // connection parameters for PDOStatement::execute()
    private $tipo_de_base = 'mysql';
		private $host = '65.99.252.179';
		private $nombre_de_base = 'sonnymij_kusnt';
		private $usuario = 'sonnymij_jorgekusnt';
		private $contrasena = 'I{&YRsa@am)?';

		public function __construct(){
			try{
				parent::__construct("{$this->tipo_de_base}:dbname={$this->nombre_de_base};host={$this->host};charset=utf8", $this->usuario, $this->contrasena);
			}catch(PDOException $e){
				echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
				exit;
			}
		}

  }
?>
