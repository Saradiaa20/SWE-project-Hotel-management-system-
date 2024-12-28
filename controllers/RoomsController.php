<?php

class RoomController {
    private $roomModel;

    public function __construct($roomModel) {
        $this->roomModel = $roomModel;
    }

    // Handle creating a new room
   public function createRoom($request) {
    try {
        $imagePaths = [];
        $uploadDir = "../photos/";

        // Create photos directory if it doesn't exist
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Handle file upload for multiple images
        if (isset($_FILES['roomphotos'])) {
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            foreach ($_FILES['roomphotos']['name'] as $index => $fileName) {
                $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
                if (in_array(strtolower($fileExtension), $allowedExtensions)) {
                    $imageName = time() . "_" . $fileName;
                    $imagePath = "Photos/" . $imageName;

                    if (move_uploaded_file($_FILES['roomphotos']['tmp_name'][$index], $uploadDir . $imageName)) {
                        $imagePaths[] = $imagePath;
                    } else {
                        error_log("Failed to move uploaded file");
                        return ['success' => false, 'message' => 'Failed to upload image.'];
                    }
                } else {
                    return ['success' => false, 'message' => 'Invalid image file type.'];
                }
            }
        }

        $amenities = isset($request['amenities']) ? implode(',', $request['amenities']) : '';

        $data = [
            'price' => $request['price'] ?? '',
            'reservation_status' => $request['reservation_status'] ?? '',
            'room_type' => $request['room_type'] ?? '',
            'room_status' => $request['room_status'] ?? '',
            'return_status' => $request['return_status'] ?? '',
            'fo_status' => $request['fo_status'] ?? '',
            'capacity' => $request['capacity'] ?? '',
            'bed_type' => $request['bed_type'] ?? '',
            'description' => $request['description'] ?? '',
            'detaileddescription' => $request['detaileddescription'] ?? '', 
            'amenities' => $amenities,
            'roomphotos' => !empty($imagePaths) ? implode(',', $imagePaths) : null
        ];

        if ($this->roomModel->createRoom($data)) {
            return [
                'success' => true, 
                'message' => 'Room created successfully.',
                'imagePaths' => !empty($imagePaths) ? $imagePaths : null
            ];
        }

        return ['success' => false, 'message' => 'Failed to create room.'];
    } catch (Exception $e) {
        error_log("Error in createRoom: " . $e->getMessage());
        return ['success' => false, 'message' => $e->getMessage()];
    }
}
    // Handle fetching all rooms
    public function getAllRooms() {
        $rooms = $this->roomModel->getAllRooms(); // Fetch rooms from the model
        if ($rooms) {
            return ['success' => true, 'data' => $rooms]; // Return the rooms if fetched successfully
        } else {
            return ['success' => false, 'message' => 'No rooms found.']; // Handle case where no rooms are found
        }
    }

    // Handle updating a room
   
public function getRoom($id) {
    try {
        $room = $this->roomModel->getRoom($id);
        if ($room) {
            return ['success' => true, 'data' => $room];
        }
        return ['success' => false, 'message' => 'Room not found.'];
    } catch (Exception $e) {
        error_log("Error in getRoom: " . $e->getMessage());
        return ['success' => false, 'message' => $e->getMessage()];
    }
}

public function updateRoom($id, $data) {
    try {
        $imagePaths = [];
        $uploadDir = "../photos/";

        // Handle existing photos
        $existingPhotos = isset($data['existing_photos']) ? explode(',', $data['existing_photos']) : [];

        // Handle file upload for multiple images if new images are provided
        if (isset($_FILES['roomphotos'])) {
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            foreach ($_FILES['roomphotos']['name'] as $index => $fileName) {
                if (!empty($fileName)) {  // Only process if a file was actually uploaded
                    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
                    if (in_array(strtolower($fileExtension), $allowedExtensions)) {
                        $imageName = time() . "_" . $fileName;
                        $imagePath = "photos/" . $imageName;

                        if (move_uploaded_file($_FILES['roomphotos']['tmp_name'][$index], $uploadDir . $imageName)) {
                            $imagePaths[] = $imagePath;
                        }
                    }
                }
            }
        }

        // Combine existing photos with new uploads
        $finalPhotos = array_merge($existingPhotos, $imagePaths);
        $photosString = !empty($finalPhotos) ? implode(',', $finalPhotos) : '';

        // Prepare amenities
        $amenities = isset($data['amenities']) ? implode(',', $data['amenities']) : '';

        // Prepare update data
        $updateData = [
            'id' => $id,
            'price' => $data['price'],
            'reservation_status' => $data['reservation_status'],
            'room_type' => $data['room_type'],
            'room_status' => $data['room_status'],
            'return_status' => $data['return_status'],
            'fo_status' => $data['fo_status'],
            'capacity' => $data['capacity'],
            'bed_type' => $data['bed_type'],
            'description' => $data['description'],
            'detaileddescription' => $data['detaileddescription'],
            'amenities' => $amenities,
            'roomphotos' => $photosString
        ];

        if ($this->roomModel->updateRoom($updateData)) {
            return [
                'success' => true,
                'message' => 'Room updated successfully.'
            ];
        }

        return ['success' => false, 'message' => 'Failed to update room.'];
    } catch (Exception $e) {
        error_log("Error in updateRoom: " . $e->getMessage());
        return ['success' => false, 'message' => $e->getMessage()];
    }
}
   // Handle deleting a room
  
   public function deleteRoom($id) {
    if ($this->roomModel->deleteRoom($id)) {
        return ['success' => true, 'message' => 'Room deleted successfully.'];
    } else {
        return ['success' => false, 'message' => 'Failed to delete room.'];
    }
}

    
}