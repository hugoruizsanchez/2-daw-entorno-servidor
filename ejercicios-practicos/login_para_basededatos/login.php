<?php 

/**
 * Este archivo facilita el inicio de sesión para acceder a una determinada base de datos, facilitando la introducción de base de datos, servidor, usuario y contraseña sin la necesidad de modificar el código 
 **/
 
// VALORES POR DEFECTO 

$default_bd_servername = "localhost"; 
$default_bd_database ="dwes"; 
$pagina_redireccion= "https://google.es"; 

?>

<html> 

	<head> 
	
		<title> Ingreso a la base de datos </title>
	
	</head>
	
	<body>
		
		<header> 
			<h1> Ingreso a la base de datos </h1>
			<p> <em> Por favor, introduzca sus credenciales </em></p>
		</header>

		<form method="POST" action="login.php">
			
			<label for="servername">Servidor: </label> 
			<input type="text" id="servername" name="servername" placeholder= "<?php echo "Por defecto: $default_bd_servername"?>" />
				
			<label for="database">Base de datos: </label> 
			<input type="text" id="database" name="database"  placeholder= "<?php echo "Por defecto: $default_bd_database"?>" />
				
			<label for="username">Usuario: </label> 
			<input type="text" id="username" name="username" placeholder="Introducir usuario" />
			
			<label for="password"> Contraseña: </label>
			<input type="password" id="password" name="password" placeholder="Introducir contraseña" />
			
			<input type="submit" value="Iniciar sesión" />
			
		</form>
			
		<?php
		
		if ($_SERVER["REQUEST_METHOD"]=="POST") {	
			
			// Recopilación de información del formulario. 
			
			$servername = $_REQUEST["servername"];
			$database = $_REQUEST["database"];
			$username = $_REQUEST["username"];
			$password = $_REQUEST["password"];
			
			// Si no hay servername, pasa a ser  "localhost"
								
			if (empty ($servername)) {
				$servername = $default_bd_servername; 
			}
			
			if (empty ($database)) {
				$database = $default_bd_database;
			}
			
			// Si no hay usuario o contraseña o base de datos, se cancela la ejecución. 
			
			if (empty ($username) || empty($password) || empty ($database)) {
				echo '<script> alert ("Formulario incompleto") </script>';
				exit; 
			}
			
			// Guardado de la información dentro de la sesión, en un array
			
			session_start(); 
		
			$_SESSION["login_bd"] = array (
				"servername" => $servername,
				"database" => $database, 
				"username" => $username, 
				"password" => $password, 
			); 
			
			

			// Redirección 
			
			header("Location: ejemplo2.php");              
		}
	
		?>
					
		
	</body>

</html>

