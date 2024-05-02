<?php
include '../connect.php'; // Include the file that defines $connection
session_start();

// Check for user_id in the GET request
if (isset($_GET['user_id'])) {
    $userId = intval($_GET['user_id']); // Convert to integer to prevent SQL Injection

    // Prepare a statement for updating the ban status
    $stmt = $connection->prepare("UPDATE tbluseraccount SET isBanned = 0 WHERE user_id = ?");
    $stmt->bind_param("i", $userId); // Bind the integer parameter

    // Execute and check if it was successful
    if ($stmt->execute()) {
        echo "User successfully banned.";
    } else {
        echo "Error banning user: " . $stmt->error;
    }

    $stmt->close(); // Close the prepared statement
} else {
    echo "No user ID provided.";
}

header('Location: ../AdminDashboard.php'); // Redirect back to user list or relevant page

