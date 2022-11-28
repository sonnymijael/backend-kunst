<?php
  require("Connection.php");

  class Customer{
    private $id;
    private $name;
    private $surname;
    private $email;
    private $phone;
    private $password;

    public function setId($id){ $this->id = $id; }
    public function setName($name){ $this->name = $name; }
    public function setSurname($surname){ $this->surname = $surname; }
    public function setEmail($email){ $this->email = $email; }
    public function setPhone($phone){ $this->phone = $phone; }
    public function setPassword($password){ $this->password = $password; }

    public function getResponse($status = false){
			if($status) return array('status' => true);
			else return array('status' => false);
		}
    
    protected function handle_verify_password($currentPassDB){
      return $this->getResponse(password_verify($this->password, $currentPassDB));
    }

    protected function handle_email_exist(){
      $connection = new Connection();
       $request = $connection->prepare(
        "SELECT email FROM `Customer` WHERE email = :email Limit 1"
      );
      $request->bindParam(":email", $this->email);
      $request->execute();      
      return ($request->fetchColumn() === $this->email ? true : false);
    }

    public function register(){
      if($this->handle_email_exist()) return array('status' => 'El email ya existe');
      $connection = new Connection();
      $request = $connection->prepare(
        "INSERT INTO `Customer` (`id`, `name`, `surname`, `email`, `phone`, `password`) VALUES (NULL, :name, :surname, :email, :phone, :password)"
      );
      $request->bindParam(':name', $this->name);
      $request->bindParam(':surname', $this->surname);
      $request->bindParam(':email', $this->email);
      $request->bindParam(':phone', $this->phone);
      $request->bindParam(':password', password_hash( $this->password, PASSWORD_DEFAULT ));
      $request->execute();
      return $this->getResponse(($connection->lastInsertId() != "0" ? True : False ));
    }
    
    public function update(){
      $connection = new Connection();
      $request = $connection->prepare(
        "UPDATE `Customer` SET name = :name, surname = :surname, phone = :phone WHERE email = :email"
      );
      $request->bindParam(':name', $this->name);
      $request->bindParam(':surname', $this->surname);
      $request->bindParam(':phone', $this->phone);
      $request->bindParam(':email', $this->email);
      $request->execute();
      return $this->getResponse($request->rowCount());
    }

    public function delete(){
      $connection = new Connection();
      $request = $connection->prepare(
        "DELETE FROM `Customer` WHERE email = :email"
      );
      $request->bindParam(':email', $this->email);
      $request->execute();
      return $this->getResponse($request->rowCount());
    }

    public function login(){
       $connection = new Connection();
       $request = $connection->prepare(
        "SELECT password FROM `Customer` WHERE email = :email Limit 1"
      );
      $request->bindParam(":email", $this->email);
      $request->execute();
      return $this->handle_verify_password($request->fetchColumn());
    }

    public function getById(){
      $connection = new Connection();
      $request = $connection->prepare(
        "SELECT * FROM `Customer` WHERE id = :id"
      );
      $request->bindParam(':id', $this->id);
      $request->execute();
      return $request->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAll(){
      $connection = new Connection();
      $request = $connection->prepare(
        "SELECT * FROM `Customer`"
      );
      $request->execute(); 
      return $request->fetchAll(PDO::FETCH_ASSOC);     
    }
  }
?>