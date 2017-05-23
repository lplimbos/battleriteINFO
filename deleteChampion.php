<?php 
	$idJuego=$_GET["id"];
	$idImagen=$_GET["idImagen"];
	require_once("conexion.php");

	$consulta = mysqli_query($conexion, "DELETE FROM champions WHERE championID='$idJuego'");
	$consulta = mysqli_query($conexion, "DELETE FROM images WHERE imageID='$idImagen'");

	echo "<h2><em>Deleted correctly</em></h2>";
	echo "<a href='championList.php'>Volver</a>";
?>