<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Management Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Basic Reset */
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
            margin-right: 10px;
        }
        /* Main Content */
        .main-content {
            flex-grow: 1;
            padding: 20px;
        }
        .room-management {
            background-color: #f1eee7;
            padding: 20px;
            border-radius: 10px;
        }
        .room-table {
            width: 100%;
            border-collapse: collapse;
        }
        .room-table th, .room-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }
        .room-table thead th {
            background-color: #f9f9f9;
            color: #9B7848;
        }
        .room-table tbody tr:hover {
            background-color: #f1f1f1;
        }
        .room-table tbody td {
            color: #9B7848;
        }
        .add-room-button {
            margin-top: 20px;
            background-color: #9B7848;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    
    <!-- Sidebar -->
    <aside class="sidebar">
        <ul class="sidebar-menu">
            <li><a href="#"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="#"><i class="fas fa-door-closed"></i>Rooms</a></li>
            <li><a href="#"><i class="fas fa-users"></i>Guest</a></li>
            <li><a href="#"><i class="fas fa-user-plus"></i>Staff</a></li>
            <li><a href="#"><i class="fas fa-boxes"></i>Inventory</a></li>
            <li><a href="#"><i class="fas fa-tasks"></i>Tasking</a></li>
        </ul>
        <div class="logout">
            <a href="#"><i class="fas fa-sign-out-alt"></i>Logout</a>
        </div>
    </aside>
    <!-- Main content -->
    <main class="main-content">
        <!-- Room Management Section -->
        <section class="room-management">
            <table class="room-table">
                <thead>
                    <tr>
                        <th>Room</th>
                        <th>Number</th>
                        <th>Status</th>
                        <th>Return Status</th>
                        <th>FD Status</th>
                        <th>Room Class</th>
                        <th>Reservation Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
            <button class="add-room-button" onclick="addRoom()">ADD ROOM</button>
        </section>
    </main>
    <script>
        const rooms = [
            { room: 'Deluxe', number: 101, status: 'Clean', returnStatus: 'Ready', fdStatus: 'Vacant', roomClass: 'Main', reservationStatus: 'Not Reserved' },
            { room: 'King', number: 107, status: 'Dirty', returnStatus: 'Not Ready', fdStatus: 'Vacant', roomClass: 'Main', reservationStatus: 'Not Reserved' },
            { room: 'Duke', number: 108, status: 'Out of Service', returnStatus: 'Maintenance', fdStatus: 'Occupied', roomClass: 'Main', reservationStatus: 'In House' },
            { room: 'Deluxe', number: 109, status: 'Clean', returnStatus: 'Ready', fdStatus: 'Vacant', roomClass: 'Main', reservationStatus: 'Not Reserved' },
            { room: 'Supreme', number: 110, status: 'Inspected', returnStatus: 'Ready', fdStatus: 'Occupied', roomClass: 'Main', reservationStatus: 'In House' },
            { room: 'Duke', number: 108, status: 'Out of Service', returnStatus: 'Maintenance', fdStatus: 'Occupied', roomClass: 'Main', reservationStatus: 'In House' },
            { room: 'Deluxe', number: 109, status: 'Clean', returnStatus: 'Ready', fdStatus: 'Vacant', roomClass: 'Main', reservationStatus: 'Not Reserved' },
            { room: 'Supreme', number: 110, status: 'Inspected', returnStatus: 'Ready', fdStatus: 'Occupied', roomClass: 'Main', reservationStatus: 'In House' },
        ];
        const roomTableBody = document.querySelector('.room-table tbody');

        function renderRooms(roomList) {
            roomTableBody.innerHTML = '';
            roomList.forEach((room, index) => {
                const row = document.createElement('tr');
                
                let roomStatusIcon;
                switch (room.status) {
                    case 'Clean': roomStatusIcon = '<i class="fas fa-check-circle" style="color: green;"></i>'; break;
                    case 'Inspected': roomStatusIcon = '<i class="fas fa-search" style="color: blue;"></i>'; break;
                    case 'Dirty': roomStatusIcon = '<i class="fas fa-broom" style="color: red;"></i>'; break;
                    case 'Out of Service': roomStatusIcon = '<i class="fas fa-tools" style="color: orange;"></i>'; break;
                    default: roomStatusIcon = '';
                }

                let reservationStatusIcon;
                switch (room.reservationStatus) {
                    case 'Not Reserved': reservationStatusIcon = '<i class="far fa-calendar-alt" style="color: gray;"></i>'; break;
                    case 'In House': reservationStatusIcon = '<i class="fas fa-house-user" style="color: green;"></i>'; break;
                    default: reservationStatusIcon = '';
                }

                row.innerHTML = `
                    <td>${room.room}</td>
                    <td>${room.number}</td>
                    <td>${roomStatusIcon} ${room.status}</td>
                    <td>${room.returnStatus}</td>
                    <td>${room.fdStatus}</td>
                    <td>${room.roomClass}</td>
                    <td>${reservationStatusIcon} ${room.reservationStatus}</td>
                    <td>
                        <button onclick="removeRoom(${index})" style="background: none; border: none; cursor: pointer; outline: none;">
                            <i class="fas fa-trash-alt remove-icon" style="color: #c0392b; font-size: 20px;"></i>
                        </button>
                        <button onclick="editRoom(${index})" style="background: none; border: none; cursor: pointer; outline: none;">
                            <i class="fas fa-edit" style="color: #3498db; font-size: 20px;"></i>
                        </button>
                    </td>
                `;
                roomTableBody.appendChild(row);
            });
        }

        function removeRoom(index) {
            rooms.splice(index, 1);
            renderRooms(rooms);
        }

        function editRoom(index) {
            const room = rooms[index];
            window.location.href = `RoomsEdit.php?room=${encodeURIComponent(room.room)}&number=${room.number}&status=${encodeURIComponent(room.status)}&returnStatus=${encodeURIComponent(room.returnStatus)}&fdStatus=${encodeURIComponent(room.fdStatus)}&roomClass=${encodeURIComponent(room.roomClass)}&reservationStatus=${encodeURIComponent(room.reservationStatus)}`;
        }

        function addRoom() {
            // Redirect to AddRooms.php when "ADD ROOM" button is clicked
            window.location.href = 'AddRooms.php';
        }

        renderRooms(rooms);
    </script>
</body>
</html>
