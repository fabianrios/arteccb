<?php include_once('header-login.php'); ?>
<script language="javascript">
function validate()
{
	var ret	= true;
	if (document.getElementById("rep_contrasena").value != document.getElementById('contrasena').value) 
	{ 
		alert ('Las claves no coinciden.'); 
		ret	= false; 
	}
	else if (document.getElementById('contrasena').value == '')
	{
		alert ('Escribe una contraseña.');
		ret = false;
	}
	return ret;
}
<?php 
if (isset($_GET[0]))
	echo 'alert ("Sus datos fueron actualizados");';
?>
</script>
	<div class="row contenido"><!-- Row -->	
		<!-- columna 1/2 -->
		<div class="six columns centered">
			<form action="<?php echo APPLICATION_URL;?>user.controller/changePassword.html" method="post" accept-charset="utf-8">
				<div class="panel"><!-- panel -->
					<h2>Editar su perfil</h2>
					<label for="contraseña">Nueva contraseña</label>
					<input type="password" name="contrasena" value="" id="contrasena"/>
					<label for="Repetir contraseña">Repetir contraseña</label>
					<input type="password" name="rep_contrasena" value="" id="rep_contrasena"/>
				</div>
				<div class="row">
					<div class="six columns"><a class="bold" title="volver" href="<?php echo APPLICATION_URL?>registro-inicio-0400.html">Volver</a></div>
					<div class="six columns"><input title="guardar" onClick="return validate();" type="submit" name="cambiar" value="Guardar" class="button radius right"/></div>
				</div>
			</form>
			
	
		</div><!-- END columna 1/2 -->
	</div><!-- End Row -->
			
<?php include_once('footer.php'); ?>