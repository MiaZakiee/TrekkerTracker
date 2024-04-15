    <?php
    include("connect.php");
    ?>

    <?php

    if (isset($_POST['loginButton'])) {
        $uname = $_POST['loginUsername'];
        $pword = hash('sha256', $_POST['loginPassword']);

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
                $row = mysqli_fetch_assoc($passResult);
                $userType = $row['user_type'];

                $_SESSION['fname'] = $row['$fname'];
                $_SESSION['lname'] = $row['$lname'];

                session_commit();

                if ($userType == 3) {
                    echo "<script language='javascript'>
                    setTimeout(() =>location.replace('./airlineAdminDashboard.php'), 1300);
                </script>";
                } else {
                    echo "<script language='javascript'>
                    setTimeout(() =>location.replace('./StartUp.php'), 1300);
                </script>";
                }
            } else {
                // Password does not match
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
            // Username is not found
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
        // TODO NEED GENDER??????????????   ?????????
    }
    ?>