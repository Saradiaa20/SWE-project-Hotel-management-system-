<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMwv7n0v7iLFzRQ0R4RvhpBLNj/GLQdbT9K3Q8v" crossorigin="anonymous">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            display: flex;
            background-color: #9B7848;
        }
        /* Sidebar */
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
            margin-right: 10px;
        }

        /* main content style */
    /* Main Content */
    .main-content {
            flex-grow: 1;
            padding: 20px;
        }

        .inventory-section {
            background-color: #f1eee7;
            padding: 20px;
            border-radius: 10px;
        }

        .inventory-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .inventory-table th, .inventory-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        .inventory-table thead th {
            background-color: #f9f9f9;
            color: #9B7848;
        }

        .inventory-table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .inventory-table tbody td {
            color: #9B7848;
        }

        .quantity-controls {
            display: flex;
            align-items: center;
            justify-content: flex-start;
        }

        .quantity-controls button {
            padding: 5px 10px;
            background-color: #9B7848;
            border: none;
            color: white;
            border-radius: 3px;
            cursor: pointer;
            margin-left: 7px; 
        }

        .quantity-input {
            width: 50px;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .save-btn {
    padding: 10px 20px; 
    background-color: #5c4a2e; 
    border: none;
    color: white;
    border-radius: 5px;
    cursor: pointer;
    margin: 20px auto; 
    display: block; 
    width: fit-content; 
}



    </style>
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <ul class="sidebar-menu">
            <li><a href="staffinventory.php"><i class="fas fa-boxes"></i>Inventory</a></li>
            <li><a href="#stafftask.php"><i class="fas fa-tasks"></i>Tasks</a></li>
            <li><a href="#"><i class="fa-solid fa-hotel"></i>Check in/out</a></li>
        </ul>
        <div class="logout">
            <a href="#"><i class="fas fa-sign-out-alt"></i>Logout</a>
        </div>
    </aside>

    <!-- Main content -->
     <!-- Main content -->
     <main class="main-content">
        <!-- Inventory Section -->
        <section class="inventory-section">
            <table class="inventory-table">
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Product Brand</th>
                        <th>Product Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Soap</td>
                        <td>Dove</td>
                        <td>
                            <div class="quantity-controls">
                                <button class="increment-btn">+</button>
                                <input type="number" value="10" class="quantity-input">
                                <button class="decrement-btn">-</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Bedsheets</td>
                        <td>Sleepwell</td>
                        <td>
                            <div class="quantity-controls">
                                <button class="increment-btn">+</button>
                                <input type="number" value="20" class="quantity-input">
                                <button class="decrement-btn">-</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Toothpaste</td>
                        <td>Colgate</td>
                        <td>
                            <div class="quantity-controls">
                                <button class="increment-btn">+</button>
                                <input type="number" value="30" class="quantity-input">
                                <button class="decrement-btn">-</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Shampoo</td>
                        <td>Head & Shoulders</td>
                        <td>
                            <div class="quantity-controls">
                                <button class="increment-btn">+</button>
                                <input type="number" value="40" class="quantity-input">
                                <button class="decrement-btn">-</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Hand Soap</td>
                        <td>Softsoap</td>
                        <td>
                            <div class="quantity-controls">
                                <button class="increment-btn">+</button>
                                <input type="number" value="50" class="quantity-input">
                                <button class="decrement-btn">-</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Room Spray </td>
                        <td>Glade</td>
                        <td>
                            <div class="quantity-controls">
                                <button class="increment-btn">+</button>
                                <input type="number" value="60" class="quantity-input">
                                <button class="decrement-btn">-</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Shower Gel</td>
                        <td>L’Occitane</td>
                        <td>
                            <div class="quantity-controls">
                                <button class="increment-btn">+</button>
                                <input type="number" value="70" class="quantity-input">
                                <button class="decrement-btn">-</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>Hand Sanitizer </td>
                        <td>Purell</td>
                        <td>
                            <div class="quantity-controls">
                                <button class="increment-btn">+</button>
                                <input type="number" value="80" class="quantity-input">
                                <button class="decrement-btn">-</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>9</td>
                       <td>Face Towels</td>
                        <td>Bounty</td>
                        <td>
                            <div class="quantity-controls">
                                <button class="increment-btn">+</button>
                                <input type="number" value="90" class="quantity-input">
                                <button class="decrement-btn">-</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>Facial Tissue</td>
                        <td>Puffs</td>
                        <td>
                            <div class="quantity-controls">
                                <button class="increment-btn">+</button>
                                <input type="number" value="100" class="quantity-input">
                                <button class="decrement-btn">-</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
        <button class="save-btn">Save</button>
    </main>

    <script>
        const decrementBtns = document.querySelectorAll('.decrement-btn');
        const incrementBtns = document.querySelectorAll('.increment-btn');
        const quantityInputs = document.querySelectorAll('.quantity-input');
        const saveBtn = document.querySelector('.save-btn');

        decrementBtns.forEach((btn, index) => {
            btn.addEventListener('click', () => {
                const currentValue = parseInt(quantityInputs[index].value);
                if (currentValue > 0) {
                    quantityInputs[index].value = currentValue - 1;
                }
            });
        });

        incrementBtns.forEach((btn, index) => {
            btn.addEventListener('click', () => {
                const currentValue = parseInt(quantityInputs[index].value);
                quantityInputs[index].value = currentValue + 1;
            });
        });

        saveBtn.addEventListener('click', () => {
            alert('Stock has been updated!');
        });
        </script>

</body>
</html>
