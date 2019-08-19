<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'findmygame'); 

$connect = new  mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE); 

if($connect->connect_error) {
    die("connection failed: " . $connect->connect_error);
} else {
    // echo "Successfully Connected";
}