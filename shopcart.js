

// Your existing code to handle the "Add to Cart" buttons (addToCart function)

// Function to display products in the shopping cart
function displayShoppingCart() {
    const cartTableBody = document.getElementById("cart-items");
    cartTableBody.innerHTML = "";

    // Retrieve products from Local Storage
    const products = JSON.parse(localStorage.getItem("cartProducts")) || [];

    // Calculate and display the products in the shopping cart
    let grandTotal = 0;
    products.forEach((product) => {
        // Calculate the total price for each product
        const totalPrice = product.price * product.quantity;
        grandTotal += totalPrice;

        // Create a table row for each product
        const row = `
            <tr>
                <td><img src="${product.image}" alt="${product.name}" style="width: 50px;"></td>
                <td>${product.name}</td>
                <td>$${product.price}</td>
                <td>${product.quantity}</td>
                <td>$${totalPrice.toFixed(2)}</td>
                <td><button class="uk-button uk-button-danger" data-product-id="${product.id}">Remove</button></td>
            </tr>
        `;

        // Append the row to the table body
        cartTableBody.insertAdjacentHTML("beforeend", row);
    });

    // Update the grand total in the last row
    const grandTotalRow = document.querySelector(".uk-table tfoot tr");
    grandTotalRow.querySelector(".grand-total").innerText = `$${grandTotal.toFixed(2)}`;
}

// Call the displayShoppingCart function initially to show existing products
displayShoppingCart();

// Function to remove a product from the shopping cart
function removeProduct(productId) {
    let products = JSON.parse(localStorage.getItem('cartProducts')) || [];
    products = products.filter((product) => product.id !== productId);
    localStorage.setItem('cartProducts', JSON.stringify(products));

    // After removing the product, re-render the shopping cart to update the displayed products
    displayShoppingCart();
}

// Event listener for the "Remove" buttons
const removeButtons = document.querySelectorAll(".uk-button-danger");
removeButtons.forEach((button) => {
    button.addEventListener("click", () => {
        const productId = button.getAttribute("data-product-id");
        removeProduct(productId);
    });
});
