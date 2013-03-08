<?php 
include_once('header-nologin2.php'); 
$error = '';
if ((isset($_GET[0])) && ($_GET[1] == 0))
	$error	= '<div class="alert-box error" id="alert">Un usuario ya ha sido registrado con estos datos.<a href="javascript:void(0);" onClick="document.getElementById(\'alert\').style.display=\'none\';" class="close">&times;</a></div>';
if ((isset($_GET[0])) && ($_GET[1] == 0))
	$error	= '<div class="alert-box error" id="alert">Hay un error en los datos suministrados.<a href="javascript:void(0);" onClick="document.getElementById(\'alert\').style.display=\'none\';" class="close">&times;</a></div>';

?>

<body>
  
<div class="container">
	<div class="row"><!-- Row -->	
		<div class="eight columns centered"><!-- six columns -->
			<span class="artBO">Artbo</span><span class="ccB">CCB</span>
			<header class="intro">
				<h2>Bienvenido al proceso de aplicación al Pabellón Artecámara en artBO 2013</h2>
				<h5>El cual estará abierto hasta el 30 de abril a las 23:59 p.m. (hora colombiana). Este espacio es para artistas plásticos colombianos menores de 40 años y sin representación de una galería comercial.</h5>
				
			</header>
			<div class="options">
				<div class="login">
					<h3>Inicio de sesión</h3>
					<h5>Si ya te registraste una vez o en 2012.</h5>
					<a href="<?php echo APPLICATION_URL?>login.html" class="button radius">Inicio de sesión</a>
				</div>
				<div class="register">
					<h3>Registro</h3>
					<h5>Si nunca te has registrado en el Pabellón Artecámara.</h5>
					<a href="<?php echo APPLICATION_URL?>register.html" class="button radius">Regístrese</a>
				</div>
			</div>
								
		</div><!-- END six columns -->
	</div><!-- End Row -->
</div>	
<!-- End content -->


<!-- 3. footer -->
<?php include_once('footer.php'); ?>
<!-- 3. End footer -->
<?php include_once('randomizer.php'); ?>