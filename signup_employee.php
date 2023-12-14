<?php
session_start();
include('backend.php');

// Set CSP header
header("Content-Security-Policy: default-src 'self'");
header("Content-Security-Policy: style-src 'self' https://maxcdn.bootstrapcdn.com");
header("Content-Security-Policy: script-src 'self' https://ajax.googleapis.com 'unsafe-inline'");
header("Content-Security-Policy: img-src * data:");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - Employee</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="shortcut icon" href="image/logo.png">

    <!--stylesheet using bootstrap5-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />

    <!--font-family "Poppins"-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />

    <!--for animations-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />

    <!-- font awesome  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
    <?php

    if ($id_exist_error != null) {
    ?><style>
            .id_exist_error {
                display: block;
            }

            label#id_number_label.error-input {
                color: #dc3545;
            }

            #idNumberStudentSignup.error-input {
                border-color: #dc3545;
            }
        </style><?php
            }
            if ($email_exist_error != null) {
                ?><style>
            .email_exist_error {
                display: block;
            }

            #emailStudentSignup.error-input {
                border-color: #dc3545;
            }

            label#email_label.error-input {
                color: #dc3545;
            }
        </style><?php
            }
            if ($id_error != null) {
                ?><style>
            .id_error {
                display: block
            }

            #employeeNumberSignup.error-input {
                border-color: #dc3545;
            }

            label#id_number_label.error-input {
                color: #dc3545;
            }
        </style> <?php
                }
                if ($name_error != null) {
                    ?><style>
            .name_error {
                display: block;
            }

            #nameEmployeeSignup.error-input {
                border-color: #dc3545;
            }

            label#name_label.error-input {
                color: #dc3545;
            }
        </style> <?php
                }
                if ($email_error != null) {
                    ?><style>
            .email_error {
                display: block;
            }

            #emailEmployeeSignup.error-input {
                border-color: #dc3545;
            }

            label#email_label.error-input {
                color: #dc3545;
            }
        </style> <?php
                }
                if ($password_error != null) {
                    ?><style>
            .password_error {
                display: block;
            }

            #passwordEmployeeSignup.error-input {
                border-color: #dc3545;
            }

            label#password_label.error-input {
                color: #dc3545;
            }
        </style> <?php
                }
                if ($confirm_password_error != null) {
                    ?><style>
            .confirm_password_error {
                display: block;
            }

            #confirmPasswordEmployeeSignup.error-input {
                border-color: #dc3545;
            }

            label#confirm_password_label.error-input {
                color: #dc3545;
            }
        </style> <?php
                }
                    ?>
    <style>
        body {
            background: linear-gradient(to left, rgb(5, 98, 155), rgb(99, 27, 163));
        }
    </style>
</head>

<body>

    <!--form-->
    <div class="d-flex justify-content-center align-items-center py-5">
        <div class="card card-custom" style="width: 40%; border: 4px solid #A401DD;">
            <div class="card-body">
                <a href="index.php" type="button" class="btn-close float-end" aria-label="Close"></a>

                <h2 class="text-center pt-3">Signup - Employee</h2>
                <p class="error_exist id_exist_error text-danger text-center">
                    <?php echo $id_exist_error ?>
                </p>
                <p class="error_exist email_exist_error text-danger text-center">
                    <?php echo $email_exist_error ?>
                </p>
                <?php if (isset($_SESSION['msg']) && !empty($_SESSION['msg'])) : ?>
                    <p class="error_exist text-danger text-center" style="display: block !important;">
                        <?php echo $_SESSION['msg']; ?>
                    </p>
                    <?php unset($_SESSION['msg']); ?>
                <?php endif; ?>

                <form class="px-3 py-4" method="POST" autocomplete="off">
                    <!--name field-->
                    <div class="mb-3">
                        <label for="nameEmployeeSignup" id="name_label" class="form-label fw-bold error-input">Name:</label>
                        <input type="text" class="form-control error-input" id="nameEmployeeSignup" name='nameEmployeeSignup' placeholder="Juan Dela Cruz" style="background-color: rgba(135, 139, 243, .5);" value="<?php echo $name ?>">
                        <p class="error name_error text-danger">
                            <?php echo $name_error ?>
                        </p>
                    </div>

                    <!--email field-->
                    <div class="mb-3">
                        <label for="emailEmployeeSignup" id="email_label" class="form-label fw-bold error-input">Email:</label>
                        <input type="email" class="form-control error-input" id="emailEmployeeSignup" name='emailEmployeeSignup' aria-describedby="emailStudent" placeholder="Use carsu email @carsu.edu.ph" style="background-color: rgba(135, 139, 243, .5);" value="<?php echo $email ?>">
                        <p class="error email_error text-danger">
                            <?php echo $email_error ?>
                        </p>
                    </div>

                    <!--employee number field--->
                    <div class="mb-3">
                        <label for="employeeNumberSignup" id="id_number_label" class="form-label fw-bold error-input">Employee Number:</label>
                        <input type="text" class="form-control error-input" id="employeeNumberSignup" name='employeeNumberSignup' placeholder="Ex: 211-12345" style="background-color: rgba(135, 139, 243, .5);" value="<?php echo $id_number ?>">
                        <p class="error id_error text-danger">
                            <?php echo $id_error ?>
                        </p>
                    </div>

                    <!---password field--->
                    <div class="mb-3">
                        <label for="passwordEmployeeSignup" id="password_label" class="form-label fw-bold error-input">Password:</label>
                        <div class="input-group">
                            <input type="password" class="form-control error-input" id="passwordEmployeeSignup" name='passwordEmployeeSignup' placeholder='must contain "!@$%&" and 12 characters long' style="background-color: rgba(135, 139, 243, .5);" value="<?php echo $password ?>">
                            <div class="input-group-append">
                                <button class="btn btn-outline " type="button" id="togglePassword" style="background-color: rgba(135, 139, 243, .5); border-top-left-radius: 0; border-bottom-left-radius: 0; padding-left: 10px; padding-right: 10px;">
                                    <i class="fas fa-eye d-none" id="show_eye"></i>
                                    <i class="fas fa-eye-slash" id="hide_eye"></i>
                                </button>
                            </div>
                        </div>
                        <p class="error password_error text-danger">
                            <?php echo $password_error ?>
                        </p>
                    </div>

                    <!---confirm password field--->
                    <div class="mb-3">
                        <label for="confirmPasswordEmployeeSignup" id="confirm_password_label" class="form-label fw-bold error-input">Confirm Password:</label>
                        <div class="input-group">
                            <input type="password" class="form-control error-input" id="confirmPasswordEmployeeSignup" name='confirmPasswordEmployeeSignup' placeholder='must contain "!@$%&" and 12 characters long' style="background-color: rgba(135, 139, 243, .5);" value="<?php echo $confirm_password ?>">
                            <div class="input-group-append">
                                <button class="btn btn-outline " type="button" id="toggleConfirmPassword" style="background-color: rgba(135, 139, 243, .5); border-top-left-radius: 0; border-bottom-left-radius: 0; padding-left: 10px; padding-right: 10px;">
                                    <i class="fas fa-eye d-none" id="show_confirm_eye"></i>
                                    <i class="fas fa-eye-slash" id="hide_confirm_eye"></i>
                                </button>
                            </div>
                        </div>
                        <p class="error confirm_password_error text-danger">
                            <?php echo $confirm_password_error ?>
                        </p>
                    </div>

                    <!---submit button-->
                    <div class="justify-content-center align-items-center d-flex">
                        <button type="submit" class="btn fw-semibold fs-6 text-white" name='signupEmployee_btn' style="background-color: #3A48B6; width: 100px;">Signup</button>
                    </div>
                </form>
                <div class="px-3">
                    <p class="text-dark fw-semibold">Already have an Account? <a href="login_employee.php" class="text-decoration-none" style="color: #3A48B6;">Login</a></p>
                </div>
            </div>
        </div>
    </div>

    <!--show password script-->
    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            var passwordInput = document.getElementById('passwordEmployeeSignup');
            var showEyeIcon = document.getElementById('show_eye');
            var hideEyeIcon = document.getElementById('hide_eye');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                showEyeIcon.classList.remove('d-none');
                hideEyeIcon.classList.add('d-none');
            } else {
                passwordInput.type = 'password';
                showEyeIcon.classList.add('d-none');
                hideEyeIcon.classList.remove('d-none');
            }
        });
    </script>

    <!--show confirm password script-->
    <script>
        document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
            var passwordInput = document.getElementById('confirmPasswordEmployeeSignup');
            var showEyeIcon = document.getElementById('show_confirm_eye');
            var hideEyeIcon = document.getElementById('hide_confirm_eye');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                showEyeIcon.classList.remove('d-none');
                hideEyeIcon.classList.add('d-none');
            } else {
                passwordInput.type = 'password';
                showEyeIcon.classList.add('d-none');
                hideEyeIcon.classList.remove('d-none');
            }
        });
    </script>
</body>

</html>