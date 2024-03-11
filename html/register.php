<?php
include("connect.php");
//global $connection;
?>

<?php

if (isset($_POST['registerBtn'])) {
    //retrieve data from form and save the value to a variable
    //for tbluserprofile
    $fname = $_POST['registerFname'];
    $lname = $_POST['registerLname'];
    // echo "<script language='javascript'>
    //     alert('hi nin');
    // </script>";
    //for tbluseraccount
    $email = $_POST['registerEmail'];
    $uname = $_POST['registerUsername'];
    $pword = $_POST['registerPassword'];

    //save data to tbluserprofile
    $sql1 = "Insert into tbluserprofile(registerFname,registerLname) values('" . $fname . "','" . $lname . "')";
    mysqli_query($connection, $sql1);

    //Check tbluseraccount if username is already existing. Save info if false. Prompt msg if true.
    $sql2 = "Select * from tbluseraccount where registerUsername='" . $uname . "'";
    $result = mysqli_query($connection, $sql2);
    $row = mysqli_num_rows($result);

    if ($row == 0) {
        $sql = "Insert into tbluseraccount(registerEmail,registerUsername,registerPassword) values('" . $email . "','" . $uname . "','" . $pword . "')";
        mysqli_query($connection, $sql);
        echo "<script language='javascript'>
        alert('New record saved.');
        </script>";
    } else {
        echo "<script language='javascript'>
                        alert('Username already existing');
                  </script>";
    }
}
?>