<?php 
    $title = 'HOME';
    require_once 'includes/header.php';
    require_once 'db/dbconfig.php';

    $results = $crud->getSpecialities();

?>
    <h1 class="text-center">Registration Form</h1>
    <form method="post" action="success.php" >
        <div class="mb-3">
            <label for="firstname" class="form-label">First Name</label>
            <input type="text" class="form-control" id="firstname" placeholder="John" name="firstname" required/>
        </div> 
        <div class="mb-3">
            <label for="lastname" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastname" placeholder="Doe" name="lastname"/>
        </div> 
        <div class="mb-3">
            <label for="dob" class="form-label">Date of Birth</label>
            <input type="text" class="form-control" id="dob" name="dob"/>
        </div> 
        <div class="mb-3">
            <label for="speciality" class="form-label">Area of Expertise</label>
            <select class="form-select" name="speciality" required>
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                    <option value="<?php echo $r['speciality_id'] ?>"><?php echo $r['name']; ?></option>
                <?php }?>
            </select>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" placeholder="xyz@gmail.com" required/>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="contact" class="form-label">Contact Number</label>
            <input type="number" class="form-control" name="contact" placeholder="99xxxxxx10"/>
            <div id="phoneHelp" class="form-text">We'll never share your number with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" required/>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" name="Check1"/>
            <label class="form-check-label" for="Check1">Check me out</label>
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-primary" value="submit" name="submit">Submit</button>
        </div>       
</form>
<br/>
<br/>
<br/>
<br/>   
<?php require_once 'includes/footer.php'; ?>





