
<html> 

	<head> 
	
		<title> Funciones PHP </title>
	
	</head>
	
	<body> 
	
		<h1> Funciones PHP</h1>
		
		<?php
		
		
			// La creación de funciones permite la reutilización del codigo. 
			
			// FUNCIÓN SIN PARÁMETROS
			
			function holaMundo () {
				echo "Hola mundo";
			}
			
			holaMundo (); // Ejecuta la función. 
			
			// FUNCIÓN CON PARÁMETROS. 
		
			function mostrarParrafo ($texto) {
			
				echo "<p> $texto </p>";
			}
		
			mostrarParrafo("¿Qué tal, gente?"); // Ejecuta la función introduciendo el parámetro.
			
			
			// FUNCIÓN CON SALIDA O RETURN
			
			function operar ($n1, $n2, $nombreoperacion) {
				
				$salida = "x";
				
				if ($nombreoperacion =="sumar") {
					$salida = $n1 + $n2;
				}
				else if ($nombreoperacion =="restar") {
					$salida = $n1 - $n2;
				}
				else if ($nombreoperacion =="multiplicar") {
					$salida = $n1 * $n2;
				}
				else if ($nombreoperacion =="dividir") {
					$salida = $n1 / $n2;
				}
				else {
					return "Operación no especificada";				
				}
				
				return $salida;		
				
			}
			
			echo operar("1","2","restar");
			
			// FUNCIÓN CON VALOR POR REFERENCIA 
			// -> esto significa que podemos pasar una variable previamente declarada 
			// y cargarla de información mediante la función. 
			
			$modificame;
			
			function darValorCinco (&$variable) {
				$variable = 5;
			}
			
			darValorCinco ($modificame); 
			
			echo "<p> $modificame </p>"; 
			
			
			
			
		
		
		?>
		
	</body>


</html>
