<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Management Dashboard</title>

    <!-- Font Awesome Icons CDN -->
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

        .task-management {
            background-color: #f1eee7;
            padding: 20px;
            border-radius: 10px;
        }

        .task-table {
    width: 100%;
    border-collapse: collapse; /* Ensures there are no gaps between table cells */
    table-layout: fixed; /* Prevents the table from resizing dynamically, which helps keep it organized */
}

.task-table th,
.task-table td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #ccc;
    overflow: hidden; /* Prevents overflow in the table cells */
    white-space: nowrap; /* Prevents text from wrapping to the next line */
    text-overflow: ellipsis; /* Adds ellipsis for overflowing text */
}
        .task-table thead th {
            background-color: #f9f9f9;
            color: #9B7848;
        }

        .task-table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .task-table tbody td {
            color: #9B7848;
        }

        .task-table th input,
        .task-table th select {
            width: 100%; /* Full width */
    padding: 8px; /* Consistent padding */
    font-size: 14px; /* Consistent font size */
    border: 1px solid #9B7848; /* Consistent border */
    border-radius: 5px; /* Consistent border radius */
        }
        

        .status-icon {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .finished-icon {
            color: green;
        }

        .unfinished-icon {
            color: red;
        }

        .action-icons i {
            cursor: pointer;
            margin-right: 10px;
        }

        .edit-icon {
            color: #3498db;
        }

        .delete-icon {
            color: #e74c3c;
        }

        /* Pop-up Modal Styles */
        .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    background-color: rgba(0, 0, 0, 0.6); /* Darker overlay with opacity */
    padding-top: 30px;
}

.modal-content {
    background-color: #f9f9f9; /* Lighter background */
    margin: 2% auto; /* Move the modal closer to the top */
    padding: 30px; /* Increased padding for a spacious feel */
    border: 1px solid #9B7848;
    border-radius: 15px; /* More rounded corners */
    width: 90%; /* More responsive width */
    max-width: 600px; /* Limit the maximum width */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Add shadow for depth */
}

.modal-content label {
    font-weight: bold; /* Make labels bold */
    display: block; /* Ensure labels are block elements */
    margin-top: 15px; /* Add space above labels */
    color:#9B7848
}

.modal-content input[type="text"],
.modal-content textarea,
.modal-content select {
    width: calc(100% - 20px); /* Full width minus padding */
    padding: 10px; /* Increased padding */
    font-size: 16px; /* Slightly larger font size */
    border: 1px solid #9B7848;
    border-radius: 5px; /* Slightly rounded corners */
    margin-top: 5px; /* Space above inputs */
    background-color: #fff; /* White background for inputs */
}

.modal-content button {
    background-color: #9B7848; /* Match the theme */
    color: #fff; /* White text */
    border: none; /* Remove default border */
    border-radius: 5px; /* Rounded corners */
    padding: 10px 15px; /* Padding inside the button */
    cursor: pointer; /* Change cursor on hover */
    margin-top: 20px; /* Space above the button */
    font-size: 16px; /* Button text size */
}

.modal-content button:hover {
    background-color: #7a613d; /* Darken the button on hover */
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}
#addTaskButton {
    background-color: #9B7848; /* Match the theme */
    color: white; /* White text */
    border: none; /* Remove default border */
    border-radius: 5px; /* Rounded corners */
    padding: 10px 15px; /* Padding inside the button */
    cursor: pointer; /* Change cursor on hover */
    font-size: 16px; /* Button text size */
    margin-top: 20px; /* Space above the button */
    display: flex; /* Flexbox for alignment */
    align-items: center; /* Center icon and text */
}

#addTaskButton i {
    margin-left: 8px; /* Space between text and icon */
}

#addTaskButton:hover {
    background-color: #7a613d; /* Darken the button on hover */
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
        <!-- Task Management Section -->
        <section class="task-management">
            <table class="task-table">
                <thead>
                    <tr>
                        <th>Task ID</th>
                        <th>Staff ID</th>
                        <th>Staff Name</th>
                        <th>Room Number</th>
                        <th>Task Status</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                    <tr>
                        <th>
                            <input type="text" id="taskIdInput" placeholder="Filter by Task ID" oninput="filterTasks()">
                        </th>
                        <th>
                            <input type="text" id="staffIdInput" placeholder="Filter by Staff ID" oninput="filterTasks()">
                        </th>
                        <th>
                            <input type="text" id="staffNameInput" placeholder="Filter by Staff Name" oninput="filterTasks()">
                        </th>
                        <th>
                            <input type="text" id="roomNumberInput" placeholder="Filter by Room Number" oninput="filterTasks()">
                        </th>
                        <th>
                            <select id="statusInput" oninput="filterTasks()">
                                <option value="">All</option>
                                <option value="finished">Finished</option>
                                <option value="unfinished">Unfinished</option>
                            </select>
                        </th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                
                <tbody>
                </tbody>
            </table>
            <button id="addTaskButton">
                Add Task <i class="fas fa-plus"></i>
            </button>
        </section>
    </main>

    <!-- Pop-up Modal for Editing Task -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <form id="editForm">
                <label for="editTaskId">Task ID:</label>
                <input type="text" id="editTaskId" disabled>
                <br>
                <label for="editStaffId">Staff ID:</label>
                <input type="text" id="editStaffId">
                <br>
                <label for="editStaffName">Staff Name:</label>
                <input type="text" id="editStaffName">
                <br>
                <label for="editRoomNumber">Room Number:</label>
                <input type="text" id="editRoomNumber">
                <br>
                <label for="editStatus">Task Status:</label>
                <select id="editStatus">
                    <option value="finished">Finished</option>
                    <option value="unfinished">Unfinished</option>
                </select>
                <br>
                <label for="editDescription">Description:</label>
                <textarea id="editDescription"></textarea>
                <br>
                <button type="button" id="saveEdit">Save Changes</button>
                <div id="editError" style="color: #9B7848; margin-top: 10px;"></div> <!-- Error message area --></div>

            </form>
        </div>
    </div>
    <!-- Pop-up Modal for Adding Task -->
<div id="addModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeAddModal">&times;</span>
        <form id="addForm">
            <label for="addTaskId">Task ID:</label>
            <input type="text" id="addTaskId" required>
            <br>
            <label for="addStaffId">Staff ID:</label>
            <input type="text" id="addStaffId" required>
            <br>
            <label for="addStaffName">Staff Name:</label>
            <input type="text" id="addStaffName" required>
            <br>
            <label for="addRoomNumber">Room Number:</label>
            <input type="text" id="addRoomNumber" required>
            <br>
            <label for="addStatus">Task Status:</label>
            <select id="addStatus">
                <option value="finished">Finished</option>
                <option value="unfinished">Unfinished</option>
            </select>
            <br>
            <label for="addDescription">Description:</label>
            <textarea id="addDescription" required></textarea>
            <br>
            <button type="button" id="saveAdd">Add Task</button>
            <div id="addError" style="color: #9B7848; margin-top: 10px;"></div> <!-- Error message area --></div>
        </form>
    </div>
</div>


    <script>
        const tasks = [
            { taskId: 1, staffId: 101, staffName: 'John Doe', roomNumber: 203, status: 'finished', description: 'Clean room' },
            { taskId: 2, staffId: 102, staffName: 'Jane Smith', roomNumber: 305, status: 'unfinished', description: 'Deliver Towels' },
            { taskId: 3, staffId: 103, staffName: 'Mike Johnson', roomNumber: 210, status: 'finished', description: 'Check Tv ' },
            { taskId: 4, staffId: 104, staffName: 'Emily Davis', roomNumber: 202, status: 'unfinished', description: 'Fix light' },
        ];

        const taskTableBody = document.querySelector('.task-table tbody');
        const editModal = document.getElementById('editModal');
        const addModal = document.getElementById('addModal');
        const closeModal = document.getElementById('closeModal');
        const saveEditButton = document.getElementById('saveEdit');

        
        function renderTasks(filteredTasks) {
            taskTableBody.innerHTML = '';
            filteredTasks.forEach(task => {
                const statusIcon = task.status === 'finished'
                    ? `<i class="fas fa-check-circle finished-icon"></i>`
                    : `<i class="fas fa-exclamation-circle unfinished-icon"></i>`;
                
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${task.taskId}</td>
                    <td>${task.staffId}</td>
                    <td>${task.staffName}</td>
                    <td>${task.roomNumber}</td>
                    <td class="status-icon">${statusIcon} ${task.status.charAt(0).toUpperCase() + task.status.slice(1)}</td>
                    <td>${task.description}</td>
                    <td class="action-icons">
                        <i class="fas fa-edit edit-icon" onclick="editTask(${task.taskId})"></i>
                        <i class="fas fa-trash delete-icon" onclick="deleteTask(${task.taskId})"></i>
                    </td>
                `;
                taskTableBody.appendChild(row);
            });
        }

        renderTasks(tasks);

        function filterTasks() {
            const taskIdFilter = document.getElementById('taskIdInput').value.toLowerCase();
            const staffIdFilter = document.getElementById('staffIdInput').value.toLowerCase();
            const staffNameFilter = document.getElementById('staffNameInput').value.toLowerCase();
            const roomNumberFilter = document.getElementById('roomNumberInput').value.toLowerCase();
            const statusFilter = document.getElementById('statusInput').value.toLowerCase();

            const filteredTasks = tasks.filter(task => {
                return (
                    (taskIdFilter === '' || task.taskId.toString().includes(taskIdFilter)) &&
                    (staffIdFilter === '' || task.staffId.toString().includes(staffIdFilter)) &&
                    (staffNameFilter === '' || task.staffName.toLowerCase().includes(staffNameFilter)) &&
                    (roomNumberFilter === '' || task.roomNumber.toString().includes(roomNumberFilter)) &&
                    (statusFilter === '' || task.status.toLowerCase() === statusFilter)
                );
            });

            renderTasks(filteredTasks);
        }

        function editTask(taskId) {
            const task = tasks.find(t => t.taskId === taskId);
            document.getElementById('editTaskId').value = task.taskId;
            document.getElementById('editStaffId').value = task.staffId;
            document.getElementById('editStaffName').value = task.staffName;
            document.getElementById('editRoomNumber').value = task.roomNumber;
            document.getElementById('editStatus').value = task.status;
            document.getElementById('editDescription').value = task.description;

            // Show the modal
            editModal.style.display = "block";
        }
        // Function to open the Add Task modal
document.getElementById('addTaskButton').onclick = function () {
    addModal.style.display = "block"; // Show the modal
}

// Close the Add Task modal when the user clicks on <span> (x)
closeAddModal.onclick = function () {
    addModal.style.display = "none";
}

// Close the modal when the user clicks anywhere outside of the modal
window.onclick = function (event) {
    if (event.target == addModal) {
        addModal.style.display = "none";
    }
}

// Save new task
document.getElementById('saveAdd').onclick = function () {
    const taskId = parseInt(document.getElementById('addTaskId').value);
    const staffId = document.getElementById('addStaffId').value;
    const staffName = document.getElementById('addStaffName').value;
    const roomNumber = document.getElementById('addRoomNumber').value;
    const status = document.getElementById('addStatus').value;
    const description = document.getElementById('addDescription').value;

    // Add new task to the tasks array
    tasks.push({ taskId, staffId, staffName, roomNumber, status, description });
    renderTasks(tasks);
    addModal.style.display = "none"; // Close the modal after adding
};

        function deleteTask(taskId) {
            // Additional code for deleting the task can be added here.
            const taskIndex = tasks.findIndex(task => task.taskId === taskId);
            if (taskIndex !== -1) {
                tasks.splice(taskIndex, 1); // Remove the task from the array
                renderTasks(tasks);
            }
        }
        

        // Close the modal when the user clicks on <span> (x)
        closeModal.onclick = function () {
            editModal.style.display = "none";
        }

        // Close the modal when the user clicks anywhere outside of the modal
        window.onclick = function (event) {
            if (event.target == editModal) {
                editModal.style.display = "none";
            }
        }

        // Save edited task
        saveEditButton.onclick = function() {
            const taskId = parseInt(document.getElementById('editTaskId').value);
            const staffId = document.getElementById('editStaffId').value;
            const staffName = document.getElementById('editStaffName').value;
            const roomNumber = document.getElementById('editRoomNumber').value;
            const status = document.getElementById('editStatus').value;
            const description = document.getElementById('editDescription').value;

            const taskIndex = tasks.findIndex(t => t.taskId === taskId);
            if (taskIndex !== -1) {
                tasks[taskIndex] = { taskId, staffId, staffName, roomNumber, status, description };
                renderTasks(tasks);
                editModal.style.display = "none"; // Close the modal after saving
            }
        };
        // Save new task
document.getElementById('saveAdd').onclick = function () {
    const taskId = document.getElementById('addTaskId').value;
    const staffId = document.getElementById('addStaffId').value;
    const staffName = document.getElementById('addStaffName').value;
    const roomNumber = document.getElementById('addRoomNumber').value;
    const status = document.getElementById('addStatus').value;
    const description = document.getElementById('addDescription').value;

    // Validation
    const errorMessages = [];
    if (taskId === '' || staffId === '' || roomNumber === '' || staffName === '' || description === '') {
        errorMessages.push('All fields must be filled out.');
    }
    if (isNaN(taskId) || taskId <= 0) {
        errorMessages.push('Task ID must be a positive number.');
    }
    if (isNaN(staffId) || staffId <= 0) {
        errorMessages.push('Staff ID must be a positive number.');
    }
    if (isNaN(roomNumber) || roomNumber <= 0) {
        errorMessages.push('Room Number must be a positive number.');
    }
    if (!/^[a-zA-Z\s]+$/.test(staffName)) {
        errorMessages.push('Staff Name must contain only letters.');
    }

    // Show error messages if any
    const errorDiv = document.getElementById('addError');
    if (errorMessages.length > 0) {
        errorDiv.innerHTML = errorMessages.join('<br>'); // Display errors as text
        return; // Stop execution if there are errors
    } else {
        errorDiv.innerHTML = ''; // Clear previous error messages
    }

    // Add new task to the tasks array
    tasks.push({
        taskId: parseInt(taskId),
        staffId: parseInt(staffId),
        staffName,
        roomNumber: parseInt(roomNumber),
        status,
        description
    });

    renderTasks(tasks);
    addModal.style.display = "none"; // Close the modal after adding
};

// Save edited task
saveEditButton.onclick = function() {
    const taskId = parseInt(document.getElementById('editTaskId').value);
    const staffId = document.getElementById('editStaffId').value;
    const staffName = document.getElementById('editStaffName').value;
    const roomNumber = document.getElementById('editRoomNumber').value;
    const status = document.getElementById('editStatus').value;
    const description = document.getElementById('editDescription').value;

    // Validation
    const errorMessages = [];
    if (staffId === '' || roomNumber === '' || staffName === '' || description === '') {
        errorMessages.push('All fields must be filled out.');
    }
    if (isNaN(staffId) || staffId <= 0) {
        errorMessages.push('Staff ID must be a positive number.');
    }
    if (isNaN(roomNumber) || roomNumber <= 0) {
        errorMessages.push('Room Number must be a positive number.');
    }
    if (!/^[a-zA-Z\s]+$/.test(staffName)) {
        errorMessages.push('Staff Name must contain only letters.');
    }

    // Show error messages if any
    const errorDiv = document.getElementById('editError');
    if (errorMessages.length > 0) {
        errorDiv.innerHTML = errorMessages.join('<br>'); // Display errors as text
        return; // Stop execution if there are errors
    } else {
        errorDiv.innerHTML = ''; // Clear previous error messages
    }

    const taskIndex = tasks.findIndex(t => t.taskId === taskId);
    if (taskIndex !== -1) {
        tasks[taskIndex] = { taskId, staffId: parseInt(staffId), staffName, roomNumber: parseInt(roomNumber), status, description };
        renderTasks(tasks);
        editModal.style.display = "none"; // Close the modal after saving
    }
};
saveEditButton.onclick = function() {
    const taskId = parseInt(document.getElementById('editTaskId').value);
    const staffId = document.getElementById('editStaffId').value;
    const staffName = document.getElementById('editStaffName').value;
    const roomNumber = document.getElementById('editRoomNumber').value;
    const status = document.getElementById('editStatus').value;
    const description = document.getElementById('editDescription').value;

    // Validation
    const errorMessages = [];
    if (staffId === '' || roomNumber === '' || staffName === '' || description === '') {
        errorMessages.push('All fields must be filled out.');
    }
    if (isNaN(staffId) || staffId <= 0) {
        errorMessages.push('Staff ID must be a positive number.');
    }
    if (isNaN(roomNumber) || roomNumber <= 0) {
        errorMessages.push('Room Number must be a positive number.');
    }
    if (!/^[a-zA-Z\s]+$/.test(staffName)) {
        errorMessages.push('Staff Name must contain only letters.');
    }

    // Show error messages if any
    const errorDiv = document.getElementById('editError');
    if (errorMessages.length > 0) {
        errorDiv.innerHTML = errorMessages.join('<br>'); // Display errors as text
        return; // Stop execution if there are errors
    } else {
        errorDiv.innerHTML = ''; // Clear previous error messages
    }

    const taskIndex = tasks.findIndex(t => t.taskId === taskId);
    if (taskIndex !== -1) {
        tasks[taskIndex] = { taskId, staffId: parseInt(staffId), staffName, roomNumber: parseInt(roomNumber), status, description };
        renderTasks(tasks);
        editModal.style.display = "none"; // Close the modal after saving
    }
};

        document.getElementById('taskIdInput').addEventListener('input', filterTasks);
        document.getElementById('staffIdInput').addEventListener('input', filterTasks);
        document.getElementById('staffNameInput').addEventListener('input', filterTasks);
        document.getElementById('roomNumberInput').addEventListener('input', filterTasks);
        document.getElementById('statusInput').addEventListener('input', filterTasks);
    </script>
</body>

</html>
