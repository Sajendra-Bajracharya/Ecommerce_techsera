let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) { slideIndex = 1; }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}

// Navbar Active Link Highlighting
(function() {
  const currentPage = window.location.pathname.split('/').pop() || 'index.php';
  const navLinks = document.querySelectorAll('#navbar li a');
  
  navLinks.forEach(link => {
    const linkPage = link.getAttribute('href').split('/').pop();
    
    // Remove active class from all links
    link.classList.remove('active');
    
    // Add active class to current page
    if (linkPage === currentPage || 
        (currentPage === '' && linkPage === 'index.php') ||
        (currentPage === 'index.php' && linkPage === 'index.php')) {
      link.classList.add('active');
    }
    
    // Add click animation
    link.addEventListener('click', function(e) {
      // Remove active from all siblings
      navLinks.forEach(l => l.classList.remove('active'));
      // Add active to clicked link
      this.classList.add('active');
    });
  });
})();

// ------------------------
// Simple Shopping Cart Logic
// (script is loaded at the end of <body>, so DOM is already ready)
// ------------------------

(function () {
  const cart = {};
  const badgeEl = document.getElementById("badge");
  const cartItemsBody = document.getElementById("cartItems");
  const cartTotalEl = document.getElementById("cartTotal");
  const cartEmptyMessage = document.getElementById("cartEmptyMessage");
  const cartTableWrapper = document.getElementById("cartTableWrapper");
  const clearCartBtn = document.getElementById("clearCartBtn");
  const checkoutBtn = document.getElementById("checkoutBtn");
  const alertPlaceholder = document.getElementById("cartAlertPlaceholder");

  function updateBadge() {
    if (!badgeEl) return;
    let count = 0;
    Object.values(cart).forEach((item) => {
      count += item.qty;
    });
    badgeEl.textContent = count;
  }

  function formatCurrency(value) {
    // Display prices in Nepali Rupees (NPR)
    return "NPR " + value.toLocaleString("en-IN", { minimumFractionDigits: 0 });
  }

  function renderCart() {
    if (!cartItemsBody || !cartTotalEl || !cartEmptyMessage || !cartTableWrapper) return;

    cartItemsBody.innerHTML = "";
    let total = 0;
    const entries = Object.values(cart);

    if (entries.length === 0) {
      cartEmptyMessage.classList.remove("d-none");
      cartTableWrapper.classList.add("d-none");
      cartTotalEl.textContent = formatCurrency(0);
    } else {
      cartEmptyMessage.classList.add("d-none");
      cartTableWrapper.classList.remove("d-none");

      entries.forEach((item) => {
        const subtotal = item.price * item.qty;
        total += subtotal;
        const tr = document.createElement("tr");
        tr.innerHTML = `
          <td>${item.name}</td>
          <td class="text-center">${item.qty}</td>
          <td class="text-end">${formatCurrency(item.price)}</td>
          <td class="text-end">${formatCurrency(subtotal)}</td>
          <td class="text-end">
            <button type="button" class="btn btn-sm btn-outline-danger btn-remove-item" data-id="${item.id}">
              Remove
            </button>
          </td>
        `;
        cartItemsBody.appendChild(tr);
      });

      cartTotalEl.textContent = formatCurrency(total);
    }

    updateBadge();
  }

  function showAddAlert() {
    if (!alertPlaceholder) return;

    alertPlaceholder.innerHTML = `
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        Product added to cart!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    `;

    setTimeout(function () {
      const alertEl = alertPlaceholder.querySelector(".alert");
      if (alertEl) {
        const bsAlert = new bootstrap.Alert(alertEl);
        bsAlert.close();
      }
    }, 3000);
  }

  // Add to cart button handlers
  document.querySelectorAll(".pro .cart").forEach(function (icon) {
    icon.addEventListener("click", function (e) {
      e.preventDefault();
      const card = e.currentTarget.closest(".pro");
      if (!card) return;

      const id = card.getAttribute("data-product-id") || "";
      const name = card.getAttribute("data-product-name") || card.querySelector(".des h5")?.textContent.trim() || "Product";
      const priceAttr = card.getAttribute("data-product-price");
      let price = 0;
      if (priceAttr) {
        price = parseFloat(priceAttr);
      } else {
        const priceText = card.querySelector(".des h4")?.textContent || "0";
        price = parseFloat(priceText.replace(/[^\d.]/g, "")) || 0;
      }

      const key = id || name + "-" + price;
      if (!cart[key]) {
        cart[key] = { id: key, name: name, price: price, qty: 0 };
      }
      cart[key].qty += 1;

      renderCart();
      showAddAlert();
    });
  });

  // Remove single item (event delegation)
  if (cartItemsBody) {
    cartItemsBody.addEventListener("click", function (e) {
      const btn = e.target.closest(".btn-remove-item");
      if (!btn) return;
      const id = btn.getAttribute("data-id");
      if (id && cart[id]) {
        delete cart[id];
        renderCart();
      }
    });
  }

  // Clear entire cart
  if (clearCartBtn) {
    clearCartBtn.addEventListener("click", function () {
      Object.keys(cart).forEach((key) => delete cart[key]);
      renderCart();
    });
  }

  // Checkout: redirect based on auth state
  if (checkoutBtn) {
    checkoutBtn.addEventListener("click", function () {
      const hasItems = Object.keys(cart).length > 0;
      if (!hasItems) {
        showAddAlert();
        return;
      }

      // Persist cart in localStorage for checkout page
      const cartData = {
        items: Object.values(cart),
        total: Object.values(cart).reduce((sum, item) => sum + item.price * item.qty, 0),
      };
      try {
        localStorage.setItem("techsera_cart", JSON.stringify(cartData));
      } catch (e) {
        console.error("Failed to persist cart to localStorage", e);
      }

      const isLoggedIn = window.IS_LOGGED_IN === true;
      const checkoutUrl = window.CHECKOUT_URL || "checkout.php";
      const loginUrl = window.LOGIN_URL || "login.php";

      if (!isLoggedIn) {
        window.location.href = loginUrl;
      } else {
        window.location.href = checkoutUrl;
      }
    });
  }

  // Initialize empty cart state
  renderCart();
})();