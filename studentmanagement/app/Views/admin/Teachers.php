
<style>
    <style>
    /* Additional styling */
    #submitBtn {
        margin: 20px; /* Add margin to the submit button */
        background-color: orange; /* Orange background color */
        color: white; /* White text color */
        border: none; /* Remove button border */
        padding: 10px 20px; /* Add padding */
        border-radius: 5px; /* Add border radius */
    }

    #submitBtn:hover {
        background-color: green; /* Green background color on hover */
    }

    .container {
        margin-top: 20px; /* Add margin to the container */
        margin-bottom: 20px; /* Add margin to the container */
    }

    /* Apply some styling to form inputs */
    input[type="text"],
    input[type="number"],
    select,
    textarea {
        border: 1px solid #ced4da; /* Add a border */
        border-radius: 4px; /* Add border radius */
        padding: 8px; /* Add padding */
        margin-bottom: 10px; /* Add margin bottom */
    }
    .nav-tabs .nav-link {
        color: #ffffff; /* White text color */
        background-color: orange; /* Orange background color */
        border: none; /* Remove border */
        border-radius: 0; /* Remove border radius */
    }

    .nav-tabs .nav-link.active {
        color: #ffffff; /* White text color for active tab */
        background-color: green; /* Green background color for active tab */
    }

    /* Tab pane styling */
    .tab-pane {
        background-color: #ffffff; /* White background color */
        border: 1px solid green; /* Green border */
        padding: 20px; /* Add padding */
        height: 400px; 
        border-radius: 5px; /* Add border radius */
    }
    .form-heading {
        color: green; /* Green text color */
        font-size: 24px; /* Larger font size */
        font-weight: bold; /* Bold font weight */
        margin-bottom: 20px; /* Add some bottom margin */
        text-align: center; /* Center align the text */
        text-transform: uppercase; /* Convert text to uppercase */
    }
</style>



<div class="container mt-5">
    <div class="panel panel-default shadow">
        <div class="panel-body">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h4 class="form-heading">ALL TEACHERS LIST</h4>
                </div>
            </div>

            <?php if (!empty(session()->getFlashdata("error"))) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo session()->getFlashdata("error"); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Teacher ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($teachers as $teacher) { ?>
                        <tr>
                            <th scope="row"><?= $teacher->Identity?></th>
                            <td><?= $teacher->FirstName ?></td>
                            <td><?= $teacher->LastName ?></td>
                            <td>
                                <!-- Edit button -->
                                <a href="<?= base_url('edit_teacher/' . $teacher->Identity) ?>" class="btn btn-primary btn-sm">Edit</a>
                                <!-- Delete button -->
                                <a href="<?= base_url('delete_teacher/' .$teacher->Identity) ?>" class="btn btn-danger btn-sm">Delete</a>
                               
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<br>


