<?php 
	$servidor="localhost";
	$usuario="root";
	$password="";
	$base="catalogo";

	$conexion=mysqli_connect("$servidor", "$usuario", "$password") or die(mysql_error());
	mysqli_query($conexion, "SET NAMES 'utf8'");

	$base=mysqli_select_db($conexion, $base) or die(mysqli_error());
 ?>