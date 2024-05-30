<?php
include("connect.php");

session_start();
if (!isset($_SESSION['userID'])) {
    echo "<script>
    location.replace('./index.php')
    </script>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['cancel_flight_id'])) {
        $booking_id = $_POST['cancel_flight_id'];
        $cancel_query = "UPDATE tblbookingsystem SET isCancelled = 1 WHERE booking_id = '$booking_id'";
        if (mysqli_query($connection, $cancel_query)) {
            echo "<script>alert('Flight cancelled successfully!');</script>";
        } else {
            echo "<script>alert('Failed to cancel the flight. Please try again.');</script>";
        }
    } else {
        $user_id = $_SESSION['userID'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if (!empty($password) && $password !== $confirm_password) {
            echo "Passwords do not match!";
            exit;
        }

        $check_username = "SELECT user_id FROM tbluseraccount WHERE username = '$username' AND user_id != '$user_id'";
        $res_username = mysqli_query($connection, $check_username);
        if (mysqli_num_rows($res_username) > 0) {
            echo "Username is already taken!";
            exit;
        }

        $check_email = "SELECT user_id FROM tbluseraccount WHERE email = '$email' AND user_id != '$user_id'";
        $res_email = mysqli_query($connection, $check_email);
        if (mysqli_num_rows($res_email) > 0) {
            echo "Email is already taken!";
            exit;
        }

        if (!empty($password)) {
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            $update_account = "UPDATE tbluseraccount SET username = '$username', email = '$email', password = '$hashed_password' WHERE user_id = '$user_id'";
        } else {
            $update_account = "UPDATE tbluseraccount SET username = '$username', email = '$email' WHERE user_id = '$user_id'";
        }
        mysqli_query($connection, $update_account);

        echo "<script>alert('Profile updated successfully!'); location.replace('./userProfile.php');</script>";
    }
}
?>
<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Airline Admin</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sidebars/">
    <link href="https://fonts.googleapis.com/css2?family=Signika:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet
    " integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    </style>
    <!-- Custom styles for this template -->
    <link href="./css/sidebars.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/styles2.css">
</head>

<body>
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="bootstrap" viewBox="0 0 118 94">
            <title>Bootstrap</title>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z"></path>
        </symbol>
        <!-- Add other SVG symbols here if needed -->
    </svg>

    <main class="d-flex flex-nowrap ">
        <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary" style="width: 280px; height: 100vh;">
            <a href="./index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <img src="./images/logoWhite.png" alt="logo" style="width: 50px; height: 50px;">
                <span class="fs-4" style="font-family: Signika">TrekkerTracker</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li>
                    <a href="./userProfile.php" class="nav-link active" aria-current="page">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="#speedometer2" />
                        </svg>
                        Profile
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <strong>
                        <?php
                        echo $_SESSION["fname"], " ", $_SESSION["lname"];
                        ?>
                    </strong>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="./utils/logout.php">Sign out</a></li>
                </ul>
            </div>
        </div>
        <div class="dashboardBody container-fluid">
            <form class="userProfile" method="post" action="">
                <h3>Profile</h3>
                <?php
                $user_id = $_SESSION['userID'];
                $queryB = "SELECT username, email FROM tbluseraccount WHERE user_id = '" . $user_id . "'";
                $resB = mysqli_query($connection, $queryB);
                $rowB = mysqli_fetch_assoc($resB);
                ?>
                <input type="hidden" id="orig_username" value="<?php echo $rowB['username']; ?>">
                <input type="hidden" id="orig_email" value="<?php echo $rowB['email']; ?>">

                <div class="d-flex flex-row" style="margin-bottom:50px; margin-left: 100px;">
                    <img src="./images/profileA.jpg" class="img-thumbnail" style="height: 200px; width: 200px;">
                    <div class="d-flex flex-column">
                        <h1><?php echo $_SESSION["fname"] . ' ' . $_SESSION["lname"]; ?></h1>
                        <div class="d-flex justify-content-between">
                            <h4>Details</h4>
                            <h4 id="editLabel" onclick="toggleEdit()">edit</h4>
                        </div>
                        <style>
                            .updateLabel {
                                width: 150px;
                            }
                        </style>
                        <div class="d-flex flex-row">
                            <h6 class="updateLabel">Name</h6>
                            <input class="" id="fieldFname" type="text" name="fname" value="<?php echo $_SESSION['fname'] ?>" disabled>
                            <input class="" id="fieldLname" type="text" name="lname" value="<?php echo $_SESSION['lname'] ?>" disabled>
                        </div>

                        <div class="d-flex flex-row">
                            <h6 class="updateLabel">Username</h6>
                            <input class="updateField" id="fieldUname" type="text" name="username" value="<?php echo $rowB['username'] ?>" disabled>
                        </div>
                        <div class="d-flex flex-row">
                            <h6 class="updateLabel">Email</h6>
                            <input class="updateField" id="fieldEmail" type="email" name="email" value="<?php echo $rowB['email'] ?>" disabled>
                        </div>
                        <div class="d-flex flex-row">
                            <h6 class="updateLabel">Password</h6>
                            <input class="updateField" id="fieldPass" type="password" name="password" placeholder="********" disabled>
                        </div>
                        <div class="d-flex flex-row">
                            <h6 class="updateLabel confirmPass" style="display:none;">Confirm Password</h6>
                            <input class="updateField confirmPass" id="fieldPassConfirm" type="password" name="confirm_password" style="display:none;" value="">
                        </div>
                        <button type="submit" class="btn btn-success confirmPass" style="display:none;">Save Changes</button>
                    </div>
                </div>
            </form>
            <div class="TicketsBooked d-flex flex-column" style="width: 100%">
                <h3>Tickets</h3>
                <?php
                $tickets = "SELECT DISTINCT
            b.booking_id,
            b.isCancelled AS userCancelled,
            b.Seat_Accomodation,
            f.isCancelled AS airlineCancelled,
            f.flight_id,
            f.airline,
            f.origin,
            f.destination,
            f.departureDT
        FROM 
            tblbookingsystem b
        INNER JOIN 
            tblflights f ON b.flight_id = f.flight_id
        WHERE 
            b.user_id = '{$_SESSION['userID']}'";

                // Execute the query
                $resC = mysqli_query($connection, $tickets);

                // Check if the query was successful
                if ($resC === false) {
                    // Query failed, output the error
                    echo "Error executing query: " . mysqli_error($connection);
                    exit; // Stop further execution
                }

                // Fetch the results
                if (mysqli_num_rows($resC) > 0) {
                    // Output the results
                    while ($rowC = mysqli_fetch_assoc($resC)) {
                        $departureDateTime = new DateTime($rowC['departureDT']);
                        $currentDateTime = new DateTime();
                        $isPastFlight = $departureDateTime < $currentDateTime;
                        $isUserCancelled = $rowC['userCancelled'] == 1;
                        $isAirlineCancelled = $rowC['airlineCancelled'] == 1;
                        $buttonClass = ($isUserCancelled || $isAirlineCancelled) ? 'btn btn-secondary' : 'btn btn-danger';
                        $buttonDisabled = ($isUserCancelled || $isAirlineCancelled || $isPastFlight) ? 'disabled' : '';
                        $buttonText = $isUserCancelled ? 'Cancelled' : ($isAirlineCancelled ? 'Cancelled by Airline' : 'Cancel Flight');
                ?>
                        <div class="ticket" style="
                    width: 80%;
                    border: 2px solid white;
                    border-radius: 10px;
                    padding: 20px;
                    margin-bottom: 30px;
                    display: flex;
                    justify-content: center;
                    flex-direction: column;
                    margin-left: 100px;
                    ">
                            <div class="ticket d-flex flex-row" style="
                        justify-content: space-between;
                        ">
                                <h1><?php echo $rowC['airline']; ?></h1>
                                <div style="flex-direction: row; display: flex;">
                                    <h1><?php echo $rowC['Seat_Accomodation']; ?></h1>
                                    <form method="post" action="" style="margin-left: 30px;">
                                        <input type="hidden" name="cancel_flight_id" value="<?php echo $rowC['booking_id']; ?>">
                                        <button type="submit" class="<?php echo $buttonClass; ?>" <?php echo $buttonDisabled; ?>>
                                            <?php echo $buttonText; ?>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex">
                                <div class="left" style="width: 50%">
                                    <h6>PASSANGER TICKET AND BAGGAGE CHECK</h6>
                                    <h6>NAME OF PASSENGER</h6>
                                    <h4><?php echo $_SESSION['fname'] . ' ' . $_SESSION['lname']; ?></h4>
                                    <br><br>
                                    <h4>From: <?php echo $rowC['origin']; ?></h4>
                                    <h4>To: <?php echo $rowC['destination']; ?></h4>
                                </div>
                                <div class="right" style="
                            margin-top:100px;
                            margin-left:100px
                            ">
                                    <h4>Boarding Date: <?php echo $departureDateTime->format('Y-m-d'); ?></h4>
                                    <h4>Boarding Time: <?php echo $departureDateTime->format('H:i'); ?></h4>
                                    <h4>Accommodation: <?php echo $rowC['Seat_Accomodation']; ?></h4>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    // No rows returned
                    echo "You have no bookings with us :(";
                }
                ?>
            </div>

        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@docsearch/js@3"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-r4NyKXgx9MuvIlSFwTL2RIL7/nkYoNi4aj9HV/JwD1iHEd9Jhgy9U7XOpLyb7o+l" crossorigin="anonymous"></script>
    <script src="./script/sidebars.js"></script>
    <script>
        function toggleEdit() {
            var elements = document.querySelectorAll(".updateField");
            var editLabel = document.getElementById("editLabel");
            var isEditing = editLabel.innerText.toLowerCase() === "edit";

            elements.forEach(function(element) {
                element.disabled = !isEditing;
                if (!isEditing) {
                    // Revert to original values if cancelling
                    switch (element.id) {
                        case 'fieldUname':
                            element.value = document.getElementById('orig_username').value;
                            break;
                        case 'fieldEmail':
                            element.value = document.getElementById('orig_email').value;
                            break;
                    }
                }
            });

            var confirmPassElements = document.querySelectorAll(".confirmPass");
            confirmPassElements.forEach(function(element) {
                element.style.display = isEditing ? "block" : "none";
            });

            editLabel.innerText = isEditing ? "cancel" : "edit";
        }
    </script>
</body>

</html>