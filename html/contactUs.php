<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="./css/styles2.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika:wght@300..700&display=swap" rel="stylesheet">
</head>

<body>
    <header class="headerContainer">
        <nav class="navbar navbar-expand-lg ">
            <div class="container-fluid">
                <div class="contactUsLogo">
                    <img src="./images/logo.png" alt="logo" style="height: 80px; width: 80px;">
                    <label style="font-family: Signika">TrekkerTracker</label>
                </div>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Destinations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Booking</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="contactUsMain">
        <div class="getInTouch">
            <div class="contactUsLeft">
                <h1>Contact Us!</h1>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id mollitia quos rerum quis reiciendis odio sequi iste suscipit quisquam eum ad quas atque deleniti repellat commodi cum obcaecati, pariatur non.</p>
                <p>
                    email@email.com <br>
                    123-456-789 <br>
                    <a href="">Customer Support</a>
                </p>
                <div class="contactExtras">
                    <div class="contactCard">
                        <h5>Customer Support</h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit vero rerum ipsum repudiandae iusto labore asperiores distinctio quisquam fugit et consequatur minus eligendi qui, officia eos esse beatae sed eaque.</p>
                    </div>
                    <div class="contactCard">
                        <h5>Feedback and Suggestions</h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed earum magni quos impedit, voluptatem mollitia dignissimos maxime nemo distinctio, quidem, autem dicta esse laboriosam eum vero magnam veniam at similique.</p>
                    </div>
                    <div class="contactCard">
                        <h5>Media Inquiries</h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores vitae quam suscipit necessitatibus optio, fugit debitis nihil facere praesentium maxime animi beatae officia esse quasi doloribus blanditiis qui. Tempore, dolorum?</p>
                    </div>
                </div>
            </div>
            <div class="contactUsRight">
                <h1>Get in touch</h1>
                <p>You can reach us anytime</p>

                <form class="contactUsForm">
                    <div class="fNameLnameContact">
                        <input type="string" class="form-control " id="contact_fName" placeholder="First Name">
                        <input type="string" class="form-control " id="contact_LName" placeholder="Last Name">
                    </div>
                    <input type="email" class="form-control " id="contact_email" placeholder="Email Address">
                    <input type="tel" class="form-control " id="contact_num" placeholder="Phone Number">
                    <input type="string" class="form-control " id="contact_message" placeholder="How can we help?">
                    <button type="submit" class="btn btn-primary contactSubmit">Submit</button>
                </form>
            </div>
        </div>
        <div class="findUs">
            <img src="./images/findUs.jpg" alt="img" class="hell">
            <div class="locInfo">
                <h3>Our Location</h3>
                <h1>Connecting Near and Far</h1>

                <h5>Headquarters</h5>
                <h5>7th Circle of Hell</h5>
                <h5>123 Sesame Street</h5>
                <h5>Hell 666</h5>
                <h5>Hell</h5>
            </div>
        </div>
    </main>
    <footer>

    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>