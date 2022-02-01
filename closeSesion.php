<?php
include("connection.php");

session_start();
session_destroy();
header("Location: index.php");
echo "
	<script>
		alert('Sesión cerrada');
	</script>";
?>