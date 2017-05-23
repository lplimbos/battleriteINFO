<?php 
include 'meta.php';
?>
<body>
<?php
include 'header.php';
?>
<div class="wrapper">
	<div class="spacer catalog" style="width: 75%; height: 10px; margin: 0 auto;">
	</div><!-- Titulo del sitio -->
	<div class="content">
				<?php
				require_once("conexion.php");

				$consulta=mysqli_query($conexion, "SELECT * FROM champions INNER JOIN images ON champions.championID = images.championID");
				$x = 0;
				while ($fila = mysqli_fetch_array($consulta)){
					/*
					if($x === 0){
						echo "
						<div class='content_row'>
						";
					}
					*/
					printf("
						<article class='videojuego'>
							<figure class='imagen_videojuego' id='%s'>
							<img src='images/champions/%s' alt='%s'>
							</figure>
							<header class='titulo_videojuego'>
							<h3>%s</h3>
							</header>
						</article>
					", $fila["championName"], $fila["championIcon"], $fila["championName"], $fila["championName"]);
					/*
					$x++;
					if ($x === 7) {
						echo "
						</div>
						";
						$x = 0;
					}*/
				}
				/*if ($x !== 0) {
					echo "
					</div>
					";
					$x = 0;
				}*/
				?>
	</div>
	<?php
	require_once("conexion.php");

	$consulta=mysqli_query($conexion, "SELECT * FROM champions INNER JOIN images ON champions.championID = images.championID");
	while ($fila = mysqli_fetch_array($consulta)){
		printf("
			<div class='championInformation hidden visuallyHidden' id='%sInfo'>
				<div class='championImage'>
					<img src='images/champions/%s'>
				</div>
				<div class='championName'>
					<h2>%s</h2>
				</div>
				<div class='championDescription'>
					<p>%s</p>
				</div>
			</div>
			", $fila["championName"], $fila["championHiRes"], $fila["championName"], $fila["description"]);
	}
	?>
</div>
<?php
include 'footer.php';
?>