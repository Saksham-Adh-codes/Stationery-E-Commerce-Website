document.addEventListener("DOMContentLoaded", function () {
    let checkoutList = document.querySelector('.checkout-list');
    let totalAmountElement = document.getElementById('totalAmount');
    let confirmOrderBtn = document.getElementById('confirmOrder');
    let checkoutForm = document.getElementById('checkoutForm');

    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let products = [];

    fetch('products.json')
        .then(response => response.json())
        .then(data => {
            products = data;
            displayCheckoutItems();
        });

    function displayCheckoutItems() {
        checkoutList.innerHTML = "";
        let totalAmount = 0;

        cart.forEach(item => {
            let product = products.find(p => p.id == item.product_id);
            if (product) {
                let itemElement = document.createElement('div');
                itemElement.classList.add('checkout-item');
                itemElement.innerHTML = `
                    <img src="${product.image}" alt="${product.name}">
                    <div class="details">
                        <h3>${product.name}</h3>
                        <p>Quantity: ${item.quantity}</p>
                        <p>Price: $${(product.price * item.quantity).toFixed(2)}</p>
                    </div>
                `;
                checkoutList.appendChild(itemElement);
                totalAmount += product.price * item.quantity;
            }
        });

        totalAmountElement.innerText = totalAmount.toFixed(2);
    }

    checkoutForm.addEventListener("submit", function (event) {
        event.preventDefault(); 

        let totalAmount = parseFloat(totalAmountElement.innerText);
        console.log("Total Amount:", totalAmount); 

        let formData = new FormData();
        formData.append("totalAmount", totalAmount);

        fetch("save_purchase.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            if (data.includes("success")) {
                alert("Order Confirmed! Redirecting to Home Page.");
                localStorage.removeItem("cart");
                window.location.href = "home.html";
            } else {
                alert("Order failed: " + data);
            }
        })
        .catch(error => {
            console.error("Error:", error);
            alert("There was an error processing your order.");
        });
    });
});
