<?php 
session_start();
$con = mysqli_connect("localhost","root","","shop");
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
<div class=" giohang">
	<?php 
if (@count($_SESSION["cart"])>0) {
	 ?>
	<table class="pagecart">
		<tr>
			<td></td>
			<td><b>Tên sản phẩm</b></td>
			<td><b>Nhà cung cấp</b></td>
			<td><b>Giá</b></td>
			<td><b>Số lượng</b></td>
			<td><b>Tổng tiền</b></td>
			<td></td>
		</tr>
		
<?php
$t=0;

	# code...

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
		echo '<td><img src= img/'.$row['anh'].'></td>';
		echo '<td>'.$row['ten'].' </td>';
		echo '<td>'.$row['nhacungcap'].' </td>';
		echo '<td>'.$row['gia'].' </td>';
		echo '<td><input type="number" name="total" value="'.$total.'" min="0" max="'.$row["soluong"].'" required> </td>';
		echo '<td>'.$row["gia"]*$total.' VND</td>';
		?>
		<td>
			<button class="fa fa-upload" type="submit" title="Lưu"></button>
		</td>
		</form>
		<td><a href="deletecart.php?id=<?php echo$id ?>&total=<?php echo$total ?>"><button class="fa fa-remove" title="Xóa"></button></a></td>
		<?php
		echo "</tr>";
		$d=$row["gia"]*$total;
		$t=$t+$d;
		$_SESSION["tongtien"]=$t;
	} 
	?>
	<tr>
		<td><h2>Tổng số tiền là:</h2></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td><b><?php echo $t; ?> VND</b></td>
		
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
<?php if (@count($_SESSION["cart"])>0) { ?>
<div class="button">
	<?php 
	if (@$_SESSION["id"]) {
		# code...
	 ?>
	<a href="donhang.php"><button class="fa fa-cart-plus"> Mua hàng</button></a>
	<?php 
	}
	else{
	 ?>
	<button class="fa fa-cart-plus" data-toggle="modal" data-target="#myModalcart"> Mua hàng</button>
<?php }
	}
 ?>
</div>
<?php include('form.php'); ?>
</body>
</html>