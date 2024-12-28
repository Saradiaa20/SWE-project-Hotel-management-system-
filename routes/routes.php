<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('../config/config.php');
require_once('../models/RoomsModel.php');
require_once('../controllers/RoomsController.php');

// Initialize the Room model with the database connection
$roomModel = new Room($pdo);
$roomController = new RoomController($roomModel);

// Routing logic
// routes.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    switch ($action) {

case 'createRoom':
    try {
        error_log("POST data: " . print_r($_POST, true));
        error_log("FILES data: " . print_r($_FILES, true));
        $response = $roomController->createRoom($_POST);
        error_log("Response: " . print_r($response, true));
        echo json_encode($response);
    } catch (Exception $e) {
        error_log("Error: " . $e->getMessage());
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
    break;

    
        case 'displayRooms':
            $response = $roomController->getAllRooms();
            if ($response['success']) {
                $rooms = $response['data'];
                require_once('../views/displayRooms.php');
            } else {
                echo $response['message'];
            }
            break;

            case 'deleteRoom':
                if (isset($_POST['id'])) {
                    $response = $roomController->deleteRoom($_POST['id']);
                    echo json_encode($response);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Room ID not provided.']);
                }
                break;
                case 'viewRoom':
                    if (isset($_GET['id'])) {
                        require_once('../views/roomDetails.php');
                    } else {
                        echo json_encode(['success' => false, 'message' => 'Room ID not provided.']);
                    }
                    break;
        
        default:
            echo json_encode(['success' => false, 'message' => 'Invalid action.']);
            break;
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $action = $_GET['action'] ?? '';

    switch ($action) {
        case 'getAllRooms':
            $response = $roomController->getAllRooms();
            echo json_encode($response);
            break;

        default:
            echo json_encode(['success' => false, 'message' => 'Invalid action.']);
            break;
    }
    
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $action = $_GET['action'] ?? '';

    switch ($action) {
        case 'getRoom':
            if (isset($_GET['id'])) {
                $response = $roomController->getRoom($_GET['id']);
                echo json_encode($response);
            } else {
                echo json_encode(['success' => false, 'message' => 'Room ID not provided.']);
            }
            break;
            
        // ... existing GET routes ...
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    switch ($action) {
        case 'updateRoom':
            if (isset($_POST['id'])) {
                $response = $roomController->updateRoom($_POST['id'], $_POST);
                echo json_encode($response);
            } else {
                echo json_encode(['success' => false, 'message' => 'Room ID not provided.']);
            }
            break;
            
       
    }
}


?>
