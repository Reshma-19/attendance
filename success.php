<?php 
    $title = 'Success';
    require_once 'includes/header.php';
    require_once 'db/dbconfig.php';
    require_once 'db/crud.php';

    if(isset($_POST['submit'])){
        //extract values from the $_POST array
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $speciality = $_POST['speciality'];
        //call function to insert and track if success or not
        $isSuccess = $crud->insertAttendees($fname, $lname, $dob, $email, $contact, $speciality);

        if($isSuccess){
            include 'includes/successmsg.php';
        }
        else{
            include 'includes/errormsg.php';
        }
    }
?>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">
                <?php echo $_POST['firstname']." ".$_POST['lastname']; ?>
            </h5>
            <h6 class="card-text">
                <?php echo $_POST['speciality']; ?>
            <h6>
            <p class="card-text">
                Date of Birth: <?php echo $_POST['dob']; ?>
            </p>
            <p class="card-text">
                Email Address: <?php echo $_POST['email']; ?>
            </p>
            <p class="card-text">
                Contact Number: <?php echo $_POST['contact']; ?>
            </p>
        </div>
    </div>
<br/>
<br/>
<br/>
<br/>
<?php require_once 'includes/footer.php'; ?> 