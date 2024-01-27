<?php  
$hostname = "localhost";
$dbname = "ait_tester";
$username = "root";
$password = "";

$conn = mysqli_connect($hostname, $username, $password, $dbname) or die ('gagal terhubung ke database');

require_once('functions.php');

// Get APP URL
function APP_URL(){
    echo "http://localhost/alumniAit";
}
function GET_APP_URL(){
    return "http://localhost/alumniAit";
}