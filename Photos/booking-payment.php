<?php
// Connect to database
session_start();
include_once "includes/dbh.inc.php";
$conn = mysqli_connect($servername, $username, $password, $dbname);
// $user_id = $_SESSION["id"];
//$user_id = 1;

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get user payment information from database
$user_id = 1;
$query = "SELECT * FROM payment_methods WHERE id = '$user_id'";
$result = mysqli_query($conn, $query);

// Handle payment processing
if (isset($_POST['payment-method'])) {
    $payment_method = $_POST['payment-method'];
    if ($payment_method === 'saved-card') {
        // Get selected saved card
        $card_id = $_POST['saved-card'];
        $query = "SELECT * FROM payment_methods WHERE id = '$card_id'";
        $result = mysqli_query($conn, $query);
        $card_info = mysqli_fetch_assoc($result);

        // Process payment using saved card
        // ...
    } else if ($payment_method === 'new-card') {
        // Get new card information
        $card_type = $_POST['card_type'];
        $card_number = $_POST['card_number'];
        $expiration_date = $_POST['expiration_date'];
        $cvv = $_POST['cvv'];

        // Validate new card information
        // ...

        // Add new card to database
        $query = "INSERT INTO payment_methods (user_id, card_type, card_number, expiration_date, cvv) VALUES ('$user_id','$card_type', '$card_number', '$expiration_date', '$cvv')";
        mysqli_query($conn, $query);

        // Process payment using new card
        // ...
    }
}

// Close database connection
//mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Payment Page</title>
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1eee7;
        }

        header {
            background-color: #9B784886;
            width:auto;
            padding: 5px;
            margin-top: 50px;
            border-radius: 10px;
            text-align: center;
        }
        main{
            display: flex;
            flex-direction: row;
            margin-bottom: 100px;
        }

        .step-container {
            display: flex;
            justify-content:space-around;
            margin-top: 5px;
        }

        .step {
            background-color: #ffffff;
            padding: 5px;
            border-radius: 10px;
            margin: 5px;
        }

        .step.active {
            background-color: #9B7848;
            color: #ffffff;
        }

        .step-number {
            font-size: 24px;
            font-weight: bold;
            margin-right: 10px;
        }

        .step-title {
            font-size: 18px;
        }

        .booking-details {
            display: flex;
            padding: 40px;
            height:fit-content;
            justify-content: space-between;
            margin-top: 20px;
            border-radius: 20px;
            background-color: #ffffff;
        }

        .room-image {
            width: 30%;
            margin-right: 20px;
        }

        .room-image img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
        }

        .room-info {
            width: 70%;
        }

        .extras {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .extras li {
            margin-bottom: 10px;
        }

        .extras li:before {
            content: "\2713";
            font-size: 18px;
            color: #9B7848;
            margin-right: 10px;
        }

        .total-price {
            font-size: 24px;
            font-weight: bold;
            margin-top: 20px;
        }

        .payment-section {
            background-color: #ffffff86;
            padding: 40px;
            border-radius: 20px;
            text-align: center;
            padding: 20px;
            margin: 20px;
        }
        .payment-section h2{
            text-align: left;
        }

        .payment-options {
            display: flex;
            justify-content:baseline;
            margin-bottom: 20px;
        }

        .payment-options label {
            margin-right: 20px;
        }

        .saved-cards {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .saved-cards label {
            margin-bottom: 20px;
        }
        .saved-cards input[type="text"] {
            padding: 10px;
            align-items: center;
            border: 1px solid #ccc;
            border-radius: 10px;
            width: 150px;
            margin-bottom: 20px;
            margin-right: 20px;
        }
        .saved-cards option {
            color: #ffffff;
            background-color: #9B7848;
            padding: 10px;

        }

        .new-card-form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .new-card-form label {
            margin-bottom: 20px;
        }

        .new-card-form input[type="text"] {
            padding: 10px;
            align-items: center;
            border: 1px solid #ccc;
            border-radius: 10px;
            width: 150px;
            margin-bottom: 20px;
        }

        .pay-button {
            background-color: #9B7848;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }

        .pay-button:hover {
            background-color: #f1eee7;
            color: #9B7848;
        }

    #saved-card-list {
        width: 25%;
        padding: 10px;
        margin: 20px auto;
        border-radius: 10px;
        background-color: #9B784886;
        color: #fff;
        font-size: 16px;
        /* appearance: none; Hides default arrow */
        cursor: pointer;
    }

    /* Add custom arrow using pseudo-element */
    #saved-card-list::after {
        content: "▼"; 
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        pointer-events: none;
        font-size: 16px;
        color: #ffffff;
    }

    /* Option styling */
    #saved-card-list option {
        padding: 10px;
        background-color: #9B7848;
        color: #fff;
        border-radius: 5px;
        font-size: 16px;
    }

    .visa-image {
        width: 100%; /* Adjust to make the image responsive */
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 10px;
    }

    .visa-image img {
        width: 200px;  /* Adjust size if needed */
        height: 200px;
        object-fit: contain;
        border-radius: 10px;
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
    object-fit: cover; /*Ensure the image covers the entire circle */
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

    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div>
<div class="navbar">
        <div class="logo">
        <img src="pics/Screenshot_2024-10-28_000155-removebg-preview.png" alt="logo">
        </div>
        <nav>
            <ul>
                <li><a href="homepage.php">Home</a></li>
                <li><a href="rooms.php">Rooms</a></li>
                <li><a href="#footer">Contact us</a></li>
                <li><a href="aboutUs.php">About</a></li>
            </ul>
        </nav>
        <div class="user-icon">
        <img src="pics/profileHome-removebg-preview.png" alt="A person icon">
    </div>
    </div>
    <header>
        <h2>Your Booking</h2>
        <div class="step-container">
            <div class="step">
                <span class="step-number">1</span>
                <span class="step-title">Selection</span>
            </div>
            <div class="step active">
                <span class="step-number">2</span>
                <span class="step-title">Final Step</span>
            </div>
        </div>
    </header>

    <main>
        <section class="booking-details">
            <div class="room-image">
                <img src="/pics/OIP.jpeg" alt="Room Image">
            </div>
            <div class="room-info">
                <h2>Your Room</h2>
                <p>Exôtico Beach & Rooms</p>
                <ul class="extras">
                    <li>Free WiFi</li>
                    <li>Airport shuttle</li>
                    <li>Parking</li>
                    <li>Restaurant</li>
                    <li>Swimming Pool</li>
                </ul>
                <div class="total-price">
                    <span class="price-label">Total price:</span>
                    <span class="price-value">$150.00</span>
                </div>
            </div>
        </section>

        <section class="payment-section">
            <h2>Payment Method</h2>
            <div class="payment-options">
                <label for="saved-card">
                    <input type="radio" name="payment-method" id="saved-card" checked>
                    Use Saved Card
                </label>
                <label for="new-card">
                    <input type="radio" name="payment-method" id ="new-card">
                    Add New Card
                </label>
            </div>

            <div class="saved-cards">
                <select id="saved-card-list">
                    <option value="">Select a card</option>
                    <!-- populate saved cards from user profile -->
                    <option value="1">Visa - **** 1234</option>
                    <option value="2">Mastercard - **** 5678</option>
                </select> <br><br><br><br>
                <form method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                <label for="firstname">First Name:</label>
                <input type="text" id="firstname" placeholder="John" required>
                <label for="lastname">Last Name:</label>
                <input type="text" id="lastname" placeholder="Smith" required><br>
                <label for="email">Email:</label>
                <input type="text" id="email" placeholder="JohnSmith@gmail.com" required>
                <label for="phone">Mobile Number:</label>
                <input type="text" id="phone" placeholder="12345678901" required><br>
                <label for="card-number">Card Number:</label>
                <input type="text" id="card-number" placeholder="1234 5678 9012 3456" required>
                <label for="expiration-date">Expiration Date:</label>
                <input type="text" id="expiration-date" placeholder="MM/YY" required>
                <label for="cvv">CVV:</label>
                <input type="text" id="cvv" placeholder="123" required>
                <div class="visa-image" style="align-items: center;">
                <img src="pics/R.png" alt="Visa Image">
                </div>
                <input class="pay-button" type="submit" value="Confirm and Pay">
                </form>
            </div>

            <div class="new-card-form">
            <form method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
            <label for="firstname">First Name:</label>
                <input type="text" id="firstname" placeholder="John" required>
                <label for="lastname">Last Name:</label>
                <input type="text" id="lastname" placeholder="Smith" required><br>
                <label for="email">Email:</label>
                <input type="text" id="email" placeholder="JohnSmith@gmail.com" required>
                <label for="phone">Mobile Number:</label>
                <input type="text" id="phone" placeholder="12345678901" required><br>
                <label for="card-number">Card Number:</label>
                <input type="text" id="card-number" placeholder="1234 5678 9012 3456" required>
                <label for="expiration-date">Expiration Date:</label>
                <input type="text" id="expiration-date" placeholder="MM/YY" required>
                <label for="cvv">CVV:</label>
                <input type="text" id="cvv" placeholder="123" required>
                <div class="visa-image" style="align-items: center;">
                <img src="pics/R.png" alt="Visa Image">
                </div>
                <input class="pay-button" type="submit" value="Confirm and Pay">
            </form>
            </div>

        </section>
    </main>
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

    <script>
        // Add event listener to payment method radio buttons
document.querySelectorAll('input[name="payment-method"]').forEach((radio) => {
    radio.addEventListener('change', (e) => {
        const paymentMethod = e.target.id;
        if (paymentMethod === 'saved-card') {
            // Show saved cards list
            document.querySelector('.saved-cards').style.display = 'block';
            document.querySelector('.new-card-form').style.display = 'none';
        } else if (paymentMethod === 'new-card') {
            // Show new card form
            document.querySelector('.saved-cards').style.display = 'none';
            document.querySelector('.new-card-form').style.display = 'block';
        }
    });
});

// Add event listener to confirm and pay button
document.querySelector('.pay-button').addEventListener('click', (e) => {
    // Validate payment information
    // Make API call to process payment
    // Handle payment response
    if(validateForm()){
    alert("Booking was successful!");
        return true;
    }
    
});

    function validateForm() {
        // Get form inputs
        const firstName = document.getElementById('first_name').value.trim();
        const lastName = document.getElementById('last_name').value.trim();
        const email = document.getElementById('email').value.trim();
        const password = document.getElementById('password').value.trim();
        const phone = document.getElementById('phone').value.trim();

        // Check if any field is empty
        if (!firstName || !lastName || !email || !phone) {
            alert('Please fill in all required fields.');
            return false; // Prevent form submission
        }

        // Optionally: you can add more validations like email or phone format

        return true; // Allow form submission
    }

    </script>
</body>
</html>