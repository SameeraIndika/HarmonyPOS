<?php

define('DB_SERVER', "localhost");
define('DB_USERNAME', "root");
define('DB_PASSWORD', "");
define('DB_DATABSE', "harmony_pos");

$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABSE);

if(!$connection) {
    die("Connection Failed: ". mysqli_connect_error());
}

?>