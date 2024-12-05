<?php

$HOSTNAME = "localhost";
$USERNAME = "root";
$PASSWORD = "";
$DBNAME = "carrental";

$conn = mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DBNAME);

if(!$conn){
    echo "Connection Failed";
    die();
}
?>