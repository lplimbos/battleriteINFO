<?php
	$images = array("image", "bodyImage");

	$target_dir = "images/champions/";

	for ($i=0; $i < 2; $i++) { 
	$target_file = $target_dir . basename($_FILES["$images[$i]"]["name"]);
	echo "$target_file";
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["enviar"])) {
		require_once("conexion.php");
	    $check = getimagesize($_FILES["$images[$i]"]["tmp_name"]);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }
	}
	// Check if file already exists
	if (file_exists($target_file)) {
	    echo "Sorry, file already exists.";
	    $uploadOk = 0;
	}
	// Check file size
	if ($_FILES["$images[$i]"]["size"] > 10000097152) {
	    echo "Sorry, your file is too large.";
	    $uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	    $uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($_FILES["$images[$i]"]["tmp_name"], $target_file)) {
        	echo "The file ". basename( $_FILES["$images[$i]"]["name"]). " has been uploaded.";
        	$imagesName[$i] = $_FILES["$images[$i]"]["name"];
	    } else {
	        echo "Sorry, there was an error uploading your file.";
	    }
	}
	}

	if ($uploadOK !== 0) {
		$nombre=$_POST["nombre"];
		$descripcion=$_POST["descripcion"];
		$registrar=mysqli_query($conexion, "INSERT INTO champions VALUES (NULL, '$nombre', '$descripcion')");
		echo "<a href='catalog.php' ><h2>Juego registrado con éxito</h2></a>";
        $consulta = mysqli_query($conexion, "SELECT * FROM champions WHERE championName = '$nombre'");
	    $fila = mysqli_fetch_array($consulta);
	    $idchampion = $fila["championID"];
		$registrar=mysqli_query($conexion, "INSERT INTO images VALUES (NULL, $idchampion, '$imagesName[0]', '$imagesName[1]')");
	}

?>