<?php
    require("./class/Customer.php");

    $customer = new Customer();

    $option_check = false;

    $list_actions = [
        "all"
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
          echo json_encode([
            ["name" => "Echauri", "latitud" => 23.097069089850933, "longitud" => -82.35006433419622, "state" => "Blvd. Costero", "active" => false],
            ["name" => "Manzanillo", "latitud" => 23.097069089850933, "longitud" => -82.35006433419622, "state" => "Fondeport" ,"active" => true]          
          ]);
        }

      }else{
        // $one = \in_array('one', array_keys(\filter_input_array(INPUT_GET)));
        // $register = \in_array('register',array_keys(\filter_input_array(INPUT_GET)));
        // $login = \in_array('login',array_keys(\filter_input_array(INPUT_GET)));

        // if($one){
        //   $customer->setId($_POST['id']);
        //   echo json_encode($customer->getById());
        // }

        // if($login){
        //   $customer->setEmail($_POST['email']);
        //   $customer->setPassword($_POST['password']);
        //   echo json_encode($customer->login());
        // }
        
        // if($register){
        //   $customer->setEmail($_POST['email']);
        //   $customer->setPassword($_POST['password']);
        //   echo json_encode($customer->register());
        // }
      }
    }
