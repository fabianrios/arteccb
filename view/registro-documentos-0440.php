<?php 
include_once('header-login.php'); 
include_once('menu.php'); 
if (isset($_GET[0]))
{
?>
<script language="javascript">
	confirm ("Gracias por participar en la convocatoria para el Pabellón Artecámara – Artistas Emergentes de Artbo 2012. La lista de artistas seleccionados se dará a conocer el 1 de agosto de 2012 en www.artboonline.com. ");
</script>
<?php
}
?>
<!-- 2. End menu -->
			
	<!--3. Row main-->
	<div class="row">	
		<!-- panel -->
		<div class="panel">
			<div class="row"><!-- titulo row -->
				<div class="nine columns">
					<span class="rojo">Registro</span>
					<h2><span class="quitarH2">Documentos:</span> <?php echo $user->__get('user_name');?></h2>	
				</div>
				<!-- button back save forward -->
				<div class="two columns offset-by-one">
					<a href="<?php echo APPLICATION_URL?>registro-proyecto-0430.html"class="back"></a>
					<a href="javascript:void(0);" onClick="document.getElementById('validable').submit();" class="save"></a>
				</div>
				<!-- END button back save forward -->
			</div>	<!-- END titulo row -->
			<hr />
			<form action="<?php echo APPLICATION_URL?>user.controller/uploadDocuments.html" id="validable" class="" method="post" enctype="multipart/form-data">
			<p>Sube tus documentos en formato JPG o PDF únicamente. Con un peso máximo de 1000KB</p>
				
				<!-- row -->
				<div class="row">
				
					<!-- Col 1/4-->				

										
					<div class="three columns">
							
						<h4>Documento de identidad</h4>
						<input type="file" name="user_document">
                        <p>Suba el documento de identidad del artista participante (cédula de ciudadanía o de extranjería)</p>
                        <?php if ($user->__get('user_document') != '') { ?><p><a href="resources/images/<?php echo makeUrlClear(utf8_decode($user->__get('user_name')))?>/<?php echo $user->__get('user_document');?>">Documento Cargado en el sistema</a></p><?php } ?>
					</div>
					<!-- End Col 3/4 -->
					<!-- Col 4/4-->				
				
				</div>
				<br />
				<!-- aceptación de terminos -->
				<div class="panel-2">
				<p> Yo <input type="text" class="medium" placeholder="Nombre del Artista"  name="user_name_accept" value="<?php echo $user->__get('user_name_accept');?>" /> Identificado con
					<input type="text" class="small" placeholder="Número de Cédula" name="user_document_accept" value="<?php echo $user->__get('user_document_accept');?>"  /> 
				declaro conocer y aceptar <a href="#">las condiciones y el reglamento de participación</a> en el Pabellón Artecámara – Artistas Emergentes de Artbo 
				</p>
				
				<input type="checkbox" name="user_accept" value="1" <?php if($user->__get('user_accept') == 1) { echo 'checked="checked"'; }?> /><span> Acepto</span>
				</div>
				<!-- aceptación de terminos -->

				<!-- END row -->
                </form>
				<hr />
			<!-- botones anterior guardar siguiente -->
					<div class="row">
					<table class="right">
						<tr>
							<td>
								<div class="anterior left"><!-- anterior -->
									<a href="<?php echo APPLICATION_URL?>registro-proyecto-0430.html">Anterior</a>
								</div><!-- END anterior -->
							</td>
							<td>
								<div class="save left"> <!-- guardar -->
									<a href="javascript:void(0);" onClick="document.getElementById('validable').submit();" class="guardar">Terminar</a>
								</div><!-- END guardar -->
							</td>
						</tr>
                        <?php 
						if (isset($_GET[0]))
						{
						?>
						<tr>
							<td colspan="3"><p class="text-center azul">TU REGISTRO SE HA GUARDADO</p></td>
						</tr>
                        <?php
						}
						?>
					</table>
					</div>	
					<!-- END botones anterior guardar siguiente -->
		
			
	
	</div><!-- END Main: Panel -->
	<img src="<?php echo APPLICATION_URL?>images/resources/sombraFinal.png" class="top-sombra" width="980" height="17" alt="sombra" /><!-- Sombra final del panel -->
</div>	><!-- 3. END Main: Row -->

<!-- 3. footer -->			
<?php include_once('footer.php'); ?>
<!-- 3. End footer -->

