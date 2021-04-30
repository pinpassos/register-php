<?php
// Data Base Params
$servername = 'localhost';
$username = 'root';
$password = '';
$db_name = 'supremologin';

// Data Base Connection
$connect = mysqli_connect($servername, $username, $password, $db_name);

// Verify Data Base Connection
if(mysqli_connect_error($connect)) {
    echo "Error connect: ".mysqli_connect_error();
}

?>