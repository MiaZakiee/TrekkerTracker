<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if (isset($_POST['Origin']) && isset($_POST['Destination']) && isset($_POST['Accommodation']) && isset($_POST['DateInput1'])) {

    $origin = $_POST['Origin'];
    $destination = $_POST['Destination'];
    $accommodation = $_POST['Accommodation'];
    $date = $_POST['DateInput1'];


    if (empty($origin) || empty($destination) || empty($accommodation) || empty($date)) {
        $errorMessage = "Please fill out all required fields.";
    } else {

        $successMessage = "Your travel request has been submitted!";

    }

}

?>

<html>
<head>
    <link href="./css/styles.css" rel="stylesheet">
</head>
<body>

<?php
include('connect.php');

if (isset($errorMessage)) {
    echo "<p style='color: red;'>Error: $errorMessage</p>";


}

if (isset($successMessage)) {
    echo "<p style='color: green;'>Success: $successMessage</p>";



    [$formatted_date, $days_since_reference] = convert_and_format_date($date);

    if ($formatted_date) {
        echo "Formatted date: $formatted_date\n";  // Output: Formatted date: 2024 04 02
        echo "Days since reference date: $days_since_reference\n";
        $date_object = DateTimeImmutable::createFromFormat('Y m d', $formatted_date);


        $sql_date_format = $date_object->format('Y-m-d'); // Adjust format if needed
        echo $origin." " . $destination." ".$accommodation.' '.$formatted_date;
        $sql = "INSERT INTO tblbookingsystem (origin, destination, seat_accomodation, charterflight, date) VALUES ('" . $origin . "', '" . $destination . "', '" . $accommodation . "', 0, '" . $sql_date_format  . "')";
        mysqli_query($connection, $sql);

    }

}


function convert_and_format_date($date_string) {
    $reference_date = new DateTimeImmutable('1970-01-01');

  try {
    // Convert the date string to a DateTime object using month name
    $date_object = DateTimeImmutable::createFromFormat('F j, Y', $date_string);

    // Calculate the number of days since the reference date
    $delta = $date_object->diff($reference_date);
    $days_since_reference = $delta->days;

    // Format the date object into 'YYYY MM DD' format
    $formatted_date = $date_object->format('Y m d');

    return [$formatted_date, $days_since_reference];

  } catch (Exception $e) {
    // Handle potential parsing errors
    echo "Error: Invalid date format. Please use 'month day year' format (e.g., April 2, 2024).";
    return [null, null];
  }
}



?>

</body>
<script src="./script/script.js"></script>
</html>