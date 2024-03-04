<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	
	// El name del formulario HTML corresponde a la VARIABLE donde se cargará, podrá ser incluso un array "nombre[]" 
	// El value es el valor que se le asignará a la variable.	
	
	// Tomar los valores con el $_POST 
	
	// $nombre = $_POST["nombre"];
	// $ciclo = $_POST["ciclo"];
  
	// También puede usarse $_REQUEST[""] para poder tomarlo de la fuente que encuentre, sea GET o POST
	
	// La función EMPTY nos permite verificar si los datos introducidos están introducidos. 
	
	if (empty($_REQUEST["nombre"])){
		
		echo "<p> No has introducido nombre...</p>";
	}
	else {
		
		$nombre = $_REQUEST["nombre"];
		echo "<p> Ha enviado su nombre, señor $nombre </p>";
		
	}
	
	
	$ciclo = $_REQUEST["ciclo"];

	// Realizar acciones con los datos recibidos
	// Por ejemplo, guardarlos en una base de datos o enviar un correo electrónico

  echo "¡Hola, $nombre! Tu ciclo es $ciclo.";
  

}
?>
