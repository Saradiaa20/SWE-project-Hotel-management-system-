<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Rooms - The Royal Palm</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="Rooms.css">
</head>

<body>
    <header>
        <div class="navbar">
            <div class="logo">
                <img src="pics/Screenshot_2024-10-28_000155-removebg-preview.png" alt="logo">
            </div>
            <nav>
                <ul>
                    <li><a href="homepage.php">Home</a></li>
                    <li><a href="rooms.php">Rooms</a></li>
                    <li><a href="#footer">Contact Us</a></li>
                    <li><a href="aboutUs.php">About</a></li>
                </ul>
            </nav>
            <div class="user-icon">
                <a href="profile3.php">
                    <img src="../views/Photos/profileHome-removebg-preview.png" alt="A person icon">
                </a>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="filter-buttons">
            <button class="filter-button active" onclick="filterRooms('all')">All</button>
            <button class="filter-button" onclick="filterRooms('classic')">Classic</button>
            <button class="filter-button" onclick="filterRooms('deluxe')">Deluxe</button>
            <button class="filter-button" onclick="filterRooms('premier')">Premier</button>
            <button class="filter-button" onclick="filterRooms('ada')">ADA</button>
        </div>

        <?php
        require_once('../config/config.php');
        require_once('../models/RoomsModel.php');
        require_once('../controllers/RoomsController.php');

        // Initialize room model and controller
        $roomModel = new Room($pdo);
        $roomController = new RoomController($roomModel);

        // Get only available rooms (not reserved)
        $response = $roomController->getAvailableRooms(); // Make sure to add this method to your controller
        ?>

        <div class="room-list">
            <?php
            if ($response['success'] && !empty($response['data'])) {
                foreach ($response['data'] as $room) {
                    // Get all photos from the comma-separated list
                    $photos = explode(',', $room['roomphotos']);
                    $photos = array_map(function($photo) {
                        return "../" . trim($photo);
                    }, $photos);
                    
                    $photosJson = json_encode($photos);
                    $roomClass = strtolower($room['room_type']);
                    ?>
                    
                    <div class="room-card <?php echo $roomClass; ?>">
                        <div class="swiper room-swiper">
                            <div class="swiper-wrapper">
                                <?php foreach ($photos as $photo): ?>
                                    <div class="swiper-slide">
                                        <img src="<?php echo htmlspecialchars($photo); ?>" 
                                             alt="<?php echo htmlspecialchars($room['room_type']); ?>" 
                                             class="room-image">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-pagination"></div>
                        </div>
                        <h3><?php echo htmlspecialchars($room['room_type'] . ' Room'); ?></h3>
                        <p><?php echo htmlspecialchars($room['description']); ?></p>
                        <div class="room-buttons">
                            <a href="roomDetails.php?id=<?php echo $room['id']; ?>">
                                <button class="view-room">View Room</button>
                            </a>
                            <button class="book-now">Book Now</button>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo '<p class="no-rooms">No available rooms at the moment. Please try again later.</p>';
            }
            ?>
        </div>
    </div>

    <script>
    function filterRooms(type) {
        var buttons = document.querySelectorAll('.filter-button');
        buttons.forEach(button => button.classList.remove('active'));

        var selectedButton = document.querySelector(`button[onclick="filterRooms('${type}')"]`);
        if (selectedButton) {
            selectedButton.classList.add('active');
        }

        var rooms = document.querySelectorAll('.room-card');
        rooms.forEach(room => {
            if (type === 'all' || room.classList.contains(type)) {
                room.style.display = 'block';
            } else {
                room.style.display = 'none';
            }
        });
    }
    </script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const swipers = document.querySelectorAll('.room-swiper');
        swipers.forEach(swiperElement => {
            new Swiper(swiperElement, {
                loop: true,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
            });
        });
    });
    </script>
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
                    <li><a href="rooms.php">Rooms & Suites</a></li>
                    <li><a href="aboutUs.php">About Us</a></li>
                    <li><a href="#footer">Contact Us</a></li>
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
</body>
</html>