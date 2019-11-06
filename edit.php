<?php 
session_start();
if (@$_SESSION["role"]=="admin") {
	# code...
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
<div class="row admin"style="margin-right: 0px;margin-left: 0px;">
	
		<?php include('menuleft.php'); ?>

	<?php 
	if (@$_GET["logout"]) {
	# code...
	session_unset();
	header('Location:index.php');
	}
 	?>
	<div class="col-lg-8 content">
		<div class="row addpro">
			<form method="GET" action="update.php">
				<table>
				<tr>
					<input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">
					<td><b>Tên sản phẩm</b></td>
					<td><input type="text" name="namepro" required="" value="<?php echo$_GET["ten"] ?>"></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<select name="danhmuc">
						<option>Điện thoại</option>
						<option>Laptop</option>
						<option>Máy tính bản</option>
					</select>
					</td>
				</tr>
				<tr>
					<td><b>Nhà cung cấp</b></td>
					<td><input type="text" name="provide" required="" value="<?php echo$_GET["nhacungcap"] ?> "></td>
				</tr>
				<tr>
					<td><b>Giá</b></td>
					<td><input type="text" name="price" required="" value="<?php echo$_GET["gia"] ?> "></td>
				</tr>
				<tr>
					<td><b>Số lượng</b></td>
					<td><input type="text" name="total" required="" value="<?php echo$_GET["soluong"] ?> "></td>
				</tr>
				<tr>
					<td><b>Mô tả</b></td>
					<td><textarea class="mota" name="content" id="editor"><?php echo $_GET["mota"] ?></textarea></td>
				</tr>
				<tr>
					<td><b>Ảnh</b></td>
					<td><input type="file" name="img" style="padding-top: 5px;" required="" value="<?php echo $_GET["anh"] ?>"  multiple></td>
				</tr>
			</table>
			<div class="update">
			<input type="submit" name="save" value="Cập nhật">
			<input type="reset" name="" value="Làm mới">
			</div>
			</form>
		</div>
	</div>
</div>


</body>
</html>

<?php 
}
else header('Location:index.php');
 ?>
 <script type="text/javascript">
	 ClassicEditor
        .create( document.querySelector( '#editor' ) )
</script>