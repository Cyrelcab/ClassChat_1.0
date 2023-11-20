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
</head>

<body>

    <!--form-->
    <div class="d-flex justify-content-center align-items-center my-5">
        <div class="card card-custom" style="width: 40%; border: 4px solid #A401DD;">
            <div class="card-body">
                <a href="index.php" type="button" class="btn-close float-end" aria-label="Close"></a>

                <h2 class="text-center pt-3">Student - Signup</h2>

                <form class="px-3 py-4" method="POST" autocomplete="off" id="studentSignupForm">
                    <div class="mb-3">
                        <label for="nameStudentSignup" class="form-label fw-bold">Name</label>
                        <input type="text" class="form-control" id="nameStudentSignup" name="nameStudentSignup" placeholder="Ex: Juan Dela Cruz" style="background-color: rgba(135, 139, 243, .5);" required>
                    </div>
                    <div class="mb-3">
                        <label for="emailStudentSignup" class="form-label fw-bold">Email</label>
                        <!--error messages-->
                        <small class="text-danger error_msg" id="emailErrorDisplay"></small>
                        <!--end of error messages-->
                        <input type="email" class="form-control" id="emailStudentSignup" name="emailStudentSignup" aria-describedby="emailStudent" placeholder="Use carsu email @carsu.edu.ph" style="background-color: rgba(135, 139, 243, .5);" required>
                    </div>
                    <div class="mb-3">
                        <label for="idNumberStudentSignup" class="form-label fw-bold">ID Number</label>
                        <input type="text" class="form-control" id="idNumberStudentSignup" name="idNumberStudentSignup" placeholder="Ex: 211-12345" style="background-color: rgba(135, 139, 243, .5);" required>
                    </div>
                    <div class="mb-3">
                        <label for="passwordStudentSignup" class="form-label fw-bold">Password</label>
                        <!--error messages-->
                        <small class="text-danger error_msg" id="passwordErrorDisplay"></small>
                        <!--end of error messages-->
                        <input type="password" class="form-control" id="passwordStudentSignup" name="passwordStudentSignup" placeholder='must contain "!@$%&" and 10 characters long' style="background-color: rgba(135, 139, 243, .5);" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirmPasswordStudentSignup" class="form-label fw-bold">Confirm Password</label>
                        <!--error messages-->
                        <small class="text-danger error_msg" id="confirmPasswordErrorDisplay"></small>
                        <!--end of error messages-->
                        <input type="password" class="form-control" id="confirmPasswordStudentSignup" name="confirmPasswordStudentSignup" placeholder='must contain "!@$%&" and 10 characters long' style="background-color: rgba(135, 139, 243, .5);" required>
                    </div>
                    <div class="justify-content-center align-items-center d-flex">
                        <button type="submit" class="btn fw-semibold fs-6" name="signupStudent_btn" style="background-color: #D250FF; width: 100px;">Signup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>