<?php
class PlantingHelper
{
	public static function selectPlantings ( $extra = "", $extraTables = ""   )
	{
		$connection  = Connection::getInstance();
		$retrievePlantingsSql    = "SELECT planting_id
								 FROM gzgg_plantings" . $extraTables . "
								 WHERE 1 = 1 
								 " . $extra;
		return $connection->query($retrievePlantingsSql);		
	}
	public static function retrievePlantings ( $extra  = "", $extraTables = ""  )
	{
		$plantings = array();
		
		$retrievePlantingsResult = self::selectPlantings ( $extra, $extraTables  );
		
		while($plantingRow = mysql_fetch_assoc($retrievePlantingsResult["query"]))
			$plantings[] = new Planting($plantingRow["planting_id"]);
			
		return $plantings;
	}
	public static function sendActivationMail($args)
	{
	}
}
?>