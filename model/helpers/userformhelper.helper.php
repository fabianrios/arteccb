<?php
class UserFormHelper
{
	public static function selectUserForms ( $extra = "", $extraTables = ""   )
	{
		$connection  = Connection::getInstance();
		$retrieveUsersSql    = "SELECT form_id
							         FROM user_user_forms" . $extraTables . "
								     WHERE 1=1
								     " . $extra;
		return $connection->query($retrieveUsersSql);		
	}
	public static function retrieveUserForms ( $extra  = "", $extraTables = ""  )
	{
		$users = array();
		
		$retrieveUsersResult = self::selectUserForms( $extra, $extraTables  );
		
		while($userRow = mysql_fetch_assoc($retrieveUsersResult["query"]))
			$users[] = new UserForm($userRow["form_id"]);
			
		return $users;
	}
}
?>