<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Home Page</title>

    <!-- Bootstrap CSS -->
    <link href="<?= base_url('bootstrap\dist\css\bootstrap.min.css') ?>" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        /* Custom Styles */

        #sidebar {
            height: 100vh;
            position: fixed;
        }

        .profile-section {
            text-align: center;
        }

        .announcements-section {
            margin-top: 20px;
        }

        .btn-at-end {
            margin-left: auto;
        }

        /* Additional Styles for Responsiveness */
        @media (max-width: 768px) {
            #sidebar {
                position: static;
                height: auto;
            }

            .navbar-nav {
                flex-direction: column;
            }
        }

        .announcements-section .alert {
            padding: 0.5rem;
            /* Adjust the padding to reduce the overall size of the alert */
            font-size: 0.9rem;
            /* Adjust the font size as needed */
            margin-bottom: 10px;
            /* Add margin to separate alerts */
        }

        .announcements-section .btn {
            padding: 0.2rem 0.5rem;
            /* Adjust the padding to reduce the button size */
            font-size: 0.8rem;
            /* Adjust the font size as needed */
        }

        .footer {
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #f8f9fa;
            /* Add a background color if needed */
        }
    </style>
</head>

<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Student Portal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('logout') ?>">Logout</a>
                    </li>

                </ul>
            </div>
        </div>

    </nav>

    <!-- Page Content -->
    <div class="container-fluid">
        <div class="row">

            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar c">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                Payments
                            </a>
                        </li>
                        <hr>
                        <!-- Update the "Results" link to a dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="resultsDropdown" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Results
                            </a>
                            <div class="dropdown-menu" aria-labelledby="resultsDropdown">
                                <a class="dropdown-item" href="#">Tests</a>
                                <a class="dropdown-item" href="#">Exams</a>
                            </div>
                        </li>

                        <hr>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Subjects
                            </a>
                        </li>
                        <hr>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Assignments
                            </a>
                        </li>
                        <hr>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                TimeTable
                            </a>
                        </li>
                        <hr>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Profile
                            </a>
                        </li>
                        <hr>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Account Settings
                            </a>
                        </li>
                    </ul>
                </div>
                </ul>
        </div>
        </nav>


        <!-- Main Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

            <!-- Profile Section -->
            <div
                class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom profile-section">
                <div class="text-center">
                    <img src="<?= base_url('images/logo.png') ?>" alt="Profile" class="rounded-circle" width="40"
                        height="40">
                    <h2 class="h2 text-color-l">
                        <?= session()->get('identity') ?>
                    </h2>
                </div>
            </div>


            <!-- Announcements Section -->
            <div class="announcements-section">
                <?php
                // Reverse the order of announcements
                $announcements = array_reverse($announcements);

                foreach ($announcements as $announcement):
                    ?>
                    <div class="alert alert-success d-flex" role="alert">
                        <p><b>
                                <?= strtoupper($announcement->Title) ?>
                            </b></p>
                        <a href="<?= base_url('Student/announcement/' . $announcement->ID) ?>"
                            class="btn btn-primary btn-at-end">Open Document</a>
                    </div>
                <?php endforeach; ?>
            </div>



        </main>
    </div>
    </div>

    <div class="footer static">
        &copy;
        <?= date('Y') ?> Your School Name
    </div>

    <!-- Bootstrap JS (optional, only needed if you want to use Bootstrap JavaScript features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</body>

</html>