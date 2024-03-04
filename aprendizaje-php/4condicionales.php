<html> 
<body>

<h1> Uso de los condicionales </h1>

<?php

	/*
	 * CONDICIONALES:
	 * Los condicionales expresan condiciones de flujo en el programa.
	 * Pueden hacerse directamente en PHP, o bien embeberse e intercalarse en HTML. 
	 */
	
	 // CONDICIONAL IF - ELSE SENCILLO
	 
	 echo "<h2> Condicional IF ELSE sencillo: ¿hay galletas? </h2>";
	 
	 $galletas = false; 
	 
	 if ($galletas == true) 
		 echo "<p> Efectivamente, hay galletas </p>"; 
	 else 
		 echo "<p> Lamentablemente no hay galletas disponibles </p>";
	
	 
	 // Pueden usarse { } cuando el if tiene más líneas de código. 
	 
	
	?>



<!-- CONDICIONAL IF -ELSE EMBEBIDO EN HTML con INTERCALACIONES de PHP: --> 
<!-- Notese que, aunque las etiquetas se abran y se cierren, el código PHP es el mismo,
con todas sus variables anteriormente declaradas -->

		
<h2> Condicional embebido en HTML </h2>
		
<?php
		
	if ($galletas == true) {
		
?>
		
	<p> ¡Hay galletas! </p>
		
<?php 
		}
		else {
			
			echo "<p> Nanai, no hay galletas</p>";
		}
		
?>


<h2> Condicional concatenado: operadores de comparación y lógicos. </h2>


<?php


	// CONDICIONAL CONCATENADO
	/**
	 * Pueden usarse los siguientes OPERADORES DE COMPARACIÓN
	 * MAYOR QUE (>)
	 * MENOR QUE (<)
	 * MAYOR O IGUAL (>=) 
	 * MENOR O IGUAL (<=)
	 * IGUAL (==) 
	 * DIFERENTE (!=) (<>)
	 * 
	 * Pueden usarse los siguientes OPERADORES LÓGICOS: 
	 * OR (||) 
	 * AND (&&)
	 * XOR (XOR) 
	 * NOT (!) 
	**/
	
	// OPERADORES DE COMPARACIÓN
	
	$entero = 5;
		
	if ($entero > 50)
		echo "Mayor que 50";
	else if ($entero >20)
		echo "Mayor que 20";
	else if ($entero >= 15 && $entero <= 18)
		echo "Entre 15 y 18";
	else if ($entero > 10)
		echo "Mayor que 10";		
	else if ($entero ==2 || $entero ==5)
		echo "El 2 y el 5 son números especiales";
	else
		echo "Menor que 10";
		
	// Si se comparan cadenas de texto, estan se estiman no por su longitud, sino por la suma de cada uno de sus códigos ASCII
		
	// LÓGICOS
	
	$y = false;
	$x = true;
	
	if ($x) 
		echo "<p> El booleano 'x' es true </p>";
	if (!$y)  
		echo "<p> El booleano 'y' es false </p>";
	if ($x xor $y) 
		echo "Uno de los dos es true, y el otro es false";
	
	// Si es una variable numérica, solo 0 es false. Distinto de 0, true.
	// Si es una cadena, cuando está vacía es false. Si no, es true. 
	
	
	
		
?>

<h2> Operador ternario. </h2>

<?php
	
	// OPERADOR CONDICIONAL TERNARIO
	/**
	 * Se expresa así: 
	 * expresiónConValorBooleano ? expresión1 : expresión2;
	 * Ejecutando la expresion 1 si es true, o la expresión 2 si es false.
	**/
	
	$a = 5;
	$b = 5;
	$c = 3;
	$cadena ="";
	$mensaje = ""; 
	
	$a==$c ? $mensaje= "La variable 'a' es igual a 'c" : $mensaje= "La variable 'a' NO es igual a 'c'";
	
	echo "<p> $mensaje </p>" ;
	
	$cadena = $a==$b ? $mensaje= "La variable 'a' es igual a 'b" : $mensaje= "La variable 'a' NO es igual a 'b'";
	
	echo "<p> $mensaje </p>" ;
	echo "<p> Valor de cadena igualada al operador ternario: $cadena</p>" ;


?>


<h2> Switch case </h2>

<?php

// CONDICIONAL SWITCH CASE

$c = 7;

switch ($c) { // valor en base a que se valorará el switch: puede ser entero, booleano, o incluso cadena. 
	
	case 1: // Si tiene un valor concreto, ejecutar la expresión hasta el break.
		echo "Opción para 1";
	break; // Cierre del condicional
	
	case 2:
		echo "Opción para 2"; 
	break;
	
	case 3:
		echo "Opción para 3"; 
	break;
	
	case 4: 
	case 5:
	case 6:
		echo "Opción para 4, 5 o 6";
	break; // Si no usamos el break, los condicionales no se separan y pueden crearse algo parecido a "rangos" 
	
	case 7: 
		echo "Opción para 7";
	break;
	
	default: // ; en caso de no encontrar un valor definido, usa la expresión por defecto.
		echo "Ninguna opción registrada"; 
	break;	
}

?>


</body>
</html>
