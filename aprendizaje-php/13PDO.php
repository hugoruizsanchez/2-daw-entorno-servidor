<html> 
	
	<body>
		
		<h1> Conexiones a cualquier base de datos usando PDO </h1>
		
		<?php 
		
			// PDO facilita la conexión a cualquier tipo de base de datos, incluido MYSQL, su unico problema es que su gran compatibilidad implica falta de rendimiento
			
			// Info. de nuestra base de datos local. 
			
			$servername = "localhost";
			$username = "hugo";
			$password = "12345678";
			$database = "php_prueba";
			
			// Ajustes para permitir caracteres UTF-8
			// -> Crea un array asociativo con clave valor con algunos ajustes de config
			
			$opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
			
			// Creación de una conexión PDO 
			// -> la creación del objeto necesita de un DSN (separada entre ";" con distintos parámetros (otros parametros del dsn son "port" y "unix_socket")
			// -> .. y del nombre de usuario y la contraseña. 
			// -> ... y de las opciones, si las hemos configurado. 
			
			$conexion = new PDO("mysql:host=$servername;dbname=$database", $username, $password, $opciones);
			
			// Verificar la configuracion 
			
			$version = $conexion ->getAttribute(PDO::ATTR_SERVER_VERSION); 
	
			echo "<p> $version </p>";
			
			// Instalar manejador de errores. 
			
			// PDO::ERRMODE_SILENT -> No hace nada cuando ocurre un error, es lo que pasa por defecto. 
			
			// PDO::ERRMODE_WARNING -> Lanza un error E_WARNING
			
			// PDO::ERRMODE_EXCEPTION -> Usa el manejador PDOException
			
			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			/**
			 * try {} catch (PDOException $p) { $p->getMessage() }
			 * */
			
			// REALIZACIÓN DE CONSULTAS		
			// CONSULTAS DE ACCIÓN -> UPDATE, DELETE, INSERT, cuyo resultado será el número de filas afectadas. 
			
			echo "<h2> Consultas monolineales: UPDATE, DELETE, INSERT</h2>";

			$noRegistrosAfectados = $conexion -> exec ('DELETE from ciudades where ciudad="Alemania"'); 
			
			echo "<p> Los registros introducidos/afectados son: $noRegistrosAfectados </p>"; 
			
			// CONSULTAS MULTILINEA "query" 
			
			echo "<h2> Consultas multilínea</h2>";

			// La variable "$consulta" es un objeto de la clase PDOStament, con sus métodos para procesar los datos
			// -> método fetch
			
			$consulta = $conexion -> query ("SELECT * from ciudades");
			
			while ($registro = $consulta -> fetch()) { // Devuelve las filas y un "false" si no quedan más
				echo '<table border="1" width="50%">';
				echo "<tr>";
				echo "<td>" ;
				echo $registro["ciudad"]; 
				echo "</td> <td>";
				echo $registro["pais"]; 
				echo "</td> <td>";
				echo $registro ["habitantes"]; 
				echo "</td> <td>";
				echo $registro ["superficie"]; 
				echo "</td> <td>";
				echo $registro ["tieneMetro"];
				echo "</td> </tr>";
				echo '</table>';
			}
			
			// Se puede ajustar mediante parámetro con 
			// -> PDO::FETCH_ASSOC (un solo array asociativo)
			// -> PDO::FETCH_NUM. (solo claves numéricas)
			// -> PDO::FETCH_BOTH (por defecto)
			// -> PDO::FETCH_OBJ (devuelve los registros en forma de objeto con cada propiedad) 
			// -> PDO::FETCH_LAZY (Devuelve tanto objetos como asociativo y numerico) 
			// -> PDO::FETCH_BOUND  $registro->bindColumn(1, $ciudad); (carga en la variable $ciudad lo correspondiente al registro 1 de la fila situada en el cursor.
			
			// PROBANDO EL PDO FETCH OBJ
			
			echo "<h2> Método fetch con el parámetro PDO::FETCH_OBJ </h2>"; 
	
			// Primeramente debe cambiarse el cursor al principio, pues continuamos desde el ultimo registro impreso. 
			
			$consulta = $conexion -> query ("SELECT * from ciudades");

			// Elegimos el método fetch de objetos 
			$registro = $consulta -> fetch(PDO::FETCH_OBJ); 
			
			echo "<p> La primera ciudad es ". $registro->ciudad." </p>";
			
			// -> también se puede iterar. 
			
			// TRANSACCIONES
			
			// Como en mysql, las consultas tienen un autocommit, por lo que la realización de las transacciones debe estar enmarcada en:
			
			// $conexion -> beginTransaction(); 
			// . . . Cuerpo de la transacción . . . 
			// $conexion -> commit (); 
			// dwes -> rollback (); // Y revertir
			// Esto es sumamente útil entre ifs, de modo que la ejecución de ciertas lineas esta condicionada y si algo sale mal, hacer el rollback 
			
			// CONSULTAS PREPARADAS
			// -> Si no se ejecuta , esto es debido a que se ha introducido mal una variable, pues mySQL no la puede soportar. 
			
			// Preparación de consulta
			
			$consulta = $conexion -> prepare ('INSERT INTO ciudades (ciudad, pais, habitantes, superficie, tieneMetro) VALUES (?,?,?,?,?)'); 
			// -> otra forma es, en vez de usar "?", usando identificadores empezados en ":", como 
			// INSERT INTO INSERT INTO ciudades (ciudad, pais) VALUES (:nombre_ciudad, :nombre_pais); 
			
			// Introducir datos.
			
			$ciudad_nombre = "Moscú"; 
			$ciudad_pais = "Rusia";  
			$ciudad_habitantes =1200; 
			$ciudad_superficie = 12.1; 
			$ciudad_metro = 0; 
			
			// Cargar datos
			
			$consulta-> bindParam (1, $ciudad_nombre); 
			$consulta-> bindParam (2, $ciudad_pais); 
			$consulta-> bindParam (3, $ciudad_habitantes); 
			$consulta-> bindParam (4, $ciudad_superficie); 
			$consulta-> bindParam (5, $ciudad_metro); 
			
			// Ejecución
			
			$consulta-> execute(); 
			
			// -> Si se ha usado el método de los ":", podemos usar un array asociativo para cargar los parametros:
			// $parametros = array (":nombre_ciudad" => "Madrid", ":nombre_pais" => "España"). Y luego se carga $consulta -> execute ($parametros)
			// O bien directamente con un bindParam: $consulta->bindParam(":nombre_pais", $ciudad_nombre);
			

			
		
		?>
		
		
	</body>

	


</html>
