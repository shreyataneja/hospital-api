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
    $item->Patient_first_name = $data->Patient_first_name;
    $item->Patient_last_name = $data->Patient_last_name;
    $item->Patient_email = $data->Patient_email;
    $item->Patient_phone = $data->Patient_phone;
    $item->PrepNurse = $data->PrepNurse;
    $item->Physician = $data->Physician;
    $item->Start = date('Y-m-d H:i:s');
    $item->End = date('Y-m-d H:i:s');
    $item->ExaminationRoom = $data->ExaminationRoom;
    
    if($item->updateAppointment()){
        echo json_encode("Appointment data updated.");
    } else{
        echo json_encode("Data could not be updated");
    }
?>