<?php
$countries	= CountryHelper::retrieveCountries(" AND country_activated = 1 ORDER by country_name");
$phone		= explode("-", $user->__get('user_phone'));
$mobile		= explode("-", $user->__get('user_mobile'));
//VER CAMPOS REQUERIDOS
$required	= array();
$fields		= UserFieldHelper::retrieveUserFields();
foreach ($fields as $field)
	$required[$field->__get('field_name')]	= 1;
// VALIDAR ERRORES
$userForms	= UserFormHelper::selectUserForms(" AND user_id = ".escape($_SESSION['user_id'])." AND form_number = 1");
function decide($field, $required, $user)
{

	if (!isset($required[$field]))
	{
		return '';
		
	}
	else
	{
		if (($user->__get($field) == '') || ($user->__get($field) == '0') || ($user->__get($field) == "NULL"))
			return 'error';
		else
			return '';
	}
}
?>
<!-- Panel Datos Contacto -->
<div class="six columns">
	<div class="panel-2"><!-- panel -->	
			

		<div class="mid-input">
			<label><strong> Lugar de nacimiento *</strong></label>	
			<input type="text" title="Digite lugar de nacimiento" class="expand input-text <?php echo decide("user_born_city", $required, $user);?>"  name="user_born_city" value="<?php echo $user->__get('user_born_city');?>"/>
		</div>
        
		<div class="mid-input">
	
		<label><strong>Fecha de nacimiento (MM/DD/AAAA)</strong></label>
		<input type="text" title="Digite fecha de nacimiento" id="datepicker" name="user_birthday" value="<?php echo $user->__get('user_birthday');?>" class="small datepicker"/><br/>
		

		</div>        
        		
		<!-- Ciudad -->
		<div class="mid-input">
			<label><strong> Ciudad de residencia*</strong></label>	
			<input type="text" title="Digite ciudad de residencia" name="user_city" class="expand input-text <?php echo decide("user_city", $required, $user);?>" value="<?php echo $user->__get('user_city');?>"/>
		</div>
		<!-- End Ciudad -->
		
		<div class="mid-input">
			<label><strong>País de residencia*</strong></label>	
				<select name="country_id" title="Digite país de residencia" class="<?php echo decide("country_id", $required, $user);?>">
					<option>Seleccione</option>
					<?php
					foreach ($countries as $country)
					{
						$selected = ($country->__get('country_id') == $user->__get('country_id')) ? 'selected="selected"' : '';
					?>
                    	<option value="<?php echo $country->__get('country_id')?>" <?php echo $selected;?>><?php echo utf8_encode($country->__get('country_name'));?></option>
                    <?php
					}
					?>
				</select>
		</div>
			
		<!-- Dirección -->
		<div class=/div>
			
		<!-- Dirección -->
		<div class="mid-input">
			<label><strong> Direcci&oacute;n de residencia*</strong></label>	
			<input type="text" title="Digite dirección de residencia"  name="user_address"  class="expand input-text <?php echo decide("user_address", $required, $user);?>" value="<?php echo $user->__get('user_address');?>"/>
		</div>
		<!-- End Dirección -->
		

		
		
			<!-- Teléfono -->
		<div class="mid-input">
		<strong>Teléfono*</strong>
			<div class="row">
				<!-- columns 1/3 codigo pais -->
				<div class="four columns">
					<label>Código país</label>	
					<input type="text" title="Digite código de país" placeholder="57" name="phone_0" class="small input-text  <?php echo decide("user_phone", $required, $user);?>" value="<?php echo (isset($phone[0])) ? $phone[0] : '';?>"/>
				</div>
				<!--END columns 1/3  codigo pais-->
				<!-- columns 2/3  Area-->
				<div class="four columns">
					<label>Área</label>	
					<input type="text" title="Digite número de área" name="phone_1" class="small input-text <?php echo decide("user_phone", $required, $user);?>" value="<?php echo (isset($phone[1])) ? $phone[1] : '';?>" />
				</div>
				<!-- END columns 2/3 Area-->
				<!-- columns 3/3 Telefono-->
				<div class="four columns">
					<label>Número de teléfono</label>	
					<input type="text" title="Digite número de teléfono" name="phone_2" class="expand input-text <?php echo decide("user_phone", $required, $user);?>" value="<?php echo (isset($phone[2])) ? $phone[2] : '';?>" />
				</div> 
				<!--END columns 3/3 Telefono -->
			</div>
		</div>
		<!-- END telefono -->
		<!-- celular -->
		<strong>Móvil</strong>
		<!-- row -->
		<div class="row">
			<!-- columns 1/3 -->
			<div class="four columns">
				<label>Código país</label>	
				<input type="text" title="Digite código de país" placeholder="57" name="mobile_0"  class="small input-text <?php echo decide("user_mobile", $required, $user);?>"  value="<?php echo (isset($mobile[0])) ? $mobile[0] : '';?>" />	
			</div>
			<!-- END columns 1/3 -->
			<!-- columns 2/3 -->
			<div class="four columns">
				<label>Área</label>	
				<input type="text" title="Digite número de área" class="small input-text <?php echo decide("user_mobile", $required, $user);?>" name="mobile_1"  value="<?php echo (isset($mobile[1])) ? $mobile[1] : '';?>" />
			</div>
			<!--END columns 2/3 -->
			<!-- columns 3/3 -->
			<div class="four columns">
				<label>Número móvil</label>	
				<input type="text" title="Digite número de teléfono" class="expand input-text <?php echo decide("user_mobile", $required, $user);?>" name="mobile_2" value="<?php echo (isset($mobile[2])) ? $mobile[2] : '';?>" />
			</div>
			<!-- END columns 3/3 -->
		</div>
		<!-- END row -->
		<!-- END celular -->
	</div><!-- End panel -->
	
	
</div>	
</div>	
<!-- End  Panel Datos Contacto -->
