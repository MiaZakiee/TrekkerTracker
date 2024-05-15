

<?php
session_start();
include('connect.php');

if(!isset($_SESSION['username']) || !$_SESSION['username'] || !isset($_SESSION['userID']) || !$_SESSION['userID']) {
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
    $user_id = $_SESSION['userID'];

    $timego_formatted = new DateTime($DTDepart);
    $timearrive_formatted = new DateTime($DTArrive);
    $timegotmp_formatted = (empty($tmpDTDepart)) ? null : new DateTime($tmpDTDepart);
    $timearrivetmp_formatted = (empty($tmpDTArrive)) ? null : new DateTime($tmpDTArrive);

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
    <form action="Transaction.php">
        <?php
        $_SESSION['origin'] = $origin;
        $_SESSION['destination'] = $destination;
        $_SESSION['originTMP'] = $origtmp;
        $_SESSION['destiTMP'] = $desttmp;
        $_SESSION['Departure_DT'] = $DTDepart;
        $_SESSION['Arrival_DT'] = $DTArrive;
        $_SESSION['tmpDeparture_DT'] = $tmpDTDepart;
        $_SESSION['tmpArrival_DT'] = $tmpDTArrive;
        $_SESSION['Accommodation'] = $accommodation;

        ?>
        <button class="animated-button" type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" class="arr-2" viewBox="0 0 24 24">
                <path
                        d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"
                ></path>
            </svg>
            <span class="text">F I N A L I Z E</span>
            <span class="circle"></span>
            <svg xmlns="http://www.w3.org/2000/svg" class="arr-1" viewBox="0 0 24 24">
                <path
                        d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"
                ></path>
            </svg>
        </button>
    </form>

</div>
</body>
</html>
