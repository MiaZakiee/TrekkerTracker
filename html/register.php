<?php
include("connect.php");
?>

<?php

if (isset($_POST['registerBtn'])) {
    //retrieve data from form and save the value to a variable
    //for tbluserprofile
    $fname = $_POST['registerFname'];
    $lname = $_POST['registerLname'];

    //for tbluseraccount
    $email = $_POST['registerEmail'];
    $uname = $_POST['registerUsername'];
    // $pword = $_POST['registerPassword'];
    $pword = hash('sha256', $_POST['registerPassword']);

    //Check tbluseraccount if username is already existing. Save info if false. Prompt msg if true.
    $sql3 = "SELECT * FROM tbluseraccount WHERE registerUsername='" . $uname . "'";
    $result = mysqli_query($connection, $sql3);
    $row = mysqli_num_rows($result);

    if ($row == 0) {
        $sql = "Insert into tbluseraccount(registerEmail,registerUsername,registerPassword) values('" . $email . "','" . $uname . "','" . $pword . "')";
        mysqli_query($connection, $sql);
        //save data to tbluserprofile
        $sql2 = "Insert into tbluserprofile(registerFname,registerLname) values('" . $fname . "','" . $lname . "')";
        mysqli_query($connection, $sql2);
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