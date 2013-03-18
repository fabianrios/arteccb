<?php
$user	= new User($user->__get('user_id'));
$dir		= 'resources/images/'. $user->__get('user_id'). '-' .  makeUrlClear(utf8_decode($user->__get('user_name'))).'/';
//FIRST PAGE
$country	= new Country($user->__get('country_id'));
$phone		= explode("-", $user->__get('user_phone'));
if (count($phone) < 3)
{
	$phone[0]	= '';
	$phone[1]	= '';
	$phone[2]	= '';
}
$mobile		= explode("-", $user->__get('user_mobile'));
if (count($mobile) < 3)
{
	$mobile[0]	= '';
	$mobile[1]	= '';
	$mobile[2]	= '';
}
$html	= '';
//FIRST
$html	.= '<h3>Registro</h3><p>Nombre: <em>'.$user->__get('user_name').'</em><br />Apellido: <em>'.$user->__get('user_surname').'</em><br />Lugar de nacimiento: <em>'.$user->__get('user_born_city').'</em><br />Fecha de nacimiento: <em>'.$user->__get('user_birthday').'</em><br />Ciudad de residencia: <em>'.$user->__get('user_city').'</em><br />Pa&iacute;s de residencia: <em>'.$country->__get('country_name').'</em><br />Direcci&oacute;n de residencia <em>'.$user->__get('user_address').'</em><br />Tel&eacute;fono: '.$phone[0].' <em></em> '.$phone[1].' <em></em> '.$phone[2].'<em></em><br />M&oacute;vil: '.$mobile[0].' <em></em> '.$mobile[1].' <em></em> '.$mobile[2].' <em></em><br /></p>';
//HOJA DE VIDA
//---------------------------------
$expositions	= ExpositionHelper::retrieveExpositions(" AND user_id = ". $user->__get('user_id') . " AND exposition_type = 1  ORDER by exposition_year");
$expositions2	= ExpositionHelper::retrieveExpositions(" AND user_id = ". $user->__get('user_id') . " AND exposition_type = 2  ORDER by exposition_year");
$expositions3	= ExpositionHelper::retrieveExpositions(" AND user_id = ". $user->__get('user_id') . " AND exposition_type = 3  ORDER by exposition_year");
$prizes		= PrizeHelper::retrievePrizes(" AND user_id = ". $user->__get('user_id') . " ORDER by prize_year");
//
$html	.= "<h3>Hoja de vida</h3>";
//ESTUDIOS
$html	.= "<h4>Estudios realizados</h4>";
foreach ($expositions3 as $exposition)
{
	$country	= new Country($exposition->__get('country_id'));
	$html .= '<p>Nombre de la carrera: <em>'.$exposition->__get('exposition_name').'</em><br />Instituci&oacute;n: <em>'.$exposition->__get('exposition_institution').'</em><br />Ciudad: <em>'.$exposition->__get('exposition_city').'</em><br />Pa&iacute;s: <em>'.$country->__get('country_name').'</em><br />A&ntilde;o: <em>'.$exposition->__get('exposition_year').'</em><br /></p>';
}
//EXPOSICIONES
$html	.= "<h4>Exposiciones individuales</h4>";
//
foreach ($expositions as $exposition)
{
	$country	= new Country($exposition->__get('country_id'));
	$html .= '<p>Nombre de la exposicion: <em>'.$exposition->__get('exposition_name').'</em><br />Instituci&oacute;n: <em>'.$exposition->__get('exposition_institution').'</em><br />Ciudad: <em>'.$exposition->__get('exposition_city').'</em><br />Pa&iacute;s: <em>'.$country->__get('country_name').'</em><br />A&ntilde;o: <em>'.$exposition->__get('exposition_year').'</em><br /></p>';
}
//EXPOSICIONES COLECTIVAS
$html	.= "<h4>Exposiciones colectivas</h4>";
//
foreach ($expositions2 as $exposition)
{
	$country	= new Country($exposition->__get('country_id'));
	$html .= '<p>Nombre de la exposicion: <em>'.$exposition->__get('exposition_name').'</em><br />Instituci&oacute;n: <em>'.$exposition->__get('exposition_institution').'</em><br />Ciudad: <em>'.$exposition->__get('exposition_city').'</em><br />Pa&iacute;s: <em>'.$country->__get('country_name').'</em><br />A&ntilde;o: <em>'.$exposition->__get('exposition_year').'</em><br /></p>';
}
//PREMIOS
$html	.= "<h4>Becas y premios</h4>";
//
foreach ($prizes as $prize)
{
	$country	= new Country($prize->__get('country_id'));
	$html	.= '<p>  Nombre del premio: <em>'.$prize->__get('prize_name').'</em><br />Instituci&oacute;n: <em>'.$prize->__get('prize_institution').'</em><br />Ciudad: <em>'.$prize->__get('prize_city').'</em><br />Pa&iacute;s: <em>'.$country->__get('country_id').'</em><br />A&ntilde;o: <em>'.$prize->__get('prize_year').'</em><br /></p>';
}
//PROYECTO ARTECAMARA
//-------------------------------
$html	.= "<h3>Projecto Artec&aacute;mara</h3>";
$html	.= '<p>Proyecto: <em>'.$user->__get('user_proyect_description').'</em><br />Nombre de la obra: <em>'.$user->__get('user_proyect_name').'</em><br />Dimensiones (mts): <em></em>'.$user->__get('user_proyect_dimensions').'<br />Formato o t&eacute;cnica: <em>'.$user->__get('user_proyect_format').'</em><br />A&ntilde;o: <em>'.$user->__get('user_proyect_year').'</em><br />Url de la obra: <em>'.$user->__get('user_proyect_url').'</em><br /></p>';
$html	.= "<h3>Im&aacute;genes</h3>";
$html	.= '<p>';
	$html	.= ($user->__get('user_proyect_image_1') != '') ? '<em>'.APPLICATION_FULL_URL.$dir.$user->__get('user_proyect_image_1').'</em><br />' : '';
	$html	.= ($user->__get('user_proyect_image_2') != '') ? '<em>'.APPLICATION_FULL_URL.$dir.$user->__get('user_proyect_image_2').'</em><br />' : '';
	$html	.= ($user->__get('user_proyect_image_3') != '') ? '<em>'.APPLICATION_FULL_URL.$dir.$user->__get('user_proyect_image_3').'</em><br />' : '';
$html	.= '</p>';

//PORTAFOLIO
//-------------------------------
$html	.= "<h3>Portafolio</h3>";
//
$obras	= ObraHelper::retrieveObras("AND user_id = '" . $user->__get('user_id') . "' ORDER by obra_id");
//
foreach ($obras as $obra)
{
	if ($obra->__get('obra_name') != '')
	{
		$html	.= '<p>Imagen de la obra: <em>'.APPLICATION_FULL_URL.$dir.'portafolio/'.$obra->__get('obra_image').'</em><br />Nombre de la obra: <em>'.$obra->__get('obra_name').'</em><br />Dimensiones: <em>'.$obra->__get('obra_dimensions').'</em><br />Formato o t&eacute;cnica: <em>'.$obra->__get('obra_format').'</em><br />Url de la obra: <em>'.$obra->__get('obra_url').'</em><br />A&ntilde;o: <em>'.$obra->__get('obra_year').'</em><br /> </p>';
	}
}
//DOCUMENTOS
//---------------------
$image	=  APPLICATION_FULL_URL.$dir.$user->__get('user_document');
$html	.= '<h3>Documentos</h3>';
$html	.= '<p> Documento de identidad: <em>'.$image.'</em><br /></p>';

$html	= utf8_decode($html); 
	

?>