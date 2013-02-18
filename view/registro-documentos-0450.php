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
			
	<div class="row main-row">	
		<!-- <div class="alert-box success">
	    	Sus datos han sido guardados
	    	<a href="" class="close">×</a>
		</div> -->
		<div class="panel nopadding">
			<div class="inner-header">
				<div class="row">
					<div class="eight columns title">
						<strong class="redtext bold">Documentos</strong>
						<h2><?php echo $user->__get('user_name');?></h2>
					</div><!--/title-->
					
					<div class="four columns mini-nav-header">
						<dl class="sub-nav">
							<dd><a class="save" title="Guardar" href="javascript:void(0);" onClick="document.getElementById('validable').submit();" >Guardar</a></dd>
							<dd><a class="prev" title="Portafolio" href="<?php echo APPLICATION_URL?>registro-portafolio-0450.html">Anterior</a></dd>
							<dd><h4>5/5</h4></dd>
						</dl>	
					</div>
				</div><!--/row inner-header-->
			</div>
			
		<div class="container">
			<div class="row form-data">	
				<div class="twelve columns">
					
					<form action="<?php echo APPLICATION_URL?>user.controller/uploadDocuments.html" id="validable" class="" method="post" enctype="multipart/form-data">
						<p>Sube tus documentos en formato JPG o PDF únicamente. Con un peso máximo de 1000KB</p>
							
							<!-- row -->
							<div class="row">
							
								<!-- Col 1/4-->				
					
													
								<div class="three columns">
										
									<h4>Documento de identidad</h4>
									<input type="file" name="user_document">
					                <p>Suba el documento de identidad del artista participante (cédula de ciudadanía o de extranjería)</p>
					                <?php if ($user->__get('user_document') != '') { ?><p><a target="_blank" href="resources/images/<?php echo makeUrlClear(utf8_decode($user->__get('user_name')))?>/<?php echo $user->__get('user_document');?>">Documento Cargado en el sistema</a></p><?php } ?>
								</div>
								<!-- End Col 3/4 -->
								<!-- Col 4/4-->				
							
							</div>
							<br />
							<!-- aceptación de terminos -->
							<div>
							<p> Yo <input type="text" class="legal" placeholder="Nombre del Artista"  name="user_name_accept" value="<?php echo $user->__get('user_name_accept');?>" /> Identificado con
								<input type="text" class="doc" placeholder="Número de Cédula" name="user_document_accept" value="<?php echo $user->__get('user_document_accept');?>"  /> 
							declaro conocer y aceptar <a href="#">las condiciones y el reglamento de participación</a> en el Pabellón Artecámara – Artistas Emergentes de Artbo 
							</p>
							
							<input type="checkbox" name="user_accept" value="1" <?php if($user->__get('user_accept') == 1) { echo 'checked="checked"'; }?> /><span> Acepto las condiciones y el reglamento de participación</span>
							</div>
							<!-- aceptación de terminos -->
					
							<!-- END row -->
					</form>
					
					
				</div><!--/twelve columns-->
			</div><!--/form-data-->
		</div>
			<!-- botones anterior guardar siguiente -->
			<div class="inner-footer">
				<div class="container">
					<div class="row">
						<div class="eight columns">
							<strong><span class="asterix">*</span>Datos requeridos</strong>
						</div>
						<div class="four columns">
							<div class="right">
								<a title="Portafolio" href="<?php echo APPLICATION_URL?>registro-portafolio-0450.html" class="graytxt">Anterior</a>
								<a href="javascript:void(0);" onClick="document.getElementById('validable').submit();" title="Declaro conocer y aceptar las condiciones y el reglamento de participación" class="button radius guardar">Finalizar</a>  
							</div>
						</div>
					</div>
				</div>
			</div><!--/inner-footer-->
		</div><!-- END Main: Panel -->
		<div class="advisory">
			<span>Recomendamos visualizar en: IE 9.0 - Firefox 10.0 - Safari 5.1 - Chrome 17.0     |     Optimizada 1024 x 768</span>
			<span><a href="#">Términos y Condiciones</a> del Sitio</span>
		</div>
	</div><!--/row main-row-->
	

	
<?php include_once('footer.php'); ?>