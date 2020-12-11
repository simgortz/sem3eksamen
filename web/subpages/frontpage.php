<?php 
    if ($loggedin === true){
        echo '
        <canvas id="canvas" height="800" width="800"></canvas>
        <h1 id="playerScore"></h1>
        <script src="js/main.js"></script>
        ';
    }else{
        include('php/login-form.php');
    }
?>