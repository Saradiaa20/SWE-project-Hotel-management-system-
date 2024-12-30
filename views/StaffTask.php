<?php
session_start();
require_once('../config/config.php');
require_once('../models/StaffTaskModel.php');

// Initialize the StaffTask model
$taskModel = new StaffTask($pdo);

// Fetch tasks
$response = $taskModel->getAllTasks();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Tasks</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>

.display-number {
        color: #9B7848;
        font-weight: bold;
    }
    
    .real-id {
        display: none;
    }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #9B7848;
            height: 100vh;
        }
        .task-management {
            background-color: #f1eee7;
            padding: 20px;
            border-radius: 10px;
            width: 80%;
            max-width: 800px;
            text-align: center;
        }
        .task-table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
        }
        .task-table th, .task-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }
        .task-table thead th {
            background-color: #f9f9f9;
            color: #9B7848;
        }
        .task-table tbody tr:hover {
            background-color: #f1f1f1;
        }
        .task-table tbody td {
            color: #9B7848;
        }
        .save-button {
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #9B7848;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .save-button:hover {
            background-color: #85693e;
        }
        .sidebar {
    position: fixed;
    top: 0;
    left: 0;
    width: 250px;
    height: 100vh;
    background-color: #f1eee7;
    padding: 20px;
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
}

.sidebar-menu {
    list-style: none;
    padding-left: 0;
    margin: 0;
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
    transition: background-color 0.3s, color 0.3s;
}

.sidebar-menu li a:hover {
    background-color: #e0dcd5;
    color: #85693e;
}

.sidebar-menu li a i {
    margin-right: 10px;
}


    
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
            display: none;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
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
    <section class="task-management">
        <div id="successAlert" class="alert alert-success"></div>
        <div id="errorAlert" class="alert alert-error"></div>

        <form id="taskForm" method="POST" action="../controllers/StaffTaskController.php">
            <table class="task-table">
                <thead>
                    <tr>
                        <th>Task #</th>
                        <th>Task Description</th>
                        <th>Select</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($response['success'] && !empty($response['data'])): ?>
                        <?php $displayNumber = 1; ?>
                        <?php foreach ($response['data'] as $task): ?>
                            <tr>
                                <td>
                                    <span class="display-number"><?php echo $displayNumber; ?></span>
                                    <span class="real-id"><?php echo htmlspecialchars($task['TaskID']); ?></span>
                                </td>
                                <td><?php echo htmlspecialchars($task['TaskDescription']); ?></td>
                                <td>
                                    <input type="checkbox" 
                                           name="selected_tasks[]" 
                                           value="<?php echo $task['TaskID']; ?>"
                                           data-display-number="<?php echo $displayNumber; ?>">
                                </td>
                            </tr>
                            <?php $displayNumber++; ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="3">No pending tasks found.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <button type="submit" class="save-button">Save</button>
        </form>
    </section>

    <script>
        // Show alerts based on session messages
        <?php if (isset($_SESSION['success'])): ?>
            document.getElementById('successAlert').style.display = 'block';
            document.getElementById('successAlert').textContent = <?php echo json_encode($_SESSION['success']); ?>;
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['error'])): ?>
            document.getElementById('errorAlert').style.display = 'block';
            document.getElementById('errorAlert').textContent = <?php echo json_encode($_SESSION['error']); ?>;
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        // Hide alerts after 3 seconds
        setTimeout(() => {
            document.querySelectorAll('.alert').forEach(alert => {
                alert.style.display = 'none';
            });
        }, 4000);
        document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    console.log(`Selected Task #${this.dataset.displayNumber}`);
                }
            });
        });

        // Form submission handling
        document.getElementById('taskForm').addEventListener('submit', function(e) {
            const selectedBoxes = document.querySelectorAll('input[type="checkbox"]:checked');
            if (selectedBoxes.length === 0) {
                e.preventDefault();
                document.getElementById('errorAlert').style.display = 'block';
                document.getElementById('errorAlert').textContent = 'Please select at least one task.';
                setTimeout(() => {
                    document.getElementById('errorAlert').style.display = 'none';
                }, 3000);
            }
        });
    </script>
</body>
</html>