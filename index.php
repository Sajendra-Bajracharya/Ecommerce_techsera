<?php
session_start();
include("config.php");
// Allow browsing without login - login only required for protected pages
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Doormart | Ecommerce Website Design</title>
    <link rel="icon" href="images/favcon.png" type="image/x-icon">

    <!-- Bootstrap 5 CSS for cart UI, alerts, and modal -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    
    <!-- linl for nav -->
      <!-- Font Awesome Icons -->
      <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700&display=swap"
      rel="stylesheet"
    />
    <!-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" /> -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link
      rel="stylesheet"
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    />
    <link rel="stylesheet"
  href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="cart.css" />
    <link rel="stylesheet" href="footer.css">
  </head>
  <body>
    <section >
        <div class="header">
            <div class="container">
            <nav>
              <div class="navbar">
                <div class="logo"><a href="index.php" style="text-decoration: none; color: inherit;">Techsera</a></div>
                <div class="highlight">
                  <!-- <div class="menu-icon" id="menu-icon"><i class="bx bx-menu"></i></div> -->
                  <ul id="navbar">
                  <li><a class="active" href="index.php"></a>Home</li>
                  <li><a href="shop.php">Shop</a></li>
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
              <div class="banner">
                <div class="column">
                  <h1>Techsera<br />Lorem ipsum dolor techsera</h1>
                  <p>
                    this is the change <br />
                    this is Techsera haah
                  </p>
                  <a href="shop.html" class="bannerbtn">Shope Now &#8594;</a>
                </div>
                <div class="column">
                  <img src="images/banner/banner.png" alt="" />
                </div>
              </div>
            </div>
          </div>
    </section>

    <!-- NEW SLIDER -->

    <div class="slider">
      <h2>advertisements</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
    </div>

    <div class="slideshow-container">
      <div class="mySlides fade">
        <!-- <div class="numbertext">1 / 3</div> -->
        <img src="images/advertise/ad-1.jpg" style="width: 100%" />           
        <!-- <div class="text">Caption Text</div> -->
      </div>

      <div class="mySlides fade">
        <!-- <div class="numbertext">2 / 3</div> -->
        <img src="images/advertise/ad-2.jpg" style="width: 100%" />
        <!-- <div class="text">Caption Two</div> -->
      </div>

      <div class="mySlides fade">
        <!-- <div class="numbertext">3 / 3</div> -->
        <img src="images/advertise/ad-3.jpg" style="width: 100%" />
        <!-- <div class="text">Caption Three</div> -->
      </div>
    </div>
    <br />

    <div style="text-align: center">
      <span class="dot"></span>
      <span class="dot"></span>
      <span class="dot"></span>
    </div>

    <!-- Cart alert placeholder (side popup) -->
    <div
      id="cartAlertPlaceholder"
      class="position-fixed top-0 end-0 p-3"
      style="z-index: 1060; max-width: 320px;"
    ></div>

    <!-- cart  -->
    
    <section id="Product1" class="section-p1">
      <h2>Trending Product</h2>
      <p>Summer Collection New Morden Design</p>
      <div class="pro-container">
        <div class="pro" data-product-id="p1" data-product-name="xyz t shirt" data-product-price="999">
          <img src="images/products/f1.jpg" alt="xyz t shirt" />
          <div class="des">
            <span>adidas</span>
            <h5>xyz t shirt</h5>
            <div class="star">
              <i class="fas fa-star "></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h4>&#x20b9;999</h4>
          </div>
          <button type="button" class="btn btn-sm btn-primary mt-2 cart">
            Add to Cart
          </button>
        </div>
        <div class="pro" data-product-id="p2" data-product-name="xyz t shirt" data-product-price="1799">
          <img src="images/products/f2.jpg" alt="xyz t shirt" />
          <div class="des">
            <span>adidas</span>
            <h5>xyz t shirt</h5>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h4>&#x20b9;1799</h4>
          </div>
          <button type="button" class="btn btn-sm btn-primary mt-2 cart">
            Add to Cart
          </button>
        </div>
        <div class="pro" data-product-id="p3" data-product-name="xyz t shirt" data-product-price="999">
          <img src="images/products/f3.jpg" alt="xyz t shirt" />
          <div class="des">
            <span>adidas</span>
            <h5>xyz t shirt</h5>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h4>&#x20b9;999</h4>
          </div>
          <button type="button" class="btn btn-sm btn-primary mt-2 cart">
            Add to Cart
          </button>
        </div>
        <div class="pro" data-product-id="p4" data-product-name="xyz t shirt" data-product-price="999">
          <img src="images/products/f4.jpg" alt="xyz t shirt" />
          <div class="des">
            <span>adidas</span>
            <h5>xyz t shirt</h5>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h4>&#x20b9;999</h4>
          </div>
          <button type="button" class="btn btn-sm btn-primary mt-2 cart">
            Add to Cart
          </button>
        </div>
        <div class="pro" data-product-id="p5" data-product-name="xyz t shirt" data-product-price="1999">
          <img src="images/products/f5.jpg" alt="xyz t shirt" />
          <div class="des">
            <span>adidas</span>
            <h5>xyz t shirt</h5>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h4>&#x20b9;1999</h4>
          </div>
          <button type="button" class="btn btn-sm btn-primary mt-2 cart">
            Add to Cart
          </button>
        </div>
        <div class="pro" data-product-id="p6" data-product-name="xyz t shirt" data-product-price="2999">
          <img src="images/products/f6.jpg" alt="xyz t shirt" />
          <div class="des">
            <span>adidas</span>
            <h5>xyz t shirt</h5>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h4>&#x20b9;2999</h4>
          </div>
          <button type="button" class="btn btn-sm btn-primary mt-2 cart">
            Add to Cart
          </button>
        </div>
        <div class="pro" data-product-id="p7" data-product-name="xyz t shirt" data-product-price="7899">
          <img src="images/products/f7.jpg" alt="xyz t shirt" />
          <div class="des">
            <span>adidas</span>
            <h5>xyz t shirt</h5>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h4>&#x20b9;7899</h4>
          </div>
          <button type="button" class="btn btn-sm btn-primary mt-2 cart">
            Add to Cart
          </button>
        </div>
        <div class="pro" data-product-id="p8" data-product-name="xyz t shirt" data-product-price="999">
          <img src="images/products/f8.jpg" alt="xyz t shirt" />
          <div class="des">
            <span>adidas</span>
            <h5>xyz t shirt</h5>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h4>&#x20b9;999</h4>
          </div>
          <button type="button" class="btn btn-sm btn-primary mt-2 cart">
            Add to Cart
          </button>
        </div>
      </div>
    </section>
                            <!-- footeer -->
    <!-- <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext">
        <h4>Sign Up For Newsletters</h4>
        <p>Get E-mail updates about our latest shop and <span>special offers.</span>
       </p>
    </div>
    <div class="form">
    <input type="text" placeholder="Your email address">
    <button class="normal">Sign Up</button>
    </div>
    </section> -->
   
    <footer class="section-p1">
      <div  class="col">
         <!-- <img class="logo" src="img/logo.png" alt=""> -->
         <div class="logo"><a href="index.php" style="text-decoration: none; color: inherit;">Techsera</a></div>
         <h4>Contract</h4>
         <address style="font-style: normal;">
         <p>ADDRESS: <br> Terna College,Mumbai</p><br>
         PHONE NO:<a href="tel:+91-9594725359">9594725359</a><br>
         E-mail:<a href="mailto:msb1212004@gmail.com">msb1212004@gmail.com</a>
         </address>
         <p>TIME </BR> 10:00 - 18:00, Mon - Sat</p>
         <div class="follow">
            <h4>Follow us</h4>
            <div class="icon">
               <a href="https://www.facebook.com/profile.php?id=100059935246751" target="_blank"><i class="fab  fa-facebook-f"></i></a>
               <a href="https://twitter.com/MaheshB47410026" target="_blank"><i class="fab  fa-twitter"></i></a>
               <a href="https://www.instagram.com/maheshbhosale45/?next=%2F" target="_blank"><i class="fab  fa-instagram"></i></a>
               <i class="fab  fa-pinterest"></i>
               <i class="fab  fa-youtube"></i>
               <a href="https://www.linkedin.com/in/mahesh-bhosale-ba7752257/" target="_blank"><i class="fab fa-linkedin"></i></a>

            </div>
         </div>
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

    <!-- Cart Modal -->
    <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="cartModalLabel">Shopping Cart</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div id="cartEmptyMessage" class="text-muted">Your cart is empty.</div>
            <div class="table-responsive d-none" id="cartTableWrapper">
              <table class="table align-middle">
                <thead>
                  <tr>
                    <th>Product</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-end">Price</th>
                    <th class="text-end">Subtotal</th>
                    <th class="text-end">Action</th>
                  </tr>
                </thead>
                <tbody id="cartItems"></tbody>
              </table>
            </div>
          </div>
          <div class="modal-footer flex-column flex-md-row justify-content-between align-items-stretch gap-2">
            <div class="d-flex gap-2">
              <button type="button" class="btn btn-outline-danger" id="clearCartBtn">Clear Cart</button>
              <button type="button" class="btn btn-primary" id="checkoutBtn">Checkout</button>
            </div>
            <div class="fw-semibold ms-md-auto">
              Total: <span id="cartTotal">₹0</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap 5 JS (with Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Global flags for cart/checkout -->
    <script>
      window.IS_LOGGED_IN = <?php echo isset($_SESSION['valid']) ? 'true' : 'false'; ?>;
      window.CHECKOUT_URL = 'checkout.php';
      window.LOGIN_URL = 'login.php';
    </script>

    <script src="script.js"></script>
  </body>
</html>
