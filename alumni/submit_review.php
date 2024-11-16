<?php
// Database connection
$servername = "localhost"; // Your MySQL server address, usually localhost
$username = "root";        // Your MySQL username
$password = "";            // Your MySQL password
$dbname = "alumni_db";     // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['Name'];
$rating = $_POST['rating'];
$comment = $_POST['comment'];

// SQL query to insert data into the database
$sql = "INSERT INTO reviews (name, rating, comment) VALUES ('$name', '$rating', '$comment')";

if ($conn->query($sql) === TRUE) {
    // Return a success message
    echo "Review submitted successfully!";
} else {
    // If there's an error in the query, display the error
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>
