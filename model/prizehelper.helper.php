<?php
class PrizeHelper
{
	public static function selectPrizes ( $extra = "", $extraTables = ""   )
	{
		$connection  = Connection::getInstance();
		$retrievePrizesSql    = "SELECT prize_id
								 FROM user_prizes" . $extraTables . "
								 WHERE 1 = 1 
								 " . $extra;
		return $connection->query($retrievePrizesSql);		
	}
	public static function retrievePrizes ( $extra  = "", $extraTables = ""  )
	{
		$Prizes = array();
		
		$retrievePrizesResult = self::selectPrizes ( $extra, $extraTables  );
		
		while($PrizeRow = mysql_fetch_assoc($retrievePrizesResult["query"]))
			$Prizes[] = new Prize($PrizeRow["prize_id"]);
			
		return $Prizes;
	}
	public static function sendActivationMail($args)
	{
	}
}
?>