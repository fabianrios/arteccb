<?php 
include_once('header-login.php'); 
include_once('menu.php'); 
if (isset($_GET[0]))
{
?>
<script language="javascript">
	confirm ("Gracias por su participaci&oacute;n. En breve recibir&aacute; un email de confirmaci&oacute;n. La lista de los artistas seleccionados para exponer en el Pabellón Artec&aacute;mara en artBO 2013 se dar&aacute; a conocer a partir del 5 de junio en www.artboonline.com");
</script>
<?php
}
$userForms	= UserFormHelper::retrieveUserForms(" AND user_id = ".escape($_SESSION['user_id']));
$class		= 'nulled';
if (count($userForms) == 4)
{
	$action		= "document.getElementById('validable').submit();";
	$class		= '';
}
else
	$action		= "alertNotYet()";
?>
<script language="javascript">
function alertNotYet()
{
	alert ('Debe completar los pasos anteriores antes de guardar su formulario');
}
</script>			
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
							<dd><a class="save" title="Guardar" href="javascript:void(0);" onClick="<?php echo $action;?>" >Guardar</a></dd>
							<dd><a class="prev" title="Portafolio" href="<?php echo APPLICATION_URL?>registro-portafolio-0440.html">Anterior</a></dd>
							<dd><h4>5/5</h4></dd>
						</dl>	
					</div>
				</div><!--/row inner-header-->
			</div>
			
		<div class="container">
			<div class="row form-data">	
				<div class="twelve columns">
					
					<form action="<?php echo APPLICATION_URL?>user.controller/uploadDocuments.html" id="validable" class="" method="post" enctype="multipart/form-data">
						<p>Suba sus documentos en formato JPG o PDF únicamente. Con un peso máximo de 1000KB </p>
							
							<!-- row -->
							<div class="row">
							
								<!-- Col 1/4-->				
					
													
								<div class="twelve columns">
								
								
								<ul class="documents no-bullet">	
									<li>
										<div class="row">
											<div class="eight columns">		
												<h4><span class="asterix">*</span>Documento de identidad</h4>
												<p>Suba el documento de identidad del artista participante o responsable del colectivo (cédula de ciudadanía o de extranjería)</p>
								        	</div>
								        	<!-- <div class="four columns">
								        		<img src="http://cambelt.co/icon/camera/235x150?color=b71632,fefefe" class="images right" title="Imagen del director">
											</div> -->
											<div class="four columns"> 		 
												<?php
							                    $image	= ($user->__get('user_document') != '') ? APPLICATION_URL.$dir.$user->__get('user_certificate') : $default;
							                      if (strpos($image, '.pdf')  !== false) $image	= 'http://cambelt.co/icon/document/230x170?color=3fc46b,fefefe';  
							                    ?>      
							                    <?php if($user->__get('user_document') != '') { ?><img class="images right" src="<?php echo $image?>"><?php }?>     
							                    <div id="user_document"></div>     
								        	 </div>
										</div>
								    </li>
								   </ul>
					             </div>
								<!-- End Col 3/4 -->
								<!-- Col 4/4-->				
							 <?php if ($user->__get('user_document') != '') { ?><!--<p><a target="_blank" href="resources/images/<?php echo makeUrlClear(utf8_decode($user->__get('user_name')))?>/<?php echo $user->__get('user_document');?>">Documento Cargado en el sistema</a></p>--><?php } ?>
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
								<a href="javascript:void(0);" onClick="<?php echo $action;?>" class="button radius <?php echo $class;?>">Finalizar</a>  
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
	<script>
      $(document).ready(function() {
        var manualuploader = new qq.FineUploader({
		  debug: true, 												 
          element: $('#user_document')[0],
          request: {
            endpoint: '<?php echo APPLICATION_URL;?>upload.controller/<?php echo $_SESSION['user_id'];?>/user_document.html'
          },
          autoUpload: true,
          text: {
            uploadButton: '<i class="icon-plus icon-white"></i> Seleccione archivo'
          }
        });
      });
    </script>	

	
<?php include_once('footer.php'); ?>