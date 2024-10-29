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
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f1eee7;
            overflow:auto;
        }

        .container {
            display: flex;
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #f1eee7;
        }

        .image-slider {
            flex: 1;
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .image-slider img {
            width: 100%;
            height: 100%;
            border-radius: 10px;
            display: none; /* Hide all images initially */
        }

        .image-slider img.active {
            display: block; /* Show only the active image */
        }

        .arrows {
            position: absolute; /* Position arrows absolutely */
            top: 50%; /* Center vertically */
            width: 100%; /* Full width */
            display: flex;
            justify-content: space-between; /* Space out the buttons */
            transform: translateY(-50%); /* Adjust for exact centering */
            padding: 0 20px; /* Add padding for better placement */
            z-index: 1; /* Ensure arrows are above images */
        }

        .arrows button {
    color: #f1eee7; /* Change color if needed */
    border: none; /* Remove border */
    cursor: pointer;
    padding: 5px; /* Remove padding for smaller size */
    margin: 0; /* Remove margin */
    font-size: 40px; /* Adjust font size as needed */
    background-color: transparent; /* Make background transparent */
    transition: color 0.3s ease; /* Add hover transition effect */
}
.arrows button:hover {
    color: #9B7848; /* Change color on hover */
}
        .room-details {
            flex: 1;
            padding-left: 20px;
        }

        .room-details h2, .room-details h3 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #9B7848;
        }

        .room-details p {
            font-size: 16px;
            color: #1F4A54;
        }

        .facilities {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 15px;
        }

        .facilities div {
            display: flex;
            align-items: center;
            gap: 8px;
            background-color: #e9e9e9;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 14px;
            color: #1F4A54;
            border: 1px solid #ddd;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .facilities div i {
            color: #9B7848;
            font-size: 18px;
        }

        .amenities {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 15px;
            color: #1F4A54;
        }

        .amenities div {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #e9e9e9;
            padding: 10px;
            border-radius: 5px;
            font-size: 14px;
        }

        .amenities div .service-name {
            display: inline-block;
            min-width: 200px;
            font-weight: bold;
            margin-right: 10px;
        }

        .amenities div .price {
            margin-right: 20px;
            font-weight: bold;
        }

        .amenities div i {
            color: #9B7848;
        }

        .book-now-btn {
            margin-top: 20px;
            display: block;
            text-align: center;
            background-color: #9B7848;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 18px;
            text-transform: uppercase;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .book-now-btn:hover {
            background-color: #785F3A;
        }
        .navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #9b7848;
    padding: 0px;
    position: sticky;
    top: 0;
    z-index: 1000;
    height: 60px;
}

.navbar .logo {
            display: flex; 
            align-items: center; 
        }

        .navbar .logo img {
            width: auto;  
            height: 70px;  
            margin-right: 20px; 
        }
.navbar nav ul {
    list-style: none;
    display: flex;
}

.navbar nav ul li {
    margin: 0 10px;
    
}

.navbar nav ul li a {
    color: #fff;
    text-decoration: none;
    text-transform: uppercase;
    padding: 10px 15px;
    transition: background-color 0.3s ease;
}

.navbar nav ul li a:hover {
    color: black;
    border-radius: 5px;
}

.user-icon {
    width: 25px; 
    height: 25px; 
    border-radius: 50%; 
    display: flex;
    justify-content: center; 
    align-items: center; 
    transition: background-color 0.3s ease, color 0.3s ease; 
    margin-left: 10px; 
}
.user-icon:hover {
  background-color: lightgray;
}
.user-icon img {
    width: 100%; /* Make the image fit the circle */
    height: 100%; 
    object-fit: cover; /* Ensure the image covers the entire circle */
}
h1 {
            text-align: center; /* Center the text horizontally */
            margin: 20px 0; /* Add some margin to the top and bottom */
            font-size: 36px; /* Adjust the font size as needed */
            color: #9B7848; /* Change the color if desired */
        }

        .more-rooms {
            max-width: 1200px;
            margin: 50px auto;
            display: flex;
            overflow: hidden; /* Hide overflow to create sliding effect */
            position: relative; /* Position relative for absolute children */
        }

        .room-slider {
            display: flex;
            transition: transform 0.3s ease; /* Smooth sliding transition */
        }

        .room-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            width: 300px; /* Fixed width for room cards */
            margin-right: 20px; /* Space between cards */
            flex: none; /* Prevent flex shrinking */
        }

        .room-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .room-info {
            padding: 15px;
        }

        .room-info h3 {
            font-size: 22px;
            color: #9B7848;
            margin-bottom: 10px;
        }

        .room-info p {
            font-size: 16px;
            color: #1F4A54;
            margin-bottom: 15px;
        }

        .details-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #9B7848;
            color: white;
            text-transform: uppercase;
            font-size: 16px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .details-btn:hover {
            background-color: #785F3A;
        }

        .slider-buttons {
            position: absolute;
            top: 50%;
            left: 10px;
            right: 10px;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
            z-index: 1;
        }

        .slider-buttons button {
            background color: #f1eee7;;
            border: none;
            padding: 10px;
            cursor: pointer;
            font-size: 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
            color:#9B7848
        }

        
        footer{
            background: linear-gradient(to right, #9b7848, #c5b394);
            border-top-left-radius: 100px;
            padding-bottom: 50px; 
        }

        footer *{
            color: white;
        }

        .f_container{
            display: flex;
            justify-content: space-between;
            padding: 50px 7%;
        }

        .footer-col{
            width: 25%;
        }

        .footer-col h2{
            font-optical-sizing: 1.7em;
            text-transform: uppercase;
            margin-bottom: 20px;
        }

        p.email{
            margin: 12px 0px;
        }

        p.phone{
            font-size: 15px;
            font-weight: 400;
        }

        .footer-col .text-office{
            margin-bottom: 20px;
        }
        .underline{
            width: 70px;
            height: 3px;
            position: relative;
            background-color: white;
            border-radius: 3px;
            overflow: hidden;
        }

        .underline span{
            width: 7px;
            height: 100%;
            position: absolute;
            left: 10px;
            background-color: rgb(63,63,63);
            border-radius: 3px;
            animation: moving 1.5s linear infinite;
        }

        @keyframes moving {
            0%{
                left: -20px;
 }
            100%{
                left: 100%;
            }
        }

        .footer-col ul{
            list-style-type: none;
            padding-top: 10px;
        }

        .footer-col ul li{
            margin: 10px;
        }

        .footer-col form{
            margin-top: 20px;
            border-bottom: 1px solid white;
            padding-bottom: 10px;
            display: flex;
        }

        .footer-col form input{
            width: 70%;
            background: transparent;
            border: none;
            outline: none;
            padding-left: 10px;
        }

        .footer-col form i{
            font-size: 15px;
        }

        .footer-col .social-icons{
            margin-top: 20px;
        }

        .footer-col .social-icons i{
            padding: 10px;
            background-color: white;
            color: #00093c;
            border-radius: 50%;
            margin: 5px;
        }

        .footer-para{
            max-width: 225px;
        }
        .name{
            margin:-3px;
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
<div class="navbar">
        <div class="logo">
            <img src="icon.png" alt="logo">
        </div>
        <nav>
            <ul>
            <li><a href="homepage.php">Home</a></li> 
                <li><a href="#"id="roomLink">Rooms</a></li>
                <li><a href="#contactFooter">Contact us</a></li> 
                <li><a href="#" id="aboutLink">About</a></li>

            </ul>
        </nav>
        <div class="user-icon">
            <img src="user.jpg" alt="User Icon">
        </div>
    </div>
    <div class="container">
        <div class="image-slider">
            <img class="active" src="room1.jpg" alt="Room Image 1">
            <img src="room2.jpg" alt="Room Image 2">
            <img src="room3.jpg" alt="Room Image 3">
            <img src="room4.jpg" alt="Room Image 4">

            <div class="arrows">
                <button id="prevBtn">❮</button>
                <button id="nextBtn">❯</button>
            </div>
        </div>

        <div class="room-details">
            <h2>Twin Guest Room with Nile View</h2>
            <p>
                River Nile views, private balcony, work desk, mini bar, seating area.
                Enjoy the breathtaking view of the River Nile from this stylish room with twin beds, and a range of convenient amenities. 
            </p>

            <h3>Room Facilities</h3>
            <div class="facilities">
                <div><i class="fas fa-bed"></i>3 Beds</div>
                <div><i class="fas fa-door-open"></i>Balcony</div>
                <div><i class="fas fa-tshirt"></i>Iron</div>
                <div><i class="fas fa-smoking-ban"></i>Non-Smoking</div>
                <div><i class="fas fa-couch"></i>Sofa bed</div>
                <div><i class="fas fa-wind"></i>Air conditioning</div>
                <div><i class="fas fa-wifi"></i>Free Wi-Fi</div>
                <div><i class="fas fa-soap"></i>Laundry Service</div>
            </div>

            <h3>Additional Services</h3>
            <div class="amenities">
                <div>
                    <span class="service-name"><i class="fas fa-utensils"></i> All Inclusive</span>
                    <span class="price">$150</span>
                    <i class="fas fa-plus"></i>
                </div>
                <div>
                    <span class="service-name"><i class="fas fa-clipboard-list"></i> Full Board</span>
                    <span class="price">$120</span>
                    <i class="fas fa-plus"></i>
                </div>
                <div>
                    <span class="service-name"><i class="fas fa-concierge-bell"></i> Half Board</span>
                    <span class="price">$100</span>
                    <i class="fas fa-plus"></i>
                </div> 
                <div>
                    <span class="service-name"><i class="fas fa-coffee"></i> Breakfast Only</span>
                    <span class="price">$50</span>
                    <i class="fas fa-plus"></i>
                </div>
                <div>
                    <span class="service-name"><i class="fas fa-paw"></i> Pets Allowed</span>
                    <span class="price">$30</span>
                    <i class="fas fa-plus"></i>
                </div>
                <div>
                    <span class="service-name"><i class="fas fa-bed"></i> Extra Bed</span>
                    <span class="price">$40</span>
                    <i class="fas fa-plus"></i>
                </div>
            </div>
            <div id="totalPrice" style="margin-top: 20px; font-size: 18px; color: #9B7848; font-weight: bold;">
                Total Price: $0
            </div>

          

            <a href="#" id="bookNowBtn" class="book-now-btn">Book Now</a>


        </div>
    </div>
    <h1>More Rooms</h1>
    <div class="more-rooms">
        <div class="room-slider">
            <div class="room-card">
                <img src="room1.jpg" alt="Room 1">
                <div class="room-info">
                    <h3>Luxury Room</h3>
                    <p>Enjoy a relaxing stay in our luxurious room with modern amenities.</p>
                    <a href="#" class="details-btn">Details</a>
                </div>
            </div>
            <div class="room-card">
                <img src="room2.jpg" alt="Room 2">
                <div class="room-info">
                    <h3>Deluxe Suite</h3>
                    <p>Spacious suite with a beautiful view and all the comforts of home.</p>
                    <a href="#" class="details-btn">Details</a>
                </div>
            </div>
            <div class="room-card">
                <img src="room3.jpg" alt="Room 3">
                <div class="room-info">
                    <h3>Executive Room</h3>
                    <p>Perfect for business travelers, with a dedicated work area.</p>
                    <a href="#" class="details-btn">Details</a>
                </div>
            </div>
            <div class="room-card">
                <img src="room4.jpg" alt="Room 4">
                <div class="room-info">
                    <h3>Family Suite</h3>
                    <p>Spacious family suite with plenty of room for everyone.</p>
                    <a href="#" class="details-btn">Details</a>
                </div>
            </div>
            <div class="room-card">
                <img src="room1.jpg" alt="Room 1">
                <div class="room-info">
                    <h3>Luxury Room</h3>
                    <p>Enjoy a relaxing stay in our luxurious room with modern amenities.</p>
                    <a href="#" class="details-btn">Details</a>
                </div>
            </div>
            <div class="room-card">
                <img src="room2.jpg" alt="Room 2">
                <div class="room-info">
                    <h3>Deluxe Suite</h3>
                    <p>Spacious suite with a beautiful view and all the comforts of home.</p>
                    <a href="#" class="details-btn">Details</a>
                </div>
            </div>
            <div class="room-card">
                <img src="room3.jpg" alt="Room 3">
                <div class="room-info">
                    <h3>Executive Room</h3>
                    <p>Perfect for business travelers, with a dedicated work area.</p>
                    <a href="#" class="details-btn">Details</a>
                </div>
            </div>
            <div class="room-card">
                <img src="room4.jpg" alt="Room 4">
                <div class="room-info">
                    <h3>Family Suite</h3>
                    <p>Spacious family suite with plenty of room for everyone.</p>
                    <a href="#" class="details-btn">Details</a>
                </div>
            </div>
            <div class="room-card">
                <img src="room1.jpg" alt="Room 1">
                <div class="room-info">
                    <h3>Luxury Room</h3>
                    <p>Enjoy a relaxing stay in our luxurious room with modern amenities.</p>
                    <a href="#" class="details-btn">Details</a>
                </div>
            </div>
            <div class="room-card">
                <img src="room2.jpg" alt="Room 2">
                <div class="room-info">
                    <h3>Deluxe Suite</h3>
                    <p>Spacious suite with a beautiful view and all the comforts of home.</p>
                    <a href="#" class="details-btn">Details</a>
                </div>
            </div>
            <div class="room-card">
                <img src="room3.jpg" alt="Room 3">
                <div class="room-info">
                    <h3>Executive Room</h3>
                    <p>Perfect for business travelers, with a dedicated work area.</p>
                    <a href="#" class="details-btn">Details</a>
                </div>
            </div>
            <div class="room-card">
                <img src="room4.jpg" alt="Room 4">
                <div class="room-info">
                    <h3>Family Suite</h3>
                    <p>Spacious family suite with plenty of room for everyone.</p>
                    <a href="#" class="details-btn">Details</a>
                </div>
            </div>
        </div>
        <div class="slider-buttons">
            <button id="prevRoomBtn">❮</button>
            <button id="nextRoomBtn">❯</button>
        </div>
    </div>
    <footer id="contactFooter">
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
            window.location.href = "payment.php"; // Redirect to payment.php
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
        window.location.href = 'AboutUs.php'; // Navigate to AboutUs.php
    });
    document.getElementById('homeLink').addEventListener('click', function(event) {
        event.preventDefault();
        window.location.href = 'homepage.php';
    });
    document.getElementById('roomLink').addEventListener('click', function(event) {
        event.preventDefault();
        window.location.href = 'roompage.php';
    });
    </script>
</body>
</html>
