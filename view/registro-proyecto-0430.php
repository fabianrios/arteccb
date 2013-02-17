<?php 
include_once(SITE_VIEW.'header-login.php');
$obras	=	ObraHelper::retrieveObras(" AND user_id = ". $user->__get('user_id') . "  ORDER by obra_year");
include_once(SITE_VIEW.'menu.php'); ?>
			
	<div class="row main-row">	
		<!-- <div class="alert-box success">
	    	Sus datos han sido guardados
	    	<a href="" class="close">×</a>
		</div> -->
		<div class="panel nopadding">
			<div class="inner-header">
				<div class="row">
					<div class="eight columns title">
						<strong class="redtext bold">Projecto Artecámara</strong>
						<h2><?php echo $user->__get('user_name');?></h2>
					</div><!--/title-->
					
					<div class="four columns mini-nav-header">
						<dl class="sub-nav">
							<dd><a class="save" title="Guardar" href="javascript:void(0);" onClick="document.getElementById('validable').submit();" >Guardar</a></dd>
							<dd><a class="prev" title="Hoja de vida" href="?php echo APPLICATION_URL?>registro-hoja-vida-0420.html">Anterior</a></dd>
							<dd><h4>5/5</h4></dd>
							<dd><a class="next" title="Portafolio" href="<?php echo APPLICATION_URL?>registro-portafolio-0440.html" >Siguiente</a></dd>
						</dl>	
					</div>
				</div><!--/row inner-header-->
			</div>
			
		<div class="container">
			<div class="row form-data">	
				<div class="twelve columns">
					
					<form action="<?php echo APPLICATION_URL?>user.controller/createProyects.html" id="validable" class="" method="post" enctype="multipart/form-data">
							<!-- panel 2 -->
							
							<div class="row">
								<h2>Proyecto</h2>
								<strong>Descripción del proyecto* (Max. 250 palabras)</strong>
		
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
									  			<label><strong>Año</strong></label>	
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
									  			<input class="expand input-text" type="text"  name="user_proyect_url"  value="<?php echo $user->__get('user_proyect_url');?>" />
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
					                            <label><strong>Año</strong></label>	
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
					                            <input name="obra_url_<?php echo $i;?>"  class="expand input-text" type="text" value="<?php echo $obra->__get('obra_url');?>" />
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
					                            <label><strong>Año</strong></label>	
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
					                            <input name="obra_url_<?php echo $i;?>"  class="expand input-text" type="text" value="<?php echo $obra->__get('obra_url');?>" />
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
								<a title="Hoja de vida" href="<?php echo APPLICATION_URL?>registro-hoja-vida-0420.html" class="graytxt">Anterior</a>  
								<a href="<?php echo APPLICATION_URL?>registro-documentos-0440.html" title="Portafolio" class="button radius">Siguiente: Portafolio</a>
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
	
	
<script language="javascript">
$(document).ready(function() {
						   
		var counterObras 	= <?php echo (count($obras) > 0) ? count($obras)+1 : 2; ?>;				   
		$("#add-obra").click(function(){
		$(".link_list").hide().append('<li class="link_default"><table width="100%"><tr><td width="5%"><img src="<?php echo APPLICATION_URL?>images/drag_handle.gif" alt="drag_handle" width="11" height="11" class="image_handle nsr"></td><td width="35%"><label><strong>Nombre de la obra</strong></label><input name="obra_name_'+counterObras+'" class="expand input-text" type="text" /></td><td width="30%"><label><strong>Dimensiones</strong> (mts)</label><input name="obra_dimensions_'+counterObras+'" class="expand input-text" type="text" /></td><td width="20%"><label><strong>Formato o técnica</strong></label><input name="obra_format_'+counterObras+'"  class="expand input-text" type="text" /></td><td width="8%"><label><strong>Año</label>	<select name="obra_year_'+counterObras+'"><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option></select></td></tr><tr><td></td><td colspan="3"><label><strong>Url de la obra</strong></label><input name="obra_url_'+counterObras+'"  class="expand input-text" type="text" /></td></tr><tr><td></td><td colspan="2"><label><strong>Imagen de la obra</strong></label><label>Puede cargar imágenes en .jpg, .png o .gif. El archivo no debe superar los 1000 KB.</label><input name="obra_image_'+counterObras+'" type="file"></td></tr></table></li>').fadeIn(1000);
		counterObras = counterObras + 1;
		});// end nueva obra
							});
</script>
	
<?php include_once('footer.php'); ?>