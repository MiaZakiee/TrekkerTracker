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
        // (Optional) Perform additional data processing here

        // Success message (you can redirect to another page here)
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

if (isset($errorMessage)) {
    echo "<p style='color: red;'>Error: $errorMessage</p>";
}

if (isset($successMessage)) {
    echo "<p style='color: green;'>Success: $successMessage</p>";
}
?>

</body>
<script src="./script/script.js"></script>
</html>