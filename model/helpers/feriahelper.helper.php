<?php
class FeriaHelper
{
	public static function selectFerias ( $extra = "", $extraTables = ""   )
	{
		$connection  = Connection::getInstance();
		$retrieveFeriasSql    = "SELECT feria_id
								 FROM user_ferias" . $extraTables . "
								 WHERE 1 = 1 
								 " . $extra;
		return $connection->query($retrieveFeriasSql);		
	}
	public static function retrieveFerias ( $extra  = "", $extraTables = ""  )
	{
		$Ferias = array();
		
		$retrieveFeriasResult = self::selectFerias ( $extra, $extraTables  );
		
		while($FeriaRow = mysql_fetch_assoc($retrieveFeriasResult["query"]))
			$Ferias[] = new Feria($FeriaRow["feria_id"]);
			
		return $Ferias;
	}
	public static function sendActivationMail($args)
	{
	}
}
?>