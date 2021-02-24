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


    echo json_encode($itemCount);

    if($itemCount > 0){
        
        $app_arr = array();
        $app_arr["body"] = array();
        $app_arr["itemCount"] = $itemCount;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "AppointmentID" => $AppointmentID,
                "Patient" => $Patient,
                "PrepNurse" => $PrepNurse,
                "Physician" => $Physician,
                "Start" => $Start,
                "End" => $End,
                "ExaminationRoom" => $ExaminationRoom
            );

            array_push($app_arr["body"], $e);
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