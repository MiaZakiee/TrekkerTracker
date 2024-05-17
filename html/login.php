<?php
include 'connect.php';

// handles login button
if (isset($_POST['loginButton'])) {
    // fetches username and hashed password
    $uname = $_POST['loginUsername'];
    $pass = hash('sha256', $_POST['loginPassword']);

    // checks if user exists
    $sqlEmail = "SELECT * FROM tbluseraccount WHERE username='$uname' OR email='$uname'";
    $result = mysqli_query($connection, $sqlEmail);
    $userExists = mysqli_num_rows($result);

    if ($userExists) {
        $row = mysqli_fetch_assoc($result);
        $userType = $row['user_type'];
        $passCheck = $row['password'];
        $isBanned = ($row['isBanned'] == 1);

        // gets session details
        $sessionID = $row['user_id'];
        $sqlname = "SELECT * FROM tbluserprofile where user_id='$sessionID'";
        $sessionName = mysqli_query($connection, $sqlname);
        $namerow = mysqli_fetch_assoc($sessionName);

        $_SESSION['fname'] = $namerow['fname'];
        $_SESSION['lname'] = $namerow['lname'];

        // checks if password is valid
        if ($pass == $passCheck) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $uname;
            // leads user based on their account type
            if ($userType == 0) {
                $_SESSION['adminID'] = $sessionID;
                echo "<script language='javascript'>
                        location.replace('./AdminDashboard.php');
                    </script>";
            } else {
                $_SESSION['userID'] = $sessionID;
                if ($isBanned) {
                    // TODO add shit here yk
                    echo "<script language='javascript'>
                        let logPassword = document.querySelector('#loginPassword');
                        let message = document.querySelector('.invalidInput_Banned');
                        logPassword.classList.add('invalidInput');
                        logPassword.style.display = 'inline';
                        message.style.display = 'inline';
                        
                        let logEmail = document.querySelector('#loginUsername');
                        logEmail.value = '" . $uname . "';
                    </script>";
                }else if(isset($_SESSION['prev'])){
                
                    echo "<script>
                    location.replace('".$_SESSION['prev']."');
                    </script>";
                }else {
                    echo "<script language='javascript'>
                        location.replace('./index.php');
                    </script>";
                }

            }
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
                            let pass = document.querySelector('#loginPassword');
                            
                           
                            logEmail.classList.add('invalidInput');
                            logEmail.style.display = 'inline';
                            message.style.display = 'inline';
                        </script>";
    }
}
