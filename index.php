<?php
// Database connection settings
$servername = "localhost";
$username = "root"; // or your MySQL username
$password = ""; // or your MySQL password
$dbname = "abcd_db"; // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch usernames
$sql = "SELECT first_name FROM users ORDER BY created_time DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Photo ABCD Users</title>
</head>
<body>
    <h1>Registered Users</h1>
    <ul>
        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<li>" . htmlspecialchars($row["first_name"]) . "</li>";
            }
        } else {
            echo "<p>No users found.</p>";
        }
        $conn->close();
        ?>
    </ul>
</body>
</html>
