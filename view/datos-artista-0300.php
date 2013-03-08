<?php include_once(SITE_VIEW.'header-login.php'); ?>

	<div class="row contenido"><!-- Row -->	
		
		<!-- columna 1/2 -->
		<div class="six columns centered">
			<div class="panel"><!-- panel -->
				<h2 class="text-center">Artista</h2>
				<hr />
                <form action="<?php echo APPLICATION_URL?>user.controller/basic.html" id="validable" class="" method="post" enctype="multipart/form-data">
				<!-- row -->
				<div class="row">
					<!-- columna 1/1 -->
					<div class="twelve columns">
						<!-- imagen galeria -->
						<label><strong>Imagen de Perfil</strong></label>
						<br />
						<div class="text-center">
							
							
					<img src="<?php echo APPLICATION_URL?>images/resources/200X200/perfil.png" alt="perfil" width="200" height="200" class="images"><br />
					
							<input type="file" name="user_image" class=""/><br /><br/>
							<p>Puede subir una imagen en .JPG o .PNG. El archivo no debe superar los 1000 KB.</p>
							<hr />
						</div>
						<!-- END imagen galeria -->
						<!-- Nombre de la galería -->
						<div class="mid-input">
							<label><strong>Nombre*</strong></label>
							<input type="text" name="user_name" class="expand input-text only" />
						</div>
						<!-- End Nombre de la galería -->
						<!-- pagina web -->
						<label><strong>Apellido*</strong> </label>
						<input type="text" name="user_surname"  class="expand input-text only" />
						<!-- END pagina web -->
						<br />
						<!-- documento -->
						<div class="row">
							<!-- columns 1/2 -->
							<div class="seven columns">
							<label><strong>Tipo de documento*</strong></label>
							<select name="user_document_type">
								<option value="NULL">Seleccione</option>
								<option value="cc">Cédula de ciudadanía</option>
								<option value="ce">Cédula de extranjería</option>
							</select>
							</div>
							<!-- END columns 1/2 -->
							<!-- columns 2/2 -->
							<div class="five columns ">
								<label><strong>Número de Documento*</strong></label>
								<input name="user_gallery_document" type="text" class="small input-text" />
							</div>
							<!-- END columns 2/2 -->
						</div>
						
						<!-- END documento -->
						
						
						<span>Nota: Tenga en cuenta que con este mismo número de identificación deberá registrar el ingreso de mercancía de sus obras, equipos y otros a Corferias y, además, podrá participar en futuras convocatorias de Artecámara de la Cámara de Comercio de Bogotá, actualizando sus datos e imágenes. <span><br />
						
						
						
						<!-- botones -->
						<hr />
						<span><strong>*Datos requeridos</strong></span>
						<div class="text-center">
							<a href="javascript:void(0);" onClick="document.getElementById('validable').submit();" class="button round">Siguiente</a>
						</div>
						<!-- END botones -->
						<br />
					</div>
					<!-- END columna 1/1 -->
				</div>
				<!-- END row -->
                </form>

	
			</div><!-- End panel -->
			<div class="shadow"><img src="<?php echo APPLICATION_URL?>images/resources/sombraFinalDatos.png" class="top-sombra" width="470" height="12" alt="sombra"/></div><!-- Sombra final del panel -->
		</div><!-- END columna 1/2 -->
	</div><!-- End Row -->
			
<?php include_once('footer.php'); ?>