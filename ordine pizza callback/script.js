// Sample menu items
const menuItems = [
    { name: "Margherita", price: "9.50" },
    { name: "Salame", price: "11.00" },
    { name: "Vegetariana", price: "8.00"},
    { name: "Mari e Monti", price: "9.00" },
    { name: "Sciallese", price: "10.50" },
];

// Initialize menu and order lists
const menuList = document.getElementById("menu-list");
const orderList = document.getElementById("order-list");
const placeOrderBtn = document.getElementById("place-order-btn");

// Populate the menu
menuItems.forEach((item) => {
    const menuItem = document.createElement("li");
    menuItem.innerHTML = `${item.name} - €${item.price}`;
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
        placeOrder(order).then(() => {
            clearOrder();
        }).catch((error) => {
            alert(`Errore durante l'ordine: ${error}`);
        });
    } else {
        alert("Aggiungi il tuo ordine");
    }
});

function addToOrder(item) {
    return new Promise((resolve, reject) => {
        order.push(item);
        const orderItem = document.createElement("li");
        orderItem.innerHTML = `${item.name} - €${item.price}`;
        orderList.appendChild(orderItem);
        resolve();
    });
}

function placeOrder(order) {
    return new Promise((resolve, reject) => {
        // Simulate an order being placed, you can add your logic here
        setTimeout(() => {
            alert("Ordine partito correttamente!");
            console.log(order);
            resolve();
        }, 2000); // Simulate a delay of 2 seconds
    });
}

function clearOrder() {
    orderList.innerHTML = "";
}
