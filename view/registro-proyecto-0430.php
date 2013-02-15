<?php 
include_once(SITE_VIEW.'header-login.php');
$obras	=	ObraHelper::retrieveObras(" AND user_id = ". $user->__get('user_id') . "  ORDER by obra_year");
include_once(SITE_VIEW.'menu.php'); ?>
<!-- 2. End menu -->
			
	<!--3. Row main-->
	<div class="row">	
		<!-- panel -->
		<div class="panel">
			<div class="row"><!-- titulo row -->
				<div class="eight columns">
					<span class="rojo">Registro</span>
					<h2><span class="quitarH2">Proyecto Artecámara:</span>  <?php echo $user->__get('user_name');?></h2>	
				</div>
				<!-- button back save forward -->
				<div class="two columns offset-by-two">
					<a href="<?php echo APPLICATION_URL?>registro-exposiciones-0420.html"  class="back"></a>
					<a  href="javascript:void(0);" onClick="document.getElementById('validable').submit();" class="save"></a>
					<a href="<?php echo APPLICATION_URL?>registro-documentos-0440.html"  class="forward"></a>
				</div>
				<!-- END button back save forward -->
			</div>	<!-- END titulo row -->
			<hr />
			
				<!-- formulario -->
				<form action="<?php echo APPLICATION_URL?>user.controller/createProyects.html" id="validable" class="" method="post" enctype="multipart/form-data">
					<!-- panel 2 -->
					
					<div class="row">
						<h2>Proyecto</h2>
						<strong>Descripción del proyecto*</strong>
						<label>Descripción del proyecto a presentar en el Pabellón Artecámara – Artistas Emergentes de Artbo 2012 (Máx. 500 caracteres).</label>
						<textarea class="expand" name="user_proyect_description" rows="10"><?php echo $user->__get('user_proyect_description');?></textarea>
						<div>
							<table width="100%">
								<tr>
							  		<td width="39%">
							  			<label><strong>Nombre de la obra</strong></label>
							  			<input class="expand input-text" type="text" name="user_proyect_name" value="<?php echo $user->__get('user_proyect_name');?>"  />
							  		</td>
							  	
							  		<td width="23%">
							  			<label><strong>Dimensiones</strong> (mts)</label>
							  			<input class="expand input-text" name="user_proyect_dimensions" value="<?php echo $user->__get('user_proyect_dimensions');?>" type="text" />
							  		</td>

							  		<td width="30%">
							  			<label><strong>Formato o técnica</strong></label>
							  			<input class="expand input-text" type="text" name="user_proyect_format" value="<?php echo $user->__get('user_proyect_format');?>" />
							  		</td>
							  	
							  		<td width="8%">
							  			<label><strong>Año</label>	
							    		<select name="user_proyect_year">
							    			<option <?php if ($user->__get('user_proyect_year') == 2012) echo 'selected="selected"';?>>2012</option>
							    			<option <?php if ($user->__get('user_proyect_year') == 2011) echo 'selected="selected"';?>>2011</option>
							    			<option <?php if ($user->__get('user_proyect_year') == 2010) echo 'selected="selected"';?>>2010</option>
							    			<option <?php if ($user->__get('user_proyect_year') == 2009) echo 'selected="selected"';?>>2009</option>
							    			<option <?php if ($user->__get('user_proyect_year') == 2008) echo 'selected="selected"';?>>2008</option>
							    			<option <?php if ($user->__get('user_proyect_year') == 2007) echo 'selected="selected"';?>>2007</option>
							    		</select>
							  		</td>
								</tr>
							  
								<tr>
							  		<td colspan="3">
							  			<label><strong>Url de la obra</strong></label>
							  			<input class="expand input-text" type="text"  name="user_proyect_url" placeholder="http://www.miobra.com.co" value="<?php echo $user->__get('user_proyect_url');?>" />
							  		</td>
							    </tr>
							    
							    <tr>
							  	     <td colspan="3">
							  			<strong>Imágenes</strong>
										<label>Incluya tres imágenes del proyecto a presentar en Artecámara</label>
									</td>
							    </tr>

							    <tr>
							  	<td width="33">
							  		<input type="file"  name="user_proyect_image_1"><?php if($user->__get('user_proyect_image_1') != '') { ?><img height="50" width="50" src="<?php echo APPLICATION_URL?>resources/images/<?php echo makeUrlClear(utf8_decode($user->__get('user_name')))?>/proyecto/<?php echo $user->__get('user_proyect_image_1')?>"><?php }?>
							  	</td>
							  	<td width="33">
							  	    <input type="file"  name="user_proyect_image_2"><?php if($user->__get('user_proyect_image_2') != '') { ?><img height="50" width="50" src="<?php echo APPLICATION_URL?>resources/images/<?php echo makeUrlClear(utf8_decode($user->__get('user_name')))?>/proyecto/<?php echo $user->__get('user_proyect_image_2')?>"><?php }?>
							  	</td>
							  	<td width="33">
							  	    <input type="file"  name="user_proyect_image_3"><?php if($user->__get('user_proyect_image_3') != '') { ?><img height="50" width="50" src="<?php echo APPLICATION_URL?>resources/images/<?php echo makeUrlClear(utf8_decode($user->__get('user_name')))?>/proyecto/<?php echo $user->__get('user_proyect_image_3')?>"><?php }?>
							    </td>
							  </tr>
							  
							</table>
							<label>Puede cargar imágenes en .jpg, .png o .gif. El archivo no debe superar los 1000 KB.</label>
						</div>
					</div>
					<hr/>

					<h2>Portafolio</h2>
					<p><em>Incluya hasta cinco obras realizadas desde 2007 a la fecha.</em></p>
				<!-- END formulario -->
			<ul class="link_list ui-sortable">
                    	<?php
						if (count($obras) > 0)
						{
							$i = 1;
							foreach ($obras as $obra)
							{
						?>  
                            <li class="link_default">
                                <table width="100%">
                                  <tr>
                                    <td width="5%"><img src="<?php echo APPLICATION_URL?>images/drag_handle.gif" alt="drag_handle" width="11" height="11" class="image_handle nsr"></td>
                                    <td width="35%">
                                        <label><strong>Nombre de la obra</strong></label>
                                        <input name="obra_name_<?php echo $i;?>" class="expand input-text" type="text" value="<?php echo $obra->__get('obra_name');?>"/>
                                        <input name="obra_id_<?php echo $i;?>" class="expand input-text" type="hidden" value="<?php echo $obra->__get('obra_id');?>"/>
                                    </td>
                                    
                                    <td width="30%">
                                        <label><strong>Dimensiones</strong> (mts)</label>
                                    <input name="obra_dimensions_<?php echo $i;?>" class="expand input-text" type="text" value="<?php echo $obra->__get('obra_dimensions');?>"/>
                                    
                                    </td>


                                    <td width="20%">
                                        <label><strong>Formato o técnica</strong></label>
                                        <input name="obra_format_<?php echo $i;?>"  class="expand input-text" type="text" value="<?php echo $obra->__get('obra_format');?>" />
                                    </td>
                                    <td width="8%">
                                        <label><strong>Año</label>	
                                            <select name="obra_year_<?php echo $i;?>">
                                                <option value="2012" <?php if ($obra->__get('obra_year') == 2012) echo 'selected="selected"';?>>2012</option>
                                                <option value="2011" <?php if ($obra->__get('obra_year') == 2011) echo 'selected="selected"';?>>2011</option>
                                                <option value="2010" <?php if ($obra->__get('obra_year') == 2010) echo 'selected="selected"';?>>2010</option>
                                                <option value="2009" <?php if ($obra->__get('obra_year') == 2009) echo 'selected="selected"';?>>2009</option>
                                                <option value="2008" <?php if ($obra->__get('obra_year') == 2008) echo 'selected="selected"';?>>2008</option>
                                                <option value="2007" <?php if ($obra->__get('obra_year') == 2007) echo 'selected="selected"';?>>2007</option>
                                            </select>
                                    </td>
                                  </tr>
                                  <tr>
                                  	<td></td>
                                  	<td colspan="3">
                                        <label><strong>Url de la obra</strong></label>
                                        <input name="obra_url_<?php echo $i;?>" placeholder="http://www.miobra.com.co" class="expand input-text" type="text" value="<?php echo $obra->__get('obra_url');?>" />
                                    </td>
                                   </tr>
                                   <tr>
                                   <td></td>
                                  	<td colspan="2">
                                    	<label><strong>Imagen de la obra</strong></label>
                                    	<label>Puede cargar imágenes en .jpg, .png o .gif. El archivo no debe superar los 1000 KB.</label>
                                   	    <input name="obra_image_<?php echo $i;?>" type="file"><?php if($obra->__get('obra_image') != '') { ?><img width="50" height="50" src="<?php echo APPLICATION_URL?>resources/images/<?php echo makeUrlClear(utf8_decode($user->__get('user_name')))?>/obras/<?php echo $obra->__get('obra_image')?>"><?php }?>
                                  </td>
                                  </tr>
                                </table>
                            </li>                        
                        <?php
							$i++;
							}
						}
						else
						{
							$obra	= new Obra();
						?>
                        <li class="link_default">
                                <table width="100%">
                                  <tr>
                                    <td width="5%"><img src="<?php echo APPLICATION_URL?>images/drag_handle.gif" alt="drag_handle" width="11" height="11" class="image_handle nsr"></td>
                                    <td width="35%">
                                        <label><strong>Nombre de la obra</strong></label>
                                        <input name="obra_name_<?php echo $i;?>" class="expand input-text" type="text" value="<?php echo $obra->__get('obra_name');?>"/>
                                    </td>
                                    
                                    <td width="30%">
                                        <label><strong>Dimensiones</strong> (mts)</label>
                                    <input name="obra_dimensions_<?php echo $i;?>" class="expand input-text" type="text" value="<?php echo $obra->__get('obra_dimensions');?>"/>
                                    
                                    </td>


                                    <td width="20%">
                                        <label><strong>Formato o técnica</strong></label>
                                        <input name="obra_format_<?php echo $i;?>"  class="expand input-text" type="text" value="<?php echo $obra->__get('obra_format');?>" />
                                    </td>
                                    <td width="8%">
                                        <label><strong>Año</label>	
                                            <select name="obra_year_<?php echo $i;?>">
                                                <option value="2012" <?php if ($obra->__get('obra_year') == 2012) echo 'selected="selected"';?>>2012</option>
                                                <option value="2011" <?php if ($obra->__get('obra_year') == 2011) echo 'selected="selected"';?>>2011</option>
                                                <option value="2010" <?php if ($obra->__get('obra_year') == 2010) echo 'selected="selected"';?>>2010</option>
                                                <option value="2009" <?php if ($obra->__get('obra_year') == 2009) echo 'selected="selected"';?>>2009</option>
                                                <option value="2008" <?php if ($obra->__get('obra_year') == 2008) echo 'selected="selected"';?>>2008</option>
                                                <option value="2007" <?php if ($obra->__get('obra_year') == 2007) echo 'selected="selected"';?>>2007</option>
                                            </select>
                                    </td>
                                  </tr>
                                  <tr>
                                  	<td></td>
                                  	<td colspan="3">
                                        <label><strong>Url de la obra</strong></label>
                                        <input name="obra_url_<?php echo $i;?>" placeholder="http://www.miobra.com.co" class="expand input-text" type="text" value="<?php echo $obra->__get('obra_url');?>" />
                                    </td>
                                   </tr>
                                   <tr>
                                   <td></td>
                                  	<td colspan="2">
                                    	<label><strong>Imagen de la obra</strong></label>
                                    	<label>Puede cargar imágenes en .jpg, .png o .gif. El archivo no debe superar los 1000 KB.</label>
                                   	    <input name="obra_image_<?php echo $i;?>" type="file"><?php if($obra->__get('obra_image') != '') { ?><img width="50" height="50" src="<?php echo APPLICATION_URL?>resources/images/<?php echo makeUrlClear(utf8_decode($user->__get('user_name')))?>/obras/<?php echo $obra->__get('obra_image')?>"><?php }?>
                                  </td>
                                  </tr>
                                </table>
                            </li>
 		                 <?php
						}
						?>                                                
			<!-- Obra -->
						
			<!-- end Obra --> 
			</ul>	
			</form>
			<!-- END formulario -->

			<a href="#" id="add-obra">Agregar una nueva obra +</a>
			
			<hr />

			<!-- botones anterior guardar siguiente -->        
					<div class="row">
					<table class="right">
						<tr>
							<td>
								<div class="anterior left"><!-- anterior -->
									<a href="<?php echo APPLICATION_URL?>registro-exposiciones-0420.html" >Anterior</a>
								</div><!-- END anterior -->
							</td>
							<td>
								<div class="save left"> <!-- guardar -->
									<a href="javascript:void(0);" onClick="document.getElementById('validable').submit();" class="guardar">Guardar</a>
								</div><!-- END guardar -->
							</td>
							<td>
								<div class="siguiente left"><!-- siguiente -->
									<a href="<?php echo APPLICATION_URL?>registro-documentos-0440.html" >Siguiente</a>
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
$(document).ready(function() {
						   
		var counterObras 	= <?php echo (count($obras) > 0) ? count($obras)+1 : 2; ?>;				   
		$("#add-obra").click(function(){
		$(".link_list").hide().append('<li class="link_default"><table width="100%"><tr><td width="5%"><img src="<?php echo APPLICATION_URL?>images/drag_handle.gif" alt="drag_handle" width="11" height="11" class="image_handle nsr"></td><td width="35%"><label><strong>Nombre de la obra</strong></label><input name="obra_name_'+counterObras+'" class="expand input-text" type="text" /></td><td width="30%"><label><strong>Dimensiones</strong> (mts)</label><input name="obra_dimensions_'+counterObras+'" class="expand input-text" type="text" /></td><td width="20%"><label><strong>Formato o técnica</strong></label><input name="obra_format_'+counterObras+'"  class="expand input-text" type="text" /></td><td width="8%"><label><strong>Año</label>	<select name="obra_year_'+counterObras+'"><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option></select></td></tr><tr><td></td><td colspan="3"><label><strong>Url de la obra</strong></label><input name="obra_url_'+counterObras+'" placeholder="http://www.miobra.com.co" class="expand input-text" type="text" /></td></tr><tr><td></td><td colspan="2"><label><strong>Imagen de la obra</strong></label><label>Puede cargar imágenes en .jpg, .png o .gif. El archivo no debe superar los 1000 KB.</label><input name="obra_image_'+counterObras+'" type="file"></td></tr></table></li>').fadeIn(1000);
		counterObras = counterObras + 1;
		});// end nueva obra
							});
</script>
<!-- 3. footer -->			
<?php include_once('footer.php'); ?>
<!-- 3. End footer -->


