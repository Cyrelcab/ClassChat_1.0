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

                <h2 class="text-center pt-3">Student - Employee</h2>

                <form class="px-3 py-4" method="POST" autocomplete="off">
                    <div class="mb-3">
                        <label for="nameEmployeeSignup" class="form-label fw-bold">Name:</label>
                        <input type="text" class="form-control" id="nameEmployeeSignup" name='nameEmployeeSignup' placeholder="Ex: Juan Dela Cruz" style="background-color: rgba(135, 139, 243, .5);">
                    </div>
                    <div class="mb-3">
                        <label for="emailEmployeeSignup" class="form-label fw-bold">Email:</label>
                        <input type="email" class="form-control" id="emailEmployeeSignup" name='emailEmployeeSignup' aria-describedby="emailStudent" placeholder="Use carsu email @carsu.edu.ph" style="background-color: rgba(135, 139, 243, .5);">
                    </div>
                    <div class="mb-3">
                        <label for="employeeNumberSignup" class="form-label fw-bold">Employee Number:</label>
                        <input type="text" class="form-control" id="employeeNumberSignup" name='employeeNumberSignup' placeholder="Ex: 211-12345" style="background-color: rgba(135, 139, 243, .5);">
                    </div>
                    <div class="mb-3">
                        <label for="passwordEmployeeSignup" class="form-label fw-bold">Password:</label>
                        <input type="password" class="form-control" id="passwordEmployeeSignup" name='passwordEmployeeSignup' placeholder='must contain "!@$%&" and 12 characters long' style="background-color: rgba(135, 139, 243, .5);">
                    </div>
                    <div class="mb-3">
                        <label for="confirmPasswordEmployeeSignup" class="form-label fw-bold">Confirm Password:</label>
                        <input type="password" class="form-control" id="confirmPasswordEmployeeSignup" name='confirmPasswordEmployeeSignup' placeholder='must contain "!@$%&" and 12 characters long' style="background-color: rgba(135, 139, 243, .5);">
                    </div>
                    <div class="justify-content-center align-items-center d-flex">
                        <button type="submit" class="btn fw-semibold fs-6 text-white" name='signupEmployee_btn' style="background-color: #3A48B6; width: 100px;">Signup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>