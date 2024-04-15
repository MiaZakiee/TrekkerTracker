<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <title>TrekkerTrackerTravels</title>
    <link href="./css/styles.css" rel="stylesheet">
    <!-- Bootstrap Datepicker CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <!-- Bootstrap Datepicker JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

</head>

<body>
    <header class="headOut">
        <?php
        include("headerOut.php")
        ?>
    </header>

    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="5000">
                <img src="https://images.unsplash.com/photo-1615880480595-f5f9b4fb530e?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="5000">
                <img src="https://images.unsplash.com/photo-1697644297524-ee2e2e098f37?q=80&w=1763&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="5000">
                <img src="https://images.unsplash.com/photo-1600664248836-bdeeb2d2b77e?q=80&w=1771&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100" alt="...">
            </div>
        </div>
    </div>
    <hr>



    <div class="section1">
        <h1>Destinations To Go TO</h1>
        <form method="POST">

            <div class="containBooking">
                <div class="Bookings" style="padding-left: 30px;">
                    <label for="Chartered">Charter Flight?</label>
                    <input type="checkbox" class="btn-check" id="Chartered" name="Chartered" autocomplete="off">
                    <label class="btn btn-outline-primary" for="Chartered" id="chartered?">No</label>
                </div>
                <div class="Bookings">
                    <label for="Origin">From</label>
                    <div class="btn-group">
                        <button class="btn btn-lg dropdown-toggle" name="Origin" id="Origin" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Origin
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Cebu</a></li>
                            <li><a class="dropdown-item" href="#">Manila</a></li>
                            <li><a class="dropdown-item" href="#">Davao</a></li>
                            <li><a class="dropdown-item" href="#">Tokyo</a></li>
                            <li><a class="dropdown-item" href="#">Seoul</a></li>
                            <li><a class="dropdown-item" href="#">Jakarta</a></li>

                        </ul>
                    </div>
                </div>
                <div class="Bookings">
                    <label for="Destination">To</label>
                    <div class="btn-group">
                        <button class="btn btn-lg dropdown-toggle" name="Destination" id="Destination" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Destination
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Cebu</a></li>
                            <li><a class="dropdown-item" href="#">Manila</a></li>
                            <li><a class="dropdown-item" href="#">Davao</a></li>
                            <li><a class="dropdown-item" href="#">Tokyo</a></li>
                            <li><a class="dropdown-item" href="#">Seoul</a></li>
                            <li><a class="dropdown-item" href="#">Jakarta</a></li>
                        </ul>
                    </div>

                </div>

                <div class="Bookings">
                    <label for="Accommodation">Seat Class</label>
                    <div class="btn-group">
                        <button class="btn btn-lg dropdown-toggle" name="Accommodation" id="Accommodation" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Accommodation
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">First Class</a></li>
                            <li><a class="dropdown-item" href="#">Business Class</a></li>
                            <li><a class="dropdown-item" href="#">Premium Economy Class</a></li>
                            <li><a class="dropdown-item" href="#">Economy</a></li>
                        </ul>
                    </div>
                    <button type="submit" class="btn btn-info btn-lg" id="Booked" style="margin-top: 50px;">Book!</button>
                </div>

                <div class="Bookings">
                    <label for="RTrip">Round Trip?</label>
                    <input type="checkbox" class="btn-check" id="RTrip" name="RTrip" autocomplete="off">
                    <label class="btn btn-outline-primary" id="rtrip?" for="RTrip">No</label>
                </div>
                <div class="Bookings">
                    <label for="DateInput">Departure Date</label>
                    <input type="text" style="background-color: white;" class="form-control" id="DateInput1" placeholder="Click to Select Date">

                </div>

            </div>

        </form>
        <img src="https://cdn.dribbble.com/userupload/12509456/file/original-a39fd72dbec559ebf98cdc389b6cce23.png?resize=752x">
    </div>
    <!-- DatePicker Modal -->
    <div class="modal fade" id="datePickerModal" tabindex="-1" aria-labelledby="datePickerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="margin-left: 175px;" class="modal-title" id="datePickerModalLabel">Select a Date</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div style="margin-left: 120px;" class="modal-body">

                    <div class="datepicker" id="eventDatePicker_DateInput1"></div>

                    <div class="datepicker" id="eventDatePicker_DateInput2"></div>

                </div>
            </div>
        </div>
    </div>
</body>
<script src="./script/script.js"></script>

</html>