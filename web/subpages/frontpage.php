<?php 
if ($loggedin === true){
    // Show game if logged in
    echo '
    <canvas id="canvas" height="800" width="800"></canvas>
    <h1 id="playerScore"></h1>
    <script src="js/main.js"></script>
    <div class="info-box mobile-alert">
        <h1>Sorry..</h1>
        <p>Unfortunately, this game cannot be played on mobile devices as it requires the use of a keyboard.</p>
    </div>
    ';
}else{
    // Show login form if NOT logged in
    include('php/login-form.php');
}
?>