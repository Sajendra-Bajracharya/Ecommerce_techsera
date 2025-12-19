<?php
session_start();
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Techsera</title>
    <link rel="icon" href="images/favcon.png" type="image/x-icon">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="index.php">Techsera</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCheckout" aria-controls="navbarCheckout" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCheckout">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="shop.php">Shop</a>
                </li>
                <?php if(isset($_SESSION['valid'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="account.php">Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Sign Up</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<main class="py-5">
    <div class="container">
        <h2 class="mb-4">Checkout</h2>

        <div class="row g-4">
            <!-- Cart Summary -->
            <div class="col-lg-7">
                <div class="card shadow-sm">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">Order Summary</h5>
                    </div>
                    <div class="card-body">
                        <div id="checkoutEmptyMessage" class="text-muted">
                            Your cart is empty. <a href="index.php">Go back to shop</a>.
                        </div>
                        <div class="table-responsive d-none" id="checkoutTableWrapper">
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
                                <tbody id="checkoutItems"></tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <button type="button" class="btn btn-outline-secondary" id="editCartBtn">Back to Cart</button>
                        <div class="text-end">
                            <div>Subtotal: <span id="checkoutSubtotal">₹0</span></div>
                            <div>Tax (10%): <span id="checkoutTax">₹0</span></div>
                            <div class="fw-bold">Total: <span id="checkoutTotal">₹0</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Shipping & Details -->
            <div class="col-lg-5">
                <div class="card shadow-sm mb-3">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">Shipping Address</h5>
                    </div>
                    <div class="card-body">
                        <form id="shippingForm">
                            <div class="mb-3">
                                <label for="shipName" class="form-label">Full Name</label>
                                <input type="text" id="shipName" class="form-control" placeholder="John Doe" required>
                            </div>
                            <div class="mb-3">
                                <label for="shipAddress" class="form-label">Address</label>
                                <input type="text" id="shipAddress" class="form-control" placeholder="Street address" required>
                            </div>
                            <div class="mb-3">
                                <label for="shipCity" class="form-label">City</label>
                                <input type="text" id="shipCity" class="form-control" placeholder="City" required>
                            </div>
                            <div class="row g-2 mb-3">
                                <div class="col-md-6">
                                    <label for="shipPostal" class="form-label">Postal Code</label>
                                    <input type="text" id="shipPostal" class="form-control" placeholder="123456" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="shipPhone" class="form-label">Phone</label>
                                    <input type="text" id="shipPhone" class="form-control" placeholder="9876543210" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="shipNotes" class="form-label">Order Notes (optional)</label>
                                <textarea id="shipNotes" class="form-control" rows="2" placeholder="Any special instructions?"></textarea>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="d-grid">
                    <button class="btn btn-success btn-lg" id="placeOrderBtn">Place Order</button>
                </div>

                <div class="mt-3 text-muted small">
                    You can edit quantities in the order summary above or go back to the cart to add/remove items.
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Toast / alert placeholder -->
<div
    id="checkoutAlertPlaceholder"
    class="position-fixed bottom-0 end-0 p-3"
    style="z-index: 1060; max-width: 320px;"
></div>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
  function formatCurrency(value) {
    return "₹" + Number(value).toLocaleString("en-IN", { minimumFractionDigits: 0 });
  }

  function showCheckoutAlert(message, type = "success") {
    const container = document.getElementById("checkoutAlertPlaceholder");
    if (!container) return;
    container.innerHTML = `
      <div class="alert alert-${type} alert-dismissible fade show" role="alert">
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    `;
    setTimeout(function () {
      const alertEl = container.querySelector(".alert");
      if (alertEl) {
        const bsAlert = new bootstrap.Alert(alertEl);
        bsAlert.close();
      }
    }, 3000);
  }

  function loadCartFromStorage() {
    try {
      const raw = localStorage.getItem("techsera_cart");
      if (!raw) return null;
      return JSON.parse(raw);
    } catch (e) {
      console.error("Failed to read cart from localStorage", e);
      return null;
    }
  }

  function saveCartToStorage(data) {
    try {
      localStorage.setItem("techsera_cart", JSON.stringify(data));
    } catch (e) {
      console.error("Failed to save cart to localStorage", e);
    }
  }

  document.addEventListener("DOMContentLoaded", function () {
    const cartData = loadCartFromStorage() || { items: [], total: 0 };
    const itemsBody = document.getElementById("checkoutItems");
    const emptyMessage = document.getElementById("checkoutEmptyMessage");
    const tableWrapper = document.getElementById("checkoutTableWrapper");
    const subtotalEl = document.getElementById("checkoutSubtotal");
    const taxEl = document.getElementById("checkoutTax");
    const totalEl = document.getElementById("checkoutTotal");
    const editCartBtn = document.getElementById("editCartBtn");
    const placeOrderBtn = document.getElementById("placeOrderBtn");

    function recalcTotals() {
      let subtotal = 0;
      cartData.items.forEach(item => {
        subtotal += item.price * item.qty;
      });
      const tax = subtotal * 0.10; // 10% tax
      const total = subtotal + tax;
      subtotalEl.textContent = formatCurrency(subtotal);
      taxEl.textContent = formatCurrency(tax);
      totalEl.textContent = formatCurrency(total);
      cartData.total = subtotal;
      saveCartToStorage(cartData);
    }

    function render() {
      itemsBody.innerHTML = "";
      if (!cartData.items.length) {
        emptyMessage.classList.remove("d-none");
        tableWrapper.classList.add("d-none");
        recalcTotals();
        return;
      }
      emptyMessage.classList.add("d-none");
      tableWrapper.classList.remove("d-none");

      cartData.items.forEach((item, index) => {
        const tr = document.createElement("tr");
        tr.innerHTML = `
          <td>${item.name}</td>
          <td class="text-center">
            <input type="number" min="1" value="${item.qty}" data-index="${index}" class="form-control form-control-sm qty-input" style="max-width: 80px; margin: 0 auto;">
          </td>
          <td class="text-end">${formatCurrency(item.price)}</td>
          <td class="text-end">${formatCurrency(item.price * item.qty)}</td>
          <td class="text-end">
            <button type="button" class="btn btn-sm btn-outline-danger btn-remove-line" data-index="${index}">Remove</button>
          </td>
        `;
        itemsBody.appendChild(tr);
      });

      recalcTotals();
    }

    // Quantity change
    itemsBody.addEventListener("input", function (e) {
      const input = e.target.closest(".qty-input");
      if (!input) return;
      const index = parseInt(input.getAttribute("data-index"), 10);
      const value = Math.max(1, parseInt(input.value || "1", 10));
      input.value = value;
      if (!isNaN(index) && cartData.items[index]) {
        cartData.items[index].qty = value;
        render();
      }
    });

    // Remove line
    itemsBody.addEventListener("click", function (e) {
      const btn = e.target.closest(".btn-remove-line");
      if (!btn) return;
      const index = parseInt(btn.getAttribute("data-index"), 10);
      if (!isNaN(index)) {
        cartData.items.splice(index, 1);
        render();
      }
    });

    if (editCartBtn) {
      editCartBtn.addEventListener("click", function () {
        window.location.href = "index.php";
      });
    }

    if (placeOrderBtn) {
      placeOrderBtn.addEventListener("click", function () {
        if (!cartData.items.length) {
          showCheckoutAlert("Your cart is empty.", "warning");
          return;
        }
        const form = document.getElementById("shippingForm");
        if (!form.checkValidity()) {
          form.reportValidity();
          return;
        }
        showCheckoutAlert("Order placed successfully! (demo only)", "success");
      });
    }

    render();
  });
</script>

</body>
</html>


