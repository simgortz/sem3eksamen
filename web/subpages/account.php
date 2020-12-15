<?php 
if ($loggedin === true){
    // If logged in, show account info
    echo "
        <div class=\"account-information\">
            <h1>Welcome " . $username . "!</h1>
            <p>On this page you can use the formular below if you wish to change your password.</p>
        </div>
    ";
    // If password was just changed, let the user know
    if($passwordchanged == true){
        echo "
        <div class=\"account-information\">
            <p>Your password has been changed.</p>
        </div>";
    }
}
// If NOT logged in, show register form
include("php/login-form.php");
?>