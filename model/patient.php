<?php
    class Patient{

        // Connection
        private $conn;

        // Table
        private $db_table = "Patient";

        // Columns
        public $id;
        public $first_name;
        public $last_name;
        public $sex;
        public $contact_number;
        public $email;
        public $age;
        public $weight;
        public $height;
        public $InsuranceID;
        public $street_address;
        public $city;
        public $province;
        public $postal;

        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }

        // GET ALL
        public function getPatients(){
            $sqlQuery = "SELECT `id`, `first_name`, `last_name`, `sex`, `contact_number`, `email`, `age`, `weight`, `height`, `InsuranceID`, `street_address`, `city`, `province`, `postal` FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }

        // CREATE
        public function createPatient(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."(`first_name`, `last_name`, `sex`, `contact_number`, `email`, `age`, `weight`, `height`, `InsuranceID`, `street_address`, `city`, `province`, `postal`) VALUES 
                   (?,?,?,?,?,?,?,?,?,?,?,?,?)";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->first_name=htmlspecialchars(strip_tags($this->first_name));
            $this->last_name=htmlspecialchars(strip_tags($this->last_name));
            $this->sex=htmlspecialchars(strip_tags($this->sex));
            $this->contact_number=htmlspecialchars(strip_tags($this->contact_number));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->age=htmlspecialchars(strip_tags($this->age));
            $this->weight=htmlspecialchars(strip_tags($this->weight));
            $this->height=htmlspecialchars(strip_tags($this->height));
            $this->InsuranceID=htmlspecialchars(strip_tags($this->InsuranceID));
            $this->street_address=htmlspecialchars(strip_tags($this->street_address));
            $this->city=htmlspecialchars(strip_tags($this->city));
            $this->province=htmlspecialchars(strip_tags($this->province));
            $this->postal=htmlspecialchars(strip_tags($this->postal));

            // bind data
            $stmt->bindParam(1, $this->first_name);
            $stmt->bindParam(2, $this->last_name);
            $stmt->bindParam(3, $this->sex);
            $stmt->bindParam(4, $this->contact_number);
            $stmt->bindParam(5, $this->email);
            $stmt->bindParam(6, $this->age);
            $stmt->bindParam(7, $this->weight);
            $stmt->bindParam(8, $this->height);
            $stmt->bindParam(9, $this->InsuranceID);
            $stmt->bindParam(10, $this->street_address);
            $stmt->bindParam(11, $this->city);
            $stmt->bindParam(12, $this->province);
            $stmt->bindParam(13, $this->postal);


            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // READ single
        public function getSinglePatient(){
            $sqlQuery = "SELECT
                        `id`, `first_name`, `last_name`, `sex`, `contact_number`, `email`, `age`, `weight`, `height`,`InsuranceID`, `street_address`, `city`, `province`, `postal`
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       id = ?
                    LIMIT 0,1";

            $stmt = $this->conn->prepare($sqlQuery);

            $stmt->bindParam(1, $this->id);
            
            $stmt->execute();

            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            var_dump($dataRow);
            
            $this->first_name=$dataRow['first_name'];
            $this->last_name=$dataRow['last_name'];
            $this->sex=$dataRow['sex'];
            $this->contact_number= $dataRow['contact_number'];
            $this->email= $dataRow['email'];
            $this->age= $dataRow['age'];
            $this->weight= $dataRow['weight'];
            $this->height= $dataRow['height'];
            $this->InsuranceID= $dataRow['InsuranceID'];
            $this->street_address= $dataRow['street_address'];
            $this->city= $dataRow['city'];
            $this->province= $dataRow['province'];
            $this->postal= $dataRow['postal'];
        }        

        // UPDATE
        public function updatePatient(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        first_name = :first_name, 
                        last_name = :last_name, 
                        sex = :sex, 
                        contact_number = :contact_number, 
                        email = :email, 
                        age = :age, 
                        weight = :weight, 
                        height = :height, 
                        InsuranceID = :InsuranceID,
                        street_address = :street_address, 
                        city = :city,
                        province = :province,
                        postal = :postal
                    WHERE 
                        id = :id";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->first_name=htmlspecialchars(strip_tags($this->first_name));
            $this->last_name=htmlspecialchars(strip_tags($this->last_name));
            $this->sex=htmlspecialchars(strip_tags($this->sex));
            $this->contact_number=htmlspecialchars(strip_tags($this->contact_number));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->age=htmlspecialchars(strip_tags($this->age));
            $this->weight=htmlspecialchars(strip_tags($this->weight));
            $this->height=htmlspecialchars(strip_tags($this->height));
            $this->InsuranceID=htmlspecialchars(strip_tags($this->InsuranceID));
            $this->street_address=htmlspecialchars(strip_tags($this->street_address));
            $this->city=htmlspecialchars(strip_tags($this->city));
            $this->province=htmlspecialchars(strip_tags($this->province));
            $this->postal=htmlspecialchars(strip_tags($this->postal));

            // bind data
            $stmt->bindParam(":id", $this->id);
            $stmt->bindParam(":first_name", $this->first_name);
            $stmt->bindParam(":last_name", $this->last_name);
            $stmt->bindParam(":sex", $this->sex);
            $stmt->bindParam(":contact_number", $this->contact_number);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":age", $this->age);
            $stmt->bindParam(":weight", $this->weight);
            $stmt->bindParam(":height", $this->height);
            $stmt->bindParam(":InsuranceID", $this->InsuranceID);
            $stmt->bindParam(":street_address", $this->street_address);
            $stmt->bindParam(":city", $this->city);
            $stmt->bindParam(":province", $this->province);
            $stmt->bindParam(":postal", $this->postal);
        var_dump ($stmt);
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // DELETE
        function deletePatient(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            $stmt->bindParam(1, $this->id);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }

    }
?>