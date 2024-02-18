<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Details Form</title>

    <!-- Bootstrap CSS -->
    <link href="<?= base_url('bootstrap\dist\css\bootstrap.min.css') ?>" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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

        .sidebar a {
            padding: 16px;
            text-decoration: none;
            font-size: 18px;
            color: #fff;
            display: block;
        }

        .sidebar {
            position: fixed;
            height: 100%;
            width: 220px;
            top: 0;
            left: 0;
            background-color: #343a40;
            padding-top: 56px;
            color: #fff;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .container-fluid {
            padding-left: 220px;
            /* Adjust based on sidebar width */
            padding-top: 56px;
        }

        .card {

            width: 90rem;
            /* Set your desired width */
            max-width: 100%;
            padding: 20px;
            margin-block-start: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar {
            background-color: #343a40;
            color: #fff;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .navbar-nav .nav-link {
            color: #fff;
        }

        @media (max-width: 768px) {
            .container-fluid {
                padding-left: 0;
            }

            .sidebar {
                width: 100%;
                position: static;
                padding-top: 56px;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-dark fixed-top bg-dark">
        <div class="navbar-brand m-0 p-2 h1">
            Teacher's Dashboard
        </div>
        <ul class="navbar-nav ms-auto p-2">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('logout') ?>">Logout</a>
            </li>
        </ul>
    </nav>
    <div class="sidebar">
        <a href="<?= site_url('User') ?>">Dashboard</a>
        <a href="<?= site_url('User/enroll') ?>">Enroll Students</a>
        <a href="<?= site_url('User/results') ?>">Enter Results</a>
        <a href="<?= site_url('User/announcement') ?>">Create Announcements</a>
        <a href="#">Publish Results</a>
        <a href="#">Subjects Allocation</a>
    </div>

    <div class="container-fluid mx-5" style="width: 75rem;">
        <div class="card " style="width: 65rem;">
            <div class="card-body">
                <h5 class="card-title">Welcome,
                    <?= session()->get('Name') ?>!
                </h5>
                <p class="card-text">You can manage Teachers, students, subjects, announcements, results, and more
                    from this
                    dashboard.</p>
            </div>
        </div>
        <?php if (!empty(session()->getFlashdata("success"))): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata("success") ?>
            </div>
        <?php elseif (!empty(session()->getFlashdata("error"))): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata("error") ?>
            </div>
        <?php endif; ?>

        <div class="col-md-9 mx-5">
            <div class="card mx-auto mt-4 my-5 width:65rem;">
                <h3 class="text-center mb-4">Test Results Collection Form</h3>


                <form method="post" action="<?= site_url('User/EnterResults') ?>">
                    <?php csrf_field() ?>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="" class="form-label"><b>
                                    <?= $student->identity ?> :
                                    <?= $student->Name ?>

                                </b></label>
                            <input type="hidden" class="form-control" name="student_id"
                                value="<?= $student->identity ?>">

                        </div>


                    </div>

                    <?php foreach ($subjects as $subject): ?>
                        <?php if ($subject->grade_id === $student->grade_id): ?>
                            <div class="col-md-3">
                                <label for="Name" class="form-label">
                                    <?= $subject->Name ?> :
                                </label>
                                <input type="number" class="form-control" name="Score_<?= $subject->ID ?>"
                                    placeholder="ENTER THE SCORE">
                                <span class="text-danger text-sm">
                                    <?= isset($validation) ? display_form_errors($validation, 'Score') : "" ?>
                                </span>
                            </div>

                        <?php endif; ?>

                    <?php endforeach; ?>

                    <button type="submit" class="btn btn-success my-2">RECORD</button>
                </form>


            </div>
        </div>
    </div>
    <div class="footer">
        &copy;
        <?= date('Y') ?> Your School Name
    </div>

    <!-- Bootstrap JS (optional, only needed if you want to use Bootstrap JavaScript features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>