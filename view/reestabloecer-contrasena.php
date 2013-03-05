<?php include_once('header-nologin2.php');  
if ($_GET[0] == '')
	redirectUrl(APPLICATION_URL.'login-recuperar-contrasena-0110/error.html');
$users	= UserHelper::retrieveUsers(" AND user_verification = '".escape($_GET[0])."'");
if (count($users) > 0)
{
	$user	= $users[0];
	$_SESSION['user_id']	= $user->__get('user_id');
}
else
{
	redirectUrl(APPLICATION_URL.'login-recuperar-contrasena-0110/error.html');
}
?>		
<script language="javascript">
function validate()
{
	var ret	= true;
	if (document.getElementById("rep_contrasena").value != document.getElementById('contrasena').value) 
	{ 
		alert ('Las contraseñas no coinciden.'); 
		ret	= false; 
	}
	else if (document.getElementById('contrasena').value == '')
	{
		alert ('Escribe una contraseña.');
		ret = false;
	}
	return ret;
}
</script>
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
	    	<form action="<?php echo APPLICATION_URL;?>user.controller/changePasswordOC.html" method="post">
			<div class="panel"><!-- Panel -->
			<h3>Restablecer contraseña</h3>
				<!-- login form -->
				    	<p>Introduce una nueva contraseña para tu cuenta de artBO.</p>
				    
				    	<div class="mid-input-div"><!-- Div Input -->
				    		<label>Contrase&ntilde;a</label>
				        	<input type="password" class="expand input-text" name="contrasena" id="contrasena" required="required">
				    	</div><!-- END Div Input -->
				    	
				    	<div class="mid-input-div"><!-- Div Input -->
				    		<label>Confirmar contrase&ntilde;a</label>
				        	<input type="password" class="expand input-text" name="confirmar" id="rep_contrasena" required="required">
				    	</div><!-- END Div Input -->

			</div>  <!-- End Panel -->
			<div class="row">
				<div class="six columns"><a href="<?php echo APPLICATION_URL?>home.html" class="bold whitetxt" title="Restablecer contraseña">Cancelar</a></div>
				<div class="six columns"><input type="submit" class="button radius right" value="Restablecer contaseña"></div>
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