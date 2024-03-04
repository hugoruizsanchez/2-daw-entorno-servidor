<?php
		
	// Podemos importar documentos PHP o HTML con la opción include, que facilita la inclusión de código de determinados documentos. 
		
	include "ejemplo.php"; // Este fichero incluye un fragmento de código en html y la función "decirHola"
	
	include_once "ejemplo.php" // include_once únicamente incuye el archivo una vez, de modo que si hay dos "include" redirigiendo al mismo archivo, omite la linea. 
	
	require "ejemplo.php" // Esto implica que OBLIGATORIAMENTE debe implementar el fichero al codigo. Si no encuentra el fichero, entonces detiene el programa.
	
	require_once "ejemplo.php" // Igual que el anterior, pero si hay dos "require" reedirigiendo al mismo archivo, omite la línea. 
	
	decirHola();
		
?> 
	

