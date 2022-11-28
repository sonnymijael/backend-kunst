<?php
    require("./class/Customer.php");

    $customer = new Customer();
    $option_check = false;
    $list_actions = [
        "all",
        "register",
        "login",
        "one",
        "update",
        "delete"
    ];

    foreach($list_actions as $action){
        if($option_check != true){
            $option_check = \in_array($action, array_keys(\filter_input_array(INPUT_GET)));
        }
    }

    if(empty($option_check)){
        echo json_encode([ "404" => "Requested page does not exist" ]);
    }else{
      if(empty($_POST)){
        $all = \in_array('all',array_keys(\filter_input_array(INPUT_GET)));

        if($all){
          echo json_encode($customer->getAll());
        }

      }else{
        // request of session
        $register = \in_array('register',array_keys(\filter_input_array(INPUT_GET)));
        $login = \in_array('login',array_keys(\filter_input_array(INPUT_GET)));
        
        // request of object customer
        $one = \in_array('one', array_keys(\filter_input_array(INPUT_GET)));
        $update = \in_array('update',array_keys(\filter_input_array(INPUT_GET)));
        $delete = \in_array('delete',array_keys(\filter_input_array(INPUT_GET)));

        if($login){
          $customer->setEmail($_POST['email']);
          $customer->setPassword($_POST['password']);
          echo json_encode($customer->login());
        }
        
        if($register){
          $customer->setName($_POST['name']);
          $customer->setSurname($_POST['surname']);
          $customer->setEmail($_POST['email']);
          $customer->setPhone($_POST['phone']);
          $customer->setPassword($_POST['password']);
          echo json_encode($customer->register());
        }

        if($update){
          $customer->setName($_POST['name']);
          $customer->setSurname($_POST['surname']);
          $customer->setEmail($_POST['email']);
          $customer->setPhone($_POST['phone']);
          $customer->setId($_POST['id']);
          echo json_encode($customer->update());
        }

        if($delete){
          $customer->setEmail($_POST['email']);
          echo json_encode($customer->delete());
        }

        if($one){
          $customer->setId($_POST['id']);
          echo json_encode($customer->getById());
        }


      }
    }
