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
        .offcanvas-open .container-fluid {
            transform: translateX(250px);
        }
        .alert {
    transition: opacity 3s ease-out;
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
                                  <a class="nav-link" id="hello" href="<?= site_url('Admin/hire') ?>"  data-page="<?= site_url('Admin/hire') ?>">   <i class="fas fa-cog"></i> Add Teacher</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" id="hello" href="<?= site_url('Admin/Teachers') ?>"  data-page="<?= site_url('Admin/Teachers') ?>">   <i class="fas fa-envelope"></i> View Teachers</a>
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
                                  <a class="nav-link" id="hello" href="<?= site_url('Admin/enroll') ?>"  data-page="<?= site_url('Admin/enroll')?>"><i class="fas fa-cog"></i> Enroll</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link"  id="hello" href="<?= site_url('Admin/AllStudents') ?>"  data-page="<?= site_url('Admin/AllStudents') ?>"><i class="fas fa-envelope"></i> View Students</a>
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
    <div class="position-absolute top-0 end-0 mt-5 me-5">
        <?php if (!empty(session()->getFlashdata("success"))) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo session()->getFlashdata("success"); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } else if (!empty(session()->getFlashdata("error"))) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo session()->getFlashdata("error"); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
    </div>




      <div id="mainBody" class="container mt-5">
        
    </div> 
      
      
      
    
    
    
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
   
   <script>
    
    function fadeOutAlert() {
        // Get the alert element
        const alertElement = document.querySelector('.alert');

        // Check if the alert element exists
        if (alertElement) {
            // Set the initial opacity
            let opacity = 1;

            // Define the interval function to decrease opacity
            const intervalId = setInterval(() => {
                // Reduce opacity
                opacity -= 0.05;

                // Apply the new opacity to the alert element
                alertElement.style.opacity = opacity;

                // Check if opacity is zero or less
                if (opacity <= 0) {
                    // Clear the interval
                    clearInterval(intervalId);

                    // Remove the alert element from the DOM
                    alertElement.remove();
                }
            }, 100); // Interval duration (milliseconds)
        }
    }

    // Call the fadeOutAlert function after a delay (e.g., 5 seconds)
    setTimeout(fadeOutAlert, 5000); // 5000 milliseconds = 5 seconds



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

        function validateForm() {
        // Get the input fields
        const identity = document.getElementsByName('Identity')[0].value;
        const dateOfBirth = document.getElementsByName('DateOfBirth')[0].value;
        const firstName = document.getElementsByName('FirstName')[0].value;
        const lastName = document.getElementsByName('LastName')[0].value;
        const nationality = document.getElementsByName('Nationality')[0].value;
        const gender = document.getElementsByName('Gender')[0].value;
        const homeAddress = document.getElementsByName('HomeAddress')[0].value;
        const phoneOne = document.getElementsByName('PhoneOne')[0].value;
        const email = document.getElementsByName('Email')[0].value;
        const document1 = document.getElementsByName('Document1')[0].value;
        const document2 = document.getElementsByName('Document2')[0].value;

        // Check if mandatory fields are empty
        if (!identity || !dateOfBirth || !firstName || !lastName || !nationality || !gender || !homeAddress || !phoneOne || !email || !document1 || !document2) {
            // Display alert for missing mandatory fields
            const alert = document.createElement('div');
            alert.classList.add('alert', 'alert-danger', 'position-absolute', 'top-0', 'end-0', 'm-3');
            alert.textContent = 'Please fill in all mandatory fields.';
            document.body.appendChild(alert);

            // Remove the alert after 5 seconds
            setTimeout(() => {
                alert.remove();
            }, 5000);

            // Prevent form submission
            return false;
        }

        // If all mandatory fields are filled, allow form submission
        return true;
    }

    function calculateAge(dateString) {
        const today = new Date();
        const birthDate = new Date(dateString);
        const age = today.getFullYear() - birthDate.getFullYear();
        const m = today.getMonth() - birthDate.getMonth();

        // Check if age is less than 15
        if (age < 15 || (age === 15 && m < 0)) {
            const alertDiv = document.createElement('div');
            alertDiv.classList.add('alert', 'alert-danger', 'alert-dismissible', 'fade', 'show');
            alertDiv.setAttribute('role', 'alert');
            alertDiv.innerHTML = `
                Date of birth is too recent. Age cannot be less than 15.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            `;
            const container = document.querySelector('.position-absolute.top-0.end-0');
            container.appendChild(alertDiv);

            // Fade out the alert after 5 seconds
            setTimeout(() => {
                alertDiv.classList.remove('show');
                setTimeout(() => {
                    alertDiv.remove();
                }, 500);
            }, 5000);

            // Reset the DateOfBirth input field
            document.querySelector('input[name="DateOfBirth"]').value = "";
        }
    }

    </script> 
    

</body>
<div class="footer">
        &copy;
        <?= date('Y') ?> Your School Name
    </div>
</html>