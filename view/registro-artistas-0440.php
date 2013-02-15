<?php 
include_once('header-login.php'); 
$artists	= ArtistHelper::retrieveArtists(" AND user_id = ". $user->__get('user_id'));
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
					<h2><span class="quitarH2"> Artistas:</span> <?php echo $user->__get('user_name');?></h2>	
				</div>
				<!-- button back save forward -->
				<div class="two columns offset-by-two">
					<a href="<?php echo APPLICATION_URL?>registro-ferias-0430.html" class="back"></a>
					<a href="javascript:void(0);" onClick="document.getElementById('validable').submit();" class="save"></a>
					<a href="<?php echo APPLICATION_URL?>registro-espacio-0450.html" class="forward"></a>                                    
				</div>
				<!-- END button back save forward -->
			</div>	<!-- END titulo row -->
				<hr />
                <p><em>Recuerde que su propuesta de artistas para Artbo 2012 debe ser acorde al tamaño del stand  que ha seleccionado.  . Por cada 10 mts² sólo podrá exhibir un artista que seleccionará en el botón (o cuadro) </strong>Este artista participará en Artbo</strong>.</em></p>
			<form action="<?php echo APPLICATION_URL?>user.controller/createArtist.html" id="validable" class="" method="post">
			<ul class="link_list ui-sortable">
			<!-- artista -->
				<?php
                if (count($artists) > 0)
                {
                    $i = 1;
                    foreach ($artists as $artist)
                    {
                    ?>            
                        <li class="link_default">
                            <div class="row">
                                <!-- nombre -->
                                <div class="three columns">
                                    <img src="images/drag_handle.gif" alt="drag_handle" width="11" height="11" class="image_handle nsr">
                                    <label>Nombre</label><br />	
                                    <input type="text" name="artist_name_<?php echo $i;?>" value="<?php echo $artist->__get('artist_name');?>" />
                                </div>
                                <!-- END nombre -->
                                <!-- Apellido -->
                                <div class="three columns">
                                    <label>Apellido</label><br />	
                                    <input type="text" name="artist_surname_<?php echo $i;?>" value="<?php echo $artist->__get('artist_surname');?>" />
                                </div>
                                <!-- END Apellido -->
                                
                                
                                <!-- checkboxes -->
                                <div class="six columns">
                                    <!-- nacionalidad -->
                                    <label>Nacionalidad</label><br />	
                                    <input type="text" name="artist_nationality_<?php echo $i;?>" value="<?php echo $artist->__get('artist_nationality');?>" />
                                    <!-- END nacionalidad -->
                                    
                                    
                                    <label for="checkbox3a"><input class="revealer" type="checkbox" name="artist_artbo_<?php echo $i;?>" <?php if ($artist->__get('artist_artbo') == 1) echo 'checked="CHECKED"';?>  id="checkbox-<?php echo $i?>"> <strong>Este artista participará en Artbo</strong></label>
                                    <!-- boton para modal de artista -->
                                    <a href="#" class="revelar-a <?php if ($artist->__get('artist_artbo') != 1) echo 'hidden"';?> revealer" id="link-<?php echo $i?>" data-reveal-id="artista" >Editar</a>
                                    <!-- END boton para modal de artista -->
                                </div>
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
                                <!-- nombre -->
                                <div class="three columns">
                                    <img src="images/drag_handle.gif" alt="drag_handle" width="11" height="11" class="image_handle nsr">
                                    <label>Nombre</label><br />	
                                    <input type="text" name="artist_name_1" />
                                </div>
                                <!-- END nombre -->
                                <!-- Apellido -->
                                <div class="three columns">
                                    <label>Apellido</label><br />	
                                    <input type="text" name="artist_surname_1" />
                                </div>
                                <!-- END Apellido -->
                                
                                
                                <!-- checkboxes -->
                                <div class="six columns">
                                    <!-- nacionalidad -->
                                    <label>Nacionalidad</label><br />	
                                    <input type="text" name="artist_nationality_1" />
                                    <!-- END nacionalidad -->
                                    
                                    
                                    <label for="checkbox3a"><input class="revealer-new" type="checkbox" id="checkbox-1" name="artist_artbo_1"><strong>Este artista participará en Artbo</strong></label>
                                    <!-- boton para modal de artista -->
                                    <!-- END boton para modal de artista -->
                                </div>
                            </div>
                        </li>  
				   <?php
                    }
                    ?>                                          
			<!-- END artista -->  
			</ul>	
			<a href="#" id="add-artist"><strong>+</strong> Agregar un nuevo artista </a> <!-- agregar una nueva expo -->
			</form>
            <hr />
			<!-- botones anterior guardar siguiente -->
					<div class="row">                  
					<table class="right">
						<tr>
							<td>
								<div class="anterior left"><!-- anterior -->
									<a href="<?php echo APPLICATION_URL?>registro-ferias-0430.html">Anterior</a>
								</div><!-- END anterior -->
							</td>
							<td>
								<div class="save left"> <!-- guardar -->
									<a href="javascript:void(0);" onClick="document.getElementById('validable').submit();" class="guardar">Guardar</a>
								</div><!-- END guardar -->
							</td>
							<td>
								<div class="siguiente left"><!-- siguiente -->
									<a href="<?php echo APPLICATION_URL?>registro-espacio-0450.html">Siguiente</a>
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
		<!-- End Row -->
		<img src="<?php echo APPLICATION_URL?>images/resources/sombraFinal.png" class="top-sombra" width="980" height="17" alt="sombra"/><!-- Sombra final del panel -->
	</div><!-- END Main: Row  -->
<!-- 2. End content -->
<!-- modal del artista -->
<?php include_once 'modal.php'; ?>
<!-- END modal del artista -->
<!-- 3. footer -->		
<script language="javascript">
$(document).ready(function() 
						   {
							   
							// nueva expo
							var counterArtist = <?php echo (count($artists) > 0) ? count($artists)+1 : 2; ?>;
							$("#add-artist").click(function(){
					
							$(".link_list").hide().append('<li class="link_default"><div class="row"><div class="three columns"><img src="<?php echo APPLICATION_URL?>images/drag_handle.gif" alt="drag_handle" width="11" height="11" class="image_handle nsr"><label>Nombre</label><br /><input type="text" class="" id="artist_name_'+counterArtist+'" name="artist_name_'+counterArtist+'" /></div><div class="three columns"><label>Apellido</label><br /><input type="text" name="artist_surname_'+counterArtist+'" id="artist_surname_'+counterArtist+'" /></div><div class="six columns"><label>Nacionalidad</label><br /><input type="text" name="artist_nationality_'+counterArtist+'" id="artist_nationality_'+counterArtist+'" /><label for="checkbox3a"><input type="checkbox" id="checkbox-' + counterArtist + '" class="revealer-new"  name="artist_artbo_'+counterArtist+'"> <strong>Este artista participará en Artbo</strong></label></div></div></li>').fadeIn(1000);
								$(".revealer-new").each(function(item){
									$(this).click(function () {
										$("#artist_name").val($("#artist_name_" + (counterArtist - 1)).val());
										$("#artist_surname").val($("#artist_surname_" + (counterArtist - 1)).val());
										$("#artist_nationality").val($("#artist_nationality_" + (counterArtist - 1)).val());
										var toggle = true;
										if(this.nodeName.toLowerCase() == 'input')
										{
											if(!$(this).attr("checked"))
												toggle = false;
										}
										if(toggle) {
											
											$('#artista-new').reveal();
										}	
									});
								});	
							counterArtist = counterArtist+1;						
							});							
							// end nueva expo

						    });


</script>	
<?php include_once('footer.php'); ?>
<!-- 3. End footer -->



