<?php
$countries	= CountryHelper::retrieveCountries(" AND country_activated = 1 ORDER by country_name");
?>
<h4>Estudios Realizados</h4>
				<p><em>Ordenar del más reciente al más antiguo.</em></p>
				
				<div class="intitle">
					<ul class="resume-more">
						<li>
							<span class="asterix">*</span><strong>Nombre de la carrera</strong>
						</li>
						<li>
							<span class="asterix">*</span><strong>Institución</strong>
						</li>
						<li>
							<span class="asterix">*</span><strong>Ciudad</strong>
						</li>
						<li>
							<span class="asterix">*</span><strong>País</strong>
						</li>
						<li>
							<span class="asterix">*</span><strong>Año</strong>
						</li>
					</ul>
				</div>
				<!-- formulario -->
				
					<ul class="link_list ui-sortable">
						<!-- expo -->
                    	<?php
						if (count($expositions3) > 0)
						{
							$i = 50;
							foreach ($expositions3 as $exposition)
							{
						?>  
                            <li class="link_default">
                                <ul class="no-bullet resume-more">
	                                <!-- move img -->
	                                <li class="handler">
	                                	<img src="<?php echo APPLICATION_URL;?>images/drag_handle.gif" alt="drag_handle" width="11" height="11" class="image_handle nsr">
	                            	</li>
                                    <li>
                                        <input  name="expo_type_<?php echo $i?>" type="hidden" value="3" />
                                        <input title="Digite nombre de la exposición" name="expo_nombre_<?php echo $i?>" class="expand input-text" type="text" value="<?php echo $exposition->__get('exposition_name');?>"  />
                                    </li>
                                    
                                    <li>
                                    	<input title="Digite institución" name="expo_institucion_<?php echo $i?>" class="expand input-text" type="text" value="<?php echo $exposition->__get('exposition_institution');?>" />
                                    </li>
                                    <li>
                                        <input title="Digite ciudad de la exposición" name="expo_city_<?php echo $i?>" class="expand input-text" type="text" value="<?php echo $exposition->__get('exposition_city');?>" />
                                        <input name="expo_format_<?php echo $i?>" class="expand input-text" type="hidden" value="<?php echo $exposition->__get('exposition_format');?>" />
                                    </li>
                                    <li class="country">
                                    	<select name="expo_country_id_<?php echo $i?>" id="">
                                        	<?php
											foreach ($countries as $country)
											{
											?>
                                    			<option value="<?php echo $country->__get('country_id');?>" <?php if ($exposition->__get('country_id') == $country->__get('country_id')) echo 'selected';?>><?php echo utf8_encode($country->__get('country_name'));?></option>
                                    		<?php
											}
											?>
                                        </select>
                                    </li>
                                    <li class="date">
                                            <select name="expo_year_<?php echo $i?>">
                                            	<?php 
												for ($j = 2013; $j > 1989; $j--)
												{
													$selected = ($exposition->__get('exposition_year') == $j) ? 'selected="selected"' : '';
												?>
                                                <option value="<?php echo $j;?>" <?php echo $selected;?>><?php echo $j;?></option>
                 								<?php
												}
												?>
                                            </select>
                                    </li>
                                     <li class="handler">
	                                	<a href="#" class="delete-expo"><img src="<?php echo APPLICATION_URL?>images/trash.gif" alt="caneca" title="caneca" width="37" height="37" /></a>
	                               	</li>
                                  </ul>
                            </li>
                        <?php
							$i++;
							}
						}
						else
						{
						?>                          
                            <li class="link_default">
                                  <ul class="no-bullet resume-more">
                                    <li class="handler">
                                    	<img src="<?php echo APPLICATION_URL;?>images/drag_handle.gif" alt="drag_handle" width="11" height="11" class="image_handle nsr">
                                    </li>
                                    <li>
                                        <input name="expo_type_50" type="hidden" value="3" />
                                        <input name="expo_nombre_50" class="expand input-text" type="text" />
                                    </li>
                                    <li>
                                    <input name="expo_institucion_50" class="expand input-text" type="text" />
                                    </li>
                                    <li>
                                        <input name="expo_city_50" class="expand input-text" type="text" />
                                        <input name="expo_format_50" class="expand input-text" type="hidden" />
                                    </li>
                                    <li class="country">
                                    	<select name="expo_country_50" id="">
                                        	<?php
											foreach ($countries as $country)
											{
											?>
                                    			<option value="<?php echo $country->__get('country_id');?>"><?php echo utf8_encode($country->__get('country_name'));?></option>
                                    		<?php
											}
											?>
                                    	</select>
                                    </li>
                                    <li class="date">
                                            <select name="expo_year_1">
                                            	<?php 
												for ($j = 2013; $j > 1989; $j--)
												{
												?>
                                                <option value="<?php echo $j;?>"><?php echo $j;?></option>
                 								<?php
												}
												?>
                                            </select>
                                    </li>
                                     <li class="handler">
	                                	<a href="#" class="delete-expo"><img src="<?php echo APPLICATION_URL?>images/trash.gif" alt="caneca" title="caneca" width="37" height="37" /></a>
	                               	</li>
                                  </ul>
                            </li>
                        <?php
						}
						?>                      
					<!-- end Expo --> 
					</ul>	
					<a href="#" class="label secondary round" id="add-expo"><strong>+</strong> Agregar una nueva carrera</a>
				<hr />
				<br />				
                <h4>Exposiciones individuales</h4>
				<p><em>Selección desde 2008 a la fecha.</em></p>
				
				<div class="intitle">
					<ul class="resume-more">
						<li>
							<strong>Nombre de la exposición</strong>
						</li>
						<li>
							<strong>Institución</strong>
						</li>
						<li>
							<strong>Ciudad</strong>
						</li>
						<li>
							<strong>País</strong>
						</li>
						<li>
							<strong>Año</strong>
						</li>
					</ul>
				</div>
				<!-- formulario -->
					<ul class="link_list-1 ui-sortable">
						<!-- expo -->
                    	<?php
						if (count($expositions) > 0)
						{
							$i = 1;
							foreach ($expositions as $exposition)
							{
						?>  
                            <li class="link_default">
                                  <ul class="no-bullet resume-more">
                                    <li class="handler">
                                    	<img src="<?php echo APPLICATION_URL;?>images/drag_handle.gif" alt="drag_handle" width="11" height="11" class="image_handle nsr">
                                    </li>
                                    <li>
                                        <input name="expo_type_<?php echo $i?>" type="hidden" value="1" />
                                        <input title="Digite nombre de la exposición" name="expo_nombre_<?php echo $i?>" class="expand input-text" type="text" value="<?php echo $exposition->__get('exposition_name');?>"  />
                                    </li>
                                    <li>
                                    	<input title="Digite institución" name="expo_institucion_<?php echo $i?>" class="expand input-text" type="text" value="<?php echo $exposition->__get('exposition_institution');?>" />
                                    </li>
                                    <li>
                                        <input title="Digite ciudad de la exposición" name="expo_city_<?php echo $i?>" class="expand input-text" type="text" value="<?php echo $exposition->__get('exposition_city');?>" />
                                    </li>
                                    <!--<li class="format">
                                        <input title="Digite formato de la exposión" name="expo_format_<?php echo $i?>" class="expand input-text" type="text" value="<?php echo $exposition->__get('exposition_format');?>" />
                                    </li>-->
                                    <li class="country">
                                    	<select name="expo_country_id_<?php echo $i?>" id="">
                                        	<?php
											foreach ($countries as $country)
											{
											?>
                                    			<option value="<?php echo $country->__get('country_id');?>" <?php if ($exposition->__get('country_id') == $country->__get('country_id')) echo 'selected';?>><?php echo utf8_encode($country->__get('country_name'));?></option>
                                    		<?php
											}
											?>
                                        </select>
                                    </li>
                                    <li class="date">
                                            <select  title="digite fecha de la exposición" name="expo_year_<?php echo $i?>">
                                                <option value="2013" <?php if ($exposition->__get('exposition_year') == 2013) echo 'selected="selected"';?>>2013</option>
                                                <option value="2012" <?php if ($exposition->__get('exposition_year') == 2012) echo 'selected="selected"';?>>2012</option>
                                                <option value="2011" <?php if ($exposition->__get('exposition_year') == 2011) echo 'selected="selected"';?>>2011</option>
                                                <option value="2010" <?php if ($exposition->__get('exposition_year') == 2010) echo 'selected="selected"';?>>2010</option>
                                                <option value="2009" <?php if ($exposition->__get('exposition_year') == 2009) echo 'selected="selected"';?>>2009</option>
                                                 <option value="2008" <?php if ($exposition->__get('exposition_year') == 2008) echo 'selected="selected"';?>>2008</option>
                                                <!--<option value="2007" <?php if ($exposition->__get('exposition_year') == 2007) echo 'selected="selected"';?>>2007</option> -->
                                            </select>
                                    </li>
                                    <li class="handler">
	                                	<a href="#" class="delete-expo"><img src="<?php echo APPLICATION_URL?>images/trash.gif" alt="caneca" title="caneca" width="37" height="37" /></a>
	                               	</li>
                                  </ul>
                            </li>                        
                        <?php
							$i++;
							}
						}
						else
						{
						?>                          
                            <li class="link_default">
                                  <ul class="no-bullet resume-more">
                                    <li class="handler">
                                    	<img src="<?php echo APPLICATION_URL;?>images/drag_handle.gif" alt="drag_handle" width="11" height="11" class="image_handle nsr">
                                    </li>
                                    <li>
                                        <input name="expo_type_1" type="hidden" value="1" />
                                        <input name="expo_nombre_1" class="expand input-text" type="text" />
                                    </li>
                                    <li>
                                    	<input name="expo_institucion_1" class="expand input-text" type="text" />
                                    </li>
                                    <li>
                                        <input name="expo_city_1" class="expand input-text" type="text" />
                                    </li>
                                    <li class="format">
                                        <input name="expo_format_1" class="expand input-text" type="text" />
                                    </li>
                                    <li class="country">
                                    	<select name="expo_country_id_1" id="">
                                        	<?php
											foreach ($countries as $country)
											{
											?>
                                    			<option value="<?php echo $country->__get('country_id');?>"><?php echo utf8_encode($country->__get('country_name'));?></option>
                                    		<?php
											}
											?>
                                        </select>
                                    </li>
                                    <li class="date">
	                                    <select name="expo_year_1">
	                                        <option value="2013">2013</option>
	                                        <option value="2012">2012</option>
	                                        <option value="2011">2011</option>
	                                        <option value="2010">2010</option>
	                                        <option value="2009">2009</option>
	                                        <option value="2008">2008</option>
	                                         <!--<option value="2007">2007</option> -->
	                                    </select>
                                    </li>
                                  <li class="handler">
	                                	<a href="#" class="delete-expo"><img src="<?php echo APPLICATION_URL?>images/trash.gif" alt="caneca" title="caneca" width="37" height="37" /></a>
	                               	</li>
                                 </ul>
                            </li>
                        <?php
						}
						?>
					</ul>	
					<a href="#" class="label secondary round" id="add-expo-1"><strong>+</strong> Agregar una nueva exposición</a>
				<hr />
				<br />
				<h4>Exposiciones colectivas</h4>
				<p><em>Exposiciones colectivas desde 2008 a la fecha.</em></p>
				<div class="intitle">
					<ul class="resume-more">
						<li>
							<strong>Nombre de la exposición</strong>
						</li>
						<li>
							<strong>Institución</strong>
						</li>
						<li>
							<strong>Ciudad</strong>
						</li>
						<li>
							<strong>País</strong>
						</li>
						<li>
							<strong>Año</strong>
						</li>
					</ul>
				</div>
					<ul class="link_list-2 ui-sortable">
						<!-- expo -->
						<?php
						if (count($expositions2) > 0)
						{
							//echo count($expositions);
							$i = (count($expositions) > 0) ? count($expositions)+1 : 2;
							foreach ($expositions2 as $exposition)
							{
						?>  
                            <li class="link_default">
                                  <ul class="no-bullet resume-more">
                                    <li class="handler">
                                    	<img src="<?php echo APPLICATION_URL;?>images/drag_handle.gif" alt="drag_handle" width="11" height="11" class="image_handle nsr">
                                    </li>
                                    <li>
                                        <input name="expo_type_<?php echo $i?>" type="hidden" value="2" />
                                        <input title="Digite nombre de la exposición" name="expo_nombre_<?php echo $i?>" class="expand input-text" type="text" value="<?php echo $exposition->__get('exposition_name');?>"  />
                                    </li>
                                    <li>
                                    <input title="Digite institución" name="expo_institucion_<?php echo $i?>" class="expand input-text" type="text" value="<?php echo $exposition->__get('exposition_institution');?>" />
                                    </li>
                                    <li>
                                        <input title="Digite ciudad de la exposición" name="expo_city_<?php echo $i?>" class="expand input-text" type="text" value="<?php echo $exposition->__get('exposition_city');?>" />
                                    </li>
                                   <!-- <li class="format">
                                        <input title="Digite formato de la exposión" name="expo_format_<?php echo $i?>" class="expand input-text" type="text" value="<?php echo $exposition->__get('exposition_format');?>" />
                                    </li>-->
                                   <li class="country">
                                    	<select name="expo_country_id_<?php echo $i?>" id="">
                                        	<?php
											foreach ($countries as $country)
											{
											?>
                                    			<option value="<?php echo $country->__get('country_id');?>" <?php if ($exposition->__get('country_id') == $country->__get('country_id')) echo 'selected';?>><?php echo utf8_encode($country->__get('country_name'));?></option>
                                    		<?php
											}
											?>
                                        </select>
                                    </li>
                                    <li class="date">
                                        <select title="Digite fecha de la exposición" name="expo_year_<?php echo $i?>">
                                            <option value="2013" <?php if ($exposition->__get('exposition_year') == 2013) echo 'selected="selected"';?>>2013</option>
                                            <option value="2012" <?php if ($exposition->__get('exposition_year') == 2012) echo 'selected="selected"';?>>2012</option>
                                            <option value="2011" <?php if ($exposition->__get('exposition_year') == 2011) echo 'selected="selected"';?>>2011</option>
                                            <option value="2010" <?php if ($exposition->__get('exposition_year') == 2010) echo 'selected="selected"';?>>2010</option>
                                            <option value="2009" <?php if ($exposition->__get('exposition_year') == 2009) echo 'selected="selected"';?>>2009</option>
                                           <option value="2008" <?php if ($exposition->__get('exposition_year') == 2008) echo 'selected="selected"';?>>2008</option>
                                            <!--  <option value="2007" <?php if ($exposition->__get('exposition_year') == 2007) echo 'selected="selected"';?>>2007</option> -->
                                        </select>
                                    </li>
                                     <li class="handler">
	                                	<a href="#" class="delete-expo"><img src="<?php echo APPLICATION_URL?>images/trash.gif" alt="caneca" title="caneca" width="37" height="37" /></a>
	                               	</li>
                                  </ul>
                            </li>
                        <?php
							$i++;
							}
						}
						else
						{
							$i	= (count($expositions) > 0) ? count($expositions)+1 : 2;
						?>                          
                            <li class="link_default">
                                  <ul class="no-bullet resume-more">
                                    <li class="handler">
                                    	<img src="<?php echo APPLICATION_URL;?>images/drag_handle.gif" alt="drag_handle" width="11" height="11" class="image_handle nsr">
                                    </li>
                                    <li>
                                        <input name="expo_type_<?php echo $i;?>" type="hidden" value="2" />
										<input name="expo_nombre_<?php echo $i;?>" class="expand input-text" type="text" />
                                    </li>
                                    <li>
                                    <input name="expo_institucion_<?php echo $i;?>" class="expand input-text" type="text" />
                                    </li>
                                    <li>
                                        <input name="expo_city_<?php echo $i;?>" class="expand input-text" type="text" />
                                    </li>
                                    <li class="country">
                                    	<select name="expo_country_id_<?php echo $i;?>" id="">
                                        	<?php
											foreach ($countries as $country)
											{
											?>
                                    			<option value="<?php echo $country->__get('country_id');?>"><?php echo utf8_encode($country->__get('country_name'));?></option>
                                    		<?php
											}
											?>
                                        </select>
                                    </li>
                                    <li class="date">
	                                    <select name="expo_year_<?php echo $i;?>">
	                                        <option value="2013">2013</option>
	                                        <option value="2012">2012</option>
	                                        <option value="2011">2011</option>
	                                        <option value="2010">2010</option>
	                                        <option value="2009">2009</option>
	                                        <option value="2008">2008</option>
	                                        <!-- <option value="2007">2007</option> -->
	                                    </select>
                                    </li>
                                     <li class="handler">
	                                	<a href="#" class="delete-expo"><img src="<?php echo APPLICATION_URL?>images/trash.gif" alt="caneca" title="caneca" width="37" height="37" /></a>
	                               	</li>
                                </ul>
                            </li>
                        <?php
						}
						?> 						
					<!-- end Expo --> 
					</ul>	
					<a href="#" class="label secondary round" id="add-expo-2"><strong>+</strong> Agregar una nueva exposición</a>
				<hr />
				<br />
				<h4>Becas y premios</h4>
				<p><em>Selección de becas y premios desde 2008 a la fecha.</em></p>
				
				<div class="intitle">
					<ul class="no-bullet resume-more">
						<li>
							<strong>Nombre del premio</strong>
						</li>
						<li>
							<strong>Institución</strong>
						</li>
						<li>
							<strong>Ciudad</strong>
						</li>
						<li>
							<strong>Colombia</strong>
						</li>
						<li>
							<strong>Año</strong>
						</li>
					</ul>
				</div>
				
				<!-- formulario -->
					<ul class="link_list-3 ui-sortable">
                     	<?php
						if (count($prizes) > 0)
						{
							$i = 200;
							foreach ($prizes as $prize)
							{
						?>                          
                            <li class="link_default">
                                  <ul class="no-bullet resume-more">
                                    <li class="handler">
                                    	<img src="<?php echo APPLICATION_URL;?>images/drag_handle.gif" alt="drag_handle" width="11" height="11" class="image_handle nsr">
                                    </li>
                                    <li>
                                        <input title="Digite nombre del premio" name="prize_name_<?php echo $i?>" class="expand input-text" type="text" value="<?php echo $prize->__get('prize_name')?>" />
                                    </li>
                                    <li>
                                    	<input title="Digite institución del premio" name="prize_institution_<?php echo $i?>" class="expand input-text" type="text" value="<?php echo $prize->__get('prize_institution')?>" />
                                    </li>
                                    <li>
                                        <input title="Digite ciudad del premio" name="prize_city_<?php echo $i?>" class="expand input-text" type="text" value="<?php echo $prize->__get('prize_city')?>" />
                                    </li>
                                     <li class="country">
                                    	<select name="prize_country_id_<?php echo $i?>" id="">
                                        	<?php
											foreach ($countries as $country)
											{
											?>
                                    			<option value="<?php echo $country->__get('country_id');?>" <?php if ($prize->__get('country_id') == $country->__get('country_id')) echo 'selected="selected"';?>><?php echo utf8_encode($country->__get('country_name'));?></option>
                                    		<?php
											}
											?>
                                        </select>
                                    </li>
                                    <li class="date">
                                        <select title="Digite año del premio" name="prize_year_<?php echo $i?>">
                                            <option value="2012" <?php if ($prize->__get('prize_year') == 2013) echo 'selected="selected"';?>>2013</option>
                                            <option value="2012" <?php if ($prize->__get('prize_year') == 2012) echo 'selected="selected"';?>>2012</option>
                                            <option value="2011" <?php if ($prize->__get('prize_year') == 2011) echo 'selected="selected"';?>>2011</option>
                                            <option value="2010" <?php if ($prize->__get('prize_year') == 2010) echo 'selected="selected"';?>>2010</option>
                                            <option value="2009" <?php if ($prize->__get('prize_year') == 2009) echo 'selected="selected"';?>>2009</option>
                                           <option value="2008" <?php if ($prize->__get('prize_year') == 2008) echo 'selected="selected"';?>>2008</option>
                                            <!--  <option value="2007" <?php if ($prize->__get('prize_year') == 2007) echo 'selected="selected"';?>>2007</option> -->
                                        </select>
                                    </li>
                                    <li class="handler">
	                                	<a href="#" class="delete-expo"><img src="<?php echo APPLICATION_URL?>images/trash.gif" alt="caneca" title="caneca" width="37" height="37" /></a>
	                               	</li>
                                  </ul>
                            </li>
                            <?php
                            }
                         }
						 else
						 {
						 	$i	= (count($prizes) > 0) ? count($prizes)+100 : 200;
						 	?>
                            <li class="link_default">
                                  <ul class="resume-more no-bullet">
                                    <li class="handler">
                                    	<img src="<?php echo APPLICATION_URL;?>images/drag_handle.gif" alt="drag_handle" width="11" height="11" class="image_handle nsr">
                                    </li>
                                    <li>
                                        <input name="prize_name_<?php echo $i?>" class="expand input-text" type="text" />
                                    </li>
                                    <li>
                                    	<input name="prize_institution_<?php echo $i?>" class="expand input-text" type="text" />
                                    </li>
                                    <li>
                                        <input name="prize_city_<?php echo $i?>" class="expand input-text" type="text" />
                                    </li>
                                     <li class="country">
                                    	<select name="prize_country_id_<?php echo $i?>" id="">
                                        	<?php
											foreach ($countries as $country)
											{
											?>
                                    			<option value="<?php echo $country->__get('country_id');?>"><?php echo utf8_encode($country->__get('country_name'));?></option>
                                    		<?php
											}
											?>
                                        </select>
                                    </li>                                    
                                    <li class="date">
	                                    <select name="prize_year_<?php echo $i?>">
	                                        <option value="2013">2013</option>
	                                        <option value="2012">2012</option>
	                                        <option value="2011">2011</option>
	                                        <option value="2010">2010</option>
	                                        <option value="2009">2009</option>
	                                       <option value="2008">2008</option>
	                                         <!-- <option value="2007">2007</option> -->
	                                    </select>
                                    </li>
                                    <li class="handler">
	                                	<a href="#" class="delete-expo"><img src="<?php echo APPLICATION_URL?>images/trash.gif" alt="caneca" title="caneca" width="37" height="37" /></a>
	                               	</li>
                                  </ul>
                            </li>
						 	<?php
						 }
                         ?>
                     
					<!-- end Expo --> 
					</ul>	
					<a href="#" id="add-expo-3" class="label secondary round"><strong>+</strong> Agregar un nuevo premio</a>
				<hr />
				