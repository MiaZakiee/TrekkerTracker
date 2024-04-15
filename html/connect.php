<?php
$connection = new mysqli('localhost', 'root', '', 'dbTrekkerTracker');

if (!$connection) {
    die(mysqli_error($mysqli));
}
