<?php
include('connect.php');
session_start();
$inPhil = ['Cebu', 'Davao'];

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if (isset($_POST['Origin']) && isset($_POST['Destination']) && isset($_POST['Accommodation']) && isset($_POST['DateInput1'])) {

    $origin = $_POST['Origin'];
    $destination = $_POST['Destination'];
    $accommodation = $_POST['Accommodation'];
    $date = $_POST['DateInput1'];


}

    [$formatted_date, $days_since_reference] = convert_and_format_date($date);

    if ($formatted_date) {
        error_log( "Formatted date: $formatted_date\n");
        error_log( "Days since reference date: $days_since_reference\n");
        $date_object = DateTimeImmutable::createFromFormat('Y m d', $formatted_date);


        $sql_date_format = $date_object->format('Y-m-d');

    if (empty($origin) || empty($destination) || empty($accommodation) || empty($date)) {
        $errorMessage = "Please fill out all required fields.";
    } else {

        $successMessage = "Your travel request has been submitted!";

    }

}
function convert_and_format_date($date_string) {
    $reference_date = new DateTimeImmutable('1970-01-01');

    try {
        // Convert the date string to a DateTime object using month name
        $date_object = DateTimeImmutable::createFromFormat('F j, Y', $date_string);

        // Calculate the number of days since the reference date
        $delta = $date_object->diff($reference_date);
        $days_since_reference = $delta->days;

        // Format the date object into 'YYYY MM DD' format
        $formatted_date = $date_object->format('Y m d');

        return [$formatted_date, $days_since_reference];

    } catch (Exception $e) {
        // Handle potential parsing errors
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

<div class = "TicketChoice">

    <p style="font-size: 40px; font-weight: 500; font-family: 'Roboto Light'">Select Your Departing Flight</p>
    <h1> <?php echo $origin; ?> to <?php echo $destination; ?> </h1>
    <div style="height:60%; overflow-y:auto; overflow-x: hidden; padding: 10px; ">


    <?php

        for ($i = 4; $i < 18; $i += 3.5) {
            $hour = str_pad(floor($i), 2, '0', STR_PAD_LEFT);
            $hourafter =str_pad(floor($i+1.5), 2, '0', STR_PAD_LEFT);

            $minute1 = fmod($i, 1) * 60; // Calculate minute using modulo
            $minute2 = fmod($i+1.5, 1) * 60; // Calculate minute using modulo
            $duration1  = floor(($hourafter - $hour) * 60 + ($minute2 - $minute1)) . " mins";
            $duration_in_minutes = intval($duration1);
            $hours = floor($duration_in_minutes / 60);
            $minutes = $duration_in_minutes % 60;
            $duration1 = ($hours > 0 ? "$hours hr" : "") . ($minutes > 0 ? " $minutes mins" : "");


            $time_string1 = "$hour:" . str_pad($minute1, 2, '0', STR_PAD_LEFT);
            $time_string2 = "$hourafter:" . str_pad($minute2, 2, '0', STR_PAD_LEFT);
            if(in_array($origin, $inPhil)){
                $hourtmp1 = str_pad(floor($i+3.5), 2, '0', STR_PAD_LEFT);
                $minutetmp1 = fmod($i+3.5, 1) * 60; // Calculate minute using modulo

                $hourtmp2 = str_pad(floor($i+6), 2, '0', STR_PAD_LEFT);
                $minutetmp2 = fmod($i+6, 1) * 60; // Calculate minute using modulo

                $time_stringtmp1 = "$hourtmp1:" . str_pad($minutetmp1, 2, '0', STR_PAD_LEFT);
                $time_stringtmp2 = "$hourtmp2:" . str_pad($minutetmp2, 2, '0', STR_PAD_LEFT);
                $duration_tmp = floor(($hourtmp2 - $hourtmp1) * 60 + ($minutetmp2 - $minutetmp1)) . " mins";
                $duration_in_minutes2 = intval($duration_tmp);
                $hourstmp = floor($duration_in_minutes2 / 60);
                $minutestmp = $duration_in_minutes2 % 60;
                $duration_tmp = ($hourstmp > 0 ? "$hourstmp hr" : "") . ($minutestmp > 0 ? " $minutestmp mins" : "");



            }
                $airlines = ['Cebu Pacific', 'Air Asia', 'Philippine Airlines'];
                $numberOfPassengers = rand(100,299);
                $capacity = 300;
                $date = date("l");
//                $flights = $connection->prepare("INSERT INTO tblflights (airline,origin,destination,date,departureDT,arrivalDT,seatingCapacity,totalPassengers) VALUES (?,?,?,?,?,?,?,?)");
//                $flights->bind_param("ssssssii", $airlines[rand(0,2)], $origin, $destination,$date,$time_string1,$time_string2,$numberOfPassengers,$capacity);
//                $flights->execute();
            ?>
    <form action="Finalize.php" method="post">
            <div class="time-slot">
                <div style="flex-direction: column">
                <div class = "contflight">
<!--                data-time="--><?php //echo $time_string1; ?><!--">-->


                    <h3>
                        <?php echo $origin; ?> to <?php if(in_array($origin, $inPhil)) echo "Manila";
                        else echo $destination; ?>

                    </h3>
                    <div class = "FlightTime">
                    <p><?php echo $time_string1 ?> -> <?php echo $time_string2;?>  </p>
                        <p style="margin-left: 60px"><?php echo $duration1 ?></p>


                    </div>
                </div>

                <?php
                    if(in_array($origin, $inPhil)){
                        ?>

                    <div class ="contflight">
                        <h3>
                            Manila to <?php echo $destination; ?>

                        </h3>
                        <div class = "FlightTime">
                          <p><?php echo $time_stringtmp1 ?> -> <?php echo $time_stringtmp2; ?> </p>
                            <p style="margin-left: 60px;"><?php echo $duration_tmp ?></p>

                        </div>
                    </div>

                <?php
                    }



                ?>

                </div>
                <input type="hidden" name="selected_origin" value="<?php echo $origin; ?>">
                <input type="hidden" name="selected_destination" value="<?php echo (in_array($origin, $inPhil)) ? "Manila" : $destination; ?>">

                <input type="hidden" name="origintmp" value="<?php echo (in_array($origin, $inPhil)) ? "Mania" : ""; ?>">
                <input type="hidden" name="destinationtmp" value="<?php echo (in_array($origin, $inPhil)) ? $destination : ""; ?>">
                <input type="hidden" name="Accommodation" value="<?php echo $accommodation; ?>">
                <input type="hidden" name="Departure_DT" value="<?php echo $date." ".$time_string1; ?>">
                <input type="hidden" name="Arrival_DT" value="<?php echo $date." ".$time_string2; ?>">

                <input type="hidden" name="tmpDeparture_DT" value="<?php echo (in_array($origin, $inPhil)) ? $date." ".$time_stringtmp1 : "" ?>">
                <input type="hidden" name="tmpArrival_DT" value="<?php echo (in_array($origin, $inPhil)) ? $date." ".$time_stringtmp2 : ""; ?>">

                <button class ="bookbtns" type="submit" style="vertical-align:middle"><span>Book</span></button>

            </div>
    </form>


            <?php
        }

        ?>
    </div>

    <p style="font-size: 40px; font-weight: 500; font-family: 'Roboto Light'">Select Your Returning Flight</p>
    <h1> <?php echo $destination; ?> to <?php echo $origin; ?> </h1>
    <div style="height:60%; overflow-y:auto; overflow-x: hidden; padding: 10px; ">


        <?php

        for ($i = 4; $i < 18; $i += 3.5) {
            $hour = str_pad(floor($i), 2, '0', STR_PAD_LEFT);
            $hourafter =str_pad(floor($i+1.5), 2, '0', STR_PAD_LEFT);

            $minute1 = fmod($i, 1) * 60; // Calculate minute using modulo
            $minute2 = fmod($i+1.5, 1) * 60; // Calculate minute using modulo
            $duration1  = floor(($hourafter - $hour) * 60 + ($minute2 - $minute1)) . " mins";
            $duration_in_minutes = intval($duration1);
            $hours = floor($duration_in_minutes / 60);
            $minutes = $duration_in_minutes % 60;
            $duration1 = ($hours > 0 ? "$hours hr" : "") . ($minutes > 0 ? " $minutes mins" : "");


            $time_string1 = "$hour:" . str_pad($minute1, 2, '0', STR_PAD_LEFT);
            $time_string2 = "$hourafter:" . str_pad($minute2, 2, '0', STR_PAD_LEFT);
            if(in_array($origin, $inPhil)){
                $hourtmp1 = str_pad(floor($i+3.5), 2, '0', STR_PAD_LEFT);
                $minutetmp1 = fmod($i+3.5, 1) * 60; // Calculate minute using modulo

                $hourtmp2 = str_pad(floor($i+6), 2, '0', STR_PAD_LEFT);
                $minutetmp2 = fmod($i+6, 1) * 60; // Calculate minute using modulo

                $time_stringtmp1 = "$hourtmp1:" . str_pad($minutetmp1, 2, '0', STR_PAD_LEFT);
                $time_stringtmp2 = "$hourtmp2:" . str_pad($minutetmp2, 2, '0', STR_PAD_LEFT);
                $duration_tmp = floor(($hourtmp2 - $hourtmp1) * 60 + ($minutetmp2 - $minutetmp1)) . " mins";
                $duration_in_minutes2 = intval($duration_tmp);
                $hourstmp = floor($duration_in_minutes2 / 60);
                $minutestmp = $duration_in_minutes2 % 60;
                $duration_tmp = ($hourstmp > 0 ? "$hourstmp hr" : "") . ($minutestmp > 0 ? " $minutestmp mins" : "");



            }
            $airlines = ['Cebu Pacific', 'Air Asia', 'Philippine Airlines'];
            $numberOfPassengers = rand(100,299);
            $capacity = 300;
            $date = date("l");
//                $flights = $connection->prepare("INSERT INTO tblflights (airline,origin,destination,date,departureDT,arrivalDT,seatingCapacity,totalPassengers) VALUES (?,?,?,?,?,?,?,?)");
//                $flights->bind_param("ssssssii", $airlines[rand(0,2)], $origin, $destination,$date,$time_string1,$time_string2,$numberOfPassengers,$capacity);
//                $flights->execute();
            ?>
            <form action="Finalize.php" method="post">
                <div class="time-slot">
                    <div style="flex-direction: column">
                        <?php
                        if(in_array($origin, $inPhil)){
                            ?>

                            <div class ="contflight">
                                <h3>
                                    <?php echo $destination; ?> To Manila

                                </h3>
                                <div class = "FlightTime">
                                    <p><?php echo $time_stringtmp1 ?> -> <?php echo $time_stringtmp2; ?> </p>
                                    <p style="margin-left: 60px;"><?php echo $duration_tmp ?></p>

                                </div>
                            </div>

                            <?php
                        }

                        ?>
                        <div class = "contflight">
                            <h3>
                                <?php if(in_array($origin, $inPhil)) echo "Manila";
                                else echo $destination; ?> to <?php echo $origin; ?>

                            </h3>
                            <div class = "FlightTime">
                                <p><?php echo $time_string1 ?> -> <?php echo $time_string2;?>  </p>
                                <p style="margin-left: 60px"><?php echo $duration1 ?></p>


                            </div>
                        </div>




                        <input type="hidden" name="selected_origin" value="<?php echo $origin; ?>">
                        <input type="hidden" name="selected_destination" value="<?php echo (in_array($origin, $inPhil)) ? "Manila" : $destination; ?>">

                        <input type="hidden" name="origintmp" value="<?php echo (in_array($origin, $inPhil)) ? "Mania" : ""; ?>">
                        <input type="hidden" name="destinationtmp" value="<?php echo (in_array($origin, $inPhil)) ? $destination : ""; ?>">
                        <input type="hidden" name="Accommodation" value="<?php echo $accommodation; ?>">
                        <input type="hidden" name="Departure_DT" value="<?php echo $date." ".$time_string1; ?>">
                        <input type="hidden" name="Arrival_DT" value="<?php echo $date." ".$time_string2; ?>">

                        <input type="hidden" name="tmpDeparture_DT" value="<?php echo (in_array($origin, $inPhil)) ? $date." ".$time_stringtmp1 : "" ?>">
                        <input type="hidden" name="tmpArrival_DT" value="<?php echo (in_array($origin, $inPhil)) ? $date." ".$time_stringtmp2 : ""; ?>">


                    </div>
                    <button class ="bookbtns" type="submit" style="vertical-align:middle"><span>Book</span></button>

                </div>
            </form>


            <?php
        }

        ?>

    </div>

    </div>




</body>
<script src="./script/script.js"></script>
</html>