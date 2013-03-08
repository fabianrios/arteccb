<div class="encabezado">
		<!-- header artbo logo -->
	<div class="row superior-2">	
		<!-- columns 1/2 -->
		<div class="four columns"> 
				<img class="logo" src="<?php echo APPLICATION_URL?>images/sprite_new.png" height="76" width="436" alt="logo" />
		</div>
		<!-- END columns 1/2 -->
		
		<!-- columns 2/2 --><em></em>
		<div class="eight columns lateralder ">
			<div class="perfil-data">
				<div class="perfil right">
					<?php 
					if (isset($user))
					{
					?>
					<p class="left"><strong><?php echo $user->__get('user_name');?></strong><br />
					<a href="<?php echo APPLICATION_URL?>datos-artista-0300.html" title="Clic aquí para editar información del artista">Editar Perfil</a> | <a href="<?php echo APPLICATION_URL?>exit.html" title="Salir">Salir</a> </p>
					<?php
					}
					?>
                </div>
			</div>
		</div>
		<!-- END columns 2/2 -->
	</div>
		<!-- END header artbo logo -->
</div>	