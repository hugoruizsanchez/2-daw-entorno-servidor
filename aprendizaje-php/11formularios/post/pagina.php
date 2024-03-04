<!--
	EJERCICIO 
	
	 Debes programar una aplicación para mantener una pequeña agenda en una única página web programada en PHP.

La agenda almacenará únicamente dos datos de cada persona: su nombre y un número de teléfono. Además, no podrá haber nombres repetidos en la agenda.

En la parte superior de la página web se mostrará el contenido de la agenda. En la parte inferior debe figurar un sencillo formulario con dos cuadros de texto, uno para el nombre y otro para el número de teléfono.

Cada vez que se envíe el formulario:

    Si el nombre está vacío, se mostrará una advertencia.
    Si el nombre que se introdujo no existe en la agenda, y el número de teléfono no está vacío, se añadirá a la agenda.
    Si el nombre que se introdujo ya existe en la agenda y se indica un número de teléfono, se sustituirá el número de teléfono anterior.
    Si el nombre que se introdujo ya existe en la agenda y no se indica número de teléfono, se eliminará de la agenda la entrada correspondiente a ese nombre.

Criterios de puntuación. Total 10 puntos.

Se valorará con un punto la consecución completa de cada uno de los siguientes ítems:

    Generar la estructura de la página PHP.
    Mostrar los contactos existentes en la agenda.
    Generar el formulario de introducción de nuevo contacto.
    Introducir los datos de la agenda como campos ocultos en el formulario.
    Comprobar los datos enviados por el formulario, mostrando una advertencia cuando no se cubre el nombre.
    Introducir en la agenda los datos de un nuevo contacto.
    Modificar el teléfono de un contacto ya existente.
    Eliminar de la agenda un contacto.
    Utilizar un array asociativo.
    Introducir comentarios en el código.

Recursos necesarios para realizar la Tarea.
Ordenador con PHP, servidor web Apache y entorno de desarrollo, correctamente instalado y configurado.
Consejos y recomendaciones.
Se recomienda emplear como apoyo en el desarrollo del examen un navegador con acceso a Internet, para poder consultar el manual online de PHP .
Indicaciones de entrega.

Una vez realizada la tarea elaborarás un único documento donde figuren las respuestas correspondientes. El envío se realizará a través de la plataforma de la forma establecida para ello, y el archivo se nombrará siguiendo las siguientes pautas:

apellido1_apellido2_nombre_SIGxx_Tarea

Asegúrate que el nombre no contenga la letra ñ, tildes ni caracteres especiales extraños. Así por ejemplo la alumna Begoña Sánchez Mañas para la segunda unidad del MP de DWES, debería nombrar esta tarea como...

Sánchez_Mañas_Begoña_DWES02_Tarea



--> 


<html> 
	
	<head> 
	
		<title>Agenda en PHP</title> 
	
	</head>
	
	
	<body> 
		
		<!-- PRESENTACIÓN DE LA HERRAMIENTA -->
	
		<h1> Agenda PHP </h1>
		<h2> Ejercicio propuesto en Desarrollo Entorno - Servidor </h2

		<p> <b> Alumno: </b> Hugo Ruiz Sánchez</p>
		<p> <b> Docente: </b> César Martín Alcolea </p>	
		
		<hr/> 
		<br/>
		
		<!-- PROCESAMIENTO DE DATOS Y  LISTADO DE LA AGENDA  -->
		
		
		<?php 
			
			session_start(); // Los datos deben guardarse en una sesión. Si no, se reiniciarán tras cada regarga. 
			
			// Inicializar array de contacto. 
			// -- >  Se tratará de un array asociativo, la clave será el número de teléfono, y el nombre el valor. 
			// -- >  Es necesario comprobar si el array ya está iniciado en la sesión. Si no, se inicializa. 
				
			
			if (isset($_SESSION["agenda"])) {
				$agenda = $_SESSION["agenda"];
			} else {
				$agenda = [];
			}

			// Ejecución del código siempre y cuando consten datos enviados.
		
			if ($_SERVER["REQUEST_METHOD"] == "POST") {

				// Si el nombre está vacío, mostrar advertencia.
				// -- > Advertencia en forma de mensaje emergente sencillo a través de script. 
			
				if (empty($_REQUEST["nombre"])) {
				
				echo '<script> window.alert("No ha introducido el nombre de contacto.");</script>';
				
				}
			
				// Si el nombre que se introdujo no existe en la agenda, y el número de teléfono no está vacío, se añadirá a la agenda.
		
				else if (!empty($_REQUEST["telefono"]) && !in_array ($_REQUEST["nombre"], $agenda) ){
	
					$agenda[$_REQUEST["telefono"]] = $_REQUEST["nombre"];
					
				} 
				
				// Si el nombre que se introdujo ya existe en la agenda y no se indica número de teléfono, se eliminará de la agenda la entrada correspondiente a ese nombre.
				// -- >  Note que puesto que el nombre actúa como valor - pues puede haber nombres diferentes -  tenemos que recurrir a un foreach para hallar los valores coincidentes y borrarlos. 
				
				else if (empty($_REQUEST["telefono"])){
					
					foreach ($agenda as $clave => $valor) {
						
						if ($valor == $_REQUEST["nombre"]) 
							unset ($agenda[$clave]);
						
					} 
					
				}
			
				// Si el nombre que se introdujo ya existe en la agenda y se indica un número de teléfono, se sustituirá el número de teléfono anterior.
				
				else if (!empty($_REQUEST["telefono"]) && in_array($_REQUEST["nombre"], $agenda)) {
					
					foreach ($agenda as $clave => $valor) {
						
						if ($valor == $_REQUEST["nombre"]) 
							unset ($agenda[$clave]);
						
					} 
					
					$agenda[$_REQUEST["telefono"]] = $_REQUEST["nombre"];
						
				}
				
				
				
				$_SESSION['agenda'] = $agenda; // Guardar la agenda  para próximas sesiones. 

								
			} 		
		
		// Ejecución del código. al iniciar en la página: visualización de la agenda
				
			foreach ($agenda as $clave => $valor) {
				
				echo "<p> Nombre: $valor ---- >  Teléfono: $clave </p>";
				
			}
		
		
		?>
		
		<!-- FORMULARIOS  -->
		
		<form method="POST" action="pagina.php"> 
			
			 <label for="nombre">Nombre: </label> 
			 <input type="text" id="nombre" name="nombre" placeholder="Introduzca nombre" />
			 
			 <label for="telefono">Número de teléfono: </label>		 
			 <input type="tel" id="telefono" name="telefono" placeholder="Introduzca número" />
			 
			 <br/> <br/>
			 
			 <input type="submit" value="Añadir teléfono" />

		
		</form>

		
	
	
	</body>





</html>
