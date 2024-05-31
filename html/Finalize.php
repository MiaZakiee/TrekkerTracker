<?php
session_start();
include('connect.php');

unset($_SESSION['prev']);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['timeslotData'])) {
        if (isset($_POST['passNum']))
            $_SESSION['PassNum'] = intval($_POST['passNum']);

        parse_str($_POST['timeslotData'], $timeslots);

        if (
            isset($timeslots['selected_origin']) && isset($timeslots['selected_destination'])
            && isset($timeslots['origintmp']) && isset($timeslots['destinationtmp'])
            && isset($timeslots['Accommodation']) &&  isset($timeslots['Departure_DT'])
            && isset($timeslots['Arrival_DT']) && isset($timeslots['tmpDeparture_DT'])
            && isset($timeslots['tmpArrival_DT'])
        ) {

            $origin = $timeslots['selected_origin'];
            $destination = $timeslots['selected_destination'];
            $origtmp = $timeslots['origintmp'];
            $desttmp = $timeslots['destinationtmp'];
            $DTDepart = $timeslots['Departure_DT'];
            $DTArrive = $timeslots['Arrival_DT'];
            $tmpDTDepart = $timeslots['tmpDeparture_DT'];
            $tmpDTArrive = $timeslots['tmpArrival_DT'];
            $accommodation = $timeslots['Accommodation'];
            $user_id = $_SESSION['userID'];

            $_SESSION['origin'] = $origin;
            $_SESSION['destination'] = $destination;
            $_SESSION['originTMP'] = $origtmp;
            $_SESSION['destiTMP'] = $desttmp;
            $_SESSION['Departure_DT'] = $DTDepart;
            $_SESSION['Arrival_DT'] = $DTArrive;
            $_SESSION['tmpDeparture_DT'] = $tmpDTDepart;
            $_SESSION['tmpArrival_DT'] = $tmpDTArrive;
            $_SESSION['Accommodation'] = $accommodation;

            if ($_SESSION['isReturn'] === "1") {
                if (isset($_POST['timeslot2Data'])) {
                    parse_str($_POST['timeslot2Data'], $timeslots2);
                    $_SESSION['ReturnDep'] = $timeslots2['RetDeparture_DT'];
                    $_SESSION['ReturnArri'] = $timeslots2['RetArrival_DT'];
                    $_SESSION['ReturnTmpDep'] = $timeslots2['RettmpDeparture_DT'];
                    $_SESSION['ReturnTmpArri'] = $timeslots2['RettmpArrival_DT'];
                }
            }
        }
        echo json_encode(array("status" => "success"));
        echo exit();
    }
}
if (!isset($_SESSION['username']) || !isset($_SESSION['userID'])) {

    $_SESSION['prev'] = './Finalize.php';
    echo "<script> console.log('This is Going To Login First!'); </script>";


    echo "<script>
       
        location.replace('./loginPage.php');
    
        </script>";
} else if (
    isset($_SESSION['origin']) && isset($_SESSION['destination']) && isset($_SESSION['originTMP'])
    && isset($_SESSION['destiTMP']) && isset($_SESSION['Departure_DT'])
    && isset($_SESSION['Arrival_DT']) && isset($_SESSION['tmpDeparture_DT'])
    && isset($_SESSION['tmpArrival_DT']) && isset($_SESSION['Accommodation'])
) {
    error_log('This is From Login!');

    $origin = $_SESSION['origin'];
    $destination = $_SESSION['destination'];
    $origtmp = $_SESSION['originTMP'];
    $desttmp = $_SESSION['destiTMP'];
    $DTDepart = $_SESSION['Departure_DT'];
    $DTArrive = $_SESSION['Arrival_DT'];
    $tmpDTDepart = $_SESSION['tmpDeparture_DT'];
    $tmpDTArrive = $_SESSION['tmpArrival_DT'];
    $accommodation = $_SESSION['Accommodation'];
    $user_id = $_SESSION['userID'];

    if ($_SESSION['isReturn'] === "1") {

        $retDep = $_SESSION['ReturnDep'];
        $retArr = $_SESSION['ReturnArri'];
        $retTmpDep = $_SESSION['ReturnTmpDep'];
        $retTmpArr = $_SESSION['ReturnTmpArri'];
    }
}

$timego_formatted = new DateTime($DTDepart);
$timearrive_formatted = new DateTime($DTArrive);
$timegotmp_formatted = (empty($tmpDTDepart)) ? null : new DateTime($tmpDTDepart);
$timearrivetmp_formatted = (empty($tmpDTArrive)) ? null : new DateTime($tmpDTArrive);

if ($_SESSION['isReturn'] === "1") {
    $timego_formatted2 = new DateTime($retDep);
    $timearrive_formatted2 = new DateTime($retArr);
    $timegotmp_formatted2 = (empty($retTmpDep)) ? null : new DateTime($retTmpDep);
    $timearrivetmp_formatted2 = (empty($retTmpArr)) ? null : new DateTime($retTmpArr);
}


?>

<html>

<head>
    <link href="./css/styles.css" rel="stylesheet">
</head>

<body>

    <div style="width: 100vw; align-items: center;">

        <h1 style="margin: 80px 0 40px 18%;">Finalizing Tickets</h1>
        <?php
        $passNumber = $_SESSION['PassNum'];
        for ($i = 0; $i < $passNumber; $i++) { ?>
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



                <?php
            }
            if ($_SESSION['isReturn'] === "1") {

                if ($origtmp !== "" && $desttmp !== "") { ?>
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
                                <?php echo $desttmp; ?> to <?php echo $origtmp; ?>
                            </td>
                            <td>

                                <?php
                                $date_str1 = $timegotmp_formatted2->format('F j, Y'); // Outputs May 5, 2023
                                $time_str1 = $timegotmp_formatted2->format('g:i A'); // Outputs 5:00 AM
                                $date_str2 = $timearrivetmp_formatted2->format('F j, Y'); // Outputs May 5, 2023
                                $time_str2 = $timearrivetmp_formatted2->format('g:i A'); // Outputs 5:00 AM

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
                            <?php echo $destination; ?> to <?php echo $origin; ?>
                        </td>
                        <td>
                            <?php
                            $date_str1 = $timego_formatted2->format('F j, Y'); // Outputs May 5, 2023
                            $time_str1 = $timego_formatted2->format('g:i A'); // Outputs 5:00 AM
                            $date_str2 = $timearrive_formatted2->format('F j, Y'); // Outputs May 5, 2023
                            $time_str2 = $timearrive_formatted2->format('g:i A'); // Outputs 5:00 AM

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


        <?php }
        } ?>

        <form action="Transaction.php">

            <button class="animated-button" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" class="arr-2" viewBox="0 0 24 24">
                    <path d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"></path>
                </svg>
                <span class="text">F I N A L I Z E</span>
                <span class="circle"></span>
                <svg xmlns="http://www.w3.org/2000/svg" class="arr-1" viewBox="0 0 24 24">
                    <path d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"></path>
                </svg>
            </button>
        </form>

    </div>
</body>

</html>