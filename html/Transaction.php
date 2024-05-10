<?php
?><!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment Page</title>
    <link href = "./css/transaction.css" rel = "stylesheet">
</head><body>
<div class="container">
    <h2>Checkout</h2>
    <form>
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
            <input type="submit" value="Pay €0.01">
        </div>
    </form>
    <p>Note: Your IP address and billing information will be recorded</p>
</div>
</body>
</html>
