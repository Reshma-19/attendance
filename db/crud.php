<?php
    class crud{
        //private database object\
        private $db;

        //constructor to initialize private variable to the database connection
        function __construct($conn){
            $this->db = $conn;
        }
        //function to add a new record into the attendance database --INSERT/CREATE OPERATION--
        public function insertAttendees($fname, $lname, $dob , $email, $contact, $speciality){
            try {
                //define sql stmt for execution
                $sql = "INSERT INTO `attendee` (firstname, lastname, dateofbirth,emailaddress,contactnumber,speciality_id) VALUES (:fname,:lname,:dob,:email,:contact,:speciality)";
                //prepare sql for execution 
                $stmt = $this->db->prepare($sql);
                //bind all placeholders to the actual values
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':contact',$contact);
                $stmt->bindparam(':speciality',$speciality);
                //execute stmt
                $stmt->execute();
                return true;
        
            } catch(PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        //function to update an existing record in the attendance database --UPDATE OPERATION--
        public function updateAttendees($id, $fname, $lname, $dob, $email, $contact, $speciality){
           
            try {
                $sql = "UPDATE `attendee`
                        SET `firstname`=:fname, `lastname`=:lname, `dateofbirth`=:dob,
                        `emailaddress`=:email, `contactnumber`=:contact, `speciality_id`=:speciality
                        WHERE attendee_id=:id";
                    //prepare sql for execution 
                $stmt = $this->db->prepare($sql);
                    //bind all placeholders to the actual values
                $stmt->bindparam(':id',$id);
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':contact',$contact);
                $stmt->bindparam(':speciality',$speciality);
                    //execute stmt
                $stmt->execute();
                return true;

            } catch(PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        //function to view record of the attendance database --READ OPERATION--
        public function viewAttendees(){
            try{
                $sql = "SELECT * FROM `attendee` a
                        INNER JOIN `specialities` s
                        ON a.speciality_id = s.speciality_id";
                $result = $this->db->query($sql);
                return $result;
            } catch(PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getAttendeeDetails($id){
            try{
                $sql = "SELECT * FROM `attendee` a
                    INNER JOIN `specialities` s
                    ON a.speciality_id = s.speciality_id
                    WHERE attendee_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
            }  catch(PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        //function to delete a record of the attendance database 
        public function deleteAttendee($id){
            try{
                $sql = "DELETE FROM `attendee` 
                        WHERE attendee_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                return true;
            } catch(PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            return $result;
        }

        public function getSpecialities(){
            try {     
                $sql = "SELECT * FROM `specialities`";
                $result = $this->db->query($sql);
                return $result;
            } catch(PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
    }
?>