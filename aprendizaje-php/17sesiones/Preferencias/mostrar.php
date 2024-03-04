<html> 

	<head> 
		<link rel="stylesheet" href="estilos.css" type="text/css">
	</head> 
	
	<body> 
		
		<h2> Información de la sesión almacenada </h2>
		
		<?php
		
			// Comienzo de la sesión
			 
			session_start (); 
			
			// Si en la sesión existe la bandera "borrado", se muestra el mensaje de que se ha borrado. 
			// -> Luego pasa a null, para que no se de esa posibilidad al reiniciar la página. 
			
			if (isset ($_SESSION["borrado"])) {
				echo "<p> Información de la sesión eliminada </p>"; 
				$_SESSION["borrado"]= null; 
			}
			
			echo "<b> Idioma: </b>";
			echo "<p>".$_SESSION["idioma"]."</p>";
			echo "<b> Perfil público: </b>";
			echo "<p>".$_SESSION["perfil"]."</p>";
			echo "<b> Zona horaria: </b>";
			echo "<p>".$_SESSION["zonahoraria"]."</p>";
		?>
		
		<form method="POST" action="mostrar.php"> 
			<input type="submit" value="Borrar preferencias" />
		</form>
		
		<a href="preferencias.php"> Establecer preferencias </a>
		
		<?php
		
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				
				$_SESSION["idioma"] = null;
				$_SESSION["perfil"] = null;
				$_SESSION["zonahoraria"] = null; 
				$_SESSION["borrado"] = true; 
				
				header ("Location: mostrar.php");

			}
		?>
		
		
	
	
	
	</body>




</html>


