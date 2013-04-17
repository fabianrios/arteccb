<?php
$action 		= isset($_POST['action']) ? $_POST['action'] : $_GET[0];
switch ($action):
	case 'changeState':
		$user	= new User($_GET[1]);
		$state	=  ($user->__get('user_state') == 'A') ? 'I' : 'A';
		$user->__set('user_state', $state);
		$user->update();
		redirectUrl(APPLICATION_URL.'perfil-galeria.panel/'.$user->__get('user_id').'.html');		
	break;
	case 'startSession':
		$user					= new User($_GET[1]);	
		$_SESSION['user_id']	= $user->__get('user_id');
		redirectUrl(APPLICATION_URL.'registro-inicio-0400.html');		
	break;
endswitch;
	
?>