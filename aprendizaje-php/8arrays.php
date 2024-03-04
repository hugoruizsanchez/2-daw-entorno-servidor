
<html> 

	<head> 
	
		<title> Arrays o arreglos </title>
	
	</head>
	
	<body> 
	
	
		<h1> Arrays en PHP </h1>
		
		<h2> Array sencillo. </h2>
		
		<?php 
		
		
			// Los arrays son listas de datos guardados dentro de una variable, que poseen identificadores o "índices". 
			// VECTORES: Arrays unidimensionales.
			
			$estacion[0] = "Primavera";
			$estacion[1] = "Verano";
			$estacion[2] = "Otoño";
			$estacion[3] = "Invierno";
			
			echo "<p> $estacion[3] </p>";
			
		?>
		
		<h2> Array sin límite.</h2>
		
		<?php 
			// Puesto que PHP es interpretado, puede asignar los índices automáticamente y de forma ilimitada.
			// Esto hace que en la declaración de un array no se disponga de límites , ni existan errores por sobrepasarlos
			
			$ciudad[]="Madrid"; 
			$ciudad[]="Sevilla"; 
			$ciudad[]="Cádiz"; 
			$ciudad[]="Londres"; 
			$ciudad[]="París"; 
			
			echo "<p> $ciudad[2] </p>";
			
		?>
		
		<h2> Otra forma de declarar arrays.</h2>
		
		<?php 
			
			// Los arrays también pueden asignarse de esta manera
			
			$colores = array("Azul", "Verde", "Rojo"); 
			
			echo "<p> $colores[2] </p>";
			
		?>
		
		<h2> Arrays bidimensionales </h2>
		
		<?php
			
			
			// ARRAYS BIDIMENSIONALES: Se pueden asemejar a tablas o matrices de datos, con filas (f) y columnas (c) 
			// ... de modo que para extraer el array solo debe indicarse: array[f][c]
			
		
			$seresvivos = array (
					array ("Perro", "Gato"), 
					array ("Lombriz", "Saltamontes"),
					array ("Amapola", "Margarita"),
					array ("Célula", "Virus")
			);
			
			echo "<p>".$seresvivos[3][1]."</p>";
			
		?>
		
		<h2> Arrays multidimensionales </h2>
	
		<?php 
		
			// ARRAYS MULTIDIMENSIONALES: Pueden crearse con cuantas dimensiones se desee, ejemplo de un array tridimensional:
			
			$animales = array (
				// 0
				array ( 
				array ("Vaca", "Oveja", "Cabra"), // 0
				array ("Ratón", "Conejo", "Hamster"), // 1
				),
				// 1 
				array (
				array ("Perro", "Gato", "Iguana"), // 0
				array ("León", "Leopardo", "Cocodrilo") // 1
				)
			);
			
			echo $animales[0][1][1];
			
		?>
		
		<h2> Arrays asociativos</h2>
		
		<?php
			
			// ARRAYS ASOCIATIVOS
			// Son arrays que se pueden asociar a una variable de tipo String, su equivalente en java puede ser el hashmap. 
			// Su declaración es: CLAVE (Índice) -> VALOR (Contenido) 
			
			$credenciales = array (
			
				"Nombre" => "Hugo", 
				"Apellido1" => "Ruiz",
				"Apellido2" => "Sánchez",
				"DNI" => "12345678A",
			);
			
			// También pueden declararse de esta forma:
			
			$credenciales["Correo"] = "hugoruizschz@gmail.com";
			
			echo "<p>". $credenciales["Apellido1"]."</p>";
			echo "<p>". $credenciales["Correo"]."</p>";
			
			// Aunque sería más conveniente un array bidimensional, que también puede realizarse con asociativos:
			
			$empresa = array (
				array ("Nombre" => "Hugo", "Apellido1" => "Ruiz", "Apellido2" => "Sánchez", "DNI" => "12345678A"), 
				array ("Nombre" => "Juan", "Apellido1" => "Salmueras", "Apellido2" => "Adolforio", "DNI" => "87654321B"),
				array ("Nombre" => "Pepito", "Apellido1" => "Gómez", "Apellido2" => "Sancho", "DNI" => "11111111C"),
				array ("Nombre" => "Antonia", "Apellido1" => "Martínez", "Apellido2" => "Asensio", "DNI" => "22222222D")
			);
			
		?>
		
		<h2> Recorrer arrays unidimensionales </h2>
		
		<?php
		
			// RECORRER ARRAYS UNIDIMENSIONALES
			
			// Para iterar sobre un array es necesario saber cuántos índices tiene, para lo cual se emplea la función
			// count($array). Es importante saber que esta SOLO CUENTA LOS VALORES INICIADOS.
			// Si el array tiene 12 elementos, pero solo 3 tienen valores asignados, el count arrojará únicamente 3 
			
			for ($i=0; $i<count($ciudad); $i++) {
				
				echo "<p> [ Ciudad nº $i ] $ciudad[$i] </p>";
				
			}
			
		?>
		
		<h2> Recorrer arrays multidimensionales </h2>
		
		<?php 
			
			// RECORRER ARRAYS MULTIDIMENSIONALES
			
			// La función count puede contar cuántos espacios ocupados hay en un array dentro de un array...
			// Para esto se puede utlizar count($array) para saber el numero total de arrays almacenados en una seccion
			// ... count($array[n]) para saber el numero total de arrays dentro de un array, count($array[n][n])  ... y así sucesivamente.
			// Ejemplo: 
			
			echo "<p> Índice FILAS:  ".count($seresvivos)."</p>"; 
			
			echo "<p> Índice COLUMNAS: ".count ($seresvivos[1])."</p>"; 
			
			// Puesto que count únicamente devuelve las filas ocupadas, es una buena práctica iterar en base a la fila concreta que se está iterando
			
			for ($i=0; $i<count($seresvivos); $i++) { // Se repite tantas veces como arrays contenidos tenga.
				
				echo "<p>";
				
				for ($j=0; $j<count($seresvivos[$i]); $j++) { // Se repite tantas veces como elementos contenidos en el array tenga
					
					echo " $i$j ".$seresvivos[$i][$j]; 
				}
			
				echo  "</p>";
				
			}
		?>
		
		<h2> Recorrer arrays for each - Arrray simple</h2>
		
		<?php
			
			
			// RECORRER ARRAYS FOR EACH
			
			// El for each es una forma simplificada de recorrer arrays facilitada por PHP.
			
			// Es útil para recorrer totalmente arrays con índice numérico.
			
			foreach ($estacion as $valor) {
				echo "<p> $valor </p>";
			}
			
		?>
		
		<h2> Recorrer arrays for each - Arrays de asociación simples </h2>
		
		<?php
			
			// Pero  especialmente útil para recorrer arrays asociativos simples...
			
			foreach ($credenciales as $valor) {
				echo "<p>  $valor </p>";
			}
 
	    ?>
	    
	    <h2> Recorrer arrays for each - Arrays de asociación bidimensionales </h2>  
	    
	    <?php 
			
			// ... como bidimensionales. Puesto que no puede iterar sobre arrays sin especificar, debe darse una clave
			
			foreach ($empresa as $valor) {
				echo "<p> -- Ficha de empleado ".$valor["Nombre"]." -- </p>";
				echo "<p> Primer apellido: ".$valor["Apellido1"].". </p>";
				echo "<p> Segundo apellido: ".$valor["Apellido2"].". </p>";
				echo "<p> DNI: ".$valor["DNI"].". </p>";
			}
		?>
		
		<h2> Recorrer arrays - Arrays de asociación bidimensionales </h2>  
		
		<?php
		  
			// Aunque puede ser más intuitivo hacerlo con una iteración simple. 
			
			for ($i=0; $i<count($empresa); $i++) {
				echo "<p> -- Ficha de empleado ".$empresa[$i]["Nombre"]." -- </p>";
				echo "<p> Primer apellido: ".$empresa[$i]["Apellido1"].". </p>";
				echo "<p> Segundo apellido: ".$empresa[$i]["Apellido2"].". </p>";
				echo "<p> DNI: ".$empresa[$i]["DNI"].". </p>";
			}
			
		
		?>
		
		<h2> Recorrido con FOR EACH indicando clave valor </h2>
		
		<?php
		
			// Recorrer el array asociativo $_SERVER mediante un bucle foreach que
			// que muestra "clave" ----> "valor". 
			
			foreach ($_SERVER as $clave => $valor) {
				
				echo "<p> $clave ---- > $valor </p>";
				
			}
			
			// Puede llevarse a cabo también mediante las diferentes funciones de puntero, aunque es innecesariamente más complejo y está obsoleto.  
			
			reset ($_SERVER); // Reseteamos array, para que parta del principio
			
		?>
		
		<h2> Recorrido con CURSORES indicando clave valor </h2>
		
		<?php
		
			// Puede llevarse a cabo también mediante las diferentes funciones de puntero, aunque es innecesariamente más complejo y está obsoleto.
		    // Reset -> Mueve el cursor al principio
			// End -> Mueve el cursor al final.
			// Next - > Mueve el cursor hacia adelante 
			// Prev -> Mueve el cursor hacia atrás. 
			// Current muestra el valor, y puede aprovecharse para verificar la existencia. 
			// Key arroja la clave definida en la posición del cursor
			
			reset ($_SERVER);
			
			while ((current($_SERVER)) != null) {
				
				echo "<p>".key($_SERVER)." ----- >". current($_SERVER). "</p>";
				next ($_SERVER);
				
			}
					
		?>
		
		<h2> Funciones con arrays </h2>
		
		<?php
		
		unset($empresa[0]); // Eliminar dato, desplazando todos los elementos posteriores. 
		
		in_array ("Primavera", $estacion); // Verifica si "primavera" está incluido en el array de estacion
		
		is_array($empresa); // Virifica si "empresa" es un array.
		
		$nuevas_credenciales = array_values($credenciales); // Convierte un array ASOCIATIVO en un array NUMÉRICO o por valor.
		
		for ($i =0; $i<count($nuevas_credenciales); $i++) {
			
			echo "<p> $i --- > $nuevas_credenciales[$i] </p>";
			
		}
		
		
		
		
		
		

		
		?>

			
	</body>


</html>
