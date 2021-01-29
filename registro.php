<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>pcXpartes | Registrarse</title>
	<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Krona+One&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.0.9/fullpage.css" integrity="sha512-1No3nMY/zD37h1POyqULfwc9WMzWvXcal6F7/OIhNdWkTaEbt4Y6eqX0vXail7Zh5JjnBdMMKr+lRvqTNFr3Ow==" crossorigin="anonymous" />
	<link rel="stylesheet" href="css/estilosGenerales.css?v=<?php echo(rand()); ?>" />
	<style>
		input[type=text], input[type=correo], input[type=password], input[type=email], input[type=number],
		input[type=submit], select, #registro label
		{
			width: 90%;
			padding: 5px 10px 5px 10px;
			box-sizing: border-box;
			font-size: 3vh;
			margin: 2vh 2vh 2vh 2vh;
			border-radius: 15px 15px 15px 15px;
		}
		input[type=text], input[type=correo], input[type=password], input[type=email], input[type=number],
		input[type=submit], select{
			border-style: solid;
		}
		@media only screen and (min-width: 768px){
			input[type=text], input[type=correo], input[type=password], input[type=email], input[type=number],
			input[type=submit], select, #registro label
			{
				width: 40%;
			}
		}
	</style>
</head>
<?php if (isset($_SESSION['usuario'])): ?>
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
        <h1>Tienes que cerrar tu sesion para registrarte</h1>
    </section>
</body>
<?php else: ?>
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
        <h1>Ingrese la información</h1>
        
		<form action="backend/registrar.php" method="post" id="registro">
			<label for="">ATENCIÓN: Solo contamos con alcance en CDMX y Nezahualcoyotl</label>

			<br>

			<label for="">Nombre(s)</label>

			<br>

			<input type="text" name="nombres" placeholder="Escribe tu nombre" required maxlength="40"></input>

			<br>

			<label for="">Apellidos</label>

			<br>

			<input type="text" name="apellidos" placeholder="Escribe tus apellidos" required maxlength="40"></input>

			<br>

            <label for="">Correo</label>

            <br>

            <input type="email" name="correo" placeholder="Escribe tu correo" required pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$"></input>

            <br>

            <label for="">Verificar correo</label>

            <br>

            <input type="email" name="correo_verificado" required placeholder="Vuelve a escribir tu correo" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$"></input>

			<br>

			<label for="">Contraseña</label>

			<br>

			<input type="password" name="password" required minlength="8" placeholder="Escribe tu contraseña"></input>

			<br>

			<label for="">Numero de celular</label>

			<br>

			<input type="text" name="celular" placeholder="5511223344" maxlength="10" pattern="([0-9])+" required></input>

			<br>

			<label for="">Ciudad</label>

			<br>

			<select name="ciudad" onChange="cambioCiudad(this.value);" required>
				<option value="cdmx">Ciudad de México</option>

				<option value="nezahualcoyotl">Nezahualcoyotl</option>
			</select>

			<br>

			<label for="" class="cdmx">Delegacion</label>

			<br class="cdmx">

			<select name="delegaciones" class="cdmx">		
				<?php
					$strXMLDelegaciones = file_get_contents('ciudad_de_mexico.xml');
					$XMLparseado = new SimpleXMLElement($strXMLDelegaciones);
					$contador = 0;
					foreach ($XMLparseado->table as $it) {
						$delegacion[$contador] = $it->D_mnpio;
						$contador++;
					}
					$arrDelegaciones = array_unique($delegacion, SORT_STRING);
					foreach($arrDelegaciones as $it){
						echo('<option name="$it">' . $it . '</option>');
						$contador++;
					}
				?>
			</select>

			<br class="cdmx">
			
			<label for="">Codigo postal</label>

			<br>
			
			<select name="codigo_postal_cdmx" class="cdmx">		
				<?php
					$strXMLCodigosCDMX = file_get_contents('ciudad_de_mexico.xml');
					$XMLparseadoCodCDMX = new SimpleXMLElement($strXMLCodigosCDMX);
					$contador = 0;
					foreach ($XMLparseadoCodCDMX->table as $it) {
						$codigos[$contador] = $it->d_codigo;
						$contador++;
					}
					$arrCodigos = array_unique($codigos, SORT_STRING);
					foreach($arrCodigos as $it){
						echo('<option name="$it">' . $it . '</option>');
					}
				?>
			</select>

			<select name="codigo_postal_neza" class="neza" style="display: none;">
				<?php
					$strXMLCodigoxMexico = file_get_contents('mexico.xml');
					$XMLparseadoCodigos = new SimpleXMLElement($strXMLCodigoxMexico);
					$contador = 0;
					foreach ($XMLparseadoCodigos->table as $it) {
						if($it->D_mnpio == 'Nezahualcóyotl'){
							$codigos[$contador] = $it->d_codigo;
							$contador++;
						}
					}
					$arrCodigos = array_unique($codigos, SORT_STRING);
					foreach($arrCodigos as $it){
						echo('<option name="$it">' . $it . '</option>');
					}
				?>
			</select>
			
			<br>

			<label for="">Colonia</label>

			<br>

			<select name="colonia_cdmx" class=cdmx style="max-width:90%;">
				<?php
					$arrColoniasCDMX = array();
					$contador = 0;
					foreach($XMLparseadoCodCDMX->table as $it){
						$arrColoniasCDMX[$contador] = $it->d_asenta;
						$contador++;
					}
					$arrColoniasCDMX = array_unique($arrColoniasCDMX, SORT_STRING);
					foreach($arrColoniasCDMX as $it){
						echo('<option name="$it">' . $it . '</option>');
					}
					
				?>
			</select>

			<br class="cdmx">

			<select name="colonia_neza" class="neza" style="max-width:90%; display:none;">
				<?php
					$arrColoniasNeza = array();
					$contador = 0;
					foreach($XMLparseadoCodigos->table as $it){
						if($it->D_mnpio == 'Nezahualcóyotl'){
							$arrColoniasNeza[$contador] = $it->d_asenta;
							$contador++;
						}
					}
					$arrColoniasNeza = array_unique($arrColoniasNeza, SORT_STRING);
					foreach($arrColoniasNeza as $it){
						echo('<option name="$it">' . $it . '</option>');
					}
					
				?>
			</select>
			
			<br class="neza" style="display:none;">

			<label for="">Calle</label>

			<br>
			
			<input type="text" name="calle" placeholder="Escribe tu calle" required></input>

			<br>

			<label for="">Numero exterior</label>

			<br>

			<input type="number" name="numero" placeholder="Escribe tu numero exterior" required></input>

			<br>

			<label for="">Numero interior</label>

			<br>

			<input type="number" name="interior" placeholder="Escribe tu numero interior si tienes"></input>

			<br>
			
			<label for="">Descripcion/Caracteristica del lugar</label>

			<br>

			<input type="text" name="descripcion" placeholder="Escribe la descripcion de tu casa" maxlength="100" required></input>

			<br>
			<br>
			
			<input type="submit" value="Registrarse"></input>
			
			<br>
        </form>
    </section>

	<script type="text/javascript">
		function cambioCiudad(atributo){
			let arrCDMX = document.getElementsByClassName('cdmx');
			let arrNeza = document.getElementsByClassName('neza');
			switch(atributo){
				case 'cdmx':
					for (const iterator of arrCDMX) {
						iterator.style.display = 'inline';
					}
					for (const iterator of arrNeza) {
						iterator.style.display = 'none';
					}
				break;

				case 'nezahualcoyotl':
					for (const iterator of arrCDMX) {
						iterator.style.display = 'none';
					}
					for (const iterator of arrNeza) {
						iterator.style.display = 'inline';
					}
				break;
			}
		}
	</script>
</body>
<?php endif ?>