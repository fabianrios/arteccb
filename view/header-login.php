<?php 
if (isset($_SESSION['user_id']))
	$userId	= $_SESSION['user_id'];
else
	redirectUrl(APPLICATION_URL.'home.html');
$user	= new User($userId);
require_once(SITE_VIEW."header-nologin.php");
?>
