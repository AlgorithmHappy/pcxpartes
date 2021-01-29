<?php
  session_start();
  require_once('backend/conexionBD.php');
  $bd = BaseDatos::getInstance();

  $sql = "select * from contacto where correo = '{$_SESSION['usuario']}';";

  $tblaContacto = $bd->consultar($sql);
  $correoTelefono = $tblaContacto->fetch_row();
?>
<html>
<head>
  <title>Thanks for your order!</title>
  <link rel="stylesheet" href="css/estilosGenerales.css">
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
    <h1>Su pago se realizo con exito<h1>
    <p>
      Estos son los detalles de su combra:
      <ul>
      <?php
        $compatible = $_SESSION['componentes']['tipo_pc'];
        $contenidoVariable = '';
        if($compatible == 'si'){
          foreach($_SESSION['componentes'] as $clave => $valor){
            if($clave != 'tipo_pc' and !empty($valor)){
              $contenidoVariable .= '<li>' . $clave . $valor .'</li>';
            }
          }
        } else {
          $auxiliar = '<li>' . "Asesoria al numero: $correoTelefono[1]" . '</li>';
          $contenidoVariable .= $auxiliar;

          $auxiliar = '<li>'. "Asesoria al correo: $correoTelefono[0]" . '</li>';
          $contenidoVariable .= $auxiliar;
        }
        echo($contenidoVariable);
        $mensaje = <<<EOT
            <!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
            </head>
            <body">
                <img src="https://i.ibb.co/TYmmkDf/pc-Xpartes-logo.png" alt="Logo de pcXpartes">
                <h1>Gracias por realizar tu compra</h1>
                <br>
                <h2>La información de la compra es:</h2>
                <ul>
                  $contenidoVariable
                <ul>
                <h3>Para cualquier aclaracion puedes contactarme</h3>
                <ul>
                    <li>Mi whatsapp es: 55-11-22-33-44</li>
                    <li>Mi correo es: lui@midominio.com</li>
                </ul>
                <h3>Mis redes sociales son:<h3>
                <a href="https://www.instagram.com/pcxpartes/"><img src="https://image.flaticon.com/icons/png/512/87/87390.png" alt="Instagram" style="width:50px"></a>
                <a href="https://www.facebook.com/PcXpartes-104831318175803"><img src="https://st4.depositphotos.com/5225467/23097/v/600/depositphotos_230976772-stock-illustration-facebook-logo-vector-editorial.jpg" alt="Facebook" style="width:80px"></a>
                <a href="https://twitter.com/PXpartes"><img src="https://image.flaticon.com/icons/png/512/23/23681.png" alt="Instagram" style="width:50px"></a>
                <h3>Sobre tus datos</h3>
                <p>Tus datos seran usados solo para cuando quieras agendar tu cita con nosotros</p>
            </body>
            </html>
            EOT;
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        mail($correoTelefono[0], 'PcXpartes, ¡Compra realizada!', $mensaje, $headers);
      ?>
      </ul>
    </p>    
  </section>
</body>
</html>