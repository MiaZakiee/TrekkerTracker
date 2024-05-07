<?php
include 'connect.php';

// handles login button
if (isset($_POST['loginButton'])) {
    // fetches username and hashed password
    $uname = $_POST['loginUsername'];
    $pass = hash('sha256', $_POST['loginPassword']);

    // Checks if user or email exisits within db
    $sqlEmail = "SELECT * FROM tbluseraccount WHERE user_username='" . $uname . "'";
    $sqlUser = "SELECT * FROM tbluseraccount WHERE user_email='" . $uname . "'";
    $userResultA = mysqli_query($connection, $sqlEmail);
    $userResultB = mysqli_query($connection, $sqlUser);
    $userExists = mysqli_num_rows($userResultB) != 0;
    $emailExists = mysqli_num_rows($userResultA) != 0;

    if ($userExists || $emailExists) {
        // if user exists, check if password matches with user
        $sqlPass = "SELECT * FROM tbluseraccount WHERE (user_username='" . $uname . "' OR user_email='" . $uname . "') AND user_password='" . $pword . "'";
        $passResult = mysqli_query($connection, $sqlPass);
        $passExists = mysqli_num_rows($passResult) != 0;

        // TODO password match, redirect user to landing page
        if ($passExists) {
            echo "<script language='javascript'>
                        setTimeout(() =>location.replace('./index.php'), 1300);
                    </script>";
        } else {
            // Password does not match
            echo "<script language='javascript'>
                 let message = document.querySelector('.invalidInput_Password');
                 message.style.display = 'inline';
                 
                 let logEmail = document.querySelector('#loginUsername');
                 logEmail.value = '" . $uname . "';
             </script>";
        }
    } else {
        // Username is not found
        echo "<script language='javascript'>
                            let logEmail = document.querySelector('#loginUsername');
                            let message = document.querySelector('.invalidInput_Login');
                            logEmail.classList.add('invalidInput');
                            logEmail.style.display = 'inline';
                            message.style.display = 'inline';
                        </script>";
    }
}
