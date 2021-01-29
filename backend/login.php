<?php
    session_start();
    require_once('conexionBD.php');
    
    $usuario = $_POST['correo'];
    // Encriptamos contraseña
    $pass = hash('sha256', $_POST['password'], false);
    
    $consulta = "select * from usuarios where correo='$usuario' and password='$pass';";
    $conexion = BaseDatos::getInstance();
    $resultado = $conexion->consultar($consulta);

    $filas = $conexion->obtener_fila($resultado, 0);
    // Si no regresa nada significa que esta incorrecto el login
    if(isset($filas)){
        $_SESSION['usuario'] = $usuario;
        $consulta = "SELECT nombre.nombre_prim, usuarios.correo, contacto.num_telefono
        FROM usuarios INNER JOIN nombre ON usuarios.correo = nombre.correo inner join contacto on usuarios.correo = contacto.correo where usuarios.correo = '$usuario';";
        $resultado = $conexion->consultar($consulta);
        $filas = $conexion->obtener_fila($resultado, 0);
        
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Krona+One&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../css/estilosGenerales.css?v=<?php echo(rand()); ?>" />
</head>
<body>
    <!-----------------------------
		MENU
	------------------------------>
	<div id="menu-area">
		<input type="checkbox" id="menu-toggle"></input>

		<label for="menu-toggle" class="menu-open">
			<div class="open"></div>
		</label>

		<div class="menu menu-effects">
			<label for="menu-toggle"></label>
			
			<!--Esto cambia con php dependiendo si no hay sesion iniciada-->
			<div class="user">
				<?php if (isset($_SESSION['usuario'])): ?>
					<a id="salir" style="font-size: 2.7vh; position: relative; z-index: 150" href="logout.php">Salir</a>
				<?php else: ?>
					<a id="salir" style="font-size: 2.7vh; position: relative; z-index: 150" href="../index.php#login">Entrar</a>
				<?php endif ?>
				<img src="../media/images/user.png" alt="Usuario" srcset="" style="float: right"/>
			</div>
			
			<nav class="menu-content">
				<ul>
					<!--Opciones del menu-->
				
					<li><a href="../index.php#about_mine">Página principal</a></li>
					
					<li><a href="../index.php#assemble_your_pc">Agendar cita</a></li>
					
					<li><a href="../index.php#kits">Paquetes de hardware preestablecidos</a></li>
					
					<li><a href="../index.php#tienda_hardware">Tienda de hardware</a></li>
					
					<li><a href="../index.php#visita_blog">Blog</a></li>
					
					<li><a href="../index.php#armador_pc">Compatibilidad de componentes</a></li>
					
					<!--Esto cambia con php dependiendo si no hay sesion iniciada-->
					<li><a href="../index.php#login">Iniciar sesión</a></li>

					<li><a href="../index.php#redes_sociales">Redes sociales</a></li>
				</ul>
			</nav>
		</div>
	</div>
	<!-----------------------------
		FIN MENU
	------------------------------>
    
	<section class="text-content" style="margin-top: 10vh; height: auto;">
        <h1>Bienvenido <?=$filas[0]?></h1>
        <p style="text-align: center;">
            Tu sesión ha sido iniciada, ahora puedes agendar una cita con nosotros, tus datos de contacto son los siguientes:
            <ul style="font-size: 2.7vh">
                <li>Correo: <?=$filas[1]?></li>
                <li>Teléfono: <?=$filas[2]?></li>
            </ul>
        </p>
    </section>
</body>
</html>
<?php
        mysqli_free_result($resultado);
    } else{
        mysqli_free_result($resultado);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Krona+One&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../css/estilosGenerales.css?v=<?php echo(rand()); ?>" />
</head>
<body>
    <!-----------------------------
		MENU
	------------------------------>
	<div id="menu-area">
		<input type="checkbox" id="menu-toggle"></input>

		<label for="menu-toggle" class="menu-open">
			<div class="open"></div>
		</label>

		<div class="menu menu-effects">
			<label for="menu-toggle"></label>
			
			<!--Esto cambia con php dependiendo si no hay sesion iniciada-->
			<div class="user">
				<?php if (isset($_SESSION['usuario'])): ?>
					<a id="salir" style="font-size: 2.7vh; position: relative; z-index: 150" href="logout.php">Salir</a>
				<?php else: ?>
					<a id="salir" style="font-size: 2.7vh; position: relative; z-index: 150" href="../index.php#login">Entrar</a>
				<?php endif ?>
				<img src="../media/images/user.png" alt="Usuario" srcset="" style="float: right"/>
			</div>
			
			<nav class="menu-content">
				<ul>
					<!--Opciones del menu-->
				
					<li><a href="../index.php#about_mine">Página principal</a></li>
					
					<li><a href="../index.php#assemble_your_pc">Agendar cita</a></li>
					
					<li><a href="../index.php#kits">Paquetes de hardware preestablecidos</a></li>
					
					<li><a href="../index.php#tienda_hardware">Tienda de hardware</a></li>
					
					<li><a href="../index.php#visita_blog">Blog</a></li>
					
					<li><a href="../index.php#armador_pc">Compatibilidad de componentes</a></li>
					
					<!--Esto cambia con php dependiendo si no hay sesion iniciada-->
					<li><a href="../index.php#login">Iniciar sesión</a></li>

					<li><a href="../index.php#redes_sociales">Redes sociales</a></li>
				</ul>
			</nav>
		</div>
	</div>
	<!-----------------------------
		FIN MENU
	------------------------------>
	
    <section class="text-content" style="margin-top: 10vh; height: auto;">
        <h1>Lo sentimos</h1>
        <p style="text-align: center;">
            No se pudo iniciar sesion, verifique el usuario o la contraseña
        </p>
    </section>
</body>
</html>
<?php
    }
?>