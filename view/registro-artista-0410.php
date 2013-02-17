

<?php include_once(SITE_VIEW.'header-login.php'); ?>


		
<!-- 2.menu-->
<?php include_once(SITE_VIEW.'menu.php'); ?>
<!-- 2. End menu -->
			
	<!--3. Row main-->
	<div class="row main-row">	
		<!-- panel -->
		<div class="panel nopadding">
			<div class="inner-header">
				<div class="row">
				<div class="eight columns title">
					<span class="redtext bold">Hoja de vida</span>
					<h2><?php echo $user->__get('user_name');?></h2>
				</div>
				<div class="four columns mini-nav-header">
					<dl class="sub-nav">
						<dd><a class="save" title="Guardar" href="javascript:void(0);" onClick="document.getElementById('validable').submit();" >Guardar</a></dd>
						<dd><a class="prev" title="Instrucciones" href="<?php echo APPLICATION_URL?>registro-inicio-0400.html">Anterior</a></dd>
						<dd><h4>1/4</h4></dd>
						<dd><a class="next" title="Registro espacio" href="<?php echo APPLICATION_URL?>registro-exposiciones-0420.html" >Siguiente</a></dd>
					</dl>	
				</div>
			</div>	<!-- END titulo row -->
					<!-- row -->
					<div class="row form-data">	
						<!-- formulario -->
						<form action="<?php echo APPLICATION_URL?>user.controller/first.html" id="validable" class="" method="post" enctype="multipart/form-data">
						<!-- formulario izq columns 1/2-->	
						<?php include_once(SITE_VIEW.'registro-panel.php'); ?>
						<!-- END formulario izq  columns 1/2-->
						
						<!-- formulario der columns 2/2-->
						<div class="six columns">
							<!-- reseña -->
						
									
						</div>	
						<!-- END formulario der columns 2/2-->			
						</form>	

						<!-- END formulario -->
						<hr />
						<span><strong>*Datos requeridos</strong></span>
			<!-- botones anterior guardar siguiente -->
					<div class="row">                 
					<table class="right">
						<tr>
							<td>
								<div class="anterior left"><!-- anterior -->
									<a href="<?php echo APPLICATION_URL?>registro-inicio-0400.html">Anterior</a>
								</div><!-- END anterior -->
							</td>
							<td>
								<div class="save left"> <!-- guardar -->
									<a href="javascript:void(0);" onClick="document.getElementById('validable').submit();" class="guardar">Guardar</a>
								</div><!-- END guardar -->
							</td>
							<td>
								<div class="siguiente left"><!-- siguiente -->
									<a href="<?php echo APPLICATION_URL?>registro-exposiciones-0420.html">Siguiente</a>
								</div> <!-- END siguiente -->
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
				
				</div>	
				<!-- END row -->
			</div>  <!-- End Panel -->
			<img src="<?php echo APPLICATION_URL?>images/resources/sombraFinal.png" class="top-sombra" width="980" height="17" alt="sombra"/><!-- Sombra final del panel -->					
		</div><!-- END six columns -->
<!-- End content -->
			
<?php include_once('footer.php'); ?>