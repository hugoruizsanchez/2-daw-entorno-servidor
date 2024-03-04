<html> 

	<head> 
		<link rel="stylesheet" href="estilos.css" type="text/css">
	</head>
	
	<body>
		
		<h1> Aplicación sencilla que guarda configuraciones.  </h1>
		
		<h2> Ejercicio propuesto en Desarrollo Entorno - Servidor </h2>

		<p> <b> Alumno: </b> Hugo Ruiz Sánchez</p>
		<p> <b> Docente: </b> César Martín Alcolea </p>	
		
		<hr/> 
		
		<h2> Preferencias </h2>
		
		<!-- FORMULARIOS --> 
		
		<form method="POST" action="preferencias.php"> 
			
			<label for="idioma"> Idioma: </label>
			
			<br/> 
			
			<select name="idioma" id="idioma"> 
				<option value="es"> Español </option>
				<option value="en"> Inglés </option>
			</select>
			
			<br/> 
			
			<label for="perfil"> Perfil público: </label>
			
			<br/> 
			
			<select name="perfil" id="perfil"> 
				<option value="si"> Sí </option>
				<option value="no"> No </option>
			</select>
			
			<br/>
			
			<label for="zonahoraria"> Zona horaria: </label>
			
			<br/>
			
			<select name="zonahoraria" id="zonahoraria"> 
				<option value="GMT-2"> GMT-2 </option>
				<option value="GMT-1"> GMT-1 </option>
				<option value="GMT"> GMT </option>
				<option value="GMT+1"> GMT+1 </option>
				<option value="GMT+2"> GMT+2 </option>
			</select>
			
			<br/>
			<br/>
			
			<!-- Este botón guardará las preferencias dentro de la misma sesión--> 
			
			<input type="submit" value="Establecer preferencias" />
			
			
			</form>
			
			<a href="mostrar.php"> Mostrar preferencias </a>
			
			<!-- Este enlace lleva a mostrar.php, donde se ofrecerá la visualización de las preferencias y facilitará el borrado --> 
					
			<?php 
			
				// Comienzo de la sesión 
				
				session_start (); 
				
				// Guardar la información en las variables de sesión. 
				
				// * Ejecución el código siempre y cuando consten datos enviados.
				
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
				
					$_SESSION["idioma"] = $_REQUEST["idioma"];
					$_SESSION["perfil"] = $_REQUEST["perfil"];
					$_SESSION["zonahoraria"] = $_REQUEST["zonahoraria"];
					

				}
			
			?> 
		
	</body>

	


</html>
