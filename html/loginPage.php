<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link href="./css/styles2.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
</head>

<body class="loginBody">
    <main class="loginMain">
        <div class="loginLeft">
            <div class="login">
                <div class="loginMessage">
                    <p class="LoginText" style="font-family: Playfair Display">Welcome Back</p>
                    <p style="font-size: 17px; font-weight: 200; opacity: 0.5;text-align: center;">The faster you fill up, the faster you get a ticket</p>
                </div>
                <form class="loginForm" method="post">
                    <div class="loginFields">
                        <div class="loginInput">
                            <label for="loginUsername" style="font-family: Playfair Display">Email</label>
                            <input type="text" id="loginUsername" class="htmlForm-control loginTextField" name="loginUsername" placeholder="Enter your email" />
                            <div class="invalidInput_Login">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z" />
                                </svg>
                                Username does not exist
                            </div>
                        </div>
                        <div class="loginInput">
                            <label for="loginPassword" style="font-family: Playfair Display">Password</label>
                            <input type="password" id="loginPassword" class="htmlForm-control loginTextField" name="loginPassword" placeholder="*******" />
                            <div class="invalidInput_Password">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z" />
                                </svg>
                                Incorrect password
                            </div>
                        </div>
                        <div class="loginCheck">
                            <div>
                                <input type="checkbox" id="Checker">
                                <label for="Checker" style="font-family: Playfair Display">Remember Me </label>
                            </div>
                            <a href="#" style="font-family: Playfair Display; color: black; text-decoration: none;">Forgot Password?</a>
                        </div>
                    </div>

                    <div class="loginButtons">
                        <button type="submit" class="loginBtn" name="loginButton" style="font-family: Playfair Display">Login</button>
                        <button type="button" class="loginChrome" style="font-family: Playfair Display">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="30" viewBox="0 0 48 48">
                                <path fill="#fbc02d" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12	s5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24s8.955,20,20,20	s20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"></path>
                                <path fill="#e53935" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039	l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"></path>
                                <path fill="#4caf50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36	c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"></path>
                                <path fill="#1565c0" d="M43.611,20.083L43.595,20L42,20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571	c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"></path>
                            </svg>
                            Sign in with Chrome
                        </button>
                    </div>
                </form>
                <p style="font-family: Playfair Display">Don't Have an Account? <a href="registerPage.php" style="color: black; text-decoration: none;">Register Here!</a></p>
            </div>
        </div>
        <img src="images/wallpaperflare.com_wallpaper.jpg" alt="tets" class="coolPic">
    </main>
</body>
<div id="loginToWeb" class="modal">
    <div class="modal-content">

        <p style="font-size: 28px; color: #3C8CCC; font-weight: 700;">Welcome To TrekkerTracker!</p>

    </div>
</div>
<div id="invalidInp" class="modal">
    <div class="modal-content">

        <p style="font-size: 28px; color: red;">Wrong Password!</p>

    </div>
</div>
<div id="invalidUser" class="modal">
    <div class="modal-content">

        <p style="font-size: 28px; color: red;">Wrong Email or User!</p>
    </div>
</div>

</html>

<?php
include 'login.php'
?>