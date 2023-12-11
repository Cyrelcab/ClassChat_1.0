<?php include('backend.php');
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
</head>

<body>

    <!--form-->
    <div class="d-flex justify-content-center align-items-center my-5">
        <div class="card card-custom my-5" style="width: 40%; border: 4px solid #A401DD;">
            <div class="card-body">
                <a href="index.php" type="button" class="btn-close float-end" aria-label="Close"></a>
                <h2 class="text-center pt-3">Login - Student</h2>

                <form class="px-3 py-4" autocomplete="off" method="POST">
                    <div class="mb-3">
                        <label for="idNumber" class="form-label fw-bold">ID NUMBER:</label>
                        <input type="text" class="form-control" id="idNumber" name="idNumber" aria-describedby="idNumber" style="background-color: rgba(135, 139, 243, .5);">
                    </div>
                    <div class="mb-3">
                        <label for="passwordStudent" class="form-label fw-bold">PASSWORD:</label>
                        <input type="password" class="form-control" id="passwordStudent" name="password" style="background-color: rgba(135, 139, 243, .5);">
                    </div>
                    <div class="justify-content-center align-items-center d-flex">
                        <button type="submit" class="btn fw-semibold fs-6" style="background-color: #D250FF; width: 100px;" name="login_student">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>