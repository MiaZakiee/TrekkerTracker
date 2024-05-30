<?php
include("connect.php");

session_start();
if (!isset($_SESSION['adminID'])) {
    echo "<script>
    location.replace('./index.php')   
    </script>";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>


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
        <symbol id="home" viewBox="0 0 16 16">
            <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z" />
        </symbol>
        <symbol id="speedometer2" viewBox="0 0 16 16">
            <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z" />
            <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z" />
        </symbol>
        <symbol id="table" viewBox="0 0 16 16">
            <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z" />
        </symbol>
        <symbol id="people-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
        </symbol>
        <symbol id="grid" viewBox="0 0 16 16">
            <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z" />
        </symbol>
    </svg>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>
    <main class="d-flex flex-nowrap">
        <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary" style="width: 280px; height: 100vh;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <img src="./images/logoWhite.png" alt="logo" style="width: 50px; height: 50px;">
                <span class="fs-4" style="font-family: Signika">TrekkerTracker</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li>
                    <a href="./statsPage.php" class="nav-link active" aria-current="page">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="#speedometer2" />
                        </svg>
                        Dashboard
                    </a>
                    <a href="./AdminDashboard.php" class="nav-link link-body-emphasis">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="#speedometer2" />
                        </svg>
                        User Accounts
                    </a>
                </li>
                <li>
                    <a href="./airlineAdminDashboard.php" class="nav-link link-body-emphasis">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="#speedometer2" />
                        </svg>
                        Flights
                    </a>
                </li>
                <li>
                    <a href="./FlightReports.php" class="nav-link link-body-emphasis">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="#speedometer2" />
                        </svg>
                        Flight Reports
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
                <ul class="dropdown-menu text-small shadow">
                    <li><a class="dropdown-item" href="./utils/logout.php">Sign out</a></li>
                </ul>
            </div>
        </div>
        <div class="dashboardBody container-fluid">
            <!-- Stats A -->
            <h2>Recent Bookings</h2>
            <div class="table-responsive small">
                <table class="table table-striped table-sm flightsTbl">
                    <thead>
                        <tr>
                            <th scope="col">Origin</th>
                            <th scope="col">Destination</th>
                            <th scope="col">Seat Accomodation</th>
                            <th scope="col">Charter Flight</th>
                            <th scope="col">Departure</th>
                            <th scope="col">Arrival</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            $sql = "SELECT * FROM `tblbookingsystem` ORDER BY booking_id DESC LIMIT 5;";

                            $result = mysqli_query($connection, $sql);


                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <td class=""><?php echo $row['Origin']; ?></td>
                                <td class=""><?php echo $row['Destination']; ?></td>
                                <td class=""><?php echo $row['Seat_Accomodation']; ?></td>
                                <td class=""><?php echo ($row['CharterFlight'] ? 'True' : 'False'); ?></td>
                                <td class=""><?php echo date('Y-m-d H:i', strtotime($row['departure_dt'])); ?></td>
                                <td class=""><?php echo date('Y-m-d H:i', strtotime($row['arrival_dt'])); ?></td>
                        </tr>
                    <?php
                            }

                    ?>

                    </tbody>
                </table>
            </div>
            <!-- Stats B -->
            <div class="charts d-flex flex-row">
                <div class="dashboardBody container-fluid">
                    <figure class="highcharts-figure">
                        <div id="chartA"></div>
                        <p class="highcharts-description">
                        </p>
                    </figure>
                </div>
                <div class="dashboardBody container-fluid">
                    <figure class="highcharts-figure">
                        <div id="chartB"></div>
                        <p class="highcharts-description">
                        </p>
                    </figure>
                </div>
            </div>
            <h2>Recent users</h2>
            <div class="table-responsive small">
                <div class="table-responsive small">
                    <table class="table table-striped table-sm flightsTbl">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $sql = "SELECT * FROM `tbluserprofile` ORDER BY user_id DESC LIMIT 5;";
                                $result = mysqli_query($connection, $sql);
                                $sql2 = "SELECT username,email FROM `tbluseraccount` ORDER BY user_id DESC LIMIT 5;";
                                $result2 = mysqli_query($connection, $sql2);


                                while ($row = mysqli_fetch_assoc($result)) {
                                    $row2 = mysqli_fetch_assoc($result2)
                                ?>
                                    <td class=""><?php echo $row['fname'];
                                                    echo " ";
                                                    echo $row['lname']; ?></td>
                                    <td class=""><?php echo $row2['username'] ?></td>
                                    <td class=""><?php echo $row2['email'] ?></td>
                            </tr>
                        <?php
                                }

                        ?>

                        </tbody>
                    </table>
                    <table class="table table-striped table-sm flightsTbl">
                        <thead>
                            <tr>
                                <th scope="col">TrekkerTracker Total number of users</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = 'SELECT count(user_id) AS totalUsers from tbluserprofile';
                            $result = mysqli_query($connection, $sql);
                            $row = mysqli_fetch_assoc($result);
                            ?>
                            <tr>
                                <td class=""><?php echo $row['totalUsers'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- <h2>List of Domestic Flights</h2> -->


            </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <?php
    $sql = "SELECT destination, COUNT(destination) AS flight_count FROM tblflights GROUP BY destination";
    $result = mysqli_query($connection, $sql);
    $places = [];
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $places[] = $row['destination'];
        $data[] = $row['flight_count'];
    }
    $places = json_encode($places);
    $data = json_encode($data);


    $sql = "SELECT Seat_Accomodation, COUNT(Seat_Accomodation) AS ac FROM tblbookingsystem GROUP BY Seat_Accomodation";
    $result = mysqli_query($connection, $sql);
    $accommodations = [];
    $dataCount = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $accommodations[] = $row['Seat_Accomodation'];
        $dataCount[] = $row['ac'];
    }
    $accommodations = json_encode($accommodations);
    $dataCount = json_encode($dataCount);
    ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var places = <?php echo $places; ?>;
            var counts = <?php echo $data; ?>.map(Number); // Ensure counts are numbers

            var dataSeries = places.map(function(place, index) {
                return {
                    name: place,
                    y: counts[index]
                }; // Correctly map places to counts
            });

            Highcharts.chart('chartA', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Number of Flights toward catered cities',
                    align: 'center'
                },
                series: [{
                    name: 'Flights',
                    colorByPoint: true,
                    data: dataSeries
                }]
            });

            var accommodations = <?php echo $accommodations; ?>;
            var accommodationsCount = <?php echo $dataCount; ?>.map(Number); // Ensure counts are numbers

            var dataSeriesB = accommodations.map(function(accommodation, index) {
                return {
                    name: accommodation,
                    y: accommodationsCount[index]
                }; // Correctly map accommodations to counts
            });

            Highcharts.chart('chartB', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Seating Accomodations booked by users',
                    align: 'center'
                },
                series: [{
                    name: 'Flights',
                    colorByPoint: true,
                    data: dataSeriesB
                }]
            });
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="./script/sidebars.js"></script>
</body>

</html>