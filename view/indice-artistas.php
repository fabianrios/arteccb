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
	<link rel="stylesheet" href="stylesheets/app.css">
	<link rel="stylesheet" href="stylesheets/new.css">
	<link rel="stylesheet" href="stylesheets/style.css">
	<link rel="stylesheet" href="stylesheets/foundation-overrides.css">
	<link rel="stylesheet" href="stylesheets/phase.css">
	
	
	
	<script type="text/javascript" src="//use.typekit.net/fzq1qvs.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

	
	<script src="javascripts/jquery.min.js"></script>
	<script src="javascripts/modernizr.foundation.js"></script>
	<script src="javascripts/foundation.js"></script>
	<script src="javascripts/app.js"></script>
	<script src="javascripts/jquery-ui-1.8.18.custom.min.js"></script>
	<script src="javascripts/validator.js"></script>
	
	
	<!--[if lt IE 9]>
		<link rel="stylesheet" href="stylesheets/ie.css">
	<![endif]-->


	<!-- IE Fix for HTML5 Tags -->
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

</head>

<body>


<div class="encabezado">
		<!-- header artbo logo -->
	<div class="row superior-2">	
		<!-- columns 1/2 -->
		<div class="four columns">
				<img class="logo" src="images/sprite_new.png" height="76" width="436" alt="logo" />
		</div>
		<!-- END columns 1/2 -->
		
		<!-- columns 2/2 -->
		<div class="eight columns lateralder ">
			<div class="perfil-data">
				<div class="perfil second left">
					<p class="left"><strong>Angelica Gamboa</strong>
					<a href="#" title="Clic aquí para editar información del artista">Editar perfil</a> | <a href="#" title="Salir">Salir</a> </p>
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
							<form action="indice-galerias_serch" method="post" accept-charset="utf-8">
								<input type="text" name="search" value="" id="search" placeholder="Buscar"/>
							</form>
						</div>
						<div class="six columns">
							<form action="indice-galerias_serch" method="post" accept-charset="utf-8">
								<div class="whomany">
									<span>Mostrar</span>
									<select name="registers" id="">
										<option value="5">5</option>
										<option value="10">10</option>
										<option value="20">20</option>
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
									<th>Nombre del artista <a href="#">▲</a> </th>
									<th>Contacto</th>
									<th>Documento</th>
									<th></th>
									<th></th>
								</tr>
							</thead>
							<tr>
								<td><a href="#">Hugo Marin</a></td>
								<td><a href="mailto:Hola@micorreo">Hola@micorreo</a></td>
								<td>80774028</td>
								<td><span class="label red">activo</span></td>
								<td><a href="#"><img src="images/view.png" alt="" width="24" height="24" /></a></td>
							</tr>
							<tr>
								<td><a href="#">Fabián Ríos</a></td>
								<td><a href="mailto:contacto@micorreo">contacto@micorreo</a></td>
								<td>80022812</td>
								<td><span class="label gray">inactivo</span></td>
								<td><a href="#"><img src="images/view.png" alt="" width="24" height="24" /></a></td>
							</tr>
							<tr>
								<td><a href="#">Hugo Marin</a></td>
								<td><a href="mailto:Hola@micorreo">Hola@micorreo</a></td>
								<td>80774028</td>
								<td><span class="label red">activo</span></td>
								<td><a href="#"><img src="images/view.png" alt="" width="24" height="24" /></a></td>
							</tr>
							<tr>
								<td><a href="#">Fabián Ríos</a></td>
								<td><a href="mailto:contacto@micorreo">contacto@micorreo</a></td>
								<td>80022812</td>
								<td><span class="label gray">inactivo</span></td>
								<td><a href="#"><img src="images/view.png" alt="" width="24" height="24" /></a></td>
							</tr>
							<tr>
								<td><a href="#">Hugo Marin</a></td>
								<td><a href="mailto:Hola@micorreo">Hola@micorreo</a></td>
								<td>80774028</td>
								<td><span class="label red">activo</span></td>
								<td><a href="#"><img src="images/view.png" alt="" width="24" height="24" /></a></td>
							</tr>
							<tr>
								<td><a href="#">Fabián Ríos</a></td>
								<td><a href="mailto:contacto@micorreo">contacto@micorreo</a></td>
								<td>80022812</td>
								<td><span class="label gray">inactivo</span></td>
								<td><a href="#"><img src="images/view.png" alt="" width="24" height="24" /></a></td>
							</tr>
							<tr>
								<td><a href="#">Hugo Marin</a></td>
								<td><a href="mailto:Hola@micorreo">Hola@micorreo</a></td>
								<td>80774028</td>
								<td><span class="label red">activo</span></td>
								<td><a href="#"><img src="images/view.png" alt="" width="24" height="24" /></a></td>
							</tr>
							<tr>
								<td><a href="#">Fabián Ríos</a></td>
								<td><a href="mailto:contacto@micorreo">contacto@micorreo</a></td>
								<td>80022812</td>
								<td><span class="label gray">inactivo</span></td>
								<td><a href="#"><img src="images/view.png" alt="" width="24" height="24" /></a></td>
							</tr>
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
										  <li class="arrow unavailable"><a href="">&laquo;</a></li>
										  <li class="current"><a href="">1</a></li>
										  <li><a href="">2</a></li>
										  <li><a href="">3</a></li>
										  <li><a href="">4</a></li>
										  <li class="arrow"><a href="">&raquo;</a></li>
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
		

	<script src="javascripts/jquery.min.js"></script>
	<script src="javascripts/jquery-ui-1.8.18.custom.min.js"></script>
	<script src="javascripts/modernizr.foundation.js"></script>
	<script src="javascripts/foundation.js"></script>
	<script src="javascripts/app.js"></script>	

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


