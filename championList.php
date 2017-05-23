<?php 
	include 'meta.php';
	include 'header.php';
	$flag = 1;
?>
	<script type="text/javascript">
		function confirmacion() {
			if (confirm("Desea eliminar el juego?")) {
				return true;
			}; return false;
		}
	</script>

<?php
if(isset($_POST["enviar"])) {
		require_once("conexion.php");
		$query = $_POST["busqueda"];
		$consulta=mysqli_query($conexion, "SELECT * FROM champions INNER JOIN images ON champions.championID = images.championID WHERE champions.championName LIKE '%" . $query . "%'");
		$flag = 0;
}
?>

	<div class="spacer list" style="width: 75%; height: 80px; margin: 0 auto;">
	</div>
	<h1>Champion list</h1>
	<div id="listSearch">
		<form action="#" method="post" enctype="multipart/form-data">
			<input type="text" name="busqueda">
			<input type="submit" class="button" name="enviar" value="Buscar" />
		</form>
	</div>
	<div id="tableContainer">
		<div id="tableHeaderRow">
			<div class="tableHeaderItem"><p>Name</p></div>
			<div class="tableHeaderItem"><p>Image</p></div>
			<div class="tableHeaderItem"><p>Modify</p></div>
			<div class="tableHeaderItem"><p>Delete</p></div>
		</div>
		<div id="tableBodyContainer">
			<?php 
				include_once("conexion.php");
				if ($flag === 1) {
					$consulta=mysqli_query($conexion, "SELECT * FROM champions INNER JOIN images ON champions.championID = images.championID");	
				}
				while ($fila = mysqli_fetch_array($consulta)) {
					printf("
						<div class='tableBodyRow'>
							<div class='tableBodyItem'><p>%s</p></div>
							<div class='tableBodyItem'><img src='images/champions/%s' class='tableChampionIcon'/></div>
							<div class='tableBodyItem'><a href='modifyChampion.php?id=%s'><img src='images/modify.png' class='modifyIcon'/></a></div>
							<div class='tableBodyItem'><a href='deleteChampion.php?id=%s&amp;idImagen=%s' onclick='return confirmacion()'><img src='images/delete.png' class='deleteIcon'/></a></div>
						</div>
						", $fila["championName"], $fila["championIcon"], $fila["championID"], $fila["championID"], $fila["imageID"]);
				}
			 ?>
		</div>
	</div>
<?php  
	include 'footer.php';
?>