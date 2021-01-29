<?php
    session_start(); 
    require_once('backend/conexionBD.php');
    $bd = BaseDatos::getInstance();
?>
<?php if (isset($_SESSION['usuario'])): ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://js.stripe.com/v3/"></script>
    <link rel="stylesheet" href="css/estilosGenerales.css?v=<?php echo(rand()); ?>">
    <style>
        input[type=text], input[type=email], input[type=number],
		button[type=submit], #nombre_piezas label{
            width: 90%;
			padding: 5px 10px 5px 10px;
			box-sizing: border-box;
			font-size: 3vh;
			margin: 2vh 0vh 2vh 0vh;
			border-radius: 15px 15px 15px 15px;
        }

        ul, p{
            font-size: 3vh;
        }
        li{
            margin: 1vh 0vh 2vh 0vh;
        }

        input[type=radio]{
            width: 2vh;
            height: 2vh;
            margin: 2vh 0vh 2vh 0vh;
        }
        @media only screen and (min-width: 768px){
            input[type=text], input[type=email], input[type=number],
		    button[type=submit]{
                width: 40%;
            }
        }
    </style>
    <?php
        $resultado = $bd->consultar("select * from domicilio where correo = '{$_SESSION['usuario']}';");

        $arrDomicilio = $resultado->fetch_array(MYSQLI_ASSOC);
    ?>
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
        <h1>Agendar cita</h1>
        <br>
        <form action="backend/pago_servicio.php" method="post" id='nombre_piezas'>
            <label>¿Sabes los nombres de los componentes y su compatibilidad?</label>

            <br>
            
            <input type="radio" name="tipo_pc" value="si" checked required><label>Si</label>

            <input type="radio" name="tipo_pc" value="no" required><label>No</label>

            <br>

            <label class="verificacion_piezas">Ingresa el nombre del procesador</label>

            <br class="verificacion_piezas">

            <input type="text" name="procesador" class="verificacion_piezas">

            <br class="verificacion_piezas">

            <label class="verificacion_piezas">Ingres el nombre de la tarjeta madre</label>

            <br class="verificacion_piezas">

            <input type="text" class="verificacion_piezas" name="tarjeta_madre" >

            <br class="verificacion_piezas">

            <label class="verificacion_piezas">Ingres la versión de RAM</label>

            <br class="verificacion_piezas">

            <input type="text" class="verificacion_piezas" name="ram">

            <br class="verificacion_piezas">

            <label class="verificacion_piezas">Ingres el tipo de almacenamiento</label>

            <br class="verificacion_piezas">

            <input type="text" class="verificacion_piezas" name="almacenamiento">

            <br class="verificacion_piezas">

            <label class="verificacion_piezas">Ingres el modelo de tarjeta grafica</label>

            <br class="verificacion_piezas">

            <input type="text" class="verificacion_piezas" name="gpu">

            <br class="verificacion_piezas">

            <label class="verificacion_piezas">Ingres el nombre de la fuente de poder</label>

            <br class="verificacion_piezas">

            <input type="text" class="verificacion_piezas" name="fuente">

            <br class="verificacion_piezas">

            <label class="verificacion_piezas">Ingres el nombre del gabinete</label>

            <br class="verificacion_piezas">

            <input type="text" class="verificacion_piezas" name="gabinete">

            <br class="verificacion_piezas">

            <label class="verificacion_piezas">Ingres componentes extra</label>

            <br class="verificacion_piezas">

            <input type="text" class="verificacion_piezas" name="extra">

            <br class="verificacion_piezas">

            <label class="verificacion_piezas"><b>Domicilio de la cita:</b></label>

            <ul class="verificacion_piezas">
                <li>Estado: <?=$arrDomicilio['estado']?></li>
                <li>Delegación: <?=$arrDomicilio['delegacion']?></li>
                <li>Codigo postal: <?=$arrDomicilio['codigo_postal']?></li>
                <li>Colonia: <?=$arrDomicilio['colonia']?></li>
                <li>Calle: <?=$arrDomicilio['calle']?></li>
                <li>Numero exterior: <?=$arrDomicilio['numero']?></li>
                <li>Numero interior: <?=$arrDomicilio['interior']?></li>
                <li>Descripcion: <?=$arrDomicilio['descripcion']?></li>
            </ul>
            
            <p id="no_conoce" style="display: none">Si no conoce la compatibilidad o nombre de los componentes me pondre en contacto para que usted sea asesorado, se le cobrara $50 pesos y si resulta que los componentes son compatibles se le descontara esos $50 pesos para su cita, de lo contrario se le recomendara la solucion de compatibilidad para resolver el problema.</p>

            <br>

            <button type="submit" id="pagar">Pagar</button>
        </form>
    </section>
</body>
<script type="text/javascript">
    var arrRadioBotones = document.getElementsByName('tipo_pc');

    var arrVerificacion = document.getElementsByClassName('verificacion_piezas');

    var parrafo = document.getElementById('no_conoce');

    for(var it of arrRadioBotones){
        it.addEventListener('change', function(){
            switch(this.value){
                case 'si':
                    for(var it2 of arrVerificacion){
                        it2.style.display = 'inline';
                    }
                    parrafo.style.display = 'none';
                break;

                case 'no':
                    for(var it2 of arrVerificacion){
                        it2.style.display = 'none';
                    }
                    parrafo.style.display = 'inline';
                break;
            }
        });
    }

    var stripe = Stripe("pk_test_51IAkOaLmlwJfjo8xT2oewPz9QnEpAQNgj2xMbC4bAD4pZVP19AaaDxj5FMERL6fpSHCOSBjoOXEVJ25b8lZ84j5C00vUgti182");

    var botonPago = document.getElementById("pagar");

    botonPago.addEventListener("click", function (event) {
        event.preventDefault();
        let nombreComponentes = new FormData(document.getElementById('nombre_piezas'));
        if(nombreComponentes.get('tipo_pc') == 'si'){
            let arrVerificacion = [];
            let pago = 10000;
            nombreComponentes.append('pago', pago);
            nombreComponentes.append('tipo_servicio', 'Cita con un tecnico');
            arrVerificacion.push(nombreComponentes.get('procesador') != '');
            arrVerificacion.push(nombreComponentes.get('tarjeta_madre') != '');
            arrVerificacion.push(nombreComponentes.get('ram') != '');
            arrVerificacion.push(nombreComponentes.get('almacenamiento') != '');
            console.log(arrVerificacion);
            if(arrVerificacion[0] && arrVerificacion[1] && arrVerificacion[2] && arrVerificacion[3]){
                fetch("backend/pago_servicio.php", {
                    method: "POST",
                    body: nombreComponentes
                })
                .then(function (response) {
                    return response.json();
                })
                .then(function (session) {
                    return stripe.redirectToCheckout({ sessionId: session.id });
                })
                .then(function (result) {
                // If redirectToCheckout fails due to a browser or network
                // error, you should display the localized error message to your
                // customer using error.message.
                if (result.error) {
                    alert(result.error.message);
                }
                })
                .catch(function (error) {
                console.error("Error:", error);
                });
            } else{
                console.log('entro al else del fetch');
                if(!arrVerificacion[0]) alert('El campo del procesador es obligatorio');
                if(!arrVerificacion[1]) alert('El campo de la tarjeta madre es obligatorio');
                if(!arrVerificacion[2]) alert('El campo de la RAM es obligatorio');
                if(!arrVerificacion[3]) alert('El campo del tipo de almacenamiento es obligatorio');
            }
        } else{
            let pago = 5000;
            nombreComponentes.append('pago', pago);
            nombreComponentes.append('tipo_servicio', 'Asesoría');
            fetch("backend/pago_servicio.php", {
                method: "POST",
                body: nombreComponentes
            })
            .then(function (response) {
                return response.json();
            })
            .then(function (session) {
                return stripe.redirectToCheckout({ sessionId: session.id });
            })
            .then(function (result) {
                // If redirectToCheckout fails due to a browser or network
                // error, you should display the localized error message to your
                // customer using error.message.
                if (result.error) {
                    alert(result.error.message);
                }
            })
            .catch(function (error) {
                console.error("Error:", error);
            });
        }

    });
</script>
</html>
<?php else: ?>
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
        <h1>Tienes que registrarte para acceder a este servicio</h1>
        <p>Para poder agendar una cita con nosotros tienes que dar tu domicilio en el registro que se encuentra en la parte de login, puedes dar clic en el siguiente enlace: <a href="index.php#login">Login</a>, o si lo prefieres puedes navegar a traves del menu inferior derecho para ir a la misma seccion, en login encontraras un enlace para registrarte.</p>
    </section>
</body>
</html>
<?php endif ?>