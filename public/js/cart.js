// Cart functionality
const CART_STORAGE_KEY = "bowling_cart";

// Initialize cart if it doesn't exist
function initCart() {
    if (!localStorage.getItem(CART_STORAGE_KEY)) {
        localStorage.setItem(CART_STORAGE_KEY, JSON.stringify([]));
    }
    updateCartCount();
}

// Get all items in the cart
function getCartItems() {
    return JSON.parse(localStorage.getItem(CART_STORAGE_KEY) || "[]");
}

// Add an item to the cart
function addToCart(productId, name, price, quantity = 1) {
    const cartItems = getCartItems();

    // Check if product already exists in cart
    const existingItemIndex = cartItems.findIndex(
        (item) => item.product_id === productId
    );

    if (existingItemIndex !== -1) {
        // Update quantity if product already exists
        cartItems[existingItemIndex].quantity += quantity;
    } else {
        // Add new item to cart
        cartItems.push({
            product_id: productId,
            name: name,
            price: price,
            quantity: quantity,
        });
    }

    // Save updated cart
    localStorage.setItem(CART_STORAGE_KEY, JSON.stringify(cartItems));
    updateCartCount();

    // Show success message
    showNotification("Product added to cart!");
}

// Remove an item from the cart
function removeFromCart(productId) {
    let cartItems = getCartItems();
    cartItems = cartItems.filter((item) => item.product_id !== productId);
    localStorage.setItem(CART_STORAGE_KEY, JSON.stringify(cartItems));
    updateCartCount();

    // If we're on the cart page, refresh the display
    if (document.getElementById("cart-items-container")) {
        displayCartItems();
    }
}

// Update quantity of an item in the cart
function updateCartItemQuantity(productId, quantity) {
    if (quantity <= 0) {
        removeFromCart(productId);
        return;
    }

    const cartItems = getCartItems();
    const itemIndex = cartItems.findIndex(
        (item) => item.product_id === productId
    );

    if (itemIndex !== -1) {
        cartItems[itemIndex].quantity = quantity;
        localStorage.setItem(CART_STORAGE_KEY, JSON.stringify(cartItems));
        updateCartCount();

        // If we're on the cart page, refresh the display
        if (document.getElementById("cart-items-container")) {
            displayCartItems();
        }
    }
}

// Clear the cart
function clearCart() {
    localStorage.setItem(CART_STORAGE_KEY, JSON.stringify([]));
    updateCartCount();

    // If we're on the cart page, refresh the display
    if (document.getElementById("cart-items-container")) {
        displayCartItems();
    }
}

// Update the cart count in the UI
function updateCartCount() {
    const cartItems = getCartItems();
    const totalItems = cartItems.reduce(
        (total, item) => total + item.quantity,
        0
    );

    const cartCountElement = document.getElementById("cart-count");
    if (cartCountElement) {
        cartCountElement.textContent = totalItems;
        cartCountElement.style.display = totalItems > 0 ? "flex" : "none";
    }
}

// Display cart items on the cart page
function displayCartItems() {
    const cartItemsContainer = document.getElementById("cart-items-container");
    const cartTotalElement = document.getElementById("cart-total");
    const emptyCartMessage = document.getElementById("empty-cart-message");

    if (!cartItemsContainer) return;

    const cartItems = getCartItems();

    if (cartItems.length === 0) {
        cartItemsContainer.innerHTML = "";
        if (emptyCartMessage) emptyCartMessage.style.display = "block";
        if (cartTotalElement) cartTotalElement.style.display = "none";
        return;
    }

    if (emptyCartMessage) emptyCartMessage.style.display = "none";
    if (cartTotalElement) cartTotalElement.style.display = "block";

    let cartItemsHTML = "";
    let totalPrice = 0;

    cartItems.forEach((item) => {
        const itemTotal = item.price * item.quantity;
        totalPrice += itemTotal;

        cartItemsHTML += `
            <div class="flex items-center justify-between p-4 mb-4 bg-white rounded-lg shadow">
                <div class="flex-1">
                    <h3 class="text-lg font-semibold">${item.name}</h3>
                    <p class="text-gray-600">€${item.price.toFixed(2)}</p>
                </div>
                <div class="flex items-center mx-4">
                    <button onclick="updateCartItemQuantity(${
                        item.product_id
                    }, ${
            item.quantity - 1
        })" class="px-2 py-1 text-gray-600 bg-gray-200 rounded-l hover:bg-gray-300">-</button>
                    <span class="px-4 py-1 bg-gray-100">${item.quantity}</span>
                    <button onclick="updateCartItemQuantity(${
                        item.product_id
                    }, ${
            item.quantity + 1
        })" class="px-2 py-1 text-gray-600 bg-gray-200 rounded-r hover:bg-gray-300">+</button>
                </div>
                <div class="flex items-center">
                    <span class="mr-4 font-semibold">€${itemTotal.toFixed(
                        2
                    )}</span>
                    <button onclick="removeFromCart(${
                        item.product_id
                    })" class="p-2 text-red-500 hover:text-red-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>
        `;
    });

    cartItemsContainer.innerHTML = cartItemsHTML;

    if (cartTotalElement) {
        cartTotalElement.innerHTML = `
            <div class="flex justify-between p-4 mb-4 text-xl font-bold bg-white rounded-lg shadow">
                <span>Total:</span>
                <span>€${totalPrice.toFixed(2)}</span>
            </div>
        `;
    }
}

// Show a notification
function showNotification(message, type = "success") {
    const notification = document.createElement("div");
    notification.className = `fixed z-50 p-4 text-white rounded-lg shadow-lg top-4 right-4 ${
        type === "error" ? "bg-red-500" : "bg-green-500"
    }`;
    notification.textContent = message;

    document.body.appendChild(notification);

    setTimeout(() => {
        notification.classList.add("opacity-0");
        notification.style.transition = "opacity 0.5s ease";

        setTimeout(() => {
            document.body.removeChild(notification);
        }, 500);
    }, 3000);
}

// Initialize cart when the page loads
document.addEventListener("DOMContentLoaded", initCart);
