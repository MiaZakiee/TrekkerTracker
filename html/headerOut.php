
<link
        rel='stylesheet' href='./css/styles.css'>

<div class="container">
    <div class="rowHead">
        <img alt="Home" style="left: 5%; position: absolute; width: 180px; height: 120px" src="https://images.unsplash.com/flagged/photo-1555685460-1d9cf532761b?q=80&w=1973&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
        <ul style="display: flex; flex-direction: row; list-style-type: none">
            <li> <a href="#">Book</a></li>
            <li><a href="#">Travel Info</a></li>
            <li><a href="#">Explore</a></li>
            <li><a href="#">About</a></li>
            <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']){ ?>
                <li><a href="#" onclick="ShowDialog();">Your Tickets</a></li>
            <?php } ?>

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


'

</div>