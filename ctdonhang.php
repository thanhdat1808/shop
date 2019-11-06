<?php 
session_start();
if (@$_SESSION["role"]=="admin") {
	# code...
	$con=mysqli_connect("Localhost","root","","shop");
	$sql="select * from khachhang where id=(select idcus from donhang where id=".$_GET["id"].")";
	$kq = mysqli_query($con,$sql);
	$kh=mysqli_fetch_array($kq);
	$s="select * from cart where id=(select idcart from donhang where id=".$_GET["id"].")";
	$c=mysqli_query($con,$s);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
	<link rel="stylesheet" type="text/css" href="styleshop.css">
	<meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="row admin" style="margin-right: 0px;margin-left: 0px;">
	
		<?php include('menuleft.php'); ?>
	
	<?php 
	if (@$_GET["logout"]) {
	# code...
	session_unset();
	header('Location:index.php');
	}
 	?>
 	<div class="col-lg-9 content">
 		 	<div class="row customer">
 		 		<table>
 		 			<tr>
 		 				<td><h3>Tên khách hàng:</h3></td>
 		 				<td><h3><?php echo $kh["name"]; ?></h3></td>
 		 			</tr>
 		 			<tr>
 		 				<td><h3>Địa chỉ:</h3></td>
 		 				<td><h3><?php echo $kh["address"]; ?></h3></td>
 		 			</tr>
 		 			<tr>
 		 				<td><h3>Số điện thoại:</h3></td>
 		 				<td><h3><?php echo $kh["phone"]; ?></h3></td>
 		 			</tr>
 		 		</table>
 		 		<table>
 		 			<tr>
 		 				
 		 				<td>Tên sản phẩm</td>
 		 				<td>Giá</td>
 		 				<td>Số lượng</td>
 		 				<td>Tổng tiền</td>
 		 			</tr>
 		 			<?php 
 		 			while ($pro=mysqli_fetch_array($c)) {
 		 				# code...
 		 				echo"<tr>";
						echo '<td>'.$pro['tensp'].' </td>';
						echo '<td>'.$pro['gia'].' </td>';
						echo '<td>'.$pro['soluong'].' </td>';
						echo '<td>'.$pro["gia"]*$pro["soluong"].' VND</td>';
 		 			}
 		 			 ?>
 		 		</table>
 		</div>
 	</div>
</div>
</body>
</html>

<?php 
}
else header('Location:index.php');
 ?>