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

//consultar productos añadidos al carrito
$sqlCarrito = "SELECT * 
		FROM productos INNER JOIN carrito on 
		productos.id_producto = carrito.id_producto WHERE pedido = $pedido
		AND id_usuario = $id_user";

$select = $connection->query($sqlCarrito);
$registro = $select->fetch_assoc();

//Compra
if (isset($_POST['comprar'])) {

	if (!isset($registro)) {
		echo "	<script>
					alert('El carrito todavía no tiene ningún producto seleccionado para ejecutar la compra');
				</script>";
	}else{

		$empresaTarjeta = $_POST['tarjeta'];
		$numeroTrajeta = $_POST['numero-tarjeta'];
		$claveTrajeta = $_POST['clave'];
		$cuotas = $_POST['cuotas'];
		$correo = $_POST['email'];

		
		$sql = "INSERT INTO compras
				(id_usuario, tarjeta_empresa, tarjeta_numero, tarjeta_clave, cuotas, correo)
			VALUES ($id_user,'$empresaTarjeta', $numeroTrajeta, $claveTrajeta, $cuotas, '$correo')";

		$insert = $connection->query($sql);//resultado de la consulta

		if ($insert == 1) {

			$_SESSION['quantityProducts'] = 0;
			$_SESSION['pedido'] = rand(1,10000);

			echo "
			<script>
				alert('Su compra ha sido efectuada con éxito, pued efectuar otra compra o cerrar sesión');
				window.location = 'products.php';
			</script>";

		}else {
			echo "
			<script>
				alert('Error en el ingreso de datos o datos incompletos');
			</script>";
		}
	} 
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Carrito</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>

<style type="text/css">

.cart-section{
	background-color: #9e7f54;

	width: 100%;
	height: 300px;

	display: flex;
	justify-content: center;
	flex-wrap: wrap;
	align-items: center;
}

table{
	width: 90%;
	border: solid 1px;
	color: white;
}

tr{
	border: solid 1px;
}

td{
	border: solid 1px;
}

</style>

<body>

	<header>
		<h1 style="color: white">
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

	<section class="cart-section">
		
		<article id="productsInCart">
			<h2>Lista de productos en carrito</h2>	
		

			<?php 

			if (!isset($registro)) {
				?>
					<h3>No hay productos en el carrito</h3>
				<?php  	
			}else{

				?> 
				<table>
					<tr>
						<td>
							NOMBRE
						</td>

						<td>
							MARCA
						</td>

						<td>
							PRECIO
						</td>
					</tr>

					<tr>
						<td>
							<?php echo $registro['nombre']; ?>
						</td>

						<td>
							<?php echo $registro['marca']; ?>
						</td>

						<td>
							<?php echo $registro['precio']; ?>
						</td>
					</tr>

					<?php 	while($registro=mysqli_fetch_assoc($select)){ ?>

								<tr>
									<td>
										<?php echo $registro['nombre']; ?>
									</td>

									<td>
										<?php echo $registro['marca']; ?>
									</td>

									<td>
										<?php echo $registro['precio']; ?>
									</td>
								</tr>
					<?php   } ?>
	<?php  	}	?>

				</table>
		</article>

	</section>

	<section class="cart-section">
		
		<article id="payment">
			
			<form action="shoppingCart.php" method="post">

				<div class="form-payment">
					<label>Tarjeta</label>
					<select name="tarjeta">
						<option value="mastercard">	Mastercard  </option>
						<option value="visa">		Visa		</option>
						<option value="naranja">	Naranja     </option>
					</select>

					<label>Cantidad de cuotas</label>
					<select name="cuotas">
						<option value="1">1</option>
						<option value="3">3</option>
						<option value="6">6</option>
						<option value="12">12</option>
					</select>
				</div>

				<div class="form-payment">	
					<label>Número de tarjeta</label>
					<input type="text" name="numero-tarjeta" placeholder="Numero de tarjeta">
				</div>

				<div class="form-payment">
					<label>Clave de tarjeta</label>
					<input type="password" name="clave" placeholder="Clave">
				</div>

				<div class="form-payment">
					<label>Correo electrónico </label>
					<input type="email" name="email" placeholder="Correo">
				</div>

				<div class="form-payment">
					<input type="submit" name="comprar" value="Comprar" class="button">
				</div>

			</form>

		</article>

	</section>

	<footer>
		Naceli Nicolás - 7mo Programación - EETN°7 José Hernandez
	</footer>

</body>
</html>