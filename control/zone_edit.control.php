<?php
	$sites = SiteHelper::retrieveSites(" ORDER by site_name");
?>
<div class="panel02">
	<form action="index.php?control_zone.controller/update" method="post" id="validable">
		<input type="hidden" name="zone_id" value="<?=$object->__get('zone_id')?>" />
        <label> 
            <span>Titulo de la zona</span>
            <input type="text" name="zone_title" id="zone_title" value="<?=$object->__get('zone_title')?>" />
        </label>
        <label> 
            <span>Descripción</span>
            <input type="text" name="zone_description" id="zone_description" value="<?=$object->__get('zone_description')?>" />
        </label> 
        <label>
        	<span>Link</span>
            <input readonly type="text" name="zone_link" id="input_zone_link" value="<?=$object->__get('zone_link')?>" /><a href="javascript:void(0);" onclick="SimpleAJAXCall('index.php?form_popup.control/setLinkContent/input_zone_link', loadFormLayer, 'GET', 'window2');"><img src="imgcontrol/magnify.gif"/></a>
        </label>       
        <label> 
            <span>Sitio</span>
			<select name="site_id">
            	<?php 
				foreach ($sites as $site)
				{
					$selected = ($site->__get('site_id') == $object->__get('site_id')) ? 'selected="selected"' : '';
				?>
                	<option value="<?=$site->__get('site_id')?>" <?=$selected?>><?=$site->__get('site_name')?></option>
				<?php
				}
				?>	
            </select>
        </label>
        <label> 
            <span>Codigo</span>
            <input type="text" name="zone_code" id="zone_code" value="<?=$object->__get('zone_code')?>" />
        </label>         
        <div class="botones">
            <input name="" type="image" src="imgcontrol/bot_guardar.gif" alt="Guardar" width="170" height="42" />
            <input name="" type="image" src="imgcontrol/bot_cancelar.gif" alt="Cancelar" width="127" height="28" />
        </div>
	</form>
</div>