<?php 
include 'meta.php';
 ?>
<body>
<?php 
include 'header.php';
 ?>
 <div class="spacer new" style="width: 75%; height: 70px; margin: 0 auto;">
	</div><!-- Titulo del sitio -->
	<h3>Register a new champion</h3>
	
	<div id="newChampContainer">
		<form action="registro.php" method="post" enctype="multipart/form-data">
			<table>
				
				<div class="tableRow"><!-- tr = table row = fila de la tabla -->
						<div class="label"><label>Champion name:</label></div>
						<!-- td = table data =datos de la tabla -->
						<input type="text" name="nombre" class="text" />
				</div>
				
				<div class="tableRow">
						<div class="label"><label>Champion icon:</label></div>
						<input type="file" name="image" class="image upload" />
				</div>

				<div class="tableRow">
						<div class="label"><label>Champion full image:</label></div>
						<input type="file" name="bodyImage" class="image bodyImage" />
				</div>
				
				<div class="tableRow">
						<div class="label"><label>Description:</label></div>
						<textarea name="descripcion"></textarea>
				</div>
				
				<div class="tableRow">
						&nbsp;
						<div class="submitButton">
						<input type="submit" class="button" name="enviar" value="REGISTRAR" />
						</div>
				</div>

			</table>
		</form>
	</div>
</body>
<?php 
include 'footer.php';
 ?>