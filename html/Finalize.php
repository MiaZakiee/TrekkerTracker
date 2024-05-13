<?php
session_start();
include('connect.php');

if (!isset($_SESSION['username']) || !$_SESSION['username'] || !isset($_SESSION['userID']) || !$_SESSION['userID']) {
    echo "<script>
    location.replace('./loginPage.php');
    </script>";
}

if (isset($_POST['selected_origin']) && isset($_POST['selected_destination']) && isset($_POST['origintmp']) && isset($_POST['destinationtmp']) && isset($_POST['Accommodation']) &&  isset($_POST['Departure_DT']) && isset($_POST['Arrival_DT']) && isset($_POST['tmpDeparture_DT']) && isset($_POST['tmpArrival_DT'])) {

    $origin = $_POST['selected_origin'];
    $destination = $_POST['selected_destination'];
    $origtmp = $_POST['origintmp'];
    $desttmp = $_POST['destinationtmp'];
    $DTDepart = $_POST['Departure_DT'];
    $DTArrive = $_POST['Arrival_DT'];
    $tmpDTDepart = $_POST['tmpDeparture_DT'];
    $tmpDTArrive = $_POST['tmpArrival_DT'];
    $accommodation = $_POST['Accommodation'];
    $user_id = $_SESSION['userID']; // Fetch user_id from session variable

    $timego_formatted = new DateTime($DTDepart);
    $timearrive_formatted = new DateTime($DTArrive);
    $timegotmp_formatted = (empty($tmpDTDepart)) ? null : new DateTime($tmpDTDepart);
    $timearrivetmp_formatted = (empty($tmpDTArrive)) ? null : new DateTime($tmpDTArrive);
}

?>


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
                        . "&nbsp;" . $time_str1 . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $time_str2;
                    ?>
                </td>
                <td><?php echo $accommodation ?></td>
                <td>FX3R1</td>
                <td>PHP 7,500</td>
            </tr>
        </table>
        <?php if ($origtmp !== "" && $desttmp !== "") { ?>
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
                            . "&nbsp;" . $time_str1 . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $time_str2;
                        ?>
                    </td>
                    <td><?php echo $accommodation ?></td>

                    <td>FX3R1</td>
                    <td>PHP 13,500</td>
                </tr>
            </table>

        <?php } ?>
        <form action="Transaction.php" method="post" id="hiddenform">
            <input type="hidden" name="origin" value="<?php echo $origin; ?>">
            <input type="hidden" name="destination" value="<?php echo $destination; ?>">
            <input type="hidden" name="origin_tmp" value="<?php echo $origtmp; ?>">
            <input type="hidden" name="destination_tmp" value="<?php echo $desttmp; ?>">
            <input type="hidden" name="departure_dt" value="<?php echo $DTDepart; ?>">
            <input type="hidden" name="arrival_dt" value="<?php echo $DTArrive; ?>">
            <input type="hidden" name="tmp_departure_dt" value="<?php echo $tmpDTDepart; ?>">
            <input type="hidden" name="tmp_arrival_dt" value="<?php echo $tmpDTArrive; ?>">
            <input type="hidden" name="accommodation" value="<?php echo $accommodation; ?>">
            <button id="coolbut" type="submit">
                <img src="./icons/home.png" alt="Home">
            </button>
        </form>

    </div>
</body>

</html>