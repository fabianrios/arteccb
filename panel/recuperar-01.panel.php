<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>

	<meta charset="utf-8" />

	<!-- Set the viewport width to device width for mobile -->
	<!-- <meta name="viewport" content="width=device-width" /> -->

	<title>artBO</title>
	<!-- Included CSS Files -->
	<link rel="stylesheet" href="<?php echo APPLICATION_URL;?>stylesheets/app.css">
	<link rel="stylesheet" href="<?php echo APPLICATION_URL;?>stylesheets/new.css">
	<link rel="stylesheet" href="<?php echo APPLICATION_URL;?>stylesheets/phase.css">
	<link rel="stylesheet" href="<?php echo APPLICATION_URL;?>stylesheets/foundation-overrides.css">
	<link rel="stylesheet" href="<?php echo APPLICATION_URL;?>stylesheets/ui-lightness/jquery-ui-1.8.18.custom.css">
	<link rel="stylesheet" href="<?php echo APPLICATION_URL;?>stylesheets/jquery.mCustomScrollbar.css">
	<script src="<?php echo APPLICATION_URL;?>javascripts/jquery.min.js"></script>    
	<script src="<?php echo APPLICATION_URL;?>javascripts/jquery-ui-1.8.18.custom.min.js"></script>

	<script type="text/javascript" src="//use.typekit.net/fzq1qvs.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>


	<!--[if lt IE 9]>
		<link rel="stylesheet" href="<?php echo APPLICATION_URL;?>stylesheets/ie.css">
	<![endif]-->


	<!-- IE Fix for HTML5 Tags -->
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

</head>

<body class="bigpic3">
<!-- content -->
<div class="container">
	<div class="row"><!-- Row -->	
		<div class="six columns centered"><!-- six columns -->
		<div class="languages"><span class="label round"><a href="#">English</a> | <a href="#">Español</a></span></div>
			<a href="home.html"><span class="artBO">artBO</span></a><a href="home.html"><span class="ccB">CCB</span></a>
			<!-- casilla de alerta -->
			<div class="alert-box error">
				Nuestro sistema no tiene registro del correo electrónico.<a href="" class="close">&times;</a>
			</div>
	      
			<form action="userp.controller/recover_password.html" class="nice" method="post" id="validable">
				<div class="panel"><!-- Panel -->
					<h3>Restablecer clave</h3>
					<p>Introduzca el correo electrónico que utiliza para su cuenta de artBO y le enviaremos un enlace para restablecer su clave.</p>
			    	<div class="mid-input-div"><!-- Div Input -->
			    		<label>Correo electrónico</label>
			        	<input type="email" class="expand input-text" name="user_email" title="Digite el correo electrónico" required="required">
			    	</div>
				</div>
				<div class="row">
					<div class="six columns"><a class="whitetxt bold" href="login.panel.html" title="Volver al inicio">Volver al inicio</a></div>
					<div class="six columns"><input type="submit" class="button radius right" value="Restablecer clave"></div>
				</div>
			</form>
		</div><!-- six columns -->
	</div><!-- End Row -->
</div>	
<!-- 4. footer -->			


	<script src="<?php echo APPLICATION_URL;?>javascripts/jquery.min.js"></script>
	<script src="<?php echo APPLICATION_URL;?>javascripts/jquery-ui-1.8.18.custom.min.js"></script>
	<script src="<?php echo APPLICATION_URL;?>javascripts/modernizr.foundation.js"></script>
	<script src="<?php echo APPLICATION_URL;?>javascripts/foundation.js"></script>
	<script src="<?php echo APPLICATION_URL;?>javascripts/app.js"></script>	
    <script src="<?php echo APPLICATION_URL;?>javascripts/jquery.mousewheel.min.js"></script>
    <script src="<?php echo APPLICATION_URL;?>javascripts/jquery.mCustomScrollbar.min.js"></script>
    
    

	<!-- Included JS Files -->
	
	<script type="text/javascript">
		jQuery(function($){
			 var randomNum = Math.ceil(Math.random()*7);
			console.log(randomNum);
			 $('body').addClass("bigpic"+randomNum);
		});
	</script>


</body>
<!-- End Body -->
</html>

<!-- 4. End footer -->
 


