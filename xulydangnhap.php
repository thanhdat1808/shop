<?php 
session_start();
echo $_POST['user'].$_POST['pass'];
if ($_POST['user']=='admin'&&$_POST['pass']=='123') {
	# code...
	$_SESSION["role"]="admin";
	header('Location:admin.php');
}
else{
	$con = mysqli_connect("localhost","root","","shop");
	$sql = 'select * from khachhang where username = "'.$_POST["user"].'" and password = "'.$_POST["pass"].'"';
	$kq = mysqli_query($con, $sql);
	if (@$_POST["login"]) {
		# code...
if ($kq->num_rows>0) {
	# code...
	while ($row = mysqli_fetch_array($kq)) {
	# code...
	$_SESSION["id"] = $row["id"];
		# code...
		header('Location:index.php');
}
}
}
if (@$_POST["thanhtoan"]) {
		# code...

if ($kq->num_rows>0) {
	# code...
	while ($row = mysqli_fetch_array($kq)) {
	# code...
	$_SESSION["id"] = $row["id"];
		# code...
		header('Location:donhang.php');
}
}
}
}
 ?>