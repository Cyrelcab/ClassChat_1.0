<?php
include('backend.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Student</title>
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
    if($user_error != null){
        ?><style>
        .user_error{
            display: block;
        }
        #idNumber.error-input{
            border-color: #dc3545;
        }
        label#id_number_label.error-input{
            color: #dc3545;
        }
        #passwordStudent.error-input{
            border-color: #dc3545;
        }
        label#password_label.error-input{
            color: #dc3545;
        }
        </style><?php
    }
    if($id_error != null){
        ?><style>
            .id_error{
                display: block;
            }
            #idNumber.error-input{
                border-color: #dc3545;
            }
            label#id_number_label.error-input{
                color: #dc3545;
            }
            </style><?php
    }
    if($password_error != null){
        ?><style>
            .password_error{
                display: block;
            }
            #passwordStudent.error-input{
                border-color: #dc3545;
            }
            label#password_label.error-input{
                color: #dc3545;
            }
        </style><?php
    }?>
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

                <form class="px-3 py-4" autocomplete="off" method="POST">
                    <div class="mb-3">
                        <label for="idNumber" id="id_number_label" class="form-label fw-bold error-input">ID NUMBER:</label>
                        <input type="text" class="form-control error-input" id="idNumber" name="idNumber" aria-describedby="idNumber" style="background-color: rgba(135, 139, 243, .5);" value="<?php echo $id_number ?>">
                        <p class="error id_error text-danger">
                            <?php echo $id_error ?>
                        </p>
                    </div>
                    <div class="mb-3">
                        <label for="passwordStudent" id="password_label" class="form-label fw-bold error-input">PASSWORD:</label>
                        <input type="password" class="form-control error-input" id="passwordStudent" name="passwordStudent" style="background-color: rgba(135, 139, 243, .5);" value="<?php echo $user_password ?>">
                        <p class="error password_error text-danger">
                            <?php echo $password_error ?>
                        </p>
                    </div>
                    <div class="justify-content-center align-items-center d-flex">
                        <button type="submit" class="btn fw-semibold fs-6" style="background-color: #D250FF; width: 100px;" name="login_student_btn">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>