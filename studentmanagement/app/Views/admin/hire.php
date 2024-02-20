<style>
     #submitBtn {
            margin: 20px; /* Add margin to the submit button */
        }

        .container {
            margin-top: 20px; /* Add margin to the container */
            margin-bottom: 20px; /* Add margin to the container */
        }

</style>


<div class="container mt-5">
    <div class="panel panel-default shadow">
        <div class="panel-body">
            <h4 style="margin:12px;">Teacher Creation Forms</h4>
<form  method="post" action="<?= site_url('Admin/hire') ?>" class="container mt-5">
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
                    <input type="text" class="form-control" name="identity" value="<?= set_value('identity', $identity) ?>">
                    <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'identity') : "" ?>
                    </span>
                </div>
                <div class="col-md-6">
                    <label for="DOB" class="form-label">Date Of Birth<span style="color: red;">*<span></label>
                    <input type="date" class="form-control" name="DOB">
                    <span class="text-danger text-sm">
                         <?= isset($validation) ? display_form_errors($validation, 'DOB') : "" ?>
                    </span>
                </div>
                <div class="col-md-6">
                    <label for="firstName" class="form-label">First Name<span style="color: red;">*<span></label>
                    <input type="text" class="form-control" name="firstName" placeholder="First Name">
                    <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'firstName') : "" ?>
                    </span>
                </div>
                <div class="col-md-6">
                    <label for="lastName" class="form-label">Last Name<span style="color: red;">*<span></label>
                    <input type="text" class="form-control" name="lastName" placeholder="Last Name">
                    <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'lastName') : "" ?>
                    </span>
                </div>
                
                <div class="col-md-6">
                    <label for="age" class="form-label">Age<span style="color: red;">*<span></label>
                    <input type="number" class="form-control" name="age">
                    <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'age') : "" ?>
                    </span>
                </div>
                <div class="col-md-6">
                    <label for="gender" class="form-label">Gender<span style="color: red;">*<span></label>
                    <select name="gender" class="form-select">
                        <option selected disabled>Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'gender') : "" ?>
                    </span>
                </div>
                <div class="col-md-6">
                    <label for="nationality" class="form-label">Nationality<span style="color: red;">*<span></label>
                    <input type="text" class="form-control" name="nationality" placeholder="Nationality">
                    <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'nationality') : "" ?>
                    </span>
                </div>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Home Address<span style="color: red;">*<span></label>
                <textarea name="address" class="form-control" placeholder="Enter Home Address"></textarea>
                <span class="text-danger text-sm">
                    <?= isset($validation) ? display_form_errors($validation, 'address') : "" ?>
                </span>
            </div>
        </div>
        <!-- Tab 2 -->
        <div class="tab-pane fade " id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">

                <div class="col-md-6">
                    <label for="PhoneOne" class="form-label">Phone Number:</label>
                    <input type="text" class="form-control" name="PhoneOne" placeholder="09XXXXXX....">
                    <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'PhoneOne') : "" ?>
                    </span>
                </div>
                <div class="col-md-6">
                    <label for="PhoneTwo" class="form-label">Phone Number:</label>
                    <input type="text" class="form-control" name="PhoneTwo" placeholder="09XXXXXX....">
                  
                </div>
                <div class="col-md-6">
                    <label for="Email" class="form-label">Email:</label>
                    <input type="Email" class="form-control" name="Email" placeholder="Email">
                    <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'Email') : "" ?>
                    </span>
                </div>
        </div>
        <!-- Tab 3 -->
        <div class="tab-pane fade " id="nav-qualification" role="tabpanel" aria-labelledby="nav-qualification-tab" tabindex="0">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="Document1" class="form-label">Qualifications Doc 1</label>
                    <input type="file" class="form-control" name="Document1" >
                    <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'Document1') : "" ?>
                    </span>
                </div>

                <div class="col-md-6">
                    <label for="Document2" class="form-label">Qualifications Doc 2</label>
                    <input type="file" class="form-control" name="Document2">
                    <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'Document2') : "" ?>
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
