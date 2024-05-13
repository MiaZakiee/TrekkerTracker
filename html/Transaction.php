<?php
    session_start();
if (isset($_POST['origin']) && isset($_POST['destination']) && isset($_POST['origin_tmp']) && isset($_POST['destination_tmp']) && isset($_POST['arrival_dt']) &&  isset($_POST['tmp_departure_dt']) && isset($_POST['tmp_arrival_dt']) && isset($_POST['accommodation'])) {

$origin = $_POST['origin'];
$destination = $_POST['destination'];
$origtmp = $_POST['origin_tmp'];
$desttmp = $_POST['destination_tmp'];
$DTDepart = $_POST['departure_dt'];
$DTArrive = $_POST['arrival_dt'];
$tmpDTDepart = $_POST['tmp_departure_dt'];
$tmpDTArrive = $_POST['tmp_arrival_dt'];
$accommodation = $_POST['accommodation'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment Page</title>
    <link href = "./css/transaction.css" rel = "stylesheet">
</head><body>
<div>
    <div style="display: flex;flex-direction: row; justify-content: center">
        <button type="button">Cancel</button>
        <h1>TRECKERTRACKER</h1>
    </div>
<div class="container">
    <div id = "inputdetails">
    <h2>Checkout</h2>

    <form method="post" action="TIcketRecorded.php">
        <div class="form-group">
            <label for="name">Card Holder:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="card">Card Number:</label>
            <input type="text" id="card" name="card" required>
        </div>
        <div class="form-group">
            <label for="cvv">CVV:</label>
            <input type="text" id="cvv" name="cvv" required>
        </div>

        <div class="form-group">
            <input type="submit" value="Pay Now">
        </div>
        <input type="hidden" name="origin" value="<?php echo $origin; ?>">
        <input type="hidden" name="destination" value="<?php echo $destination; ?>">

        <input type="hidden" name="origtmp" value="<?php echo $origtmp; ?>">
        <input type="hidden" name="desttmp" value="<?php echo $desttmp; ?>">
        <input type="hidden" name="DTDepart" value="<?php echo $DTDepart; ?>">
        <input type="hidden" name="DTArrive" value="<?php echo $DTArrive; ?>">

        <input type="hidden" name="tmpDTDepart" value="<?php echo $tmpDTDepart; ?>">
        <input type="hidden" name="tmpDTArrive" value="<?php echo $tmpDTArrive?>">

        <input type="hidden" name="accommodation" value="<?php echo $accommodation ?>">
    </form>
    <p>Note: Your IP address and billing information will be recorded</p>
</div>
        <div id ="howmuchyoupay">
            <h1>To Pay</h1>
            <h1>Php 13,000</h1>
    </div>
</div>
</div>
</body>
</html>
