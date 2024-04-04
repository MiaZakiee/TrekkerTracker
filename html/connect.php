<?php
$connection = new mysqli('localhost', 'root', '', 'dbcadavosf1');

if (!$connection) {
    die(mysqli_error($mysqli));
}
