
<?php 
    $title = 'Edit Record';
    require_once 'includes/header.php';
    require_once 'db/dbconfig.php';

    $results = $crud->getSpecialities();
    if(!isset($_GET['id'])){
        //echo 'error';
        include 'includes/errormsg.php';
        header("Location: viewrecords.php");
    }
    else {
        $id = $_GET['id'];
        $attendeeData = $crud->getAttendeeDetails($id);
       
?>
    <h1 class="text-center">Edit Record</h1>
    <form method="post" action="postedit.php" >
        <input type="hidden" name='id' value="<?php echo $attendeeData['attendee_id'] ?>"/>
        <div class="mb-3">
            <label for="firstname" class="form-label">First Name</label>
            <input type="text" class="form-control" id="firstname" value="<?php echo $attendeeData['firstname'] ?>" placeholder="John" name="firstname" required/>
        </div> 
        <div class="mb-3">
            <label for="lastname" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastname" value="<?php echo $attendeeData['lastname'] ?>" placeholder="Doe" name="lastname"/>
        </div> 
        <div class="mb-3">
            <label for="dob" class="form-label">Date of Birth</label>
            <input type="text" class="form-control" id="dob" value="<?php echo $attendeeData['dateofbirth'] ?>" name="dob"/>
        </div> 
        <div class="mb-3">
            <label for="speciality" class="form-label">Area of Expertise</label>
            <select class="form-select" name="speciality" required>
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                    <option value="<?php echo $r['speciality_id'] ?>" <?php if($r['speciality_id'] ==
                     $attendeeData['speciality_id']) echo 'selected'?>>
                        <?php echo $r['name']; ?>
                    </option>
                <?php }?>
            </select>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" value="<?php echo $attendeeData['emailaddress'] ?>" placeholder="xyz@gmail.com" required/>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="contact" class="form-label">Contact Number</label>
            <input type="number" class="form-control" name="contact" value="<?php echo $attendeeData['contactnumber'] ?>" placeholder="99xxxxxx10" required/>
            <div id="phoneHelp" class="form-text">We'll never share your number with anyone else.</div>
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-success" value="submit" name="submit">Save changes</button>
        </div>       
</form>
   
<?php } ?>
<br/>
<br/>
<br/>
<br/>
<?php require_once 'includes/footer.php'; ?>  
