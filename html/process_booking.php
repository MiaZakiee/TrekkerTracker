<?php
include('connect.php');
$origin = isset($_POST['Origin']) ? trim($_POST['Origin']) : '';
$destination = isset($_POST['Destination']) ? trim($_POST['Destination']) : '';
$accommodation = isset($_POST['Accommodation']) ? trim($_POST['Accommodation']) : '';
$departureDate = isset($_POST['DateInput1']) ? ($_POST['DateInput1']) : '';
$charter = isset($_POST['Chartered']) ? trim($_POST['Chartered']) : '';

$errors = [];
if (empty($origin)) {
    $errors[] = "Please select an origin.";
}
if (empty($destination)) {
    $errors[] = "Please select a destination.";
}
if (empty($accommodation)) {
    $errors[] = "Please select a seat class.";
}
if (empty($departureDate)) {
    $errors[] = "Please enter a departure date.";
}

// Handle errors
if (!empty($errors)) {
    echo "<h3>Error! Please fix the following:</h3>";
    echo "<ul>";
    foreach ($errors as $error) {
        echo "<li>$error</li>";
    }
    echo "</ul>";

    // We optionally pre-fill form data (avoid data loss)
    // but idk yet
} else {


    $sql = "INSERT INTO bookingsystem (Origin, Destination, Seat_Accomodation, CharterFlight, Date) VALUES ('" . $origin . "', '" . $destination . "', '" . $accommodation . "', '" . $charter . "', '" . $departureDate . "')";
    $result = mysqli_query($connection, $sql);

}

?>