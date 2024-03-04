<html> 
	
	<body>
		
		<h1> Manejo de sesiones </h1>
		
		<!-- BotÃ³n de cierre de sesiÃ³n, al pulsarse (PHP detecta que estÃ¡ pulsado) Cierra la sesiÃ³n -->
		
		<form method="post" action="pagina.php">
			<input type="submit" name="boton_cerrar" value="Cerrar sesiÃ³n">
		</form>
		
		<?php
		
		function enDocumento ($texto="false", $etiqueta="p") {
			echo "<".$etiqueta.">".$texto."<".$etiqueta.">";
		}
		
		function dateSpanish () {
			
				
			// LocalizaciÃ³n de fecha. 
		
			setlocale(LC_TIME, "es_ES.UTF-8"); // Permite escribir caracteres de espaÃ±a. 
			date_default_timezone_set("Europe/Madrid"); // Zona horaria
			
			
			// AsignaciÃ³n de variables 
			
			$diaNumero = date('j');
			$diaNombreNum= date('N');
			$mesNombreNum = date ('n');
			$anio = date('o'); 
			
			// AsociaciÃ³n de dÃ­as de la semana. 
			
			$dia[0] = null; 
			$dia[1] = "Lunes";
			$dia[2] = "Martes";
			$dia[3] = "MiÃ©rcoles";
			$dia[4] = "Jueves";
			$dia[5] = "Viernes";
			$dia[6] = "SÃ¡bado";
			$dia[7] = "Domingo";
			
			// AsociaciÃ³n de meses del aÃ±o 
			
			$mes[0] = null;
			$mes[1] = "Enero";
			$mes[2] = "Febrero";
			$mes[3] = "Marzo";
			$mes[4] = "Abril";
			$mes[5] = "Mayo";
			$mes[6] = "Junio";
			$mes[7] = "Julio";
			$mes[8] = "Agosto";
			$mes[9] = "Septiembre";
			$mes[10] = "Octubre";
			$mes[11] = "Noviembre";
			$mes[12] = "Diciembre";
			
			return $dia[$diaNombreNum].", ".$diaNumero." de ".$mes[$mesNombreNum]." de ".$anio;
				
		}
		
		
		////////////////////////
		
		// Las sesiones de usuario difieren de las cookies en su lugar de almacenamiento: las sesiones se guardan en el servidor, las cookies, en el cliente.
		// Las cookies estÃ¡n limitadas, no asÃ­ las sesiones, que dependen del servidor para ser guardadas.
		
		// -> Las configuraciones concretas relativas a sesiones (y cookies) se encuentran en el fichero php.ini, y son: session.use_coockies, session.use_only_cookies, session.save_handler, session.name, session.auto_start, session.cookie_lifetime, session.gc_maxlifetime.
		
		// Iniciar sesiÃ³n
		
		session_start();  // .., o activar la variable de php,ini "session.auto_start"
		
		// Guardar informaciÃ³n en la sesiÃ³n
		
		// Borrar sesiÃ³n: si se pulsa el botÃ³n, se elimina. 
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (isset ($_POST["boton_cerrar"])) {
				session_destroy(); // Elimina el contenido de la sesiÃ³n. session_destroy elimina la sesiÃ³n
				echo '<script type="text/javascript">window.location.href = window.location.href;</script>'; // orden de reiniciar la pÃ¡gina por script
			}
		}
		
		// El array "visitas" almacena el nÃºmero de la visita y un array con su fecha y hora. 
		
		
		if (isset ($_SESSION ["visitas"])){ // Si estÃ¡ declarado...
			
			// Nuevo elemento al array con fecha y hora
			
			array_push($_SESSION ["visitas"],  dateSpanish()." - ".date('H:i:s')); 
			
			// Y recorrer el array para mostrarlo
			
			for ($i=0; $i<count($_SESSION ["visitas"]); $i++) {
				enDocumento ("Visita no. ".($i+1)." Hora: ".$_SESSION ["visitas"][$i]);
			} 
			
			enDocumento ("Has visitado la pÃ¡gina: ".count($_SESSION ["visitas"])." veces."); 

		}
		else { // Si no estÃ¡ declarado
			
			// Declararlo, es decir, creando un array vacÃ­o. 
			
			$_SESSION ["visitas"] = array ();
			
			// Si no estÃ¡ declarado, es la primera vez que entra en la pÃ¡gina:
			
			enDocumento ("Â¡Bienvenido! Esta sesiÃ³n registra las veces que has reiniciado la pÃ¡gina."); // Dar mensaje de bienvenida
			
			// Introducir registro de inicio usando el mÃ©todo push y disponiendo la fecha y hora
			
			array_push($_SESSION ["visitas"],  dateSpanish()." - ".date('H:i:s')); // E introducir el registro de inicio. 
			
		}
		

		 
		?>
		
	
		
	</body>

	


</html>
