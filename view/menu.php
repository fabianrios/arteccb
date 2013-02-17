<?php
  $day   = 30;     // Day of the countdown
  $month = 06;      // Month of the countdown
  $year  = 2013;   // Year of the countdown
  $hour  = 23;     // Hour of the day (east coast time)

  $calculation = ((mktime ($hour,0,0,$month,$day,$year) - time(void))/3600);
  $hours = (int)$calculation;
  $days  = (int)($hours/24);
?>
<!-- vencimiento -->
<div class="row">
	<div class="twelve columns ">
		<div class="right">
			El registro de <span class="redtxt">Pabellón Artecámara</span> vence en <span class="red label radius"><?php echo $days;?></span> <strong>días</strong>
		</div>
	</div>
</div>
<!--END  vencimiento -->
<!-- 2. Navigation -->

<div class="row"><!-- Row -->	
	<ul class="nav-bar">
		<li id="0">
			<a href="<?php echo APPLICATION_URL?>registro-inicio-0400.html" class="main" title="Inicio">INSTRUCCIONES</a>
		</li>
		<li id="1" >
			<span class="spriteArrow"></span>
			<a href="<?php echo APPLICATION_URL?>registro-artista-0410.html" class="main" title="Artista"><span class="number-menu">1</span>Registro</a>
	    </li>
	    <li id="2">
	    	<span class="spriteArrow"></span>
			<a href="<?php echo APPLICATION_URL?>registro-exposiciones-0420.html" class="main" title="Exposiciones"><span class="number-menu">2</span>Hoja de Vida</a>
	    </li>
	    <li id="3">
	    	<span class="spriteArrow"></span>
			<a href="<?php echo APPLICATION_URL?>registro-proyecto-0430.html" class="main" title="Proyecto"><span class="number-menu">3</span>Proyecto Artecámara</a>
	    </li>
	    <li id="4">
	    	<span class="spriteArrow"></span>
			<a href="<?php echo APPLICATION_URL?>registro-portafolio.html" class="main" title="Documentos"><span class="number-menu">4</span>Portafolio</a>
	    </li>
	    <li id="5">
	    	<span class="spriteArrow"></span>
			<a href="<?php echo APPLICATION_URL?>registro-documentos-0440.html" class="main" title="Documentos"><span class="number-menu">5</span>Documentos</a>
	    </li>
	</ul>
</div><!-- End Row -->
<!-- 2. End Navigation -->

