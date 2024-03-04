<html> 

	<head> 
		<title> Datos actualizados </title>
	</head>
	
	<body> 
		
	<?php
	
	// ------------------------------- //

	// Inicio de sesión en la base de datos. 
	
	$servername = "localhost";
	$username = "hugo";
	$password = "12345678";
	$database = "dwes";
	
	// Ajustes para permitir caracteres UTF-8
	
	$opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
	
	// Conexión a la base de datos: verificación y prevención de errores.
	
	try {
		$conexion = new PDO("mysql:host=$servername;dbname=$database", $username, $password, $opciones);
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Habilitar detección de errores. 
	}
	catch (PDOException $e) {
		enDocumento ("Error en la conexión con el servidor","h1"); 
		enDocumento ("HTTP/1.1 500 Internal Server Error");
		exit;
	}
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (isset ($_REQUEST["actualizar"])) {
			
			// Introducción de valores dentro de variables entrecomilladas, para facilitar la consulta
			
			$antiguo_nombre_corto = '"'.$_REQUEST["nombre_corto_antiguo"].'"';
			$nuevo_nombre_corto = '"'.$_REQUEST["nombre_corto"].'"'; 
			$nombre = '"'.$_REQUEST["nombre"].'"'; 
			$descripcion ='"'.str_replace('"','', $_REQUEST["descripcion"]).'"'; // ¡Las descripciones de esta base de datos terminan en "! Deben quitarse y ponerse de nuevo al principio y al final para evitar errores.
			$PVP = $_REQUEST["pvp"];
			
			// Realización de la consulta.
			
			$conexion -> exec ("UPDATE producto 
								SET 
								nombre_corto=$nuevo_nombre_corto , 
								PVP=$PVP ,
								nombre=$nombre ,
								descripcion=$descripcion
								WHERE nombre_corto=$antiguo_nombre_corto");
		}
	}
	
	?>
	
	<p> Se han actualizado los datos</p>
	
	<form method="POST" action ="listado.php"> 
			<input type="submit" name="continuar" value="Continuar"/>
	</form>
	
	
	
	</body>


</html>
