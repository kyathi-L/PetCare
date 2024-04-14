<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername,$username,$password);

$sql="CREATE DATABASE booknow";
mysqli_query($conn,$sql);
if(!$conn)
{
    die("sorry failed to connect". mysqli_connect_error());
}
else{
echo"success";
}
?>
