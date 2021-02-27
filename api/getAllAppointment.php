<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../config/database.php';
    include_once '../model/appointment.php';

    $database = new Database();
    $db = $database->getConnection();

    $items = new Appointment($db);

    $stmt = $items->getAppointments();
    $itemCount = $stmt->rowCount();

    if($itemCount > 0){
        
        $app_arr = array();
        

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "AppointmentID" => $AppointmentID,
                "Patient_id" => $Patient_id,
                "Patient_first_name" => $Patient_first_name,
                "Patient_last_name" => $Patient_last_name,
                "Patient_email" => $Patient_email,
                "Patient_phone" => $Patient_phone,
                "PrepNurse" => $PrepNurse,
                "Physician" => $Physician,
                "Start" => $Start,
                "End" => $End,
                "ExaminationRoom" => $ExaminationRoom
            );

            array_push($app_arr, $e);
        }
        echo json_encode($app_arr);
    }

    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No record found.")
        );
    }
?>