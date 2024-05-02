<?php





  $insideSEA = array("Cebu", "Manila", "Davao", "Bandar Seri Begawan", "Phnom Penh", "Dili", "Jakarta", "Vientiane", "Kuala Lumpur", "Nay Pyi Taw", "Singapore", "Bangkok", "Hanoi", "Tokyo");

if(isset($_POST['Origin']) && isset($_POST['Destination']))
{
    if (in_array($_POST['Origin'], $insideSEA) && in_array($_POST['Destination'], $insideSEA)) {
        // Code to be executed if both Origin and Destination are in Southeast Asia
        // ... (replace with your desired logic)
    } else {
        // Code to be executed if either Origin or Destination is not in Southeast Asia
        // ... (replace with appropriate error handling or message)
    }
}
?>