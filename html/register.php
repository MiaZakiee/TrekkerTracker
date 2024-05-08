<?php
include("connect.php");

if (isset($_POST['registerBtn'])) {
    // Retrieve data from form
    $fname = $_POST['registerFname'];
    $lname = $_POST['registerLname'];
    $email = $_POST['registerEmail'];
    $uname = $_POST['registerUsername'];
    $pword = hash('sha256', $_POST['registerPassword']);

    // Check if username or email already exists
    $sqlUser = "SELECT * FROM tbluseraccount WHERE username='" . $uname . "'";
    $sqlEmail = "SELECT * FROM tbluseraccount WHERE email='" . $email . "'";
    $userResult = mysqli_query($connection, $sqlUser);
    $emailResult = mysqli_query($connection, $sqlEmail);

    // Check if username or email already exists
    if (mysqli_num_rows($userResult) == 0 && mysqli_num_rows($emailResult) == 0) {
        // Insert into tbluseraccount
        $sql = "INSERT INTO tbluseraccount(email, username, password) VALUES ('$email', '$uname', '$pword')";
        mysqli_query($connection, $sql);

        // Get the last inserted user_id
        $lastUserID = mysqli_insert_id($connection);

        // Insert into tbluserprofile using the last inserted user_id
        $sql2 = "INSERT INTO tbluserprofile(user_id, fname, lname) VALUES ('$lastUserID', '$fname', '$lname')";
        mysqli_query($connection, $sql2);

        // Redirect user after successful registration
        echo "<script language='javascript'>
                        document.querySelector('.modalBox').style.display = 'inline';
                        setTimeout(20000);
                        setTimeout(() =>location.replace('./index.php'), 1300);
                        
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
