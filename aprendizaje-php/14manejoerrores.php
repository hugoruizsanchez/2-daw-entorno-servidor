<html> 
	
	<body>
		
		<h1> Manejo de errores en PHP </h1>
		
		<?php
		
		// El manejo de errores está parametrizado en el php.ini de PHP
		// -> en este fichero se encuentra error_reporting, donde constan los tipos de errores que se reportarán y display_errors, es decir, si los  muestra o no. No es necesario modificarlos. 
		
		// Crear excepciones propias
		// -> para crear excepciones propias debemos intervenir sobre el error_reporting, que es el detector de errores nativo en php. Esto se hace creando una función y definiéndola posteriormente
		// https://www.php.net/manual/es/errorfunc.constants.php aqui se pueden ver que tipos de erorres se pueden registrar.
		
		// phpinfo(); para ver donde está el php.ini en el apartado "Configuration file". 
		
		/*
		function gestorDeErrores($nivel, $mensaje) {
			switch ($nivel) {
				case E_WARNING:
					error_log("Error de tipo WARNING: $mensaje");
					break;
				case E_CORE_ERROR:
					error_log("Error de tipo CORE: $mensaje");
					break;
				default:
					error_log("Error no reconocido");
					break;
			}
		}

		set_error_handler("gestorDeErrores");

		$dividendo = 12;
		$divisor = 0;
		$resultado = $dividendo/$divisor;

		restore_error_handler();
		*/ 
		
		// Es recomendable ,sin embargo, usar la forma de capturar errores semejante a otros lenguajes
		
		$dividendo = 12;
		$divisor = 0;
		
		try {
			if ($divisor==0) 
				throw new Exception ("División por cero, amigo");
			$resultado = $dividendo/$divisor;
		}
		catch (Exception $e) {
			echo "<p> Se ha producido el siguiente error: ".$e->getMessage();
			echo " y el código de error es: ".$e->getCode();
			echo "</p>";	
		}
		// El objeto Exception tiene las propiedades getCode y getMessage
		
		
		
		

		
		
		
		
		
		
		
		?>
		
		
	</body>

	


</html>
