<?php require_once('session_header.php'); 
$page = isset($_GET[1]) ? $_GET[1] : 1;
$filter = '';
$zones = ZoneHelper::selectZones();
$system_name = 'zone';
//permissions
$create = 	(PermissionHelper::checkPermission($system_name.'_create') !== false) ? "<a href=\"index.php?control_zone.controller/create\" class=\"cont_administrar2\">Crear Zona</a>" : '';
$update = PermissionHelper::checkPermission($system_name.'_update');
$order 	= PermissionHelper::checkPermission($system_name.'_order');
$delete = PermissionHelper::checkPermission($system_name.'_delete');
$pager = new Pager('', '', '', 'index.php?zone_list', 20, $zones['num_rows'], $page); 
$limit = ' LIMIT ' . $pager->arrayStartNumber . ',' . $pager->resultSize; 
$zones = ZoneHelper::retrieveZones($filter . $limit);
?>
<div id="contenido">
	<h2>Zonas</h2>
	<div class="divider" style="background:none;">
	<div class="clear"></div>
    <div id="mainContent">
		<div id="alertBox">
 	       <?php 
		   $alert = (isset($alert)) ? $alert : array();
		   AlertHelper::placeAlerts($alert); 
		   ?>  
        </div>
		<?php 
            echo $create;
        ?>
        <h3>Listado de Zonas</h3>
        <div class="ruta">
           <a href="index.php?home.control">Inicio</a> &gt; <a href="index.php?zone_list.control">Zone</a>
        </div>
        <table border="0" cellpadding="0" cellspacing="0">
            <tr>
                <th>&nbsp;</th>
                <th><a href="index.php?zone_list/zone_full_name">Nombre</a></th>
                <th><a href="index.php?zone_list/zone_site">Sitio</a></th>
                <th class="width80px"><a href="index.php?zone_list/zone_state">Estado</a></th>
                <th class="widthacciones">Acciones</th>
            </tr>
            <?php
            foreach($zones as $zone)
            {
                $state = ($zone->__get('zone_state') ==  'A') ? 'Activo' : 'Inactivo';
                $state_action = "SimpleAJAXCall('index.php?control_zone.controller/changeState/".$zone->__get('zone_id')."', updateAlert, 'GET', 'u_state_".$zone->__get('zone_id')."');";
				$state_display = ($order !== false) ? '<a href="javascript:void(0)" onClick="'.$state_action.'">'.$state.'</a>' : $state;
                $edit_display  = ($update !== false) ? '<a href="index.php?zone_expand.control'.$zone->__get('zone_id').'" class="edit2" title="Editar"><span>Editar</span></a>' : ""; 	
                $delete_display= ($delete !== false) ? '<a href="index.php?control_zone.controller/delete/'.$zone->__get('zone_id').'" class="itemdel2" onClick="return confirm(\'Esta seguro que desea borrar este usuario?\')" title="Borrar"><span>Eliminar</span></a>' : ""; 		
            	$site = ($zone->__get('site_id') != 0) ? new Site($zone->__get('site_id')) : new Site();;
			?>
               <tr>
                    <td class="table03"><img src="imgcontrol/ico_tree2.gif" width="12" height="12" /></td>
                    <td><a href="index.php?zone_expand.control/<?=$zone->__get('zone_id')?>"><?=$zone->__get('zone_title')?></a></td>
                    <td><?=$site->__get('site_name')?></td>
                    <td class="table01 width80px"><div id="u_state_<?=$zone->__get('zone_id')?>"><?=$state_display ?></div></td>
                    <td class="widthacciones"><?=$delete_display?><?=$edit_display?></td>
                </tr>
            <?php
            }
            ?>
        </table>
        <?php $pager->display() ?>
    </div>
	</div>
</div>
<?php require_once('footer.php'); ?>