<?php 
session_start();
$con = mysqli_connect("localhost","root","","shop");
$s="select* from khachhang where id=".$_SESSION["id"];
$k=mysqli_query($con,$s);
$r=mysqli_fetch_array($k);
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Ghost.Store</title>
	<link rel="shortcut icon" href="image.png" type="image/png"/>
	<link rel="stylesheet" type="text/css" href="styleshop.css">
	<meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php include('menu.php'); ?>
<div class="view" style="margin-left: 0px; margin-right: 0px;">
	<div class="col-lg-7 info">
		<table>
			<tr>
				<td><h3>Tên người nhận: </h3></td>
				<td></td>
				<td><h3><?php echo $r["name"]; ?></h3></td>
			</tr>
			<tr>
				<td><h3>Địa chỉ: </h3></td>
				<td></td>
				<td><h3><?php echo $r["address"]; ?></h3></td>
			</tr>
			<tr>
				<td><h3>Số điện thoại: </h3></td>
				<td></td>
				<td><h3><?php echo $r["phone"]; ?></h3></td>
			</tr>
			<tr>
				<td><h3>Phương thức thanh toán:</h3></td>
				<td></td>
				<td>
					<form method="POST" action="thanhtoan.php">
						<select name="typepay">
						<option>Thanh toán khi nhận hàng</option>
						<option>AriPay</option>
						<option>Thẻ tín dụng</option>
					</select>
					
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="" value="Xác nhận"></td>
				<td></td>
				</form>
			</tr>
		</table>
	</div>
<div class="col-lg-5 giohang">
	<?php 
if (@count($_SESSION["cart"])>0) {
	 ?>
	<table class="pagecart">	
<?php
$t=0;
 foreach ($_SESSION["cart"] as $id => $total){
 	?>
 	<form method="GET" action="editcart.php">	
 	<?php
		$sql="select * from sanpham where id = $id";
		// echo "$sql";
		// echo "Số lượng là: $total";
		$kq = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($kq);
		echo"<tr>";
		echo '<input type="hidden" name="id" value="'.$id.'">';
		echo '<td><img src= img/'.$row['anh'].' style="width:80px;"></td>';
		echo '<td>'.$row['ten'].' </td>';
		echo '<td>'.$row['gia'].'x </td>';
		echo '<td>'.$total.'=</td>';
		echo '<td>'.$row["gia"]*$total.' VND</td>';
		?>
		<?php
		echo "</tr>";
		$d=$row["gia"]*$total;
		$t=$t+$d;
	} 
	?>
	<tr>
		<h3>Tổng tiền:</h3>

	<h3><b><?php echo $t; ?> VND</b></h3>
		
	</tr>
	</table>
	<?php 
	}
	else{ echo "<h1>Không có sản phẩm nào trong giỏ hàng</h1>";
	?>

	<a href="index.php"><button>Quay lại trang chủ!</button></a>
	<?php
	}
	 ?>
</div>
</div>
</body>
</html>