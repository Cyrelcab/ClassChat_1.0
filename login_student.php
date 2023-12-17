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
    <title>Login - Student</title>
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

    <!--script for googlereCAPTCHA API-->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!--script for ajax-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <?php
    if ($user_error != null) {
    ?><style>
            .user_error {
                display: block;
            }

            #idNumber.error-input {
                border-color: #dc3545;
            }

            label#id_number_label.error-input {
                color: #dc3545;
            }

            #passwordStudent.error-input {
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

            #idNumber.error-input {
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

            #passwordStudent.error-input {
                border-color: #dc3545;
            }

            label#password_label.error-input {
                color: #dc3545;
            }
        </style><?php
            } ?>
    <style>
        body {
            background: linear-gradient(to left, rgb(5, 98, 155), rgb(99, 27, 163));
        }
        @media only screen and (max-width: 600px) {
            div.card-custom {
                width: 80% !important;
            }
        }
        @media only screen and (max-width: 768px) {
            div.card-custom {
                width: 80% !important;
            }
        }
        @media only screen and (max-width: 900px) {
            div.card-custom {
                width: 80% !important;
            }
        }
    </style>
</head>

<body>

    <!--form-->
    <div class="d-flex justify-content-center align-items-center my-5">
        <div class="card card-custom my-5" style="width: 40%; border: 4px solid #A401DD;">
            <div class="card-body">
                <a href="index.php" type="button" class="btn-close float-end" aria-label="Close"></a>
                <h2 class="text-center pt-3">Login - Student</h2>
                <p class="error_exist user_error text-danger text-center">
                    <?php echo $user_error ?>
                </p>
                <?php if (isset($_SESSION['msg']) && !empty($_SESSION['msg'])) : ?>
                    <p class="error_exist text-danger text-center" style="display: block !important;">
                        <?php echo $_SESSION['msg']; ?>
                    </p>
                    <?php unset($_SESSION['msg']); ?>
                    <?php session_destroy(); ?>
                <?php endif; ?>
                <?php
                if (isset($_SESSION['success']) && !empty($_SESSION['success'])) : ?>
                    <p class="error_exist text-success text-center" style="display: block !important; background-color: #d1e7dd !important;">
                        <?php echo $_SESSION['success']; ?>
                    </p>
                    <?php unset($_SESSION['success']); ?>
                <?php endif; ?>

                <form class="px-3 py-4" autocomplete="off" method="POST" id="login_student_id">
                    <div class="mb-3">
                        <label for="idNumber" id="id_number_label" class="form-label fw-bold error-input">ID NUMBER:</label>
                        <input type="text" class="form-control error-input" id="idNumber" name="idNumber" aria-describedby="idNumber" style="background-color: rgba(135, 139, 243, .5);" value="<?php echo $id_number ?>">
                        <p class="error id_error text-danger">
                            <?php echo $id_error ?>
                        </p>
                    </div>
                    <div class="mb-3">
                        <label for="passwordStudent" id="password_label" class="form-label fw-bold error-input">PASSWORD:</label>
                        <div class="input-group">
                            <input type="password" class="form-control error-input" id="passwordStudent" name="passwordStudent" style="background-color: rgba(135, 139, 243, .5);" value="<?php echo $user_password ?>">
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
                    <!--recaptcha div-->
                    <div class="d-flex justify-content-center align-items-center mb-3">
                        <div class="g-recaptcha" data-sitekey="6Ld1ey4pAAAAALZLPhnn52XN6GDpESZqlPAYafHP"></div>
                    </div>
                    <!--end of recaptcha div-->

                    <div class="justify-content-center align-items-center d-flex">
                        <button type="submit" class="btn fw-semibold fs-6 text-white" style="background-color: #D250FF; width: 100px;" id="login_student_btn" name="login_student_btn">Login</button>
                    </div>
                </form>
                <div class="px-3">
                    <p class="text-dark fw-semibold"><a href="forgot_password_student.php" class="text-decoration-none" style="color:  #D250FF;">Forgot Password?</a></p>
                    <p class="text-dark fw-semibold"><a href="signup_student.php" class="text-decoration-none" style="color:  #D250FF;">Don't have an Account?</a></p>
                </div>
            </div>
        </div>
    </div>

    <!--show password script-->
    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            var passwordInput = document.getElementById('passwordStudent');
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
    <script>
        $(document).on('click', '#login_student_btn', function() {
            var response = grecaptcha.getResponse();
            if (response.length == 0) {
                alert('Please check the reCAPTCHA before submitting the form.');
                return false;
            }
        })
    </script>

</body>

</html>