<?php
    require_once 'db/dbconfig.php';
    if(!$_GET['id']){
        echo 'error';
    }
    else{

        // Get id value
        $id = $_GET['id'];

        // Call delete function 
        $result = $crud->deleteAttendee($id);
        
        //Redirect to list
        if($result){
            header("Location: viewrecords.php"); //header takes the link as input and heads to the link
        }
        else{
            include 'includes/errormsg.php';
            header("Location: viewrecords.php");
        }
    }
?>