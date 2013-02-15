<?php
class ArtistHelper
{
	public static function selectArtists ( $extra = "", $extraTables = ""   )
	{
		$connection  = Connection::getInstance();
		$retrieveArtistsSql    = "SELECT artist_id
								 FROM user_artists" . $extraTables . "
								 WHERE 1 = 1 
								 " . $extra;
		return $connection->query($retrieveArtistsSql);		
	}
	public static function retrieveArtists ( $extra  = "", $extraTables = ""  )
	{
		$Artists = array();
		
		$retrieveArtistsResult = self::selectArtists ( $extra, $extraTables  );
		
		while($ArtistRow = mysql_fetch_assoc($retrieveArtistsResult["query"]))
			$Artists[] = new Artist($ArtistRow["artist_id"]);
			
		return $Artists;
	}
	public static function sendActivationMail($args)
	{
	}
}
?>