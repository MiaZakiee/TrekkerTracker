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
        <form method="POST" action = "BookingSystem.php">

            <div class="containBooking">
                <div class="Bookings" style="padding-left: 30px;">
                    <label for="Chartered">Charter Flight?</label>
                    <input type="checkbox" class="btn-check" id="Chartered" name="Chartered" autocomplete="off">
                    <label class="btn btn-outline-primary" for="Chartered" id="chartered?">No</label>
                </div>
                <div class="Bookings">
                    <label for="Origin">From</label>
                    <select id = "Origin" name = "Origin">

                            <option>Cebu</option>
                            <option>Manila</option>
                            <option>Davao</option>
                            <option>Tokyo</option>
                            <option>Seoul</option>
                            <option>Jakarta</option>


                    </select>

                </div>
                <div class="Bookings">
                    <label for="Destination">To</label>
                    <select name = "Destination" id = "Destination">

                            <option>Cebu</option>
                            <option>Manila</option>
                            <option>Davao</option>
                            <option>Tokyo</option>
                            <option>Seoul</option>
                            <option>Jakarta</option>

                    </select>

                </div>

                <div class="Bookings">
                    <label for="Accommodation">Seat Class</label>
                    <select name="Accommodation" id = "Accommodation">


                            <option>First Class</option>
                            <option>Business Class</option>
                            <option>Premium Economy Class</option>
                            <option>Economy</option>

                    </select>
                    <button type="submit" id="Booked" name = "Booked" style="margin-top: 50px;" disabled>
                        <svg class="arr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M11 4.717c-2.286-.58-4.16-.756-7.045-.71A1.99 1.99 0 0 0 2 6v11c0 1.133.934 2.022 2.044 2.007 2.759-.038 4.5.16 6.956.791V4.717Zm2 15.081c2.456-.631 4.198-.829 6.956-.791A2.013 2.013 0 0 0 22 16.999V6a1.99 1.99 0 0 0-1.955-1.993c-2.885-.046-4.76.13-7.045.71v15.081Z" clip-rule="evenodd"/>
                        </svg>


                        <span class="text">Book!</span>
                        <span class="circle"></span>
                        <svg class="arr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2a1 1 0 0 0 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                </div>

                <div class="Bookings">
                    <label for="RTrip">Round Trip?</label>
                    <input type="checkbox" class="btn-check" id="RTrip" name="RTrip" autocomplete="off">
                    <label class="btn btn-outline-primary" id="rtrip?" for="RTrip">No</label>
                </div>
                <div class="Bookings">
                    <label for="DateInput1">Departure Date</label>
                    <input type="text" style="background-color: white;" class="form-control" id="DateInput1" name = "DateInput1" placeholder="Click to Select Date">

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
                    <h5 style="margin: 0 auto" class="modal-title" id="datePickerModalLabel">Select a Date</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="datepicker" id="eventDatePicker_DateInput1"></div>

                    <div class="datepicker" id="eventDatePicker_DateInput2"></div>

                </div>
            </div>
        </div>
    </div>
</body>
<script src="./script/script.js"></script>

</html>

