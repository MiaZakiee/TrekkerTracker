    <?php
    include("connect.php");
    ?>

    <?php

    if (($_POST['loginButton'])) {
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

                // GET fname and lname
                $sessionID = $row["user_id"];
                $sqlname = "SELECT * FROM tbluserprofile WHERE user_id='" . $sessionID . "'";
                // $sqlname = "SELECT * FROM tbluserprofile WHERE user_id=='" . $sessionID . "'";
                $namequery = mysqli_query($connection, $sqlname);
                $namerow = mysqli_fetch_assoc($namequery);

                $_SESSION["fname"] = $namerow["user_fname"];
                $_SESSION["lname"] = $namerow["user_lname"];

                if ($userType == 3) {
                    $_SESSION["airlineID"] = $sessionID;
                    echo "<script language='javascript'>
                    setTimeout(() =>location.replace('./airlineAdminDashboard.php'), 1300);
                </script>";
                } else {
                    $_SESSION["guestID"] = $sessionID;
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