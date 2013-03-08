
<?php 
include_once('header-login.php');  
include_once('menu.php'); ?>
			
	<div class="row main-row">	
		<!-- <div class="alert-box success">
	    	Sus datos han sido guardados
	    	<a href="" class="close">×</a>
		</div> -->
		<div class="panel nopadding">
			<div class="inner-header">
				<div class="row">
					<div class="eight columns title">
						<strong class="redtext bold">Portafolio</strong>
						<h2><?php echo $user->__get('user_name');?></h2>
					</div><!--/title-->
					
					<div class="four columns mini-nav-header">
						<dl class="sub-nav">
							<dd><a class="save" title="Guardar" href="javascript:void(0);" onClick="document.getElementById('validable').submit();" >Guardar</a></dd>
							<dd><a class="prev" title="Proyecto Artecámara" href="<?php echo APPLICATION_URL?>registro-proyecto-0430.html">Anterior</a></dd>
							<dd><h4>4/5</h4></dd>
							<dd><a class="next" title="Documentos" href="<?php echo APPLICATION_URL?>registro-documentos-0450.html" >Siguiente</a></dd>
						</dl>	
					</div>
				</div><!--/row inner-header-->
			</div>
			
		<div class="container">
			<div class="row form-data">	
				<div class="twelve columns">
					<form action="<?php echo APPLICATION_URL?>user.controller/createProyects.html" method="post" id="validable" accept-charset="utf-8">
						<?php include_once 'inc-portafolio.php'; ?>
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
								<a title="Proyecto Artecámara" href="<?php echo APPLICATION_URL?>registro-proyecto-0430.html" class="graytxt">Anterior</a>  
								<a href="<?php echo APPLICATION_URL?>registro-documentos-0450.html" title="Documentos" class="button radius">Siguiente: Portafolio</a>
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