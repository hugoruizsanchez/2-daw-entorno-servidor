<?php 

/**
 * Este archivo facilita el inicio de sesión para acceder a una determinada base de datos, facilitando la introducción de base de datos, servidor, usuario y contraseña sin la necesidad de modificar el código 
 **/
 
// VALORES POR DEFECTO 

$default_bd_servername = "localhost"; 
$default_bd_database ="dwes"; 
$pagina_redireccion= "https://google.es"; 

?>

<html> 

	<head> 
	
		<title> Orientado a objetos PHP </title>
	
	</head>
	
	<body>

		<h1> Programación orientada a objetos en PHP </h1> 
		
		<?php 

			function enDocumento ($texto="false", $etiqueta="p") {
				echo "<".$etiqueta.">".$texto."</".$etiqueta.">";
			}

			// Creación de clases. 

			enDocumento ("Clase sin constructor","h2");

			////////////////////////
			// Clase sin constructor. 
			/////////////////////////

			class Producto {
				// ATRIBUTOS 
				private $codigo; // Modificador de acceso "privado" (Solo puede ser accedido mediante los atributos de la clase)
				public $nombre; // Modificador de acceso "público" 

				// Antiguamente se usaba "var" para definir el modificador de acceso "público"
				public $PVP; 

				// MÉTODOS 
				
				// Función que muestra la info de los productos 
				// Note que el "->" sirve para acceder a los productos. El "this" apela a la propio atributo de la clase.
				public function mostrarInfo () {
					enDocumento ("Producto $this->nombre , con etiqueta $this->codigo  y precio $this->PVP "); 
				}

				public function setCodigo ($codigo) {
					if (!$this->codigo) { // Si no existe código.
						$this->codigo = $codigo; // Se asigna. 
					}
				}

				public function getCodigo () {
					return $this->codigo;
				}
			}

			// Crear una variable en base a la clase "PRODUCTO". 

			$miProducto = new Producto (); 

			// Asignar valores a la variable $miProducto 

			$miProducto->nombre = "Lasaña en lata"; 
			$miProducto->PVP= "12,4"; 
			// $miProducto->codigo="12,99" // Esta línea generaría un error, debido a que el codigo es "private".  -
			$miProducto->setCodigo ("728920Z"); // Debe emplearse el método set 
			
			// Mostrar información

			$miProducto->mostrarInfo(); 
			enDocumento ("El código del producto es ". $miProducto->getCodigo());

			//////////////////////////////////////////
			// Clase con métodos __set y __get mágicos 
			// Esto permite implementar dinámicamente propiedades a un objeto
			// Todo se hace mediante un array asociativo (que guarda las propiedades)
			// y los métodos get y set mágicos, llamados así porque su funcionamiento sería
			// para crear nuevas propiedades (atributos) a un objetp
			//////////////////////////////////////////

			enDocumento ("Métodos mágicos __set y __get","h2");
			class Inventario {
				private $materiales = array (); // Array asociativo donde se guardará toda la información de los atributos

				// Función interna (no visible ni ejecutable directamente) set, que entrelaza el array asociativo con la asignación de atributos "->" . 
				public function __set ($propiedad, $valor) {
					$this->materiales[$propiedad] = $valor;
				}

				// Función interna (no visible ni ejecutable directamente) get, que entrelaza el array asociativo con la asignación de atributos "->" .- 
				public function __get ($propiedad) {
					if (array_key_exists ($propiedad, $this->materiales)) { // Si la propiedad solicitada existe
						return $this->materiales[$propiedad]; 
					}
					else {
						enDocumento ("Error: ¡No encontrado el objeto!");
					}
				}

			}

			$minecraftInventario = new Inventario ();

			// Creamos la propiedad "mineral" al objeto
		
			$minecraftInventario->mineral="Hierro"; 
			enDocumento ($minecraftInventario->mineral);

			// Pero la propiedad "herramienta" no existe. 

			enDocumento ($minecraftInventario->herramienta);
			
			//////////////////////////////////////////
			// Los atributos estáticos en las clases de PHP se mantienen sincronizados en 
			// todas las instancias.
			// Acceder a ellos y declararlos es diferente a los atributos normales. 
			// Por otro lado, las funciones estáticas pueden accederse sin instanciar la clase
			// aunque tambien puede hacerse instanciandola.
			//////////////////////////////////////////

			enDocumento ("Atributos estáticos","h2");
			
			class Stock {

				// ATRIBUTOS

				private static $nombreAlmacen; 
				public static $num_productos =0; 

				// MÉTODOS 
				public static function anadirProducto () {
					self::$num_productos++; 
				}

				// GET Y SET de atributos estáticos
				public static function setNombreAlmacen ($nombre) {
					self::$nombreAlmacen= $nombre; 
				}
				public static function getNombreAlmacen() {
					return self::$nombreAlmacen; 
				}
			}

			$lataAlubias = new Stock (); 
			Stock::anadirProducto(); // ++1 a la propiedad estática num_productos para todas las clases de Stock

			$bolsaEspinacas = new Stock ();
			$bolsaEspinacas->anadirProducto (); // ++1 a la propiedad estática num_productos para todas las clases de Stock

			// Si cogemos cualquier objeto y comprobamos num_productos arrojará un 2

			enDocumento ($lataAlubias::$num_productos); // Llamar al atributo de numero de productos a traves del objeto de lataALubias
			enDocumento (Stock::$num_productos) ;

			// Acceder a los atributos estáticos privados. 

			Stock::setNombreAlmacen("Almacen PACO:SA");
			enDocumento (Stock::getNombreAlmacen());

			//////////////////////////////////////////
			// Método constructor  -> Al crear la clase, se le asignan las propiedade
			// definidas y se ejecuta un código determiando. 
			// Método destructor -> Ejecuta un determinado código al destruir un producto 
			//(por ejemplo, al pasarlo a null)
			//////////////////////////////////////////

			enDocumento ("Método constructor y destructor","h2");
			class Persona {

				// CONSTRUCTOR
				
				public function __construct($nombre, $apellido1, $apellido2, $dni) {
					$this->nombre = $nombre; 
					$this->apellido1 = $apellido1; 
					$this->apellido2 = $apellido2; 
					$this->dni = $dni;
					
					self::$numeroPersonas++;
				}

				// DESTRUCTOR 

				public function __destruct() {
					self::$numeroPersonas--; 
				}


				// ATRIBUTOS
				public $nombre; 
				public $apellido1;
				public $apellido2;
				private $dni;

				// ATRIBUTOS ESTÁTICOS 
				public static $numeroPersonas =0; 

				// Métodos 

				public function mostrarDatos () {
					enDocumento ("
					Nombre: $this->nombre 
					Apellidos: $this->apellido1 $this->apellido2
					DNI: $this->dni");
				}


			}

			// Llamar a la clase constructor 

			$usuario1 = new Persona ("Hugo", "Ruiz", "Sánchez","54829A"); 

			$usuario1->mostrarDatos();

			enDocumento (Persona::$numeroPersonas);

			// LLamar al destructor 

			$usuario1 = null; 

			enDocumento (Persona::$numeroPersonas); // 0 

			$usuario1 = new Persona ("Hugo", "Ruiz", "Sánchez","54829A"); 

			/*
			get_class                | Devuelve el nombre de la clase del objeto.
			class_exists             | Devuelve true si la clase está definida o false en caso contrario.
			get_declared_classes     | Devuelve un array con los nombres de las clases definidas.
			class_alias              | Crea un alias para una clase.
			get_class_methods        | Devuelve un array con los nombres de los métodos de una clase que son accesibles desde donde se hace la llamada.
			method_exists            | Devuelve true si existe el método en el objeto o la clase que se indica, o false en caso contrario, independientemente de si es accesible o no.
			get_class_vars           | Devuelve un array con los nombres de los atributos de una clase que son accesibles desde donde se hace la llamada.
			get_object_vars          | Devuelve un array con los nombres de los métodos de un objeto que son accesibles desde donde se hace la llamada.
			property_exists          | Devuelve true si existe el atributo en el objeto o la clase que se indica, o false en caso contrario, independientemente de si es accesible o no.
			*/

			//////////////////////////////////////////
			// Clonar un objeto (no vale simplemente con el "=", porque copiará todo, incluidas las referencias internas)
			//////////////////////////////////////////

			enDocumento ("Clonando un objeto", "h2");

			$usuario2 = clone($usuario1); 

			$usuario2 -> nombre; 

			enDocumento($usuario2-> nombre); 

			//////////////////////////////////////////
			// Guardar objetos en memoria para traspasarlos mediante _SESSION:
			// no se puede hacer sencillamente guardando los objetos en la sesion, antes es
			// necesario serializarlos
			//////////////////////////////////////////

			session_start(); 

			$_SESSION['usuario'] = $usuario1; // hace el método serializable() automaticamente 
			// Esto es fundamentalmente necesario cuando queremos ingresar los datos en un medio diferente a PHP; necesitamos serializarlos. 

			//////////////////////////////////////////
			// Interfaces
			// Clase vacía que solo contiene declaraciones de métodos. 
			// Se asemeja a un contrato: cuando una clase tiene un "implements" relacionando
			// una interfaz, esta debe contener OBLIGATORIAMENTE todos sus elementos. 
			//////////////////////////////////////////

			interface empleadoJefe {
				public function dirigir (); 
			}

			//////////////////////////////////////////
			// Herencia 
			//////////////////////////////////////////

			enDocumento ("Herencia de objetos", "h2");
			// Haremos la clase "empleado" que herede de la clase pèrsona
			// -> Los metodos privados no se heredarán, pero los protegidos sí. 
			// -> Los metodos public/private final son definitivos, no se pueden sobreescribir por las clases hijas
			// -> Lo contrario, los metodos public/private abstract solo sirven para  las subclases, no para las clases propiamente. 
			class Empleado extends Persona implements empleadoJefe {
				// CONSTUCTOR 
				public function __construct($nombre, $apellido1, $apellido2, $dni, $puesto, $departamento) {
					parent::__construct($nombre, $apellido1, $apellido2, $dni); 
					$this->puesto = $puesto; 
					$this->departamento = $departamento;
				}

				// ATRIBUTOS
				public $puesto; 
				public $departamento; 

				// MÉTODOS 
				public function mostrarDatos () {
					parent::mostrarDatos(); // Salida del metodo padre
					enDocumento ("
					Puesto: $this->puesto 
					Departamento: $this->departamento
					"); 
				}

				// MÉTODOS implementados 

				public function dirigir () {
					enDocumento ("El jefe $this->nombre dice: ¡Te estoy dirigiendo, gusano!");
				}

			}

			// Instanciar objeto 

			$usuario4 = new Empleado ("Alberto","Castillo","Salvaje","82738B","Secretario","Logística");

			// Llamar al método que combina heredado de la clase persona. 

			$usuario4 -> mostrarDatos();

			// LLamar a método definido en la interfaz 

			enDocumento($usuario4 -> dirigir());

			// Comprobar la clase  del objeto heredado

			enDocumento ($usuario4 instanceof Persona); // Persona y empleado arrojarian true

			// Saber la clase padre directamente 

			enDocumento (get_parent_class($usuario4));

			// Saber si es subclase de algo

			enDocumento (is_subclass_of($usuario4, 'Persona')); // Solo persona arrojaria true

			//////////////////////////////////////////
			// Clase abstracta 
			// Se diferencia de la interfaz en que puede contener atributos. 
			//////////////////////////////////////////

			abstract class Figura {
				// MÉTODOS ABSTRACTOS
				abstract public function calcularDiametro (); 
				// ATRIBUTOS ABSTRACTOS
				public function __construct($lados) {
					$this->lados = $lados; 
				}
				 
			}
			class Cuadrado extends Figura {
				public function calcularDiametro() {
					$salida =0; 
					for ($i=0; $i<count($this->lados); $i++) {
						$salida = $salida+$this->lados[$i]; 
					}
					return $salida; 
				}
			}

			$cuadrado0 = new Cuadrado ([43,34,21,23]); 

			enDocumento ($cuadrado0->calcularDiametro ());

            

			
			








			

























			
			
		
		?>
		
	</body>

</html>
