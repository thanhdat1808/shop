<?php 
$con=mysqli_connect("Localhost","root","","shop");
$sql='update sanpham set ten="'.$_GET["namepro"].'",danhmuc="'.$_GET["danhmuc"].'",nhacungcap="'.$_GET["provide"].'",gia="'.$_GET["price"].'",soluong="'.$_GET["total"].'",mota="'.$_GET["content"].'",anh="'.$_GET["img"].'" where id = '.$_GET["id"];
echo "$sql";
mysqli_query($con,$sql);
header('Location:admin.php');
 ?>