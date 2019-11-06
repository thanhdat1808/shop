<?php 
session_start();
$con=mysqli_connect("Localhost","root","","shop");
$sql="select Max(idcart) as idcart from donhang";
$kq=mysqli_query($con,$sql);
$madh=mysqli_fetch_array($kq);
// echo $madh["idcart"];
$ma=$madh["idcart"]+1;
$tongtien=0;
foreach ($_SESSION["cart"] as $id => $total){
	$select="select * from sanpham where id=".$id;
	$result = mysqli_query($con,$select);
	$row = mysqli_fetch_array($result);
	$insert='insert into cart (id,idsp,tensp,soluong,gia) value("'.$ma.'","'.$row['id'].'","'.$row['ten'].'","'.$total.'","'.$row['gia'].'")';
	$tongtien=$total*$row["gia"];
	echo$insert;
	mysqli_query($con,$insert);
}
$sql='insert into donhang(idcus,idcart,date,tongtien,typepay) value("'.$_SESSION["id"].'","'.$ma.'","'.date("Y-m-d").'","'.$tongtien.'","'.$_POST["typepay"].'")';
echo$sql;
mysqli_query($con,$sql);
unset($_SESSION["cart"]);
header('Location:index.php');
 ?>