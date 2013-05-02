<?php
$connection  			= Connection::getInstance();
$retrieveusuariosSql 	= "SELECT *  FROM user_users  ORDER by user_id";
$retrieveusuariosQry 	= $connection->query($retrieveusuariosSql);	
$retrieveusuariosNum 	= $retrieveusuariosQry['num_rows'];
$resultNum     			= $retrieveusuariosQry['num_rows'];
$result 				= $retrieveusuariosQry['query'];
$retrieveusuariosQry	= $retrieveusuariosQry['query'];
$count 					= mysql_num_fields($retrieveusuariosQry);
$data ='';
$header = '';
for ($i = 0; $i < $count; $i++){
    $header .= mysql_field_name($result, $i)."\t";
}
//$header . = " Departamento"."\t";
//$header . = " País"."\t";

$gallery	= new User();

while($row = mysql_fetch_row($result)){
  $line = '';
  foreach($row as $key=>$value){
	  
    if(!isset($value) || $value == "")
      $value = "\t";
	else
	{
		
	if ($key == 0)
	{
		$gallery = new User($value);
		$value = str_replace('"', '""', $value);
	}
	
	else if ($key == 6)
		$value = str_replace('"', '""', "http://www.activemgmd.com/ccb/ccb-artista/resources/images/".$value);
	 else if ($key == 10)
	  {
		if ($value != '0')
		{
	
			  $country	= new Country($value);
			  $value 	= $country->__get('country_name');
		}
		else
			  $value = str_replace('"', '""', $value);	
	  }	 		
	else if ($key == 28)
		$value = str_replace('"', '""', "http://www.activemgmd.com/ccb/ccb-artista/resources/images/".makeUrlClear(utf8_decode($gallery->__get('user_name'))).'/'.$value);		
	else if ($key == 40)
		$value = str_replace('"', '""', "http://www.activemgmd.com/ccb/ccb-artista/resources/images/".makeUrlClear(utf8_decode($gallery->__get('user_name'))).'/proyecto/'.$value);		
	else if ($key == 41)
		$value = str_replace('"', '""', "http://www.activemgmd.com/ccb/ccb-artista/resources/images/".makeUrlClear(utf8_decode($gallery->__get('user_name'))).'/proyecto/'.$value);		
	else if ($key == 42)
		$value = str_replace('"', '""', "http://www.activemgmd.com/ccb/ccb-artista/resources/images/".makeUrlClear(utf8_decode($gallery->__get('user_name'))).'/proyecto/'.$value);		
  	else if ($key == 43)
  	{
		if ($value != '0')
		  $value = 'Si';
	 	else
		  $value = 'No';	
  	}	
	else
		$value = str_replace('"', '""', $value);
# needed to encapsulate data in quotes because some data might be multi line.
# the good news is that numbers remain numbers in Excel even though quoted.
      $value = '"' . utf8_decode($value) . '"' . "\t";
    }
    $line .= $value;
  }
  $data .= trim($line)."\n"; 
}
# this line is needed because returns embedded in the data have "\r"
# and this looks like a "box character" in Excel
  $data = str_replace("\r", "", $data);

# Nice to let someone know that the search came up empty.
# Otherwise only the column name headers will be output to Excel.
if ($data == "") 
{
  $data = "\nno matching records found\n";
}
# This line will stream the file to the user rather than spray it across the screen
header("Content-type: application/octet-stream");
# replace excelfile.xls with whatever you want the filename to default to
header("Content-Disposition: attachment; filename=excelfile.xls");
header("Pragma: no-cache");
header("Expires: 0");
echo $header."\n".$data;
?>