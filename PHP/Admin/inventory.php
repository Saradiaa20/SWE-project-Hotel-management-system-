<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
   

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
}

.container {
    display: flex;
}

.sidebar {
    width: 250px;
    background-color: #f1eee7;
    padding: 20px;
    height: 100vh;
    position: relative;
}

.logo {
    margin-bottom: 50px;
    text-align: center;
    font-weight: bold;
    font-size: 24px;
}

.sidebar-menu {
    list-style: none;
    padding-left: 0;
}

.sidebar-menu li {
    margin: 20px 0;
    position: relative;
}

.sidebar-menu li a {
    text-decoration: none;
    color: #9B7848;
    font-size: 18px;
    display: flex;
    align-items: center;
    padding: 10px 20px;
    position: relative;
}

.sidebar-menu li a i {
    font-size: 20px;
    color: #9B7848;
    margin-right: 10px;
}

.logout {
    margin-top: auto;
}

.logout a {
    text-decoration: none;
    color: #9B7848;
    font-size: 18px;
    position: relative;
    display: block;
    padding: 10px 20px;
}

.logout a i {
    font-size: 20px;
    color: #9B7848;
    margin-right: 10px;
}

.content {
    flex: 1;
    padding: 20px;
}

h1 {
    font-size: 28px;
    color: #333;
}

.search-container {
    margin-bottom: 20px;
}

.search-container input[type="text"] {
    width: 30%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ddd;
    border-radius: 2px;
}

.add-product-form {
    margin-bottom: 20px;
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.add-product-form h2 {
    font-size: 20px;
    margin-bottom: 10px;
    color: #333;
}

.add-product-form input {
    width: calc(100% - 20px);
    padding: 8px;
    margin-bottom: 10px;
    font-size: 16px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.add-product-form button {
    padding: 10px 15px;
    font-size: 16px;
    color: white;
    background-color: #9B7848;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

table th, table td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: left;
}

table th {
    background-color: #f1eee7;
}

table td {
    background-color: #fff;
}

button {
    padding: 5px 10px;
    color: white;
    background-color: #9B7848;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #8A6B3C;
}

</style>
</head>
<body>
   
        <div class="container">
            <!-- Sidebar -->
            <aside class="sidebar">
                <div class="logo">Admin Panel</div>
                <ul class="sidebar-menu">
                <li><a href="#"><i class="fas fa-home"></i>Home</a></li>
      <li><a href="AdminRooms.php"><i class="fas fa-door-closed"></i>Rooms</a></li>
      <li><a href="Staff/StaffInventory.php"><i class="fas fa-user-plus"></i>Staff</a></li>
      <li><a href="inventory.php"><i class="fas fa-boxes"></i>Inventory</a></li>
      <li><a href="AdminTasks.php"><i class="fas fa-tasks"></i>Tasking</a></li>
                </ul>
             
            </aside>
    
            <!-- Main Content -->
            <main class="content">
                <h1>Product Management</h1>
                
                <!-- Search Bar -->
                <div class="search-container">
                    <input type="text" id="searchInput" placeholder="Search for a product by name or ID" onkeyup="searchProducts()">
                </div>
                
               
                <form class="add-product-form">
    <input type="text" id="productName" placeholder="Product Name" required />
    <input type="number" id="productPrice" placeholder="Product Price" required step="0.01" />
    <input type="text" id="productDescription" placeholder="Product Description" required />
    <input type="number" id="productQuantity" placeholder="Quantity" required min="1" />
    <button type="button" onclick="addProduct(
        document.getElementById('productName').value, 
        document.getElementById('productPrice').value, 
        document.getElementById('productDescription').value, 
        document.getElementById('productQuantity').value)">Add Product</button>
</form>

                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Quantity</th>

                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="productTableBody">
                    </tbody>
                </table>
            </main>
        </div>
    
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    
  
<script>
 
let productIDCounter = 1;

let products = [];

function addProduct(name, price, description, quantity) {
    if (name && price && description && quantity) { 
        const newProduct = {
            id: productIDCounter++, 
            name: name,
            price: parseFloat(price).toFixed(2), 
            description: description,
            quantity: parseInt(quantity, 10) 
        };

        products.push(newProduct); 
        displayProducts(products); 

        document.getElementById('productName').value = '';
        document.getElementById('productPrice').value = '';
        document.getElementById('productDescription').value = '';
        document.getElementById('productQuantity').value = '';
    } else {
        alert("Please fill in all fields to add a product.");
    }
}


function displayProducts(productList) {
    const productTableBody = document.getElementById("productTableBody");
    productTableBody.innerHTML = ""; 

    productList.forEach(product => {
        const row = document.createElement("tr");

        row.innerHTML = `
            <td>${product.id}</td>
            <td>${product.name}</td>
            <td>$${product.price}</td>
            <td>${product.description}</td>
            <td>${product.quantity}</td>
            <td>
                <button onclick="editProduct(${product.id})">Edit</button>
                <button onclick="deleteProduct(${product.id})">Delete</button>
            </td>
        `;
        productTableBody.appendChild(row);
    });
}

function deleteProduct(id) {
    products = products.filter(product => product.id !== id);
    displayProducts(products);
}


function editProduct(id) {
    const product = products.find(p => p.id === id);
    if (product) {
        document.getElementById('productName').value = product.name;
        document.getElementById('productPrice').value = product.price;
        document.getElementById('productDescription').value = product.description;
        document.getElementById('productQuantity').value = product.quantity;

        const addButton = document.querySelector('.add-product-form button');
        addButton.textContent = "Update Product";
        addButton.onclick = function() {
            updateProduct(id);
        };
    }
}


function updateProduct(id) {
    const product = products.find(p => p.id === id);
    if (product) {
        product.name = document.getElementById('productName').value;
        product.price = parseFloat(document.getElementById('productPrice').value).toFixed(2);
        product.description = document.getElementById('productDescription').value;
        product.quantity = parseInt(document.getElementById('productQuantity').value, 10);

        displayProducts(products); 

        document.getElementById('productName').value = '';
        document.getElementById('productPrice').value = '';
        document.getElementById('productDescription').value = '';
        document.getElementById('productQuantity').value = '';

        const addButton = document.querySelector('.add-product-form button');
        addButton.textContent = "Add Product";
        addButton.onclick = function() {
            addProduct(
                document.getElementById('productName').value, 
                document.getElementById('productPrice').value, 
                document.getElementById('productDescription').value,
                document.getElementById('productQuantity').value
            );
        };
    }
}


function searchProducts() {
    const query = document.getElementById("searchInput").value.toLowerCase();
    const filteredProducts = products.filter(product =>
        product.name.toLowerCase().includes(query) || 
        product.id.toString().includes(query)
    );
    displayProducts(filteredProducts);
}


displayProducts(products);


</script>
</body>
</html>
