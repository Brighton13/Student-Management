<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher's Dashboard</title>

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
            overflow: auto;
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
            padding-left: 240px;
            /* Adjusted padding for larger screens */
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
        @media (max-width: 992px) {
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

    <!-- Navigation Bar -->
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

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="<?= site_url('User') ?>">Dashboard</a>
        <a href="<?= site_url('User/enroll') ?>">Students</a>
        <a href="<?= site_url('User/results') ?>">Results</a>
        <a href="<?= site_url('User/announcement') ?>">Announcements</a>
        <a href="#">Assignment</a>
        <a href="#"></a>
    </div>

    <!-- Main Content -->
    <div class="container-fluid my-5">
        <div class="content">

            <div class="card my-5">
                <div class="card-body">
                    <h5 class="card-title">Welcome,
                        <?= session()->get('Name') ?>!
                    </h5>
                    <p class="card-text">You can manage students, subjects, announcements, results, and more from
                        this
                        dashboard.</p>
                </div>
            </div>
            <div class="row">
                <div class="card m-2 col-md-5 overflow-auto" style="width: 32rem; max-height: 400px;">
                    <div class="card-body">
                        <h5 class="card-title">Announcements</h5>

                        <?php
                        $announcements = array_reverse($announcements);

                        foreach ($announcements as $announcement): ?>
                            <div class="card mb-2" style="background-color: #e6f7ff;">
                                <div class="card-body">
                                    <h6 class="card-subtitle mb-2 text-muted">
                                        <?= strtoupper($announcement->Title) ?>
                                    </h6>
                                    <a href="<?= base_url('User/announcement/' . $announcement->ID) ?>"
                                        class="btn btn-primary" target="_blank">Read Full Announcement</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="card m-2 col-md-5" style="width: 32rem; max-height: 400px;">
                    <div class="card-body">
                        <h5 class="card-title">My Students</h5>
                        <canvas id="performanceChart2" width="400" height="400"></canvas>
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