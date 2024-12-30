<?php
require_once('../config/config.php');
require_once('../models/StaffInventoryModel.php');
require_once('../controllers/StaffInventoryController.php');

// Initialize inventory model and controller
$inventoryModel = new StaffInventory($pdo);
$inventoryController = new StaffInventoryController($inventoryModel);

// Handle delete request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete') {
    header('Content-Type: application/json');
    try {
        if (isset($_POST['id'])) {
            $response = $inventoryController->deleteProduct($_POST['id']);
            echo json_encode($response);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Product ID not provided'
            ]);
        }
        exit;
    } catch (Exception $e) {
        echo json_encode([
            'success' => false,
            'message' => 'Error deleting product: ' . $e->getMessage()
        ]);
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Inventory</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
        ::-webkit-scrollbar {
            width: 10px;
        }
        ::-webkit-scrollbar-track {
            background: #f1eee7;
        }
        ::-webkit-scrollbar-thumb {
            background: #9B7848;
            border-radius: 5px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #1F4A54;
        }
        .sidebar {
            width: 250px;
            background-color: #f1eee7;
            padding: 20px;
            height: 100vh;
        }
        .sidebar-menu {
            list-style: none;
            padding-left: 0;
        }
        .sidebar-menu li {
            margin: 20px 0;
        }
        .sidebar-menu li a {
            text-decoration: none;
            color: #9B7848;
            font-size: 18px;
            display: flex;
            align-items: center;
            padding: 10px 20px;
        }
        .sidebar-menu li a i {
            margin-right: 10px;
        }
        .main-content {
            flex-grow: 1;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .inventory-management {
            background-color: #f1eee7;
            padding: 20px;
            border-radius: 10px;
            width: 80%;
            max-width: 800px;
        }
        .inventory-table {
            width: 100%;
            border-collapse: collapse;
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
        .quantity-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .quantity-display {
            font-size: 20px;
            width: 60px;
            text-align: center;
            background-color: #f9f9f9;
            border: none;
            color: #9B7848;
            font-weight: bold;
        }
        .quantity-button {
            padding: 10px 20px;
            font-size: 20px;
            cursor: pointer;
            background-color: #9B7848;
            color: white;
            border: none;
            border-radius: 5px;
            margin: 0 5px;
        }
        .add-inventory-button {
            display: block;
            width: 200px;
            margin: 20px auto;
            background-color: #9B7848;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
        }
    </style>
</head>
<body>
    
    <aside class="sidebar">
        <ul class="sidebar-menu">
            <li><a href="StaffInventory.php"><i class="fas fa-door-closed"></i>Inventory</a></li>
            <li><a href="StaffTask.php"><i class="fas fa-boxes"></i>Tasks</a></li>
            <li><a href="#"><i class="fas fa-tasks"></i>Check in/out</a></li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
        </ul>
    </aside>

    <main class="main-content">
        <section class="inventory-management">
            <form id="inventoryForm">
                <table class="inventory-table">
                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Product Brand</th>
                            <th>Quantity</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
$response = $inventoryModel->getAllInventory();

if ($response['success']) {
    foreach ($response['data'] as $product) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($product['product_id']) . '</td>';
        echo '<td>' . htmlspecialchars($product['product_name']) . '</td>';
        echo '<td>' . htmlspecialchars($product['product_brand']) . '</td>';
        echo '<td>
            <div class="quantity-container">
                <!-- Input field to display and update quantity -->
                <input type="number" class="quantity-display" value="' . htmlspecialchars($product['product_quantity']) . '" data-product-id="' . $product['product_id'] . '" readonly>
            </div>
          </td>';
        echo '<td>
            <!-- Buttons to increase or decrease quantity -->
            <button type="button" class="quantity-button" onclick="updateQuantity(this, 1)" data-product-id="' . $product['product_id'] . '">+</button>
            <button type="button" class="quantity-button" onclick="updateQuantity(this, -1)" data-product-id="' . $product['product_id'] . '">-</button>
          </td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="5">No products found.</td></tr>';
}
?>
     </tbody>
                </table>
                <button type="submit" class="add-inventory-button">Save</button>
            </form>
        </section>
    </main>

    <script>
  document.getElementById('inventoryForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    // Collect all quantity values
    const quantities = Array.from(document.querySelectorAll('.quantity-display')).map(input => ({
        product_id: parseInt(input.getAttribute('data-product-id')),
        product_quantity: parseInt(input.value)
    }));

    try {
        const response = await fetch('../controllers/StaffInventoryController.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(quantities)
        });

        const data = await response.json();
        
        if (data.status === 'success') {
            alert('Successfully updated inventory!');
            location.reload();
        } else {
            throw new Error(data.message);
        }
    } catch (error) {
        alert('Error: ' + error.message);
    }
});

function updateQuantity(button, change) {
    const input = button.closest('tr').querySelector('.quantity-display');
    const currentValue = parseInt(input.value) || 0;
    input.value = Math.max(0, currentValue + change);
}
    </script>

</body>
</html>