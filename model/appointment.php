<?php
    class Appointment{

        // Connection
        private $conn;

        // Table
        private $db_table = "Appointment";

        // Columns
        public $AppointmentID;
        public $Patient;
        public $PrepNurse;
        public $Physician;
        public $Start;
        public $End;
        public $ExaminationRoom;
      

        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }

        // GET ALL
        public function getAppointments(){
            $sqlQuery = "SELECT `AppointmentID`, `Patient`, `PrepNurse`, `Physician`, `Start`, `End`, `ExaminationRoom` FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }

        // CREATE
        public function createAppointment(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."(`AppointmentID`, `Patient`, `PrepNurse`, `Physician`, `Start`, `End`, `ExaminationRoom`) VALUES 
                   (?,?,?,?,?,?,?,?,?,?,?,?)";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->AppointmentID=htmlspecialchars(strip_tags($this->AppointmentID));
            $this->Patient=htmlspecialchars(strip_tags($this->Patient));
            $this->PrepNurse=htmlspecialchars(strip_tags($this->PrepNurse));
            $this->Physician=htmlspecialchars(strip_tags($this->Physician));
            $this->Start=htmlspecialchars(strip_tags($this->Start));
            $this->End=htmlspecialchars(strip_tags($this->End));
            $this->ExaminationRoom=htmlspecialchars(strip_tags($this->ExaminationRoom));
            
            // bind data
            $stmt->bindParam(1, $this->AppointmentID);
            $stmt->bindParam(2, $this->Patient);
            $stmt->bindParam(3, $this->PrepNurse);
            $stmt->bindParam(4, $this->Physician);
            $stmt->bindParam(5, $this->Start);
            $stmt->bindParam(6, $this->End);
            $stmt->bindParam(7, $this->ExaminationRoom);
    


            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // READ single
        public function getSingleAppointment(){
            $sqlQuery = "SELECT
                        `AppointmentID`, `Patient`, `PrepNurse`, `Physician`, `Start`, `End`, `ExaminationRoom`
                      FROM
                        ". $this->db_table ."
                    WHERE 
                    AppointmentID = ?
                    LIMIT 0,1";

            $stmt = $this->conn->prepare($sqlQuery);

            $stmt->bindParam(1, $this->AppointmentID);
            
            $stmt->execute();

            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            var_dump($dataRow);
            
            $this->AppointmentID=$dataRow['AppointmentID'];
            $this->Patient=$dataRow['Patient'];
            $this->PrepNurse=$dataRow['PrepNurse'];
            $this->Physician= $dataRow['Physician'];
            $this->Start= $dataRow['Start'];
            $this->End= $dataRow['End'];
            $this->ExaminationRoom= $dataRow['ExaminationRoom'];
            
        }        

        // UPDATE
        public function updateAppointment(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                    Patient = :Patient, 
                    PrepNurse = :PrepNurse, 
                    Physician = :Physician, 
                    Start = :Start, 
                    End = :End, 
                    ExaminationRoom = :ExaminationRoom
                    WHERE 
                    AppointmentID = :AppointmentID";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->Patient=htmlspecialchars(strip_tags($this->Patient));
            $this->PrepNurse=htmlspecialchars(strip_tags($this->PrepNurse));
            $this->Physician=htmlspecialchars(strip_tags($this->Physician));
            $this->Start=htmlspecialchars(strip_tags($this->Start));
            $this->End=htmlspecialchars(strip_tags($this->End));
            $this->ExaminationRoom=htmlspecialchars(strip_tags($this->ExaminationRoom));
           

            // bind data
            $stmt->bindParam(":AppointmentID", $this->AppointmentID);
            $stmt->bindParam(":Patient", $this->Patient);
            $stmt->bindParam(":PrepNurse", $this->PrepNurse);
            $stmt->bindParam(":Physician", $this->Physician);
            $stmt->bindParam(":Start", $this->Start);
            $stmt->bindParam(":End", $this->End);
            $stmt->bindParam(":age", $this->ExaminationRoom);
          
        var_dump ($stmt);
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // DELETE
        function deleteAppointment(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE AppointmentID = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->AppointmentID=htmlspecialchars(strip_tags($this->AppointmentID));
        
            $stmt->bindParam(1, $this->AppointmentID);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }

    }
?>