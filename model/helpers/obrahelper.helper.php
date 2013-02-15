<?php
class ObraHelper
{
	public static function selectObras ( $extra = "", $extraTables = ""   )
	{
		$connection  = Connection::getInstance();
		$retrieveObrasSql    = "SELECT obra_id
								 FROM user_obras" . $extraTables . "
								 WHERE 1 = 1 
								 " . $extra;
		return $connection->query($retrieveObrasSql);		
	}
	public static function retrieveObras ( $extra  = "", $extraTables = ""  )
	{
		$Obras = array();
		
		$retrieveObrasResult = self::selectObras ( $extra, $extraTables  );
		
		while($ObraRow = mysql_fetch_assoc($retrieveObrasResult["query"]))
			$Obras[] = new Obra($ObraRow["obra_id"]);
			
		return $Obras;
	}
	public static function sendActivationMail($args)
	{
	}
}
?>