<?php 
session_start();
$id=$_GET["id"];
echo "$id";
unset($_SESSION["cart"][$id]);
header('Location:cart.php')
 ?>