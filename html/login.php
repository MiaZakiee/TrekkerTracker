<?php
include("connect.php");
?>

<?php

if (isset($_POST['loginButton'])) {
    //retrieve data from form and save the value to a variable
    //for tbluserprofile
    $uname = $_POST['loginUsername'];
    $pword = hash('sha256', $_POST['loginPassword']);

    //Check tbluseraccount if username is already existing. Save info if false. Prompt msg if true.
    $sqlEmail = "Select * from tbluseraccount where registerUsername='" . $uname . "'";
    $sqlUser = "Select * from tbluseraccount where registerEmail='" . $uname . "'";
    $userResultA = mysqli_query($connection, $sqlEmail);
    $userResultA = mysqli_query($connection, $sqlUser);
    $userExists = $userResultA > 0;
    $emailExists = $userResultB > 0;

    if ($userExists || $emailExists) {
        $sqlPass = "Select * from tbluseraccount where registerPassword='" . $pword . "'";
        $passResult = mysqli_query($connection, $sqlPass);
        $passExists = $passResult > 0;

        if ($passExists) {
            echo "<script language='javascript'>
                            alert('Welcome to TrekkerTracker!');
                    </script>";
        } else {
            echo "<script language='javascript'>
                            alert('Invalid password');
                    </script>";
        }
    } else {
        echo "<script language='javascript'>
                        alert('Invalid username');
                  </script>";
    }

    // User does not exist
    // Incorrect password
}
?>