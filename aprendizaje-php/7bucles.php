z
<html> 

	<head> 
	
		<title> Bucles </title>
	
	</head>
	
	<body> 
	
	
		<h1> Bucles en PHP</h1>
	
		<h2> Bucle WHILE: EL desfile de las galletas </h2>
		
		<?php
				
			// Repite la ejecución de un conjunto de expresiones mientras una condición sea cierta.
		
			$galletas =0;
		
			while ($galletas<5) {
			
				echo "<p> ($galletas) Galletas </p>";
				$galletas++;
			}
		
		
		?>
		
		<h2> Bucle DO WHILE: El desfile de las galletas ... 2 </h2>
		
		<?php 
		
			// El bucle DO WHILE lleva a cabo la expresión antes de comprobar la condición	
		
			do {
				echo "<p> ($galletas) Galletas </p>";
				$galletas++;
			}
			while ($galletas <10)
		
		?>
		
		<h2> Bucle FOR: El antidesfile de los bollos </h2>
		
		<?php 
		
			for ($i=0; $i<12; $i++) {
			
				echo "<p> El bollo ha hecho $i iteracion/es </p>";
			}
		
		?>
		
		<h2> Estructura de control goto </h2>
		
		<?php 
		
			$numero=1; 
			
			goto salto; // Salta hasta el indicador "salto". 
			
			$numero++;
			
			salto: 
				echo "<p> El valor de \$numero es $numero </p>"; 
		
		?>
		
		<h2> Ejercicio </h2>
		<i> bucle for que a partir de una variable de control $j que toma valores de 100 a 500 de 100 en 100, muestre por pantalla el resultado de dividir la variable de control por 20. En este caso, el resultado será 5 (que es 100/20…), 10 (que es 200/20…), 15, 20, 25.</i>
		
		<?php 
		
		$operacion =0;
		
		for ($j=100; $j<500; $j+=100) {

			$operacion = $j/20; 
			echo "<p> $operacion </p>";
			
		}
		
		
		
		?>
		
	</body>


</html>
