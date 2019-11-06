<?php 
if (@$_GET["capnhat"]) {
	# code...
	$con=mysqli_connect("Localhost","root","","shop");
	$sql='update donhang set status="'.$_GET["status"].'" where id='.$_GET["id"];
	echo $sql;
	mysqli_query($con,$sql);
	header('Location:qldonhang.php');
}
 ?>