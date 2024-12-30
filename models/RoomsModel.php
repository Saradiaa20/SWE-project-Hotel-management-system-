<?php
require_once(__DIR__ . '/../config/config.php');

class Room {
    private $db;
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Create a new room
    public function createRoom($data) {
        $sql = "INSERT INTO rooms (price, reservation_status, room_type, room_status, return_status, fo_status, capacity, bed_type, amenities, roomphotos, description, detaileddescription)
                VALUES (:price, :reservation_status, :room_type, :room_status, :return_status, :fo_status, :capacity, :bed_type, :amenities, :roomphotos, :description, :detaileddescription)";
        
        $stmt = $this->pdo->prepare($sql);
        
        // Bind the parameters
        $stmt->bindParam(':price', $data['price']);
        $stmt->bindParam(':reservation_status', $data['reservation_status']);
        $stmt->bindParam(':room_type', $data['room_type']);
        $stmt->bindParam(':room_status', $data['room_status']);
        $stmt->bindParam(':return_status', $data['return_status']);
        $stmt->bindParam(':fo_status', $data['fo_status']);
        $stmt->bindParam(':capacity', $data['capacity']);
        $stmt->bindParam(':bed_type', $data['bed_type']);
        $stmt->bindParam(':amenities', $data['amenities']);
        $stmt->bindParam(':roomphotos', $data['roomphotos']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':detaileddescription', $data['detaileddescription']);

        // Try to execute the query
        if ($stmt->execute()) {
            return ['success' => true, 'message' => 'Room created successfully.'];
        } else {
            error_log("SQL Error: " . implode(" - ", $stmt->errorInfo()));
            return ['success' => false, 'message' => 'Failed to create room.'];
        }
    }


    // Read all rooms
    public function getAllRooms() {
        $sql = "SELECT * FROM rooms"; // SQL query to fetch all rooms
        $stmt = $this->pdo->query($sql); // Execute the query
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch and return results as an associative array
    }

   
     //
    public function getRoom($id) {
        $sql = "SELECT * FROM rooms WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function updateRoom($data) {
        $sql = "UPDATE rooms SET 
                price = :price,
                reservation_status = :reservation_status,
                room_type = :room_type,
                room_status = :room_status,
                return_status = :return_status,
                fo_status = :fo_status,
                capacity = :capacity,
                bed_type = :bed_type,
                description=:description,
                detaileddescription= :detaileddescription,
                amenities = :amenities";
        
        // Only update photos if new ones were provided
        if (isset($data['roomphotos'])) {
            $sql .= ", roomphotos = :roomphotos";
        }
        
        $sql .= " WHERE id = :id";
        
        $stmt = $this->pdo->prepare($sql);
        
        // Bind all parameters
        $stmt->bindParam(':id', $data['id'], PDO::PARAM_INT);
        $stmt->bindParam(':price', $data['price']);
        $stmt->bindParam(':reservation_status', $data['reservation_status']);
        $stmt->bindParam(':room_type', $data['room_type']);
        $stmt->bindParam(':room_status', $data['room_status']);
        $stmt->bindParam(':return_status', $data['return_status']);
        $stmt->bindParam(':fo_status', $data['fo_status']);
        $stmt->bindParam(':capacity', $data['capacity']);
        $stmt->bindParam(':bed_type', $data['bed_type']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':detaileddescription', $data['detaileddescription']);
        $stmt->bindParam(':amenities', $data['amenities']);

        
        if (isset($data['roomphotos'])) {
            $stmt->bindParam(':roomphotos', $data['roomphotos']);
        }
        
        return $stmt->execute();
    }
   // Delete a room
   public function deleteRoom($id) {
    $sql = "DELETE FROM rooms WHERE id = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
}
   public function getAvailableRooms() {
    try {
        $stmt = $this->pdo->prepare("SELECT * FROM rooms WHERE reservation_status != 'Reserved'");
        $stmt->execute();
        return ['success' => true, 'data' => $stmt->fetchAll(PDO::FETCH_ASSOC)];
    } catch (PDOException $e) {
        return ['success' => false, 'message' => $e->getMessage()];
    }
}
    
}
