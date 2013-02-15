<?php 
include_once('header-login.php'); 
$ferias		= FeriaHelper::retrieveFerias(" AND user_id = ". $user->__get('user_id'));
$artbo		= explode("|", $user->__get('user_artbo'));
if	(count($artbo) < 6)
for ($i=0; $i < 6; $i++)
	$artbo[$i]	= 0;
$countries	= CountryHelper::retrieveCountries(" AND country_activated = 1 ORDER by country_name");
include_once('menu.php'); 
?>
<!-- 2. End menu -->
			
	<!--3. Row main-->
	<div class="row">	
		<!-- panel -->
		<div class="panel">
			<div class="row"><!-- titulo row -->
				<div class="eight columns">
					<span class="rojo">Registro</span>
					<h2><span class="quitarH2">Ferias:</span>  Nombre de la Galería </h2>	
				</div>
				<!-- button back save forward -->
				<div class="two columns offset-by-two">
					<a href="<?php echo APPLICATION_URL?>registro-exposiciones-0420.html" class="back"></a>
					<a href="javascript:void(0);" onClick="document.getElementById('validable').submit();" class="save"></a>
					<a href="<?php echo APPLICATION_URL?>registro-artistas-0440.html" class="forward"></a>
				</div>
				<!-- END button back save forward -->
			</div>	<!-- END titulo row -->
			<hr />
			
				<!-- formulario -->
				<form action="<?php echo APPLICATION_URL?>user.controller/createFeria.html" id="validable" class="" method="post">
					<!-- panel 2 -->
					<div class="panel-2">
						
						<h2>Artbo</h2>
						
						<label>Haz participado en alguna edición de Artbo</label>
						<div class="row">
							<!-- columns artBo 1/4 -->
							<div class="three columns">
								<input type="checkbox" name="artbo_11" <?php if ($artbo[0] == 1) echo 'checked="checked"';?>/> Artbo'11
							</div>
							<!-- END columns artBo 1/4 -->
							<!-- columns artBo 2/4 -->
							<div class="three columns">
								<input type="checkbox" name="artbo_10" <?php if ($artbo[1] == 1) echo 'checked="checked"';?>/> Artbo'10
							</div>
							<!-- END columns artBo 2/4 -->
							<!-- columns artBo 3/4 -->
							<div class="three columns">
								<input type="checkbox" name="artbo_09" <?php if ($artbo[2] == 1) echo 'checked="checked"';?>/> Artbo'09
							</div>
							<!-- columns artBo 3/4 -->
							<!-- END columns artBo 4/4 -->
							<div class="three columns">
								<input type="checkbox" name="artbo_08" <?php if ($artbo[3] == 1) echo 'checked="checked"';?>/> Artbo'08
							</div>
							<!-- END columns artBo 4/4 -->
						</div>	
						<div class="row">
							<!-- columns artBo 1/4 -->
							<div class="three columns">
								<input type="checkbox" name="artbo_07" <?php if ($artbo[4] == 1) echo 'checked="checked"';?>/> Artbo'07
							</div>
							<!-- END columns artBo 1/4 -->
								<!-- columns artBo 2/4 -->
							<div class="three columns">
								<input type="checkbox" name="artbo_06" <?php if ($artbo[5] == 1) echo 'checked="checked"';?>/> Artbo'06
							</div>
							<!-- END columns artBo 2/4 -->
							<!-- columns artBo 3/4 -->
							<div class="three columns">
							</div>
							<!-- END columns artBo 3/4 -->
							<!-- columns artBo 4/4 -->
							<div class="three columns">
							</div>
							<!-- END columns artBo 4/4 -->
						</div>	
					</div>
						<hr />
					<!-- END panel 2 -->
					<h2>Participación en otras ferias</h2>
					<p><em>Registrar las ferias en las que se participo entre el 2011 y el 2012</em></p>
				<!-- END formulario -->
			<ul class="link_list ui-sortable">
			  
			<!-- expo -->
                    	<?php
						if (count($ferias) > 0)
						{
							$i = 1;
							foreach ($ferias as $feria)
							{
						?>            
                                <li class="link_default">
                                    <div class="row">                  
                                        <div class="one columns">
                                            <img src="<?php echo APPLICATION_URL?>images/drag_handle.gif" alt="drag_handle" width="11" height="11" class="image_handle nsr">	
                                        </div>	
                                    <!-- nombre -->
                                        <div class="four columns">
                                            <label>Nombre de la feria</label>	
                                            <input class="expand input-text" type="text" name="feria_name_<?php echo $i;?>" value="<?php echo $feria->__get('feria_name');?>"/>
                                        </div>
                                    <!-- END nombre -->
                                    <!-- ciudad -->
                                        <div class="three columns">
                                            <label>Ciudad</label>	
                                            <input type="text"  name="feria_city_<?php echo $i;?>" class="expand input-text" value="<?php echo $feria->__get('feria_city');?>"/>
                                        </div>
                                    <!-- END ciudad -->
                                    <!-- pais-->
                                        <div class="two columns">
                                            <label>País</label>	
                                            <select name="country_id_<?php echo $i;?>">
                                                <?php
                                                foreach ($countries as $country)
                                                {
                                                    $selected = ($country->__get('country_id') == $user->__get('country_id')) ? 'selected="selected"' : '';
                                                ?>
                                                    <option value="<?php echo $country->__get('country_id')?>" <?php echo $selected;?>><?php echo utf8_encode($country->__get('country_name'));?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    <!-- END País -->
                                    <!-- Año-->
                                        <div class="two columns">
                                            <label>Año</label>	
                                            <select name="feria_year_<?php echo $i;?>">
                                                <option value="2012" <?php if ($feria->__get('feria_year') == 2012)  echo 'selected="selected"';?>>2012</option>
                                                <option value="2011" <?php if ($feria->__get('feria_year') == 2011)  echo 'selected="selected"';?>>2011</option>
                                            </select>
                                        </div>
                                <!-- END Año -->
                                    </div>
                                </li>
                    	<?php
								$i++;
							}
						}
						else
						{
						?>
                                <li class="link_default">
                                    <div class="row">                  
                                        <div class="one columns">
                                            <img src="<?php echo APPLICATION_URL?>images/drag_handle.gif" alt="drag_handle" width="11" height="11" class="image_handle nsr">	
                                        </div>	
                                    <!-- nombre -->
                                        <div class="four columns">
                                            <label>Nombre de la feria</label>	
                                            <input class="expand input-text" type="text" name="feria_name_1" />
                                        </div>
                                    <!-- END nombre -->
                                    <!-- ciudad -->
                                        <div class="three columns">
                                            <label>Ciudad</label>	
                                            <input type="text"  name="feria_city_1" class="expand input-text"/>
                                        </div>
                                    <!-- END ciudad -->
                                    <!-- pais-->
                                        <div class="two columns">
                                            <label>País</label>	
                                            <select name="country_id_1">
                                                <?php
                                                foreach ($countries as $country)
                                                {
                                                ?>
                                                    <option value="<?php echo $country->__get('country_id')?>"><?php echo utf8_encode($country->__get('country_name'));?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    <!-- END País -->
                                    <!-- Año-->
                                        <div class="two columns">
                                            <label>Año</label>	
                                            <select name="feria_year_1">
                                                <option value="2012">2012</option>
                                                <option value="2011">2011</option>
                                            </select>
                                        </div>
                                <!-- END Año -->
                                    </div>
                                </li>                        
                        <?php
						}
						?>            
                                
			<!-- end Expo --> 
			</ul>	
			</form>
			<!-- END formulario -->
			<hr />

			<a href="#" id="add-feria">Agregar una nueva feria +</a>
			<!-- botones anterior guardar siguiente -->
         
					<div class="row">
					<table class="right">
						<tr>
							<td>
								<div class="anterior left"><!-- anterior -->
									<a href="<?php echo APPLICATION_URL?>registro-exposiciones-0420.html">Anterior</a>
								</div><!-- END anterior -->
							</td>
							<td>
								<div class="save left"> <!-- guardar -->
									<a href="javascript:void(0);" onClick="document.getElementById('validable').submit();" class="guardar">Guardar</a>
								</div><!-- END guardar -->
							</td>
							<td>
								<div class="siguiente left"><!-- siguiente -->
									<ahref="<?php echo APPLICATION_URL?>registro-artistas-0440.html">Siguiente</a>
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
	<img src="<?php echo APPLICATION_URL?>images/resources/sombraFinal.png" class="top-sombra" width="980" height="17" alt="sombra" /><!-- Sombra final del panel -->
</div>	<!-- 3. END Main: Row -->
<script language="javascript">
$(document).ready(function() 
						   {
							   
							// nueva expo
							var counterFeria 	= <?php echo (count($ferias) > 0) ? count($ferias)+1 : 2; ?>;
							// nueva feria
							var countryOptions	= '<?php foreach($countries as $country) {?><option value="<?php echo $country->__get('country_id');?>"><?php echo utf8_encode($country->__get('country_name'));?></option><?php } ?>';
							$("#add-feria").click(function(){
							$(".link_list").hide().append('<!-- expo --><li class="link_default"><div class="row"><div class="one columns"><img src="<?php echo APPLICATION_URL?>images/drag_handle.gif" alt="drag_handle" width="11" height="11" class="image_handle nsr">	</div>	<!-- nombre --><div class="four columns"><label>Nombre de la feria</label>	<input class="expand input-text" type="text" name="feria_name_'+counterFeria+'" /></div><!-- END nombre --><!-- ciudad --><div class="three columns"><label>Ciudad</label>	<input type="text"  class="expand input-text" name="feria_city_'+counterFeria+'"/></div><!-- END ciudad --><!-- pais--><div class="two columns"><label>País</label>	<select name="country_id_'+counterFeria+'">'+countryOptions+'</select></div><!-- END País --><!-- Año--><div class="two columns"><label>Año</label><select name="feria_year_'+counterFeria+'"><option value="2012">2012</option><option value="2011">2011</option><option>2010</option></select></div><!-- END Año --></li><!-- end Expo --> ').fadeIn(1000);
							counterFeria = counterFeria + 1;
							});// end nueva feria

						   
						    });
</script>
<!-- 3. footer -->			
<?php include_once('footer.php'); ?>
<!-- 3. End footer -->


