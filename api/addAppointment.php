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

    $data = json_decode(file_get_contents("php://input"));

    $item->AppointmentID = $data->AppointmentID;
    $item->Patient = $data->Patient;
    $item->PrepNurse = $data->PrepNurse;
    $item->Physician = $data->Physician;
    $item->Start = date('Y-m-d H:i:s');
    $item->End = date('Y-m-d H:i:s');
    $item->ExaminationRoom = $data->ExaminationRoom;
    
    if($item->createAppointment()){
        echo 'Appointment created successfully.';
    } else{
        echo 'Appointment could not be created.';
    }
?>