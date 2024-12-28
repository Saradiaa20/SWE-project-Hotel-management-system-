<?php
require_once('../config/config.php');
require_once('../models/RoomsModel.php');
require_once('../controllers/RoomsController.php');

// Initialize room model and controller
$roomModel = new Room($pdo);
$roomController = new RoomController($roomModel);

// Get room ID from URL parameter and validate
$roomId = isset($_GET['id']) ? (int)$_GET['id'] : null;
if (!$roomId) {
    header('Location: AdminRooms.php');
    exit;
}

// Fetch room data
$response = $roomController->getRoom($roomId);
if (!$response['success']) {
    header('Location: AdminRooms.php');
    exit;
}
$room = $response['data'];

// Convert amenities string to array
$roomAmenities = !empty($room['amenities']) ? explode(',', $room['amenities']) : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Room</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <style>
    /* Reset */
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      overflow-x: hidden;
    }

    body {
      font-family: Arial, sans-serif;
      display: flex;
      background-color: #9B7848;
    }

    .logout {
      font-size: 18px;
      color: #9B7848;
    }

    .logout a {
      text-decoration: none;
      color: #9B7848;
      display: flex;
      align-items: center;
    }

    .logout a i {
      margin-right: 10px;
      font-size: 20px;
    }

    /* Main Content */
    main {
      flex-grow: 1;
      padding: 20px;
      background-color: #9B7848;
    }

    header h1 {
      color: #f1eee7;
      font-size: 28px;
    }

    header span {
      font-weight: normal;
      color: #f1eee7;
    }

    .room-details {
      margin-top: 20px;
      background-color: #f1eee7;
      padding: 20px;
      border-radius: 10px;
      width: 100%; /* Set to 100% to take up available space */
      max-width: 1500px; 
      height: 600px;
    }

    .room-pictures label {
      font-weight: bold;
      color: #9B7848;
      font-size: 30px;
    }

    .gallery {
      display: flex;
      gap: 10px;
      margin-top: 10px;
    }
  
    .room-pictures .gallery {
      width: 100%; /* Adjusted to fit within the room details section */
    }

    .gallery img, .add-image {
      width: 150px;
      height: 150px;
      background-color: #e0e0e0;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      border-radius: 5px;
    }

    .add-image {
      font-size: 24px;
      color: #666;
    }

    form {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      margin-top: 30px;
    }

    .form-group {
      flex: 1 1 200px;
    }

    form label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
      color: #9B7848;
      font-size: 20px;
    }

    form input, form select {
      width: 100%;
      padding: 8px;
      border: 1px solid #9B7848;
      border-radius: 5px;
    }

    .form-group select option {
      background-color: #f1eee7; /* Background color for options */
      color: #9B7848;            /* Text color for options */
    }

    .amenities {
      margin-top: 20px; /* Adjust this value to move the amenities div down */
    }

    .amenities label {
      font-weight: bold;
      color: #9B7848;
      font-size: 20px;
      margin-top: 15px;
    }

    .amenities div {
      display: flex;
      gap: 15px; /* Adjust spacing between checkboxes */
      margin-top: 5px;
      align-items: center;
      white-space: nowrap; /* Prevents wrapping to the next line */
      color: #9B7848;
      font-size: 20px;
    }

    button {
      background-color: #9B7848;
      color: white;
      padding: 10px 20px;
      border: none;
      cursor: pointer;
      font-size: 16px;
      border-radius: 5px;
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
    .gallery .remove-image{
      background-color: #f1eee7;
      color:#9B7848
  
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

    .save-button {
      background-color: #9B7848;
      color: #f1eee7;
      font-size: 18px;
      font-weight: bold;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      margin-top: 40px; /* Adjusts the spacing from the amenities section */
      transition: background-color 0.3s ease;
    }

    .save-button:hover {
      background-color: #7e6238; /* Darker shade for hover effect */
    }

    .save-button:active {
      background-color: #5c472a; /* Even darker shade for active click effect */
    }

    /* Success Message */
    .success-message {
      color: green;
      font-weight: bold;
      margin-top: 20px;
     
    
    }
.success-message {
  position: absolute;
  bottom: 10px; /* Adjust the bottom position as needed */
  left: 50%; /* Center horizontally */
  transform: translateX(-50%);
  background-color: #fff;
  padding: 10px 20px;
  border-radius: 5px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
  display: none; /* Initially hidden */
}
    /* Error Message */
    .error-message {
      color: #9B7848; /* Change the text color to #9B7848 */
      font-weight: bold;
      margin-top: 10px;
      margin-right: 500px;
    }

    /* Hide file input */
    input[type="file"] {
      display: none;
    }
    .image-container {
  position: relative; /* Allow positioning of the button relative to the image */
}

.image-container img {
  width: 150px; /* Set width for images */
  height: 150px; /* Set height for images */
  border-radius: 5px;
}

.remove-image {
  position: absolute; /* Position the button absolutely within the image container */
  top: 5px; /* Adjust top position */
  right: 5px; /* Adjust right position */
  background-color: rgba(255, 255, 255, 0.7); /* Semi-transparent background for better visibility */
  border: none;
  border-radius: 50%; /* Circular button */
  cursor: pointer;
  padding: 5px;
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
  </style>
</head>
<body>
    <aside class="sidebar">
        <ul class="sidebar-menu">
            <li><a href="AdminRooms.php"><i class="fas fa-door-closed"></i>Rooms</a></li>
            <li><a href="inventory.php"><i class="fas fa-boxes"></i>Inventory</a></li>
            <li><a href="AdminTasks.php"><i class="fas fa-tasks"></i>Tasking</a></li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
        </ul>
    </aside>

    <main>
    <section class="room-details">
            <div class="room-pictures">
                <label>Room Pictures</label>
                <div class="gallery">
                    <?php 
                    if (!empty($room['roomphotos'])) {
                        $photos = explode(',', $room['roomphotos']);
                        foreach ($photos as $photo) {
                            echo '<div class="image-container">';
                            echo '<img src="../' . htmlspecialchars($photo) . '" alt="Room photo">';
                            echo '<button class="remove-image" data-path="' . htmlspecialchars($photo) . '"><i class="fas fa-times"></i></button>';
                            echo '</div>';
                        }
                    }
                    ?>
                    <div class="add-image" id="addImageButton">+</div>
                    <input type="file" id="imageInput" accept="image/*" multiple>
                </div>
                <div class="error-message" id="uploadError" style="display: none;"></div>
                <div class="success-message" id="uploadSuccess" style="display: none;"></div>
            </div>

            <form id="roomForm" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="updateRoom">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($roomId); ?>">

                <div class="form-group">
                    <label for="price">Room Price</label>
                    <input type="number" id="price" name="price" value="<?php echo htmlspecialchars($room['price']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="reservation_status">Reservation Status</label>
                    <select id="reservation_status" name="reservation_status" required>
                        <option value="Reserved" <?php echo $room['reservation_status'] == 'Reserved' ? 'selected' : ''; ?>>Reserved</option>
                        <option value="Not Reserved" <?php echo $room['reservation_status'] == 'Not Reserved' ? 'selected' : ''; ?>>Not Reserved</option>
                        <option value="In House" <?php echo $room['reservation_status'] == 'In House' ? 'selected' : ''; ?>>In House</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="room_type">Room Type</label>
                    <select id="room_type" name="room_type" required>
                        <option value="Standard" <?php echo $room['room_type'] == 'Standard' ? 'selected' : ''; ?>>Standard</option>
                        <option value="Deluxe" <?php echo $room['room_type'] == 'Deluxe' ? 'selected' : ''; ?>>Deluxe</option>
                        <option value="Suite" <?php echo $room['room_type'] == 'Suite' ? 'selected' : ''; ?>>Suite</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="room_status">Room Status</label>
                    <select id="room_status" name="room_status" required>
                        <option value="Clean" <?php echo $room['room_status'] == 'Clean' ? 'selected' : ''; ?>>Clean</option>
                        <option value="Dirty" <?php echo $room['room_status'] == 'Dirty' ? 'selected' : ''; ?>>Dirty</option>
                        <option value="Inspected" <?php echo $room['room_status'] == 'Inspected' ? 'selected' : ''; ?>>Inspected</option>
                        <option value="Out of Service" <?php echo $room['room_status'] == 'Out of Service' ? 'selected' : ''; ?>>Out of Service</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="return_status">Return Status:</label>
                    <select id="return_status" name="return_status" required>
                        <option value="Ready" <?php echo $room['return_status'] == 'Ready' ? 'selected' : ''; ?>>Ready</option>
                        <option value="Occupied" <?php echo $room['return_status'] == 'Occupied' ? 'selected' : ''; ?>>Occupied</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="fo_status">FO Status</label>
                    <select id="fo_status" name="fo_status" required>
                        <option value="Vacant" <?php echo $room['fo_status'] == 'Vacant' ? 'selected' : ''; ?>>Vacant</option>
                        <option value="Occupied" <?php echo $room['fo_status'] == 'Occupied' ? 'selected' : ''; ?>>Occupied</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="capacity">Room Capacity</label>
                    <input type="number" id="capacity" name="capacity" value="<?php echo htmlspecialchars($room['capacity']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="bed_type">Bed Type</label>
                    <input type="text" id="bed_type" name="bed_type" value="<?php echo htmlspecialchars($room['bed_type']); ?>" required>
                </div>

                <div class="amenities">
                    <div>
                        <label>Room Facilities</label>
                        <?php
                        $availableAmenities = ['Balcony', 'Sofa Bed', 'Iron', 'Non Smoking', 'Air conditioning', 'Free Wi-Fi', 'Laundry Service'];
                        foreach ($availableAmenities as $amenity) {
                            $checked = in_array($amenity, $roomAmenities) ? 'checked' : '';
                            echo sprintf(
                                '<input type="checkbox" name="amenities[]" value="%s" %s> %s',
                                htmlspecialchars($amenity),
                                $checked,
                                htmlspecialchars($amenity)
                            );
                        }
                        ?>
                    </div>
                    <button type="submit" class="save-button">Save Changes</button>
                </div>
            </form>
        </section>
    </main>

    <script>
     const addImageButton = document.getElementById("addImageButton");
    const imageInput = document.getElementById("imageInput");
    const gallery = document.querySelector(".gallery");
    let uploadedFiles = [];

    // Handle image addition
    addImageButton.addEventListener("click", () => imageInput.click());

    // Handle file selection
    imageInput.addEventListener("change", function(event) {
        const files = event.target.files;
        
        Array.from(files).forEach(file => {
            if (!file.type.startsWith('image/')) {
                alert('Please upload only image files.');
                return;
            }

            const imageContainer = document.createElement("div");
            imageContainer.className = "image-container";

            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.createElement("img");
                img.src = e.target.result;
                img.style.width = "150px";
                img.style.height = "150px";
                img.style.objectFit = "cover";
                img.style.borderRadius = "5px";
                imageContainer.appendChild(img);

                const removeButton = document.createElement("button");
                removeButton.className = "remove-image";
                removeButton.innerHTML = '<i class="fas fa-times"></i>';
                removeButton.onclick = function() {
                    const index = uploadedFiles.indexOf(file);
                    if (index > -1) {
                        uploadedFiles.splice(index, 1);
                    }
                    imageContainer.remove();
                };
                imageContainer.appendChild(removeButton);
            };
            reader.readAsDataURL(file);

            uploadedFiles.push(file);
            gallery.insertBefore(imageContainer, addImageButton);
        });
    });

    // Handle form submission
    document.getElementById("roomForm").addEventListener("submit", function(event) {
        event.preventDefault();
        
        const formData = new FormData(this);
        
        // Add uploaded files to form data
        uploadedFiles.forEach((file, index) => {
            formData.append('roomphotos[]', file);
        });

        // Add existing photos that weren't removed
        const existingPhotos = [];
        document.querySelectorAll('.image-container img[src^="../"]').forEach(img => {
            if (!img.parentElement.classList.contains('removed')) {
                existingPhotos.push(img.getAttribute('src').replace('../', ''));
            }
        });
        formData.append('existing_photos', existingPhotos.join(','));

        // Submit form
        fetch('../routes/routes.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const successMsg = document.getElementById("uploadSuccess");
                successMsg.textContent = data.message;
                successMsg.style.display = 'block';
                
                setTimeout(() => {
                    window.location.href = 'AdminRooms.php';
                }, 1500);
            } else {
                const errorMsg = document.getElementById("uploadError");
                errorMsg.textContent = data.message || 'Edited';
                errorMsg.style.display = 'block';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            const errorMsg = document.getElementById("uploadError");
            errorMsg.textContent = 'Edited';
            errorMsg.style.display = 'block';
        });
    });

    // Handle existing image removal
    document.querySelectorAll('.remove-image').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const container = this.parentElement;
            container.classList.add('removed');
            container.style.display = 'none';
        });
    });
</script>


</body>
</html> 