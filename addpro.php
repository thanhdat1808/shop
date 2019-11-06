<?php 
$con=mysqli_connect("Localhost","root","","shop");
$sql='insert into sanpham (ten,danhmuc,nhacungcap,gia,soluong, mota,anh) value("'.$_GET["namepro"].'","'.$_GET["danhmuc"].'","'.$_GET["provide"].'","'.$_GET["price"].'","'.$_GET["total"].'","'.$_GET["content"].'","'.$_GET["img"].'")';
echo "$sql";
mysqli_query($con,$sql);
header('Location:admin.php');
 ?>