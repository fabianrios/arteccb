<?php include_once('header-nologin2.php');  ?>
		

<body>
<div class="container">
	<div class="row"><!-- Row -->	
		<div class="six columns centered"><!-- six columns -->
			<span class="artBO">Artbo</span><span class="ccB">CCB</span>
	    	<div class="alert-box error">
	    		Las contraseñas no coinciden. Prueba de nuevo.
	    		<a href="" class="close" title="Cerrar">&times;</a>
	    	</div>
	    	<!-- END  casilla de alerta -->
	    	<form action="#">
			<div class="panel"><!-- Panel -->
			<h3>Restablecer contraseña</h3>
				<!-- login form -->
				    	<p>Introduce una nueva contraseña para tu cuenta de artBO.</p>
				    
				    	<div class="mid-input-div"><!-- Div Input -->
				    		<label>Contrase&ntilde;a</label>
				        	<input type="password" class="expand input-text" name="pass" required="required">
				    	</div><!-- END Div Input -->
				    	
				    	<div class="mid-input-div"><!-- Div Input -->
				    		<label>Confirmar contrase&ntilde;a</label>
				        	<input type="password" class="expand input-text" name="confirmar" required="required">
				    	</div><!-- END Div Input -->

			</div>  <!-- End Panel -->
			<div class="row">
				<div class="six columns"><a href="<?php echo APPLICATION_URL?>home.html" class="bold whitetxt" title="Restablecer contraseña">Cancelar</a></div>
				<div class="six columns"><input type="button" class="button radius right" value="Restablecer contaseña"></div>
			</div>
			</form>
		</div><!-- six columns -->
	</div><!-- End Row -->
</div>	
<!-- End content -->
			
<!-- 3. footer -->			
<?php include_once('footer.php'); ?>
<!-- 3. End footer -->
<?php include_once('randomizer.php'); ?>