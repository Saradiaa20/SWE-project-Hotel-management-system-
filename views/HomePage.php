<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Royal Palm</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="../public/css/Rooms.css">
    <style>
    
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
    background: #1F4A54;
}
      * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

html,
body {
    margin: 0;
    padding: 0;
    height: 100%;

}

html {
    overflow-x: hidden;
    scroll-behavior: smooth;
}

body {
    background-color: #f1eee7;
}

/* Nav bar style */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #9b7848; 
    padding: 15px;
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

.page {
    position: relative;
    text-align: center;
}
.page-text { position: absolute;
     top: 50%;
      left: 50%;
       transform: translate(-50%, -50%);
     }

/* SlideShow Style */
        .swiper {
    margin: 0; 
    padding: 0;
    position: relative; 
    z-index: 1;
}

.swiper-slide {
    position: relative;
}
        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: f1eee7;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 80%; 
            object-fit: cover;
        }



        /*search bar*/
        .ch_container {
    max-width: 1200px;
    margin: -42px auto 0; /*ely btkhleh ytl3 fo2*/
    padding: 0;
    background-color: #9b7848;
    border-radius:3px;
    position: relative; 
    z-index: 10; 
}
.booking-form {
    background-color: #9b7848;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2), 0 4px 15px rgba(0, 0, 0, 0.1);
    padding: 30px; 
    border-radius: 8px; 
}
        .form-group {
            flex-direction: column;
            width: 18%; 
            margin-right: 15px; 
        }

        .form-group:last-child {
            margin-right: 0; 
        }

        .form-label {
            font-weight: 600;
            margin-bottom: 5px;
            color: white; 
        }

        .form-control, .form-select {
            width: 100%;
            padding: 10px; 
            border: 1px solid #ccc;
            border-radius: 7px;
            font-size: 18px; 
            color: black;
            background-color: white;
        }

        /* Button Styles */
        .btn {
            background-color: #d7c8a5;
            color: black; 
            padding: 12px 20px;
            border: none;
            font-weight: bold; /
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
    background-color: #c5b394; 
    transform: scale(1.05); 
    transition: all 0.2s ease-in-out; 
}
     
        .form-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%; 
            gap: 15px; 
        }

        .form-row .form-group {
            flex: 1;
        }

        /* Button on the right side */
        .form-group-button {
            align-self: flex-end; 

        }

        /* Adjustments for smaller screens */
        @media (max-width: 768px) {
            .form-row {
                flex-direction: column;
            }

            .form-group {
    flex: 1; 
    min-width: 150px;
}


            .form-group-button {
                justify-content: center;
                width: 100%;
            }
        }


      /*advantages part style*/
        .dark-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6); 
            z-index: -1;
        }
        .advantages-section {
            position: relative;
            text-align: center;
            color: white;
            padding: 80px 50px;
            min-height: 60vh;
        }
        .background-image img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }
        .advantages-section h2 {
            font-size: 1.5em;
            margin-bottom: 10px;
            color: #bbb;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        .advantages-section h1 {
            font-size: 3em;
            margin-bottom: 50px;
 }
        .advantages-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            z-index: 1; /* Ensures the content is above the background */
            position: relative;
        }
        .advantage-item {
    display: flex;
    align-items: center;
    padding: 20px;
    border-radius: 8px;
    transition: transform 0.3s, background-color 0.3s ease, color 0.3s ease; 
    color: #fff; 
}
        .advantage-item h3, .advantage-item p {
    transition: color 0.3s ease; 
    color: #fff;
}
        .advantage-item:hover {
            color: #333;
    transform: scale(1.05);
    background-color: rgba(241, 238, 231, 0.9); 
}
.advantage-item:hover h3, .advantage-item:hover p {
    color: #333; 
}
 .advantage-item img {       
            width: 50px;
            height: 50px;
            margin-right: 20px; /* Space between the icon and text */
        }
        .advantage-item h3 {
            font-size: 1.5em;
            margin-bottom: 10px;
            color: #fff;
        }
        .advantage-item p {
            font-size: 1em;
            color: #ccc;
            line-height: 1.6;
        }


        /* Responsive Design */
        @media (max-width: 768px) {
            .advantages-grid {
                grid-template-columns: 1fr;
            }

            .advantage-item {
                flex-direction: column;
                text-align: center;
            }

            .advantage-item img {
                margin-right: 0;
                margin-bottom: 15px;
            }
        }

        @media (max-width: 1024px) {
            .advantages-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        /* Rooms & Suites Section */




        .r_container {
            display: flex; 
            align-items: center; 
            width: 80%;
            max-width: 1200px;
            height: 400px;
            gap: 200px; 
            margin: 50px auto;
        }

        .r_content {
            color: black;
            padding: 20px;
            border-radius: 10px;
            max-width: 250px; 
        }

        .r_content h2 {
            font-size: 24px; 
            margin-right:20px;
            color:#9b7848;
        }
        .r_content p{
            font-size: 16px; 
             padding-top: px; 

        }
        .r_container img{
            width: 50%;
            height: 100%;
            object-fit: cover;
            border-radius: 1px;
            max-width: 60%; 
        }



                /* Hotel Services Section  */


                /* General section styles */
                .services-section {
            text-align: center;
            padding: 50px 20px;
            background-color: #f1eee7;
        }
        .services-section h2 {
            font-size: 3em; 
            margin-bottom: 20px;
            color: #9b7848; /* Main heading color */
        }
        .services-section p {
            font-size: 1.3em;
            color: #555;
            margin-bottom: 40px;
        }

        .services-grid {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 30px; 
            max-width: 1300px;
            margin: 0 auto;
        }

        .service-card {
            background: white;
            border-radius: 15px; 
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15); 
            overflow: hidden;
            transition: transform 0.3s;
            flex: 1;
            min-width: 300px; 
            max-width: 350px; 
        }
        .service-card:hover {
            transform: scale(1.05);
        }

        .service-card img {
            width: 100%;
            height: 250px; 
            object-fit: cover; 
        }

        .service-card h3 {
            font-size: 1.8em;
            margin: 20px 0;
            color: #9b7848; 
        }
        .service-card p {
            padding: 0 20px;
            color: #555;
            margin-bottom: 20px;
        }




/*footerstyle*/

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
    </style>
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo">
                <img src="../public/images/logo.png" alt="logo">
            </div>
            <nav>
                <ul>
                    <li><a href="HomePage.php">Home</a></li>
                    <li><a href="Rooms.php">Rooms</a></li>
                    <li><a href="#footer">Contact Us</a></li>
                    <li><a href="#">About</a></li>
                </ul>
            </nav>
            <div class="user-icon">
                <img src="../public/images/user.png" alt="A person icon">
            </div>
        </div>
    </header>

    <!-- Swiper Slider -->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <?php for($i = 1; $i <= 5; $i++): ?>
                <div class="swiper-slide">
                    <img src="../public/images/photo<?php echo $i; ?>.jpg" alt="Slide <?php echo $i; ?>">
                </div>
            <?php endfor; ?>
        </div>
        <div class="swiper-pagination"></div>
    </div>

    <!-- Booking Form -->
    <div class="ch_container">
        <div class="booking-form">
            <form action="check-availability.php" method="POST">
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Arrival Date</label>
                        <input type="date" name="arrival_date" class="form-control shadow-none" value="<?php echo date('Y-m-d'); ?>" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Departure Date</label>
                        <input type="date" name="departure_date" class="form-control shadow-none" value="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Rooms</label>
                        <select name="rooms" class="form-select shadow-none">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Adults</label>
                        <select name="adults" class="form-select shadow-none">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Children</label>
                        <select name="children" class="form-select shadow-none">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                    <div class="form-group-button">
    <button type="button" class="btn" onclick="window.location.href='AvRooms.php';">Check Availability</button>
</div>

                </div>
            </form>
        </div>
    </div>

    <!-- Rest of the sections with corrected image paths -->

    <!-- Continue with the rest of your HTML, replacing image paths -->
    <!-- For example: src="../public/images/thingstodo.jpg" -->
    
    <!-- Add all the other sections from your original HTML here -->
    <!-- Just make sure to update the image paths to use ../public/images/ -->
    <div class="r_container">
        <div class="r_content">
            <h2>Luxury Rooms & Suites</h2>
            <p>Experience comfort and elegance with our luxurious rooms and suites, offering breathtaking views and premium amenities.</p>
        </div>
        <img src="room.jpg" alt="room">
        </div>

           <!-- things to do -->
        <div class="r_container">
        <img src="thingstodo.jpg" alt="Large Room Image">
              <div class="r_content">
              <h2>Things to Do</h2>
              <p>Discover a wide array of activities and experiences, from local tours to luxurious spa treatments. Whether you're seeking adventure or relaxation, we offer something for every guest to enjoy.</p>
                </div> 
            </div>

   <!-- Dining & Drinks Section -->
   <div class="r_container">
        <div class="r_content">
            <h2>Dining & Drinks</h2>
            <p>Indulge in exquisite dining experiences with a variety of culinary options. Whether you're enjoying a gourmet meal or sipping a cocktail by the pool, we provide a taste for every palate.</p>        </div>
            <img src="resturant.jpg" alt="Dining Table">
            </div>

    <!-- Weddings Section -->
    <div class="r_container">
    <img src="weeding.jpg" alt="Wedding Venue">
    <div class="r_content">
               <h2>Weddings</h2>
                <p>Make your special day unforgettable with our stunning wedding venues. We offer a range of services, from intimate ceremonies to grand receptions, ensuring that your big day is perfect in every way.</p>
                </div> 
            </div>
    
    <!-- Events Section
    <div class="r_container">
        <div class="r_content">
        <h2>Events</h2>
        <p>Host memorable events with our exceptional event spaces. Whether it’s a business meeting, conference, or family reunion, our venues and services will ensure your event is a success.</p>
        </div>
 -->
   
    



 <!--advantages Section -->
 <div class="advantages-section">
    <div class="background-image">
    <img src="https://images.pexels.com/photos/338504/pexels-photo-338504.jpeg?cs=srgb&dl=pexels-thorsten-technoman-109353-338504.jpg&fm=jpg" alt="Background Image">
    <div class="dark-overlay"></div>
    </div>
    <h2>Why Choose The Royal Palm </h2>
    <h1>The Advantages</h1>
    <div class="advantages-grid">
        <div class="advantage-item">
            <img src="credit-card.png" alt="Price Icon">
            <div>
                <h3>Best Price Guarantee</h3>
                <p>Here and nowhere else we guarantee that you will find the best offers, prices, and excellent reservation's conditions.</p>
            </div>
        </div>
        <div class="advantage-item">
            <img src="calendar.png" alt="Calendar Icon">
            <div>
                <h3>Book Now to Secure Availability</h3>
                <p>Hurry up & book today at The Royal Palm to avoid missing the chance of scheduling your stay the way you prefer.</p>
            </div>
        </div>
        <div class="advantage-item">
            <img src="clock.png" alt="Clock Icon">
            <div>
                <h3>Late Check-out on Request</h3>
                <p>Ask us for our late-check out's strategies when you make your reservation to extend your stay as much as you want.</p>
            </div>
        </div>
        <div class="advantage-item">
            <img src="wifi.png" alt="WiFi Icon">
            <div>
                <h3>Free Wi-Fi Available</h3>
                <p>With high speed and free WiFi service for all our guests across The Royal Palm, we stand.</p>
            </div>
        </div>
        <div class="advantage-item">
            <img src="handshake.png" alt="Handshake Icon">
            <div>
                <h3>Meetings & Special Events</h3>
                <p>Select from comprehensive options of arrangements and business' facilities that we offer to make your event memorable and a success.</p>
            </div>
        </div>
        <div class="advantage-item">
            <img src="delete.png" alt="Cancel Icon">
            <div>
                <h3>Free Cancellation Anytime</h3>
                <p>With us, it is possible to cancel your reservation within the allowed timeframe entirely free of charge to make it easier and more comfortable for you.</p>
            </div>
        </div>
    </div>
</div>

<!-- Hotel Services Section -->
<div class="services-section">
        <h2>Discover Our Hotel Services</h2>
        <p>From luxurious spa treatments to gourmet dining experiences,The Royal Palm offers a range of services to ensure a memorable stay.</p>
        
        <div class="services-grid">
            <!-- Spa & Wellness -->
            <div class="service-card">
                <img src="https://media.istockphoto.com/id/913095166/photo/young-women-in-white-robes-relaxing-at-beauty-spa-centre.jpg?s=612x612&w=0&k=20&c=PDo9sd7HS7tVPL2F5toQY40uYs5RyW75GFT7qdjwZ4U=" alt="Spa & Wellness">
                <h3>Spa & Wellness</h3>
                <p>Indulge in a luxurious spa experience with our massage therapies, facials, and relaxation treatments.</p>
            </div>

            <!-- Fitness Center -->
            <div class="service-card">
                <img src="https://media.istockphoto.com/id/515238274/photo/modern-and-big-gym.jpg?s=612x612&w=0&k=20&c=E0sTLMBF5zUX5204SUwwCNf2vcRoAYp5CS60c2LvSKk=" alt="Fitness Center">
                <h3>Fitness Center</h3>
                <p>Our modern gym features top-of-the-line equipment to help you stay fit and energized during your stay.</p>
            </div>

            <!-- Fine Dining -->
            <div class="service-card">
                <img src="https://media.istockphoto.com/id/1399343460/photo/travel-woman-in-hat-eating-breakfast-is-served-with-eggs-sausage-coffee.jpg?s=612x612&w=0&k=20&c=8Ce62Q2jkMmDaAfTwZ0-m0OONmT3uu27hlw6JUNO1Oo=" alt="Fine Dining">
                <h3>Fine Dining</h3>
                <p>Savor a world-class dining experience with our selection of gourmet dishes and premium wines.</p>
            </div>

            <!-- Poolside Relaxation -->
            <div class="service-card">
                <img src="https://media.istockphoto.com/id/872320528/photo/young-asian-woman-relaxing.jpg?s=612x612&w=0&k=20&c=dYJhTXxgfm9F1xfS2uMehjzA9CY6dG5UMC5LqQXxoxU=" alt="Poolside Relaxation">
                <h3>Poolside Relaxation</h3>
                <p>Relax and soak up the sun by our luxurious pool, complete with poolside service and private cabanas.</p>
            </div>
        </div>
    </div>

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
                    <li><a href="#">Rooms & Suites</a></li>
                    <li><a href="#">Events</a></li>
                    <li><a href="#">Contact Us</a></li>
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
    <!-- Scripts -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper('.mySwiper', {
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    </script>
</body>
</html>