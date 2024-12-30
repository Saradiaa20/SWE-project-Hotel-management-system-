<?php
require_once('../config/config.php');
require_once('../models/StaffInventoryModel.php');

class StaffInventoryController {
    private $inventoryModel;

    public function __construct($pdo) {
        $this->inventoryModel = new StaffInventory($pdo);
    }

    public function updateInventory() {
        try {
            $data = json_decode(file_get_contents('php://input'), true);
            
            if (!$data || !is_array($data)) {
                throw new Exception('Invalid data received');
            }

            foreach ($data as $item) {
                $result = $this->inventoryModel->updateProductQuantity($item);
                if (!$result['success']) {
                    throw new Exception($result['message']);
                }
            }

            return ['status' => 'success', 'message' => 'Inventory updated successfully'];
        } catch (Exception $e) {
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }
}

// Handle the request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new StaffInventoryController($pdo);
    $result = $controller->updateInventory();
    
    header('Content-Type: application/json');
    echo json_encode($result);
    exit();
}
?>