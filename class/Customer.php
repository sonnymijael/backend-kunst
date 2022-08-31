<?php
  class Customer{
    private $id;
    private $name;
    private $surname;
    private $email;
    private $phone;
    private $password;
    private $status; // session

    public function __construct(){
      // login first
      // register first callback
    }

    // Functions to basic { update,  delete, register }
    protected function update(){
      // update customer { name, surname, email, phone }
    }

    public function register(){
      // register function
    }

    // Functions to session { login, logout }
    public function login(){
      // login function $status = true
    }

    public function logout(){
      // logout function $status = false
    }

    // Functions to protected and verify session or information
    protected function handleVerifyPassword(){
      // comprobate password as equal to current in db
    }


  }