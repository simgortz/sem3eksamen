<?php
    // Variables for connecting to database - LOCAL
    $user = 'root'; 
    $password = '';
    $database = 'eksamen';
    $port = null;
    $mysqli = new mysqli('127.0.0.1:3306', $user, $password, $database, $port);

    // Variables for connecting to database - SERVER
    // $user = 'simgortz_com'; 
    // $password = 'mgDLTsBpWEg3Npp8FSpbTzDL';
    // $database = 'simgortz_com';
    // $port = null;
    // $mysqli = new mysqli('simgortz.com.mysql', $user, $password, $database, $port);

    // Test for connection errors - If connecting, show info. If not, show error.
if($mysqli->connect_error){
    die('connect error (' . ($mysqli->connect_errno . ') ' . $mysqli->connect_error));
}else{
    // echo '<p>Connection: </p>' . $mysqli->host_info;
    // echo '<p>Server: </p>' . $mysqli->server_info;
}
?>