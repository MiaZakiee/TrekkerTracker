<?php
include('connect.php');
session_start();
$inPhil = ['Cebu', 'Davao'];

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if (isset($_POST['Origin']) && isset($_POST['Destination']) && isset($_POST['Accommodation']) && isset($_POST['DateInput1']) && isset($_POST['isReturn'])) {

    $origin = $_POST['Origin'];
    $destination = $_POST['Destination'];
    $accommodation = $_POST['Accommodation'];
    $date = $_POST['DateInput1'];
    $_SESSION['isReturn'] = $_POST['isReturn'];
    if($_SESSION['isReturn'] === "1")
        $date2 = $_POST['DateInput2'];
    
}
$test = 0;
//in phil orig and destination outside phil
if(in_array($origin, $inPhil) && !in_array($destination, $inPhil) && $destination !== "Manila")
    $test = 1;
//in phil orig and destination also in phil or out phil orig and outside destination
else if((in_array($origin, $inPhil) && (in_array($destination, $inPhil) || $destination === "Manila")) || (!in_array($origin, $inPhil) && !in_array($destination, $inPhil) ))
    $test = 2;
//out side orig and inside destination
else
    $test = 3;
?>

<html>
<head>
    <link href="./css/styles.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>
<body>

<div class = "TicketChoice">

    <p style="font-size: 40px; font-weight: 500; font-family: 'Roboto Light'">Select Your Departing Flight</p>
    <h1> <?php echo $origin; ?> to <?php echo $destination; ?> </h1>
    <div style="height:60%; overflow-y:auto; overflow-x: hidden; padding: 10px; ">
    <input type="hidden" id = "isReturn" value = "<?php echo $_SESSION['isReturn'] ?>">

    <?php

        for ($i = 4, $j = 1; $i < 18; $i += 3.5, $j++) {
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
   
            <div class="time-slot">
            <form>
                <div style="flex-direction: column">
                <div class = "contflight">

                    <h3>
                        <?php echo $origin; ?> to <?php if($test === 1 || $test === 3) echo "Manila";
                        else echo $destination; ?>

                    </h3>
                    <div class = "FlightTime">
                    <p><?php echo $time_string1 ?> -> <?php echo $time_string2;?>  </p>
                        <p style="margin-left: 60px"><?php echo $duration1 ?></p>


                    </div>
                </div>

                <?php
                    if($test === 1 || $test === 3){
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
                <?php } ?>

                </div>
                <input type="hidden" name="selected_origin" value="<?php echo $origin; ?>">
                <input type="hidden" name="selected_destination" value="<?php echo ($test === 1 || $test === 3) ? "Manila" : $destination; ?>">

                <input type="hidden" name="origintmp" value="<?php echo ($test === 1 || $test === 3) ? "Manila" : ""; ?>">
                <input type="hidden" name="destinationtmp" value="<?php echo ($test === 1 || $test === 3) ? $destination : ""; ?>">
                <input type="hidden" name="Accommodation" value="<?php echo $accommodation; ?>">
                <input type="hidden" name="Departure_DT" value="<?php echo $date." ".$time_string1; ?>">
                <input type="hidden" name="Arrival_DT" value="<?php echo $date." ".$time_string2; ?>">

                <input type="hidden" name="tmpDeparture_DT" value="<?php echo ($test === 1 || $test === 3) ? $date." ".$time_stringtmp1 : ""; ?>">
                <input type="hidden" name="tmpArrival_DT" value="<?php echo ($test === 1 || $test === 3) ? $date." ".$time_stringtmp2 : ""; ?>">

                <div class="checkbox-wrapper">
                    <input class = "toggle-check" id="checkbox-<?php echo $j; ?>" type="checkbox">
                    <label for="checkbox-<?php echo $j; ?>">
                 <div class="tick_mark"></div>
                 </label>
                </div>

                </form>

            </div>



            <?php
        }

        ?>
    </div>

    
<?php if($_SESSION['isReturn'] === "1") { ?>
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
            
                <div class="time-slot2">
                <form>
                    <div style="flex-direction: column">
                        <?php
                        if($test === 1 || $test === 3){
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
                                <?php if($test === 1 || $test === 3) echo "Manila";
                                else echo $destination; ?> to <?php echo $origin; ?>

                            </h3>
                            <div class = "FlightTime">
                                <p><?php echo $time_string1 ?> -> <?php echo $time_string2;?>  </p>
                                <p style="margin-left: 60px"><?php echo $duration1 ?></p>


                            </div>
                        </div>

                        <input type="hidden" name="RetDeparture_DT" value="<?php echo $date2." ".$time_string1; ?>">
                        <input type="hidden" name="RetArrival_DT" value="<?php echo $date2." ".$time_string2; ?>">

                        <input type="hidden" name="RettmpDeparture_DT" value="<?php echo ($test === 1 || $test === 3) ? $date2." ".$time_stringtmp1 : ""; ?>">
                        <input type="hidden" name="RettmpArrival_DT" value="<?php echo ($test === 1 || $test === 3) ? $date2." ".$time_stringtmp2 : ""; ?>">


                    </div>
                    <div class="checkbox-wrapper">
                    <input class = "toggle-check1" id="checkbox-<?php echo $j; ?>" type="checkbox">
                    <label for="checkbox-<?php echo $j; ?>">
                    <div class="tick_mark"></div>
                    </label>
                    </div>
                    </form>
                </div>
            


            <?php
        }

        ?>

        </div>
<?php } ?>
<div style= "display: flex; flex-direction: row; justify-content: flex-end">
<div class="form-control">
    <input type="number" name = "passNum" required="" min ="1" max = "5" onkeydown="return false">
    <label>
        <span style="transition-delay:0ms">P</span> 
        <span style="transition-delay:50ms">a</span>
        <span style="transition-delay:100ms">s</span>
        <span style="transition-delay:150ms">s</span>
        <span style="transition-delay:200ms">n</span>
        <span style="transition-delay:250ms">g</span>
        <span style="transition-delay:300ms">e</span>
        <span style="transition-delay:350ms">r</span>
        <span style="transition-delay:400ms"> </span>
        <span style="transition-delay:450ms">#</span>

    </label>
</div>
        <button type="button" class = "bookbtns" style="vertical-align:middle; " id = "finalizebtn"><span>Book</span></button>
    </div>
    </div>





</body>
<script src="./script/bookingsystem.js"></script>
</html>