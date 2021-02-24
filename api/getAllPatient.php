<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../config/database.php';
    include_once '../model/patient.php';

    $database = new Database();
    $db = $database->getConnection();

    $items = new Patient($db);

    $stmt = $items->getPatients();
    $itemCount = $stmt->rowCount();


    echo json_encode($itemCount);

    if($itemCount > 0){
        
        $patientArr = array();
        $patientArr["body"] = array();
        $patientArr["itemCount"] = $itemCount;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                        "id" => $id,
                        "first_name" => $first_name, 
                        "last_name" => $last_name, 
                        "sex" => $sex, 
                        "contact_number" => $contact_number, 
                        "email" => $email, 
                        "age" => $age, 
                        "weight" => $weight, 
                        "height" => $height, 
                        "InsuranceID" => $InsuranceID,
                        "street_address" => $street_address, 
                        "city" => $city,
                        "province" => $province,
                        "postal" => $postal
               
            );

            array_push($patientArr["body"], $e);
        }
        echo json_encode($patientArr);
    }

    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No record found.")
        );
    }
?>