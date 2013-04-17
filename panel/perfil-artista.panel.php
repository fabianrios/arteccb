<?php
if (!isset($_SESSION['panel_id']))
	redirectUrl(APPLICATION_URL.'login.panel.html');
$user 			= new User($_GET[0]);
$userIds		= unserialize($_SESSION["users"]);
$found			= false;
$pastUserId		= 0;
$nextUserId		= 0;
foreach($userIds as $userId)
{
	if($found)
	{
		$nextUserId = $userId;
		break;
	}
	else
	{		
		if($userId == $user->__get('user_id'))
			$found = true;
		else
			$pastUserId = $userId;
	}
}
$pastUser		= new User($pastUserId);
$nextUser		= new User($nextUserId);
$country		= new Country($user->__get('country_id'));
$projects		= ObraHelper::retrieveObras("AND user_id = '" . $user->__get('user_id') . "' ORDER by obra_id");
$dir			= 'resources/images/'. $user->__get('user_id'). '-' .  makeUrlClear(utf8_decode($user->__get('user_name'))).'/';
$expositions	= ExpositionHelper::retrieveExpositions(" AND user_id = ". $user->__get('user_id') . " AND exposition_type = 1  ORDER by exposition_year");
$expositions2	= ExpositionHelper::retrieveExpositions(" AND user_id = ". $user->__get('user_id') . " AND exposition_type = 2  ORDER by exposition_year");
$expositions3	= ExpositionHelper::retrieveExpositions(" AND user_id = ". $user->__get('user_id') . " AND exposition_type = 3  ORDER by exposition_year");
$prizes			= PrizeHelper::retrievePrizes(" AND user_id = ". $user->__get('user_id') . " ORDER by prize_year");
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
	<link rel="stylesheet" href="<?php echo APPLICATION_URL?>stylesheets/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="<?php echo APPLICATION_URL?>css/lightbox.css">
	
	<script type="text/javascript" src="//use.typekit.net/fzq1qvs.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
	
	<script language="JavaScript">var ApplicationUrl = '<?php echo APPLICATION_URL?>';</script>
	
	<script src="<?php echo APPLICATION_URL?>javascripts/jquery.min.js"></script>
	<script src="<?php echo APPLICATION_URL?>javascripts/modernizr.foundation.js"></script>
	<script src="<?php echo APPLICATION_URL?>javascripts/foundation.js"></script>
	<script src="<?php echo APPLICATION_URL?>javascripts/app.js"></script>
	<script src="<?php echo APPLICATION_URL?>javascripts/jquery-ui-1.8.18.custom.min.js"></script>
	<script src="<?php echo APPLICATION_URL?>javascripts/validator.js"></script>
	<script src="<?php echo APPLICATION_URL?>javascripts/lightbox.js"></script>
	<script src="<?php echo APPLICATION_URL?>javascripts/jquery.smooth-scroll.min.js"></script>	
	
	<!--[if lt IE 9]>
		<link rel="stylesheet" href="<?php echo APPLICATION_URL?>stylesheets/ie.css">
	<![endif]-->

	<script language="JavaScript">
	$(function() {
		$('.nav-siguiente').click(function (evt) {
			evt.preventDefault();
			
			e = $('.fader').children('IMG:visible');
			
			if(e.next('IMG').length > 0)
			{				
				e.next('IMG').fadeIn();
			}
			else
			{
				$($('.fader').children('IMG')[0]).fadeIn();
			}
			e.fadeOut();
		});
		$('.nav-anterior').click(function (evt) {
			evt.preventDefault();
			
			e = $('.fader').children('IMG:visible');
			
			if(e.prev('IMG').length > 0)
			{				
				e.prev('IMG').fadeIn();
			}
			else
			{
				$($('.fader').children('IMG')[($('.fader').children('IMG').length - 1)]).fadeIn();
			}
			e.fadeOut();
		});		
	});

	</script>
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
					<a href="<?php echo APPLICATION_URL;?>panel.controller/startSession/<?php echo $user->__get('user_id');?>.html" title="Clic aquí para editar información del artista">Editar perfil</a> | <a href="<?php echo APPLICATION_URL ?>login.panel.html" title="Salir">Salir</a> </p>
                </div>
			</div>
		</div>
		<!-- END columns 2/2 -->
	</div>
		<!-- END header artbo logo -->
</div>	
	
<!-- 2. Navigation -->
<div class="row breadcrumb">
	<div class="six columns">
		<a href="<?php echo APPLICATION_URL?>indice-artistas.panel.html" class="getback"><span><img src="<?php echo APPLICATION_URL?>images/smallarrow.png" alt="" width="17" height="16" /></span>INDICE DE ARTISTAS</a>
	</div>
	<div class="six columns">
		<ul class="main-menu no-bullet">
			<li><a href="#" class="show-section" rel="documents-info"><span><img src="<?php echo APPLICATION_URL?>images/smalldoc.png" alt="" width="12" height="18" /></span>DOCUMENTOS</a></li>
			<li><a href="<?php echo APPLICATION_URL?>generatepdf.control/<?php echo $user->__get('user_id')?>.html" target="_blank"><span><img src="<?php echo APPLICATION_URL?>images/smallfolder.png" alt="" width="17" height="16" /></span>DESCARGAR</a></li>
			<li><a href="<?php echo APPLICATION_URL;?>panel.controller/startSession/<?php echo $user->__get('user_id');?>.html" target="_blank"><span><img src="<?php echo APPLICATION_URL?>images/smalledit.png" alt="" width="17" height="19" /></span>EDITAR</a></li>
			<li><a href="<?php echo APPLICATION_URL?>user.controller/activate/<?php echo $user->__get('user_id')?>.html" class="activate"><span><img src="<?php echo APPLICATION_URL?>images/smallcheck.png" alt="" width="18" height="17" /></span><?php echo ($user->__get('user_state') == 'A') ? 'DESACTIVAR' : 'ACTIVAR'; ?></a></li>
		</ul>
	</div>
</div>
<br />


<!-- 2. End menu -->

	<div class="row main-row">	
		<div class="panel nopadding">
			<div class="documents-info" style="display:none;">
					<div class="container">
						<div class="row">
							<div class="twelve columns">
								<h3>Documentos</h3>
								<ul>
									<li class="right"><a target="_blank" href="<?php echo APPLICATION_URL . $dir . $user->__get('user_document')?>"><img src="<?php echo APPLICATION_URL?>images/doc.png" alt="" width="37" height="55" /><span>DOCUMENTO DE IDENTIDAD</span></a></li>
								</ul>
							</div> 
							<a href="#" class="bigclose show-section" rel="documents-info"> <img src="<?php echo APPLICATION_URL?>images/bigclose.png" alt="" width="30" height="29" /> </a>
						</div>
					</div>
			</div>
			
			<div class="profile-resume">
					<div class="galleryfic">
						<div class="handlers">
							<a href="#" class="nav-anterior" ><img src="<?php echo APPLICATION_URL?>images/toleft.jpg" alt="" width="20" height="20"></a>
			                <a href="#" class="right nav-siguiente" ><img src="<?php echo APPLICATION_URL?>images/toright.jpg" alt="" width="20" height="20"></a>
						</div>
	            		<div class="fader">
							<?php
							$first = true;
							foreach(range(1,3) as $number)
							{
								if(trim($user->__get('user_proyect_image_' . $number)) != '')
								{
									$style = '';
									if(!$first)
										$style = "display:none;";
									$first = false;
									if(file_exists($dir.$user->__get('user_proyect_image_' . $number)))
									{

										?>
										<img style="<?php echo $style?>" src="<?php echo APPLICATION_URL.$dir.$user->__get('user_proyect_image_' . $number)?>" alt="" width="597" />								
										<?php
									}
									else
									{
										?>
										<img style="<?php echo $style?>" src="http://cambelt.co/597x447/<?php echo $user->__get('user_proyect_name')?>?color=b2b2b2" />
										<?php
									}
								
								}
							}
							?>
	                        <div class="resume">
<<<<<<< HEAD
	                            <?php echo $user->__get('user_proyect_name')?> | <?php echo $user->__get('user_proyect_year')?>
=======
	                            <?php echo $user->__get('user_proyect_name')?> | <?php echo $user->__get('user_proyect_dimensions')?> | <?php echo $user->__get('user_proyect_year')?>
>>>>>>> 5e12133283788be24e653ae7553f57dd5c6f3a6f
	                        </div>
						</div>
					</div>
					<!-- para el placeholder -->
					<!-- <img src="http://cambelt.co/597x447/<?php echo $user->__get('user_proyect_name')?>?color=b2b2b2" /> -->
				<!--  -->
				<div class="resum">
					<h4><?php echo $user->__get('user_proyect_name')?></h4>
					<span class="specification"><?php echo $user->__get('user_proyect_format')?> | <?php echo $user->__get('user_proyect_dimensions')?> | <?php echo $user->__get('user_proyect_year')?></span> 
					<a href="<?php echo $user->__get('user_proyect_url')?>" target="_blank" class="website"><?php echo $user->__get('user_proyect_url')?></a>
					<h6>RESEÑA DEL PROYECTO</h6>
					<p><?php echo $user->__get('user_proyect_description')?></p>
				</div>
			</div>
			
			<div class="specific art">
				<div class="container">
					<div class="row">
						<div class="three columns">
							<h3><?php echo $user->__get('user_name')?> <?php echo $user->__get('user_surname')?></h3>
							<ul>
								<li>
									<h6>CORREO ELECTRONICO</h6>
									<span><?php echo $user->__get('user_email')?></span>
								</li>
							</ul>
						</div>
						<div class="nine columns">
							<ul>
								<li>
									<h6>CIUDAD DE RESIDENCIA</h6>
									<span><?php echo $user->__get('user_city')?></span>
								</li>
								<li>
									<h6>LUGAR DE NACIMIENTO</h6>
									<span><?php echo $user->__get('user_born_city')?></span>
								</li>
								<li>
									<h6>IDENTIFICACIÓN</h6>
									<span><?php echo $user->__get('user_document_accept')?></span>
								</li>
								<li>
									<h6>TELÉFONO</h6>
									<span><?php echo $user->__get('user_phone')?></span>
								</li>
								<li>
									<h6>DIRECCIÓN</h6>
									<span><?php echo $user->__get('user_address')?></span>
								</li>
								<li>
									<h6>PAÍS</h6>
									<span><?php echo utf8_encode($country->__get('country_name'))?></span>
								</li>
								<li>
									<h6>FECHA DE NACIMIENTO</h6>
									<span><?php echo formatDate('%d/%m/%Y', $user->__get('user_birthday'))?></span>
								</li>
								<li>
									<h6>MÓVIL</h6>
									<span><?php echo $user->__get('user_mobile')?></span>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			
			<div class="folio">
				<?php 
				$first = true;
				foreach($projects as $obra)
				{
					?>
					<div class="project">
						<div class="container">
							<?php
							if($first)
							{
								?>
								<h3>Portafolio</h3>
								<?php
							}
							$first = false;
							?>
							
							<div class="project-pic">
								<a href="<?php echo APPLICATION_FULL_URL.$dir.'portafolio/'.$obra->__get('obra_image')?>"  rel="lightbox">
								<img src="<?php echo APPLICATION_FULL_URL.$dir.'portafolio/'.$obra->__get('obra_image')?>" alt="" width="530" height="331" />
								</a>
							</div>
							<div class="specs">
								<ul>
									<li>
										<h6>Nombre de la Obra</h6>
										<span><?php echo $obra->__get('obra_name')?></span>
									</li>
									<li>
										<h6>Formato</h6>
										<span><?php echo $obra->__get('obra_format')?></span>
									</li>
									<li>
										<h6>Dimensiones</h6>
										<span><?php echo $obra->__get('obra_dimensions')?></span>
									</li>
									<?php
									if(trim($obra->__get('obra_url')) != '')
									{
										?>
										<li>
											<h6>Url de la obra</h6>
											<span><a href="<?php echo $obra->__get('obra_url')?>" target="_blank">Ver</a></span>
										</li>
										<?php
									}
									?>
									
								</ul>
							</div>
						</div>
					</div>					
					<?php
				}
				?>
				<div class="project lastspecs">
					<div class="container">
						<div class="row">
							<div class="six columns">
								<h4>Estudios</h4>
								<div class="specs">
									<?php
									foreach ($expositions3 as $exposition)
									{
										if(trim($exposition->__get('exposition_name')) != '')
										{
											$country	= new Country($exposition->__get('country_id'));
											?>
											<ul>
												<li>
													<h6>Nombre de la Carrera</h6>
													<span><?php echo $exposition->__get('exposition_name'); ?></span>
												</li>
												<li>
													<h6>Institución</h6>
													<span><?php echo $exposition->__get('exposition_institution'); ?></span>
												</li>
												<li class="city">
													<h6>Ciudad</h6>
													<span><?php echo $exposition->__get('exposition_city'); ?></span>
												</li>
												<li class="country">
													<h6>Pais</h6>
													<span><?php echo utf8_encode($country->__get('country_name')); ?></span>
												</li>
											</ul>
											<?php
										}
									}
									?>
								</div>
							</div>
							<div class="six columns">
								<h4>Becas y premios</h4>
								<div class="specs">
									<ul>
										<?php
										foreach($prizes as $prize)
										{
											?>
											<li>
												<h6><?php echo $prize->__get('prize_name')?></h6>
											</li>
											<?php
										}
										?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="exhibitandfairs">
				<div class="exhibits">
					<div class="container">
						<div class="row">
							<div class="twelve columns">
								<h3>Exposiciones individuales</h3>
								<div class="real-expos">
									<ul>
										<li><h6>EXPOSICIÓNES</h6></li>
										<?php
										foreach ($expositions as $exposition)
										{
											if(trim($exposition->__get('exposition_name')) != '')
											{
												$country	= new Country($exposition->__get('country_id'));
												?>
												<li><h5><?php echo $exposition->__get('exposition_name')?></h5><span><?php echo $exposition->__get('exposition_institution')?>, <?php echo $exposition->__get('exposition_city')?>, <?php echo utf8_encode($country->__get('country_name'))?>. <?php echo $exposition->__get('exposition_year')?></span></li>
												<?php
											}
										}
										?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="fairs">
					<div class="container">
						<div class="row">
							<div class="twelve columns">
								<h3 class="mainh3">Exposiciones Colectivas</h3>
								<div class="real-fairs">
									<ul>
										<li><h6>EXPOSICIÓNES</h6></li>
										<?php
										foreach ($expositions2 as $exposition)
										{
											if(trim($exposition->__get('exposition_name')) != '')
											{
												$country	= new Country($exposition->__get('country_id'));
												?>
												<li><h5><?php echo $exposition->__get('exposition_name')?></h5><span><?php echo $exposition->__get('exposition_institution')?>, <?php echo $exposition->__get('exposition_city')?>, <?php echo utf8_encode($country->__get('country_name'))?>. <?php echo $exposition->__get('exposition_year')?></span></li>
												<?php
											}
										}
										?>		
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			
		<div class="activar">
			<div class="container">
				<div class="row">
					<div class="twelve columns">
						<div class="gallery-name">
							<span>Desea activar a: <strong><?php echo $user->__get('user_name') . ' ' . $user->__get('user_surname') ?></strong></span>
							<a href="<?php echo APPLICATION_URL?>user.controller/activate/<?php echo $user->__get('user_id')?>.html"><span><img src="<?php echo APPLICATION_URL?>images/smallcheck.png" alt="" width="18" height="17" /></span><?php echo ($user->__get('user_state') == 'A') ? 'DESACTIVAR' : 'ACTIVAR'; ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>

		</div><!-- END Main: Panel -->
		<div class="footer-menu">
			<div class="row">
				<div class="four columns">
					<div class="left">
						<?php
						if($pastUser->__get('user_id') != '')
						{
							?>
							<a href="<?php echo APPLICATION_URL?>perfil-artista.panel/<?php echo $pastUser->__get('user_id'); ?>.html"> < <?php echo $pastUser->__get('user_name')?> <?php echo $pastUser->__get('user_surname')?></a>
							<span class="right">ANTERIOR</span>
							<?php
						}
						?>
						
					</div>
				</div>
				<div class="four columns">
					<div class="middle text-center"> 
						<a href="<?php echo APPLICATION_URL?>indice-artistas.panel.html"><img src="<?php echo APPLICATION_URL?>images/smallmenu.png" alt="menu" width="15" height="14" />volver al indice</a>
					</div>
				</div>
				<div class="four columns">
					<div class="right">
						<?php
						if($nextUser->__get('user_id') != '')
						{
							?>						
							<a href="<?php echo APPLICATION_URL?>perfil-artista.panel/<?php echo $nextUser->__get('user_id'); ?>.html"><?php echo $nextUser->__get('user_name')?> <?php echo $nextUser->__get('user_surname')?> ></a>
							<span>SIGUIENTE</span>
							<?php
						}
						?>						
					</div>
				</div>
			</div>
		</div>
	<!-- 3. END Row main --> 
	</div>
	
	
		 

<!-- 4. footer -->			

	<script src="<?php echo APPLICATION_URL?>javascripts/jquery.min.js"></script>
	<script src="<?php echo APPLICATION_URL?>javascripts/jquery-ui-1.8.18.custom.min.js"></script>
	<script src="<?php echo APPLICATION_URL?>javascripts/modernizr.foundation.js"></script>
	<script src="<?php echo APPLICATION_URL?>javascripts/foundation.js"></script>
	<script src="<?php echo APPLICATION_URL?>javascripts/app.js"></script>	
    <script src="<?php echo APPLICATION_URL?>javascripts/jquery.mousewheel.min.js"></script>
    <script src="<?php echo APPLICATION_URL?>javascripts/jquery.mCustomScrollbar.min.js"></script>
    

	<!-- Included JS Files -->

	
	 <script>
    (function($){
        $(window).load(function(){
            $(".specs, .real-expos ul, .real-fairs ul, .this, .resum").mCustomScrollbar({
            	scrollInertia: 150, 
            	advanced:{
			        updateOnContentResize: true
			    }
            });
        });
        $('.show-section').click(function (evt) {
        	evt.preventDefault();
        	$(this).toggleClass('activo');
        	$('.'+$(this).attr('rel')).slideToggle();
        });

    })(jQuery);
	</script>

</body>
<!-- End Body -->
</html>

<!-- 4. End footer -->
 


