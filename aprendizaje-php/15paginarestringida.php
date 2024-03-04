<!-- GUÍA ESCRITA EN MARKDOWN. Leer con un markdown reader para mayor legibilidad.

# RESTRICCIONES EN APACHE CON .HTACCESS

## ¿Qué es? 

El control de usuarios se hace a nivel externo, es decir, desde el navegador hasta el servidor. El protocolo HTTP garantiza un medio de conexión seguro entre el servidor y cliente, para que solo los usuarios autorizados desde el 
servidor tengan acceso Para eso se usa el certificado digital de usuario - como el  que se usa en las webs publicas - o claves y contraseñas 

## Cómo configurar HTACCESS desde Apache
### Crear usuario y contraseña. 


httpasswd es la utilidad para crear usuarios con:

```
sudo htpasswd -c users hugo
```
Esto debería generar un fichero de contraseñas .htpasswd en /etc/apache2. En el caso de que no se generase el usuario, debe ejecutarse este comando en su lugar.

```
sudo htpasswd -c /etc/apache2/.htpasswd hugo 
````

El comando preguntará una contraseña, que deberá ingresarse dos veces. Es la contraseña empleada para autenticar. 

**IMPORTANTE**: Al fichero .htpasswd deben asociarse todos los permisos (777), de lo contrario el sistema  no podrá acceder a él. 

### Configuración del archivo .htaccess. 

EL ARCHIVO HTACCESS: un archivo que debe adjuntarse en cada ubicacion que deseemos restringir o configurar. 

#### Modificar apache2.conf


Para poder crearlo - y que funcione - es necesario cambiar el apache2.conf y luego reiniciar el servicio de apache. Para ello debemos acceder al fichero apache2.conf desde nuestro editor de texto favorito: 

````
sudo nano /etc/apache2/apache2.conf
````

Concretamente, la línea *<Directory /var/www>* debe estar puesta así:


````
<Directory /var/www/>
Options Indexes FollowSymLinks
AllowOverride All
Require all granted
</Directory>
````

**IMPORTANTE**: Hay muchas entradas *<Directory / >* pero solo un *<Directory /var/www>*, debe ser ESE CONCRETAMENTE el que modifiquemos y no otro.

#### Insertar fichero .htaccesss en el directorio que queramos restringir. 

Luego creamos el fichero .htaccess en la parte que deseemos 
restringir, con la siguiente información: 
 
````
AuthType Basic
AuthName "Restricted Content"
AuthUserFile /etc/apache2/.htpasswd
Require valid-user
````

**IMPORTANTE**: Debemos asociarle todos los permisos (777) y reiniciamos el apache. 


--> 



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página restringida </title>
</head>


<body>
	
	<?php 
		
		
		// Puedes NO usar el .htaccess empleando simplemente estas líneas al principio del archivo: 
		// -> Aunque es recomendable usarlo, sobre todo cuando los documentos son html 
		
		if (!isset($_SERVER['PHP_AUTH_USER'])) {
			header('WWW-Authenticate: Basic Realm="Contenido restringido"');  
			// WWW-Authenticate: Basic Realm="" permite lanzar un mensaje concreto para la restricción. 
			header('HTTP/1.0 401 Unauthorized');
			echo "¡Usuario no reconocido!";
			exit;
		}
		
		
		// Comprobar si el usuario es el que deseamos
		
		if ($_SERVER["PHP_AUTH_USER"]!="hugo") {
			header('WWW-Authenticate: Basic Realm="Usuario NO reconocido"');
			header('HTTP/1.0 401 Unauthorized');
			echo "<p> Usuario no autorizado: ".$_SERVER["PHP_AUTH_USER"].". </p>";
			exit; 
		}
		
		// Acceso a la información de acceso desde PHP
				
		
		echo "<p> Nombre de usuario: ".$_SERVER["PHP_AUTH_USER"]."</p>";
		echo "<p> Contraseña: ".$_SERVER["PHP_AUTH_PW"]."</p>";
		echo "<p> Método de autentificación: ".$_SERVER["AUTH_TYPE"]."</p>";
		
		// Una vez se ha iniciado sesión desde una página con el .htaccess, estas variables de sesión no permanecen en otras páginas. 
		
		
		
		
	?>
	
	
	
	
</body>

</html>
