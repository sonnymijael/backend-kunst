<?php
    require("./class/Customer.php");

    $customer = new Customer();

    $option_check = false;

    $list_actions = [
        "all",
        "register",
        "login"
    ];

    foreach($list_actions as $action){
        if($option_check != true){
            $option_check = \in_array($action, array_keys(\filter_input_array(INPUT_GET)));
        }
    }

    if(empty($option_check)){
        echo json_encode([ "error" => "Revisa tu consulta pendejo"]);
    }else{
      if(empty($_POST)){
        $all = \in_array('all',array_keys(\filter_input_array(INPUT_GET)));

        if($all){
          echo json_encode($customer->getAll());
        }

      }else{
        $register = \in_array('register',array_keys(\filter_input_array(INPUT_GET)));
        $login = \in_array('login',array_keys(\filter_input_array(INPUT_GET)));


        if($login){
          $customer->setEmail($_POST['email']);
          $customer->setPassword($_POST['password']);
          echo json_encode($customer->login());
        }
        
        if($register){
          $customer->setEmail($_POST['email']);
          $customer->setPassword($_POST['password']);
          echo json_encode($customer->register());
        }
      }
    }
