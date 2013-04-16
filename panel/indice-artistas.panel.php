<?php
if (!isset($_SESSION['panel_id']))
	redirectUrl(APPLICATION_URL.'login.panel.html');
$size				= isset($_GET[0]) ? $_GET[0] : '20';
$order				= isset($_GET[1]) ? escape(urldecode($_GET[1])) : 'user_date_login DESC';

if(isset($_POST["search_criteria"]))
	$_GET[2] = $_POST["search_criteria"];
$search				= isset($_GET[2]) ? escape(urldecode($_GET[2])) : 'null';

$page				= isset($_GET[3]) ? $_GET[3] : 1;
$filter 			= '';
if($search != 'null')
{
	$filter = "AND (user_name LIKE '%" . $search . "%' OR user_surname LIKE '%" . $search . "%' OR user_gallery_document LIKE '%" . $search . "%' OR user_proyect_name LIKE '%" . $search . "%')"; 
}
$userResult 		= UserHelper::selectUsers($filter . " AND user_finalizado = 1 ORDER by " . $order);
$pager  			= new PanelPager($size . '/' . $order . '/' . $search, '', '', APPLICATION_URL . 'indice-artistas.panel', $size, $userResult["num_rows"], $page);
$limit 				= ' LIMIT ' . $pager->arrayStartNumber . ',' . $pager->resultSize; 
$users 				= UserHelper::retrieveUsers($filter . " AND user_finalizado = 1 ORDER by " . $order . " " . $limit);
$userIds			= array();
while($row = mysql_fetch_assoc($userResult["query"]))
	$userIds[] = $row["user_id"];
$_SESSION["users"] 	= serialize($userIds);
?>
<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />

	<!-- Set the viewport width to device width for mobile -->
	<!-- <meta name="viewport" content="width=device-width" /> -->

	<title>Artecámara</title>
  
	<!-- Included CSS Files -->
	<link rel="stylesheet" href="<?php echo APPLICATION_URL?>stylesheets/app.css">
	<link rel="stylesheet" href="<?php echo APPLICATION_URL?>stylesheets/new.css">
	<link rel="stylesheet" href="<?php echo APPLICATION_URL?>stylesheets/style.css">
	<link rel="stylesheet" href="<?php echo APPLICATION_URL?>stylesheets/foundation-overrides.css">
	<link rel="stylesheet" href="<?php echo APPLICATION_URL?>stylesheets/phase.css">
	<link rel="stylesheet" href="<?php echo APPLICATION_URL?>css/lightbox.css">
	
	
	
	<script type="text/javascript" src="//use.typekit.net/fzq1qvs.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

	
	<script src="<?php echo APPLICATION_URL?>javascripts/jquery.min.js"></script>
	<script src="<?php echo APPLICATION_URL?>javascripts/modernizr.foundation.js"></script>
	<script src="<?php echo APPLICATION_URL?>javascripts/foundation.js"></script>
	<script src="<?php echo APPLICATION_URL?>javascripts/app.js"></script>
	<script src="<?php echo APPLICATION_URL?>javascripts/jquery-ui-1.8.18.custom.min.js"></script>
	<script src="<?php echo APPLICATION_URL?>javascripts/validator.js"></script>
	
	
	<!--[if lt IE 9]>
		<link rel="stylesheet" href="<?php echo APPLICATION_URL?>stylesheets/ie.css">
	<![endif]-->


	<!-- IE Fix for HTML5 Tags -->
	<!--[if lt IE 9]>
		<script src="<?php echo APPLICATION_URL?>http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

</head>

<body>


<div class="encabezado">
		<!-- header artbo logo -->
	<div class="row superior-2">	
		<!-- columns 1/2 -->
		<div class="four columns">
				<img class="logo" src="<?php echo APPLICATION_URL?>images/sprite_new.png" height="76" width="436" alt="logo" />
		</div>
		<!-- END columns 1/2 -->
		<?php
		$userP	= new UserP($_SESSION['panel_id']);
		?>		
		<!-- columns 2/2 -->
		<div class="eight columns lateralder ">
			<div class="perfil-data">
				<div class="perfil second left">
					<p class="left"><strong><?php echo $userP->__get('user_name') ?></strong>
					<a href="<?php echo APPLICATION_URL ?>login.panel.html" title="Salir">Salir</a> </p>
                </div>
			</div>
		</div>
		<!-- END columns 2/2 -->
	</div>
		<!-- END header artbo logo -->
</div>	

<div class="row breadcrumb">
	<div class="twelve columns">
		<h5 class="redtext">Artistas</h5>
		<h3>Indice de artistas</h3>
		<h5>Este es el registro de todos las artistas registrados para Artecámara 2013</h5>
	</div>
</div>
<br />


	<div class="row main-row">	
		<div class="panel nopadding mtop20">
			<div class="first-header">
				
					<div class="row">
						<div class="six columns">
							<form action="<?php echo APPLICATION_URL?>indice-artistas.panel.html" method="post" accept-charset="utf-8">
								<input type="text" name="search_criteria" value="" id="search" placeholder="Buscar"/>
							</form>
						</div>
						<div class="six columns">
							<form action="indice-galerias_serch" method="post" accept-charset="utf-8">
								<div class="whomany">
									<span>Mostrar</span>
									<select name="registers" id="" onchange="window.location.href = '<?php echo APPLICATION_URL?>indice-artistas.panel/' + this.value + '.html';">
										<option value="20" <?php echo ($size == '20') ? 'selected' : '';?>>20</option>
										<option value="40" <?php echo ($size == '40') ? 'selected' : '';?>>40</option>
										<option value="60" <?php echo ($size == '60') ? 'selected' : '';?>>60</option>
										<option value="80" <?php echo ($size == '80') ? 'selected' : '';?>>80</option>
										<option value="100" <?php echo ($size == '100') ? 'selected' : '';?>>100</option>
									</select>
									<span>registros</span>
								</div>
							</form>
						</div>
					</div>
			</div>
			<div class="inner-header watch">
				<div class="row">
			 		<div class="twelve columns">
						<table border="0" cellspacing="0" cellpadding="0">
							<thead>
								<tr>
									<th>Nombre del artista <a href="<?php echo APPLICATION_URL?>indice-artistas.panel/<?php echo $size?>/<?php echo 'TRIM(user_name), TRIM(user_surname)'?>.html">▲</a> </th>
									<th>Contacto</th>
									<th>Documento</th>
									<th></th>
									<th></th>
								</tr>
							</thead>
							<?php
							foreach($users as $user)
							{
								?>
								<tr>
									<td><a href="<?php echo APPLICATION_URL?>perfil-artista.panel/<?php echo $user->__get('user_id')?>.html"><?php echo $user->__get('user_name')?> <?php echo $user->__get('user_surname')?></a></td>
									<td><a href="mailto:<?php echo $user->__get('user_email')?>"><?php echo $user->__get('user_email')?></a></td>
									<td><?php echo $user->__get('user_gallery_document')?></td>
									<td><span class="label <?php echo ($user->__get('user_state') == 'A') ? 'red' : 'gray'; ?>"><?php echo ($user->__get('user_state') == 'A') ? 'activo' : 'inactivo'; ?></span></td>
									<td><a href="<?php echo APPLICATION_URL?>perfil-artista.panel/<?php echo $user->__get('user_id')?>.html"><img src="<?php echo APPLICATION_URL?>images/view.png" alt="" width="24" height="24" /></a></td>
								</tr>								
								<?php
							}
							?>

						</table>
					</div>
				</div>
		</div>
		<!-- panel -->
	

			<div class="inner-footer change">
						<div class="container">
							<div class="row">
								<div class="six columns centered">
									<div class="pag">
										<ul class="pagination">
										  <?php $pager->display(3); ?>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div><!--/inner-footer-->
				</div><!-- END Main: Panel -->
				<div class="advisory">
					<span>Recomendamos visualizar en: IE 9.0 - Firefox 10.0 - Safari 5.1 - Chrome 17.0
					Optimizada 1024 x 768</span>
					<span><a href="http://www.artboonline.com/documentos/2130_reglamento_participacion_2013.pdf" target="_blank">Términos y Condiciones</a> del sitio</span>
				</div>
		</div>
	<!-- 3. END Row main --> 
		
	<!-- Included JS Files -->

	
 	<script type="text/javascript" charset="utf-8">
	 	 $(document).ready(function() {
	 	
			 	 $("#lewitt").click(function(e) {
			 	 	e.preventDefault();
			    	console.log($(this)); 
			        $("#SolLeWitt").reveal();
			    });
	 	});
	 </script>
	 
	 <script>
    (function($){
        $(window).load(function(){
            $(".resum, .real-expos ul, .real-fairs ul, .this, .artistr p").mCustomScrollbar({
            	scrollInertia: 150, 
            	advanced:{
			        updateOnContentResize: true
			    }
            });
        });
    })(jQuery);
	</script>

</body>
<!-- End Body -->
</html>


