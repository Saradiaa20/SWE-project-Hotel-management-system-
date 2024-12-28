<?php
require_once('../config/config.php');
require_once('../models/RoomsModel.php');
require_once('../controllers/RoomsController.php');

// Initialize the Room model and controller
$roomModel = new Room($pdo);
$roomController = new RoomController($roomModel);
// Get room ID from URL parameter
$roomId = isset($_GET['id']) ? $_GET['id'] : null;

if (!$roomId) {
    echo "Room ID not provided";
    exit;
}

// Fetch room details
$roomResponse = $roomController->getRoom($roomId);

// Check if room exists and data was retrieved successfully
if (!$roomResponse['success'] || !$roomResponse['data']) {
    echo "Room not found";
    exit;
}

$room = $roomResponse['data'];

// Convert amenities string back to array
$amenitiesArray = !empty($room['amenities']) ? explode(',', $room['amenities']) : [];

// Helper function to check if amenity exists
function hasAmenity($amenitiesArray, $amenity) {
    return in_array($amenity, $amenitiesArray);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Room Design</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="roomDetails.css">
</head>
<body>
<div class="navbar">
        <div class="logo">
            <img src="../photos/Screenshot_2024-10-28_000155-removebg-preview.png" alt="logo">
        </div>
        <nav>
            <ul>
            <li><a href="homepage.php">Home</a></li> 
                <li><a href="rooms.php"id="roomLink">Rooms</a></li>
                <li><a href="#footer">Contact us</a></li> 
                <li><a href="aboutUs.php" id="aboutLink">About</a></li>

            </ul>
        </nav>
        <div class="user-icon">
        <a href="profile3.php">
        <img src="../photos/profileHome-removebg-preview.png" alt="A person icon">
        </a>        </div>
    </div>
    <div class="container">
    <div class="image-slider">
        <?php
        // Convert photos string to array
        $photos = !empty($room['roomphotos']) ? explode(',', $room['roomphotos']) : [];
        
        // Display each photo
        foreach ($photos as $index => $photo) {
            $photoPath = "../" . trim($photo);
            $activeClass = ($index === 0) ? 'active' : '';
            echo '<img class="' . $activeClass . '" src="' . htmlspecialchars($photoPath) . '" alt="Room Image ' . ($index + 1) . '">';
        }
        ?>
        <div class="arrows">
            <button id="prevBtn">❮</button>
            <button id="nextBtn">❯</button>
        </div>
    </div>

   

<!-- Update the room details section -->
<div class="room-details">
    <h2><?php echo htmlspecialchars($room['description']); ?></h2>
    <p><?php echo htmlspecialchars($room['detaileddescription']); ?></p>

    <h3>Room Facilities</h3>
    <div class="facilities">
        <?php if (hasAmenity($amenitiesArray, 'Balcony')): ?>
            <div><i class="fas fa-door-open"></i>Balcony</div>
        <?php endif; ?>
        
        <?php if (hasAmenity($amenitiesArray, 'Sofa Bed')): ?>
            <div><i class="fas fa-couch"></i>Sofa bed</div>
        <?php endif; ?>
        
        <?php if (hasAmenity($amenitiesArray, 'Iron')): ?>
            <div><i class="fas fa-tshirt"></i>Iron</div>
        <?php endif; ?>
        
        <?php if (hasAmenity($amenitiesArray, 'Non Smoking')): ?>
            <div><i class="fas fa-smoking-ban"></i>Non-Smoking</div>
        <?php endif; ?>
        
        <?php if (hasAmenity($amenitiesArray, 'Air conditioning')): ?>
            <div><i class="fas fa-wind"></i>Air conditioning</div>
        <?php endif; ?>
        
        <?php if (hasAmenity($amenitiesArray, 'Free Wi-Fi')): ?>
            <div><i class="fas fa-wifi"></i>Free Wi-Fi</div>
        <?php endif; ?>
        
        <?php if (hasAmenity($amenitiesArray, 'Laundry Service')): ?>
            <div><i class="fas fa-soap"></i>Laundry Service</div>
        <?php endif; ?>
        
        <div><i class="fas fa-bed"></i><?php echo htmlspecialchars($room['capacity']); ?> Beds</div>
    </div>

    <h3>Additional Services</h3>
    <div class="amenities">
        <div>
            <span class="service-name"><i class="fas fa-utensils"></i> All Inclusive</span>
            <span class="price">$<?php echo number_format($room['price'] * 1.5, 2); ?></span>
            <i class="fas fa-plus"></i>
        </div>
        <div>
            <span class="service-name"><i class="fas fa-clipboard-list"></i> Full Board</span>
            <span class="price">$<?php echo number_format($room['price'] * 1.2, 2); ?></span>
            <i class="fas fa-plus"></i>
        </div>
        <div>
            <span class="service-name"><i class="fas fa-concierge-bell"></i> Half Board</span>
            <span class="price">$<?php echo number_format($room['price'] * 1.1, 2); ?></span>
            <i class="fas fa-plus"></i>
        </div>
        <div>
            <span class="service-name"><i class="fas fa-coffee"></i> Breakfast Only</span>
            <span class="price">$<?php echo number_format($room['price'], 2); ?></span>
            <i class="fas fa-plus"></i>
        </div>
    </div>

    <div id="totalPrice" style="margin-top: 20px; font-size: 18px; color: #9B7848; font-weight: bold;">
        Base Price: $<?php echo number_format($room['price'], 2); ?>
    </div>

    <a href="booking-payment.php?room_id=<?php echo $roomId; ?>" id="bookNowBtn" class="book-now-btn">Book Now</a>

        </div>
        </div>
        <footer id="footer">
    <div class="f_container">
        <div class="footer-col">
            <h2 class="name">The Royal Palm</h2>
            <p class="footer-para">Welcome to our luxury hotel, where comfort meets elegance. Enjoy your stay with top-notch facilities and personalized service.</p>
        </div>
        <div class="footer-col">
            <h3 class="text-office">
                Contact Us
                <div class="underline"><span></span></div>
            </h3>
            <p class="email">reservations@theroyalpalm.com</p>
            <p class="phone">+20 101 234 5678</p>
        </div>
        <div class="footer-col">
            <h3>
                Quick Links
                <div class="underline"><span></span></div>
            </h3>
            <ul>
                <li><a href="homepage.php">Home</a></li>
                <li><a href="#">Rooms & Suites</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="#contactFooter">Contact Us</a></li> <!-- Updated link here -->
            </ul>
        </div>
        <div class="footer-col">
            <h3>
                Newsletter
                <div class="underline"><span></span></div>
            </h3>
            <form action="">
                <i class="fa-solid fa-envelope"></i>
                <input type="text" placeholder="Enter Your Email">
                <a href=""><i class="fa-solid fa-arrow-right"></i></a>
            </form>
            <div class="social-icons">
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
            </div>
        </div>
    </div>
</footer>


    <script>
        const images = document.querySelectorAll(".image-slider img");
        let currentIndex = 0;

        document.getElementById("nextBtn").addEventListener("click", () => {
            images[currentIndex].classList.remove("active");
            currentIndex = (currentIndex + 1) % images.length;
            images[currentIndex].classList.add("active");
        });

        document.getElementById("prevBtn").addEventListener("click", () => {
            images[currentIndex].classList.remove("active");
            currentIndex = (currentIndex - 1 + images.length) % images.length;
            images[currentIndex].classList.add("active");
        });
        const amenities = document.querySelectorAll(".amenities div i.fa-plus");
        const totalPriceElement = document.getElementById("totalPrice");
        let totalPrice = 0;

        amenities.forEach((plusIcon) => {
            plusIcon.addEventListener("click", () => {
                const priceText = plusIcon.previousElementSibling.textContent;
                const price = parseInt(priceText.replace("$", ""));
                totalPrice += price;
                totalPriceElement.textContent = `Total Price: $${totalPrice}`;
            });
        });
        bookNowBtn.addEventListener("click", (event) => {
            event.preventDefault(); // Prevent default link behavior
            window.location.href = "booking-payment.php"; // Redirect to payment.php
        });
          // Room slider functionality
          const roomSlider = document.querySelector('.room-slider');
        const roomCards = document.querySelectorAll('.room-card');
        let currentRoomIndex = 0;

        document.getElementById('nextRoomBtn').addEventListener('click', () => {
            if (currentRoomIndex < roomCards.length - 1) {
                currentRoomIndex++;
            } else {
                currentRoomIndex = 0; // Loop back to the start
            }
            updateRoomSlider();
        });

        document.getElementById('prevRoomBtn').addEventListener('click', () => {
            if (currentRoomIndex > 0) {
                currentRoomIndex--;
            } else {
                currentRoomIndex = roomCards.length - 1; // Loop to the end
            }
            updateRoomSlider();
        });

        function updateRoomSlider() {
            const offset = -(currentRoomIndex * (roomCards[0].offsetWidth + 20)); // 20 is the margin
            roomSlider.style.transform = `translateX(${offset}px)`;
        }
        document.getElementById('aboutLink').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default link behavior
        window.location.href = 'aboutUs.php'; // Navigate to AboutUs.php
    });
    document.getElementById('homeLink').addEventListener('click', function(event) {
        event.preventDefault();
        window.location.href = 'homepage.php';
    });
    document.getElementById('roomLink').addEventListener('click', function(event) {
        event.preventDefault();
        window.location.href = 'room.php';
    });
    </script>
</body>
</html>
