<?php

define('hostname','localhost');
define('username','root');
define('password','');
define('database','mine');

$conn = new mysqli (hostname,username,password,database);
if($conn->errno){
    die("Failed to connect : " . $conn->errno);
}