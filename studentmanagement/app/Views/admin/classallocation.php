<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin's Dashboard</title>

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
        <a href="<?= site_url('Admin/hire') ?>">Hire New Teacher</a>
        <a href="<?= site_url('Admin/classes') ?>">Class Allocation</a>
        <a href="<?= site_url('User/announcement') ?>">Create Announcements</a>
        <a href="<?= site_url('Admin/results') ?>">Publish Results</a>
        <a href="<?= site_url('Admin/students') ?>">Subjects Allocation</a>

    </div>

    <!-- Main Content -->
    <div class="container-fluid ">
        <div class="height: 23rem">
            <br>
            <br>
        </div>


        <div class="card m-5" style="width: 65rem;">
            <div class="card-body">
                <h5 class="card-title">Welcome,
                    <?= session()->get('Name') ?>!
                </h5>
                <p class="card-text">You can manage Teachers, students, subjects, announcements, results, and more
                    from this
                    dashboard.</p>
            </div>
        </div>
        <div class="content">
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
            <div class="container m-3 ">
                <h2 class="mb-4">Unallocated Teachers</h2>

                <?php if (!empty($teachers)): ?>
                    <table class="table table-bordered mx-0" style="width: 65rem;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Actions</th>
                                <!-- Add other columns as needed -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($teachers as $teacher): ?>
                                <?php if ($teacher->Role !== 'Admin') {
                                    ; ?>
                                    <tr>
                                        <td>
                                            <b>
                                                <?= $teacher->identity ?>
                                            </b>
                                        </td>
                                        <td>
                                            <b>
                                                <?= $teacher->Name ?>
                                            </b>
                                        </td>
                                        <td>
                                            <b>
                                                <?= $teacher->Phone ?>
                                            </b>
                                        </td>
                                        <form method="post" action="<?= base_url('Admin/classes/' . $teacher->identity) ?>">
                                            <td>
                                                <select name="grade_id">
                                                    <?php foreach ($grades as $grade): ?>
                                                        <option type="submit" class="btn btn-primary" value="<?= $grade->ID ?>">
                                                            <?= $grade->name ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <button type="submit" class="btn btn-primary">Allocate Grade</button>
                                            </td>
                                        </form>

                                    </tr>
                                <?php } ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>No unallocated teachers found.</p>
                <?php endif; ?>

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