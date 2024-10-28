<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Room Edit</title>
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
  </style>
</head>
<body>
  <aside class="sidebar">
    <ul class="sidebar-menu">
      <li><a href="#"><i class="fas fa-home"></i>Home</a></li>
      <li><a href="#"><i class="fas fa-door-closed"></i>Rooms</a></li>
      <li><a href="#"><i class="fas fa-users"></i>Guest</a></li>
      <li><a href="#"><i class="fas fa-user-plus"></i>Staff</a></li>
      <li><a href="#"><i class="fas fa-boxes"></i>Inventory</a></li>
      <li><a href="#"><i class="fas fa-tasks"></i>Tasking</a></li>
      <li><a href="#"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
    </ul>
  </aside>

  <main>
    <section class="room-details">
      <div class="room-pictures">
        <label>Room Pictures</label>
        <div class="gallery">
          
          <div class="add-image" id="addImageButton">+</div>
          <input type="file" id="imageInput" accept="image/*">
        </div>
        <div class="error-message" style="display: none;"></div> <!-- Placeholder for error message -->
      </div>

      <form>
        <div class="form-group">
          <label>Room Price</label>
          <input type="number" placeholder="Price per night" required>
        </div>
        <div class="form-group">
          <label>Reservation Status</label>
          <select>
            <option>Not Reserved</option>
            <option>Reserved</option>
          </select>
        </div>
        <div class="form-group">
          <label>Room Type</label>
          <select>
            <option>Standard</option>
            <option>Deluxe</option>
            <option>Suite</option>
          </select>
        </div>
        <div class="form-group">
          <label>Room Status</label>
          <select>
            <option>Clean</option>
            <option>Dirty</option>
          </select>
        </div>
        <div class="form-group">
          <label>Return Status</label>
          <select>
            <option>Ready</option>
            <option>Occupied</option>
          </select>
        </div>
        <div class="form-group">
          <label>FO Status</label>
          <select>
            <option>Vacant</option>
            <option>Occupied</option>
          </select>
        </div>
        <div class="form-group">
          <label>Room Capacity</label>
          <input type="text" value="2-4 Guests">
        </div>
        <div class="form-group">
          <label>Bed Type</label>
          <input type="text" value="King Size">
        </div>
        
        <div class="amenities">
          <label>Room Facilities</label>
          <div>
            <input type="checkbox" checked> Balcony
            <input type="checkbox"> Sofa Bed
            <input type="checkbox" checked> Iron
            <input type="checkbox" checked> Non Smoking
            <input type="checkbox"> Air conditioning
            <input type="checkbox"> Free Wi-Fi
            <input type="checkbox"> Laundry Service
          </div>
          <button type="button" class="save-button">Add Room</button>
          <div class="success-message" style="display: none;"></div> <!-- Placeholder for success message -->
        </div>
      </form>
    </section>
  </main>
  <script>
    document.querySelector('input[type="number"]').addEventListener('input', function() {
        if (this.value < 0) this.value = 0;
    });

    // Save Changes button event listener
    document.querySelector('.save-button').addEventListener('click', () => {
        const priceInput = document.querySelector('input[type="number"]');
        const roomCapacityInput = document.querySelector('input[type="text"][value="2-4 Guests"]');
        const bedTypeInput = document.querySelector('input[type="text"][value="King Size"]');
        const successMessage = document.querySelector('.success-message');
        let messages = [];

        // Validation checks
        if (!priceInput.value) {
            messages.push('Please enter a valid price.');
        }
        if (!roomCapacityInput.value) {
            messages.push('Room Capacity must be filled.');
        }
        // Allow any input (text or numbers) for Room Capacity
        if (!bedTypeInput.value) {
            messages.push('Bed Type must be filled.');
        } else if (/\d/.test(bedTypeInput.value)) {
            messages.push('Bed Type must contain text only, not numbers.');
        }

        // Display messages
        if (messages.length > 0) {
            successMessage.textContent = messages.join(' ');
            successMessage.style.display = 'block';
        } else {
            successMessage.textContent = 'Changes saved successfully!';
            successMessage.style.display = 'block';
            priceInput.value = ''; // Optionally clear the input after saving
            roomCapacityInput.value = ''; // Optionally clear the input after saving
            bedTypeInput.value = ''; // Optionally clear the input after saving
        }
    });

    // Function to add images to the gallery
    const addImageButton = document.getElementById('addImageButton');
    const imageInput = document.getElementById('imageInput');
    const gallery = document.querySelector('.gallery');
    const errorMessage = document.querySelector('.error-message');

    addImageButton.addEventListener('click', () => {
        imageInput.click();
    });

    imageInput.addEventListener('change', (event) => {
        const files = event.target.files;
        errorMessage.style.display = 'none'; // Hide error message initially

        for (const file of files) {
            // Validate file type
            if (!file.type.startsWith('image/')) {
                errorMessage.textContent = 'Please select a valid image file.';
                errorMessage.style.display = 'block';
                return; // Stop processing if a non-image file is found
            }

            const reader = new FileReader();
            reader.onload = (e) => {
                const imageContainer = document.createElement('div');
                imageContainer.className = 'image-container'; // Create image container

                const img = document.createElement('img');
                img.src = e.target.result;
                img.alt = 'Room Image';

                const removeButton = document.createElement('button');
                removeButton.className = 'remove-image';
                removeButton.innerHTML = '<i class="fas fa-trash-alt"></i>';
                removeButton.addEventListener('click', () => {
                    imageContainer.remove(); // Remove the image container when clicked
                });

                imageContainer.appendChild(img);
                imageContainer.appendChild(removeButton);
                gallery.insertBefore(imageContainer, addImageButton); // Insert new container before the add image button

                errorMessage.style.display = 'none'; // Hide error message on successful upload
            };

            reader.readAsDataURL(file);
        }
    });

    function removeImage(button) {
        const imageContainer = button.parentElement; // Get the parent image container
        imageContainer.remove(); // Remove the image container from the DOM
    }
</script>


</body>
</html>
