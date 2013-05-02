<?php
class SelectHelper
{
	public static function selectSelects( $extra = "", $extraTables = ""   )
	{
		$connection  = Connection::getInstance();
		$retrieveUsersSql    = "SELECT select_id
							         FROM pane_select" . $extraTables . "
								     WHERE 1=1
								     " . $extra;
		return $connection->query($retrieveUsersSql);		
	}
	public static function retrieveSelects ( $extra  = "", $extraTables = ""  )
	{
		$users = array();
		
		$retrieveUsersResult = self::selectSelects ( $extra, $extraTables  );
		
		while($userRow = mysql_fetch_assoc($retrieveUsersResult["query"]))
			$users[] = new Select($userRow["select_id"]);
			
		return $users;
	}
}
?>