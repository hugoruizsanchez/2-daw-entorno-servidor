<html> 

	<body> 
	
		<h1> Ejercicios - Entorno Servidor </h1>
	
	
		<h2> Mostrar fecha </h2>
		
		<p> <i>  Haz una página web que muestre la fecha actual en castellano, incluyendo el día de la semana, con un formato similar al siguiente: "Miércoles, 13 de Abril de 2011". </i></p>
		
		<?php 
		
			function dateSpanish () {
				
				// Localización de fecha. 
			
				setlocale(LC_TIME, "es_ES.UTF-8"); // Permite escribir caracteres de españa. 
				date_default_timezone_set("Europe/Madrid") // Zona horaria
				
				
				// Asignación de variables 
				
				$diaNumero = date('j');
				$diaNombreNum= date('N');
				$mesNombreNum = date ('n');
				$anio = date('o'); 
				
				// Asociación de días de la semana. 
				
				$dia[0] = null; 
				$dia[1] = "Lunes";
				$dia[2] = "Martes";
				$dia[3] = "Miércoles";
				$dia[4] = "Jueves";
				$dia[5] = "Viernes";
				$dia[6] = "Sábado";
				$dia[7] = "Domingo";
				
				// Asociación de meses del año 
				
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
			
			echo dateSpanish (); 
				
		
		?> 
	
	</body>

</html>
