// Sample menu items
const menuItems = [
    { name: "Margherita", price: 10 },
    { name: "Pepperoni", price: 12 },
    { name: "Vegetariana", price: 11 },
    { name: "Piccante", price: 14 },
    { name: "Marinara", price: 13 },
];

// Initialize menu and order lists
const menuList = document.getElementById("menu-list");
const orderList = document.getElementById("order-list");
const placeOrderBtn = document.getElementById("place-order-btn");

// Populate the menu
menuItems.forEach((item) => {
    const menuItem = document.createElement("li");
    menuItem.innerHTML = `${item.name} - $${item.price}`;
    menuList.appendChild(menuItem);

    // Add click event for adding items to the order
    menuItem.addEventListener("click", () => {
        addToOrder(item);
    });
});

// Initialize order array
const order = [];

// Add click event for placing an order
placeOrderBtn.addEventListener("click", () => {
    if (order.length > 0) {
        placeOrder(order);
    } else {
        alert("Please add items to your order.");
    }
});

function addToOrder(item) {
    order.push(item);
    const orderItem = document.createElement("li");
    orderItem.innerHTML = `${item.name} - $${item.price}`;
    orderList.appendChild(orderItem);
}

function placeOrder(order) {
    // Simulate an order being placed, you can add your logic here
    alert("Order placed successfully!");
    console.log(order);
    clearOrder();
}

function clearOrder() {
    orderList.innerHTML = "";
}
