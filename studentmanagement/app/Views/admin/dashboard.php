<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
   <style>
      

        .footer {
            text-align: center;
            padding: 10px;
            background-color: #343a40;
            color: #fff;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

</style>
</head>
  <body>

    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                <i class="fa-light fa-bars"></i> <!-- Font Awesome menu icon -->
              </a>
          <a class="navbar-brand"><H1>ADMIN DASHBOARD</H1></a>
            <a class="btn btn-outline-success" href="<?= base_url('logout')?>" >Logout</a>        
        </div>
      </nav>
     

      <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" style="width: 350px;">
          <div class="offcanvas-body">
              <ul class="nav flex-column">
                  <li class="nav-item">
                      <a class="nav-link active fs-5" aria-current="page" href="#" data-bs-toggle="collapse" data-bs-target="#submenu1" aria-expanded="false" aria-controls="submenu1">
                          <i class="fas fa-user"></i> Teachers
                      </a>
                      <div class="collapse" id="submenu1">
                          <ul class="nav flex-column">
                              <li class="nav-item">
                                  <a class="nav-link" href="<?= site_url('Admin/hire') ?>"  data-page="<?= site_url('Admin/hire') ?>">   <i class="fas fa-cog"></i> Add Teacher</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="#"  data-page="">   <i class="fas fa-envelope"></i> View Teachers</a>
                              </li>
                            </li>
                              
                      </div>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link fs-5"  data-bs-toggle="collapse" data-bs-target="#submenu2" aria-expanded="false" aria-controls="submenu2">
                          <i class="fas fa-user"></i>  Students
                      </a>
                      <div class="collapse" id="submenu2">
                          <ul class="nav flex-column">
                              <li class="nav-item">
                                  <a class="nav-link" id="hello" href="<?= site_url('Admin/subjects') ?>"  data-page="admin/subjects.php"><i class="fas fa-cog"></i> Enroll</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link"  id="hello" href="#"  data-page=""><i class="fas fa-envelope"></i> View Students</a>
                              </li>
                             
                          </ul>
                      </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link fs-5" href="#" data-bs-toggle="collapse" data-bs-target="#submenu3" aria-expanded="false" aria-controls="submenu3">
                        <i class="fa-solid fa-coins"></i>  Finances
                    </a>
                    <div class="collapse" id="submenu3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link"  id="hello" href="#"><i class="fas fa-cog"></i> Generate Invoices</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"  id="hello"  href="#"  data-page=""><i class="fas fa-envelope"></i> Students payment status</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"  id="hello"  href="#"  data-page=""><i class="fas fa-envelope"></i> Payroll details</a>
                            </li>
                           
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5"  data-bs-toggle="collapse" data-bs-target="#submenu4" aria-expanded="false" aria-controls="submenu4">
                        <i class="fa-solid fa-book-open"></i>  Subjects 
                    </a>
                    <div class="collapse" id="submenu4">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link"  id="hello" href="#"  data-page="Admin/subjects"><i class="fas fa-cog"></i> Add Subject</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"  id="hello" href="#"  data-page=""><i class="fas fa-envelope"></i> View Subjects</a>
                            </li>
                           
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5" href="#"  data-page="" data-bs-toggle="collapse" data-bs-target="#submenu5" aria-expanded="false" aria-controls="submenu5">
                        <i class="fa-solid fa-bullhorn"></i>  Announcements
                    </a>
                    <div class="collapse" id="submenu5">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link"  id="hello" href="#"  data-page=""><i class="fas fa-cog"></i> Create Announcement</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"  id="hello" href="#"  data-page=""><i class="fas fa-envelope"></i> View Announcements</a>
                            </li>
                           
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5" href="#"  data-page="" data-bs-toggle="collapse" data-bs-target="#submenu6" aria-expanded="false" aria-controls="submenu6">
                        <i class="fa-solid fa-graduation-cap"></i>  Grades
                    </a>
                    <div class="collapse" id="submenu6">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link"  id="hello" href="#"  data-page=""><i class="fas fa-cog"></i> Add Grade</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"  id="hello" href="#"  data-page="<?= site_url('Admin/classes') ?>"><i class="fas fa-envelope"></i> View Grades</a>
                            </li>
                           
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5" href="#"  data-page="" data-bs-toggle="collapse" data-bs-target="#submenu7" aria-expanded="false" aria-controls="submenu7">
                        <i class="fa-solid fa-square-poll-vertical"></i>  Results
                    </a>
                    <div class="collapse" id="submenu7">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link"  id="hello" href="#"  data-page="<?= site_url('Admin/reults') ?>"><i class="fas fa-cog"></i> Publish Results</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"  id="hello" href="#"  data-page=""><i class="fas fa-envelope"></i> View Results </a>
                            </li>
                           
                        </ul>
                    </div>
                </li>
               
              </ul>
          </div>
      </div>
      

     <!-- <div class="card my-5 m-3" style="width: 65rem;">
            <div class="card-body">
                <h5 class="card-title">Welcome,
                    <?= session()->get('Name') ?>!
                </h5>
                <p class="card-text">You can manage Teachers, students, subjects, announcements, results, and more
                    from this
                    dashboard.</p>
            </div>
        </div>-->
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
      <div id="mainBody" class="container mt-5">
        
    </div> 
      
      
      
    
    
    
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Get reference to the main body
            const mainBody = document.getElementById("mainBody");

            // Function to load page content into main body
            function loadPage(pageName) {
                fetch(`${pageName}`)
                .then(response => response.text())
                .then(data => {
                    mainBody.innerHTML = data;
                });
            }

            // Add click event listeners to sidebar links
            const sidebarLinks = document.querySelectorAll("#hello");
            sidebarLinks.forEach(link => {
                link.addEventListener("click", function(event) {
                    event.preventDefault();
                    const pageName = this.getAttribute("data-page");
                    loadPage(pageName);
                });
            });
        });
    </script> 
    

</body>
<div class="footer">
        &copy;
        <?= date('Y') ?> Your School Name
    </div>
</html>