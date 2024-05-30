<?php
session_start();
include('connect.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if all necessary fields are provided in the form submission
if (
    isset($_POST['origin']) && isset($_POST['DTArrive']) && isset($_POST['item_id'])
    && isset($_POST['destination']) && isset($_POST['tmpDTDepart'])
    && isset($_POST['origtmp']) && isset($_POST['tmpDTArrive'])
    && isset($_POST['desttmp']) && isset($_POST['accommodation'])
    && isset($_POST['DTDepart'])
) {
    // Retrieve all form data
    $origin = $_POST['origin'];
    $destination = $_POST['destination'];
    $origtmp = $_POST['origtmp'];
    $desttmp = $_POST['desttmp'];
    $DTDepart = $_POST['DTDepart'];
    $DTArrive = $_POST['DTArrive'];
    $tmpDTDepart = $_POST['tmpDTDepart'];
    $tmpDTArrive = $_POST['tmpDTArrive'];
    $accommodation = $_POST['accommodation'];
    $item_id = $_POST['item_id']; // Retrieve item_id here
    $item_id2 = $_POST['item_id2']; // Retrieve item_id here
    $user_id = $_SESSION['userID']; // Fetch user_id from session variable
    $charter = 0;

    // Insert into tblBookings
    $sql = "INSERT INTO tblbookingsystem (user_id, flight_id, Origin, Destination, Seat_Accomodation, CharterFlight, departure_dt, arrival_dt) VALUES (?,?,?,?,?,?,?,?)";
    $booking = $connection->prepare($sql);

    // Check if the prepare() method was successful
    if ($booking === false) {
        die('Prepare failed: ' . htmlspecialchars($connection->error));
    }

    $booking->bind_param("iissssss", $user_id, $item_id, $origin, $destination, $accommodation, $charter, $DTDepart, $DTArrive);

    // Execute the prepared statement
    $booking->execute();

    // Check if the booking was successfully inserted
    if ($booking->affected_rows > 0) {
        echo "Booking successful!";
    } else {
        echo "Booking failed: " . htmlspecialchars($booking->error);
    }

    // Close the statement
    $booking->close();

    if ($tmpDTArrive !== "" && $tmpDTDepart !== "") {
        // $sql1 = "INSERT INTO tblbookingsystem (Origin, Destination, Owner, Seat_Accomodation, isCharter,Departure_DT, Arrival_DT) VALUES (?, ?, ?, ?, ?, ?, ?)";
        // $sql2 = $connection->prepare("INSERT INTO tblbookingsytem (user_id, flight_id, Origin, Destination, Seat_Accomodation, charter, DTDepart, DTArrive) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        // $sql2->bind_param("iissssss", $user_id, $item_id, $origtmp, $desttmp, $accommodation, $charter, $tmpDTDepart, $tmpDTArrive);
        // $sql2->execute();

        // Insert into tblBookings
        $sql2 = "INSERT INTO tblbookingsystem (user_id, flight_id, Origin, Destination, Seat_Accomodation, CharterFlight, departure_dt, arrival_dt) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $booking2 = $connection->prepare($sql2);

        // Check if the prepare() method was successful
        if ($booking2 === false) {
            die('Prepare failed: ' . htmlspecialchars($connection->error));
        }

        $booking2->bind_param("iissssss", $user_id, $item_id2, $origtmp, $desttmp, $accommodation, $charter, $tmpDTDepart, $tmpDTArrive);

        // Execute the prepared statement
        $booking2->execute();

        // Check if the booking was successfully inserted
        if ($booking2->affected_rows > 0) {
            echo "Booking successful!";
        } else {
            echo "Booking failed: " . htmlspecialchars($booking->error);
        }

        // Close the statement
        $booking2->close();
    }
} else {
    // Handle missing fields gracefully
    echo "Required fields are missing.";
}
