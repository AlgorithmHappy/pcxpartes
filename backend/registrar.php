<?php if ($_POST['correo'] == $_POST['correo_verificado']): ?>
    <?php
        require_once('conexionBD.php');
        $bd = BaseDatos::getInstance();
        $tblaUsuarios = array($_POST['correo'], hash('sha256', $_POST['password'], false));
        $tblaNombre = array($_POST['correo']);
        $tblaNombre = array_merge($tblaNombre, explode(' ', $_POST['nombres']), explode(' ', $_POST['apellidos']));
        $tblaContacto = array($_POST['correo'], $_POST['celular']);
        $tblaDomicilio = array($_POST['correo']);
        if($_POST['ciudad'] == 'cdmx'){
            array_push($tblaDomicilio, 'Ciudad de México', $_POST['delegaciones'], $_POST['codigo_postal_cdmx'], $_POST['colonia_cdmx']);
        } else {
            array_push($tblaDomicilio, 'Estado de México', 'Nezahualcóyotl', $_POST['codigo_postal_neza'], $_POST['colonia_neza']);
        }
        array_push($tblaDomicilio, $_POST['calle'], $_POST['numero'], $_POST['interior'], $_POST['descripcion']);
        
        $verificacion = array();

        $verificacion[0] = $bd->insertar("INSERT INTO usuarios (correo, password) VALUES ('$tblaUsuarios[0]', '$tblaUsuarios[1]');");

        $verificacion[1] = $bd->insertar("INSERT INTO contacto (correo, num_telefono) VALUES ('$tblaContacto[0]', '$tblaContacto[1]');");

        $auxSQLTblaNombre = '';

        if(count($tblaNombre) <= 3){
            $auxSQLTblaNombre = "INSERT INTO nombre (correo, nombre_prim, apellido_pa) VALUES ('$tblaNombre[0]', '$tblaNombre[1]', '$tblaNombre[2]');";
        }
        elseif(count($tblaNombre) <= 4){
            $auxSQLTblaNombre = "INSERT INTO nombre (correo, nombre_prim, apellido_pa, apellido_ma) VALUES ('$tblaNombre[0]', '$tblaNombre[1]', '$tblaNombre[2]', '$tblaNombre[3]');";
        } else{
            $auxSQLTblaNombre = "INSERT INTO nombre (correo, nombre_prim, nombre_sec, apellido_pa, apellido_ma) VALUES ('$tblaNombre[0]', '$tblaNombre[1]', '$tblaNombre[2]', '$tblaNombre[3]', '$tblaNombre[4]');";
        }

        $verificacion[2] = $bd->insertar($auxSQLTblaNombre);

        $auxSQLTblaDomicilio = '';

        if(empty($tblaDomicilio[7])){
            $auxSQLTblaDomicilio = "INSERT INTO domicilio (correo, estado, delegacion, codigo_postal, colonia, calle, numero, descripcion) VALUES ('$tblaDomicilio[0]', '$tblaDomicilio[1]', '$tblaDomicilio[2]', $tblaDomicilio[3], '$tblaDomicilio[4]', '$tblaDomicilio[5]', $tblaDomicilio[6], '$tblaDomicilio[8]');";
        } else{
            $auxSQLTblaDomicilio = "INSERT INTO domicilio (correo, estado, delegacion, codigo_postal, colonia, calle, numero, interior, descripcion) VALUES ('$tblaDomicilio[0]', '$tblaDomicilio[1]', '$tblaDomicilio[2]', $tblaDomicilio[3], '$tblaDomicilio[4]', '$tblaDomicilio[5]', $tblaDomicilio[6], $tblaDomicilio[7], '$tblaDomicilio[8]');";
        }

        $verificacion[3] = $bd->insertar($auxSQLTblaDomicilio);

        if($verificacion[0] and $verificacion[1] and $verificacion[2] and $verificacion[3]){
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
            $nombreCompletoAux = '';
            if(count($tblaNombre) <= 3){
                $nombreCompletoAux = $tblaNombre[1] . ' ' . $tblaNombre[2];
            }
            elseif(count($tblaNombre) <= 4){
                $nombreCompletoAux = $tblaNombre[1] . ' ' . $tblaNombre[2] . ' ' . $tblaNombre[3];
            } else{
                $nombreCompletoAux = $tblaNombre[1] . ' ' . $tblaNombre[2] . ' ' . $tblaNombre[3] . ' ' . $tblaNombre[4];
            }
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
                <h1>Bienvenido a pcXpartes</h1>
                <p>Gracias por preferirnos</p>
                <h2>La información del registro:</h2>
                <ul>
                    <li>Tu correo es: $tblaUsuarios[0]</li>
                    <li>Tu contraseña es: {$_POST['password']}</li>
                    <li>Tu nombre completo es: $nombreCompletoAux</li>
                    <li>Tu domicilio es: $tblaDomicilio[1], $tblaDomicilio[2], $tblaDomicilio[3], $tblaDomicilio[4], $tblaDomicilio[5], $tblaDomicilio[6], $tblaDomicilio[7], $tblaDomicilio[8]</li>
                    <li>Tu celular es: $tblaContacto[1]</li>
                <ul>
                <h3>Para cualquier aclaracion puedes contactarme</h3>
                <ul>
                    <li>Mi whatsapp es: 55-11-22-33-44</li>
                    <li>Mi correo es: luis@midominio.com</li>
                </ul>
                <h3>Mis redes sociales son:<h3>
                <a href="https://www.instagram.com/pcxpartes/"><img src="https://image.flaticon.com/icons/png/512/87/87390.png" alt="Instagram" style="width:50px"></a>
                <a href="https://www.facebook.com/PcXpartes-104831318175803"><img src="https://st4.depositphotos.com/5225467/23097/v/600/depositphotos_230976772-stock-illustration-facebook-logo-vector-editorial.jpg" alt="Facebook" style="width:80px"></a>
                <a href="https://twitter.com/PXpartes"><img src="https://image.flaticon.com/icons/png/512/23/23681.png" alt="Instagram" style="width:50px"></a>
                <h4>Asesorias</h4>
                <p>Puedes pedir asesoria en cualquiera de mis contactos para elegir las piezas adecuadas para tu pc siempre y cuando ya hayas agendado una cita</p>
                <h5>Sobre tus datos</h5>
                <p>Tus datos seran usados solo para cuando quieras agendar tu cita con nosotros</p>
            </body>
            </html>
            EOT;
            if(mail($tblaUsuarios[0], 'PcXpartes, ¡Bienvenido!', $mensaje, $headers)){
    ?>
                <!--$htmlVista = <<<EOT-->
                <!DOCTYPE html>
                <html lang="es">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <meta http-equiv="X-UA-Compatible" content="ie=edge">
                    <link rel="stylesheet" href="../css/estilosGenerales.css">
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
                                    <?php if(isset($_SESSION['usuario'])): ?>
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
                            <h1>¡Felicitaciones!</h1>
                            <p>Tu usuario ha sido creado, gracias por preferirnos, revisa tu e-mail con la informacion que ingresaste, recuerda que esta información es la que usaremos para cuando quieras agendar una cita con nosotros. Puedes iniciar sesión en la siguiente liga: <a href="../index.php#login">Login.</a> O si lo prefieres puedes navegar a travez del menu inferior derecho.</p>
                        </section>
                    </body>
                </html>
                <!--EOT;
                echo($htmlVista);-->
    <?php
            } else{
    ?>
                <!--$htmlVista = <<<EOT-->
    
                <!DOCTYPE html>
                <html lang="es">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <meta http-equiv="X-UA-Compatible" content="ie=edge">
                    <link rel="stylesheet" href="../css/estilosGenerales.css">
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
                            <h1>Ha ocurrido un error</h1>
                            <p>Verifique los campos referentes al domicilio, el problema podria estar ahi, verifique que su correo sea el correcto. <a href="../registro.php">Volver al registro.</a></p>
                        </section>
                    </body>
                </html>
                <!--EOT;
                echo($htmlVista);-->
    <?php
            }
        }
    ?>
<?php else: ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/estilosGenerales.css">
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
        <h1>Ha ocurrido un error</h1>
        <p>Verifique los campos referentes al correo electronico, el problema podria estar ahi. <a href="../registro.php">Volver al registro.</a>
        </p>
    </section>
</body>
</html>
<?php endif ?>

    
    
