<?php
session_start();
if (session_destroy()) {
    echo "<script>
            window.location.replace('../loginPage.php');
        </script>";
}
