<?php
class SiteOperatorHelper
{
	public static function selectSiteOperators ( $extra = "", $extraTables = ""   )
	{
		$connection  = Connection::getInstance();
		$retrieveSiteOperatorsSql    = "SELECT site_operator_id
								 FROM gzgg_sites_operators" . $extraTables . "
								 WHERE 1 = 1 
								 " . $extra;
		return $connection->query($retrieveSiteOperatorsSql);		
	}
	public static function retrieveSiteOperators ( $extra  = "", $extraTables = ""  )
	{
		$siteoperators = array();
		
		$retrieveSiteOperatorsResult = self::selectSiteOperators ( $extra, $extraTables  );
		
		while($siteoperatorRow = mysql_fetch_assoc($retrieveSiteOperatorsResult["query"]))
			$siteoperators[] = new SiteOperator($siteoperatorRow["site_operator_id"]);
			
		return $siteoperators;
	}
	public static function sendActivationMail($args)
	{
	}
}
?>