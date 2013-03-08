<?php include_once(SITE_VIEW.'header-login.php'); ?>

	<div class="row contenido"><!-- Row -->	
		
		<!-- columna 1/2 -->
		<div class="six columns centered">
			
<div class="panel"><!-- panel -->
	<h2>Editar su perfil</h2>
	<label for="contraseña">Nueva clave</label>
	<input type="password" name="contrasena" value="" id="contrasena"/>
	<label for="Repetir contraseña">Repetir clave</label>
	<input type="password" name="rep_contrasena" value="" id="rep_contrasena"/>
</div>	

<div class="row">
	<div class="six columns"><a class="bold" title="volver" href="<?php echo APPLICATION_URL?>registro-inicio-0400.html">Volver</a></div>
	<div class="six columns"><input title="guardar" onClick="return validate();" type="submit" name="cambiar" value="Guardar" class="button radius right"/></div>
</div>				
						
			

		</div><!-- END columna 1/2 -->
	</div><!-- End Row -->
			
<?php include_once('footer.php'); ?>