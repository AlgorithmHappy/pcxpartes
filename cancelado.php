<html>
<head>
  <title>Pago cancelado</title>
  <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Krona+One&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/estilosGenerales.css?v=<?php echo(rand()); ?>" />
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
					<a id="salir" style="font-size: 2.7vh; position: relative; z-index: 150" href="backend/logout.php">Salir</a>
				<?php else: ?>
					<a id="salir" style="font-size: 2.7vh; position: relative; z-index: 150" href="index.php#login">Entrar</a>
				<?php endif ?>
				<img src="media/images/user.png" alt="Usuario" srcset="" style="float: right"/>
			</div>
			
			<nav class="menu-content">
				<ul>
					<!--Opciones del menu-->
				
					<li><a href="index.php#about_mine">Página principal</a></li>
					
					<li><a href="index.php#assemble_your_pc">Agendar cita</a></li>
					
					<li><a href="index.php#kits">Paquetes de hardware preestablecidos</a></li>
					
					<li><a href="index.php#tienda_hardware">Tienda de hardware</a></li>
					
					<li><a href="index.php#visita_blog">Blog</a></li>
					
					<li><a href="index.php#armador_pc">Compatibilidad de componentes</a></li>
					
					<!--Esto cambia con php dependiendo si no hay sesion iniciada-->
					<li><a href="index.php#login">Iniciar sesión</a></li>

					<li><a href="index.php#redes_sociales">Redes sociales</a></li>
				</ul>
			</nav>
		</div>
	</div>
	<!-----------------------------
		FIN MENU
	------------------------------>

  <section class="text-content" style="margin-top: 10vh; height: auto;">
    <p>Ha ocurrido un fallo, se cancelo el pago</p>
  </section>
</body>
</html>