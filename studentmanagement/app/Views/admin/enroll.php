
<style>
    <style>
    /* Additional styling */
    #submitBtn {
        margin: 20px; /* Add margin to the submit button */
        background-color: orange; /* Orange background color */
        color: white; /* White text color */
        border: none; /* Remove button border */
        padding: 10px 20px; /* Add padding */
        border-radius: 5px; /* Add border radius */
    }

    #submitBtn:hover {
        background-color: green; /* Green background color on hover */
    }

    .container {
        margin-top: 20px; /* Add margin to the container */
        margin-bottom: 20px; /* Add margin to the container */
    }

    /* Apply some styling to form inputs */
    input[type="text"],
    input[type="number"],
    select,
    textarea {
        border: 1px solid #ced4da; /* Add a border */
        border-radius: 4px; /* Add border radius */
        padding: 8px; /* Add padding */
        margin-bottom: 10px; /* Add margin bottom */
    }
    .nav-tabs .nav-link {
        color: #ffffff; /* White text color */
        background-color: orange; /* Orange background color */
        border: none; /* Remove border */
        border-radius: 0; /* Remove border radius */
    }

    .nav-tabs .nav-link.active {
        color: #ffffff; /* White text color for active tab */
        background-color: green; /* Green background color for active tab */
    }

    /* Tab pane styling */
    .tab-pane {
        background-color: #ffffff; /* White background color */
        border: 1px solid green; /* Green border */
        padding: 20px; /* Add padding */
        height: 400px; 
        border-radius: 5px; /* Add border radius */
    }
    .form-heading {
        color: green; /* Green text color */
        font-size: 24px; /* Larger font size */
        font-weight: bold; /* Bold font weight */
        margin-bottom: 20px; /* Add some bottom margin */
        text-align: center; /* Center align the text */
        text-transform: uppercase; /* Convert text to uppercase */
    }


</style>




<div class="container mt-5">
    <div class="panel panel-default shadow">
        <div class="panel-body">
        <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h4 class="form-heading">Student Enrollment Forms</h4>
        </div>
    </div>
<form id="mainForm" method="post" action="<?= site_url('Admin/enroll') ?>" class="container mt-5">
    <?php csrf_field() ?>
    <nav>
        <div class="nav nav-tabs " id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Personal Information</button>
            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Contact Information</button>
            <button class="nav-link" id="nav-medical-tab" data-bs-toggle="tab" data-bs-target="#nav-medical" type="button" role="tab" aria-controls="nav-qualification" aria-selected="false">Medical Information</button>
            <button class="nav-link" id="nav-enrollmentdetails-tab" data-bs-toggle="tab" data-bs-target="#nav-enroll" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Enrollment Details</button>
        </div>
    </nav>
   
    <div class="tab-content" id="nav-tabContent">
     <!-- Tab 1 -->
     <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="Identity" class="form-label">Identity:</label>
                    <input type="text" class="form-control" name="Identity" value="<?= set_value('Identity', $identity) ?>">
                    <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'Identity') : "" ?>
                    </span>
                </div>

                <div class="col-md-6">
                    <label for="FirstName" class="form-label">First Name:</label>
                    <input type="text" class="form-control" name="FirstName" placeholder="">
                    <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'FirstName') : "" ?>
                    </span>
                </div>
                <div class="col-md-6">
                    <label for="LastName" class="form-label">Last Name:</label>
                    <input type="text" class="form-control" name="LastName" placeholder="">
                    <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'LastName') : "" ?>
                    </span>
                </div>
                <div class="col-md-6">
                    <label for="DOB" class="form-label">Date Of Birth:</label>
                    <input type="date" class="form-control" name="DOB">
                    <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'DOB') : "" ?>
                    </span>
                </div>
               
                <div class="col-md-6">
                    <label for="Gender" class="form-label">Gender:</label>
                    <select name="Gender" class="form-select">
                        <option selected disabled>Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'Gender') : "" ?>
                    </span>
                </div>
                <div class="col-md-6">
                    <label for="nationality" class="form-label">Nationality:</label>
                    <input type="text" class="form-control" name="Nationality" placeholder="">
                    <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'Nationality') : "" ?>
                    </span>
                </div>
                <div class="col-md-6">
                <label for="Address" class="form-label">Home Address:</label>
                <textarea name="Address" class="form-control" placeholder=""></textarea>
                <span class="text-danger text-sm">
                    <?= isset($validation) ? display_form_errors($validation, 'Address') : "" ?>
                </span>
            </div>
            </div>
            
        </div>
       
         <!-- Tab 2 -->
     <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
<div class="row">
        <div class="col-md-3">
            <label for="p_FirstName" class="form-label">Gardian's firstname<span style="color: red;">*<span></label>
            <input type="text" class="form-control" name="p_FirstName" placeholder="">
            <span class="text-danger text-sm">
                <?= isset($validation) ? display_form_errors($validation, 'p_FirstName') : "" ?>
            </span>
        </div>
        <div class="col-md-3">
            <label for="p_LastName" class="form-label">Gardian's lastname<span style="color: red;">*<span></label>
            <input type="text" class="form-control" name="p_LastName" placeholder="">
            <span class="text-danger text-sm">
                <?= isset($validation) ? display_form_errors($validation, 'p_LastName') : "" ?>
            </span>
        </div>
        <div class="col-md-3">
            <label for="Relationship" class="form-label">Relation to student<span style="color: red;">*<span></label>
            <input type="text" class="form-control" name="Relationship" placeholder="">
            <span class="text-danger text-sm">
                <?= isset($validation) ? display_form_errors($validation, 'Relationship') : "" ?>
            </span>
        </div>
        <div class="col-md-3">
            <label for="PhoneNumber" class="form-label">Gardian's Phone Number<span style="color: red;">*<span></label>
            <input type="text" class="form-control" name="PhoneNumber" placeholder="">
            <span class="text-danger text-sm">
                <?= isset($validation) ? display_form_errors($validation, 'PhoneNumber') : "" ?>
            </span>
        </div>

        <div class="col-md-6">
            <label for="Email" class="form-label">Gardian's Email</label>
            <input type="text" class="form-control" name="Email" placeholder="">
            <span class="text-danger text-sm">
                <?= isset($validation) ? display_form_errors($validation, 'Email') : "" ?>
            </span>
        </div>
    </div>
        
</div>   



<div class="tab-pane fade" id="nav-medical" role="tabpanel" aria-labelledby="nav-medical-tab" tabindex="0">

    <div class="row">
        <div class="col-md-6">
            <label for="Condition1" class="form-label">Condition 1</label>
            <input type="text" class="form-control" name="Condition1" placeholder="">
        </div>
        <div class="col-md-6">
            <label for="Condition2" class="form-label">Condition 2</label>
            <input type="text" class="form-control" name="Condition2" placeholder="">
           
        </div>
        <div class="col-md-6">
            <label for="Condition1" class="form-label">Condition 3</label>
            <input type="text" class="form-control" name="Condition3" placeholder="">
          
        </div>
        <div class="col-md-6">
            <label for="Condition4" class="form-label">Condition 4</label>
            <input type="text" class="form-control" name="Condition4" placeholder="">
           
        </div> 
        
        <div class="col-md-6">
            <label for="Emergency1" class="form-label">Emergency contact one</label>
            <input type="text" class="form-control" name="Emergency1" placeholder="">
          
        </div>
        <div class="col-md-6">
            <label for="Emergency2" class="form-label">Emergency contact two</label>
            <input type="text" class="form-control" name="Emergency2" placeholder="">
            <span class="text-danger text-sm">
                <?= isset($validation) ? display_form_errors($validation, 'Emergency2') : "" ?>
            </span>
        </div> 
    </div>
</div>

<div class="tab-pane fade" id="nav-enroll" role="tabpanel" aria-labelledby="nav-enrollmentdetails-tab" tabindex="0">

<div class="col-md-6">
    <label for="grade" class="form-label">Grade</label>
    <select name="grade" id="grade" class="form-select" >
        <option selected disabled>Select Grade</option>
        <?php foreach ($Grades as $grade): ?>
            <option value="<?= $grade->GradeID?>"><?= $grade->GradeName ?></option>
        <?php endforeach; ?>
    </select>
    <span class="text-danger text-sm">
        <?= isset($validation) ? display_form_errors($validation, 'grade') : "" ?>
    </span>
</div>
<div class="col-md-6">
    <label for="GradeTeacher" class="form-label">Grade Teacher</label>
    <select name="GradeTeacher" id="teacher" class="form-select">
        <option selected disabled>Select Teacher</option>
        <!-- Options will be dynamically added here via JavaScript -->
    </select>
    <span class="text-danger text-sm">
        <?= isset($validation) ? display_form_errors($validation, 'GradeTeacher') : "" ?>
    </span>
</div>

    </div>
</div>

   
        <!-- Submit button -->
    <button type="submit" class="btn btn-success">Submit</button>
</form>
</div>
</div>
</div>
<br>
