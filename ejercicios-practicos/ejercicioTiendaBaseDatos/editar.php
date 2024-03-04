<html> 
	
	<head> 
		
		<title> Editar producto </title>
	
	</head>

	<body> 
		
		<?php 
		
		// DECLARACIÓN DE FUNCIONES 
		
		// ------------------------------- //
		
		function enDocumento ($texto="false", $etiqueta="p") {
			echo "<".$etiqueta.">".$texto."</".$etiqueta.">";
		}
		
		// ------------------------------- //
		
		// RECIBIR INFORMACIÓN DE listado.php
		
		// Definir el nombre del producto, cogiéndolo de listado.php
		
		if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
			
			if (isset ($_REQUEST["nombreproducto"])) {
				$nombreproducto = $_REQUEST["nombreproducto"];
			}
			
		}
		
		// Si no existe, interrumpimos la página
		
		if (!isset ($nombreproducto)) {
			enDocumento ("Error: no ha introducido producto","h2");
			exit; 
		}
		
		// ------------------------------- //
		
		// CONEXIÓN CON LA BASE DE DATOS. 
		
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
		
        // Preparación de la consulta. 
        
        $consulta = $conexion -> query ('SELECT * from producto where nombre_corto="'.$nombreproducto.'"');
        $registro = $consulta -> fetch (); // Tomar el registro (solo es uno, ¡no es necesario iterar!)
        
		?>
	
		<h1> Tarea: Edición de un producto </h1>
		
		<h2> Producto: </h2>
		
		<!-- Formulario de modificación de producto --> 
		
		<form method="POST" action ="actualizar.php">
			
			<!-- Antiguo nombre corto: debe mantenerse la información para que la pestaña de actualizar disponga de este dato si se cambia el nombre_corto--> 
			
			<input type="hidden" name ="nombre_corto_antiguo" value ="<?php echo $nombreproducto ?>"> 
			
			<!-- Nombre corto --> 
		
			<label for="nombre_corto">Nombre corto: </label> 
			<input type="text" id="nombre_corto" name="nombre_corto" value="<?php echo $nombreproducto ?>"/>
			
			<br/><br/>
			
			<!-- Nombre --> 
			
			<label for="nombre">Nombre: </label>
			
			<br/><br/>
			
			<textarea id="nombre" name="nombre" rows="4" cols ="50"> <?php echo $registro["nombre"] ?></textarea>
			
			<br/><br/>
			
			<!-- Descripción --> 
			
			<label for="descripcion">Descripción: </label>
			
			<br/><br/>
			
			<textarea id="descripcion" name="descripcion" rows="8" cols ="50"> <?php echo $registro["descripcion"] ?>"</textarea>
			
			<br /><br/>
			
			<!-- PVP --> 
			
			<label for="pvp">PVP: </label>
			<input type="text" id="pvp" name="pvp" value="<?php echo $registro["PVP"] ?>"/>
			
			<br /><br/>
			
			<!-- Actualizar --> 
			
			<input type="submit" name="actualizar" value="Actualizar"/>
		
		</form>
		
		<!-- Formulario para cancelar y retornar a la página anterior --> 
		
		<form method="POST" action ="listado.php"> 
			<input type="submit" name="cancelar" value="Cancelar"/>
		</form>
		
	</body>
	
</html>
