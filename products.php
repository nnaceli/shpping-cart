<?php 
//archivo php con conexión
include("connection.php");
session_start();
if (!isset($_SESSION['id_user'])) {
	header("Location: index.php");
}

//id del suario
$id_user = $_SESSION['id_user'];

//id del pedido
$pedido = $_SESSION['pedido'];


//añadir producto
if (isset($_POST['aniadir1'])) {
	
	//consultar producto a la base de datos
	$sqlprodct = "SELECT * FROM productos
				WHERE id_producto = 1";

	$resultado = $connection->query($sqlprodct);//resultado de la consulta
	$filas = $resultado->num_rows;//cantidad de filas en el resultado de la consulta

	if ($filas > 0) { //el producto etá en stock

		$row = $resultado->fetch_assoc();
		$id_producto = $row['id_producto'];

		//registrar producto en la tabla carrito

		$sqlRegisterProduct = "INSERT INTO carrito (pedido, id_usuario, id_producto) 
					VALUES ($pedido, $id_user, $id_producto)";

		$resultado = $connection->query($sqlRegisterProduct);

		if ($resultado > 0) {

			//se incrementa la cantidad de productos en carrito
			$_SESSION['quantityProducts']++;

			//se le informa al usaurio que el producto se añadió a su pedido
			echo "<script>
				alert('Producto añadido al carrito');
			</script>";
		}else {
			echo "<script>
			alert('Error al añadir el producto al carrito');
			</script>";
		}

	}else //ya no hay más stock del producto
	{
		echo "<script>
			alert('Ya no hay más stock de dicho producto :(');
			</script>";
	}

}

if (isset($_POST['aniadir2'])) {

	//consultar producto a la base de datos
	$sqlprodct = "SELECT * FROM productos
				WHERE id_producto = 2";

	$resultado = $connection->query($sqlprodct);//resultado de la consulta
	$filas = $resultado->num_rows;//cantidad de filas en el resultado de la consulta

	if ($filas > 0) { //el producto etá en stock

		$row = $resultado->fetch_assoc();
		$id_producto = $row['id_producto'];

		//registrar producto en la tabla carrito

		$sqlRegisterProduct = "INSERT INTO carrito (pedido, id_usuario, id_producto) 
					VALUES ($pedido, $id_user, $id_producto)";

		$resultado = $connection->query($sqlRegisterProduct);

		if ($resultado > 0) {

			//se incrementa la cantidad de productos en carrito
			$_SESSION['quantityProducts']++;

			//se le informa al usaurio que el producto se añadió a su pedido
			echo "<script>
				alert('Producto añadido al carrito');
			</script>";
		}else {
			echo "<script>
			alert('Error al añadir el producto al carrito');
			</script>";
		}

	}else //ya no hay más stock del producto
	{
		echo "<script>
			alert('Ya no hay más stock de dicho producto :(');
			</script>";
	}
}

if (isset($_POST['aniadir3'])) {

	//consultar producto a la base de datos
	$sqlprodct = "SELECT * FROM productos
				WHERE id_producto = 5";

	$resultado = $connection->query($sqlprodct);//resultado de la consulta
	$filas = $resultado->num_rows;//cantidad de filas en el resultado de la consulta

	if ($filas > 0) { //el producto etá en stock

		$row = $resultado->fetch_assoc();
		$id_producto = $row['id_producto'];

		//registrar producto en la tabla carrito

		$sqlRegisterProduct = "INSERT INTO carrito (pedido, id_usuario, id_producto) 
					VALUES ($pedido, $id_user, $id_producto)";

		$resultado = $connection->query($sqlRegisterProduct);

		if ($resultado > 0) {

			//se incrementa la cantidad de productos en carrito
			$_SESSION['quantityProducts']++;

			//se le informa al usaurio que el producto se añadió a su pedido
			echo "<script>
				alert('Producto añadido al carrito');
			</script>";
		}else {
			echo "<script>
			alert('Error al añadir el producto al carrito');
			</script>";
		}

	}else //ya no hay más stock del producto
	{
		echo "<script>
			alert('Ya no hay más stock de dicho producto :(');
			</script>";
	}
}

if (isset($_POST['aniadir4'])) {

	//consultar producto a la base de datos
	$sqlprodct = "SELECT * FROM productos
				WHERE id_producto = 3";

	$resultado = $connection->query($sqlprodct);//resultado de la consulta
	$filas = $resultado->num_rows;//cantidad de filas en el resultado de la consulta

	if ($filas > 0) { //el producto etá en stock

		$row = $resultado->fetch_assoc();
		$id_producto = $row['id_producto'];

		//registrar producto en la tabla carrito

		$sqlRegisterProduct = "INSERT INTO carrito (pedido, id_usuario, id_producto) 
					VALUES ($pedido, $id_user, $id_producto)";

		$resultado = $connection->query($sqlRegisterProduct);

		if ($resultado > 0) {

			//se incrementa la cantidad de productos en carrito
			$_SESSION['quantityProducts']++;

			//se le informa al usaurio que el producto se añadió a su pedido
			echo "<script>
				alert('Producto añadido al carrito');
			</script>";
		}else {
			echo "<script>
			alert('Error al añadir el producto al carrito');
			</script>";
		}

	}else //ya no hay más stock del producto
	{
		echo "<script>
			alert('Ya no hay más stock de dicho producto :(');
			</script>";
	}
}

if (isset($_POST['aniadir5'])) {

	//consultar producto a la base de datos
	$sqlprodct = "SELECT * FROM productos
				WHERE id_producto = 4";

	$resultado = $connection->query($sqlprodct);//resultado de la consulta
	$filas = $resultado->num_rows;//cantidad de filas en el resultado de la consulta

	if ($filas > 0) { //el producto etá en stock

		$row = $resultado->fetch_assoc();
		$id_producto = $row['id_producto'];

		//registrar producto en la tabla carrito

		$sqlRegisterProduct = "INSERT INTO carrito (pedido, id_usuario, id_producto) 
					VALUES ($pedido, $id_user, $id_producto)";

		$resultado = $connection->query($sqlRegisterProduct);

		if ($resultado > 0) {

			//se incrementa la cantidad de productos en carrito
			$_SESSION['quantityProducts']++;

			//se le informa al usaurio que el producto se añadió a su pedido
			echo "<script>
				alert('Producto añadido al carrito');
			</script>";
		}else {
			echo "<script>
			alert('Error al añadir el producto al carrito');
			</script>";
		}

	}else //ya no hay más stock del producto
	{
		echo "<script>
			alert('Ya no hay más stock de dicho producto :(');
			</script>";
	}
}

if (isset($_POST['aniadir6'])) {

	//consultar producto a la base de datos
	$sqlprodct = "SELECT * FROM productos
				WHERE id_producto = 6";

	$resultado = $connection->query($sqlprodct);//resultado de la consulta
	$filas = $resultado->num_rows;//cantidad de filas en el resultado de la consulta

	if ($filas > 0) { //el producto etá en stock

		$row = $resultado->fetch_assoc();
		$id_producto = $row['id_producto'];

		//registrar producto en la tabla carrito

		$sqlRegisterProduct = "INSERT INTO carrito (pedido, id_usuario, id_producto) 
					VALUES ($pedido, $id_user, $id_producto)";

		$resultado = $connection->query($sqlRegisterProduct);

		if ($resultado > 0) {

			//se incrementa la cantidad de productos en carrito
			$_SESSION['quantityProducts']++;

			//se le informa al usaurio que el producto se añadió a su pedido
			echo "<script>
				alert('Producto añadido al carrito');
			</script>";
		}else {
			echo "<script>
			alert('Error al añadir el producto al carrito');
			</script>";
		}

	}else //ya no hay más stock del producto
	{
		echo "<script>
			alert('Ya no hay más stock de dicho producto :(');
			</script>";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Lista de ofertas</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>

<style type="text/css">
	
.products-section{
	background-color: #9e7f54;

	width: 100%;
	height: 440px;

	display: flex;
	justify-content: space-around;
	flex-wrap: wrap;
	align-items: center;

}
</style>

<body>

	<header>
		<h1>
			Casa de música 
		</h1>
	</header>

	<nav>
		<div class="navegation">
			<a href="products.php">Productos</a>
		</div>

		<div class="navegation">
			<a href="shoppingCart.php">Carrito 
				(<?php echo $_SESSION['quantityProducts']; ?>)</a>
		</div>

		<div class="navegation">
			<a href="closeSesion.php">Cerrar sesión</a>
		</div>
	</nav>

	<section class="products-section">

		<article class="product">

			<h2>Guitarra criolla</h2>

			<div class="img">
				<img src="guitarra-criolla.jpg">
			</div>
				
			<p>Disbyte</p>
				
			<p>$5499</p>

			<form class="center-button" method="post">
				<input type="submit" name="aniadir1" value="Añiadir a carrito" class="button">
			</form>

		</article>

		<article class="product">

			<h2>Guitarra Electrica Gio Grx40</h2>

			<div class="img">
				<img src="guitarra-alectrica.jpg">
			</div>
				
			<p>Ibanez</p>
				
			<p>$32000</p>

			<form class="center-button" method="post">
				<input type="submit" name="aniadir2" value="Añiadir a carrito" class="button">
			</form>

		</article>

		<article class="product">

			<h2>Transportador Cejilla Capo</h2>

			<div class="img">
				<img src="capotraste.jpg">
			</div>
				
			<p>Simsol</p>
				
			<p>$860</p>

			<form class="center-button" method="post">
				<input type="submit" name="aniadir3" value="Añiadir a carrito" class="button">
			</form>

		</article>
	</section>

	<section class="products-section">

		<article class="product">

			<h2>Amplificador MG15CFX 220V</h2>

			<div class="img">
				<img src="amplificador-2.jpg">
			</div>
				
			<p>Marshall</p>
				
			<p>$26300</p>

			<form class="center-button" method="post">
				<input type="submit" name="aniadir4" value="Añiadir a carrito" class="button">
			</form>

		</article>

		<article class="product">

			<h2>Amplificador VT40X</h2>

			<div class="img">
				<img src="amplificador.jpg">
			</div>
				
			<p>VOX</p>
				
			<p>$35800</p>

			<form class="center-button" method="post">
				<input type="submit" name="aniadir5" value="Añiadir a carrito" class="button">
			</form>

		</article>

		<article class="product">

			<h2>Organo Teclado Ctk3400</h2>

			<div class="img">
				<img src="teclado.jpg">
			</div>
				
			<p>Casio</p>
				
			<p>$26300</p>

			<form class="center-button" method="post">
				<input type="submit" name="aniadir6" value="Añiadir a carrito" class="button">
			</form>

		</article>
	</section>

	<footer>
		Naceli Nicolás - 7mo Programación - EETN°7 José Hernandez
	</footer>

</body>
</html>
<?php 
/*
header
		<a href="lista-de-ofertas.html">Productos</a>
		<a href="carrito.html">Carrito</a>

		<form action="closeSesion.php">
			<input type="submit" name="close" value="Cerrar sesión">
		</form>

section

			<div>
				<h2>producto</h2>
				<p>(Imagen)</p>
				<p>marca</p>
				<p>precio</p>
				<form>
					<input type="submit" name="aniadir" value="Añiadir a carrito">
				</form>
			</div>

*/

 ?>