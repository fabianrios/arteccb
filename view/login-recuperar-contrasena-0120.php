
<?php
include_once('header-nologin2.php'); 
$email = urldecode($_GET[0]);
?>

<body>		
<div class="container">
	<div class="row"><!-- Row -->	
		<div class="six columns centered"><!-- six columns -->
			<span class="artBO">Artbo</span><span class="ccB">CCB</span>
			<div class="alert-box success">
				Correo enviado con &eacute;xito
				<a href="#" class="close">&times;</a>
			</div>
			<div class="panel">
				<h3>Restablecer contraseña</h3>
				<p>Hemos enviado un correo a <a class="bold" href="mailto:<?php echo $email?>"><?php echo $email?> </a> con instrucciones. Recuerda revisar en tu carpeta de <strong>Spam</strong> si no lo encuentras.</p>
			</div>
			<div class="row">
				<div class="eight columns"><span class="whitetxt bold">En todo caso puedes <a href="<?php echo APPLICATION_URL?>login-recuperar-contrasena-0110.html" title="Restablecer contraseña">enviarlo nuevamente.</a></span></div>
				<div class="four columns"><a class="button radius right" href="<?php echo APPLICATION_URL?>login.html" title="Inicia Sesion">Inicia sesión</a></div>
			</div>
		</div>
	</div>
</div>	
			
<!-- 3. footer -->			
<?php include_once('footer.php'); ?>
<!-- 3. End footer -->
<?php include_once('randomizer.php'); ?>