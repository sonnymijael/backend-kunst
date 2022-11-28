<?php
    require("./class/Reservation.php");

    $reservation = new Reservation();

    $option_check = false;

    $list_actions = [
        "delete",
        "update",
        "create"
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
            echo json_encode([ "success" => "Hay una consulta "]);
        }

        if(!empty($_POST)){
            echo json_encode([ "success" => "Hay una consulta "]);
        }
    }


