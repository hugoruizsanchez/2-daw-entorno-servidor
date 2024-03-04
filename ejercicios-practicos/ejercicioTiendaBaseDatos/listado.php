<html> 
	
	<head> 
		<title> Elegir familia y producto</title> 
	</head>
	
	<body> 
		
		<?php
		
		// ------------------------------- //
		
		// Declaración de funciones que emplearé: 
		
		/**
		 * Elimina los espacios (" "), tabulaciones (t), saltos de línea (n), 
		 * y retornos de carro (r) de una determinada cadena      
		**/
		
		function sinEspacios ($cadena) {
			return str_replace (array (' ', '\t', '\n', '\r'), '', $cadena);
		}
		
		/**
		 * Facilitad para introducir texto o párrafos
		**/
		
		function enDocumento ($texto="false", $etiqueta="p") {
			echo "<".$etiqueta.">".$texto."</".$etiqueta.">";
		}
		
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
		
		?>
		
		<!-- PRESENTACIÓN DE LA HERRAMIENTA -->
	
		<h1> Tarea para DWES03</h1>
		<h2> Ejercicio propuesto en Desarrollo Entorno - Servidor </h2>

		<p> <b> Alumno: </b> Hugo Ruiz Sánchez</p>
		<p> <b> Docente: </b> César Martín Alcolea </p>	
		
		<hr/>
		
		<h1> Tarea: Listado de productos de una familia </h1>
		
		<!-- Formulario de selección -->
				
		<form method="POST" action ="listado.php">
			
			<!-- Elegir familia --> 
			
			<label for="familia"> Familia: </label> 
			
			<select name="familia" id="familia"> 
				
				<?php
				
				// Introducción de la consulta, creando un objeto query. 
				
				$consulta = $conexion -> query ("SELECT cod from familia");
				
				// Recorrer el objeto $consulta a través de un while, que indexa cada resultado en el formulario. 
		
				while ($registro = $consulta -> fetch ()) { // Mientras el registro no arroje un 0 (false)...
					echo '<option value="';
					echo $registro["cod"]; 
					echo '">';
					echo $registro["cod"];	
					echo '</option>';				
				}
				
				?>
				
			</select>
			
			<!-- Efectuar consulta --> 
			
			<input type="submit" name="botonConsultar" value="Mostrar productos" />
			
		</form>
		
		<?php 
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			
			// Si se ha definido la consulta, mostrar los productos :
					
			if (isset ($_REQUEST["botonConsultar"])) {
				
				// Mostrar los productos de la familia solicitada
				
				enDocumento ("Productos de la familia ".$_REQUEST["familia"], "h2");
				
				// Elaborar la consulta sobre la tabla de producto mostrando el nombre de aquellos correspondientes a la familia. 
				
				$consulta = $conexion -> query ('SELECT nombre_corto from producto where familia="'.$_REQUEST["familia"].'"');
				
				// Iteración de todos los nombres,presentando la información en un formulario que redirige a editar.php.
				
				while ($registro = $consulta -> fetch ()) { // Mientras el registro no arroje un 0 (false)...
							
					echo '<form method="POST" action ="editar.php">'; 
					
					echo '<label for="'.$registro["nombre_corto"].'">'.$registro["nombre_corto"].' </label>'; 
					
					echo '<input type="submit" id="'.$registro["nombre_corto"].'" name="editar" value="Editar">';	
					
					echo '<input type="hidden" name="nombreproducto" value="'.$registro["nombre_corto"].'">'; //El input hidden guarda la información del producto a consultar, remitida al archivo editar.php.
					
					echo '</form>'; 
					
											
				}
				
			}
			
		}
		
		?>
		
	</body> 

</html>
