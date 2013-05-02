<?php require_once('session_header.php');
$zones = ZoneHelper::retrieveZones();
$selected_zone = new Zone(escape($_GET[0])); 
?>
<div id="contenido"> 
	<h2>Zonas</h2>
	<div class="divider">
		<table width="100%" border="0" cellspacing="0" cellpadding="0" class="layout">
			<tr>
			<td width="170px">
            	<div id="sidebar1"> 
					<ul>
						<li>
							<?php
                            foreach ($zones as $zone)
                            {
                            ?>
                                <a href="index.php?zone_expand.control/<?=$zone->__get('zone_id')?>" class="sidebar_01">
                                    <img src="imgcontrol/ico_tree.gif" />
                                    <span><?=$zone->__get('zone_title')?></span>
                                </a>
                            <?php
                            }
                            ?>
	                    </li>
					</ul>	
				</div>
        	</td>
			<td>
                <div id="mainContent">
                    <div id="alertBox">
                       <?php 
                       $alert = (isset($alert)) ? $alert : array();
                       AlertHelper::placeAlerts($alert); ?>  
                    </div>
                    <h3><?=$selected_zone->__get('zone_title')?></h3>
                    <div class="ruta">
                           <a href="index.php?home.control">Inicio</a> &gt; <a href="index.php?zone_list.control">Zonas</a> &gt; <a href="index.php?zone_expand.control/<?=$selected_zone->__get('zone_id')?>"><?=$selected_zone->__get('zone_title')?></a> 
                    </div>
                    <a href="#" class="sobrepanel2">INFORMACI&Oacute;N B&Aacute;SICA</a>
                    <div class="panel02">
                        <div class="p_infobasica">
                            <p><span>Fecha de Creaci&oacute;n:</span><?php echo formatDate('%d/%m/%Y', $selected_zone->__get('zone_datetime_creation')); ?> </p>
                            <p><span>&Uacute;ltima Modificaci&oacute;n:</span><?php echo formatDate('%d/%m/%Y', $selected_zone->__get('zone_datetime_update')); ?></p>
                        </div>
                    </div>
                    <?php PermissionHelper::displayDocks(7, $selected_zone); ?>
                </div>
	    	</td>
            </tr>
        </table>
	<div class="clear"></div>
	</div>
</div>
<?php require_once('footer.php'); ?>