<?php 
$con = mysqli_connect("localhost","root","","shop");
$sql='insert into khachhang (name,phone,address,email,username, password) value("'.$_GET["name"].'","'.$_GET["phone"].'","'.$_GET["add"].'","'.$_GET["email"].'","'.$_GET["user"].'","'.$_GET["pass"].'")';
echo "$sql";
mysqli_query($con,$sql);
header('Location:index.php);
 ?>
