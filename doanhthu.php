<?php 
session_start();
if (@$_SESSION["role"]=="admin") {
	# code...
	$con=mysqli_connect("Localhost","root","","shop");
	$sql="select * from donhang where status ='Đã giao hàng'";
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
 			<table>
 				<tr>
 					<td>STT</td>
 					<td>ID</td>
 					<td>Ngày</td>
 					<td>Doanh thu</td>
 				</tr>
 				
 					<?php 
				$n=1;
				while ($row=mysqli_fetch_array($kq)) {
					# code...
					$s="SELECT COUNT(*) FROM donhang WHERE idcus = ".$row["id"]." GROUP BY idcus";
					// echo $s;
					$k = mysqli_query($con,$s);
					$t = mysqli_fetch_array($k);
					echo "<tr>";
					echo "<td>$n</td>";
					echo '<td>'.$row['id'].' </td>';
					echo '<td>'.$row['name'].' </td>';
					echo '<td>'.$row['phone'].' </td>';
					echo '<td>'.$row['address'].' </td>';
					echo '<td>'.$row['email'].' </td>';
					echo '<td>'.$row['username'].' </td>';
					echo '<td>'.$row['password'].'</td>';
					echo '<td>'.$t["COUNT(*)"].'</td>';
					echo "</tr>";
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