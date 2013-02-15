

<?php include_once('header-login.php'); ?>

		
<!-- 2.menu-->
<?php include_once('menu.php'); ?>
<!-- 2. End menu -->
			
	<!--3. Row main-->
	<div class="row">	
		<!-- panel -->
		<div class="panel">
				

	<h4>Becas y premios</h4>
				<p><em>Selección de becas y premios desde 2007 a la fecha</em></p>
				
				<!-- formulario -->
				
				<div class="row">
					<ul class="link_list-2 ui-sortable">
                         
                            <li class="link_default">
                                <table>
                                  <tr>
                                    <td width="3%"><img src="<?php echo APPLICATION_URL;?>images/drag_handle.gif" alt="drag_handle" width="11" height="11" class="image_handle nsr"></td>
                                    <td width="30%">
                                        <label><strong>Nombre del premio</strong></label>
                                        <input name="expo_type_50" type="hidden" value="3" />
                                        <input name="expo_nombre_50" class="expand input-text" type="text" />
                                    </td>
                                    
                                    <td width="23%">
                                        <label><strong>Institución</strong></label>
                                    <input name="expo_institucion_50" class="expand input-text" type="text" />
                                    
                                    </td>
                                    <td width="17%">
                                        <label><strong>Ciudad</strong></label>
                                        <input name="expo_city_50" class="expand input-text" type="text" />
                                        <input name="expo_format_50" class="expand input-text" type="hidden" />
                                    </td>
                                    <td width="8%">
                                        <label><strong>Año</label>	
                                            <select name="expo_year_1">
                                            </select>
                                    </td>
                                  </tr>
                                </table>
                            </li>
                     
					<!-- end Expo --> 
					</ul>	
					<a href="#" id="add-expo-2"><strong>+</strong> Agregar una nuevo premio</a>
				</div>
				<hr />
		</div><!-- END Main: Panel -->
	<img src="images/resources/sombraFinal.png" class="top-sombra" width="980" height="17" alt="sombra"/><!-- Sombra final del panel -->
</div><!-- 3. END Main: Row -->

<!-- 3. footer -->			
<?php include_once('footer.php'); ?>
<!-- 3. End footer -->



