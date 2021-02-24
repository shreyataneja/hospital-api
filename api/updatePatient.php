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
    
    $data = json_decode(file_get_contents("php://input"));
    
    $item->id = $data->id;
    
    // Patient values

    $item->first_name = $data->first_name;
    $item->last_name = $data->last_name;
    $item->sex = $data->sex;
    $item->contact_number = $data->contact_number;
    $item->email = $data->email;
    $item->age = $data->age;
    $item->weight = $data->weight;
    $item->height = $data->height;
    $item->InsuranceID = $data->InsuranceID;
    $item->street_address = $data->street_address;
    $item->city = $data->city;
    $item->province = $data->province;
    $item->postal = $data->postal;
    
    if($item->updatePatient()){
        echo json_encode("Patient data updated.");
    } else{
        echo json_encode("Data could not be updated");
    }
?>