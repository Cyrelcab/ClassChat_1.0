<?php
session_start();

if (isset($_SESSION['idNumberStudent'])) {
  header('location: dashboard_student.php');
  exit();
}

if (isset($_SESSION['idNumberEmployee'])) {
  header('location: dashboard_employee.php');
  exit();
}

// Set CSP header
header("Content-Security-Policy: default-src 'self'");
header("Content-Security-Policy: style-src 'self' https://maxcdn.bootstrapcdn.com");
header("Content-Security-Policy: script-src 'self' https://ajax.googleapis.com 'unsafe-inline'");
header("Content-Security-Policy: img-src * data:");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ClassChat</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="shortcut icon" href="image/logo.png">
  <style>
    body{
      background: linear-gradient(to left, rgb(5,98,155), rgb(99,27,163));
    }
  </style>

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
  <!--this is the navbar-->
  <nav class="navbar navbar-expand-md background-color fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="image/logo.png" alt="ClassChat" width="95" height="50" />
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link text-white scrollto" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white scrollto" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white scrollto" href="#services">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white">
              <button type="button" class="btn btn-width rounded-pill border border-white text-white" data-bs-toggle="modal" data-bs-target="#loginModal">
                Login
              </button>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white">
              <button type="button" class="btn btn-width rounded-pill border border-white text-white" data-bs-toggle="modal" data-bs-target="#signupModal">
                Signup
              </button>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!--end of navbar-->

  <!--this is the modal for login-->
  <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="border: 4px solid #A401DD; background-color: #E0CEF3;">
        <div class="row justify-content-center align-items-center pt-5 ms-3">
          <div class="col-8">
            <h2>Welcome!</h2>
            <h2>pili kung kinsa ka</h2>
          </div>
          <div class="col">
            <img src="image/classchat_logo.png" alt="" class="w-75">
          </div>
        </div>

        <div class="row mt-5">
          <div class="d-grid gap-2 col-6 mx-auto py-5">
            <a href="login_student.php" type="button" class="btn rounded-pill custom-button1" style="
                  background-color: #d250ff;
                  color: #ffffff;
                  height: 50px;
                  display: flex;
                  align-items: center;
                  justify-content: center;
                ">
              STUDENT
            </a>
            <a href="login_employee.php" type="button" class="btn mt-3 rounded-pill" style="
                  background-color: #081fa4;
                  color: #ffffff;
                  height: 50px;
                  display: flex;
                  align-items: center;
                  justify-content: center;
                ">
              EMPLOYEE
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--end of modal for login-->

  <!--this is the modal for signup-->
  <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="border: 4px solid #A401DD; background-color: #E0CEF3;">
        <div class="row justify-content-center align-items-center pt-5 ms-3">
          <div class="col-8">
            <h2>Welcome!</h2>
            <h2>pili kung kinsa ka</h2>
          </div>
          <div class="col">
            <img src="image/classchat_logo.png" alt="" class="w-75">
          </div>
        </div>

        <div class="row mt-5">
          <div class="d-grid gap-2 col-6 mx-auto py-5">
            <a href="signup_student.php" type="button" class="btn rounded-pill" style="
                  background-color: #d250ff;
                  color: #ffffff;
                  height: 50px;
                  display: flex;
                  align-items: center;
                  justify-content: center;
                ">
              STUDENT
            </a>
            <a href="signup_employee.php" type="button" class="btn mt-3 rounded-pill" style="
                  background-color: #081fa4;
                  color: #ffffff;
                  height: 50px;
                  display: flex;
                  align-items: center;
                  justify-content: center;
                ">
              EMPLOYEE
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--end of modal for signup-->

  <!--this is the home section-->
  <section id="home" class="container py-5">
    <div class="row d-flex text-white align-items-center justify-content-center pt-5 ms-3">
      <div class="col py-5">
        <h1>Learning, Sharing, and Growing Together with ClassChat</h1>
        <hr class="w-50" />
        <hr />
        <p class="fs-4">
          A secure web application to communicate and share in a class.
        </p>
        <a href="#about">
          <button type="button" class="btn rounded-pill btn-primary mt-3">
            Let's Get Started
          </button>
        </a>
      </div>
      <div class="col-6 py-5">
        <img src="image/home-pic.png" alt="" class="custom-image-size ms-5 floating-img" />
      </div>
    </div>
  </section>
  <!--end of home section-->

  <!--this is the about section-->
  <section id="about" class="container pt-4">
    <div class="row pt-5 text-white align-items-center ms-3">
      <div class="col pt-5" data-aos="fade-right">
        <img src="image/logo.png" alt="" class="w-100" />
        <h2 class="text-center">
          Learning, Sharing, and Growing Together with ClassChat
        </h2>
      </div>
      <div class="col pt-5" data-aos="fade-left">
        <div class="custom-border-about ms-5 px-4">
          <h2 class="text-end pt-3">ABOUT US</h2>
          <div class="custom-position">
            <hr class="w-50" />
          </div>
          <div>
            <hr class="w-100" />
          </div>
          <p class="fs-5">
          ClassChat is an innovative educational platform that facilitates seamless communication and collaboration among students and teachers within an academic setting. ClassChat stands out for its ability to swiftly connect users to the right group chats per subject with unparalleled speed.
          </p>
        </div>
      </div>
    </div>
  </section>
  <!--end of about section-->

  <!--this is the service section-->
  <section id="services" class="container pt-5" style="height: 100vh;">
    <div class="row pt-5 text-white align-items-center ms-3">
      <div class="col pt-5" data-aos="fade-right">
        <div class="custom-border-about px-4">
          <h2 class="text-start pt-3">SERVICES</h2>
          <div class="d-flex justify-content-start">
            <hr class="w-50" />
          </div>
          <div>
            <hr class="w-100" />
          </div>
          <p class="fs-5">
          ClassChat offers a range of features aimed at fostering effective communication. It provides a centralized space where teachers can share resources, assignments, announcements, and important updates with their students. Students, in turn, can ask questions, engage in discussions, submit assignments, and collaborate on group projects within the platform.
          </p>
        </div>
      </div>
      <div class="col pt-5" data-aos="fade-left">
        <img src="image/home-pic.png" alt="" class="custom-image-size ms-5 " />
      </div>
    </div>
  </section>
  <!--end of service section-->

  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

  <!--this script is for automatically close the toggler if we click one of the nav-items-->
  <script>
    document.querySelectorAll(".nav-link").forEach(function(navItem) {
      navItem.addEventListener("click", function() {
        var navbarToggler = document.querySelector(".navbar-toggler");
        var navbarCollapse = document.querySelector(".navbar-collapse.show");
        if (navbarToggler && navbarCollapse) {
          navbarToggler.click(); // Programmatically close the navbar
        }
      });
    });
  </script>
  <!--end of script for automatically close toggler-->
  <!-- <script src="background.js"></script> -->

  <!--preloader-->
  <script>
    window.addEventListener('load', function() {
      var preloader = document.getElementById('preloader');
      preloader.style.display = 'none';

      // Remove the overflow: hidden style from the body
      document.body.classList.remove('preloader-hidden');
    });
  </script>
</body>

</html>