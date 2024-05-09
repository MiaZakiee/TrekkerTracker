

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
    $tmpDTArrive = $_POST['tmpArrival_DT'];
    $accommodation = $_POST['Accommodation'];


    $sql = "INSERT INTO tblbookingsystem (Origin, Destination, Seat_Accomodation, Departure_DT, Arrival_DT) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connection, $sql);
    if($tmpDTArrive !== "" && $tmpDTDepart !== ""){
        $sql1 = "INSERT INTO bookingsystem (Origin, Destination, seat_accommodation, Departure_DT, Arrival_DT) VALUES (?, ?, ?, ?, ?)";
        $stmt1 = mysqli_prepare($connection, $sql1);

    }

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
      error_log("Booking successful for Ticket 1!");
    } else {
       error_log("Error: Booking failed. " . mysqli_error($connection));
    }

    // Close the statement
    mysqli_stmt_close($stmt);
  } else {
      error_log("Error: Statement preparation failed.");
  }
  if($stmt1){
      $format2 = $timegotmp_formatted->format('Y-m-d H:i');
      $format3 = $timearrivetmp_formatted->format('Y-m-d H:i');
      mysqli_stmt_bind_param($stmt1, "sssss", $origtmp, $desttmp, $accommodation, $format2, $format3);

      // Execute the statement
      if (mysqli_stmt_execute($stmt1)) {
          error_log("Booking successful for Ticket 2!");
      } else {
          error_log("Error: Booking failed. " . mysqli_error($connection));
      }

      // Close the statement
      mysqli_stmt_close($stmt1);
  } else {
      error_log( "Only One Ticket"); // Handle statement preparation error
  }

} else {
    error_log( "Wa wah");

}






?>
<html>
<head>
    <link href="./css/styles.css" rel="stylesheet">
</head>
<body>


<div style="width: 100vw; align-items: center;">

    <h1 style="margin: 80px 0 40px 18%;">Finalizing Tickets</h1>
    <table>
        <tr>
            <th>Destination</th>
            <th>Date & Time</th>
            <th>Seat Accommodation</th>
            <th>Flight ID</th>
            <th>Price</th>
        </tr>
        <tr>
            <td>
                <?php echo $origin; ?> to <?php echo $destination; ?>
            </td>
            <td>
                <?php
                $date_str1 = $timego_formatted->format('F j, Y'); // Outputs May 5, 2023
                $time_str1 = $timego_formatted->format('g:i A'); // Outputs 5:00 AM
                $date_str2 = $timearrive_formatted->format('F j, Y'); // Outputs May 5, 2023
                $time_str2 = $timearrive_formatted->format('g:i A'); // Outputs 5:00 AM

                ?>
                <?php echo $date_str1 . '<img src = "./icons/airplane.png" alt="Arrow" style="margin: 0 25px;">' . $date_str2 . "<br>"
                    . "&nbsp;" .$time_str1 . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $time_str2;
                ?>
            </td>
            <td><?php echo $accommodation ?></td>
            <td>FX3R1</td>
            <td>PHP 7,500</td>
        </tr>
    </table>
    <?php if($origtmp !== "" && $desttmp !== ""){ ?>
        <table>
            <tr>
                <th>Destination</th>
                <th>Date & Time</th>
                <th>Seat Accommodation</th>
                <th>Flight ID</th>
                <th>Price</th>
            </tr>
            <tr>
                <td>
                    <?php echo $origtmp; ?> to <?php echo $desttmp; ?>
                </td>
                <td>
                    <?php
                    $date_str1 = $timegotmp_formatted->format('F j, Y'); // Outputs May 5, 2023
                    $time_str1 = $timegotmp_formatted->format('g:i A'); // Outputs 5:00 AM
                    $date_str2 = $timearrivetmp_formatted->format('F j, Y'); // Outputs May 5, 2023
                    $time_str2 = $timearrivetmp_formatted->format('g:i A'); // Outputs 5:00 AM

                    ?>
                    <?php echo $date_str1 . '<img src = "./icons/airplane.png" alt="Arrow" style="margin: 0 25px;">' . $date_str2 . "<br>"
                        . "&nbsp;" .$time_str1 . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $time_str2;
                    ?>
                </td>
                <td><?php echo $accommodation ?></td>

                <td>FX3R1</td>
                <td>PHP 13,500</td>
            </tr>
        </table>

    <?php } ?>
    <button id ="coolbut" type = "button" onclick="location.href='index.php'">Back Home</button>
</div>
</body>
</html>
