<?php 
   session_start();

   // Flag to control Bootstrap success alert after redirect
   $loginSuccess = false;
   if (isset($_SESSION['login_success']) && $_SESSION['login_success'] === true) {
       $loginSuccess = true;
       unset($_SESSION['login_success']);
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Techsera</title>
    <link rel="icon" href="images/favcon.png" type="image/x-icon">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Existing custom styles -->
    <link rel="stylesheet" href="login.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid px-4">
        <a class="navbar-brand" href="index.php">Techsera</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.html">About</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Auth Wrapper -->
<div class="auth-wrapper d-flex align-items-center justify-content-center py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="card-title mb-4 text-center">Login</h2>

                        <!-- Alert placeholder -->
                        <div id="loginAlertPlaceholder">
                            <?php 
                              include("config.php");

                              if(isset($_POST['submit'])){
                                $email = mysqli_real_escape_string($con,$_POST['email']);
                                $password = mysqli_real_escape_string($con,$_POST['password']);

                                $result = mysqli_query($con,"SELECT * FROM users WHERE Email='$email' AND Password='$password' ") or die("Select Error");
                                $row = mysqli_fetch_assoc($result);

                                if(is_array($row) && !empty($row)){
                                    $_SESSION['valid'] = $row['Email'];
                                    $_SESSION['username'] = $row['Username'];
                                    $_SESSION['age'] = $row['Age'];
                                    $_SESSION['id'] = $row['Id'];

                                    // Set flag and redirect back to show success alert, then JS will redirect to index.php
                                    $_SESSION['login_success'] = true;
                                    header("Location: login.php");
                                    exit;
                                }else{
                                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                            Wrong Email or Password.
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                          </div>";
                                }
                              }

                              // Show success alert if redirected after successful login
                              if ($loginSuccess) {
                                  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                            Login Successful!
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>";
                              }
                            ?>
                        </div>

                        <!-- Login form -->
                        <form id="loginForm" action="" method="post" class="mt-3">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="name@example.com" autocomplete="off" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" autocomplete="off" required>
                            </div>

                            <div class="d-grid mb-2">
                                <button type="submit" class="btn btn-primary" name="submit">
                                    Login
                                </button>
                            </div>

                            <div class="text-center">
                                <span class="text-muted">Don't have an account?</span>
                                <a href="register.php">Sign Up Now</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap 5 JS (with Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom JS for auto-hiding alerts and redirect after successful login -->
<script>
    // Auto-hide alerts after 3 seconds
    setTimeout(function () {
        document.querySelectorAll('.alert').forEach(function (alertEl) {
            var alert = new bootstrap.Alert(alertEl);
            alert.close();
        });
    }, 3000);

    // If success alert is present, redirect to home after a short delay
    window.addEventListener('DOMContentLoaded', function () {
        const successAlert = document.querySelector('#loginAlertPlaceholder .alert-success');
        if (successAlert) {
            setTimeout(function () {
                window.location.href = 'index.php';
            }, 1000);
        }
    });
</script>

</body>
</html>