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
            Admin's Dashboard
        </div>
        <ul class="navbar-nav ms-auto p-2">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('logout') ?>">Logout</a>
            </li>
        </ul>
    </nav>
    <div class="sidebar">
        <a href="<?= site_url('Admin') ?>">Dashboard</a>
        <a href="<?= site_url('Admin/hire') ?>" class="active">Hire New Teacher</a>
        <a href="<?= site_url('Admin/classes') ?>">Class Allocation</a>
        <a href="<?= site_url('User/announcement') ?>">Create Announcements</a>
        <a href="<?= site_url('Admin/results') ?>">Publish Results</a>
        <a href="<?= site_url('Admin/subjects') ?>">Subjects</a>
    </div>

    <div class="container-fluid">

        <div class="announcements-section">

            <iframe src="<?= base_url("announcements/" . $Announcement->File) ?>" width=" 999" height="600"
                style="border: none;"></iframe>

            <!-- <div class="alert alert-success d-flex" role="alert">
    <p class="me-auto">
        hello
    </p>
    <a href="../announcements/ASSIGN1_dpf.pdf" class="btn btn-primary btn-at-end">Open Document</a>
</div> -->



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