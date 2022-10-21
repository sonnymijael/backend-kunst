<?php
  require("Conexion.php");

  class Customer{
    private $id;
    private $email;
    private $password;

    public function __construct(){
      // login first
      // register first callback
    }

    public function setEmail($email){
      $this->email = $email;
    }

    public function setPassword($password){
      $this->password = $password;
    }

    public function getResponse($status){
			if($status) return array('status' => true);
			else return array('status' => false);
		}

    // Functions to basic { update,  delete, register }
    protected function update(){
      // update customer { name, surname, email, phone }
    }

    public function register(){
      // object of connection to database
      $conexion = new Conexion();

      $consulta = $conexion->prepare("
        INSERT INTO 
          `Customer` 
            (`id`, `email`, `password`) 
          VALUES 
            (NULL, :email, :password);
      ");
      $consulta->bindParam(":email", $this->email);
      $consulta->bindParam(":password", password_hash( $this->password, PASSWORD_DEFAULT ));
      $consulta->execute();
      if($conexion->lastInsertId() === "0"){
        return $this->getResponse(false);
      }else{
        return $this->getResponse(true);
      }
    }

    // Functions to session { login, logout }
    public function login(){
       $conexion = new Conexion();
       $consulta = $conexion->prepare("
        SELECT password FROM 
          `Customer` 
            WHERE email = :email 
            Limit 1
      ");
      $consulta->bindParam(":email", $this->email);
      $consulta->execute();      
      return $this->handleVerifyPassword($consulta->fetchColumn());
    }

    public function logout(){
      // logout function $status = false
    }

    public function getAll(){
      $conexion = new Conexion();
      $consulta = $conexion->prepare("
       SELECT * FROM 
         `Customer` 
      ");
      $consulta->execute(); 
      return $consulta->fetchAll(PDO::FETCH_ASSOC);     
    }

    // Functions to protected and verify session or information
    protected function handleVerifyPassword($currentPassDB){
      return $this->getResponse(password_verify($this->password, $currentPassDB));
    }
  }