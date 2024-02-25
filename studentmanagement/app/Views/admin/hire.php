
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
                <h4 class="form-heading">Teacher Creation Forms</h4>
            </div>
        </div>

        <?php if (!empty(session()->getFlashdata("error"))) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo session()->getFlashdata("error"); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
    
<form  method="post" action="<?= site_url('Admin/hire') ?>" class="container mt-5" enctype="multipart/form-data"  onsubmit="return validateForm()">
    <?php csrf_field() ?>
    <nav>
        <div class="nav nav-tabs " id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Teacher Personal Information</button>
            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Teacher Contact Information</button>
            <button class="nav-link" id="nav-qualification-tab" data-bs-toggle="tab" data-bs-target="#nav-qualification" type="button" role="tab" aria-controls="nav-qualification" aria-selected="false">Teachers Qualifications</button>

        </div>
    </nav>
   
    <div class="tab-content" id="nav-tabContent">
        <!-- Tab 1 -->
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="identity" class="form-label">Identity<span style="color: red;">*<span></label>
                    <input type="text" class="form-control" name="Identity" value="<?= set_value('Identity', $identity) ?>">
                    <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'Identity') : "" ?>
                    </span>
                </div>
                <div class="col-md-6">
                    <label for="DOB" class="form-label">Date Of Birth<span style="color: red;">*<span></label>
                    <input type="date" class="form-control" name="DateOfBirth" onchange="calculateAge(this.value)">
                    <span class="text-danger text-sm">
                         <?= isset($validation) ? display_form_errors($validation, 'DateOfBirth') : "" ?>
                    </span>
                </div>
                <div class="col-md-6">
                    <label for="firstName" class="form-label">First Name<span style="color: red;">*<span></label>
                    <input type="text" class="form-control" name="FirstName" placeholder="" >
                    <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'firstName') : "" ?>
                    </span>
                </div>
                <div class="col-md-6">
                    <label for="lastName" class="form-label">Last Name<span style="color: red;">*<span></label>
                    <input type="text" class="form-control" name="LastName" placeholder="" >
                    <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'LastName') : "" ?>
                    </span>
                </div>
                
                <div class="col-md-6">
                    <label for="gender" class="form-label">Gender<span style="color: red;">*<span></label>
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
                    <label for="nationality" class="form-label">Nationality<span style="color: red;">*<span></label>
                    <input type="text" class="form-control" name="Nationality" placeholder="" >
                    <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'Nationality') : "" ?>
                    </span>
                </div>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Home Address<span style="color: red;">*<span></label>
                <textarea name="HomeAddress" class="form-control" placeholder="" ></textarea>
                <span class="text-danger text-sm">
                    <?= isset($validation) ? display_form_errors($validation, 'HomeAddress') : "" ?>
                </span>
            </div>
        </div>
        <!-- Tab 2 -->
        <div class="tab-pane fade " id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">

                <div class="col-md-6">
                    <label for="PhoneOne" class="form-label">Phone Number<span style="color: red;">*<span></label>
                    <input type="text" class="form-control" name="PhoneOne" placeholder="09XXXXXX...." >
                    <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'PhoneOne') : "" ?>
                    </span>
                </div>
                <div class="col-md-6">
                    <label for="PhoneTwo" class="form-label">Phone Number(optional)</label>
                    <input type="text" class="form-control" name="PhoneTwo" placeholder="09XXXXXX...." >
                    <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'PhoneTwo') : "" ?>
                    </span>
                </div>
                <div class="col-md-6">
                    <label for="Email" class="form-label">Email<span style="color: red;">*<span></label>
                    <input type="Email" class="form-control" name="Email" placeholder="Email" >
                    <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'Email') : "" ?>
                    </span>
                </div>
        </div>
        <!-- Tab 3 -->
        <div class="tab-pane fade " id="nav-qualification" role="tabpanel" aria-labelledby="nav-qualification-tab" tabindex="0">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="Document1" class="form-label">Qualifications Doc 1<span style="color: red;">*<span></label>
                    <input type="file" class="form-control" name="Document1"  >
                    <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'Document1') : "" ?>
                    </span>
                </div>

                <div class="col-md-6">
                    <label for="Document2" class="form-label">NRC<span style="color: red;">*<span></label>
                    <input type="file" class="form-control" name="Document2" >
                    <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'Document') : "" ?>
                    </span>
                </div>
               
    </div>
    <!-- Submit button -->
    <button type="submit" class="btn btn-success" >Submit</button>
</form>
</div>
</div>
</div>
<br>

