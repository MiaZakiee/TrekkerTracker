<?php
session_start();
include ('connect.php');
if(isset($_SESSION['origin']) && isset($_SESSION['destination']) && isset($_SESSION['originTMP']) && isset($_SESSION['destiTMP']) && isset($_SESSION['Departure_DT']) && isset($_SESSION['Arrival_DT']) && isset($_SESSION['tmpDeparture_DT']) && isset($_SESSION['tmpArrival_DT']) && isset($_SESSION['Accommodation'])) {

    $origin = $_SESSION['origin'];
    $destination = $_SESSION['destination'];
    $origtmp = $_SESSION['originTMP'];
    $desttmp = $_SESSION['destiTMP'];
    $DTDepart = $_SESSION['Departure_DT'];
    $DTArrive = $_SESSION['Arrival_DT'];
    $tmpDTDepart = $_SESSION['tmpDeparture_DT'];
    $tmpDTArrive = $_SESSION['tmpArrival_DT'];
    $accommodation = $_SESSION['Accommodation'];
    $user = $_SESSION['username'];
    $n = 0;
    $p = 1;


    $sql = "INSERT INTO tblbookingsystem (Origin, Destination, Owner, flight_id, Seat_Accomodation, isCharter,Departure_DT, Arrival_DT) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connection, $sql);
    $sql1 = "";
    if($tmpDTArrive !== "" && $tmpDTDepart !== ""){
        $sql1 = "INSERT INTO tblbookingsystem (Origin, Destination, Owner, flight_id, Seat_Accomodation, isCharter,Departure_DT, Arrival_DT) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
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
        mysqli_stmt_bind_param($stmt, "ssssssss", $origin, $destination, $user, $p, $accommodation, $n, $format, $format1);


        if (mysqli_stmt_execute($stmt)) {
            error_log("Booking successful for Ticket 1!");
            if($stmt1 === "")
                $_SESSION['message'] = "Booking Successful";
        } else {
            error_log("Error: Booking failed. " . mysqli_error($connection));
        }

        mysqli_stmt_close($stmt);

    } else {
        error_log("Error: Statement preparation failed.");
    }

    if($stmt1 !== ""){
        $format2 = $timegotmp_formatted->format('Y-m-d H:i');
        $format3 = $timearrivetmp_formatted->format('Y-m-d H:i');
        mysqli_stmt_bind_param($stmt1, "ssssssss", $origtmp, $desttmp, $user, $p, $accommodation, $n, $format2, $format3);

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

    if( $_SESSION['isReturn'] === "1"){
        
        $RetDTDepart = $_SESSION['ReturnDep'];
        $RetDTArrive = $_SESSION['ReturnArri'];
        $RettmpDTDepart = $_SESSION['ReturnTmpDep'];
        $RettmpDTArrive = $_SESSION['ReturnTmpArri'];

        
        
    $sql = "INSERT INTO tblbookingsystem (Origin, Destination, Owner, flight_id, Seat_Accomodation, isCharter,Departure_DT, Arrival_DT) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connection, $sql);
    $sql1 = "";
    if($tmpDTArrive !== "" && $tmpDTDepart !== ""){
        $sql1 = "INSERT INTO tblbookingsystem (Origin, Destination, Owner, flight_id, Seat_Accomodation, isCharter,Departure_DT, Arrival_DT) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt1 = mysqli_prepare($connection, $sql1);

    }

    // Format time strings and bind parameters
    $timego_formatted = new DateTime($RetDTDepart);
    $timearrive_formatted = new DateTime($RetDTArrive);
    $timegotmp_formatted = (empty($tmpDTDepart)) ? null : new DateTime($RettmpDTDepart);
    $timearrivetmp_formatted = (empty($tmpDTArrive)) ? null : new DateTime($RettmpDTArrive);
    if($stmt1 !== ""){
        $format2 = $timegotmp_formatted->format('Y-m-d H:i');
        $format3 = $timearrivetmp_formatted->format('Y-m-d H:i');
        mysqli_stmt_bind_param($stmt1, "ssssssss", $desttmp, $origtmp, $user, $p, $accommodation, $n, $format2, $format3);

        // Execute the statement
        if (mysqli_stmt_execute($stmt1)) {
            error_log("Booking successful for Returning Ticket 1!");
            $_SESSION['message'] = "Booking Successful";


        } else {
            error_log("Error: Booking failed. " . mysqli_error($connection));
        }

        // Close the statement
        mysqli_stmt_close($stmt1);
    } else {
        error_log( "Failed First Return Flight"); // Handle statement preparation error
    }

    if ($stmt) {
        $format = $timego_formatted->format('Y-m-d H:i');
        $format1 = $timearrive_formatted->format('Y-m-d H:i');
        mysqli_stmt_bind_param($stmt, "ssssssss", $destination, $origin, $user, $p, $accommodation, $n, $format, $format1);


        if (mysqli_stmt_execute($stmt)) { 
            error_log("Booking successful for Returning Ticket 2!");
            if($stmt1 === "")
                $_SESSION['message'] = "Booking Successful";
        } else {
            error_log("Error: Booking failed. " . mysqli_error($connection));
        }

        mysqli_stmt_close($stmt);

    } else {
        error_log("Error: Statement preparation failed.");
    }

    
    }

} else {
    error_log( "Wa wah");
    $_SESSION['message'] = "Failed Booking";


}


unset($_SESSION['origin']);
unset($_SESSION['destination']);
unset($_SESSION['originTMP']);
unset($_SESSION['destiTMP']);
unset($_SESSION['Departure_DT']);
unset($_SESSION['Arrival_DT']);
unset($_SESSION['tmpDeparture_DT']);
unset($_SESSION['tmpArrival_DT']);
unset($_SESSION['Accommodation']);
unset($_SESSION['ReturnDep']);
unset($_SESSION['ReturnArri']);
unset($_SESSION['ReturnTmpDep']);
unset($_SESSION['ReturnTmpArri']);
unset($_SESSION['isReturn']);


echo "<script>window.location.replace('./index.php')</script>";





?>