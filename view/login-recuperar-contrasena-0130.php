<?php include_once('header-login.php'); ?>
		
<!-- content -->
<div class="container superior">
	<div class="row"><!-- Row -->	
		<div class="six columns centered"><!-- six columns -->
			<div class="panel"><!-- Panel -->
			<h3>Restablecer contraseña</h3>
			
				
				<!-- login form -->
				<form action="#" class="nice"> 
				    	
				    	<p>Introduce una nueva contraseña para tu cuenta de Artbo.</p>

					
				    	<!-- casilla de alerta -->
				    	<div class="alert-box error">
				    		Las contraseñas no coinciden. Prueba de nuevo.
				    		<a href="" class="close">&times;</a>
				    	</div>
				    	<!-- END  casilla de alerta -->
				    
				    	<div class="mid-input-div"><!-- Div Input -->
				    		<label>Contrase&ntilde;a</label>
				        	<input type="password" class="expand input-text" name="pass">
				    	</div><!-- END Div Input -->
				    	
				    	<div class="mid-input-div"><!-- Div Input -->
				    		<label>Confirmar contrase&ntilde;a</label>
				        	<input type="password" class="expand input-text" name="confirmar">
				    	</div><!-- END Div Input -->
				    
				    	<!--  Input Button & Recuperar Contrase&ntilde;a-->
				    		<input type="button" class="button round" value="Restablecer contaseña">
				    		<a href="login-recuperar-contrasena-0100.php" title="Restablecer contraseña">Cancelar</a>	
				    	<!--  END Input Button & Recuperar Contrase&ntilde;a-->		
				</form>
				<!-- END login form -->
				    			
	
			</div>  <!-- End Panel -->
									
		</div><!-- six columns -->
	</div><!-- End Row -->
</div>	
<!-- End content -->
			
<?php include_once('footer.php'); ?>