<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link href="styles2.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
</head>

<!-- <body class="loginBody" style="align-items: center; background-position: 50% 60%; background-size: 77%;background-image: url('https://images.unsplash.com/photo-1543797414-a0c3ad076f7c?q=80&w=1933&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');"> -->

<body class="loginBody">
<main class="loginMain">
    <div class="loginLeft">
        <div class="login">
            <div class="loginMessage">
                <p class="LoginText" style="font-family: Playfair Display">Welcome Back</p>
                <p style="font-size: 17px; font-weight: 200; opacity: 0.5;text-align: center;">The faster you fill up, the faster you get a ticket</p>
            </div>
            <form class="loginForm">
                <div class="loginFields">
                    <div class="loginInput">
                        <label for="loginUsername" style="font-family: Playfair Display">Email</label>
                        <input type="text" class="htmlForm-control loginTextField" id="loginUsername" placeholder="Enter your email" />
                    </div>
                    <div class="loginInput">
                        <label for="loginPassword" style="font-family: Playfair Display">Password</label>
                        <input type="password" class="htmlForm-control loginTextField" id="loginPassword" placeholder="*******" />
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
                    <button type="button" class="loginBtn" style="font-family: Playfair Display">Login</button>
                    <button type="button" class="loginChrome" style="font-family: Playfair Display">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="px" width="40" height="30" viewBox="0 0 48 48">
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
    <img src="/html/assets/wallpaperflare.com_wallpaper.jpg" alt="tets" class="coolPic">
</main>
</body>

</html>

<?php
    include ("login.php")
?>
