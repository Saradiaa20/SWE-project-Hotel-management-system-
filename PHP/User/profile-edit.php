<?php
session_start();
include_once "includes/dbh.inc.php";

// Ensure the user is logged in
if (!isset($_SESSION["id"])) {
    header("Location: signinup.php");
    exit();
}

// Get user ID from session
$user_id = $_SESSION["id"];

// Update user profile details
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    // $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash password
    $phone = $_POST["phone"];

    // Handle profile image upload
    $profile_image = $_FILES['profile_image'];
    $upload_dir = "pics/";
    $upload_file = $upload_dir . basename($profile_image["name"]);
    

    // Connect to the database
    $conn = new mysqli('localhost', 'root', '', 'hotel_management');

    // Check for connection errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Move the uploaded file to the `pics` folder
    if (!empty($profile_image["name"])) {
        if (move_uploaded_file($profile_image["tmp_name"], $upload_file)) {
            // Save the image filename to the database
            $image_filename = basename($profile_image["name"]);
            $stmt = $conn->prepare("UPDATE users SET first_name = ?, last_name = ?, email = ?, phone = ?, profile_image = ? WHERE id = ?");
            $stmt->bind_param("sssssi", $first_name, $last_name, $email, $phone, $image_filename, $user_id);
        } else {
            echo "Failed to upload image.";
            exit();
        }
    } else {
        // Update user info without changing the profile image
        $stmt = $conn->prepare("UPDATE users SET first_name = ?, last_name = ?, email = ?, phone = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $first_name, $last_name, $email, $phone, $user_id);
    }

    // Execute the query and redirect
    if ($stmt->execute()) {
        header("Location: profile3.php");
        exit();
    } else {
        echo "Failed to update profile.";
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h2>USER</h2>
            <ul>
                <li><a href="profile3.php">Profile Details</a></li>
                <li><a href="reservations.php">Reservations</a></li>
                <li><a href="feedback.php">Feedback</a></li>
                <li><a href="payment.php">Payment Methods</a></li>
                <li><a href="booking-history.php">Booking History</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </div>
        <div class="main-content">
            <h2 class="profileText">Edit Profile</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label for="profile_image">Profile Picture:</label>
                <input type="file" name="profile_image" id="profile_image" accept="image/*">
                <br>
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" required>
                <br>
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" required>
                <br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <br>
                <label for="phone">Mobile Number:</label>
                <input type="text" id="phone" name="phone" required>
                <br>
                <input type="submit" value="Save Changes">
            </form>
        </div>
    </div>
</body>
</html>
