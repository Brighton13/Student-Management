<form id="mainForm" method="post" action="<?= site_url('Admin/hire') ?>" class="container mt-5">
    <?php csrf_field() ?>
    <nav>
        <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Teacher Personal Information</button>
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</button>
            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</button>
            <button class="nav-link" id="nav-disabled-tab" data-bs-toggle="tab" data-bs-target="#nav-disabled" type="button" role="tab" aria-controls="nav-disabled" aria-selected="false" disabled>Disabled</button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <!-- Tab 1 -->
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="identity" class="form-label">Identity:</label>
                    <input type="text" class="form-control" name="identity" value="<?= set_value('identity', $identity) ?>">
                    <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'identity') : "" ?>
                    </span>
                </div>

                <div class="col-md-6">
                    <label for="firstName" class="form-label">First Name:</label>
                    <input type="text" class="form-control" name="firstName" placeholder="First Name">
                    <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'firstName') : "" ?>
                    </span>
                </div>
                <div class="col-md-6">
                    <label for="lastName" class="form-label">Last Name:</label>
                    <input type="text" class="form-control" name="lastName" placeholder="Last Name">
                    <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'lastName') : "" ?>
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
                    <label for="age" class="form-label">Age:</label>
                    <input type="number" class="form-control" name="age">
                    <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'age') : "" ?>
                    </span>
                </div>
                <div class="col-md-6">
                    <label for="gender" class="form-label">Gender:</label>
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
                    <label for="nationality" class="form-label">Nationality:</label>
                    <input type="text" class="form-control" name="nationality" placeholder="Nationality">
                    <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'nationality') : "" ?>
                    </span>
                </div>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Home Address:</label>
                <textarea name="address" class="form-control" placeholder="Enter Home Address"></textarea>
                <span class="text-danger text-sm">
                    <?= isset($validation) ? display_form_errors($validation, 'address') : "" ?>
                </span>
            </div>
        </div>
        <!-- Tab 2 -->
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
            <!-- Form elements for tab 2 -->
        </div>
        <!-- Other tabs -->
    </div>
    <!-- Submit button -->
    <button type="button" class="btn btn-success" id="submitBtn">Submit</button>
</form>
