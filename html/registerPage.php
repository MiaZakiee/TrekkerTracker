<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TrekkerTracker | Register</title>
    <link href="/css/styles2.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- <link href="https://fonts.googleapis.com/css2?family=ssPlayfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet"> -->
</head>

<body class="loginBody">
    <main class="loginMain">
        <div class="loginLeft">
            <div class="login">
                <div class="loginMessage">
                    <p class="registerText" style="font-family: Playfair Display">Create an account</p>
                    <p style="font-size: 17px; font-weight: 200; opacity: 0.5;text-align: center;">Always remember to drink water</p>
                </div>
                <form class="loginForm" method="post">
                    <div class="loginFields">
                        <div class="loginInput">
                            <label for="registerName" style="font-family: Playfair Display">Name</label>
                            <div class="registerNames">
                                <input type="text" class="htmlForm-control loginTextField regField" name="registerFname" placeholder="First name" autocomplete="given-name" required />
                                <input type="text" class="htmlForm-control loginTextField regField" name="registerLname" placeholder="Last name" autocomplete="family-name" required />
                            </div>
                        </div>
                        <div class="loginInput">
                            <label for="registerUsername" style="font-family: Playfair Display">Username</label>
                            <input type="text" id="registerUsername" class="htmlForm-control loginTextField" name="registerUsername" placeholder="Enter your username" autocomplete="username" required />
                            <div class="invalidInput_Username">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z" />
                                </svg>
                                Username already exists
                            </div>
                        </div>
                        <div class="loginInput">
                            <label for="registerEmail" style="font-family: Playfair Display">Email</label>
                            <input type="email" id="registerEmail" class="htmlForm-control loginTextField" name="registerEmail" placeholder="Enter your email" autocomplete="email" required />
                            <div class="invalidInput_Email">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z" />
                                </svg>
                                Email already exists
                            </div>
                        </div>
                        <div class="loginInput">
                            <label for="registerPassword" style="font-family: Playfair Display">Password</label>
                            <input type="password" class="htmlForm-control loginTextField" name="registerPassword" placeholder="*******" autocomplete="off" required />
                            <p>Must be atleast 8 characters</p>
                        </div>
                    </div>

                    <div class="loginButtons">
                        <button type="submit" class="loginBtn" style="font-family: Playfair Display" name="registerBtn">Register</button>
                    </div>
                </form>
                <p style="font-family: Playfair Display">Been here before? <a href="loginPage.php" style="color: black; text-decoration: none;">Log in</a></p>
            </div>
        </div>
        <img src="images/wallpaperflare.com_wallpaper.jpg" alt="test" class="coolPic">
    </main>
</body>

</html>
<?php
include 'register.php'
?>