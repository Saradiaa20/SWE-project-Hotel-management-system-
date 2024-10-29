<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>About Us</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f1eee7;
        }

        .slideshow-container {
            position: relative;
            width: 100%;
            height: 100vh;
            overflow: hidden;
            display: none;
        }

        .mySlides {
            display: none;
            width: 100%;
            height: 100%;
        }

        img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            vertical-align: middle;
        }

        .prev,
        .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -22px;
            color: #231F20;
            font-weight: bold;
            font-size: 60px;
            transition: 0.6s ease;
            user-select: none;
            z-index: 1;
        }

        .next {
            right: 0;
        }

        .fade {
            animation-name: fade;
            animation-duration: 1.5s;
        }

        @keyframes fade {
            from {
                opacity: .4;
            }

            to {
                opacity: 1;
            }
        }

        .text-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #231F20;
            font-size: 40px;
            z-index: 2;
        }

        .about-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 40px;
            margin-top: 5px;
            margin-bottom: 5px;
        }

        .about-text {
            flex: 1;
            padding-right: 50px;
        }

        .about-text h2 {
            font-size: 36px;
            color: #9B7848;
            margin-bottom: 20px;
            text-align: center;
            padding-left: 150px;
            font-size: 50px;

        }

        .about-text p {
            font-size: 18px;
            color: #1F4A54;
            line-height: 1.6;
            text-align: justify;
            padding-left: 150px;

        }

        .about-image {
            flex: 1;
            text-align: right;
            /* Align the image to the right */


        }

        .about-image img {
            width: 90%;
            /* Resize the image to be 80% of its container */
            height: auto;
            /* Maintain aspect ratio */
            max-width: 1000px;
            /* Limit the image width to prevent it from getting too large */
            border-radius: 10px;
            /* Apply slight rounding to the corners */
            object-fit: cover;
            /* Ensures the image covers the container without distortion */
            margin-left: auto;
            /* Centers the image within the flex container */
        }



        .why-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 40px;
            margin-top: 10px;
        }

        .why-text {
            flex: 1;
            padding-left: 50px;
            /* Changed from right to left */
        }

        .why-text h2 {
            font-size: 36px;
            color: #9B7848;
            margin-bottom: 20px;
            text-align: center;
            padding-top: -20px;
            font-size: 50px;
        }

        .why-text p {
            font-size: 18px;
            color: #1F4A54;
            line-height: 1.6;
            text-align: justify;
        }

        .why-image {
            flex: 1;
            text-align: left;
            /* Align the image to the left */
        }

        .why-image img {
            width: 90%;
            height: auto;
            max-width: 1000px;
            border-radius: 10px;
            object-fit: cover;


        }

        .explore-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 40px;
            margin-top: 5px;
            margin-bottom: 5px;
        }

        .explore-text {
            flex: 1;
            padding-right: 50px;
        }

        .explore-text h2 {
            font-size: 36px;
            color: #9B7848;
            margin-bottom: 20px;
            text-align: center;
            padding-left: 150px;
            font-size: 50px;

        }

        .explore-text p {
            font-size: 18px;
            color: #1F4A54;
            line-height: 1.6;
            text-align: justify;
            padding-left: 150px;
        }

        .explore-image {
            flex: 1;
            text-align: right;
            /* Align the image to the right */


        }

        .about-image img {
            width: 90%;
            /* Resize the image to be 80% of its container */
            height: auto;
            /* Maintain aspect ratio */
            max-width: 1000px;
            /* Limit the image width to prevent it from getting too large */
            border-radius: 10px;
            /* Apply slight rounding to the corners */
            object-fit: cover;
            /* Ensures the image covers the container without distortion */
            margin-left: auto;
            /* Centers the image within the flex container */
        }

        .OWNERS-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 40px;
            margin-top: 5px;
            margin-bottom: 5px;
        }

        .OWNERS-text {
            flex: 1;
            padding-right: 50px;
        }

        .OWNERS-text h2 {
            font-size: 36px;
            color: #9B7848;
            margin-bottom: 20px;
            text-align: center;
            padding-left: 150px;
            font-size: 50px;

        }

        .OWNERS-text p {
            font-size: 18px;
            color: #1F4A54;
            line-height: 1.6;
            text-align: justify;
            padding-left: 150px;
        }

        .OWNERS-image {
            flex: 1;
            text-align: right;
            /* Align the image to the right */


        }

        .OWNERS-image img {
            width: 90%;
            /* Resize the image to be 80% of its container */
            height: auto;
            /* Maintain aspect ratio */
            max-width: 1000px;
            /* Limit the image width to prevent it from getting too large */
            border-radius: 10px;
            /* Apply slight rounding to the corners */
            object-fit: cover;
            /* Ensures the image covers the container without distortion */
            margin-left: auto;
            /* Centers the image within the flex container */
        }




        .numbers-section {
            position: relative;
            background-image: url('./images/slideshow4.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 80px 20px;
            text-align: center;
            min-height: 500px;
            opacity: 0;
            transform: translateY(50px);
            transition: opacity 1s ease, transform 1s ease;
            margin-top: 20px;
        }

        .numbers-section.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .numbers-section .overlay {
            background: #f1eee7;
            padding: 40px;
            border-radius: 20px;
            display: inline-block;
            width: 90%;
            min-height: 300px;
        }

        .numbers-section h2 {
            font-size: 60px;
            /* Increased size from 40px to 60px */
            margin-bottom: 40px;
            color: #9B7848;
        }

        .numbers-section .stats {
            display: flex;
            justify-content: center;
            gap: 30px;
            color: #1F4A54
        }

        .numbers-section .stat-item h3 {
            font-size: 70px;
            /* Increased size from 50px to 80px */
            margin-bottom: 10px;
        }

        .numbers-section .stat-item p {
            font-size: 20px;
            /* Increased size from 20px to 24px */
        }

        .numbers-section .stat-item {
            text-align: center;
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
h1 {
        text-align: center; 
        color:  #1F4A54;
        margin-top:50px;
        font-size:50px;
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
                <li><a href="#">Home</a></li>
                <li><a href="#">Rooms</a></li>
                <li><a href="#">Contact us</a></li>
                <li><a href="#">About</a></li>
            </ul>
        </nav>
        <div class="user-icon">
        <img src="user.jpg" alt="A person icon">


</div>
    </div>
    <h1>Luxury & Grandeur</h1>
   
    <div class="slideshow-container">
        <div class="mySlides fade">
            <img src="luxury-classic-modern-bedroom-suite-hotel.jpg" alt="About Us">
            <div class="text-container">
                <h1>ABOUT US</h1>
                <p>Meet Pickalbatros</p>
            </div>
        </div>

        <div class="mySlides fade">
            <img src="modern-minimalist-office.jpg" alt="About Us">
            <div class="text-container">
                <h1>WHY US</h1>
                <p>Providing exceptional experiences.</p>
            </div>
        </div>

        <div class="mySlides fade">
            <img src="view-luxurious-hotel-interior-space.jpg" alt="About Us">
            <div class="text-container">
                <h1>EXPLORE US</h1>
                <p>Commitment, Quality, and Integrity.</p>
            </div>
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>

    <section class="about-section">
        <div class="about-text">
            <h2>ABOUT US</h2>
            <p>Welcome to The Royal Palm, your premier destination in Egypt. Established in 2024, we specialize in
                providing exceptional hospitality and creating unforgettable experiences. Our dedicated team is
                committed to ensuring your stay is comfortable and personalized.
                Enjoy luxurious accommodations, a stunning rooftop pool, and exquisite dining featuring local cuisine.
                Book your stay with us today and discover the perfect blend of comfort and elegance!</p>

        </div>
        <div class="about-image">
            <img src="slideshow1.jpg" alt="Sunrise Image">
        </div>
    </section>

    <section class="why-section">
        <div class="why-image">
            <img src="slideshow2.jpg" alt="Sunrise Image">
        </div>
        <div class="why-text">
            <h2>WHY US</h2>
            <p>Choose  The Royal Palm  for an unparalleled hospitality experience in Egypt Our commitment to
                excellence is evident in every detail, from our beautifully appointed rooms to our attentive staff
                dedicated to your comfort.
                With over years in the industry, we pride ourselves on providing personalized service that
                makes every guest feel at home. Enjoy our world-class amenities, including a stunning rooftop pool and a
                gourmet restaurant offering exquisite local dishes</p>

        </div>
    </section>

    <section class="explore-section">
        <div class="explore-text">
            <h2>EXPLORE US</h2>
            <p>Discover the beauty of Egypt at  The Royal Palm! Nestled in a prime location, we invite you to
                experience a world of adventure and relaxation. Our knowledgeable concierge is here to help you explore
                the best local attractions, from stunning beaches to cultural landmarks.
                Unwind in our luxurious accommodations, where comfort meets elegance, and enjoy amenities like our
                rooftop pool and on-site dining featuring delectable local cuisine.
                Whether you seek thrilling activities or peaceful escapes,The Royal Palm is your gateway to the ultimate
                Egypt experience. Start your journey with us today</p>
        </div>
        <div class="explore-image">
            <img src="slideshow3.jpg" alt="Sunrise Image">
        </div>

    </section>

    <section class="OWNERS-section">
        <div class="OWNERS-image">
            <img src="slideshow2.jpg" alt="Sunrise Image">
        </div>
        <div class="OWNERS-text">
            <h2>OWNERS</h2>
            <p>At  The Royal Palm, our vision is driven by a dedicated team of owners committed to excellence in
                hospitality. Led by Ziad Mohamed,Sara Diaa,Fatma Nageh,Nada Hassan,Malak Mahmoud we bring decades
                of experience and a passion for providing exceptional guest experiences.

                Each owner plays a vital role in shaping our hotel’s identity, ensuring that every detail reflects our
                commitment to luxury and comfort. Their hands-on approach and dedication to quality guarantee that our
                guests receive personalized service and unforgettable stays.

                Join us at The Royal Palm and experience the unique touch that our ownership team brings to your journey!
            </p>
        </div>
    </section>




    <section class="numbers-section" id="numbers-section">
        <div class="overlay">
            <h2>NUMBERS OF OUR FAMILY</h2>
            <div class="stats">
                <div class="stat-item">
                    <h3>14,000+</h3>
                    <p>Rooms</p>
                </div>
                <div class="stat-item">
                    <h3>1,000,000+</h3>
                    <p>Guests</p>
                </div>
                <div class="stat-item">
                    <h3>12,000+</h3>
                    <p>Staff Members</p>
                </div>
            </div>
        </div>
    </section>
<!--footer part-->
<footer>
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
    <script>
        let slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");

            if (n > slides.length) { slideIndex = 1 }
            if (n < 1) { slideIndex = slides.length }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none"; // Hide all slides
            }
            slides[slideIndex - 1].style.display = "block"; // Show the current slide
        }

        window.addEventListener('scroll', () => {
            const numbersSection = document.getElementById('numbers-section');
            const sectionPosition = numbersSection.getBoundingClientRect().top;
            const viewportHeight = window.innerHeight;

            if (sectionPosition < viewportHeight) {
                numbersSection.classList.add('visible');
            }
        });
    </script>
</body>

</html>