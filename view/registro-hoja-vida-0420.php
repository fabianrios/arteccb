<?php 
include_once(SITE_VIEW.'header-login.php'); 
$expositions	= ExpositionHelper::retrieveExpositions(" AND user_id = ". $user->__get('user_id') . " AND exposition_type = 1  ORDER by exposition_year");
$expositions2	= ExpositionHelper::retrieveExpositions(" AND user_id = ". $user->__get('user_id') . " AND exposition_type = 2  ORDER by exposition_year");
$expositions3	= ExpositionHelper::retrieveExpositions(" AND user_id = ". $user->__get('user_id') . " AND exposition_type = 3  ORDER by exposition_year");
$prizes		= PrizeHelper::retrievePrizes(" AND user_id = ". $user->__get('user_id') . " ORDER by prize_year");
include_once(SITE_VIEW.'menu.php'); 
?>
			
	<div class="row main-row">	
		<!-- <div class="alert-box success">
	    	Sus datos han sido guardados
	    	<a href="" class="close">×</a>
		</div> -->
		<div class="panel nopadding">
			<div class="inner-header">
				<div class="row">
					<div class="eight columns title">
						<strong class="redtext bold">Hoja de vida</strong>
						<h2><?php echo $user->__get('user_name');?></h2>
					</div><!--/title-->
					
					<div class="four columns mini-nav-header">
						<dl class="sub-nav">
							<dd><a class="save" title="Guardar" href="javascript:void(0);" onClick="$('#validable2').attr('action','<?php echo APPLICATION_URL?>user.controller/createExpo/stay.html'); $('#validable2').submit();" >Guardar</a></dd>
							<dd><a class="prev" title="Registro" href="<?php echo APPLICATION_URL;?>registro-artista-0410.html">Anterior</a></dd>
							<dd><h4>2/5</h4></dd>
							<dd><a class="next" title="Proyecto Artecámara" href="<?php echo APPLICATION_URL;?>registro-proyecto-0430.html" >Siguiente</a></dd>
						</dl>	
					</div>
				</div><!--/row inner-header-->
			</div>
			
		<div class="container">
			<div class="row form-data">	
				<div class="twelve columns">
					
					<form action="<?php echo APPLICATION_URL?>user.controller/createExpo.html" id="validable2" class="" method="post">
					<?php include_once 'inc-hojadevida.php'; ?>
					</form>
					
					
				</div><!--/twelve columns-->
			</div><!--/form-data-->
		</div>
			<!-- botones anterior guardar siguiente -->
			<div class="inner-footer">
				<div class="container">
					<div class="row">
						<div class="seven columns">
							<strong><span class="asterix">*</span>Datos requeridos</strong>
						</div>
						<div class="five columns">
							<div class="right">
								<a title="Registro" href="<?php echo APPLICATION_URL;?>registro-artista-0410.html" class="graytxt">Anterior</a>  
								<a href="javascript:void(0);" onclick="$('#validable2').submit();" title="Siguiente: Artecámara" class="button radius">Siguiente: Proyecto Artecámara</a>
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
		var counterExpo = <?php echo ((count($expositions2) + count($expositions) + count($expositions3)) > 0) ? (count($expositions2) + count($expositions) + count($expositions3))+1000 : 1000  ?>;
		var counterPrize = <?php echo (count($prizes) + 1)?>;
		$("#add-expo").click(function(evt){
			evt.preventDefault();
		$(".link_list").hide().append('<li class="link_default"><ul class="no-bullet resume-more"><li class="handler"><img src="<?php echo APPLICATION_URL;?>images/drag_handle.gif" alt="drag_handle" width="11" height="11" class="image_handle nsr"></li><li><input name="expo_type_'+counterExpo+'" type="hidden" value="3" /><input name="expo_nombre_'+counterExpo+'" class="expand input-text" type="text" /></li><li><input name="expo_institucion_'+counterExpo+'" class="expand input-text" type="text" /></li><li><input name="expo_city_'+counterExpo+'" class="expand input-text" type="text" /><li class="country"><select name="expo_country_id_'+counterExpo+'" id=""><?php foreach ($countries as $country){?><option value="<?php echo $country->__get('country_id');?>"><?php echo utf8_encode($country->__get('country_name'));?></option><?php }?></select></li><li class="date"><select name="expo_year_'+counterExpo+'"><?php for ($j = 2013; $j > 1989; $j--){?><option value="<?php echo $j;?>"><?php echo $j;?></option><?php }?></select></li><li class="handler"><a href="#" class="delete-expo"><img src="<?php echo APPLICATION_URL?>images/trash.gif" alt="caneca" title="caneca" width="37" height="37" /></a></li></ul></li>').fadeIn(1000);
		counterExpo = counterExpo+1;
		$('.delete-expo').unbind('click');
		$('.delete-expo').click(function(evt) {
			evt.preventDefault();
			$(this).parent().parent().parent().remove();
		});		
		});
		// end nueva expo
		// nueva expo
		$("#add-expo-1").click(function(evt){
			evt.preventDefault();
		$(".link_list-1").hide().append('<li class="link_default"><ul class="no-bullet resume-more"><li class="handler"><img src="<?php echo APPLICATION_URL;?>images/drag_handle.gif" alt="drag_handle" width="11" height="11" class="image_handle nsr"></li><li><input name="expo_type_'+counterExpo+'" type="hidden" value="1" /><input name="expo_nombre_'+counterExpo+'" class="expand input-text" type="text" /></li><li><input name="expo_institucion_'+counterExpo+'" class="expand input-text" type="text" /></li><li><input name="expo_city_'+counterExpo+'" class="expand input-text" type="text" /></li><li class="country"><select name="expo_country_id_'+counterExpo+'" id=""><?php foreach ($countries as $country){?><option value="<?php echo $country->__get('country_id');?>"><?php echo utf8_encode($country->__get('country_name'));?></option><?php }?></select></li><li class="date"><select name="expo_year_'+counterExpo+'"><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option></select></li><li class="handler"><a href="#" class="delete-expo"><img src="<?php echo APPLICATION_URL?>images/trash.gif" alt="caneca" title="caneca" width="37" height="37" /></a></li></ul></li>').fadeIn(1000);
		counterExpo = counterExpo+1;
		$('.delete-expo').unbind('click');
		$('.delete-expo').click(function(evt) {
			evt.preventDefault();
			$(this).parent().parent().parent().remove();
		});		
		}); 

		$("#add-expo-2").click(function(evt){
			evt.preventDefault();
		$(".link_list-2").hide().append('<li class="link_default"><ul class="no-bullet resume-more"><li class="handler"><img src="<?php echo APPLICATION_URL;?>images/drag_handle.gif" alt="drag_handle" width="11" height="11" class="image_handle nsr"></li><li><input name="expo_type_'+counterExpo+'" type="hidden" value="2" /><input name="expo_nombre_'+counterExpo+'" class="expand input-text" type="text" /></li><li><input name="expo_institucion_'+counterExpo+'" class="expand input-text" type="text" /></li><li><input name="expo_city_'+counterExpo+'" class="expand input-text" type="text" /></li><li class="country"><select name="expo_country_id_'+counterExpo+'" id=""><?php foreach ($countries as $country){?><option value="<?php echo $country->__get('country_id');?>"><?php echo utf8_encode($country->__get('country_name'));?></option><?php }?></select></li><li class="date"><select name="expo_year_'+counterExpo+'"><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option></select></li><li class="handler"><a href="#" class="delete-expo"><img src="<?php echo APPLICATION_URL?>images/trash.gif" alt="caneca" title="caneca" width="37" height="37" /></a></li></ul></li>').fadeIn(1000);
		counterExpo = counterExpo+1;
		$('.delete-expo').unbind('click');
		$('.delete-expo').click(function(evt) {
			evt.preventDefault();
			$(this).parent().parent().parent().remove();
		});		
		}); 

		$("#add-expo-3").click(function(evt){
			evt.preventDefault();
		$(".link_list-3").hide().append('<li class="link_default"><ul class="resume-more no-bullet"><li class="handler"><img src="<?php echo APPLICATION_URL;?>images/drag_handle.gif" alt="drag_handle" width="11" height="11" class="image_handle nsr"></li><li><input name="prize_name_'+counterExpo+'" class="expand input-text" type="text" /></li><li><input name="prize_institution_'+counterExpo+'" class="expand input-text" type="text" /></li><li><input name="prize_city_'+counterExpo+'" class="expand input-text" type="text" /></li><li class="country"><select name="prize_country_id_'+counterExpo+'" id=""><?php foreach ($countries as $country){?><option value="<?php echo $country->__get('country_id');?>"><?php echo utf8_encode($country->__get('country_name'));?></option><?php }?></select></li> <li class="date"><select name="prize_year_'+counterExpo+'"><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option></select></li><li class="handler"><a href="#" class="delete-expo"><img src="<?php echo APPLICATION_URL?>images/trash.gif" alt="caneca" title="caneca" width="37" height="37" /></a></li></ul></li>').fadeIn(1000);
		counterPrize = counterPrize+1;
		$('.delete-expo').unbind('click');
		$('.delete-expo').click(function(evt) {
			evt.preventDefault();
			$(this).parent().parent().parent().remove();
		});		
		}); 
		$('.delete-expo').click(function(evt) {
			evt.preventDefault();
			$(this).parent().parent().parent().remove();
		});
		});

</script>	
<?php include_once('footer.php'); ?>