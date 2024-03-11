<?php
$connection = new mysqli('localhost', 'root', '', 'trekkertracker');

if (!$connection) {
    die(mysqli_error($mysqli));
}
