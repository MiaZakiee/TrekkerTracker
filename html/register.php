<?php
include("connect.php");
//global $connection;
?>

<?php

if (isset($_POST['registerBtn'])) {
    // Retrieve data from form
    $fname = $_POST['registerFname'];
    $lname = $_POST['registerLname'];
    $email = $_POST['registerEmail'];
    $uname = $_POST['registerUsername'];
    // Hash the password using SHA256
    $pword = hash('sha256', $_POST['registerPassword']);

    // Insert user profile data
    $sql1 = "INSERT INTO tbluserprofile (firstname, lastname) VALUES (?, ?)";
    $stmt1 = mysqli_prepare($connection, $sql1);
    mysqli_stmt_bind_param($stmt1, "ss", $fname, $lname);
    mysqli_stmt_execute($stmt1);

    // Check if username already exists
    $sql2 = "SELECT * FROM tbluseraccount WHERE username = ?";
    $stmt2 = mysqli_prepare($connection, $sql2);
    mysqli_stmt_bind_param($stmt2, "s", $uname);
    mysqli_stmt_execute($stmt2);
    $result = mysqli_stmt_get_result($stmt2);
    $row = mysqli_num_rows($result);

    if ($row == 0) {
        // Insert user account data
        $sql = "INSERT INTO tbluseraccount (emailadd, username, password) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($connection, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $email, $uname, $pword);
        mysqli_stmt_execute($stmt);
        echo "<script>openModal('newRegisAlert')</script>";
    } else {
        echo "<script>openModal('AlreadyUserAlert');</script>";
    }
}

?>