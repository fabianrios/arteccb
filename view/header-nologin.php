<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<script src="<?php echo APPLICATION_URL?>javascripts/jquery.min.js"></script>
	<script src="<?php echo APPLICATION_URL?>javascripts/modernizr.foundation.js"></script>
	<script src="<?php echo APPLICATION_URL?>javascripts/foundation.js"></script>
	<script src="<?php echo APPLICATION_URL?>javascripts/app.js"></script>
	<script src="<?php echo APPLICATION_URL?>javascripts/jquery-ui-1.8.18.custom.min.js"></script>
	<script src="<?php echo APPLICATION_URL?>javascripts/validator.js"></script>
	<meta charset="utf-8" />

	<!-- Set the viewport width to device width for mobile -->
	<meta name="viewport" content="width=device-width" />

	<title>ArtBo</title>
  
	<!-- Included CSS Files -->
	<link rel="stylesheet" href="<?php echo APPLICATION_URL?>stylesheets/foundation.css">
	<link rel="stylesheet" href="<?php echo APPLICATION_URL?>stylesheets/app.css">
	<link rel="stylesheet" href="<?php echo APPLICATION_URL?>stylesheets/ui-lightness/jquery-ui-1.8.18.custom.css">

	<!--[if lt IE 9]>
		<link rel="stylesheet" href="<?php echo APPLICATION_URL?>stylesheets/ie.css">
	<![endif]-->


	<!-- IE Fix for HTML5 Tags -->
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

</head>

<body>

<?php include_once('artbo-header.php'); ?>
