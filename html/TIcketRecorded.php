<?php
session_start();
include ('connect.php');
if (isset($_POST['origin']) && isset($_POST['destination']) && isset($_POST['origtmp']) && isset($_POST['desttmp']) && isset($_POST['DTDepart']) &&  isset($_POST['DTArrive']) && isset($_POST['tmpDTDepart']) && isset($_POST['tmpDTArrive']) && isset($_POST['accommodation'])) {

    $origin = $_POST['origin'];
    $destination = $_POST['destination'];
    $origtmp = $_POST['origtmp'];
    $desttmp = $_POST['desttmp'];
    $DTDepart = $_POST['DTDepart'];
    $DTArrive = $_POST['DTArrive'];
    $tmpDTDepart = $_POST['tmpDTDepart'];
    $tmpDTArrive = $_POST['tmpDTArrive'];
    $accommodation = $_POST['accommodation'];
    $user = $_SESSION['username'];
    $n = 0;


    $sql = "INSERT INTO tblbookingsystem (Origin, Destination, Owner, Seat_Accomodation, isCharter,Departure_DT, Arrival_DT) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connection, $sql);
    $sql1 = "";
    if($tmpDTArrive !== "" && $tmpDTDepart !== ""){
        $sql1 = "INSERT INTO tblbookingsystem (Origin, Destination, Owner, Seat_Accomodation, isCharter,Departure_DT, Arrival_DT) VALUES (?, ?, ?, ?, ?, ?, ?)";
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
        mysqli_stmt_bind_param($stmt, "sssssss", $origin, $destination, $user, $accommodation, $n, $format, $format1);


        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            error_log("Booking successful for Ticket 1!");
            if($stmt1 === "")
                $_SESSION['message'] = "Booking Successful";
        } else {
            error_log("Error: Booking failed. " . mysqli_error($connection));
        }

        // Close the statement
        mysqli_stmt_close($stmt);

    } else {
        error_log("Error: Statement preparation failed.");
    }
    if($stmt1 !== ""){
        $format2 = $timegotmp_formatted->format('Y-m-d H:i');
        $format3 = $timearrivetmp_formatted->format('Y-m-d H:i');
        mysqli_stmt_bind_param($stmt1, "sssssss", $origtmp, $desttmp, $user, $accommodation, $n, $format2, $format3);

        // Execute the statement
        if (mysqli_stmt_execute($stmt1)) {
            error_log("Booking successful for Ticket 2!");
            $_SESSION['message'] = "Booking Successful";

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
    $_SESSION['message'] = "Failed Booking";
    echo "<script>window.location.replace('./index.php')</script>";

}





?>