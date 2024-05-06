

<?php
include('connect.php');

if (isset($_POST['selected_origin']) && isset($_POST['selected_destination']) && isset($_POST['origintmp']) && isset($_POST['destinationtmp']) && isset($_POST['Accommodation']) && isset($_POST['selected_date']) && isset($_POST['selected_time_initial']) && isset($_POST['selected_time_destination']) && isset($_POST['timetmp']) && isset($_POST['desttmp']) ) {

    $origin = $_POST['selected_origin'];
    $destination = $_POST['selected_destination'];
    $origtmp = $_POST['origintmp'];
    $desttmp = $_POST['destinationtmp'];
    $timego = $_POST['selected_time_initial'];
    $timearrive = $_POST['selected_time_destination'];
    $date = $_POST['selected_date'];
    $timegotmp = $_POST['timetmp'];
    $timearritmp = $_POST['desttmp'];
    $accommodation = $_POST['Accommodation'];


    $sql = "INSERT INTO bookingsystem (origin, destination, seat_accommodation, date, Departure_time, Arrival_time) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connection, $sql);

  // Format time strings and bind parameters
  $timego_formatted = new DateTime($timego);
  $timearrive_formatted = new DateTime($timearrive);
$timegotmp_formatted = (empty($timegotmp)) ? null : new DateTime($timegotmp);
$timearrivetmp_formatted = (empty($timearritmp)) ? null : new DateTime($timearritmp);
  if ($stmt) {
      $format = $timego_formatted->format('Y-m-d H:i:s');
      $format1 = $timearrive_formatted->format('Y-m-d H:i:s');
      mysqli_stmt_bind_param($stmt, "ssssss", $origin, $destination, $accommodation, $date, $format, $format1 );

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
      echo "Booking successful!";  // Or handle success differently
    } else {
      echo "Error: Booking failed. " . mysqli_error($connection);  // Handle error
    }

    // Close the statement
    mysqli_stmt_close($stmt);
  } else {
    echo "Error: Statement preparation failed."; // Handle statement preparation error
  }

} else {
  // Handle missing form data

}






?>
<html>
<head>
    <link href="./css/styles.css" rel="stylesheet">
</head>
<body>
<div style="width: 100vw; align-items: center;">
    <h1 style="margin-left: 20%">Finalizing Tickets</h1>
    <div class = "ticks">
        <div style="flex-direction: column">
        <p style="font-weight: bold; font-size: 30px;"><?php echo $origin; ?> to <?php echo $destination; ?></p>
        <p style="font-size: 20px;"> <?php echo $timego; ?>  --->  <?php echo $timearrive; ?></p>
        </div>
        <h2 class = "spacing" >FX3R1</h2>
        <h3 class = "spacing"> PHP 7,500</h3>
    </div>
    <div class = "ticks">
        <div style="flex-direction: column">
        <p style="font-weight: bold; font-size: 30px;"><?php echo $origtmp; ?> to <?php echo $desttmp; ?></p>
        <p style="font-size: 20px;"> <?php echo $timegotmp; ?>  --->  <?php echo $timearritmp; ?></p>
        </div>
        <h2 class = "spacing">FX3R1</h2>
        <h3 class = "spacing"> PHP 13,500</h3>
    </div>
</div>
</body>
</html>
