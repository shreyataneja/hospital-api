<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../config/database.php';
    include_once '../model/appointment.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new Appointment($db);

    $item->AppointmentID = isset($_GET['AppointmentID']) ? $_GET['AppointmentID'] : die();
  
    $item->getSingleAppointment();

    if($item->AppointmentID != null){
        // create array
        $app_arr = array(
            "AppointmentID" =>  $item->AppointmentID
        );
      
        http_response_code(200);
      //  echo json_encode($app_arr);
    }
      
    else{
        http_response_code(404);
        echo json_encode("Appointment not found.");
    }
?>