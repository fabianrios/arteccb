<?php
class ExpositionHelper
{
	public static function selectTrees ( $extra = "", $extraTables = ""   )
	{
		$connection  = Connection::getInstance();
		$retrieveTreesSql    = "SELECT exposition_id
								 FROM user_expositions" . $extraTables . "
								 WHERE 1 = 1 
								 " . $extra;
		return $connection->query($retrieveTreesSql);		
	}
	public static function retrieveTrees ( $extra  = "", $extraTables = ""  )
	{
		$trees = array();
		
		$retrieveTreesResult = self::selectTrees ( $extra, $extraTables  );
		
		while($treeRow = mysql_fetch_assoc($retrieveTreesResult["query"]))
			$trees[] = new Tree($treeRow["tree_id"]);
			
		return $trees;
	}
	public static function sendActivationMail($args)
	{
	}
}
?>