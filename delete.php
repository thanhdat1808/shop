<?php 
$con=mysqli_connect("Localhost","root","","shop");
$sql='delete from sanpham where id = '.$_GET["id"];
echo "$sql";
mysqli_query($con,$sql);
header('Location:admin.php');
 ?>