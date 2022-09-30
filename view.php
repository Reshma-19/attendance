<?php 
    $title = 'view-Record';
    require_once 'includes/header.php';
    require_once 'db/dbconfig.php';

    // Get attendee by ID
    if(!isset($_GET['id'])){
        include 'includes/errormsg.php';
    }
    else{
        $id = $_GET['id'];
        $rr = $crud->getAttendeeDetails($id);

?>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">
                <?php echo $rr['firstname']." ".$rr['lastname'];    ?>
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">
                <?php echo $rr['name']; ?>
            </h6>
            <p class="card-text">
                Date of Birth: <?php echo $rr['dateofbirth'];     ?>
            </p>
            <p class="card-text">
                Email Address: <?php echo $rr['emailaddress'];     ?>
            </p>
            <p class="card-text">
                Contact Number: <?php echo $rr['contactnumber'];     ?>
            </p>
        </div>
    </div><br/>
    <a href="viewrecords.php" class='btn btn-info'>Back to list</a>
    <a href="edit.php?id=<?php echo $rr['attendee_id']; ?>" class='btn btn-warning'>Edit</a>
    <a onclick='return confirm("Are you sure you want to delete it anyways?");' href="delete.php?id=<?php echo $rr['attendee_id']; ?>" class='btn btn-danger'>Delete</a>

<?php } ?>

    <br/>
    <br/>
    <br/>
    <br/>   
<?php require_once 'includes/footer.php'; ?>  
