<?php
  $day   = 30;     // Day of the countdown
  $month = 06;      // Month of the countdown
  $year  = 2012;   // Year of the countdown
  $hour  = 23;     // Hour of the day (east coast time)

  $calculation = ((mktime ($hour,0,0,$month,$day,$year) - time(void))/3600);
  $hours = (int)$calculation;
  $days  = (int)($hours/24);
?>
<!-- 2. Navigation -->
<div class="row"><!-- Row -->	
			
			<!-- vencimiento -->
			<div class="row">
				<div class="six columns">
					<span> Tu registro en <strong> Pabellón Artecámara</strong> </span>
				</div>
				<div class="five columns offset-by-one text-right">
					el registro de <strong>Pabellón Artecámara </strong> vence en <span class="red label round"><?php echo $days;?> días</span>
				</div>
			</div>
			<hr />
			<!--END  vencimiento -->
	
			<ul class="nav-bar">
				<li id="0">
					<a href="<?php echo APPLICATION_URL?>registro-inicio-0400.html" class="main" title="Inicio"><img src="<?php echo APPLICATION_URL?>images/resources/casa.png" alt="home" > </a>
				</li>
				<li id="1" >
					<a href="<?php echo APPLICATION_URL?>registro-artista-0410.html" class="main" title="Artista"><span class="number-menu">1</span>Artista </a>
			    </li>
			    <li id="2">
					<a href="<?php echo APPLICATION_URL?>registro-exposiciones-0420.html" class="main" title="Exposiciones"><span class="number-menu">2</span>Exposiciones</a>
			    </li>
			    <li id="3">
					<a href="<?php echo APPLICATION_URL?>registro-proyecto-0430.html" class="main" title="Proyecto"><span class="number-menu">3</span>Proyecto</a>
			    </li>
			    <li id="4">
					<a href="<?php echo APPLICATION_URL?>registro-documentos-0440.html" class="main" title="Documentos"><span class="number-menu">4</span>Documentos</a>
			    </li>
			   
			</ul>
	
	
</div><!-- End Row -->
<!-- 2. End Navigation -->

