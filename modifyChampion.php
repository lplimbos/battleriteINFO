<?php
include 'meta.php';
include 'header.php'; 
?>
	<div class="spacer modify" style="width: 75%; height: 100px; margin: 0 auto;">
	</div>
<?php
		$idChampion=$_GET["id"];
		require_once("conexion.php");

		$consulta = mysqli_query($conexion, "SELECT * FROM champions WHERE championID='$idChampion'");

		while ($fila=mysqli_fetch_array($consulta)) {
			printf("
				<div id='modifyContainer'>
					<form action='modifyProcess.php' method = 'post'>
							<div class='modifyName'>
								<div class='modifyLabel'><label>Champion name:</label></div>
								<div class='modifyText'><input type='text' name='nombre' value='%s' class='text'/>
								</div>		
							</div>

							<div class='modifyDescription'>
								<div class='modifyLabel'>
								<label>Description: </label></div>
								<div class='modifyTextArea'>
									<textarea name='descripcion'>%s</textarea>
								</div>
							</div>
							<div class='modifyButton'>
								<input type='hidden' name='idJuego' value='%s' />
								<input type='submit' value='Update' class='button submitButton'/>
							</div>
					</form>
				</div>
				", $fila["championName"], $fila["description"], $fila["championID"]);
		}

include 'footer.php';
?>