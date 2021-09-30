
<?php
	session_start();
	
	if (!isset($_SESSION['logged']) || $_SESSION['logged'] == false)
		header('Location: ./N2P1AdriaCano.php');
?>

<html>
	<head>
		<title> Mi web </title>
		<link rel="stylesheet" type="text/css" href="style.css">   
	</head>
	<body>
		<p>Hola <?php echo $_SESSION['name'] . ' ' . $_SESSION['surname'] ?>, <br />
			Encantado de verte aquí otra vez
		</p>		
		
		<p>Hora actual del servidor: <?php echo date(DATE_RFC2822); ?>.</p>
		
		<?php
			 if (isset($_GET['area']))
			 {
				 setcookie('lastaction', $_GET['area'], 0);				 
				 switch ($_GET['area'])					 
				 {
					 case 'compras':
						echo '<p>Te encuentras en compras</p>';											
						break;
					 case 'catalogo':
						echo '<p>Te encuentras en el catálogo de productos</p>';												
						break;		
					 default:
						echo '<p>Error 404, la página no existe</p>';
						break;
				 }
				 
				 echo '<br />';
				 echo '<a href="./principal.php">Volver a la página principal</a><br />';
			 }
			 else
			 {
				 /* Gracias a la cookie "lastaction", recordamos la última página que visitó el usuario y ¡le permitimos reanudar la visita por dónde lo dejó! */
				 
				 echo '<p>Estás en la página principal</p><br />';
				 
				 if (isset($_COOKIE['lastaction'])) {
					echo '<a href="/principal.php?area=' . urlencode($_COOKIE['lastaction']) . '">Haz clic aquí para visitar la última página que visitase en la web</a><br />';
				 }
				 
				 /* Si la palabra fuera por ejemplo un nombre de artículo, urlencode() sanearía espacios y caracteres extraños para pasarlos correctamente por GET. */
				 
				 echo '<a href="./principal.php?area=' . urlencode('compras') . '">Compras</a><br />';
				 echo '<a href="./principal.php?area=' . urlencode('catalogo') . '">Catalogo</a><br />';
			 }
		?>
		</p>		
	</body>
</html>