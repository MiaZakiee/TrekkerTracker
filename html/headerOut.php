
<link
        rel='stylesheet' href='./css/headOut.css'>

<div class="container">
    <div class="rowHead">
        <img alt="Home" id = "logo" style="left: 7%; top: 5px; position: absolute; width: 200px; height: 110px;" src="./icons/logoTrans.png">
        <ul style="display: flex; flex-direction: row; list-style-type: none">
            <li> <a href="#">Book</a></li>
            <li><a href="#">Travel Info</a></li>
            <li><a href="#">Explore</a></li>
            <li><a href="#">About</a></li>
            <?php
                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']) ?>
                <li><a href = '#' data-bs-toggle="modal" data-bs-target="#ticketsModal">Your Tickets</a></li>
            

        </ul>
        <?php
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']) { // If the user is logged in
            ?>
            <!-- Code for buttons when user is logged in -->
            <img src = "./icons/default.png" alt="userimage" style="margin: 40px 0 0 480px; max-width: 50px;max-height: 50px;">
            <p style="font-size: 30px; margin: 40px auto 0 0"><?php echo $_SESSION['username']; ?></p>
            <button type="button" class="btn btn-light" id = "logoutbtn" onclick="window.location.href='logout.php'">Logout</button>

        <?php
        }else { // If the user is not logged in
            ?>
            <!-- Code for buttons when user is NOT logged in -->
            <button type="button" class="btn btn-light" id="OpenLog">Log In</button>
            <button type="button" class="btn btn-dark" id="OpenReg">Sign Up</button>
        <?php
        }
        ?>
    </div>




</div>