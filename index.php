
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<?php
$host       = "localhost";
$user       = "root";
$password   = "";
$database   = "dbsevimates";
$connect    = mysqli_connect($host, $user, $password, $database);

$id = $_GET['id'];
if($id){
	$sql = "SELECT * FROM user WHERE user_id = '".$id."' ";
	$qr = mysqli_query($connect,$sql);

	$data = mysqli_fetch_array($qr);

}
?>

<form action="index.php" method="post">

	<input type="hidden" name="user_id" value="<?php echo $data['user_id']?>">
	<table class="table">
		<tr>
			<td>Nama</td>
			<td><input type="text" name="nama" value="<?php echo $data['nama']?>"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="text" name="email" value="<?php echo $data['email']?>"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Simpan"></td>
		</tr>
	</table>
</form>

<?php

// if($_GET['act'] == 'del'){
// 	$qr = "DELETE FROM user user_id = ".$.;
// 		$sql = mysqli_query($connect, $qr);
// }

if($_POST){
	$user_id = $_POST['user_id'];

	if($user_id == ''){
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$qr = "INSERT INTO user (nama, email) VALUES ('".$nama."','".$email."')";
		$sql = mysqli_query($connect, $qr);
	}
	else{
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		var_dump($_POST);
		$qr = "UPDATE user SET nama = '".$nama."', email = '".$email."' WHERE user_id = '".$user_id."'";

		echo $qr;
		$sql = mysqli_query($connect, $qr);
	}
}
$sql = "SELECT * FROM user";
$qr = mysqli_query($connect,$sql);
?>

<table class="table table-condensed">
	<thead>
		<tr>
			<th>User ID</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?
		while($rs = mysqli_fetch_array($qr)){ 
		?>
			<tr>
				<td><?php echo $rs['user_id']; ?></td>
				<td><?php echo $rs['nama']; ?></td>
				<td><?php echo $rs['email']; ?></td>
				<td>
				<?php 
					echo '<a href="index.php?act=edit&id='.$rs['user_id'].'"> Edit </a> | <a href="index.php?act=del&id='.$rs['user_id'].'">Delete</a>';
				?>
				</td>
			</tr>
		<?php
		}
		?>
	</tbody>
	
</table>
