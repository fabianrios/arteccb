<?php
class UserFieldHelper
{
	public static function selectUserFields ( $extra = "", $extraTables = ""   )
	{
		$connection  = Connection::getInstance();
		$retrieveUsersSql    = "SELECT field_id
							         FROM user_fields" . $extraTables . "
								     WHERE 1=1
								     " . $extra;
		return $connection->query($retrieveUsersSql);		
	}
	public static function retrieveUserFields ( $extra  = "", $extraTables = ""  )
	{
		$users = array();
		
		$retrieveUsersResult = self::selectUserFields( $extra, $extraTables  );
		
		while($userRow = mysql_fetch_assoc($retrieveUsersResult["query"]))
			$users[] = new UserField($userRow["field_id"]);
			
		return $users;
	}
}
?>