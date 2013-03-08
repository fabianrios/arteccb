<?php 
include_once('header-nologin2.php'); 
$error = '';
if ((isset($_GET[0])) && ($_GET[1] == 0))
	$error	= '<div class="alert-box error" id="alert">Un usuario ya ha sido registrado con estos datos.<a href="javascript:void(0);" onClick="document.getElementById(\'alert\').style.display=\'none\';" class="close">&times;</a></div>';
if ((isset($_GET[0])) && ($_GET[1] == 0))
	$error	= '<div class="alert-box error" id="alert">Hay un error en los datos suministrados.<a href="javascript:void(0);" onClick="document.getElementById(\'alert\').style.display=\'none\';" class="close">&times;</a></div>';

?>

<body>
<!-- content -->
<div class="container">
	<div class="row"><!-- Row -->	
		<div class="six columns centered"><!-- six columns -->
			<span class="artBO">Artbo</span><span class="ccB">CCB</span>
			<?php echo $error;?>
			<form  action="<?php echo APPLICATION_URL?>user.controller/create.html"  method="post" id="validable">
				<div class="panel">
					<h3>Registro</h3>
					<p>Si nunca te has registrado en artBO el Pabellón Artecámara, incluida la última versión. Si ya te registraste en artBO en el Pabellón Artecámara, haz clic <a class="underline" href="login.html">aquí.</a></p>
					
					<span class="caption"><strong>*Nota:</strong>enga en cuenta que con este mismo número de identificación deberás registrar el ingreso de tus obras, equipos y otros a Corferias y, podrás también participar en futuras convocatorias de Artecámara de la Cámara de Comercio de Bogotá, actualizando tus datos e imágenes. </span>
				
					<label for="name"><span class="asterix">*</span>Nombre</label>
					<input type="text" name="user_name" title="Digite su(s) nombre(s) y Apellidos"/>
					<label for="name"><span class="asterix">*</span>Apellido</label>
					<input type="text" name="userlast_name" title="Digite su(s) apellido(s)"/>
					<label for="name">Nombre del Colectivo</label>
					<input type="text" name="collective_name" title="Digite el nombre del colectivo"/>
					<div class="row">
						<div class="six columns">
							<label for="name"><span class="asterix">*</span>Tipo de documento</label>
							<select name="tipo de documento">
								<option value="cc">Cédula de ciudadanía</option>
								<option value="cc">Cédula de extranjería</option>
								<option value="cc">Número de identificación válido</option>
							</select>
						</div>
						<div class="six columns">
							<label for="numero_doc"><span class="asterix">*</span>Número de documento</label>
							<input type="text" name="numero_doc" id="numero_doc" title="Digite su numero de documento"/>
						</div>
					</div>
					<label for="name"><span class="asterix">*</span>Correo electrónico</label>
					<input type="email" name="user_email"  title="Digite el correo electrónico"/>
					<label for="name"><span class="asterix">*</span>Confirmación correo electrónico</label>
					<input type="email" name="user_email_confirm"  alt="email" title="Confirme el correo electrónico digitado"/>
					<label for="name"><span class="asterix">*</span>Clave</label>
					<input type="password" name="user_password" title="Digite su contraseña"/>
					<label for="name"><span class="asterix">*</span>Confirmar clave</label>
					<input type="password" name="user_password_confirm" alt="Confirme la clave digitada" title="Contrase&ntilde;a (repetir)"/>
				</div>
				<div class="row">
					<div class="six columns"><span class="whitetxt bold"><span class="asterix">*</span> Datos requeridos</span></div>
					<div class="six columns"><input type="submit" class="button radius right" value="Registrarse" title="Registrarse" onClick="javascript:void(0);"></div>
				</div>
			</form>
			<br />
								
		</div><!-- END six columns -->
	</div><!-- End Row -->
</div>	
<!-- End content -->
			

<!-- 3. footer -->			
<?php include_once('footer.php'); ?>
<!-- 3. End footer -->
<?php include_once('randomizer.php'); ?>
