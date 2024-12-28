<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>complete responsive hotel booking website design tutorial</title> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="Rooms.css">

    <!-- custom css file link  -->
    <script>
        function openPopup() {
            var popupWindow = window.open('popup.php', 'popup', 'width=600,height=400');
            if (!popupWindow) {
                alert('Popup blocked! Please allow popups for this website.');
            }
        }
    </script>
   


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
    <section class="availability" id="availability">

        <form action="" method="post" onsubmit="return validateDates();">
            <div class="flex">

                <div class="box">
                    <p>check in <span>*</span></p>
                    <input type="date" name="check_in" id="check_in" class="input" required>
                </div>

                <div class="box">
                    <p>check out <span>*</span></p>
                    <input type="date" name="check_out" id="check_out" class="input" required>
                </div>

                <div class="box">
                    <p>adults <span>*</span></p>
                    <div class="input-number">
                        <button type="button" onclick="changeValue('adults', -1)">-</button>
                        <input type="number" name="adults" id="adults" class="input" value="1" min="1" max="20"
                            required>
                        <button type="button" onclick="changeValue('adults', 1)">+</button>
                    </div>
                </div>


                <div class="box">
                    <p>children <span>*</span></p>
                    <div class="input-number">
                        <button type="button" onclick="changeValue('children', -1)">-</button>
                        <input type="number" name="children" id="children" class="input" value="0" min="0" max="20"
                            required>
                        <button type="button" onclick="changeValue('children', 1)">+</button>
                    </div>
                </div>


                <div class="box">
                    <p>rooms <span>*</span></p>
                    <input type="number" name="rooms" class="input" placeholder="Number of rooms" min="1" max="10"
                        required>
                </div>


                <div class="box">
                    <p>room type <span>*</span></p>
                    <select name="room_type" class="input" required>
                        <option value="Standard">Standard</option>
                        <option value="Deluxe">Deluxe</option>
                        <option value="Suite">Suite</option>
                        <option value="Family">Family</option>
                        <option value="Penthouse">Penthouse</option>
                    </select>
                </div>

                <div class="box">
    <p>Price Range</p>
    <div class="price-range-wrapper">
        <input type="range" id="min_price" name="min_price" class="input" min="500" max="20000" step="10" value="500" oninput="updatePriceDisplay()">
        <span id="min_price_display">500</span> USD
        <input type="range" id="max_price" name="max_price" class="input" min="500" max="20000" step="10" value="20000" oninput="updatePriceDisplay()">
        <span id="max_price_display">20000</span> USD
    </div>
</div>



            </div>

            <input type="submit" value="check availability" name="check" class="btn">
        </form>

    </section>














    <div class="container">
        <div class="filter-buttons">
            <button class="filter-button active" onclick="filterRooms('all')">All</button>
            <button class="filter-button" onclick="filterRooms('classic')">Classic</button>
            <button class="filter-button" onclick="filterRooms('deluxe')">Deluxe</button>
            <button class="filter-button" onclick="filterRooms('premier')">Premier</button>
            <button class="filter-button" onclick="filterRooms('ada')">ADA</button>
        </div>

        <?php
// Add this at the top of Rooms.php after the existing requires
require_once('../config/config.php');
require_once('../models/RoomsModel.php');
require_once('../controllers/RoomsController.php');

// Initialize room model and controller
$roomModel = new Room($pdo);
$roomController = new RoomController($roomModel);

// Get all rooms
$response = $roomController->getAllRooms();
?>

<!-- Replace the existing room-list div with this code -->
<div class="room-list">
    <?php
    if ($response['success']) {
        foreach ($response['data'] as $room) {
            // Get all photos from the comma-separated list
            $photos = explode(',', $room['roomphotos']);
            $photos = array_map(function($photo) {
                return "../" . trim($photo);
            }, $photos);
            
            // Convert photos array to JSON for JavaScript
            $photosJson = json_encode($photos);
            
            // Determine room class based on room type
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
                    <!-- Add Navigation -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <!-- Add Pagination -->
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
        echo '<p>No rooms available.</p>';
    }
    ?>
</div>




    <script>
    function filterRooms(type) {
        var buttons = document.querySelectorAll('.filter-button');
        buttons.forEach(button => button.classList.remove('active'));

        var selectedButton = document.querySelector(filter-button[onclick="filterRooms('${type}')"]);
        selectedButton.classList.add('active');

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
    let slideIndex = 0;
    let autoPlay;

    function plusSlides(n) {
        clearInterval(autoPlay);
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        clearInterval(autoPlay);
        showSlides(slideIndex = n - 1);
    }

    function showSlides(n) {
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        if (n >= slides.length) {
            slideIndex = 0;
        }
        if (n < 0) {
            slideIndex = slides.length - 1;
        }
        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (let i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex].style.display = "block";
        dots[slideIndex].className += " active";
    }

    function startAutoPlay() {
        autoPlay = setInterval(() => {
            slideIndex++;
            showSlides(slideIndex);
        }, ); 
    }

    document.addEventListener("DOMContentLoaded", () => {
        showSlides(slideIndex);
        // startAutoPlay();
    });
    </script>

    <script>
       
function changeValue(id, delta) {
    const input = document.getElementById(id);
    let value = parseInt(input.value, 10);
    let min = parseInt(input.min, 10);
    let max = parseInt(input.max, 10);
    
   
    value += delta;
    if (value >= min && value <= max) {
        input.value = value;
    }
}


function updatePriceDisplay() {
    const minPrice = document.getElementById('min_price').value;
    const maxPrice = document.getElementById('max_price').value;

    
    if (parseInt(minPrice) > parseInt(maxPrice)) {
        document.getElementById('min_price').value = maxPrice;
    }
    
    document.getElementById('min_price_display').innerText = document.getElementById('min_price').value;
    document.getElementById('max_price_display').innerText = document.getElementById('max_price').value;
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
    </script>
    <!--footer part-->
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