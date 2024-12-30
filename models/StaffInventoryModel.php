<?php

class StaffInventory {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Read all inventory items
    public function getAllInventory() {
        try {
            $sql = "SELECT * FROM inventory";
            $stmt = $this->pdo->query($sql);
            return ['success' => true, 'data' => $stmt->fetchAll(PDO::FETCH_ASSOC)];
        } catch (Exception $e) {
            error_log("Error fetching inventory: " . $e->getMessage());
            return ['success' => false, 'message' => 'Failed to fetch inventory.'];
        }
    }

    // Get a specific product by ID
    public function getProduct($id) {
        try {
            $sql = "SELECT * FROM inventory WHERE product_id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return ['success' => true, 'data' => $stmt->fetch(PDO::FETCH_ASSOC)];
        } catch (Exception $e) {
            error_log("Error fetching product: " . $e->getMessage());
            return ['success' => false, 'message' => 'Failed to fetch product.'];
        }
    }

    // Update product quantity
    public function updateProductQuantity($data) {
        try {
            $sql = "UPDATE inventory SET product_quantity = :product_quantity WHERE product_id = :product_id";
            $stmt = $this->pdo->prepare($sql);
            
            // Bind the parameters
            $stmt->bindParam(':product_id', $data['product_id'], PDO::PARAM_INT);
            $stmt->bindParam(':product_quantity', $data['product_quantity'], PDO::PARAM_INT);
            
            if ($stmt->execute()) {
                return ['success' => true, 'message' => 'Product quantity updated successfully.'];
            } else {
                throw new Exception(implode(" - ", $stmt->errorInfo()));
            }
        } catch (Exception $e) {
            error_log("Error updating product quantity: " . $e->getMessage());
            return ['success' => false, 'message' => 'Failed to update product quantity.'];
        }
    }
}
?>
