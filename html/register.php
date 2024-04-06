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
    $pword = hash('sha256', $_POST['registerPassword']);

    //Check tbluseraccount if username is already existing. Save info if false. Prompt msg if true.
    $sqlUser = "SELECT * FROM tbluseraccount WHERE user_username='" . $uname . "'";
    $sqlEmail = "SELECT * FROM tbluseraccount WHERE user_email='" . $email . "'";
    $userResult = mysqli_query($connection, $sqlUser);
    $emailResult = mysqli_query($connection, $sqlEmail);
    $userRes = mysqli_num_rows($userResult) == 0;
    $emailRes = mysqli_num_rows($emailResult) == 0;

    if ($userRes && $emailRes) {
        $sql = "Insert into tbluseraccount(user_email,user_username,user_password) values('" . $email . "','" . $uname . "','" . $pword . "')";
        $sql2 = "Insert into tbluserprofile(user_fname,user_lname) values('" . $fname . "','" . $lname . "')";
        mysqli_query($connection, $sql);
        mysqli_query($connection, $sql2);
        echo "<script language='javascript'>
                        document.querySelector('.modalBox').style.display = 'inline';
                        setTimeout(20000);
                        setTimeout(() =>location.replace('./StartUp.php'), 1300);
                        
                    </script>";
    } else {
        if (!$userRes) {
            echo "<script language='javascript'>
                            let regUser = document.querySelector('#registerUsername');
                            let regMessage = document.querySelector('.invalidInput_Username');
                            regUser.classList.add('invalidInput');
                            regUser.style.display = 'inline';
                            regMessage.style.display = 'inline';

                            document.querySelector('#registerFname').value = '" . $fname . "';
                            document.querySelector('#registerLname').value = '" . $lname . "';
                            document.querySelector('#registerEmail').value = '" . $email . "';
                        </script>";
        }
        if (!$emailRes) {
            echo "<script language='javascript'>
                            let regEmail = document.querySelector('#registerEmail');
                            let message = document.querySelector('.invalidInput_Email');
                            regEmail.classList.add('invalidInput');
                            regEmail.style.display = 'inline';
                            message.style.display = 'inline';

                            document.querySelector('#registerFname').value = '" . $fname . "';
                            document.querySelector('#registerLname').value = '" . $lname . "';
                            document.querySelector('#registerUsername').value = '" . $uname . "';
                        </script>";
        }

        if (!$userRes && !$emailRes) {
            echo "<script language='javascript'>
                            document.querySelector('#registerEmail').value = '';
                            document.querySelector('#registerUsername').value = '';
                        </script>";
        }
    }
}
?>