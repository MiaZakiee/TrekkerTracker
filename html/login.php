<?php
include("connect.php");

if (isset($_POST['loginButton'])) {
    $uname = $_POST['loginUsername'];
    $password = hash('sha256', $_POST['loginPassword']);

    // Check if user or email exists within db
    $sql = "SELECT * FROM tbluseraccount WHERE emailadd = ? OR username = ?";
    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $uname, $uname);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $userExists = mysqli_num_rows($result) != 0;

    if ($userExists) {

        $row = mysqli_fetch_assoc($result);
        // Verify password using hashed value
        if ($password === $row['password']) {
            // Password matches, redirect user to landing page
            echo "<script>
                openModal('loginToWeb');
                
               setTimeout(function() {
              window.location.href = 'startup.php';
         }, 3000);
            </script>";
            exit();
        } else {

            echo "<script>
console.log('Password was: ". $password ."');
console.log('The other password was also: ".hash('sha256', $_POST['loginPassword'])."');
                openModal('invalidInp');
            </script>";
        }
    } else {
        // Username or email not found
        echo "<script>
            openModal('invalidUser');
        </script>";
    }

    // Close statement
    mysqli_stmt_close($stmt);
}

?>
