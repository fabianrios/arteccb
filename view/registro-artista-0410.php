

<?php include_once(SITE_VIEW.'header-login.php'); ?>


		
<!-- 2.menu-->
<?php include_once(SITE_VIEW.'menu.php'); ?>
<!-- 2. End menu -->
			
	<!--3. Row main-->
	<div class="row">	
		<!-- panel -->
		<div class="panel">
			<div class="row"><!-- titulo row -->
				<div class="eight columns">
					<span class="rojo">Registro</span>
					<h2><span class="quitarH2">Datos Personales:</span> <?php echo $user->__get('user_name');?></h2>
				</div>
				<!-- button back save forward -->
				<div class="two columns offset-by-two">
					<a href="<?php echo APPLICATION_URL?>registro-inicio-0400.html" class="back"></a>
					<a href="javascript:void(0);" onClick="document.getElementById('validable').submit();" class="save"></a>
					<a href="<?php echo APPLICATION_URL?>registro-exposiciones-0420.html" class="forward"></a>
				</div>
				<!-- END button back save forward -->
			</div>	<!-- END titulo row -->
				<hr />
					<!-- row -->
					<div class="row">	
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