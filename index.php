<?php
//archivo php con conexión
include("connection.php");
session_start();
if (isset($_SESSION['id_user'])) {
	header("Location: products.php");
}

//Login
if(!empty($_POST)) {
	$email = mysqli_real_escape_string($connection, $_POST['email']);
	$psw = mysqli_real_escape_string($connection, $_POST['password']);
	$psw_encriptada = md5($psw);//encriptación de contraseña

	//consulta para comprobar si existe usaurio y contraseña
	$sql = "SELECT * FROM usuarios
	WHERE correo = '$email' AND
	contraseña = '$psw_encriptada'";

	$resultado = $connection->query($sql);
	$rows = $resultado->num_rows;

	if ($rows > 0) {
		$row = $resultado->fetch_assoc();
		$_SESSION['id_user'] = $row['id_usuario'];
		$_SESSION['quantityProducts'] = 0;
		$_SESSION['pedido'] = rand(1,10000);
		$_SESSION['totalPagar'] = 0;
		$_SESSION['contador'] = 0;
		header("location: products.php");
	}else{
		echo "
			<script>
				alert('Usuario o contraseña incorrecta');
				window.location = 'index.php';
			</script>";
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Inicio de sesión</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>

	<section>

		<article>
			
			<h1>Inicio de sesión</h1>
			
			<form method="post" action="index.php">
				<input type="email" name="email" placeholder="correo">
				<input type="password" name="password" placeholder="contraseña">

				<input type="submit" name="ingresar" value="Ingresar">
			</form>
			

			<form action="registerUser.php">
				<input type="submit" name="register" value="Registrarse">
			</form>

		</article>

	</section>

</body>

</html>