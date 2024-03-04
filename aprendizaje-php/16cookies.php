<html> 
	
	<body>
		
		<h1> Manejo de cookies </h1>
		
		<?php
		
			// Las cookies son información guardada dentro del navegador, generalmente utilizadas para guardar preferencias, o incluso, sesiones de usuario. 
			
			$edad = 20;
			
			setcookie("mi_cookie", $edad, time()+3600); 
			
			// El time son los segundos que tardará en borrarse. Sin embargo, es opcional; si no se coloca, durará hasta que se cierre el navegador.
			
			echo "<p> Esto es la cookie de edad: ". $_COOKIE["mi_cookie"]."</p>"; 
			
		
		?>
		
	</body>

	


</html>
