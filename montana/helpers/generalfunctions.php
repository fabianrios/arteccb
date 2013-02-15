<?php	




function formatNumber($number, $decPlaces = 2, $tensSeparator = '.', $thousandSeparator = ',')
{
	return number_format($number, $decPlaces, $tensSeparator, $thousandSeparator);
}

function limitString($string, $newSize, $stripTags = false)
{
	if($stripTags)
		$string = strip_tags($string);
	$string = htmlspecialchars_decode($string);
	$string = substr($string, 0, $newSize);
	
	return $string;
}

function isSerialized($str) 
{
    return ($str == serialize(false) || @unserialize($str) !== false);
}
function documentURLName($document)
{
	return urlencode(str_replace(" ", "_", $document));
}
function escape($string)
{
    $connection	= Connection::getInstance();
	if(function_exists("mysql_real_escape_string"))
		$string = mysql_real_escape_string($string);
	elseif(function_exists("mysql_escape_string"))
		$string = mysql_escape_string($string);
	else
		$string = str_replace("'", "\\'", $string);
	
	return $string;
}
function montanaPrint($var)
{
	echo '<pre>';
	print_r($var);
	echo '</pre>';
}

function makeCleanTitle($string)
{
	return urlencode(str_replace(" ", "-", strtolower($string)));
}

function selfURL() 
{ 
	$s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : ""; 
	$protocol = strleft(strtolower($_SERVER["SERVER_PROTOCOL"]), "/").$s; 
	$port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]); 
	return $protocol."://".$_SERVER['SERVER_NAME'].$port.$_SERVER['REQUEST_URI']; 
} 

function strleft($s1, $s2) 
{ 
	return substr($s1, 0, strpos($s1, $s2)); 
}

function ceil_hundreds($num)
{
	 return (ceil($num / 100) * 100); 	
}
function ceiling_hundreds($num)
{
	 return (ceil($num / 100) * 100); 	
}

function uc_latin1($str)
{
	$LATIN1_UC_CHARS = "ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝ";
	$LATIN1_LC_CHARS= "àáâãäåæçèéêëìíîïðñòóôõöøùúûüý";

		$str = strtoupper(strtr($str, $LATIN1_LC_CHARS, $LATIN1_UC_CHARS));
		return strtr($str, array("ß" => "SS"));
}

function validMayus($str)
{

	$search  = array('á', 'é', 'í', 'ó', 'ú');
	$replace = array('Á', 'É', 'Í', 'Ó', 'Ú');
	echo str_replace($search, $replace, $str);
}

function validImages($image,$ruta = '83x83')
{
	if(strripos($image, 'profile') !== false)
		$imageProfile	= $image;
	elseif(strlen(trim($image))>1)
		$imageProfile	= APPLICATION_URL.'resources/images/'.$ruta.'/'.$image;	
	else
		$imageProfile	= APPLICATION_URL.'resources/images/'.$ruta.'/default.gif';
	
	return $imageProfile;
}
function searchResource($id,$nameField = 'content_gallery_1',$defaul = 'default.gif')
{
	$images = ResourceHelper::getGallery($id,$nameField);
	$image	= (count($images)>0) ? $images[0]->__get('resource_file') : $defaul;
	return $image;
}
?>
