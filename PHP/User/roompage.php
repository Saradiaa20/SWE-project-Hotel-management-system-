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

 
      








    section {
        padding: 3rem 2rem;
        max-width: 1200px;
        margin: 0 auto;
    }

    .btn {
        display: inline-block;
        cursor: pointer;
        padding: 1rem 3rem;
        border: var(--border);
        font-size: 1.8rem;
        color: var(--sub-color);
        text-align: center;
        text-transform: capitalize;
        transition: .2s linear;
        margin-top: 1rem;
        background-color: var(--main-color);
    }

    .btn:hover {
        border-radius: 5rem;
        background-color: var(--sub-color);
        color: var(--main-color);
    }

    .header {
        padding-bottom: 0;
    }

    .header .flex {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1.5rem;
    }

    .header .flex .logo {
        color: var(--sub-color);
        font-size: 2.5rem;
    }

    .header .flex .btn {
        margin-top: 0;
    }

    .header .flex .fa-bars {
        font-size: 3rem;
        cursor: pointer;
        color: var(--sub-color);
        display: none;
    }

    .header .navbar {
        display: flex;
        align-items: center;
        justify-content: space-evenly;
        gap: 1.5rem;
        margin-top: 2rem;
        background-color: var(--sub-color);
        padding: .5rem;
        border-radius: .5rem;
    }

    .header .navbar a {
        font-size: 1.8rem;
        color: var(--main-color);
        padding: 1rem 3rem;
        border-radius: .5rem;
    }

    .header .navbar a:hover {
        background-color: var(--main-color);
        color: var(--sub-color);
    }

    .container {
        width: 90%;
        margin: 20px auto;
    }



select {
    width: 100%;
    padding: 10px;
    background-color: #3e2b24;
    color: #fff;
    border-radius: 4px;
    border: 1px solid #e0cda9;
}

select:focus {
    border-color: #f7c08a;
    outline: none;
}




/* General Reset */
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

/* Header and Footer */
.header {
    position: fixed;
    top: 0;
    width: 100%;
    background-color: #5e3e3e;
    color: #DCC69C;
    padding: 15px;
    text-align: center;
    z-index: 1000;
}

.footer {
    position: fixed;
    bottom: 0;
    width: 100%;
    background-color: #5e3e3e;
    color: #DCC69C;
    padding: 10px;
    text-align: center;
    z-index: 1000;
}

/* Container */
.container {
    padding-top: 70px; /* Matches header height */
    padding-bottom: 50px; /* Matches footer height */
}

/* Slideshow */
.slideshow-container {
    max-width: 1000px;
    position: relative;
    margin: auto;
}
.mySlides {
    display: none;
}
img {
    vertical-align: middle;
}

/* Previous and Next Buttons */
.prev, .next {
    cursor: pointer;
    position: absolute;
    top: 50%;
    padding: 10px;
    font-size: 18px;
    font-weight: bold;
    color: white;
    user-select: none;
    z-index: 10;
    transition: 0.6s ease;
}
.next {
    right: 10px;
    border-radius: 3px 0 0 3px;
}
.prev:hover, .next:hover {
    background-color: rgba(0, 0, 0, 0.8);
}

/* Caption */
.text {
    color: #f2f2f2;
    font-size: 18px;
    padding: 8px 12px;
    position: absolute;
    bottom: 20px;
    width: 100%;
    text-align: center;
    background: rgba(0, 0, 0, 0.5);
}

/* Dots */
.dot {
    cursor: pointer;
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block;
    transition: background-color 0.6s ease;
}
.active, .dot:hover {
    background-color: #717171;
}

/* Room Filter Buttons */
.filter-buttons {
    display: flex;
    justify-content: center;
    position: fixed;
    /* bottom: 60px; Adjust based on footer height */
    top: 60px;
    left: 0;
    width: 100%;
    z-index: 10;
    background: rgba(255, 255, 255, 0.9);
    padding: 10px 0;
}

.filter-button {
    padding: 10px 20px;
    margin: 0 10px;
    background-color: #5e3e3e;
    color: #DCC69C;
    border: none;
    border-radius: 20px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}
.filter-button.active, .filter-button:hover {
    background-color: #462b2b;
}

/* Room List */
.room-list {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    padding: 20px 0;
}

/* Room Card */
.room-card {
    width: 48%; 
    background-color: #DCC69C;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    padding: 20px;
    text-align: center;
}
.room-image {
    width: 100%;
    border-radius: 10px;
}

/* Room Title and Description */
h3 {
    color: #462b2b;
    margin: 15px 0 10px;
}
p {
    color: #777;
    font-size: 14px;
}

/* Room Buttons */
.room-buttons {
    display: flex;
    justify-content: space-around;
    margin-top: 15px;
}

.view-room, .book-now {
    padding: 10px 20px;
    border: none;
    border-radius: 20px;
    cursor: pointer;
}

.view-room {
    background-color: #ccc;
    color: #333;
}

.book-now {
    background-color: #9B7848;
    color: white;
}
.book-now:hover {
    background-color: #785F3A;
}

/* Animation for Slides */
.fade {
    animation-name: fade;
    animation-duration: 1s;
    animation-timing-function: ease-in-out;
}
@keyframes fade {
    from { opacity: 0.4; }
    to { opacity: 1; }
}

/* 
    .book-now {
        background-color: #5e3e3e;
        color: white;
    }

    .book-now:hover,
    .view-room:hover {
        opacity: 0.8;
    } */





        
        footer{
            background: linear-gradient(to right, #9b7848, #c5b394);
            border-top-left-radius: 100px;
            padding-bottom: 50px; 
            z-index: 1000;
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
            <img src="logo.png" alt="logo">
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
            <img src="user.png" alt="User Icon">
        </div>
    </div>
  
    <div class="container">
        <div class="filter-buttons">
            <button class="filter-button active" onclick="filterRooms('all')">All</button>
            <button class="filter-button" onclick="filterRooms('classic')">Classic</button>
            <button class="filter-button" onclick="filterRooms('deluxe')">Deluxe</button>
            <button class="filter-button" onclick="filterRooms('premier')">Premier</button>
            <button class="filter-button" onclick="filterRooms('ada')">ADA</button>
        </div>

        <div class="room-list">
 
            <div class="room-card classic">
          







                <div class="slideshow-container">
                    <div class="mySlides fade">
                        <div class="numbertext">1 / 3</div>
                        <img src="Photos/1.jpg" style="width:100%">
                        <div class="text">Caption One</div>
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">2 / 3</div>
                        <img src="Photos/2.jpg" style="width:100%">
                        <div class="text">Caption Two</div>
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">3 / 3</div>
                        <img src="Photos/3.jpg"style="width:100%">
                        <div class="text">Caption Three</div>
                    </div>

                    <a class="prev" onclick="plusSlides(-1)">❮</a>
                    <a class="next" onclick="plusSlides(1)">❯</a>
                </div>

                <br>

                <div style="text-align:center">
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                </div>








                <h3>Classic King</h3>
                <p>King sized bed • Stylish bath • Approximately 270 sq. feet</p>
                <div class="room-buttons">
                    <button class="view-room"onclick="window.location.href='RoomDetails.php'">View Room</button>
      

              
                    <button class="book-now">Book Now</button>

                  
                </div>
            </div>

            <div class="room-card classic">
          
                <h3>Classic Two Double</h3>
                <p>Two double beds • Chic furnishings • Approximately 285 sq. feet</p>
                <div class="room-buttons">
                <button class="view-room"onclick="window.location.href='RoomDetails.php'">View Room</button>
                    <button class="book-now">Book Now</button>
                </div>
            </div>

            <div class="room-card classic">
                
                <h3>Classic Queen</h3>
                <p>Queen sized bed • Modern bath • Approximately 250 sq. feet</p>
                <div class="room-buttons">
                <button class="view-room"onclick="window.location.href='RoomDetails.php'">View Room</button>
                    <button class="book-now">Book Now</button>
                </div>
            </div>

            <!-- Deluxe Rooms -->
            <div class="room-card deluxe">
             
                <h3>Deluxe King</h3>
                <p>King sized bed • Luxury bath • Approximately 320 sq. feet</p>
                <div class="room-buttons">
                <button class="view-room"onclick="window.location.href='RoomDetails.php'">View Room</button>
                    <button class="book-now">Book Now</button>
                </div>
            </div>

            <div class="room-card deluxe">
                <img src="deluxe-suite.jpg" alt="Deluxe Suite" class="room-image">
                <h3>Deluxe Suite</h3>
                <p>Suite with King bed • Spacious living area • Approximately 500 sq. feet</p>
                <div class="room-buttons">
                <button class="view-room"onclick="window.location.href='RoomDetails.php'">View Room</button>
                    <button class="book-now">Book Now</button>
                </div>
            </div>

            <!-- Premier Rooms -->
            <div class="room-card premier">
                <img src="premier-king.jpg" alt="Premier King" class="room-image">
                <h3>Premier King</h3>
                <p>King sized bed • Premium bath • Approximately 350 sq. feet</p>
                <div class="room-buttons">
                <button class="view-room"onclick="window.location.href='RoomDetails.php'">View Room</button>
                    <button class="book-now">Book Now</button>
                </div>
            </div>

            <div class="room-card premier">
                <img src="premier-double.jpg" alt="Premier Double" class="room-image">
                <h3>Premier Double</h3>
                <p>Two double beds • Premium amenities • Approximately 370 sq. feet</p>
                <div class="room-buttons">
                <button class="view-room"onclick="window.location.href='RoomDetails.php'">View Room</button>
                    <button class="book-now">Book Now</button>
                </div>
            </div>

            <!-- ADA Accessible Rooms -->
            <div class="room-card ada">
                <img src="ada-room.jpg" alt="ADA Room" class="room-image">
                <h3>ADA Accessible Room</h3>
                <p>Accessible features • King sized bed • Approximately 300 sq. feet</p>
                <div class="room-buttons">
                <button class="view-room"onclick="window.location.href='RoomDetails.php'">View Room</button>
                    <button class="book-now">Book Now</button>
                </div>
            </div>
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
    function filterRooms(type) {
        var buttons = document.querySelectorAll('.filter-button');
        buttons.forEach(button => button.classList.remove('active'));

        var selectedButton = document.querySelector(`.filter-button[onclick="filterRooms('${type}')"]`);
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
        // Function to open the pop-up window
        function openBookingWindow() {
            window.open('room.php', 'BookingWindow', 'width=800,height=600');
        }
    </script>
    
</body>
</html>
