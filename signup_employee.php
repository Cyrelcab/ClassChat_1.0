<?php require('backend_employee.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - Student</title>
    <link rel="stylesheet" href="style.css" />

    <!--stylesheet using bootstrap5-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />

    <!--font-family "Poppins"-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />

    <!--for animations-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
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
</head>

<body>

    <!--form-->
    <div class="d-flex justify-content-center align-items-center my-5">
        <div class="card card-custom" style="width: 40%; border: 4px solid #A401DD;">
            <div class="card-body">
                <a href="index.php" type="button" class="btn-close float-end" aria-label="Close"></a>

                <h2 class="text-center pt-3">Student - Employee</h2>

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
                        <label for="emailEmployeeSignup"
                        id = "email_label" class="form-label fw-bold error-input">Email:</label>
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
                        <input type="password" class="form-control error-input" id="passwordEmployeeSignup" name='passwordEmployeeSignup' placeholder='must contain "!@$%&" and 12 characters long' style="background-color: rgba(135, 139, 243, .5);" value="<?php echo $password ?>">
                        <p class="error password_error text-danger">
                            <?php echo $password_error ?>
                        </p>
                    </div>

                    <!---confirm password field--->
                    <div class="mb-3">
                        <label for="confirmPasswordEmployeeSignup" id="confirm_password_label" class="form-label fw-bold error-input">Confirm Password:</label>
                        <input type="password" class="form-control error-input" id="confirmPasswordEmployeeSignup" name='confirmPasswordEmployeeSignup' placeholder='must contain "!@$%&" and 12 characters long' style="background-color: rgba(135, 139, 243, .5);" value="<?php echo $confirm_password ?>">
                        <p class="error confirm_password_error text-danger">
                            <?php echo $confirm_password_error ?>
                        </p>
                    </div>

                    <!---submit button-->
                    <div class="justify-content-center align-items-center d-flex">
                        <button type="submit" class="btn fw-semibold fs-6 text-white" name='signupEmployee_btn' style="background-color: #3A48B6; width: 100px;">Signup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>