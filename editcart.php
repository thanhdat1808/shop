<?php 
session_start();
$id=$_GET["id"];
$total=$_GET["total"];
echo "$id";
if ($total>0) {
	# code...
$_SESSION["cart"][$id]=$total;
}
else unset($_SESSION["cart"][$id]);
header('Location:cart.php')
 ?>