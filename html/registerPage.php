<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TrekkerTracker | Register</title>
    <link href="styles2.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=ssPlayfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
</head>

<!-- <body class="loginBody" style="align-items: center; background-position: 50% 60%; background-size: 77%;background-image: url('https://images.unsplash.com/photo-1543797414-a0c3ad076f7c?q=80&w=1933&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');"> -->

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
                                <input type="text" class="htmlForm-control loginTextField regField" name="registerFname" placeholder="First name" required />
                                <input type="text" class="htmlForm-control loginTextField regField" name="registerLname" placeholder="Last name" required />
                            </div>
                        </div>
                        <div class="loginInput">
                            <label for="registerUsername" style="font-family: Playfair Display">Username</label>
                            <input type="text" class="htmlForm-control loginTextField" name="registerUsername" placeholder="Enter your email" required />
                        </div>
                        <div class="loginInput">
                            <label for="registerEmail" style="font-family: Playfair Display">Email</label>
                            <input type="email" class="htmlForm-control loginTextField" name="registerEmail" placeholder="Enter your email" required />
                        </div>
                        <div class="loginInput">
                            <label for="registerPassword" style="font-family: Playfair Display">Password</label>
                            <input type="password" class="htmlForm-control loginTextField" name="registerPassword" placeholder="*******" required />
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
        <img src="/html/assets/wallpaperflare.com_wallpaper.jpg" alt="test" class="coolPic">
    </main>
</body>

</html>


<?php
include 'register.php'
?>