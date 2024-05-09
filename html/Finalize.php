

<?php
include('connect.php');

if (isset($_POST['selected_origin']) && isset($_POST['selected_destination']) && isset($_POST['origintmp']) && isset($_POST['destinationtmp']) && isset($_POST['Accommodation']) &&  isset($_POST['Departure_DT']) && isset($_POST['Arrival_DT']) && isset($_POST['tmpDeparture_DT']) && isset($_POST['tmpArrival_DT']) ) {

    $origin = $_POST['selected_origin'];
    $destination = $_POST['selected_destination'];
    $origtmp = $_POST['origintmp'];
    $desttmp = $_POST['destinationtmp'];
    $DTDepart = $_POST['Departure_DT'];
    $DTArrive = $_POST['Arrival_DT'];
    $tmpDTDepart = $_POST['tmpDeparture_DT'];
    $tmpDTArrive = $_POST['tmpDeparture_DT'];
    $accommodation = $_POST['Accommodation'];


    $sql = "INSERT INTO tblbookingsystem (Origin, Destination, Seat_Accomodation, Departure_DT, Arrival_DT) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connection, $sql);

  // Format time strings and bind parameters
    $timego_formatted = new DateTime($DTDepart);
    $timearrive_formatted = new DateTime($DTArrive);
    $timegotmp_formatted = (empty($tmpDTDepart)) ? null : new DateTime($tmpDTDepart);
    $timearrivetmp_formatted = (empty($tmpDTArrive)) ? null : new DateTime($tmpDTArrive);
  if ($stmt) {
      $format = $timego_formatted->format('Y-m-d H:i');
      $format1 = $timearrive_formatted->format('Y-m-d H:i');
      mysqli_stmt_bind_param($stmt, "sssss", $origin, $destination, $accommodation, $format, $format1);


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
        <p style="font-size: 20px;"> <?php echo $DTDepart; ?>  --->  <?php echo $DTArrive; ?></p>
        </div>
        <h2 class = "spacing" >FX3R1</h2>
        <h3 class = "spacing"> PHP 7,500</h3>
    </div>
    <?php if($origtmp !== "" && $desttmp !== ""){ ?>
    <div class = "ticks">
        <div style="flex-direction: column">
        <p style="font-weight: bold; font-size: 30px;"><?php echo $origtmp; ?> to <?php echo $desttmp; ?></p>
        <p style="font-size: 20px;"> <?php echo $tmpDTDepart; ?>  --->  <?php echo $tmpDTArrive; ?></p>
        </div>
        <h2 class = "spacing">FX3R1</h2>
        <h3 class = "spacing"> PHP 13,500</h3>
    </div>
    <?php } ?>
</div>
</body>
</html>
