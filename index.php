<?php
	session_start();
	require('backend/conexionBD.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>pcXpartes</title>
	<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Krona+One&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.0.9/fullpage.css" integrity="sha512-1No3nMY/zD37h1POyqULfwc9WMzWvXcal6F7/OIhNdWkTaEbt4Y6eqX0vXail7Zh5JjnBdMMKr+lRvqTNFr3Ow==" crossorigin="anonymous" />
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
					<a id="salir" style="font-size: 2.7vh; position: relative; z-index: 150" href="#login">Entrar</a>
				<?php endif ?>
				<img src="media/images/user.png" alt="Usuario" srcset="" style="float: right"/>
			</div>
			
			<nav class="menu-content">
				<ul>
					<!--Opciones del menu-->
				
					<li><a href="#about_mine">Página principal</a></li>
					
					<li><a href="#assemble_your_pc">Agendar cita</a></li>
					
					<li><a href="#kits">Paquetes de hardware preestablecidos</a></li>
					
					<li><a href="#tienda_hardware">Tienda de hardware</a></li>
					
					<li><a href="#visita_blog">Blog</a></li>
					
					<li><a href="#armador_pc">Compatibilidad de componentes</a></li>
					
					<!--Esto cambia con php dependiendo si no hay sesion iniciada-->
					<li><a href="#login">Iniciar sesión</a></li>

					<li><a href="#redes_sociales">Redes sociales</a></li>
				</ul>
			</nav>
		</div>
	</div>
	<!-----------------------------
		FIN MENU
	------------------------------>

	<main id="fullpage">
		<section class="section about-mine">

			<img id="logo-completo" src="media/images/pcXpartes_logo.png" alt="Logo de pcxpartes"/>

			<div class="text-content">
				<h1>¿Quién soy?</h1>
				
				<p>
					Soy un estudiante del Instituto Politécnico Nacional que le apasiona la informática, con ganas de seguir aprendiendo y superarme.
				</p>
				
				<p>
					Esta página fue creada para atender a personas que quieran su propia computadora a medida y con el precio mínimo posible sin tener ningún conocimiento técnico, solo elige tu paquete, explora nuestras opciones de hardware que te damos desde Amazon o guíate con nuestra aplicación de compatibilidad de componentes.
				</p>
				
				<h1>Misión</h1>
				
				<p>
					Facilitar el hardware adecuado para la correcta ejecución del trabajo de cada profesionista de acuerdo a su ramo, teniendo como principal prioridad la economía del cliente.
				</p>
					
				<h1>Visión</h1>
				
				<p>
					La creación de una empresa con una gran cantidad de personal capacitado para la realización de proyectos informáticos físicos y de software, con un alcance nacional.
				</p>
			</div>

			<div class="content-arrow">
				<p><a href="#assemble_your_pc" class="arrow"><i class="fas fa-chevron-down"></i></a></p>
			</div>

		</section>

		<section class="section assemble-your-pc">
	
			<div class="text-content" style="margin-top: 7vh;">
				<h1>Ensamblamos tu PC</h1>
				
				<p id="left-text">¿Quieres armar tu propia computadora?, ¿Te gustaría personalizar al máximo tu pc?, ¿Desearías aprovechar hasta el último centavo de tu bolsillo? sin embargo, no sabes cómo ensamblar cada uno de los componentes de hardware que elegiste. Pues agenda una cita conmigo, iré a tu domicilio y aramaré las piezas que hayas comprado. No te arriesgues a pedir un servicio en el centro que pudiera acabar en estafa, mucho menos salgas de tu casa, cuídate. El precio es de solo <b>$500.00 pesos.</b></p>
				
				<img id="show-pc" src="media/images/img_ensamble_pc.png" alt="Hardware de muestra" srcset="">
				
				<a class="boton" href="agendar_cita.php" rel="noopener noreferrer">Agendar Cita</a>
			</div>		
		
			<div class="content-arrow">
				<p><a href="#kits" class="arrow"><i class="fas fa-chevron-down"></i></a></p>
			</div>
		</section>
		
		<section class="section kits">
			<div class="slide">				
				<div class="text-content">
					<h1>Paquete economico de PC</h1>

					<img id="paquete-economico" src="media/images/paquete_pc.png" alt="Paquete de partes económico" srcset="">

					<p>
						Tiene el mismo rendimiento que la comuputadora <a href="https://store.hp.com/mx-es/default/desktops/desktop-hp-slimline-290-a004bla-6gq40aa.html" target="blank">Slimline 290-a004bla</a> de HP, sin embargo nuestro paquete cuesta $2,990.00 pesos mas barato, puedes agendar tu cita para que cuando te llegue la ensamblemos por $500.00 pesos, el precio de este paquete es de: <b>$9,009.00</b>
					</p>
					
					<hr>
						
					<h2>Contenido del paquete</h2>
						<ul>
							<li>
								<a href="https://www.amazon.com.mx/TECKNET-activación-Download-Lifetime-Delivery/dp/B08KY5H1KR" target="blank">
									Windows 10
								</a>
							</li>
							
							<li>
								<a href="https://www.amazon.com.mx/Crucial-Módulo-memoria-2400MHz-260-pinSO-DIMM/dp/B019FRDKWI" target="blank">
									Memoria RAM
								</a>
							</li>
								
							<li>
								<a href="https://www.amazon.com.mx/ARCTIC-P12-Carcasa-Ordenador-Enfriador/dp/B07GB16RK7" target="blank">
								Ventilador
								</a>
							</li>
							
							<li>
								<a href="https://www.amazon.com.mx/Kingston-SA400S37-240G-Unidad-Estado/dp/B01N5IB20Q" target="blank">
								SSD 240gb
								</a>
							</li>
							
							<li>
								<a href="https://www.amazon.com.mx/Asrock-J5005-ITX-Quad-Core-Pentium-Silver/dp/B079G91MQ1" target="blank">
								Tarjeta madre
								</a>
							</li>
								
							<li>
								<a href="https://www.amazon.com.mx/dp/B0767CZTC6" target="blank">
								Teclado y ratón
								</a>
							</li>
								
							<li>
								<a href="https://www.amazon.com.mx/Sceptre-E205W-16003R-Ultrafino-Altavoces-metálico/dp/B07743412C" target="blank">
								Monitor con bocinas
								</a>
							</li>
								
							<li>
								<a href="https://www.amazon.com.mx/Getttech-GG1803-Gabinete-Fuente-Negro/dp/B07MQG44QZ" target="blank">
								Gabinete con fuente de poder
								</a>
							</li>
						</ul>
						<a class='boton' href="https://www.amazon.com.mx/gp/aws/cart/add.html?ASIN.1=B079G91MQ1&Quantity.1=1&ASIN.2=B08KY5H1KR&Quantity.2=1&ASIN.3=B019FRDKWI&Quantity.3=1&ASIN.4=B07GB16RK7&Quantity.4=1&ASIN.5=B01N5IB20Q&Quantity.5=1&ASIN.6=B0767CZTC6&Quantity.6=1&ASIN.7=B07743412C&Quantity.7=1&ASIN.8=B07MQG44QZ&Quantity.8=1" target="blank">
							Comprar todos los componentes
						</a>
				</div>

				<div class="content-arrow">
					<p><a href="#tienda_hardware" class="arrow"><i class="fas fa-chevron-down"></i></a></p>
				</div>
			</div>

			<div class="slide">				
				<div class="text-content">
					<h1>Paquete de gama media</h1>

					<img id="paquete-economico" src="media/images/paquete_pc.png" alt="Paquete de partes económico" srcset="">

					<p>
						Tiene el mismo rendimiento que la comuputadora <a href="https://store.hp.com/mx-es/default/desktops/desktop-hp-slimline-290-a004bla-6gq40aa.html" target="blank">Slimline 290-a004bla</a> de HP, sin embargo nuestro paquete cuesta $2,990.00 pesos mas barato, puedes agendar tu cita para que cuando te llegue la ensamblemos por $500.00 pesos, el precio de este paquete es de: <b>$9,009.00</b>
					</p>
					
					<hr>
						
					<h2>Contenido del paquete</h2>
						<ul>
							<li>
								<a href="https://www.amazon.com.mx/TECKNET-activación-Download-Lifetime-Delivery/dp/B08KY5H1KR" target="blank">
									Windows 10
								</a>
							</li>
							
							<li>
								<a href="https://www.amazon.com.mx/Crucial-Módulo-memoria-2400MHz-260-pinSO-DIMM/dp/B019FRDKWI" target="blank">
									Memoria RAM
								</a>
							</li>
								
							<li>
								<a href="https://www.amazon.com.mx/ARCTIC-P12-Carcasa-Ordenador-Enfriador/dp/B07GB16RK7" target="blank">
								Ventilador
								</a>
							</li>
							
							<li>
								<a href="https://www.amazon.com.mx/Kingston-SA400S37-240G-Unidad-Estado/dp/B01N5IB20Q" target="blank">
								SSD 240gb
								</a>
							</li>
							
							<li>
								<a href="https://www.amazon.com.mx/Asrock-J5005-ITX-Quad-Core-Pentium-Silver/dp/B079G91MQ1" target="blank">
								Tarjeta madre
								</a>
							</li>
								
							<li>
								<a href="https://www.amazon.com.mx/dp/B0767CZTC6" target="blank">
								Teclado y ratón
								</a>
							</li>
								
							<li>
								<a href="https://www.amazon.com.mx/Sceptre-E205W-16003R-Ultrafino-Altavoces-metálico/dp/B07743412C" target="blank">
								Monitor con bocinas
								</a>
							</li>
								
							<li>
								<a href="https://www.amazon.com.mx/Getttech-GG1803-Gabinete-Fuente-Negro/dp/B07MQG44QZ" target="blank">
								Gabinete con fuente de poder
								</a>
							</li>
						</ul>
						<a class='boton' href="https://www.amazon.com.mx/gp/aws/cart/add.html?ASIN.1=B079G91MQ1&Quantity.1=1&ASIN.2=B08KY5H1KR&Quantity.2=1&ASIN.3=B019FRDKWI&Quantity.3=1&ASIN.4=B07GB16RK7&Quantity.4=1&ASIN.5=B01N5IB20Q&Quantity.5=1&ASIN.6=B0767CZTC6&Quantity.6=1&ASIN.7=B07743412C&Quantity.7=1&ASIN.8=B07MQG44QZ&Quantity.8=1" target="blank">
							Comprar todos los componentes
						</a>
				</div>
			</div>

			<div class="slide">				
				<div class="text-content">
					<h1>Paquete de gama alta</h1>

					<img id="paquete-economico" src="media/images/paquete_pc.png" alt="Paquete de partes económico" srcset="">

					<p>
						Tiene el mismo rendimiento que la comuputadora <a href="https://store.hp.com/mx-es/default/desktops/desktop-hp-slimline-290-a004bla-6gq40aa.html" target="blank">Slimline 290-a004bla</a> de HP, sin embargo nuestro paquete cuesta $2,990.00 pesos mas barato, puedes agendar tu cita para que cuando te llegue la ensamblemos por $500.00 pesos, el precio de este paquete es de: <b>$9,009.00</b>
					</p>
					
					<hr>
						
					<h2>Contenido del paquete</h2>
						<ul>
							<li>
								<a href="https://www.amazon.com.mx/TECKNET-activación-Download-Lifetime-Delivery/dp/B08KY5H1KR" target="blank">
									Windows 10
								</a>
							</li>
							
							<li>
								<a href="https://www.amazon.com.mx/Crucial-Módulo-memoria-2400MHz-260-pinSO-DIMM/dp/B019FRDKWI" target="blank">
									Memoria RAM
								</a>
							</li>
								
							<li>
								<a href="https://www.amazon.com.mx/ARCTIC-P12-Carcasa-Ordenador-Enfriador/dp/B07GB16RK7" target="blank">
								Ventilador
								</a>
							</li>
							
							<li>
								<a href="https://www.amazon.com.mx/Kingston-SA400S37-240G-Unidad-Estado/dp/B01N5IB20Q" target="blank">
								SSD 240gb
								</a>
							</li>
							
							<li>
								<a href="https://www.amazon.com.mx/Asrock-J5005-ITX-Quad-Core-Pentium-Silver/dp/B079G91MQ1" target="blank">
								Tarjeta madre
								</a>
							</li>
								
							<li>
								<a href="https://www.amazon.com.mx/dp/B0767CZTC6" target="blank">
								Teclado y ratón
								</a>
							</li>
								
							<li>
								<a href="https://www.amazon.com.mx/Sceptre-E205W-16003R-Ultrafino-Altavoces-metálico/dp/B07743412C" target="blank">
								Monitor con bocinas
								</a>
							</li>
								
							<li>
								<a href="https://www.amazon.com.mx/Getttech-GG1803-Gabinete-Fuente-Negro/dp/B07MQG44QZ" target="blank">
								Gabinete con fuente de poder
								</a>
							</li>
						</ul>
						<a class='boton' href="https://www.amazon.com.mx/gp/aws/cart/add.html?ASIN.1=B079G91MQ1&Quantity.1=1&ASIN.2=B08KY5H1KR&Quantity.2=1&ASIN.3=B019FRDKWI&Quantity.3=1&ASIN.4=B07GB16RK7&Quantity.4=1&ASIN.5=B01N5IB20Q&Quantity.5=1&ASIN.6=B0767CZTC6&Quantity.6=1&ASIN.7=B07743412C&Quantity.7=1&ASIN.8=B07MQG44QZ&Quantity.8=1" target="blank">
							Comprar todos los componentes
						</a>
				</div>
			</div>
		</section>
		
		<section class="section hardware-shop">
			<div class="slide">
				<h1>Tienda de hardware</h1>
				
				<section class="rejilla">
					<article class="tarjeta">
						<h2>Procesador</h2>
						
						<div>
							<div class="imagen-producto">
								<img src="media/images/core_i9.png" alt="" srcset="">
							</div>

							<div class="descripcion">
								Intel Core i9, precio de: <span>$10,368.67</span>
								<a href="https://www.amazon.com.mx/Intel-Core-i9-9900K-procesador-sobremesa/dp/B07ZTCVY9M/" target="blank" class="boton">
								Comprar
								</a>
							</div>
							
						</div>
					</article>
						
					<article class="tarjeta">
						<h2>Procesador</h2>
						
						<div>
							<div class="imagen-producto">
								<img src="media/images/core_i9.png" alt="" srcset="">
							</div>

							<div class="descripcion">
								Intel Core i9, precio de: <span>$10,368.67</span>
								<a href="https://www.amazon.com.mx/Intel-Core-i9-9900K-procesador-sobremesa/dp/B07ZTCVY9M/" target="blank" class="boton">
								Comprar
								</a>
							</div>
							
						</div>
					</article>
						
					<article class="tarjeta">
						<h2>Procesador</h2>
						
						<div>
							<div class="imagen-producto">
								<img src="media/images/core_i9.png" alt="" srcset="">
							</div>

							<div class="descripcion">
								Intel Core i9, precio de: <span>$10,368.67</span>
								<a href="https://www.amazon.com.mx/Intel-Core-i9-9900K-procesador-sobremesa/dp/B07ZTCVY9M/" target="blank" class="boton">
								Comprar
								</a>
							</div>
							
						</div>
					</article>

					<article class="tarjeta">
						<h2>Procesador</h2>
						
						<div>
							<div class="imagen-producto">
								<img src="media/images/core_i9.png" alt="" srcset="">
							</div>

							<div class="descripcion">
								Intel Core i9, precio de: <span>$10,368.67</span>
								<a href="https://www.amazon.com.mx/Intel-Core-i9-9900K-procesador-sobremesa/dp/B07ZTCVY9M/" target="blank" class="boton">
								Comprar
								</a>
							</div>
							
						</div>
					</article>
				</section>

				<div class="content-arrow">
					<p><a href="#visita_blog" class="arrow"><i class="fas fa-chevron-down"></i></a></p>
				</div>
			</div>

			<div class="slide">
				<h1>Tienda de hardware</h1>
				
				<section class="rejilla">
					<article class="tarjeta">
						<h2>Procesador</h2>
						
						<div>
							<div class="imagen-producto">
								<img src="media/images/core_i9.png" alt="" srcset="">
							</div>

							<div class="descripcion">
								Intel Core i9, precio de: <span>$10,368.67</span>
								<a href="https://www.amazon.com.mx/Intel-Core-i9-9900K-procesador-sobremesa/dp/B07ZTCVY9M/" target="blank" class="boton">
								Comprar
								</a>
							</div>
							
						</div>
					</article>
						
					<article class="tarjeta">
						<h2>Procesador</h2>
						
						<div>
							<div class="imagen-producto">
								<img src="media/images/core_i9.png" alt="" srcset="">
							</div>

							<div class="descripcion">
								Intel Core i9, precio de: <span>$10,368.67</span>
								<a href="https://www.amazon.com.mx/Intel-Core-i9-9900K-procesador-sobremesa/dp/B07ZTCVY9M/" target="blank" class="boton">
								Comprar
								</a>
							</div>
							
						</div>
					</article>
						
					<article class="tarjeta">
						<h2>Procesador</h2>
						
						<div>
							<div class="imagen-producto">
								<img src="media/images/core_i9.png" alt="" srcset="">
							</div>

							<div class="descripcion">
								Intel Core i9, precio de: <span>$10,368.67</span>
								<a href="https://www.amazon.com.mx/Intel-Core-i9-9900K-procesador-sobremesa/dp/B07ZTCVY9M/" target="blank" class="boton">
								Comprar
								</a>
							</div>
							
						</div>
					</article>

					<article class="tarjeta">
						<h2>Procesador</h2>
						
						<div>
							<div class="imagen-producto">
								<img src="media/images/core_i9.png" alt="" srcset="">
							</div>

							<div class="descripcion">
								Intel Core i9, precio de: <span>$10,368.67</span>
								<a href="https://www.amazon.com.mx/Intel-Core-i9-9900K-procesador-sobremesa/dp/B07ZTCVY9M/" target="blank" class="boton">
								Comprar
								</a>
							</div>
							
						</div>
					</article>
				</section>
			</div>

			<div class="slide">
				<h1>Tienda de hardware</h1>
				
				<section class="rejilla">
					<article class="tarjeta">
						<h2>Procesador</h2>
						
						<div>
							<div class="imagen-producto">
								<img src="media/images/core_i9.png" alt="" srcset="">
							</div>

							<div class="descripcion">
								Intel Core i9, precio de: <span>$10,368.67</span>
								<a href="https://www.amazon.com.mx/Intel-Core-i9-9900K-procesador-sobremesa/dp/B07ZTCVY9M/" target="blank" class="boton">
								Comprar
								</a>
							</div>
							
						</div>
					</article>
						
					<article class="tarjeta">
						<h2>Procesador</h2>
						
						<div>
							<div class="imagen-producto">
								<img src="media/images/core_i9.png" alt="" srcset="">
							</div>

							<div class="descripcion">
								Intel Core i9, precio de: <span>$10,368.67</span>
								<a href="https://www.amazon.com.mx/Intel-Core-i9-9900K-procesador-sobremesa/dp/B07ZTCVY9M/" target="blank" class="boton">
								Comprar
								</a>
							</div>
							
						</div>
					</article>
						
					<article class="tarjeta">
						<h2>Procesador</h2>
						
						<div>
							<div class="imagen-producto">
								<img src="media/images/core_i9.png" alt="" srcset="">
							</div>

							<div class="descripcion">
								Intel Core i9, precio de: <span>$10,368.67</span>
								<a href="https://www.amazon.com.mx/Intel-Core-i9-9900K-procesador-sobremesa/dp/B07ZTCVY9M/" target="blank" class="boton">
								Comprar
								</a>
							</div>
							
						</div>
					</article>

					<article class="tarjeta">
						<h2>Procesador</h2>
						
						<div>
							<div class="imagen-producto">
								<img src="media/images/core_i9.png" alt="" srcset="">
							</div>

							<div class="descripcion">
								Intel Core i9, precio de: <span>$10,368.67</span>
								<a href="https://www.amazon.com.mx/Intel-Core-i9-9900K-procesador-sobremesa/dp/B07ZTCVY9M/" target="blank" class="boton">
								Comprar
								</a>
							</div>
							
						</div>
					</article>
				</section>
			</div>
		</section>

		<section class="section seccionCinco">
			<div class="slide">
				<h1>Articulos de nuestro blog</h1>
				<div class="contenedor-blogs">
					<div class="blog-card spring-fever">
						<div class="title-content">
							<h3>SPRING FEVER</h3>
							<hr />
							<div class="intro">Yllamco laboris nisi ut aliquip ex ea commodo.</div>
						</div><!-- /.title-content -->
						
						<div class="card-info">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim. 
						</div><!-- /.card-info -->
						
						<div class="utility-info">
							<ul class="utility-list">
							<li class="comments">12</li>
							<li class="date">03.12.2015</li>
							</ul>
						</div><!-- /.utility-info -->
						<!-- overlays -->
						<div class="gradient-overlay"></div>
						
						<div class="color-overlay"></div>
					</div>
				</div>

				<div class="content-arrow">
					<p><a href="#armador_pc" class="arrow"><i class="fas fa-chevron-down"></i></a></p>
				</div>
			</div>

			<div class="slide">
				<h1>Articulos de nuestro blog</h1>
				<div class="contenedor-blogs">
					<div class="blog-card spring-fever">
						<div class="title-content">
							<h3>SPRING FEVER</h3>
							<hr />
							<div class="intro">Yllamco laboris nisi ut aliquip ex ea commodo.</div>
						</div><!-- /.title-content -->
						
						<div class="card-info">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim. 
						</div><!-- /.card-info -->
						
						<div class="utility-info">
							<ul class="utility-list">
							<li class="comments">12</li>
							<li class="date">03.12.2015</li>
							</ul>
						</div><!-- /.utility-info -->
						<!-- overlays -->
						<div class="gradient-overlay"></div>
						
						<div class="color-overlay"></div>
					</div>
				</div>
			</div>

			<div class="slide">
				<h1>Articulos de nuestro blog</h1>
				<div class="contenedor-blogs">
					<div class="blog-card spring-fever">
						<div class="title-content">
							<h3>SPRING FEVER</h3>
							<hr />
							<div class="intro">Yllamco laboris nisi ut aliquip ex ea commodo.</div>
						</div><!-- /.title-content -->
						
						<div class="card-info">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim. 
						</div><!-- /.card-info -->
						
						<div class="utility-info">
							<ul class="utility-list">
							<li class="comments">12</li>
							<li class="date">03.12.2015</li>
							</ul>
						</div><!-- /.utility-info -->
						<!-- overlays -->
						<div class="gradient-overlay"></div>
						
						<div class="color-overlay"></div>
					</div>
				</div>
			</div>
		</section>

		<section class="section seccionSeis">
			<article class="text-content">
				<h1>Armador de PC virtual</h1>
				<p>
				Explora nuestro armador de pc virtual, una herramienta que hemos creado gratuitamente para ti, se utiliza para que selecciones las piezas mas adecuadas para armar tu computadora sin tener ningún conocimiento técnico, se encargara de que el hardware sea compatible con cada cosa que elijas y te enviara a Amazon para que puedas comprar tu paquete ya hecho. Si lo prefieres agenda una cita para que cuando te lleguen los componentes yo vaya a ensamblarla.
				</p>
				<a href="#" class="boton" style="width=200px; margin-top: 25vh">Probar nuestro armador de PC</a>
			</article>
	
			<div class="content-arrow">
				<p><a href="#login" class="arrow"><i class="fas fa-chevron-down"></i></a></p>
			</div>
		</section>

		<section class="section seccionSiete">
			<article class="text-content">
				<h1>Inicia sesión</h1>
				<hr>
				<form action="backend/login.php" method="post">
					
					<label for="correo">Ingresa tu correo electronico</label>

					<input type="email" name="correo" id="email" placeholder="Correo">

					<label for="contraseña">Ingresa tu contraseña</label>

					<input type="password" name="password" id="pass" placeholder="Contraseña">

					<input type="submit" value="Acceder" style="width: 30vw;">
				</form>
	
				<a href="#">¿Olvidaste tu contraseña? |</a>

				<a href="registro.php">Registrarse</a>

			</article>

			<div class="content-arrow">
				<p><a href="#redes_sociales" class="arrow"><i class="fas fa-chevron-down"></i></a></p>
			</div>
		</section>

		<section class="section seccionOcho">
			<article class="text-content">
				<h1>Nuestras redes sociales</h1>

				<a href="https://www.facebook.com/PcXpartes-104831318175803" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook-f redes-sociales"></i></a>

				<a href="https://www.instagram.com/pcxpartes/" target="_blank" rel="noopener noreferrer"><i class="fab fa-instagram redes-sociales"></i></a>

				<a href="#" target="_blank" rel="noopener noreferrer" style="display: block; margin-top: -1vw;">Ir a las políticas de privacidad</a>
			</article>
			<div class="content-arrow">
				<p><a href="#about_mine" class="arrow"><i class="fas fa-chevron-down"></i></a></p>
			</div>
		</section>
	</main>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.0.9/fullpage.js" integrity="sha512-eH2N2Zt2AeLuFlFvRSEeZcVeAESY+8nfIqhxx0XXEou6w/G4lLY3K8UKNYqi6e1pLXDduVF1KF/lbyxy3+X6OA==" crossorigin="anonymous"></script>
	<script src="js/app.js?v=<?php echo(rand()); ?>"></script>
</body>
</html>