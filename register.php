<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register - Techsera</title>
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
                    <a class="nav-link" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.html">About</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="auth-wrapper d-flex align-items-center justify-content-center py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-9">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="card-title mb-4 text-center">Sign Up</h2>

                        <!-- Alert placeholder -->
                        <div id="signupAlertPlaceholder">
                        <?php
                        include("config.php");

                        if(isset($_POST['submit'])){
                            $username = $_POST['username'];
                            $email = $_POST['email'];
                            $age = $_POST['age'];
                            $password = $_POST['password'];
                            $address = $_POST['address']; // New field for address
                            $contact_number = $_POST['contact_number']; // New field for contact number

                            // Validate email
                            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                          Invalid email format, please enter a valid email address.
                                          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                      </div>";
                            } elseif(!preg_match('/^[0-9]{10}$/', $contact_number)) {
                                // Validate contact number
                                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                          Invalid contact number, please enter a 10-digit number.
                                          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                      </div>";
                            } else {
                                // verifying the unique email
                                $verify_query = mysqli_query($con, "SELECT Email FROM users WHERE Email='$email'");
                                if(mysqli_num_rows($verify_query) != 0){
                                    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                              This email is already in use. Please choose another one.
                                              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                          </div>";
                                } else {
                                    // If all validations pass, proceed with registration
                                    mysqli_query($con, "INSERT INTO users(Username,Email,Age,Password,Address,ContactNumber) VALUES('$username','$email','$age','$password','$address','$contact_number')") or die("Error Occurred");

                                    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                              Registration Successful!
                                              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                          </div>";
                                }
                            }
                        }
                        ?>
                        </div>

                        <form id="signupForm" action="" method="post" class="mt-3">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="username" class="form-label">Name</label>
                                    <input type="text" name="username" id="username" class="form-control" autocomplete="off" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" autocomplete="off" required>
                                </div>

                                <div class="col-md-4">
                                    <label for="age" class="form-label">Age</label>
                                    <input type="number" name="age" id="age" class="form-control" autocomplete="off" required>
                                </div>

                                <div class="col-md-8">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" name="address" id="address" class="form-control" autocomplete="off" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="contact_number" class="form-label">Contact Number</label>
                                    <input type="text" name="contact_number" id="contact_number" class="form-control" autocomplete="off" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" autocomplete="off" required>
                                </div>
                            </div>

                            <div class="d-grid mt-4 mb-2">
                                <button type="submit" class="btn btn-success" name="submit">
                                    Create Account
                                </button>
                            </div>

                            <div class="text-center">
                                <span class="text-muted">Already a member?</span>
                                <a href="login.php">Sign In</a>
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

<!-- Custom JS for auto-hiding alerts -->
<script>
    // Auto-hide alerts after 3 seconds
    setTimeout(function () {
        document.querySelectorAll('.alert').forEach(function (alertEl) {
            var alert = new bootstrap.Alert(alertEl);
            alert.close();
        });
    }, 3000);
</script>

</body>
</html>


