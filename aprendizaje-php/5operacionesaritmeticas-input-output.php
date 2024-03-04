<html> 
	
	<body>
	
	
	<h1> Operaciones aritméticas </h1>
	
	<h2> Calculadora en PHP: con entrada y salida de datos. </h2>
	
	<form method="get" action="curso.php"> <!-- Formulario de MÉTODO GET remitido al archivo PHP "curso.php" - este - --> 
	
		<p> Introduzca número "a" </p>
	
		<input name="calca" type="text" /> <!-- input de texto con el nombre "calca", que identificará PHP-->
		
		<br/>
		
		<p> Introduzca número "b" </p>
		
	
		<input name="calcb" type="text" /> <!-- input de texto con el nombre "calcb", que identificará PHP-->
		
		<br/> 
		
		<input type="radio" id="sumar" value="sumar" name="operacion"/>Sumar
		<input type="radio" id="restar" value="restar" name="operacion"/>Restar
		<input type="radio" id="multiplicar" value="multiplicar" name="operacion"/>Multiplicar
		<input type="radio" id="dividir" value="dividir" name="operacion"/> Dividir
		
		<!-- Si todos los inputs "radio" conducen al mismo nombre, este solo tiene un input, como debe ser -->
		
		<br /> 
		
		<input type="submit" />
		
		
	
	</form>
	
	
	<?php 
	
	/**
	 * OPERACIONES ARITMÉTICAS Y SU RESUMEN: 
	 * 
	 * Suma: $a += $b | $a = $a + $b
	 * Resta: $a -= $b | $a = $a - $b 
	 * Multiplicación: $a *= $b | $a = $a * $b
	 * División: $a /= $b | $a = $a / $b 
	 * Resto: $a %= $b | $a = $a % $b 
	 * 
	 * Potencia: pow ($a, $b) Primero base, luego exponente. 
	 * 
	 * 
	 * Para resumir las sumas y las restas:
	 * 
	 * a++ -> Primero devuelvie $a, luego incrementa
	 * ++a -> Primero incrementa, luego devuelve $a
	 * a-- -> Primero devuelve a, luego decrementa.
	 * --a -> Primero decrementa, luego devuelve a 
	 * 
	**/ 
	
	// ASIGNACIÓN DE VARIABLES
	
	$a = $_GET['calca']; // $_GET['nombre'] para depositar el valor extraído del formulario a una variable. 
	$b = $_GET['calcb'];
	$operacion = $_GET['operacion'];
	$resultado =""; 
	
	// DETERMINAR OPERACIÓN
	
	if ($operacion=="dividir") 
		$resultado = $a/$b;
	else if ($operacion=="multiplicar") 
		$resultado = $a*$b;
	else if ($operacion=="sumar") 
		$resultado = $a+$b;
	else if ($operacion=="restar") 
		$resultado = $a-$b;
		
	// PROYECAR RESULTADO
		
	if ($resultado != "")  
		echo "<p> ---------------------</p>
			  <p> El parametro a es $a</p>
			  <p> El parametro b es $b </p>
			  <p> La operación elegida es $operacion </p>
			  <p> Resultado: $resultado</p>";
	?>
	
	
	</body>

	


</html>
