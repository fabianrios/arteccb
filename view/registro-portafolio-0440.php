
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
							<dd><a class="prev" title="Proyecto Artecámara" href="?php echo APPLICATION_URL?>registro-proyecto-0430.html">Anterior</a></dd>
							<dd><h4>4/5</h4></dd>
							<dd><a class="next" title="Documentos" href="<?php echo APPLICATION_URL?>registro-documentos-0450.html" >Siguiente</a></dd>
						</dl>	
					</div>
				</div><!--/row inner-header-->
			</div>
			
		<div class="container">
			<div class="row form-data">	
				<div class="twelve columns">
					
					<h2>Portafolio</h2>
					<p><em>Incluya hasta cinco obras realizadas desde 2007 a la fecha.</em></p>
					
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