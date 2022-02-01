<?php  
//archivo php con conexión
include("connection.php");

//registro de usuario
if(isset($_POST["register"])) {
	$name = mysqli_real_escape_string($connection, $_POST['name']);
	$lastName = mysqli_real_escape_string($connection, $_POST['lastName']);
	$email = mysqli_real_escape_string($connection, $_POST['email']);
	$psw = mysqli_real_escape_string($connection, $_POST['password']);
	$psw_encriptada = md5($psw);//encriptación de contraseña

	//consulta para comprobar si ya existe el usuario
	$sqluser = "SELECT id_usuario FROM usuarios
				WHERE nombre = '$name'
				AND apellido = '$lastName'
				AND correo = '$email'";

	$resultado = $connection->query($sqluser);//resultado de la consulta
	$filas = $resultado->num_rows;//cantidad de filas en el resultado de la consulta

	//verificación de la existencia de usuario y registro (en el caso de no existir)
	if ($filas > 0) {
		echo "<script>
			alert('El usuario ingresado ya exite, pruebe con otro correo');
			</script>";
	}else {
		$sqlRegister = "INSERT INTO usuarios 
					(nombre, apellido, correo, contraseña) 
					VALUES ('$name', '$lastName', '$email', '$psw_encriptada')";

		$resultado = $connection->query($sqlRegister);

		if ($resultado > 0) {
			echo "<script>
			alert('Registro exitoso');
			window.location = index.php;
			</script>";
		}else {
			echo "<script>
			alert('Error al registrarse');
			window.location = registerUser.php;
			</script>";
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registro</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>

	<section>

		<article>
			
			<h1>Inicio de sesión</h1>

			<form method="post" action="registerUser.php">
				<input type="text" name="name" placeholder="nombre">
				<input type="text" name="lastName" placeholder="apellido">
				<input type="email" name="email" placeholder="correo">
				<input type="password" name="password" placeholder="contraseña">

				<input type="submit" name="register" value="Registrarse">
			</form>

		</article>

	</section>

</body>
</html>