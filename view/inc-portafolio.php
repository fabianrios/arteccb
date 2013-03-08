<?php
$dir		= 'resources/images/'. $user->__get('user_id'). '-' .  makeUrlClear(utf8_decode($user->__get('user_name'))).'/';
$obras		= ObraHelper::retrieveObras("AND user_id = '" . $user->__get('user_id') . "'");
?>
		<h4>Portafolio</h4>
					<p><em>Incluya cinco obras realizadas desde 2008 a la fecha.</em></p>
					
					<ul class="link_list ui-sortable">
					        	<?php
					        	$i = 1;
								if (count($obras) > 0)
								{
									
									foreach ($obras as $obra)
									{
										$key 		= ($obra->__get('obra_key') != '') ? $obra->__get('obra_key') : md5(date('YmdHis') . $i);
								?>  
					                <li class="link_default">
					                    <ul class="no-bullet portfolio">
					                      <li class="handler">
					                        <img src="<?php echo APPLICATION_URL?>images/drag_handle.gif" alt="drag_handle" width="11" height="11" class="image_handle nsr">
					                       </li>
					                        <li>
					                            <span class="asterix">*</span><strong>Nombre de la obra</strong>
					                            <input title="Digite nombre de la obra" name="obra_name_<?php echo $i;?>" class="expand input-text" type="text" value="<?php echo $obra->__get('obra_name');?>"/>
					                            <input name="obra_id_<?php echo $i;?>" class="expand input-text" type="hidden" value="<?php echo $obra->__get('obra_id');?>"/>
					                        </li>
					                        <li>
					                            <span class="asterix">*</span><strong>Dimensiones</strong> (mts)
					                        <input title="Digite dimensión de la obra" name="obra_dimensions_<?php echo $i;?>" class="expand input-text" type="text" value="<?php echo $obra->__get('obra_dimensions');?>"/>
					                        
					                        </li>
					                        <li>
					                            <span class="asterix">*</span><strong>Formato o técnica</strong>
					                            <input title="Digite formato o técnica de la obra" name="obra_format_<?php echo $i;?>"  class="expand input-text" type="text" value="<?php echo $obra->__get('obra_format');?>" />
					                        </li>
					                        <li class="date">
					                            <span class="asterix">*</span><strong>Año</strong>	
					                                <select title="Digite año de la obra" name="obra_year_<?php echo $i;?>">
					                                    <option value="2012" <?php if ($obra->__get('obra_year') == 2012) echo 'selected="selected"';?>>2012</option>
					                                    <option value="2011" <?php if ($obra->__get('obra_year') == 2011) echo 'selected="selected"';?>>2011</option>
					                                    <option value="2010" <?php if ($obra->__get('obra_year') == 2010) echo 'selected="selected"';?>>2010</option>
					                                    <option value="2009" <?php if ($obra->__get('obra_year') == 2009) echo 'selected="selected"';?>>2009</option>
					                                    <!-- <option value="2008" <?php if ($obra->__get('obra_year') == 2008) echo 'selected="selected"';?>>2008</option>
					                                    <option value="2007" <?php if ($obra->__get('obra_year') == 2007) echo 'selected="selected"';?>>2007</option> -->
					                                </select>
					                        </li>
					                      	<li class="url">
					                            <span class="asterix">*</span><strong>Url de la obra</strong>
					                            <input title="Digite url de la obra" name="obra_url_<?php echo $i;?>"  class="expand input-text" type="text" value="<?php echo $obra->__get('obra_url');?>" />
					                        </li>
					                      	<li class="obra">
					                        	<span class="asterix">*</span><strong>Imagen de la obra</strong>
					                        	<label>Puede cargar imágenes en .jpg, .png o .gif. El archivo no debe superar los 1000 KB.</label>
					                       	    <?php
							                    $image	= ($obra->__get('obra_image') != '') ? APPLICATION_URL.$dir.'portafolio/'.$obra->__get('obra_image') : $default;
							                        
							                    ?>           
							                    <div id="obra_image_<?php echo $key?>"></div>     
							                    <?php if($obra->__get('obra_image') != '') { ?><img width="50" src="<?php echo $image?>"><?php }?>
							                    <input type="hidden" name="obra_key_<?php echo $i;?>" value="<?php echo $key?>" />
					                      	</li>
					                        <li class="handler">
			                                	<a href="#"><img src="<?php echo APPLICATION_URL?>images/trash.gif" alt="caneca" title="caneca" width="37" height="37" /></a>
			                               	</li>
					                    </ul>
					                </li>
									<script>
								      $(document).ready(function() {
								      	eval('var uploaders<?php echo $key?> = { uploader<?php echo $key?>: null };');
								      	eval('var currentUploader = uploaders<?php echo $key?>.uploader<?php echo $key?>;');
								        var currentUploader = new qq.FineUploader({
										  debug: true, 												 
								          element: $('#obra_image_<?php echo $key?>')[0],
								          request: {
								            endpoint: '<?php echo APPLICATION_URL;?>upload_works.controller/<?php echo $_SESSION['user_id'];?>/obra_image_<?php echo $key?>_image/<?php echo $key?>.html'
								          },
								          autoUpload: true,
								          text: {
								            uploadButton: '<i class="icon-plus icon-white"></i> Seleccione archivo'
								          }
								        });	
								      });
								   </script>                  
					            <?php
									$i++;
									} 
								}
								else
								{
									$obra	= new Obra();
									$key 		= ($obra->__get('obra_key') != '') ? $obra->__get('obra_key') : md5(date('YmdHis') . 'new');
								?>
					            <li class="link_default">
					                    <ul class="no-bullet portfolio">
					                      <li class="handler">
					                        <img src="<?php echo APPLICATION_URL?>images/drag_handle.gif" alt="drag_handle" width="11" height="11" class="image_handle nsr">
					                       </li>
					                        <li>
					                            <span class="asterix">*</span><strong>Nombre de la obra</strong>
					                            <input title="Digite nombre de la obra" name="obra_name_<?php echo $i;?>" class="expand input-text" type="text" value="<?php echo $obra->__get('obra_name');?>"/>
					                        </li>
					                        
					                        <li>
					                            <span class="asterix">*</span><strong>Dimensiones</strong> (mts)
					                        <input title="Digite dimensión de la obra" name="obra_dimensions_<?php echo $i;?>" class="expand input-text" type="text" value="<?php echo $obra->__get('obra_dimensions');?>"/>
					                        
					                        </li>
					                        <li class="format">
					                            <span class="asterix">*</span><strong>Formato o técnica</strong>
					                            <input title="Digite formato o técnica de la obra" name="obra_format_<?php echo $i;?>"  class="expand input-text" type="text" value="<?php echo $obra->__get('obra_format');?>" />
					                        </li>
					                        <li class="date">
					                            <span class="asterix">*</span><strong>Año</strong>	
					                                <select title="Digite año de la obra" name="obra_year_<?php echo $i;?>">
					                                    <option value="2012" <?php if ($obra->__get('obra_year') == 2012) echo 'selected="selected"';?>>2012</option>
					                                    <option value="2011" <?php if ($obra->__get('obra_year') == 2011) echo 'selected="selected"';?>>2011</option>
					                                    <option value="2010" <?php if ($obra->__get('obra_year') == 2010) echo 'selected="selected"';?>>2010</option>
					                                    <option value="2009" <?php if ($obra->__get('obra_year') == 2009) echo 'selected="selected"';?>>2009</option>
					                                    <option value="2008" <?php if ($obra->__get('obra_year') == 2008) echo 'selected="selected"';?>>2008</option>
					                                    <option value="2007" <?php if ($obra->__get('obra_year') == 2007) echo 'selected="selected"';?>>2007</option>
					                                </select>
					                        </li>
					                      	<li class="url">
					                            <span class="asterix">*</span><strong>Url de la obra</strong>
					                            <input title="Digite url de la obra" name="obra_url_<?php echo $i;?>"  class="expand input-text" type="text" value="<?php echo $obra->__get('obra_url');?>" />
					                        </li>
					                      	<li class="obra">
					                        	<span class="asterix">*</span><strong>Imagen de la obra</strong>
					                        	<span class="caption">Puede cargar imágenes en .JPG o .PNG. El archivo no debe superar los 1000 KB. </span>
					                       	    <div id="obra_image_<?php echo $key?>"></div>     
							                    <?php if($obra->__get('obra_image') != '') { ?><img width="50" src="<?php echo $image?>"><?php }?>
							                    <input type="hidden" name="obra_key_<?php echo $i;?>" value="<?php echo $key?>" />
					                      	</li>
					                        <li class="handler">
			                                	<a href="#"><img src="<?php echo APPLICATION_URL?>images/trash.gif" alt="caneca" title="caneca" width="37" height="37" /></a>
			                               	</li>
					                    </ul>
					                </li>
									<script>
								      $(document).ready(function() {
								      	eval('var uploaders<?php echo $key?> = { uploader<?php echo $key?>: null };');
								      	eval('var currentUploader = uploaders<?php echo $key?>.uploader<?php echo $key?>;');
								        var currentUploader = new qq.FineUploader({
										  debug: true, 												 
								          element: $('#obra_image_<?php echo $key?>')[0],
								          request: {
								            endpoint: '<?php echo APPLICATION_URL;?>upload_works.controller/<?php echo $_SESSION['user_id'];?>/obra_image_<?php echo $key?>_image/<?php echo $key?>.html'
								          },
								          autoUpload: true,
								          text: {
								            uploadButton: '<i class="icon-plus icon-white"></i> Seleccione archivo'
								          }
								        });	
								      });
								   </script>    
					                 <?php
								}
								?>                                                
					<!-- Obra -->
								
					<!-- end Obra --> 
					</ul>