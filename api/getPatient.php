<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../config/database.php';
    include_once '../model/patient.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new Patient($db);

    $item->id = isset($_GET['id']) ? $_GET['id'] : die();
  
    $item->getSinglePatient();

    if($item->first_name != null){
        // create array
        $pat_arr = array(
            "id" =>  $item->id
        );
      
        http_response_code(200);
        // echo json_encode($pat_arr);
    }
      
    else{
        http_response_code(404);
        echo json_encode("Patient not found.");
    }
?>