<?php

class CommentHelper

{

	public static function selectComments ( $extra = "", $extraTables = ""   )

	{

		$connection  = Connection::getInstance();

		$retrieveCommentsSql    = "SELECT comment_id

								 FROM cont_comments" . $extraTables . "

								 WHERE comment_state <> 'D'

								 " . $extra;

		return $connection->query($retrieveCommentsSql);		

	}

	public static function retrieveComments ( $extra  = "", $extraTables = ""  )

	{

		$comments = array();

		

		$retrieveCommentsResult = self::selectComments ( $extra, $extraTables  );

		

		while($commentRow = mysql_fetch_assoc($retrieveCommentsResult["query"]))

			$comments[] = new Comment($commentRow["comment_id"]);

			

		return $comments;

	}

}

?>