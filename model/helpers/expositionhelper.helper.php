<?php
class ExpositionHelper
{
	public static function selectExpositions ( $extra = "", $extraTables = ""   )
	{
		$connection  = Connection::getInstance();
		$retrieveExpositionsSql    = "SELECT exposition_id
								 FROM user_expositions" . $extraTables . "
								 WHERE 1 = 1 
								 " . $extra;
		return $connection->query($retrieveExpositionsSql);		
	}
	public static function retrieveExpositions ( $extra  = "", $extraTables = ""  )
	{
		$Expositions = array();
		
		$retrieveExpositionsResult = self::selectExpositions ( $extra, $extraTables  );
		
		while($ExpositionRow = mysql_fetch_assoc($retrieveExpositionsResult["query"]))
			$Expositions[] = new Exposition($ExpositionRow["exposition_id"]);
			
		return $Expositions;
	}
	public static function sendActivationMail($args)
	{
	}
}
?>