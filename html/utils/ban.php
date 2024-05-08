<?php
include '../connect.php'; // Include the file that defines $connection
session_start();

if (isset($_GET['user_id'])) {
    $userId = intval($_GET['user_id']); 
    $stmt = $connection->prepare("UPDATE tbluseraccount SET isBanned = 1 WHERE user_id = ?");
    $stmt->bind_param("i", $userId); 

    if ($stmt->execute()) {
        echo "User successfully banned.";
    } else {
        echo "Error banning user: " . $stmt->error;
    }

    $stmt->close(); 
} else {
    echo "No user ID provided.";
}

header('Location: ../AdminDashboard.php'); 

