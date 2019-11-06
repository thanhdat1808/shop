<?php 
session_start();
if (@$_SESSION["role"]=="admin") {
	# code...
	$con=mysqli_connect("Localhost","root","","shop");
	$sql="select * from sanpham";
	$kq = mysqli_query($con,$sql);
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
		<div class="row add">
			<a href="themsp.php"><button title="Thêm sản phẩm mới!"><i class="fa fa-plus"></i></button></a>
		</div>
		<hr>
		<div class="row list">
			<table style="width: 100%;">
				<tr class="title">
					<td>STT</td>
					<td>Id</td>
					<td>Tên</td>
					<td>Danh mục</td>
					<td>Nhà cung cấp</td>
					<td>Giá</td>
					<td>Số lượng</td>
					<td>Mô tả</td>
					<td>Ảnh</td>
				</tr>
				<?php 
				$n=1;
				while ($row=mysqli_fetch_array($kq)) {
					# code...
					echo "<tr>";
					echo "<td>$n</td>";
					echo '<td>'.$row['id'].' </td>';
					echo '<td>'.$row['ten'].' </td>';
					echo '<td>'.$row['danhmuc'].' </td>';
					echo '<td>'.$row['nhacungcap'].' </td>';
					echo '<td>'.$row['gia'].' </td>';
					echo '<td>'.$row['soluong'].' </td>';
					echo '<td><textarea>'.$row['mota'].'</textarea> </td>';
					echo '<td><img src= img/'.$row['anh'].'></td>';
					?>
					<td>
						<a href="edit.php?id=<?php echo $row['id'] ?>&ten=<?php echo $row['ten'] ?>&danhmuc=<?php echo $row['danhmuc'] ?>&nhacungcap=<?php echo $row['nhacungcap'] ?>&gia=<?php echo $row['gia'] ?>&soluong=<?php echo $row['soluong'] ?>&mota=<?php echo $row['mota'] ?>&anh=<?php echo $row['anh'] ?>"><button class="fa fa-edit" title="Chỉnh sửa"></button></a>
						<a href="delete.php?id=<?php echo $row['id'] ?>"><button class="fa fa-remove" title="Xóa"></button></a>
					</td>
					<?php
					echo "</tr>";
					$n++;
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