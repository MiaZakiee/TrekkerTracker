<?php
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
        echo "Formatted date: $formatted_date\n";
        echo "Days since reference date: $days_since_reference\n";
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

<?php
//include('headerOut.php');
//?>

<div class = "TicketChoice">
    <form action="Finalize.php" method="post">
    <p>Select Your Departing Flight</p>
    <h1> <?php echo $origin; ?> to <?php echo $destination; ?> </h1>

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

                $hourtmp2 = str_pad(floor($i+6.5), 2, '0', STR_PAD_LEFT);
                $minutetmp2 = fmod($i+6.5, 1) * 60; // Calculate minute using modulo

                $time_stringtmp1 = "$hourtmp1:" . str_pad($minutetmp1, 2, '0', STR_PAD_LEFT);
                $time_stringtmp2 = "$hourtmp2:" . str_pad($minutetmp2, 2, '0', STR_PAD_LEFT);
                $duration_tmp = floor(($hourtmp2 - $hourtmp1) * 60 + ($minutetmp2 - $minutetmp1)) . " mins";
                $duration_in_minutes2 = intval($duration_tmp);
                $hourstmp = floor($duration_in_minutes2 / 60);
                $minutestmp = $duration_in_minutes2 % 60;
                $duration_tmp = ($hourstmp > 0 ? "$hourstmp hr" : "") . ($minutestmp > 0 ? " $minutestmp mins" : "");

            }

            ?>

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

                    <input type="hidden" name="selected_origin" value="<?php echo $origin; ?>">
                    <input type="hidden" name="selected_destination" value="<?php echo (in_array($origin, $inPhil)) ? "Manila" : $destination; ?>">

                    <input type="hidden" name="origintmp" value="<?php echo (in_array($origin, $inPhil)) ? "Mania" : ""; ?>">
                    <input type="hidden" name="destinationtmp" value="<?php echo (in_array($origin, $inPhil)) ? $destination : ""; ?>">
                    <input type="hidden" name="Accommodation" value="<?php echo $accommodation; ?>">
                    <input type="hidden" name="selected_time_initial" value="<?php echo $time_string1; ?>">
                    <input type="hidden" name="selected_time_destination" value="<?php echo $time_string2; ?>">

                    <input type="hidden" name="timetmp" value="<?php echo (in_array($origin, $inPhil)) ? $time_stringtmp1 : "" ?>">
                    <input type="hidden" name="desttmp" value="<?php echo (in_array($origin, $inPhil)) ? $time_stringtmp2 : ""; ?>">
                    <input type="hidden" name="selected_date" value="<?php echo $sql_date_format; ?>">

                </div>
                <button style="float:right; width: 200px; height: 50px; margin: 100px 50px 0 0; border-radius: 20px; border: #95C0E3 2px solid; color: #B0692F; font-size: 25px; font-family: 'Roboto Light'; background: linear-gradient(to bottom, #95C0E3, #FAF8D4);" type="submit">Book</button>

            </div>


            <?php
        }

        ?>
    </form>
    </div>




</body>
<script src="./script/script.js"></script>
</html>