<?php require "functions.php" ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>

	<link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./assets/css/signin.css">

	<script type="text/javascript" src="./assets/js/jquery-3.4.1.slim.min.js"></script>
	<script type="text/javascript" src="./assets/js/popper.min.js"></script>
	<script type="text/javascript" src="./assets/js/bootstrap.min.js"></script>
</head>
<body class="text-center" background='perpus.png'>
	<form class="form-signin" method="POST">
		<h1 class="h3 mb-3 font-weight-normal" style="color:white">Silahkan Login</h1>
		<input class="form-control" type="email" name="username" placeholder="email" autocomplete="off" required>																						
		<input class="form-control" type="password" name="password" placeholder="password" required>
		<button class="btn btn-block btn-primary" type="submit">Login</button>
		<?php
			if(isset($_SESSION['username'])){
				$url = BASE_URL . 'index.php';
				header("Location:$url");
			}
			if(isset($_POST['username']) && isset($_POST['password'])) {
				require 'koneksi.php';
				
				$conn = open_connection();
				
				$query = "SELECT *FROM admin WHERE username = '$_POST[username]' AND password_hash = MD5('$_POST[password]')";
				
				$hasil = mysqli_query($conn, $query);
				
				if($isi = mysqli_fetch_assoc($hasil)){
					$_SESSION['username'] = $isi['username'];
					$url = BASE_URL . 'index.php';
					header("Location:$url");
				} else {
					echo '<div class = "alert alert-danger" role="alert"style ="color:white">Username dan Password tidak valid</div>';
				}
			}
		?>
	</form>
</body>
</html>	