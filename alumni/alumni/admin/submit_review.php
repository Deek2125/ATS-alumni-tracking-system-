<?php
include 'admin/db_connect.php';

// Assuming you have a user authentication system
$user_id = $_SESSION['login_id'];

// Get data from the form
$alumni_id = $_POST['alumni_id'];
$rating = $_POST['rating'];
$review = $_POST['review'];

// Insert review into the database
$stmt = $conn->prepare("INSERT INTO alumni_reviews (alumni_id, user_id, rating, review) VALUES (?, ?, ?, ?)");
$stmt->bind_param("iiis", $alumni_id, $user_id, $rating, $review);
$result = $stmt->execute();

if ($result) {
    echo "Review submitted successfully";
} else {
    echo "Failed to submit review";
}
?>