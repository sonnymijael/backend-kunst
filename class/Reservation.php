<?php
    class Reservation{
        private $id;
        private $id_customer_client;
        private $id_customer_doctor;

        public function __construct(){
           // Primera funcion que se ejecuta al crear el objeto
           // $reservation = new Reservation(); 
        }

        public function setId($id){
            $this->id = $id;
        }

        public function getId(){
            return $this->id;
        }

        


    }