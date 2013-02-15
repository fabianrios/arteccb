

<?php include_once('header-login.php'); ?>

<!-- 2.menu-->
<?php include_once('menu.php'); ?>
<!-- 2. End menu -->
			
	<!--3. Row main-->
<div class="row">	
	<!-- panel -->
	<div class="panel">
		<div class="row"><!-- titulo row -->
				<div class="eight columns">
					<span class="rojo">Registro</span>
					<h2><span class="quitarH2"> Tipo de stand: </span>Nombre de la Galería </h2>
					<p>Descargue pdf con información sobre los <a href="documentos/stand.pdf" title="Stands">stands de Artbo</a></p>
	
				</div>
				<!-- button back save forward -->
				<div class="two columns offset-by-two">
					<a href="<?php echo APPLICATION_URL?>registro-artistas-0440.html" class="back"></a>
					<a href="javascript:void(0);" onClick="document.getElementById('validable').submit();" class="save"></a>
					<a href="<?php echo APPLICATION_URL?>registro-documentos-0460.html" class="forward"></a>
				</div>
				<!-- END button back save forward -->
			</div>	<!-- END titulo row -->
		<hr />
        		<form action="<?php echo APPLICATION_URL?>user.controller/selectStand.html" id="validable" class="" method="post">
					<input type="hidden" name="user_stand_type" value="<?php echo $user->__get('user_stand_type')?>" id="selectedStand" />
                <!-- row -->
				<div class="row">
					<div class="eleven columns centered clearfix">
					
                    <?php
					if ($user->__get('user_gallery_type') != 2)
					{
					?>
                        <!-- Col 1/5-->				
                        <div class="two columns" >
                            <img src="<?php echo APPLICATION_URL?>images/63.jpg" class="images" width="200" height="200" alt="default" <?php if ($user->__get('user_stand_type') == 1) echo 'style="border-color:#FF0000;"'; ?>/>
                                
                            <h4 id="h4-1">Plus 63 mts2</h4>
                            <p>USD$15.498.00</p>
                            <a href="javascript:void(0);" onClick="document.getElementById('selectedStand').value='1'; document.getElementById('validable').submit(); " class="round small button">Seleccionar</a>
                        </div>
                        <!-- End Col 1/5 -->
                        <!-- Col 2/5-->				
                        <div class="two columns">
                            <img src="<?php echo APPLICATION_URL?>images/63.jpg" class="images" width="200" height="200" alt="default" <?php if ($user->__get('user_stand_type') == 2) echo 'style="border-color:#FF0000;"'; ?>/>
                                
                            <h4>63 mts2</h4>
                            <p>USD$14.301.00</p>
                            <a href="javascript:void(0);" onClick="document.getElementById('selectedStand').value='2'; document.getElementById('validable').submit();" class="round small button">Seleccionar</a>
                        </div>
                        <!-- End Col 2/5 -->
                        <!-- Col 3/5-->				
                        <div class="two columns">
                            <img src="<?php echo APPLICATION_URL?>images/45.jpg" class="images" width="200" height="200" alt="default" <?php if ($user->__get('user_stand_type') == 3) echo 'style="border-color:#FF0000;"'; ?>/>
                                
                            <h4>45 mts2</h4>
                            <p>USD$10.215.00</p>
                            <a href="javascript:void(0);" onClick="document.getElementById('selectedStand').value='3'; document.getElementById('validable').submit();" class="round small button">Seleccionar</a>
                        </div>
                        <!-- End Col 3/5 -->
                        <!-- Col 4/5-->				
                        <div class="two columns">
                            <img src="<?php echo APPLICATION_URL?>images/33.jpg" class="images" width="200" height="200" alt="default" <?php if ($user->__get('user_stand_type') == 4) echo 'style="border-color:#FF0000;"'; ?>/>
                                
                            <h4>33.75 mts2</h4>
                            <p>USD$7.661.00</p>
                            <a href="javascript:void(0);" onClick="document.getElementById('selectedStand').value='4'; document.getElementById('validable').submit();" class="round small button">Seleccionar</a>
                        </div>
                        <!-- End Col 4/5 -->
                        <!-- Col 5/5-->				
                        <div class="two columns">
                            <img src="<?php echo APPLICATION_URL?>images/31.jpg" class="images" width="200" height="200" alt="default" <?php if ($user->__get('user_stand_type') == 5) echo 'style="border-color:#FF0000;"'; ?>/>
                                
                            <h4>31,50 mts2</h4>
                            <p>USD$ 7.749.00</p>
                            <a href="javascript:void(0);" onClick="document.getElementById('selectedStand').value='5'; document.getElementById('validable').submit();" class="round small button">Seleccionar</a>
                        </div>
                        <!-- End Col 5/5 -->
					<?php
					}
					else
					{
					?>
					<div class="two columns">
						<img src="<?php echo APPLICATION_URL?>images/21.jpg" class="images" width="200" height="200" alt="default"/>
							
						<h4>21 mts2</h4>
						<p>USD$ 7.749.00</p>
						<a href="javascript:void(0);" onClick="document.getElementById('selectedStand').value='6'; document.getElementById('validable').submit();" class="round small button">Seleccionar</a>
					</div>
					<?php
					}
					?>
					</div>
					
				</div>
                </form>
				<!-- END row -->	
				<hr />
				
			<!-- botones anterior guardar siguiente -->
					<div class="row">
					<table class="right">
						<tr>
							<td>
								<div class="anterior left"><!-- anterior -->
									<a href="<?php echo APPLICATION_URL?>registro-artistas-0440.html" >Anterior</a>
								</div><!-- END anterior -->
							</td>
							<td>
								<div class="save left"> <!-- guardar -->
									<a href="javascript:void(0);" onClick="document.getElementById('validable').submit();" class="guardar">Guardar</a>
								</div><!-- END guardar -->
							</td>
							<td>
								<div class="siguiente left"><!-- siguiente -->
									<a href="<?php echo APPLICATION_URL?>registro-documentos-0460.html">Siguiente</a>
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
			
		
				
	</div><!-- END Main: Panel -->
	<img src="<?php echo APPLICATION_URL?>images/resources/sombraFinal.png" class="top-sombra" width="980" height="17" alt="sombra"/><!-- Sombra final del panel -->
</div>	><!-- 3. END Main: Row -->

<!-- 3. footer -->			
<?php include_once('footer.php'); ?>
<!-- 3. End footer -->

