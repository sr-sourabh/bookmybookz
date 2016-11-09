<?php

$servername='localhost';
$username='root';
$password='';
$dbname= 'test';

@$conn = mysqli_connect($servername,$username,$password,$dbname);

if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully ";

?>