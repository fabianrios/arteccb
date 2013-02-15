
<!-- 1. header -->
<?php include_once('header-login.php'); ?>
<!-- 1. End header -->

		<!-- ingresar  Row-->
	<div class="row">	
		<!-- panel -->
		<div class="panel">
			<h2>Selecciona el tipo de registro</h2>
			<p>Selecciona tu grupo de registro para iniciar el proceso</p>
			<hr />
				<div class="row">
				
					<!-- Col 1/3 -->				
					<div class="four columns">
							
						<h3>Galerías</h3>
						<p>Este es un espacio para  galerías con más de tres años de trayectoria que cumplen con los criterios de calidad que la organización ha determinado. En esta  sección se pueden encontrar stand de  63 mts ², 45mts², 33.75 mts² y 31.5 mts²</p>
						<a href="<?php echo APPLICATION_URL?>user.controller/gallerySelect/1.html" class="round  button">Seleccionar</a>
					</div>
					<!-- End Col 1/3 -->
					<!-- Col 2/3 -->				
					<div class="four columns">
							
						<h3>Nuevas Galerías</h3>
						<p>Este es un espacio para galerías con menos de 3 años de actividades que representen  artistas emergentes. Los stand  son de 21 m² y sólo se asignará un espacio por galería.</p>
						<a href="<?php echo APPLICATION_URL?>user.controller/gallerySelect/2.html" class="round  button">Seleccionar</a>
					</div>
					<!-- End Col 2/3 -->
					<!-- Col 3/3 -->				
					<div class="four columns">
							
						<h3>Proyectos individuales</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
						<a href="<?php echo APPLICATION_URL?>user.controller/gallerySelect/3.html" class="round  button">Seleccionar</a>
					</div>
					<!-- End Col 4/4 -->

				</div>
		</div>
		<!-- panel -->
	
	</div>
	<!-- END ingresar Row -->s

<!-- 3. footer -->			
<?php include_once('footer.php'); ?>
<!-- 3. End footer -->

