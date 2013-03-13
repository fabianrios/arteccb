
<?php 
include_once('header-nologin2.php'); 
?>
<!-- content -->
<body style="background-color:#000;">
	
<div class="container">
	<div class="row"><!-- Row -->	
		<div class="six columns centered"><!-- six columns -->
			<a href="home.html"><span class="artBO">Artbo</span></a><a href="home.html"><span class="ccB">CCB</span></a> 
			<?php
			if (isset($_GET[0]))
			{
			?>
                <div class="alert-box error">
                    Nuestro sistema no tiene registro del correo electrónico.<a href="" class="close">&times;</a>
                </div>
            <?php
			}
			?>
			<form action="<?php echo APPLICATION_URL?>user.controller/recover_password.html" class="nice" method="post" id="validable">
				<div class="panel"><!-- Panel -->
			
				<h3>Restablecer clave</h3>
				<!-- login form --> 
						<p>Introduzca el correo electrónico que utiliza para su cuenta de Artecámara y le enviaremos un enlace para restablecer su clave.</p>
				    	<div class="mid-input-div"><!-- Div Input -->
				    		<label>Correo electrónico</label>
				        	<input type="text" class="expand input-text" name="user_email">
				    	</div>
	
			</div>  <!-- End Panel -->
			<div class="row">
				<div class="six columns"><a class="whitetxt bold" href="<?php echo APPLICATION_URL?>home.html" title="Volver al inicio">Volver al inicio</a></div>
				<div class="six columns"><input type="submit" class="button radius right" value="Restablecer clave"></div>
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
