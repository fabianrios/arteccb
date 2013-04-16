<?php
$action = isset($_POST['action']) ? $_POST['action'] : $_GET[0];

switch ($action):
	case 'login':
		$user 	= UserPHelper::retrieveUsers("AND user_email = '".escape($_POST['user_email']). "' AND user_password = '" .md5($_POST['user_password']) . "'");
		if(count($user) > 0)
		{
			$_SESSION['panel_id']	= $user[0]->__get('user_id');
			redirectUrl(APPLICATION_URL.'indice-artistas.panel.html');
		}
		else
		{
			redirectUrl(APPLICATION_URL."login.panel/error.html");
		}
	break;
	case 'recover_password':
		$users	= UserPHelper::retrieveUsers(" AND user_email = '" . escape($_POST['user_email']) . "'");
		if (count($users) == 1)
		{
			
			$password 	= substr(md5(date('YmdHis')), 0, 8);
			$user 		=& $users[0];
			$user->__set('user_verification', md5($password));
			$user->update();
			$html  	   .= '<div style="background: #f5f5f5; padding-bottom: 30px;margin-top: 0; width: 600px; font-family: Arial;"><div style="background: #9c1a36; padding: 10px 50px;"><img src="http://i.imgur.com/pUNnGGF.png" alt="artBO" /></div><div style="margin-top: 30px; padding: 10px 50px;"><h1 style="margin-bottom:30px;">Restablecer Clave</h1><p style="margin-bottom:30px;">Hemos recibido una petici&oacute;n para restablecer su clave. Para completar el proceso de restablecer su clave visite la siguiente url:</p><a style="text-decoration: none; color: #3a6cdd;" href="http://activemgmd.com/ccb/ccb-artistas/restablecer-03.panel/'.md5($password).'.html">http://activemgmd.com/ccb/ccb-artistas/restablecer-03.panel/'.md5($password).'.html</a><br /><p>Si usted no ha solicitado este cambio por favor ignore este correo.</p><p>artBO, Feria Internacional de Arte de Bogot&aacute;</p></div>'; 
			$subject	= utf8_decode('Recuperar clave');
			$from		= 'artbo@ccb.org.co';
			$to			= $user->__get('user_email');
			$fromName	= 'artBO';
			$replyTo	= 'artbo@ccb.org.co';
			$args 		= array('html'		=> $html,
								'from'		=> $from,
								'to'		=> $to,
								'subject'	=> $subject,
								'fromName'	=> $fromName,
								'replyTo'	=> $replyTo);	

			EmailHelper::sendMail($args);

			redirectUrl(APPLICATION_URL.'recuperar-02.panel/' . urlencode($user->__get('user_email')) . '.html');
		}
		else
		{
			redirectUrl(APPLICATION_URL.'recuperar-01.panel/error.html');
		}
	break;
	
		
		
	case 'changePassword':
		$user 	=  new User($_SESSION['user_id']);	
		$user->__set('user_password', md5($_POST['contrasena']));
		$user->update();
		redirectUrl(APPLICATION_URL."datos-artista-0300/exito.html");
	break;
	case 'changePasswordOC':
		$user 	=  new UserP($_SESSION['panel_id']);	
		$user->__set('user_verification', '');
		$user->__set('user_password', md5($_POST['user_password']));
		$user->update();
		redirectUrl(APPLICATION_URL."recuperar-04.panel.html");
	break;	
	
endswitch;
?>