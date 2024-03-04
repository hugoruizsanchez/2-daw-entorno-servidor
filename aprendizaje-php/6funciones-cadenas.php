
<html> 

	<head> 
	
		<title> Manipulación de cadenas </title>
	
	</head>
	
	<body> 
	
	
		<h1> Manipulación de cadenas en PHP</h1>
	
		<h2> Función STRLEN : arrojar la longitud de la cadena </h2>
	
		<?php 
		
		// Toma una cadena y devuelve su longitud como número entero.
		// La función STRLEN sirve para arrojar la longitud de una cadena de texto.
		// Los operadores "==" o "===" solo comparan el valor de los caracteres ASCII, pero no la longitud real. 
			
		$cadena ="Hola, mundo";
		$longitud_cadena = strlen($cadena); 
		
		echo "<p> La longitud de la cadena es $longitud_cadena </p>";
		
		?>

		<h2> Función SUBSTR : segmentar texto </h2>
		
		<?php
		
		// Divide la cadena a partir de un índice final y un índice final
		// (la numeración de caracteres obviamente empieza por 0) 
		
		$cadena_dividida = substr($cadena,2,5); // Parte la cadena del índice 2 al 5 
		$cadena_dividida2= substr ($cadena,4); // Parte la cadena desde el índice 4 hasta el final
		
		echo "<p> Cadena divivida 1: $cadena_dividida</p>";
		echo "<p> Cadena dividida 2: $cadena_dividida2</p>";

		?>
		
		<h2> Función de concatenar (.) : unir texto </h2>
		
		<?php
		
		// La concatenación sirve para unir múltiples textos.
		// No usa una función, sino "." unidos entre cadenas: 
		
		$cadena2 = "... adiós, mundo.";
		
		$cadena_concatenada = ($cadena . " jeje, concateno " .$cadena2); 
		
		echo $cadena_concatenada;
		
		?>
		
		<h2> Función de str_replace : reemplazar texto </h2>
		
		<?php 
		
		// Reemplaza un determinado fragmento de texto por otro.
		// Se emplea así: str_replace("cadena a buscar", "cadena de reemplazo", "string a modificar"). 
		// -> Es compatible con expresiones regulares. 
		
		echo "<p>".str_replace("Amigo","Enemigo","Amigo ¿estás cansado?")."</p>"; 

		// El último parámetro es opcional, y carga en el mismo el total de cambios efectuados. 
		
		echo "<p>".str_replace("Amigo","Enemigo","Amigo ¿estás cansado?",$ncambios)."</p>"; ; 
		
		echo "<p>Los cambios a la cadena han sido: $ncambios </p>";
		
		?>
		
		<h2> Función strtolower y strtoupper : pasar cadena a minúsculas o minúsculas </h2>
		
		<?php
		
		// Convierte todos los caracteres de una cadena a mayúscula (upper) o minúscula (lower).
				
		echo "<p>".strtoupper("¿QuÉ pAsA, caRApAsA?")."</p>";
		
		echo "<p>".strtolower("¿QuE pAsA, caRApAsA?")."</p>";	
		
		?>
		
		<h2> Función  count_chars : cuenta los caracteres </h2>
		
		<?php 
		
		// La función count_chars genera un array con los caracteres y su repetición dentro del texto.
		
		// Su función se escribe: count_chars("cadena", modo); el modo es un número y es opcional, por defecto es 0. 
		
		// Cuando es 0, los índices (i) son el valor ASCII. Y El valor, la cantidad de caracteres: fácil para recorrerlo entero.  
		// Cuando es 1, igual que en 0, pero solo con aquellos que han aparecido al menos una vez: perfecto para un for each.
		// Cuando es 2, devuelve caracteres que no aparecen en la cadena. los índices (i) son el valor ASCII. Y El valor, la cantidad de caracteres: fácil para recorrerlo entero. 
		// Cuando es 3, devuelve una cadena que contiene todos los caracteres utilizados. Para "¿Qué tal, mundo?" devuelve: ,?Qadelmnotu�� 
		// Cuando es 4,  devuelve una cadena que contiene todos los caracteres no utilizados. Para "¿Qué tal, mudo?" devuelve "#$%&..."
		
		$arrayCaracteres=count_chars ("¿Que tal, mundo?", 0); 
				
		echo "<p> $arrayCaracteres </p>"; 		
		?>
		
	</body>


</html>
