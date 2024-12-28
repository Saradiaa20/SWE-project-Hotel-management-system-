<?php
require_once('../config/config.php');
require_once('../models/RoomsModel.php');
require_once('../controllers/RoomsController.php');

// Initialize room model and controller
$roomModel = new Room($pdo);
$roomController = new RoomController($roomModel);

// Handle delete request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete') {
    header('Content-Type: application/json');
    try {
        if (isset($_POST['id'])) {
            $response = $roomController->deleteRoom($_POST['id']);
            echo json_encode($response);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Room ID not provided'
            ]);
        }
        exit;
    } catch (Exception $e) {
        echo json_encode([
            'success' => false,
            'message' => 'Error deleting room: ' . $e->getMessage()
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
    <title>View Rooms</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Basic Reset */
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
        /* Sidebar */
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
        /* Main Content */
        .main-content {
            flex-grow: 1;
            padding: 20px;
        }
        .room-management {
            background-color: #f1eee7;
            padding: 20px;
            border-radius: 10px;
        }
        .room-table {
            width: 100%;
            border-collapse: collapse;
        }
        .room-table th, .room-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }
        .room-table thead th {
            background-color: #f9f9f9;
            color: #9B7848;
        }
        .room-table tbody tr:hover {
            background-color: #f1f1f1;
        }
        .room-table tbody td {
            color: #9B7848;
        }
        .add-room-button {
            margin-top: 20px;
            background-color: #9B7848;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <ul class="sidebar-menu">
            <li><a href="AdminRooms.php"><i class="fas fa-door-closed"></i>Rooms</a></li>
            <li><a href="inventory.php"><i class="fas fa-boxes"></i>Inventory</a></li>
            <li><a href="AdminTasks.php"><i class="fas fa-tasks"></i>Tasking</a></li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
        </ul>
    </aside>
    <!-- Main Content -->
    <main class="main-content">
        <section class="room-management">
            <table class="room-table">
                <thead>
                    <tr>
                        <th>Room ID</th>
                        <th>Room Type</th>
                        <th>Price</th>
                        <th>Room Capacity</th>
                        <th>Bed Type</th>
                        <th>FO Status</th>
                        <th>Reservation Status</th>
                        <th>Status</th>
                        <th>Amenities</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once('../config/config.php');
                    require_once('../models/RoomsModel.php');
                    require_once('../controllers/RoomsController.php');

                    $roomModel = new Room($pdo);
                    $roomController = new RoomController($roomModel);

                    $response = $roomController->getAllRooms();

                    if ($response['success']) {
                        foreach ($response['data'] as $room) {
                            $amenities = explode(',', $room['amenities']);
                            $roomStatusIcon = '';
                            switch ($room['room_status']) {
                                case 'Clean': $roomStatusIcon = '<i class="fas fa-check-circle" style="color: green;"></i>'; break;
                                case 'Inspected': $roomStatusIcon = '<i class="fas fa-search" style="color: blue;"></i>'; break;
                                case 'Dirty': $roomStatusIcon = '<i class="fas fa-broom" style="color: red;"></i>'; break;
                                case 'Out of Service': $roomStatusIcon = '<i class="fas fa-tools" style="color: orange;"></i>'; break;
                            }
                            $reservationStatusIcon = '';
                            switch ($room['reservation_status']) {
                                case 'Not Reserved': $reservationStatusIcon = '<i class="far fa-calendar-alt" style="color: gray;"></i>'; break;
                                case 'In House': $reservationStatusIcon = '<i class="fas fa-house-user" style="color: green;"></i>'; break;
                                case 'Reserved': $reservationStatusIcon = '<i class="fas fa-check-circle" style="color: red;"></i>'; break; // Icon added for Reserved status
                            }
                            echo '<tr>';
                            echo '<td>' . htmlspecialchars($room['id']) . '</td>';
                            echo '<td>' . htmlspecialchars($room['room_type']) . '</td>';
                            echo '<td>$' . htmlspecialchars($room['price']) . '</td>';
                            echo '<td>' . htmlspecialchars($room['capacity']) . ' persons</td>';
                            echo '<td>' . htmlspecialchars($room['bed_type']) . '</td>';
                            echo '<td>' . $roomStatusIcon . ' ' . htmlspecialchars($room['room_status']) . '</td>';
                            echo '<td>' . $reservationStatusIcon . ' ' . htmlspecialchars($room['reservation_status']) . '</td>';
                            echo '<td>' . htmlspecialchars($room['fo_status']) . '</td>';
                            echo '<td>' . implode(' - ', array_map('htmlspecialchars', array_map('trim', $amenities))) . '</td>';
                            echo '<td>
                                <button onclick="location.href=\'EditRoom.php?id=' . $room['id'] . '\'" class="edit-btn"><i class="fas fa-edit" style="color: #3498db; font-size: 20px;"></i></button>
                                <button onclick="deleteRoom(' . $room['id'] . ')" class="delete-btn"><i class="fas fa-trash-alt" style="color: #c0392b; font-size: 20px;"></i></button>
                            </td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="10">No rooms found.</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
            <button class="add-room-button" onclick="location.href='AddRoom.php'">ADD ROOM</button>
        </section>
    </main>
    <script>
function deleteRoom(roomId) {
    if (confirm('Are you sure you want to delete this room?')) {
        const formData = new FormData();
        formData.append('action', 'delete');
        formData.append('id', roomId);

        fetch('AdminRooms.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                alert(data.message);
                window.location.reload();
            } else {
                alert('Error: ' + (data.message || 'Failed to delete room'));
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while deleting the room. Please check the console for details.');
        });
    }
}


</script>
</body>

</html>
