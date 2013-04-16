<?php
class UserPHelper
{
	public static function selectUsers ( $extra = "", $extraTables = ""   )
	{
		$connection  = Connection::getInstance();
		$retrieveUsersSql    = "SELECT user_id
							         FROM pane_users" . $extraTables . "
								     WHERE 1=1
								     " . $extra;
		return $connection->query($retrieveUsersSql);		
	}
	public static function retrieveUsers ( $extra  = "", $extraTables = ""  )
	{
		$users = array();
		
		$retrieveUsersResult = self::selectUsers ( $extra, $extraTables  );
		
		while($userRow = mysql_fetch_assoc($retrieveUsersResult["query"]))
			$users[] = new UserP($userRow["user_id"]);
			
		return $users;
	}
}
?>