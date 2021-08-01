<?php

$server = "localhost";
$user = "root";
$password = "";
$db = "tech_learning";

$con = mysqli_connect($server,$user,$password,$db);
if(!$con){

    echo"<script>alert('Connection Failed')</script>";

}
?>