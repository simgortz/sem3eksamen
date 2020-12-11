<?php 
    if ($loggedin === true){
        echo "
                <div class=\"info-box\">
                    <p>Username: " . $username . "</p>
                </div>
            ";
    }else{
        include('php/login-form.php');
    }
?>