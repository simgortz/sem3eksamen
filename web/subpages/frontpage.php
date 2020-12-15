<?php 
if ($loggedin === true){
    // Show game if logged in
    echo '
    <div class="text-on-background">
        <p>DogCatRat is a multiplayer game for two people. One person controls the cat using the W, A, S, and D keys, and the other controls the dog using the arrow keys.</p>
        <p>The cat wins by catching all the rats, while the dog wins by catching the cat.</p>
        <p>The dog should avoid catching rats, as doing so will stop the dog from being able to move for a few seconds.</p>
    </div>
    <canvas id="canvas" height="800" width="800"></canvas>
    <h1 id="playerScore"></h1>
    <div class="text-on-background">
        <p>Click <a href="index.php">here</a> to reset the score.</p>
    </div>
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