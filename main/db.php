<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'passwordhere');
define('DB_NAME', 'dbnamehere');
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if($link === false){
    die("There was an error connecting to database: " . mysqli_connect_error());
}

$conn = $link; //so i dont get confused :D
$mysqli = $conn; // i use mysqli now
?>