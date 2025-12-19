
<?php
session_start();
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link rel="icon" href="images/favcon.png" type="image/x-icon">
    
    <!-- Bootstrap 5 CSS for cart UI, alerts, and modal -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    
    <!-- Font Awesome Icons -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <link rel="stylesheet"
  href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    
    <!-- Custom CSS - style.css must come first for navbar consistency -->
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="cart.css" />
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="content.css">
    <link rel="stylesheet" href="shop.css">
    <script src="https://kit.fontawesome.com/4a3b1f73a2.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <!-- slider links -->
    <!-- <script src="http://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script> -->
    <script src="js/jQuery3.4.1.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
</head>
<body>
    <section>
        <div class="header">
            <div class="container">
            <nav>
              <div class="navbar">
                <div class="logo"><a href="index.php" style="text-decoration: none; color: inherit;">Techsera</a></div>
                <div class="highlight">
                  <ul id="navbar">
                  <li><a href="index.php">Home</a></li>
                  <li><a class="active" href="shop.php">Shop</a></li>
                  <li><a href="about.html">About</a></li>
                  <li><a href="contact.html">Contact</a></li>
                  <?php if(isset($_SESSION['valid'])): ?>
                    <li><a href="account.php">Account</a></li>
                    <li><a href="logout.php">Logout</a></li>
                  <?php else: ?>
                  <li><a href="login.php">Login</a></li>
                  <li><a href="register.php">Sign Up</a></li>
                  <?php endif; ?>
                  <li id="shopcart" >
                    <div id="user">
                      <a href="#" data-bs-toggle="modal" data-bs-target="#cartModal">
                        <i class="fa-solid fa-bag-shopping ">
                          <div id="badge">0</div>
                        </i>
                      </a>
                    </div>
                  </li>   
                                
                </ul>
                </div>
              </div>
            </nav>
          </div>


    </section>
    

    <!-- SLIDER -->
    <div id="2"></div>
    <script>
        load("slider.html");
        function load(url)
        {
            req = new XMLHttpRequest();
            req.open("GET", url, false);
            req.send(null);
            document.getElementById(2).innerHTML = req.responseText;
        }
    </script>

    <!-- CONTENT SECTION -->
    <div id="3"></div>
    <script>
        load("content.html");
        function load(url)
        {
            req = new XMLHttpRequest();
            req.open("GET", url, false);
            req.send(null);
            document.getElementById(3).innerHTML = req.responseText;
        }
    </script>
 <footer class="section-p1">
  <div class="col">
    <div class="logo"><a href="index.php" style="text-decoration: none; color: inherit;">Techsera</a></div>
    <h4>Contact</h4>
    <address style="font-style: normal;">
      <p>ADDRESS: <br> Techsera, Kathmandu</p><br>
    </address>
    <p>TIME <br> 10:00 - 18:00, Mon - Sat</p>
  </div>

  <div class="col">
    <h4>About</h4>
    <a href="about.html">About us</a>
    <a href="#">Delivery Information</a>
    <a href="#">Privacy Policy</a>
    <a href="#">Terms & Conditions</a>
    <a href="contact.html">Contact Us</a>
  </div>

  <div class="col">
    <h4>My Account</h4>
    <a href="login.php">Sign In</a>
    <a href="cart.html">View Cart</a>
    <a href="#">My Wishlist</a>
    <a href="#">Track My Order</a>
    <a href="contact.html">Help</a>
  </div>
</footer>
   
   
      
</body>

<!-- slider JS START -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script>
    $(document).ready(function()
    {
    $('#containerSlider').slick({
        dots: true,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        });
    });
</script>
<!-- slider JS ENDS -->

<!-- content JS -->

<script src="content.js"></script>
<script src="product.js"></script>
</body>
</html>
