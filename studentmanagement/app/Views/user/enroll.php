<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php
    if (!empty(session()->getFlashdata("success"))) {
        ?>
        <div class="alert alert-success">
            <?php
            echo session()->getFlashdata("success")
                ?>
        </div>
        <?php
    } else if (!empty(session()->getFlashdata("error"))) {
        ?>
            <div class="alert alert-danger">
                <?php
                echo session()->getFlashdata("error")
                    ?>
            </div>

        <?php
    }

    ?>
    <div class="container d-flex justify-content-center align-items-center vh-100">

        <div class="card" style="width: 30rem;">
            <!-- Logo -->
            <h3>Student Enrollment Form</h3>

            <div class="card-body">
                <form method="post" action="<?= site_url('User/enroll') ?>">
                    <?php csrf_field() ?>
                    <div class=" mb-3">
                        <input type="hidden" class="form-control" name="StudentID">
                        <span class="text-danger text-sm">
                            <?= isset($validation) ? display_form_errors($validation, 'StudentID') : "" ?>
                        </span>
                    </div>


                    <div class=" mb-3">
                        <input type="text" class="form-control" name="Name" value="<?= set_value('Name') ?>"
                            placeholder=" Enter FullName">
                        <span class="text-danger text-sm">
                            <?= isset($validation) ? display_form_errors($validation, 'Name') : "" ?>
                        </span>
                    </div>

                    <div class="mb-3">
                        <input type="Email" class="form-control" name="Email" value="<?= set_value('Email') ?>"
                            placeholder=" Enter Email">
                        <span class="text-danger text-sm">
                            <?= isset($validation) ? display_form_errors($validation, 'Email') : "" ?>
                        </span>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="Age" value="<?= set_value('Age') ?>"
                            placeholder=" Enter Age">
                        <span class="text-danger text-sm">
                            <?= isset($validation) ? display_form_errors($validation, 'Age') : "" ?>
                        </span>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="Address" value="<?= set_value('Address') ?>"
                            placeholder=" Enter Home Address">
                        <span class="text-danger text-sm">
                            <?= isset($validation) ? display_form_errors($validation, 'Address') : "" ?>
                        </span>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="Phone" value="<?= set_value('Phone') ?>"
                            placeholder=" Enter Phone">
                        <span class="text-danger text-sm">
                            <?= isset($validation) ? display_form_errors($validation, 'Phone') : "" ?>
                        </span>
                    </div>
                    <div class="mb-3">
                        <label for="Grade" class="form-label">Grade:</label>
                        <select class="form-select" type="number" name="Grade" required>
                            <?php for ($i = 1; $i <= 9; $i++): ?>
                                <option value="<?= $i ?>" <?= set_select('Grade', $i) ?>>
                                    <?= $i ?>
                                </option>
                            <?php endfor; ?>
                        </select>
                        <span class="text-danger text-sm">
                            <?= isset($validation) ? display_form_errors($validation, 'Grade') : "" ?>
                        </span>
                    </div>


                    <button type="submit" class="btn btn-success w-100">EnrollStudent</button>


                </form>

            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional, only needed if you want to use Bootstrap JavaScript features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>