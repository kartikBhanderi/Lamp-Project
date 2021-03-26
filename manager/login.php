<?php
session_start();
if (isset($_SESSION['Mang_id'])) {
	// echo "<h2> Manager LOGGED IN </h2>";
	session_destroy();
}
include('../includes/connection.php');
?>

<!DOCTYPE html>
<html>

<head>
	<title> Login </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

	<style>
		.c1 {
			background-color: rgba(0, 0, 0, 0.5) !important;
			backface-visibility: hidden;
			border-radius: 9px;
			color: white;
			margin-left: 40%;
			margin-top: 15%;
			width: 20%;
			height: 40%;
			padding: 10px;
			box-shadow: 0 8px 8px 0 rgba(255, 255, 255, 0.2);
			text-align: center;
		}

		body {
			background-image: url("https://i.ibb.co/Y0RXsnm/finalbg.jpg");
			height: 100%;
			background-repeat: no-repeat;
			background-size: cover;
			overflow: hidden;
			background-position: center;

		}

		input {
			border-radius: 5px;
			border-bottom-color: green;
		}

		.c3 {
			height: 1px;
			background-color: white;
		}
	</style>
</head>

<body>

	<div class="c1">
		<h2 style="text-align: left;">Log In </h2>
		<hr class="c3">
		<form method="POST">
			<hr>
			<label for="id"></label>
			<input type="text" id="id" name="id" placeholder="Manager Id" required>

			<hr>
			<label for="pwd"></label>
			<input type="password" id="pwd" name="pwd" placeholder="Password" required>

			<hr>
			<button type="submit" class="btn btn-success btn-lg" name="login">Login</button>
		</form>
	</div>
</body>

<?php
if (isset($_POST["login"])) {
	echo "Hello World";
	$id = $_POST["id"];
	$pwd = $_POST["pwd"];

	$query = "SELECT * FROM manager WHERE Mang_id=$id AND Password=$pwd";
	$result = mysqli_query($con, $query);

	if (mysqli_num_rows($result) > 0) {
		$result = mysqli_fetch_assoc($result);

		$_SESSION["Mang_id"] = $result["Mang_id"];
		$_SESSION["Mang_pwd"] = $result["Password"];

		echo "<script> location.href ='./maccess.php'</script>";
	} else {
		echo "<script>alert('Invalid Credentials!');</script>";
	}
}
?>

</html>