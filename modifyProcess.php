<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Champion modified</title>
</head>
<body>
	<?php 
		$idJuego=$_POST["idJuego"];
		$videojuego=$_POST["nombre"];
		$descripcion=$_POST["descripcion"];

		require_once("conexion.php");
		mysqli_query($conexion, "UPDATE champions SET championName='$videojuego', description='$descripcion' WHERE championID='$idJuego'");

		echo "<h2>Modified correctly</h2>";
		echo "<a href='championList.php'>Volver</a>";
	?>
</body>
</html>