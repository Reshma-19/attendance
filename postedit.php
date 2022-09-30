<?php 
    require_once 'db/dbconfig.php';

    //get values from post operation
    if(isset($_POST['submit'])){
        //extract values from the $_POST array
        $id = $_POST['id'];
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $speciality = $_POST['speciality'];
    
        //call crud function
        $result = $crud->updateAttendees($id, $fname, $lname, $dob, $email, $contact, $speciality);
        //redirect to index.php
        if($result){
            header("Location: viewrecords.php"); //header takes the link as input and heads to the link
        }
        else{
            include 'includes/errormsg.php';
        }
    }
    else {
        include 'includes/errormsg.php';
    }
?>
