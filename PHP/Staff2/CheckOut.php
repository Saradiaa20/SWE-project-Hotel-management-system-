<?php
   session_start();
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMwv7n0v7iLFzRQ0R4RvhpBLNj/GLQdbT9K3Q8v" crossorigin="anonymous">
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
        }

       
        .user-profile {
            display: flex;
            align-items: center;
        }

        .user-profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .check_out {
            background-color: #f1eee7;
            padding: 20px;
            border-radius: 10px;
        }

        .user_details {
            width: 100%;
            border-collapse: collapse;
        }

        .user_details th, .user_details td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        .user_details thead th {
            background-color: #f9f9f9;
            color: #9B7848;
        }

        .user_details tbody tr:hover {
            background-color: #f1f1f1;
        }

        .user_details tbody td {
            color: #9B7848;
        }

       
    
        .user_details button {
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .user_details button.edit-btn {
            background-color: #8B4513; 
            color: white;
        }

        .user_details button.edit-btn:hover {
            background-color: #6B3A0A; 
        }

        .user_details button.delete-btn {
            background-color: #8B4513;
            color: white;
        }

        .user_details button.delete-btn:hover {
            background-color: #6B3A0A; 
        }


        .user_details button {
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: block; 
            margin-bottom: 10px; 
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
    <main class="main-content">
        
        <section class="check_out">
            <table class="user_details">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Mobile</th>
                        <th>Emai</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Guest</th>
                        <th>Room Type</th>
                        <th>Room Number</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody id="userTableBody">
                </tbody>
            </table>
        </section>
    </main>

    <script>
const checkedOutData = JSON.parse(sessionStorage.getItem("checkedOutRow"));

if (checkedOutData) {
    const row = document.createElement("tr");
    row.innerHTML = `
        <td>${checkedOutData[0]}</td>
        <td>${checkedOutData[1]}</td>
        <td>${checkedOutData[2]}</td>
        <td>${checkedOutData[3]}</td>
        <td>${checkedOutData[4]}</td>
        <td>${checkedOutData[5]}</td>
        <td>${checkedOutData[6]}</td>
        <td>${checkedOutData[7]}</td>
        <td>${checkedOutData[10]}</td>
    `;
    document.getElementById("userTableBody").appendChild(row);

    sessionStorage.removeItem("checkedOutRow");
}
</script>
    </body>
</html>