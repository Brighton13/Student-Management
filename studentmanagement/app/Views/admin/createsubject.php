<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Subject</title>

    <!-- Bootstrap CSS -->
    <link href="<?= base_url('bootstrap\dist\css\bootstrap.min.css') ?>" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #343a40;
        }

        .sidebar {
            position: fixed;
            height: 100%;
            width: 220px;
            top: 0;
            left: 0;
            background-color: #343a40;
            padding-top: 56px;
            /* Adjust based on your navbar height */
            color: #fff;
        }

        .sidebar a {
            padding: 16px;
            text-decoration: none;
            font-size: 18px;
            color: #fff;
            display: block;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .container-fluid {
            margin-left: 220px;
            /* Adjust based on your sidebar width */
        }

        .content {
            padding: 20px;
        }

        .card {
            margin-bottom: 20px;
        }

        .footer {
            text-align: center;
            padding: 10px;
            background-color: #343a40;
            color: #fff;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        /* Adjustments for responsiveness */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                position: static;
                padding-top: 56px;
                /* Adjust based on your navbar height */
            }

            .container-fluid {
                margin-left: 0;
            }

            .card {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-dark fixed-top bg-dark">
        <div class="navbar-brand m-0 p-2 h1">
            Admin's Dashboard
        </div>
        <ul class="navbar-nav ms-auto p-2">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('logout') ?>">Logout</a>
            </li>
        </ul>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="<?= site_url('Admin') ?>">Dashboard</a>
        <a href="<?= site_url('Admin/hire') ?>" class="active">Hire New Teacher</a>
        <a href="<?= site_url('Admin/classes') ?>">Class Allocation</a>
        <a href="<?= site_url('User/announcement') ?>">Create Announcements</a>
        <a href="<?= site_url('Admin/results') ?>">Publish Results</a>
        <a href="<?= site_url('Admin/students') ?>">Subjects Allocation</a>
    </div>


    <!-- Main Content -->
    <div class="container-fluid ">
        <div class="content m-3">
            <div class="card m-5" style="width: 65rem;">
                <div class="card-body">
                    <h5 class="card-title">Welcome,
                        <?= session()->get('Name') ?>!
                    </h5>
                    <p class="card-text">You can manage teachers, students, subjects, announcements, results, and more
                        from this
                        dashboard.</p>
                </div>
            </div>



            <div class="container d-flex justify-content-center align-items-center m-0">

                <div class="card p-2 m-0" style="width: 65rem; ">
                    <!-- Logo -->
                    <h3>Subject Creation Form</h3>

                    <div class="card-body">
                        <form method="post" action="<?= site_url('Admin/create') ?>">
                            <?php csrf_field() ?>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="Name"
                                    value="<?= set_value('description') ?>" placeholder=" subject name">
                                <span class="text-danger text-sm">
                                    <?= isset($validation) ? display_form_errors($validation, 'Name') : "" ?>
                                </span>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="SubjectCode"
                                    value="<?= set_value('description') ?>" placeholder=" subject code">
                                <span class="text-danger text-sm">
                                    <?= isset($validation) ? display_form_errors($validation, 'SubjectCode') : "" ?>
                                </span>
                            </div>
                            <div class="mb-3">
                                <label for="Grade" class="form-label">Grade:</label>
                                <select class="form-select" name="grade_id" required>
                                    <?php foreach ($Grades as $grade): ?>
                                        <option value="<?= $grade->ID ?>" <?= set_select('Grade', $grade->ID) ?>>
                                            <?= $grade->name ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <span class="text-danger text-sm">
                                    <?= isset($validation) ? display_form_errors($validation, 'Grade') : "" ?>
                                </span>
                            </div>


                            <button type="submit" class="btn btn-success w-100">Add Subject</button>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        &copy;
        <?= date('Y') ?> Your School Name
    </div>

    <!-- Bootstrap JS (optional, only needed if you want to use Bootstrap JavaScript features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</body>

</html>