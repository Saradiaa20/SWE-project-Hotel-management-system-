<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMwv7n0v7iLFzRQ0R4RvhpBLNj/GLQdbT9K3Q8v" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="style.css"> -->

    <style>
            * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            display: flex;
            background-color: #9B7848;
        }
        /* Sidebar */
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
            margin-right: 10px;
        }
.main-content {
            flex-grow: 1;
            padding: 20px;
            position: relative; 
        }

        .new-checkin {
            background-color: #f1eee7;
            padding: 20px;
            border-radius: 10px;
        }        
       

h1 {
    font-size: 24px;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 15px;
}

input, select, textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}


.booking-summary {
    background: #ffffff;
    padding: 20px;
    margin-top: 20px;
    border-radius: 5px;
}

.booking-summary h3 {
    margin-top: 0;
}

button {
    padding: 10px 20px;
    background: #8B4513;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-top: 20px; 
    align-self: flex-start; 
}

button:hover {
    background: #6B3A0A;
}

.chekin-details , .room-details, .guest-details  {
    display: flex;
    gap: 40px; 
}

.chekin-details .form-group, .room-details .form-group, .guest-details .form-group {
        flex: 1; 
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
    <!-- <div class="container"> -->
        <!-- Sidebar -->
        <aside class="sidebar">
        <ul class="sidebar-menu">
        <li><a href="StaffInventory.php"><i class="fas fa-boxes"></i>Inventory</a></li>
            <li><a href="StaffTasks.php"><i class="fas fa-tasks"></i>Tasks</a></li>
            <li><a href="CheckIn.php"><i class="fa-solid fa-hotel"></i>Check in/out</a></li>
        </ul>
        <div class="logout">
            <a href="signinup.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
        </div>
        </aside>
        
        <!-- Main Content -->
        <main class="main-content">
        <section class="new-checkin">
            <h1>New Check In</h1>
            <form id="Checkin">
                
                <section class="chekin-details">
                    <div class="form-group">
                        <label>Check In</label>
                        <input type="date" id="checkIn" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Check Out</label>
                        <input type="date" id="checkOut" required >
                    </div>
                </section>
                
                <!-- Room Details -->
                <section class="room-details">
                    <div class="form-group">
                        <label>Room Type</label>
                        <select id="roomType"required>
                            <option value="" selected>No Thing</option>
                            <option>Single</option>
                            <option>Double</option>
                            <option>Suite</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Room Number</label>
                        <input type="text" id="roomNumber" required>
                    </div>
                </section>
                
                <!-- Guest Details -->
                <section class="guest-details">
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" id="fullName"required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="email"required>
                    </div>
                    <div class="form-group">
                        <label>Mobile</label>
                        <input type="tel" pattern="[0-9]{10}" id="phone"required>
                    </div>
                    <div class="form-group">
                        <label>Guest</label>
                        <input type="text" id="guest"required>
                    </div>
                    
                </section>
                
                <!-- Guest Requests -->
                <section class="guest-requests">
                    <label>Guest Comments / Request</label>
                    <textarea id="guestRequest"></textarea>
                </section>

                <!-- Extras -->
<section class="extras">
    <h3>Extras</h3>
    <br>
    <div class="extra-options">
        <label>
            <input type="checkbox" id="all-inclusve"> All Inclusive
        </label>
        <label>
            <input type="checkbox" id="full-board"> Full Board
        </label>
        <label>
            <input type="checkbox" id="half-board"> Half Board
        </label>
        <label>
            <input type="checkbox" id="breakfast-only"> Breakfast Only
        </label>
        <label>
            <input type="checkbox" id="pets-allowed"> Pets Allowed
        </label>
        <label>
            <input type="checkbox" id="extra-bed"> Extra Bed
        </label>
    </div>
</section>

                
                <!-- Booking Summary -->
                <section class="booking-summary">
                    <h3>Booking Summary</h3>
                    <br>
                    <p>Total Room <span id="totalRoom">0</span></p>
                    <br>
                    <p>Extra Services <span id="extraServices">0</span></p>
                    <br>
                    <p>Subtotal <span id="subtotal">0</span></p>
                    <br>
                    <p>Taxes <span id="taxes">0</span></p>
                    <br>
                    <br>
                    <p>Total <span id="total">0</span></p>
                    
                    
                </section>
                
                <button type="submit">Save</button>
            </form>
        </section>
        </main>
    
    
    
</body>
</html>