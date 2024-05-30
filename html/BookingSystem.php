<?php
include('connect.php');

$inPhil = ['Cebu', 'Davao'];

if (isset($_POST['Origin'], $_POST['Destination'], $_POST['Accommodation'], $_POST['DateInput1'])) {
    $origin = $_POST['Origin'];
    $destination = $_POST['Destination'];
    $accommodation = $_POST['Accommodation'];
    $date = $_POST['DateInput1'];
}

[$formatted_date, $days_since_reference] = convert_and_format_date($date);

if ($formatted_date) {
    error_log("Formatted date: $formatted_date\n");
    error_log("Days since reference date: $days_since_reference\n");
    $date_object = DateTimeImmutable::createFromFormat('Y m d', $formatted_date);
    $sql_date_format = $date_object->format('Y-m-d');

    if (empty($origin) || empty($destination) || empty($accommodation) || empty($date)) {
        $errorMessage = "Please fill out all required fields.";
    } else {
        $successMessage = "Your travel request has been submitted!";
    }
}

function convert_and_format_date($date_string)
{
    $reference_date = new DateTimeImmutable('1970-01-01');
    try {
        $date_object = DateTimeImmutable::createFromFormat('F j, Y', $date_string);
        $delta = $date_object->diff($reference_date);
        $days_since_reference = $delta->days;
        $formatted_date = $date_object->format('Y m d');
        return [$formatted_date, $days_since_reference];
    } catch (Exception $e) {
        echo "Error: Invalid date format. Please use 'month day year' format (e.g., April 2, 2024).";
        return [null, null];
    }
}
?>

<html>

<head>
    <link href="./css/styles.css" rel="stylesheet">
</head>

<body>
    <div class="TicketChoice">
        <p style="font-size: 40px; font-weight: 500; font-family: 'Roboto Light'">Select Your Departing Flight</p>
        <h1><?php echo $origin; ?> to <?php echo $destination; ?></h1>

        <?php
        for ($i = 4; $i < 18; $i += 3.5) {
            $departureDateTime = new DateTime("$sql_date_format " . floor($i) . ":" . str_pad(fmod($i, 1) * 60, 2, '0', STR_PAD_LEFT));
            $arrivalDateTime = clone $departureDateTime;
            $arrivalDateTime->add(new DateInterval('PT1H30M'));

            $duration1 = $arrivalDateTime->diff($departureDateTime)->format('%h hr %i mins');

            if (in_array($origin, $inPhil)) {
                $tempDepartureDateTime = clone $arrivalDateTime;
                $tempArrivalDateTime = clone $tempDepartureDateTime;
                $tempArrivalDateTime->add(new DateInterval('PT3H'));

                $duration_tmp = $tempArrivalDateTime->diff($tempDepartureDateTime)->format('%h hr %i mins');
            }

            $airlines = ['Cebu Pacific', 'Air Asia', 'Philippine Airlines'];
            $numberOfPassengers = rand(100, 299);
            $capacity = 300;

            $departureDT = $departureDateTime->format('Y-m-d H:i');
            $arrivalDT = $arrivalDateTime->format('Y-m-d H:i');

            $flights = $connection->prepare("INSERT INTO tblflights (airline,origin,destination,departureDT,arrivalDT,seatingCapacity,totalPassengers) VALUES (?,?,?,?,?,?,?)");
            $flights->bind_param("ssssssi", $airlines[rand(0, 2)], $origin, $destination, $departureDT, $arrivalDT, $capacity, $numberOfPassengers);
            $flights->execute();
            $item_id = $connection->insert_id;

        ?>
            <form action="Finalize.php" method="post">
                <div class="time-slot">
                    <div style="flex-direction: column">
                        <div class="contflight">
                            <h3><?php echo $origin; ?> to <?php echo in_array($origin, $inPhil) ? "Manila" : $destination; ?></h3>
                            <div class="FlightTime">
                                <p><?php echo $departureDateTime->format('H:i'); ?> -> <?php echo $arrivalDateTime->format('H:i'); ?></p>
                                <p style="margin-left: 60px"><?php echo $duration1; ?></p>
                            </div>
                        </div>

                        <?php if (in_array($origin, $inPhil)) { ?>
                            <div class="contflight">
                                <h3>Manila to <?php echo $destination; ?></h3>
                                <div class="FlightTime">
                                    <p><?php echo $tempDepartureDateTime->format('H:i'); ?> -> <?php echo $tempArrivalDateTime->format('H:i'); ?></p>
                                    <p style="margin-left: 60px;"><?php echo $duration_tmp; ?></p>
                                </div>
                            </div>
                        <?php }
                        $emptyDateTime = '0000-00-00 00:00:00';

                        ?>

                        <input type="hidden" name="selected_origin" value="<?php echo $origin; ?>">
                        <input type="hidden" name="selected_destination" value="<?php echo in_array($origin, $inPhil) ? "Manila" : $destination; ?>">
                        <input type="hidden" name="origintmp" value="<?php echo in_array($origin, $inPhil) ? "Manila" : ""; ?>">
                        <input type="hidden" name="destinationtmp" value="<?php echo in_array($origin, $inPhil) ? $destination : ""; ?>">
                        <input type="hidden" name="Accommodation" value="<?php echo $accommodation; ?>">
                        <input type="hidden" name="Departure_DT" value="<?php echo $departureDateTime->format('Y-m-d H:i:s'); ?>">
                        <input type="hidden" name="Arrival_DT" value="<?php echo $arrivalDateTime->format('Y-m-d H:i:s'); ?>">
                        <input type="hidden" name="tmpDeparture_DT" value="<?php echo in_array($origin, $inPhil) ? $tempDepartureDateTime->format('Y-m-d H:i:s') : $emptyDateTime; ?>">
                        <input type="hidden" name="tmpArrival_DT" value="<?php echo in_array($origin, $inPhil) ? $tempArrivalDateTime->format('Y-m-d H:i:s') : $emptyDateTime; ?>">
                        <input type="hidden" name="item_id" value="<?php echo $item_id; ?>">
                        <?php
                        if ($tempDepartureDateTime !== "" && $tempArrivalDateTime !== "") {
                            // inserts 2nd flight
                            $tempDepartureDateTime = ($tempDepartureDateTime === $emptyDateTime) ? NULL : $tempDepartureDateTime;
                            $tempArrivalDateTime = ($tempArrivalDateTime === $emptyDateTime) ? NULL : $tempArrivalDateTime;
                            $flights = $connection->prepare("INSERT INTO tblflights (airline,origin,destination,departureDT,arrivalDT,seatingCapacity,totalPassengers) VALUES (?,?,?,?,?,?,?)");
                            // TODO wrong ni
                            $flights->bind_param("ssssssi", $airlines[rand(0, 2)], $origintmp, $destinationtmp, $Departure_DT, $Arrival_DT, $capacity, $numberOfPassengers);
                            $flights->execute();
                            $item_id2 = $connection->insert_id;
                        }
                        ?>
                        <input type="hidden" name="item_id2" value="<?php echo $item_id2; ?>">
                    </div>
                    <button class="bookbtns" type="submit" style="vertical-align:middle"><span>Book</span></button>
                </div>
            </form>
        <?php
        }
        ?>
    </div>
</body>
<script src="./script/script.js"></script>

</html>