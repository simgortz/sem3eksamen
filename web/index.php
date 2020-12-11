<?php
// Initialize the session
session_start();

// Include config file
require_once "php/config.php";

// Check if an account was just created
if(isset($_SESSION["accountcreated"])){
    $accountcreated = $_SESSION["accountcreated"];
}else{
    $accountcreated = $_SESSION["accountcreated"] = false;
}

// Check which page the user is visiting
if(isset($_GET['page'])){
    $_SESSION['page'] = $page = $_GET['page'];
    if(preg_match('/^[a-z0-9\-]+$/', $page)){
        $subpages = ["frontpage", "account"];
        $i = 0;
        $pagetoload = "";
        while($i < count($subpages)){
            if($page == $subpages[$i]){
                $pagetoload = $page;
            }
            $i++;
        }
        if($pagetoload == ""){
            $_SESSION['page'] = $page = $pagetoload = "frontpage";
        }
    }
}else{
    $_SESSION['page'] = $page = $pagetoload = "frontpage";
}

// Check if the user is already logged in
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    $loggedin = true;
    $username = $_SESSION["username"];
    if($pagetoload == "account"){
        include "php/reset-password.php";
    }
}else{
    $loggedin = false;
    if($pagetoload == "account"){
        require "php/register.php";
    }elseif($pagetoload == "frontpage"){
        require "php/login.php";
    }
}

// Close connection to database
$mysqli->close();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sem. 3 - Eksamen</title>
        <!-- DO NOT EDIT style.css DIRECTLY - EDIT .scss FILES IN /work/scss -->
        <link rel="stylesheet" href="https://use.typekit.net/dcp5gzy.css">
        <link rel="stylesheet" href="style.css">
        <script src="https://kit.fontawesome.com/280107c2ef.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <!-- Bootstrap container for the Bootstrap Grid System. Consider "container-fluid" etc. -->
        <div class="container-fluid">
            <div class="row topmenu">
                <div class="col">
                    <nav class="navbar navbar-expand-sm">
                        <a class="navbar-brand" href="index.php?page=frontpage">Dog > Cat > Rat</a>
                        <!-- Navbar / menu toggle button-->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon fas fa-bars"></span>
                        </button>
                        <!-- Toggled navbar-->
                        <div class="collapse navbar-collapse" id="navbarToggler">
                            <ul class="navbar-nav mr-auto mt-2 mt-sm-0">
                                <?php
                                if($loggedin == true){
                                    // Menu items if logged in
                                    echo '
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.php?page=account">Account</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="php/logout.php">Log out</a>
                                    </li>
                                    ';
                                }else{
                                    // Menu items if NOT logged in
                                    echo '
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.php?page=account">Register</span></a>
                                    </li>
                                    ';
                                }
                                ?>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col content-wrapper">
                    <?php 
                    // Include content based on subpage
                    include "subpages/" . $pagetoload . ".php";
                    ?>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>