			  
					
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
					                    <ul class="no-bullet resume-more">
					                      <li class="handler">
					                        <img src="<?php echo APPLICATION_URL?>images/drag_handle.gif" alt="drag_handle" width="11" height="11" class="image_handle nsr">
					                       </li>
					                        <li>
					                            <span class="asterix">*</span><strong>Nombre de la obra</strong>
					                            <input name="obra_name_<?php echo $i;?>" class="expand input-text" type="text" value="<?php echo $obra->__get('obra_name');?>"/>
					                            <input name="obra_id_<?php echo $i;?>" class="expand input-text" type="hidden" value="<?php echo $obra->__get('obra_id');?>"/>
					                        </li>
					                        <li>
					                            <span class="asterix">*</span><strong>Dimensiones</strong> (mts)
					                        <input name="obra_dimensions_<?php echo $i;?>" class="expand input-text" type="text" value="<?php echo $obra->__get('obra_dimensions');?>"/>
					                        
					                        </li>
					                        <li>
					                            <span class="asterix">*</span><strong>Formato o técnica</strong>
					                            <input name="obra_format_<?php echo $i;?>"  class="expand input-text" type="text" value="<?php echo $obra->__get('obra_format');?>" />
					                        </li>
					                        <li class="date">
					                            <span class="asterix">*</span><strong>Año</strong>	
					                                <select name="obra_year_<?php echo $i;?>">
					                                    <option value="2012" <?php if ($obra->__get('obra_year') == 2012) echo 'selected="selected"';?>>2012</option>
					                                    <option value="2011" <?php if ($obra->__get('obra_year') == 2011) echo 'selected="selected"';?>>2011</option>
					                                    <option value="2010" <?php if ($obra->__get('obra_year') == 2010) echo 'selected="selected"';?>>2010</option>
					                                    <option value="2009" <?php if ($obra->__get('obra_year') == 2009) echo 'selected="selected"';?>>2009</option>
					                                    <!-- <option value="2008" <?php if ($obra->__get('obra_year') == 2008) echo 'selected="selected"';?>>2008</option>
					                                    <option value="2007" <?php if ($obra->__get('obra_year') == 2007) echo 'selected="selected"';?>>2007</option> -->
					                                </select>
					                        </li>
					                      	<li>
					                            <span class="asterix">*</span><strong>Url de la obra</strong>
					                            <input name="obra_url_<?php echo $i;?>"  class="expand input-text" type="text" value="<?php echo $obra->__get('obra_url');?>" />
					                        </li>
					                        <li class="handler">
			                                	<a href="#"><img src="<?php echo APPLICATION_URL?>images/trash.gif" alt="caneca" title="caneca" width="37" height="37" /></a>
			                               	</li>
					                      	<li class="obra">
					                        	<span class="asterix">*</span><strong>Imagen de la obra</strong>
					                        	<label>Puede cargar imágenes en .jpg, .png o .gif. El archivo no debe superar los 1000 KB.</label>
					                       	    <input name="obra_image_<?php echo $i;?>" type="file"><?php if($obra->__get('obra_image') != '') { ?><img width="50" height="50" src="<?php echo APPLICATION_URL?>resources/images/<?php echo makeUrlClear(utf8_decode($user->__get('user_name')))?>/obras/<?php echo $obra->__get('obra_image')?>"><?php }?>
					                      	</li>
					                    </ul>
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
					                    <ul class="no-bullet resume-more">
					                      <li class="handler">
					                        <img src="<?php echo APPLICATION_URL?>images/drag_handle.gif" alt="drag_handle" width="11" height="11" class="image_handle nsr">
					                       </li>
					                        <li>
					                            <span class="asterix">*</span><strong>Nombre de la obra</strong>
					                            <input name="obra_name_<?php echo $i;?>" class="expand input-text" type="text" value="<?php echo $obra->__get('obra_name');?>"/>
					                        </li>
					                        
					                        <li>
					                            <span class="asterix">*</span><strong>Dimensiones</strong> (mts)
					                        <input name="obra_dimensions_<?php echo $i;?>" class="expand input-text" type="text" value="<?php echo $obra->__get('obra_dimensions');?>"/>
					                        
					                        </li>
					
					
					                        <li class="format">
					                            <span class="asterix">*</span><strong>Formato o técnica</strong>
					                            <input name="obra_format_<?php echo $i;?>"  class="expand input-text" type="text" value="<?php echo $obra->__get('obra_format');?>" />
					                        </li>
					                        <li class="date">
					                            <span class="asterix">*</span><strong>Año</strong>	
					                                <select name="obra_year_<?php echo $i;?>">
					                                    <option value="2012" <?php if ($obra->__get('obra_year') == 2012) echo 'selected="selected"';?>>2012</option>
					                                    <option value="2011" <?php if ($obra->__get('obra_year') == 2011) echo 'selected="selected"';?>>2011</option>
					                                    <option value="2010" <?php if ($obra->__get('obra_year') == 2010) echo 'selected="selected"';?>>2010</option>
					                                    <option value="2009" <?php if ($obra->__get('obra_year') == 2009) echo 'selected="selected"';?>>2009</option>
					                                    <option value="2008" <?php if ($obra->__get('obra_year') == 2008) echo 'selected="selected"';?>>2008</option>
					                                    <option value="2007" <?php if ($obra->__get('obra_year') == 2007) echo 'selected="selected"';?>>2007</option>
					                                </select>
					                        </li>
					                      	<li>
					                            <span class="asterix">*</span><strong>Url de la obra</strong>
					                            <input name="obra_url_<?php echo $i;?>"  class="expand input-text" type="text" value="<?php echo $obra->__get('obra_url');?>" />
					                        </li>
					                        <li class="handler">
			                                	<a href="#"><img src="<?php echo APPLICATION_URL?>images/trash.gif" alt="caneca" title="caneca" width="37" height="37" /></a>
			                               	</li>
					                      	<li class="obra">
					                        	<span class="asterix">*</span><strong>Imagen de la obra</strong>
					                        	<span class="caption">Puede cargar imágenes en .jpg, .png o .gif. El archivo no debe superar los 1000 KB.</span>
					                       	    <input name="obra_image_<?php echo $i;?>" type="file"><?php if($obra->__get('obra_image') != '') { ?><img width="50" height="50" src="<?php echo APPLICATION_URL?>resources/images/<?php echo makeUrlClear(utf8_decode($user->__get('user_name')))?>/obras/<?php echo $obra->__get('obra_image')?>"><?php }?>
					                      	</li>
					                    </ul>
					                </li>
					                 <?php
								}
								?>                                                
					<!-- Obra -->
								
					<!-- end Obra --> 
					</ul>