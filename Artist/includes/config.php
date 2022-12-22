<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "artgallery";

$con = mysqli_connect($servername,$username,$password,$dbname);

if($con)
{
	//echo"connection Ok" ;
}
else
{
	echo "Connection Failed";
}
?>