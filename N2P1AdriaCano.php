
<?php
	session_start();
	
	if (!isset($_SESSION['logged']))
		$_SESSION['logged'] = false;

	if ($_SESSION['logged']) {		
		header('Location: ./principal.php');
		exit();
	}
		
	if (isset($_POST['username']) && isset($_POST['recover']) && ($_POST['recover'] == 1))
	{
		$_SESSION['recovering'] = 1;
	}
	
	if (isset($_POST['username']) && isset($_POST['userpassword']))
	{
		if ($_POST['username'] == 'admin' && $_POST['userpassword'] == '1234') 
		{			
			/* Simulamos que leemos de base de datos los datos del usuario */
			
			$_SESSION['name'] = 'Adrià';
			$_SESSION['surname'] = 'Cano Quintana';
			
			$_SESSION['logged'] = true;
		}
		else {
			$_SESSION['logged'] = false;
		}
		
		header('Location: ./N2P1AdriaCano.php');
	}
?>

<html>
	<head>
		<title> Transparent Login Form Design </title>
		<link rel="stylesheet" type="text/css" href="style.css">   
	</head>
	<body>		
		<div class="login-box">
			<img src="avatar.png" class="avatar" alt="avatar">
			<h1>Iniciar sesion</h1>
			
			<form action="./N2P1AdriaCano.php" method="post" id="loginform">
				<p>Usuario</p>
				<input type="text" name="username" placeholder="Usuario">
				<p>Contraseña</p>
				<input type="password" name="userpassword" placeholder="Contraseña">								
				<input type="submit" value="login">
				
				<input hidden type="number" name="recover" value="0" />							

				<?php 
					if (isset($_SESSION['recovering']) && $_SESSION['recovering'] == 1) {
						echo '<p>Solicitud de recuperación de clave enviada</p>';						
					}
					else {
						echo '<a href="javascript:document.getElementsByName(' . "'recover'" . ')[0].value = 1; loginform.submit();">Recuperar Clave</a>';
					}
				?>				
				
			</form>               
		</div>    
	</body>
</html>
