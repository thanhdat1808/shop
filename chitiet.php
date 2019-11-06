<?php 
session_start();
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
<div class="view">
	<div class="row chitiet" style="margin-right:  0px; margin-left: 0px">
	<?php 
	$con = mysqli_connect("localhost","root","","shop");
	$sql="select * from sanpham where id=".$_GET["id"];
	$kq=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($kq);
	 ?>
	 <div class="col-lg-4">
	 	<img src="img/<?php echo$row["anh"] ?>">
	 </div>
	 <div class="col-lg-8">
	 	<h1><?php echo $row["ten"]; ?></h1><hr>
	 	<h2><?php echo $row["gia"]; ?> VND</h2>
	 	<h4>Nhà cung cấp: <?php echo $row["nhacungcap"]; ?></h4>
	 	<h4>Số lượng trong kho: <?php echo$row["soluong"] ?></h4><hr>
	 	
	 	<div class="row buttonct">
		<div class="col-lg-5">
			<a href="addcart.php?id=<?php echo$row["id"] ?>&local=chitiet"><button style="color: green" onclick="alert('Đã thêm vào giỏ hàng')"><i class="fa fa-cart-plus"></i> Thêm vào giỏ hàng</button></a>
		</div>
		
		<div class="col-lg-5 buy">
			<a href="thanhtoan.php"><button style="background:#00FF00; color: white">Mua ngay</button></a>
		</div>
	</div>

	 </div>
	 <div class="row" style="margin-left: 0px;margin-right: 0px;">
	 	<h2>Mô tả sản phẩm:</h2>
	 	<?php echo$row["mota"] ?>
	 </div>
</div>
</div>
<?php include('form.php'); ?>
</body>
</html>
