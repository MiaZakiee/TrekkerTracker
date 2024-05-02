<?php
$connection = new mysqli('localhost', 'root', '', 'dbtrekkertracker');

if (!$connection) {
    die(mysqli_error($mysqli));
}
