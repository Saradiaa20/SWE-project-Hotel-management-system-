<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMwv7n0v7iLFzRQ0R4RvhpBLNj/GLQdbT9K3Q8v" crossorigin="anonymous">
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

        /* main content style */
        button {
            width: 100%;
            padding: 10px;
            background-color: #9B7848;
            border: none;
            color: white;
            font-size: 20px;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
            margin-bottom: 30px;
        }

        .container {
            width: 100%;
            height: 90%;
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding-bottom: 0;
        }
        
        h1 {
            text-align: center;
            color: #9B7848;
            margin-bottom: -18px;

        }
        
        ul {
            list-style-type: none;
            padding-bottom: 0;
        }
        
        li {
            display: flex;
            align-items: center;
            margin-bottom: 24px;
        }

        /* Task ID styling */
        .task-id {
            width: 30px;
            color: black;
            margin-right: 10px;
        }

        .task-id-title {
            font-size: 12px;
            color: black;
            display: inline-block;
            margin-left: -15px;
            margin-bottom: 5px; 
        }
        input[type="checkbox"] {
            margin-right: 10px;
        }

        button:hover {
            background-color: #9B7822;
        }

        /* Responsive design */
        @media screen and (max-width: 768px) {
            .sidebar {
                width: 200px;
            }
            .container {
                width: 90%;
            }
        }

        @media screen and (max-width: 480px) {
            body {
                flex-direction: column;
            }
            .sidebar {
                width: 100%;
                height: auto;
            }
            .container {
                width: 100%;
                margin: 20px auto;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <ul class="sidebar-menu">
         <li><a href="StaffInventory.php"><i class="fas fa-boxes"></i>Inventory</a></li>
            <li><a href="#StaffTasks.php"><i class="fas fa-tasks"></i>Tasks</a></li>
            <li><a href="#"><i class="fa-solid fa-hotel"></i>Check in/out</a></li>
        </ul>
        <div class="logout">
            <a href="#"><i class="fas fa-sign-out-alt"></i>Logout</a>
        </div>
    </aside>

    <!-- Main content -->
    <div class="container">
        <h1> Tasks List</h1>
        <br>
        <form id="taskForm" onsubmit="handleSubmit(event)">
            <div class="task-id-title">Task ID</div>
            <ul>
                <li>
                    <span class="task-id">1</span>
                    <input type="checkbox" id="task1" name="tasks" value="Clean Restaurant">
                    <label for="task1">Clean the hotel restaurant</label>
                </li>
                <li>
                    <span class="task-id">2</span>
                    <input type="checkbox" id="task2" name="tasks" value="Prepare Conference Room">
                    <label for="task2">Prepare the conference room</label>
                </li>
                <li>
                    <span class="task-id">3</span>
                    <input type="checkbox" id="task3" name="tasks" value="Check Bar Stock">
                    <label for="task3">Check bar stock inventory</label>
                </li>
                <li>
                    <span class="task-id">4</span>
                    <input type="checkbox" id="task4" name="tasks" value="Deliver Room Service">
                    <label for="task4">Deliver room service to room 305</label>
                </li>
                <li>
                    <span class="task-id">5</span>
                    <input type="checkbox" id="task5" name="tasks" value="Clean Pool Area">
                    <label for="task5">Clean the pool area</label>
                </li>
                <li>
                    <span class="task-id">6</span>
                    <input type="checkbox" id="task6" name="tasks" value="Setup Meeting Room">
                    <label for="task6">Set up meeting room 2A</label>
                </li>
                <li>
                    <span class="task-id">7</span>
                    <input type="checkbox" id="task7" name="tasks" value="Inspect Fire Alarms">
                    <label for="task7">Inspect fire alarms on the 4th floor</label>
                </li>
            </ul>
            <button type="submit">Submit Completed Tasks</button>
        </form>
    </div>

    <script>
        function handleSubmit(event) {
            event.preventDefault();
            const form = document.getElementById('taskForm');
            const formData = new FormData(form);
            const selectedTasks = [];

            formData.getAll('tasks').forEach(task => {
                selectedTasks.push(task);
            });

            console.log("Selected Tasks: ", selectedTasks);
            alert("Tasks submitted successfully!");
        }
    </script>
</body>
</html>
