<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap CSS -->

    <link href="<?= base_url('bootstrap\dist\css\bootstrap.min.css') ?>" rel="stylesheet">
</head>

<body>
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
    <div class="container d-flex justify-content-center align-items-center vh-100">

        <div class="card" style="width: 18rem;">
            <!-- Logo -->
            <img src="<?= base_url('images/logo hks.jpg') ?>" style="width: 6rem; height:7rem"
                class="card-img-top rounded-circle mx-auto mt-3" alt="Logo">

            <div class="card-body">
                <form method="post" action="<?= base_url('login') ?>">
                    <?php csrf_field() ?>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="identity" value="<?= set_value('identity') ?>"
                            placeholder=" Enter your Id">
                        <span class="text-danger text-sm">
                            <?= isset($validation) ? display_form_errors($validation, 'identity') : "" ?>
                        </span>
                    </div>

                    <div class="mb-3">
                        <input type="password" class="form-control" name="password" value="<?= set_value('password') ?>"
                            placeholder=" Enter your Password">
                        <span class="text-danger text-sm">
                            <?= isset($validation) ? display_form_errors($validation, 'password') : "" ?>
                        </span>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Login</button>

                    <p class="mt-2"><a href="#">Forgotten your password?</a></p>
                </form>

            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional, only needed if you want to use Bootstrap JavaScript features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>