<?php

$db_host = "";   //Enter DB Host name
$db_user = "root";  //Enter DB user name 
$db_pass = "";      //Enter DB user password
$db_name = "reset_pwd"; //Enter Database table name

$conn = mysqli_connect($db_host,$db_user,$db_pass,$db_name);

if(!$conn){
    die("Cannot connect to Database");
}
