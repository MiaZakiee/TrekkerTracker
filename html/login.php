<?php
include("connect.php");
?>

<?php

if (isset($_POST['loginButton'])) {
    $uname = $_POST['loginUsername'];
    $pword = hash('sha256', $_POST['loginPassword']);

    //Check tbluseraccount if username is already existing. Save info if false. Prompt msg if true.
    $sqlEmail = "SELECT * FROM tbluseraccount WHERE registerUsername='" . $uname . "'";
    $sqlUser = "SELECT * FROM tbluseraccount WHERE registerEmail='" . $uname . "'";
    $userResultA = mysqli_query($connection, $sqlEmail);
    $userResultB = mysqli_query($connection, $sqlUser);
    $userExists = mysqli_num_rows($userResultB) != 0;
    $emailExists = mysqli_num_rows($userResultA) != 0;

    if ($userExists || $emailExists) {
        $sqlPass = "SELECT * FROM tbluseraccount WHERE (registerUsername='" . $uname . "' OR registerEmail='" . $uname . "') AND registerPassword='" . $pword . "'";
        $passResult = mysqli_query($connection, $sqlPass);
        $passExists = mysqli_num_rows($passResult) != 0;

        if ($passExists) {
            echo "<script language='javascript'>
                            alert('Welcome to TrekkerTracker!');
                    </script>";
        } else {
            echo "<script language='javascript'>
                            let logPassword = document.querySelector('#loginPassword');
                            let message = document.querySelector('.invalidInput_Password');
                            logPassword.classList.add('invalidInput');
                            logPassword.style.display = 'inline';
                            message.style.display = 'inline';
                            let logEmail = document.querySelector('#loginUsername');
                            logEmail.value = '" . $uname . "';
                        </script>";
        }
    } else {
        echo "<script language='javascript'>
                        let logEmail = document.querySelector('#loginUsername');
                        let message = document.querySelector('.invalidInput_Login');
                        logEmail.classList.add('invalidInput');
                        logEmail.style.display = 'inline';
                        message.style.display = 'inline';
                    </script>";
    }

    // User does not exist
    // Incorrect password
    // TODO NEED USERTYPE GENDER???????????????????????
}
?>