<html> 
	
	<body>
		
		<h1> Conexiones a bases de datos mySQL </h1>
		
		<!--
		
		Debe iniciarse el MYSQL: 
		
		sudo service mysql start
		
		Y crear un usuario para el mismo dentro de la consola de mysql:
		
		sudo mysql 
		
		Posteriormente, iniciar sesión con dicho usuario: 
		
		mysql -u hugo -p
		
		Después de instsalado MYSQL en el terminal, debe REINICIARSE EL SERVICIO DE APACHE:
		
		sudo service apache2 restart
		
		El estado de la base de datos es: 
		
		CREATE TABLE ciudades (
			id INT AUTO_INCREMENT, 
			ciudad VARCHAR(30), 
			pais VARCHAR(30), 
			habitantes INT, 
			superficie FLOAT, 
			tieneMetro BOOLEAN,
			PRIMARY KEY (id)
		);

		INSERT INTO ciudades (ciudad, pais, habitantes, superficie, tieneMetro) VALUES
		  ('Ciudad A', 'País A', 1000000, 500.25, 1),
		  ('Ciudad B', 'País B', 500000, 250.50, 0),
		  ('Ciudad C', 'País C', 2000000, 1000.75, 1);
		
		-->
		
		<?php
		
		echo "<h2> Conexión y muestreo de la base de datos </h2>";
		
		// CONEXIÓN A LA BASE DE DATOS
		
		// El encargado de coordinar conexiones MYSQL en PHP es un objeto, cuyos parámetros iniciales son:

		// ASIGNACIÓN DE VARIABLES
		
		$servername = "localhost";
		$username = "hugo";
		$password = "12345678";
		$database = "php_prueba";
		
		// FUNCIONES DEL OBJETO MYSQLI
		
		$conexion = new mysqli (); // Creación del objeto (los objetos tienen funciones y atributos a las que se accede mediante "->")
		
		// CONECTAR "connect"	
		// -> connect es una función del objeto mysqli. 
		// -> Si ponemos un "@" antes, está OMITIENDO los posibles errores que puedan suceder 
		// si no se pone el @, nos arriesgamos a detener la ejecución del programa si existe un error. 
		
		@ $conexion -> connect ($servername, $username, $password, $database); 
		
		// COMPROBAR ERRORES "connect_errno"
		// -> Si hay un error, el número de este se deposita en la función connect_errno
		
		$error = $conexion-> connect_errno; 
		
		if ($error !=null) 
			echo "<p> ¡Error! No puede conectarse a la base de datos, código: $error </p>";
		else 
			echo "<p> Conexión exitosa.</p>";
		
		// CAMBIAR BASE DE DATOS "select_db"	
		// -> Si se desease cambiar de bases de datos, puede actualizarse una vez conectada
		
		// conexion->select_db("otra_db"); 
		
		// FUNCIONES DEL OBJETO QUERY.
		// -> El Objeto QUERY es un derivado de MYSQLI que permite manipular una consulta concreta. 
		// -> y para saber las entradas existentes, debe emplearse conexion->affected_rows
		
		$resultado = $conexion -> query ("DELETE FROM ciudades WHERE tieneMetro=0"); 
		
		if ($resultado) // Si el resultado existe... 
			echo "<p> Se han modificado ".$conexion->affected_rows." registros. </p>";
		else 
			echo "<p>  Ha ocurrido un error.</p>";
					
		// QUERY "fetch_assoc" 
		// -> Devuelve los registros únicamente en forma de array ASOCIATIVO,
		
		$consulta = $conexion -> query ("SELECT * FROM ciudades");
		
		// -> Verificar si hay resultados con el método "num_rows" (numero de filas) 
		
		if ($consulta -> num_rows <= 0) {
			echo "<p> No existe o no contiene datos </p>"; 
		} 
		else {
			echo "<p> Tabla encontrada con ". $resultado -> num_rows. " filas.-</p>";
			// fetch_assoc (un array asociativo con un campos) solo deposita un registro cada vez. 
			$registro = $consulta -> fetch_assoc(); // Depositamos el primer dato
			while ($registro!=null){ 
				
				 echo "<p>id: " . $registro["id"] . "</p>";
				 echo "<p>ciudad: " . $registro["ciudad"] . "</p>";
				 echo "<p>pais: " . $registro["pais"] . "</p>";
				 echo "<p>habitantes: " . $registro["habitantes"] . "</p>";
				 echo "<p>superficie: " . $registro["superficie"] . "</p>";
				 echo "<p>tieneMetro: " . $registro["tieneMetro"] . "</p>";
				 $registro = $consulta -> fetch_assoc();  // ... vamos depositando los siguientes con los siguientes. 
				 
			 }
		}
		
		// REALIZAR TRANSACCIONES. 
		// -> Las transacciones en mySQL son más que trozos de código que se acumulan en búfer y ejecutan después de un COMMIT;, y que pueden revertirse con ROLLBACK; 
		// Como realizar consultas a través de PHP no es lo mismo que con un editor de código, debemos indicarle a nuestra conexion que NO QUEREMOS que envíe las sentencias hasta que no indiquemos el COMMIT;
		
		// $conexion -> autocommit (false); // así. 
		
		// A partir de de este punto ya es posible ejecutar sentencias mySQL con QUERY y acumularlas hasta que se escribe "COMMIT;" y revertirlas con "ROLLBACK;" 
		
		// fetch_array es diferente a "fetch_assoc" 
		// -> Permite guardar los resultados en un array mixto, es tanto asociativo como numérico, si se desea.,
		
		echo "<h2> Fetch_array </h2>"; 
		
		// Escribiendo consulta y Creando objeto "registro"
		
		$consulta = $conexion -> query ("SELECT * FROM ciudades");
		$registro = $consulta -> fetch_array(); // Primer registro
		
		// Cargando registro con variables. 
		// -> esto únicamente deposita el primer registro
		
		$ciudad_nombre = $registro["ciudad"];
		$ciudad_pais = $registro["pais"];
		
		echo "<p> La ciudad es $ciudad_nombre y pertenece al pais de $ciudad_pais </p>";
		
		
		// -> Debemos notar que tanto fetch_array como fetch_assoc usan punteros, por lo que podemos elegir el número de fila que deseemos, esto se realiza desde el objeto donde está depositada la query
		
		$consulta->data_seek(1); // Puntero hacia el Segundo registro (1)
		$registro = $consulta -> fetch_array(); // Introducimos la consultas 
		
		$ciudad_nombre = $registro["ciudad"];
		$ciudad_pais = $registro["pais"];
		
		echo "<p> La ciudad es $ciudad_nombre y pertenece al pais de $ciudad_pais </p>";
		
		// Recorrer en bucle "fetch_array"
		
		echo "<h2> Recorriendo en bucle fetch_array </h2>"; 
		
		// Primero reinicamos el puntero: 
		
		$consulta->data_seek(0);
		$registro = $consulta -> fetch_array();
		
		while ($registro != null) {
			
			$ciudad_nombre = $registro["ciudad"];
			$ciudad_pais = $registro["pais"];
			
			echo "<p> La ciudad es $ciudad_nombre y pertenece al pais de $ciudad_pais </p>";
			$registro = $consulta -> fetch_array();
			
		}
		
		// fetch_array puede convertirse en un array únicamente asociativo - tal como funcionaría fetch_assoc - mediante el parámetro MYSQLI_ASSOC 
		// $registro = $consulta -> fetch_array (MYSQLI_ASSOC); 
		// O en uno solamente numérico, con
		// $consulta -> fetch_array (MYSQLI_NUM); 
		// De modo que puede hacerse lo siguiente: 
		
		echo "<h2> fetch_assoc(MYSQLI_NUM) usando solo números </h2>";
		
		$consulta->data_seek(0); // Reinicio del puntero. 
		$registro = $consulta -> fetch_array (MYSQLI_NUM);
		
		echo "<p> La ciudad con la id ".$registro[0]." es ".$registro[1]."</p>";
		
		// Cerrar la consulta para liberar recursos. 
		
		$consulta -> close ();  
		
		// CONSULTAS PREPARADAS 
		// -> Una consulta preparada es una función parametrizada que podemos ir haciendo recurrentemente en el código. 
		
		// El objeto para las consultas preparadas es mysqli_stmt y se crea mediante stmt_init
		
		$consulta_preparada = $conexion -> stmt_init(); 
		
		// Luego cargamos la consulta preparada 
		// -> la consulta preparada debe tener PARÁMETROS CONCRETOS o si no, no funcionará
		// los parámetros se representan en el cuerpo de la consulta con "?", uno por cada parámetro deseado 
		
		$consulta_preparada -> prepare ('INSERT INTO ciudades (ciudad, pais, habitantes, superficie, tieneMetro) VALUES (?,?,?,?,?)');
		
		// Crear variables - es necesario porque las consultas preparadas solo funcionan con variables. 
		// RECOMENDABLE : USAR DESCRIBE (tabla) desde MYSQL para ASEGURARSE DE QUE LA INTRODUCCIÓN DE LAS VARIABLES ES CORRECTA. 
		// tinyint NO ES boolean, y  debe introducirse como int. 
		
		$ciudad_nombre = "Alemania"; // tipo string "s"
		$ciudad_pais = "Berlín"; // tipo string "s" 
		$ciudad_habitantes =1200; // tipo int "i"
		$ciudad_superficie = 12.1; // tipo double "d"
		$ciudad_metro = false; // tipo int "i"
		
		// Depositar las variables en la función bind_param 
		
		$consulta_preparada -> bind_param ('ssidi', $ciudad_nombre, $ciudad_pais, $ciudad_habitantes, $ciudad_superficie, $ciudad_metro); 
		
		// Ejecutar consulta "executa" que se usa en un if para verificar los errore.s. 	
		
		if ($consulta_preparada->execute()) {
			echo "<p> Ejecución correcta </p>"; 
		} else {
			// Ocurrió un error durante la ejecución de la consulta
			echo "<p> Error: " . $consulta_preparada->error . "</p>";
		}
		
		// Cerramos la consulta para liberar memoria
		
		$consulta_preparada -> close();
		
		// Cerramos la conexión para liberar memoria 
		
		$conexion -> close (); 
		
		
		
		


	
		
		
		
		
		
		
		
	
		
		
		
		
		
		
		
		
		
			
			
						
					
		?>
		
	</body>

	


</html>
