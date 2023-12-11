<?php
session_start();
include('backend.php');
?>
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
    if ($user_error != null) {
    ?><style>
            .user_error {
                display: block;
            }

            #employeeNumber.error-input {
                border-color: #dc3545;
            }

            label#id_number_label.error-input {
                color: #dc3545;
            }

            #passwordEmployee.error-input {
                border-color: #dc3545;
            }

            label#password_label.error-input {
                color: #dc3545;
            }
        </style><?php
            }
            if ($id_error != null) {
                ?><style>
            .id_error {
                display: block;
            }

            #employeeNumber.error-input {
                border-color: #dc3545;
            }

            label#id_number_label.error-input {
                color: #dc3545;
            }
        </style><?php
            }
            if ($password_error != null) {
                ?><style>
            .password_error {
                display: block;
            }

            #passwordEmployee.error-input {
                border-color: #dc3545;
            }

            label#password_label.error-input {
                color: #dc3545;
            }
        </style><?php
            } ?>
</head>

<body>

    <!--form-->
    <div class="d-flex justify-content-center align-items-center my-5">
        <div class="card card-custom my-5" style="width: 40%; border: 4px solid #A401DD;">
            <div class="card-body">
                <a href="index.php" type="button" class="btn-close float-end" aria-label="Close"></a>
                <h2 class="text-center pt-3">Login - Employee</h2>
                <p class="error_exist user_error text-danger text-center">
                    <?php echo $user_error ?>
                </p>
                <?php if (isset($_SESSION['msg']) && !empty($_SESSION['msg'])) : ?>
                    <p class="error_exist text-danger text-center" style="display: block !important;">
                        <?php echo $_SESSION['msg']; ?>
                    </p>
                    <?php unset($_SESSION['msg']); ?>
                <?php endif; ?>
                <?php if (isset($_SESSION['session_expired']) && !empty($_SESSION['session_expired'])) : ?>
                    <p class="error_exist text-danger text-center" style="display: block !important;">
                        <?php echo $_SESSION['session_expired']; ?>
                    </p>
                    <?php unset($_SESSION['session_expired']); ?>
                <?php endif; ?>

                <form class="px-3 py-4" autocomplete="off" method="POST">
                    <div class="mb-3">
                        <label for="employeeNumber"  id="id_number_label" class="form-label fw-bold error-input">EMPLOYEE NUMBER:</label>
                        <input type="text" class="form-control error-input" id="employeeNumber" name="employeeNumber" aria-describedby="employeeNumber" style="background-color: rgba(135, 139, 243, .5);" value="<?php echo $id_number?>">
                        <p class="error id_error text-danger">
                            <?php echo $id_error ?>
                        </p>
                    </div>
                    <div class="mb-3">
                        <label for="passwordEmployee" id="password_label" class="form-label fw-bold error-input">PASSWORD:</label>
                        <input type="password" class="form-control error-input" id="passwordEmployee" 
                        name="passwordEmployee" style="background-color: rgba(135, 139, 243, .5);" value="<?php echo $user_password?>">
                        <p class="error password_error text-danger">
                            <?php echo $password_error ?>
                        </p>
                    </div>
                    <div class="justify-content-center align-items-center d-flex">
                        <button type="submit" class="btn fw-semibold fs-6 text-white" style="background-color: #3A48B6; width: 100px;" name="login_employee_btn">Login</button>
                    </div>
                </form>
                <div class="px-3">
                    <p class="text-dark fw-semibold">Don't have an Account? <a href="signup_employee.php" class="text-decoration-none" style="color: #3A48B6;">Signup</a></p>
                </div>
            </div>
        </div>
    </div>
    <script src="background.js"></script>
</body>

</html>