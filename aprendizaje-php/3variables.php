
	<?php

	/*  LAS VARIABLES
		- Se escriben con un "$", por ejemplo: "$mivariable" </ul>
		- Son susceptibles a mayúsculas y minúsculas, "$mivariable" es diferente a "$miVariable"
		- Deben empezar por letras mayúsculas o minúsculas o por "_", pero nunca por números 
		- Puesto que las asignaciones de variable pasan a un intérprete, no es necesario especificar su tipo. 
	*/ 

	// ASIGNACIÓN  Y TIPOS DE VARIABLES
	
	// INTEGER 
	
	$entero = 3; 
	$hexadecimal = 0x12; // Notación exadecimal. 
	
	// FLAT o DOUBLE
	
	$decimal = 9.786; 
	
	// STRING
	
	$cadena = "Cadena de texto"; 
	
	// BOOLEAN 
	
	$booleano = false; 
	
	// CONSTANTE
	
	// Primera forma
	
	const MINOMBRE = "Hugo"; 
	
	// Segunda forma
	
	define("MIAPELLIDO", "Ruiz Sánchez");
	
	// VARIABLES ESPECIALES O VARIABLES DE ENTORNO
		
		echo "<p>".$_SERVER['PHP_SELF']."</p>";  // Nombre del archivo PHP en ejecución. 
		echo "<p>".$_SERVER['SERVER_ADDR'] ."</p>"; // Dirección IP del servidor
		echo "<p>".$_SERVER['REMOTE_ADDR'] ."</p>"; // Dirección IP del cliente
		echo "<p>".$_SERVER['SERVER_NAME'] ."</p>"; // Nombre del servidor
		echo "<p>".$_SERVER['DOCUMENT_ROOT'] ."</p>"; // Directorio raíz donde estamos ejecutando el archivo.php
		echo "<p>".$_SERVER['REQUEST_METHOD'] ."</p>"; // Método utilizado para acceder a la página.
		
	/* EL COMANDO ECHO
	 * Sirve para insertar texto dentro del "body". Texto simplemente, sin etiquetas. 
	 * Si se usa cuando NO está embebido en HTML, generará un HTML para mostrarlo. 
	 * Pueden introducirse etiquetas dentro del echo, de modo que en el body puedan apreciarse los estilos.
	 * Por lo cual, lo único que hace "echo" es introducir texto, que si está entre etiquetas, es procesado por el navegador en HTML. 
	*/ 
	
	// Formas de usar echo.
	
	echo "<h1> Usando variables en PHP </h1>"; // Etiqueta HTML en un echo, que se inserta directamente en el body. 
	echo '<h2>¿Sabías que echo también permite comillas simples? </h2>';
	echo ("<h3> E incluso puede usarse con paréntesis si el usuario lo prefiere</h3>");
	echo ('<h4> ¡Y con paréntesis y a la vez comillas simples! </h4>');
	
	// IMPRIMIR VARIABLES
	
	echo "<p> El valor del número entero es: $entero.</p>
		  <p> El valor del número hexadecimal es: $hexadecimal.</p> 
		  <p> El valor del número decimal es: $decimal.</p>
		  <p> La cadena almacenada es: $cadena.</p>
		  <p> El booleano es: $booleano.</p> 
		  <p> \$cadena ¡Ejem! El carácter de escape es \"la barra invertida\", para escribir expresiones que PHP detecta como respectivas del uso de variable u otros fines. Por ejemplo, el carácter del dólar: debe ir antes la barra invertida. </p>"; 

	// Al imprimir el booleano, arrojará '1' si es true, y ' ' si es false. 


	// COMPROBAR Y CONVERTIR VARIABLES. 
	
	//  Para imprimir el tipo de una variable:
	
	echo "<p> Tipo de la variable 'booleano':".gettype($booleano)."</p>";
	
	// Para verificar el tipo de una variable, pueden aplicarse las funciones (is_tipo)
	// a saber: is_array(), is_bool(), is_float(), is_integer(), is_null(), is_numeric(), is_object(), is_resource(), is_scalar() e is_string().
	
	if (is_bool($booleano)==true) {
		echo "<p> Esta variable es boolean </p>";
	}
	
	// Para castear una variable. 
	
	$cadena2 = "12"; // Variable de tipo string 
	
	$entero2= (int) $str;  // Entre paréntesis, el tipo al que se desea castear.
	
	echo "<p> Tipo de variable 'entero2': ".gettype($entero2)."</p>";
	
	// Para convertir directamente una variable: 
	
	settype ($cadena2, "integer"); 
	
	echo "<p> Tipo de variable 'cadena2': ".gettype($cadena2)."</p>";

	// ISSET Y UNSET 
	
	// Is set arroja un boolean que comprueba si la variable está definida o no. Es decir, comprueba si su valor es NULL, como 'is_null()' pero a la inversa, claro.
	
	echo "<p> ¿Está 'cadena2' definida: ".isset($cadena2)."</p>";
	echo "<p> ¿Está 'cadena2' no definida: ".is_null($cadena2)."</p>";

	// Si ejecutamos unset, eliminamos el valor de la variable.
	
	unset($cadena2); // Equivalente a igualar a = null 
	
	echo "<p> ¿Está 'cadena2' definida: ".isset($cadena2)."</p>";
	echo "<p> ¿Está 'cadena2' no definida: ".is_null($cadena2)."</p>";
	

	
	
	
	
	
	
	
	
	


	?>
