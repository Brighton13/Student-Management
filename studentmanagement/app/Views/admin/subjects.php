<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subjects</title>

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
        <a href="<?= site_url('Admin/create') ?>">Add Subject</a>
        <a href="<?= site_url('Admin/View') ?>">Allocate Subjects</a>
        <a href="<?= site_url('Admin/Performance') ?>">Performance</a>


    </div>

    <!-- Main Content -->
    <div class="container-fluid " style="width:70rem">
        <div class="height: 23rem">
            <br>
            <br>
        </div>


        <div class="card my-5 m-3" style="width: 65rem;">
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
            <div>
                <table class="table table-bordered " style="width: 65rem;">
                    <thead>
                        <tr>

                            <th>Name</th>
                            <th>Code</th>
                            <th>Grade</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($Subjects as $subject): ?>
                            <tr>

                                <td>
                                    <?= $subject->Name ?>
                                </td>
                                <td>
                                    <?= $subject->SubjectCode ?>
                                </td>
                                <td>
                                    <?= $subject->grade_id ?>
                                </td>
                                <td><a href="#" class="btn btn-danger">Delete Subject</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>


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