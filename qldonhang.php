<?php 
session_start();
if (@$_SESSION["role"]=="admin") {
	# code...
	$con=mysqli_connect("Localhost","root","","shop");
	$sql="";
	if (@$_GET["date"]) {
		# code...
		$sql='select * from donhang where date="'.$_GET["date"].'"';
	}
	else $sql="select * from donhang";
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
 		 	<div class="row customer">
 		 		<div class="">
 		 			Ngày: 
 		 			<select>
 		 				<?php 
 		 				for ($i=1; $i <=31; $i++) { 
 		 					# code...
 		 				echo '<option>'.$i.'</option>';
 		 				}
 		 				 ?>
 		 			</select>
 		 		</div>
 			<table>
 				<tr>
 					<td>STT</td>
 					<td>ID</td>
 					<td>ID khách hàng</td>
 					<td>Ngày đặt hàng</td>
 					<td>Hình thức thanh toán</td>
 					<td>Tổng tiền</td>
 					<td>Trạng thái</td>
 				</tr>
 					
 					<?php 
				$n=1;
				while ($row=mysqli_fetch_array($kq)) {
					# code...
					echo "<tr>";
					echo "<td>$n</td>";
					echo '<td>'.$row['id'].'</td>';
					echo '<td>'.$row['idcus'].' </td>';
					echo '<td><a href="qldonhang.php?date='.$row['date'].'">'.$row['date'].'</a> </td>';
					echo '<td>'.$row['typepay'].' </td>';
					echo '<td>'.$row['tongtien'].' </td>';
					?>
					<td>
						<form method="GET" action="capnhat.php">
						<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
						<select style="border: none;" name="status">
							<option <?php if ($row["status"]=='Đang xử lý') {
             				 # code...
             				echo "selected=selected";
            				} ?>>Đang xử lý</option>
            				<option <?php if ($row["status"]=='Đã xác nhận') {
              				# code...
             				echo "selected=selected";
            				} ?>>Đã xác nhận</option>
            				<option <?php if ($row["status"]=='Đang vận chuyển') {
              				# code...
             				echo "selected=selected";
            				} ?>>Đang vận chuyển</option>
            				<option <?php if ($row["status"]=='Đã giao hàng') {
              				# code...
             				echo "selected=selected";
            				} ?>>Đã giao hàng</option>
						</select>
						
					</td>
					<td><input type="submit" name="capnhat" value="Cập nhật"></td>
					</form>
					<?php
					echo '<td><a href="ctdonhang.php?id='.$row['id'].'">Chi tiết</a></td>	';
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