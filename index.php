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
    <title>Techsera | Ecommerce Website Design</title>
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
                  <li><a class="active" href="index.php">Home</a></li>
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
                  <h1>Smart Tech, Seamless Living.</h1>
                  <p>
                    Discover cutting-edge technology products built to simplify, enhance, and transform your everyday experience.
                  </p>
                  <a href="shop.php" class="bannerbtn">Shop Now &#8594;</a>
                </div>
                <div class="column">
                  <img src="img/Mobilehero.png" alt="Techsera - Smart Tech Products" />
                </div>
              </div>
            </div>
          </div>
    </section>

    <!-- NEW SLIDER -->

    <div class="slider">
      <h2>Advertisements</h2>
      <p>See the latest deals and offers in our store.</p>
    </div>

    <div class="slideshow-container">
      <div class="mySlides fade">
        <img src="img/b1.png" alt="Advertisement Banner 1" />
      </div>

      <div class="mySlides fade">
        <img src="img/b2.png" alt="Advertisement Banner 2" />
      </div>

      <div class="mySlides fade">
        <img src="img/banner3.jpg" alt="Advertisement Banner 3" />
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
      <h2>Trending Tech Products</h2>
      <p>Latest gadgets and accessories for your digital lifestyle</p>
      <div class="pro-container">
        <div class="pro" data-product-id="p1" data-product-name="Wireless Earbuds" data-product-price="3999">
          <img src="img/earbud1.jpeg" alt="Wireless Earbuds" />
          <div class="des">
            <span>SoundPro</span>
            <h5>Wireless Earbuds</h5>
            <div class="star">
              <i class="fas fa-star "></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h4>NPR 3,999</h4>
          </div>
          <button type="button" class="btn btn-sm btn-primary mt-2 cart">
            Add to Cart
          </button>
        </div>
        <div class="pro" data-product-id="p2" data-product-name="Gaming Laptop" data-product-price="89999">
          <img src="img/laptop1.jpeg" alt="Gaming Laptop" />
          <div class="des">
            <span>UltraGear</span>
            <h5>Gaming Laptop</h5>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h4>NPR 89,999</h4>
          </div>
          <button type="button" class="btn btn-sm btn-primary mt-2 cart">
            Add to Cart
          </button>
        </div>
        <div class="pro" data-product-id="p3" data-product-name="Smart Watch" data-product-price="7999">
          <img src="img/smartwatch1.jpeg" alt="Smart Watch" />
          <div class="des">
            <span>TimeTech</span>
            <h5>Smart Watch</h5>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h4>NPR 7,999</h4>
          </div>
          <button type="button" class="btn btn-sm btn-primary mt-2 cart">
            Add to Cart
          </button>
        </div>
        <div class="pro" data-product-id="p4" data-product-name="Noise Cancelling Headphones" data-product-price="12999">
          <img src="img/headphone1.jpeg" alt="Noise Cancelling Headphones" />
          <div class="des">
            <span>QuietWave</span>
            <h5>Noise Cancelling Headphones</h5>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h4>NPR 12,999</h4>
          </div>
          <button type="button" class="btn btn-sm btn-primary mt-2 cart">
            Add to Cart
          </button>
        </div>
        <div class="pro" data-product-id="p5" data-product-name="Smartphone" data-product-price="25999">
          <img src="img/mobile1.jpeg" alt="Smartphone" />
          <div class="des">
            <span>NeoMobile</span>
            <h5>Smartphone</h5>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h4>NPR 25,999</h4>
          </div>
          <button type="button" class="btn btn-sm btn-primary mt-2 cart">
            Add to Cart
          </button>
        </div>
        <div class="pro" data-product-id="p6" data-product-name="4K Action Camera" data-product-price="24999">
          <img src="img/camera1.jpeg" alt="4K Action Camera" />
          <div class="des">
            <span>AdventureCam</span>
            <h5>4K Action Camera</h5>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h4>NPR 24,999</h4>
          </div>
          <button type="button" class="btn btn-sm btn-primary mt-2 cart">
            Add to Cart
          </button>
        </div>
        <div class="pro" data-product-id="p7" data-product-name="Mechanical Keyboard" data-product-price="5999">
          <img src="img/mk1.jpeg" alt="Mechanical Keyboard" />
          <div class="des">
            <span>KeyCraft</span>
            <h5>Mechanical Keyboard</h5>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h4>NPR 5,999</h4>
          </div>
          <button type="button" class="btn btn-sm btn-primary mt-2 cart">
            Add to Cart
          </button>
        </div>
        <div class="pro" data-product-id="p8" data-product-name="Bluetooth Speaker" data-product-price="4999">
          <img src="img/bt1.jpeg" alt="Bluetooth Speaker" />
          <div class="des">
            <span>BeatBox</span>
            <h5>Bluetooth Speaker</h5>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h4>NPR 4,999</h4>
          </div>
          <button type="button" class="btn btn-sm btn-primary mt-2 cart">
            Add to Cart
          </button>
        </div>
      </div>
    </section>

    <!-- New Products Section -->
    <section id="newProducts" class="section-p1">
      <h2>New Products</h2>
      <p>Fresh arrivals in your favorite gadgets</p>
      <div class="pro-container">
        <div class="pro" data-product-id="n1" data-product-name="Wireless Earbuds" data-product-price="3799">
          <img src="img/earbud2.jpeg" alt="Wireless Earbuds" />
          <div class="des">
            <span>SoundPro</span>
            <h5>Wireless Earbuds</h5>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h4>NPR 3,799</h4>
          </div>
          <button type="button" class="btn btn-sm btn-primary mt-2 cart">
            Add to Cart
          </button>
        </div>
        <div class="pro" data-product-id="n2" data-product-name="Gaming Laptop" data-product-price="92999">
          <img src="img/laptop2.jpeg" alt="Gaming Laptop" />
          <div class="des">
            <span>UltraGear</span>
            <h5>Gaming Laptop</h5>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h4>NPR 92,999</h4>
          </div>
          <button type="button" class="btn btn-sm btn-primary mt-2 cart">
            Add to Cart
          </button>
        </div>
        <div class="pro" data-product-id="n3" data-product-name="Smartphone" data-product-price="27999">
          <img src="img/mobile2.jpeg" alt="Smartphone" />
          <div class="des">
            <span>NeoMobile</span>
            <h5>Smartphone</h5>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h4>NPR 27,999</h4>
          </div>
          <button type="button" class="btn btn-sm btn-primary mt-2 cart">
            Add to Cart
          </button>
        </div>
        <div class="pro" data-product-id="n4" data-product-name="Smart Watch" data-product-price="8299">
          <img src="img/smartwatch1.jpeg" alt="Smart Watch" />
          <div class="des">
            <span>TimeTech</span>
            <h5>Smart Watch</h5>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h4>NPR 8,299</h4>
          </div>
          <button type="button" class="btn btn-sm btn-primary mt-2 cart">
            Add to Cart
          </button>
        </div>
      </div>
    </section>

    <!-- Discount Products Section -->
<section id="discountProducts" class="section-p1">
  <h2>Discount Products</h2>
  <p>Grab these gadget deals before they are gone</p>
  <div class="pro-container">
    <div class="pro" data-product-id="d1" data-product-name="Noise Cancelling Headphones" data-product-price="10999" data-product-discount="20">
      <img src="img/headphone2.jpeg" alt="Noise Cancelling Headphones" />
      <div class="des">
        <span>QuietWave</span>
        <h5>Noise Cancelling Headphones</h5>
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
          <i class="far fa-star"></i>
        </div>
        <h4>
          <span class="old-price">NPR 13,749</span>
          <span class="discount-price">NPR 10,999</span>
          <span class="discount-percent">20% Off</span>
        </h4>
      </div>
      <button type="button" class="btn btn-sm btn-primary mt-2 cart">
        Add to Cart
      </button>
    </div>

    <div class="pro" data-product-id="d2" data-product-name="Mechanical Keyboard" data-product-price="5499" data-product-discount="15">
      <img src="img/mk1.jpeg" alt="Mechanical Keyboard" />
      <div class="des">
        <span>KeyCraft</span>
        <h5>Mechanical Keyboard</h5>
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="far fa-star"></i>
        </div>
        <h4>
          <span class="old-price">NPR 6,470</span>
          <span class="discount-price">NPR 5,499</span>
          <span class="discount-percent">15% Off</span>
        </h4>
      </div>
      <button type="button" class="btn btn-sm btn-primary mt-2 cart">
        Add to Cart
      </button>
    </div>

    <div class="pro" data-product-id="d3" data-product-name="Bluetooth Speaker" data-product-price="4299" data-product-discount="10">
      <img src="img/bt1.jpeg" alt="Bluetooth Speaker" />
      <div class="des">
        <span>BeatBox</span>
        <h5>Bluetooth Speaker</h5>
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
          <i class="far fa-star"></i>
        </div>
        <h4>
          <span class="old-price">NPR 4,777</span>
          <span class="discount-price">NPR 4,299</span>
          <span class="discount-percent">10% Off</span>
        </h4>
      </div>
      <button type="button" class="btn btn-sm btn-primary mt-2 cart">
        Add to Cart
      </button>
    </div>

    <div class="pro" data-product-id="d4" data-product-name="4K Action Camera" data-product-price="21999" data-product-discount="10">
      <img src="img/camera1.jpeg" alt="4K Action Camera" />
      <div class="des">
        <span>AdventureCam</span>
        <h5>4K Action Camera</h5>
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="far fa-star"></i>
          <i class="far fa-star"></i>
        </div>
        <h4>
          <span class="old-price">NPR 24,443</span>
          <span class="discount-price">NPR 21,999</span>
          <span class="discount-percent">10% Off</span>
        </h4>
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
              Total: <span id="cartTotal">NPR 0</span>
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
