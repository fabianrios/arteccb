<?php
$users	= UserPHelper::retrieveUsers(" AND user_verification = '" . escape($_GET[0]) . "'");
if (count($users) == 1)
{
	$_SESSION['panel_id']	= $user[0]->__get('user_id');
}
else
	redirectUrl(APPLICATION_URL.'login.panel.html');
?>
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
	    	<div class="alert-box error">
	    		Las claves no coinciden. Prueba de nuevo.
	    		<a href="" class="close" title="Cerrar">&times;</a>
	    	</div>
	    	<!-- END  casilla de alerta -->
	    	<form action="userp.controller/changePasswordOC.html">
			<div class="panel"><!-- Panel -->
			<h3>Restablecer clave</h3>
				<!-- login form -->
		    	<p>Introduzca una nueva clave para su cuenta de artBO.</p>
		    
		    	<div class="mid-input-div"><!-- Div Input -->
		    		<label>Clave</label>
		        	<input type="password" class="expand input-text" name="user_password" required="required">
		    	</div><!-- END Div Input -->
		    	
		    	<div class="mid-input-div"><!-- Div Input -->
		    		<label>Confirmar clave</label>
		        	<input type="password" class="expand input-text" name="user_password_2" required="required">
		    	</div><!-- END Div Input -->

			</div>  <!-- End Panel -->
			<div class="row">
				<div class="six columns"><a href="login.panel.html" class="bold whitetxt" title="Restablecer clave">Cancelar</a></div>
				<div class="six columns"><input type="submit" class="button radius right" value="Restablecer contaseña"></div>
			</div>
			</form>
		</div><!-- six columns -->
	</div><!-- End Row -->
</div>	
<!-- End content -->
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
 


