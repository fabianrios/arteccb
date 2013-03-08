<?php
$action = isset($_POST['action']) ? $_POST['action'] : $_GET[0];
switch ($action):
	case 'create':
		$users	= UserHelper::retrieveUsers(" AND user_email = '" . escape($_POST['user_email']) . "'");
		if (count($users) == 0)
		{
			$user 	= (isset($_POST['user_id'])) ? new User($_POST['user_id']) : new User();
			foreach ($_POST as $key => $value)
				$user->__set($key, $value);
			$user->__set('user_password', md5($_POST['user_password']));
			$user->__set('user_date_creation', formatDate());			
			$user->__set('user_state', 'A');
			$insert	= $user->save();
			$_SESSION['user_id']	= $insert['insert_id'];
			redirectUrl(APPLICATION_URL.'datos-artista-0300.html');
		}
		else
		{
			redirectUrl(APPLICATION_URL.'home/error/0.html');
		}
	break;
	case 'recover_password':
		$users	= UserHelper::retrieveUsers(" AND user_email = '" . escape($_POST['user_email']) . "'");
		if (count($users) == 1)
		{
			
			$password 	= substr(md5(date('YmdHis')), 0, 8);
			$user 		=& $users[0];
			$user->__set('user_verification', md5($password));
			$user->update();
			$html  	   .= '<div style="background: #f5f5f5; padding-bottom: 30px;margin-top: 0; width: 600px; font-family: Arial;"><div style="background: #9c1a36; padding: 10px 50px;"><img src="http://i.imgur.com/pUNnGGF.png" alt="artBO" /></div><div style="margin-top: 30px; padding: 10px 50px;"><h1 style="margin-bottom:30px;">Recordar Clave</h1><p style="margin-bottom:30px;">Hemos recibido una peticion para recordar su contrase&ntilde;a. Para completar el proceso de reestablecer contrase&ntilde;a visite la siguiente url:</p><a style="text-decoration: none; color: #3a6cdd;" href="http://activemgmd.com/ccb/ccb-artista/restablecer-contrasena/'.md5($password).'.html">http://activemgmd.com/ccb/ccb-artista/restablecer-contrasena/'.md5($password).'.html</a><br /><p>Si usted no ha solicitado este cambio porfavor ignore este correo.</p><p>Gracias,</p><span>Soporte </span>artBO</div></div>'; 
			$subject	= utf8_decode('Recuperar contraseña');
			$from		= 'info@artbo.co';
			$to			= $user->__get('user_email');
			$fromName	= 'CCB Artbo';
			$replyTo	= 'info@artbo.co';
			$args 		= array('html'		=> $html,
								'from'		=> $from,
								'to'		=> $to,
								'subject'	=> $subject,
								'fromName'	=> $fromName,
								'replyTo'	=> $replyTo);	

			EmailHelper::sendMail($args);

			redirectUrl(APPLICATION_URL.'login-recuperar-contrasena-0120/' . urlencode($user->__get('user_email')) . '.html');
		}
		else
		{
			redirectUrl(APPLICATION_URL.'login-recuperar-contrasena-0110/error.html');
		}
	break;
	case 'basic':
		$user 		= new User($_SESSION['user_id']);
		foreach ($_POST as $key => $value)
			$user->__set($key, $value);	
		if($_FILES["user_image"]["name"] != "")
		{
			$ext	= getFileExtension($_FILES["user_image"]['name']);
			$name 	= md5(date("YmdHis")) . $ext;
		
			if(uploadFile('resources/images/', $_FILES["user_image"]['tmp_name'], $name))
			{
				$accept = array('jpg', 'gif', 'png', 'jpeg');
				$medio 	= new Medio($name , $accept, 'resources/images/');  
				$user->__set('user_image', $name);						
			}				
		}	
		$user->update();
		redirectUrl(APPLICATION_URL.'registro-inicio-0400.html');
	break;
	case 'basic':
		$user 		= new User($_SESSION['user_id']);
		foreach ($_POST as $key => $value)
			$user->__set($key, $value);	
		if($_FILES["user_image"]["name"] != "")
		{
			$ext	= getFileExtension($_FILES["user_image"]['name']);
			$name 	= md5(date("YmdHis")) . $ext;
		
			if(uploadFile('resources/images/', $_FILES["user_image"]['tmp_name'], $name))
			{
				$accept = array('jpg', 'gif', 'png', 'jpeg');
				$medio 	= new Medio($name , $accept, 'resources/images/');  
				$user->__set('user_image', $name);						
			}				
		}	
		$user->update();
		redirectUrl(APPLICATION_URL.'registro-inicio-0400.html');
	break;
	case 'gallerySelect':
		$user 		= new User($_SESSION['user_id']);
		$user->__set('user_gallery_type', $_GET[1]);
		$user->update();
		redirectUrl(APPLICATION_URL.'registro-galerias-0410.html');
	break;
	case 'first':
		$user 		= new User($_SESSION['user_id']);
		foreach ($_POST as $key => $value)
			$user->__set($key, $value);	
		$user->__set('user_phone', $_POST['phone_0'].'-'.$_POST['phone_1'].'-'.$_POST['phone_2']);
		$user->__set('user_mobile', $_POST['mobile_0'].'-'.$_POST['mobile_1'].'-'.$_POST['mobile_2']);		
		if($_FILES["user_director_image"]["name"] != "")
		{
			$ext	= getFileExtension($_FILES["user_director_image"]['name']);
			$name 	= md5(date("YmdHis")) . $ext;
		
			if(uploadFile('resources/images/', $_FILES["user_director_image"]['tmp_name'], $name))
			{
				$accept = array('jpg', 'gif', 'png', 'jpeg');
				$medio 	= new Medio($name , $accept, 'resources/images/');  
				$user->__set('user_director_image', $name);						
			}				
		}	
		$user->update();
		redirectUrl(APPLICATION_URL.'registro-artista-0410/saved.html');
	break;
	case 'createExpo':
		$connection  = Connection::getInstance();
		$deleteSQL   = "DELETE FROM user_expositions WHERE user_id = " . $_SESSION['user_id'];
		$connection->query($deleteSQL);		
		foreach ($_POST as $key => $value)
		{
			if (strpos($key, 'expo_nombre_') !== false)
			{
				$string	= str_replace('expo_nombre_', '', $key);
				$expo	= new Exposition();
				$expo->__set('exposition_name', $value);
				$expo->__set('exposition_year', $_POST['expo_year_'.$string]);
				$expo->__set('exposition_institution', $_POST['expo_institucion_'.$string]);
				$expo->__set('exposition_city', $_POST['expo_city_'.$string]);
				$expo->__set('exposition_format', $_POST['expo_format_'.$string]);
				$expo->__set('exposition_type', $_POST['expo_type_'.$string]);
				$expo->__set('user_id', $_SESSION['user_id']);
				$expo->save();
			}
		}
		$connection  = Connection::getInstance();
		$deleteSQL   = "DELETE FROM user_prizes WHERE user_id = " . $_SESSION['user_id'];
		$connection->query($deleteSQL);		
		foreach ($_POST as $key => $value)
		{
			if (strpos($key, 'prize_name_') !== false)
			{
				$string	= str_replace('prize_name_', '', $key);
				$expo	= new Prize();
				$expo->__set('prize_name', $value);
				$expo->__set('prize_year', $_POST['prize_year_'.$string]);
				$expo->__set('prize_institution', $_POST['prize_institution_'.$string]);
				$expo->__set('prize_city', $_POST['prize_city_'.$string]);
				$expo->__set('user_id', $_SESSION['user_id']);
				$expo->save();
			}
		}
		redirectUrl(APPLICATION_URL.'registro-hoja-vida-0420/saved.html');
	break;
	case 'createProyects':
		//$connection  = Connection::getInstance();
		//$connection->query($deleteSQL);		
		$user		= new User($_SESSION['user_id']);
		foreach ($_POST as $key => $value)
			$user->__set($key, $value);	
		for($i = 1; $i <= 3; $i++)
		{
			if($_FILES["user_proyect_image_" . $i]["name"] != "")
			{
				if(!file_exists('resources/images/' . makeUrlClear(utf8_decode($user->__get('user_name')))))
				{
					mkdir('resources/images/' . makeUrlClear(utf8_decode($user->__get('user_name'))), 0755);
				}

				if(!file_exists('resources/images/' . makeUrlClear(utf8_decode($user->__get('user_name'))) . '/proyecto'))
				{
					mkdir('resources/images/' . makeUrlClear(utf8_decode($user->__get('user_name'))) . '/proyecto', 0755);
				}

				$ext	= getFileExtension($_FILES["user_proyect_image_" . $i]["name"]);
				$name 	= md5(date("YmdHis")). $i . $ext;
			
				if(uploadFile('resources/images/' . makeUrlClear(utf8_decode($user->__get('user_name'))) . '/proyecto/', $_FILES["user_proyect_image_" . $i]['tmp_name'], $name))
				{
					$user->__set('user_proyect_image_' . $i, $name);						
				}				
			}	
		}

		
		$user->update();
		foreach ($_POST as $key => $value)
		{
			if (strpos($key, 'obra_name_') !== false)
			{
				//$deleteSQL   = "DELETE FROM user_obras WHERE user_id = " . $_SESSION['user_id'];

				$string	= str_replace('obra_name_', '', $key);
				$obra	= (isset($_POST['obra_id_'.$string])) ? new Obra($_POST['obra_id_'.$string]) : new Obra();
				if($obra->__get('obra_id') == '')
				{
					$obraArray = ObraHelper::retrieveObras("AND obra_key = '" . $_POST['obra_key_'.$string] . "'");
					if(count($obraArray) > 0)
						$obra = $obraArray[0];
				}
				$obra->__set('obra_name', $value);
				$obra->__set('obra_dimensions', $_POST['obra_dimensions_'.$string]);
				$obra->__set('obra_materials', $_POST['obra_materials_'.$string]);
				$obra->__set('obra_format', $_POST['obra_format_'.$string]);
				$obra->__set('obra_year', $_POST['obra_year_'.$string]);
				$obra->__set('obra_url', $_POST['obra_url_'.$string]);
				$obra->__set('user_id', $_SESSION['user_id']);
				if($_FILES['obra_image_'.$string]["name"] != "")
				{

					if(!file_exists('resources/images/' . makeUrlClear(utf8_decode($user->__get('user_name')))))
					{
						mkdir('resources/images/' . makeUrlClear(utf8_decode($user->__get('user_name'))), 0755);
					}

					if(!file_exists('resources/images/' . makeUrlClear(utf8_decode($user->__get('user_name'))) . '/obras'))
					{
						mkdir('resources/images/' . makeUrlClear(utf8_decode($user->__get('user_name'))) . '/obras', 0755);
					}

					$ext	= getFileExtension($_FILES['obra_image_'.$string]['name']);
					$name 	= md5(date("YmdHis")). $string . $ext;
				
					if(uploadFile('resources/images/' . makeUrlClear(utf8_decode($user->__get('user_name'))) . '/obras/', $_FILES['obra_image_'.$string]['tmp_name'], $name))
					{
						//$accept = array('jpg', 'gif', 'png', 'jpeg');
						//$medio 	= new Medio($name , $accept, 'resources/images/');  
						$obra->__set('obra_image', $name);						
					}				
				}
				if ($obra->__get('obra_id') != '')  
					$obra->update();				
				else
					$obra->save();

			}
		}
		if(isset($obra))
			redirectUrl(APPLICATION_URL.'registro-portafolio-0440/saved.html');
		else
			redirectUrl(APPLICATION_URL.'registro-proyecto-0430/saved.html');
	break;	
	case 'createArtist':
		$connection  = Connection::getInstance();
		$deleteSQL   = "DELETE FROM user_artists WHERE user_id = " . $_SESSION['user_id'];
		$connection->query($deleteSQL);		
		foreach ($_POST as $key => $value)
		{
			if (strpos($key, 'artist_name_') !== false)
			{
				$string	= str_replace('artist_name_', '', $key);
				$artist	= new Artist();
				$artist->__set('artist_name', $value);
				$artist->__set('artist_surname', $_POST['artist_surname_'.$string]);
				$artist->__set('artist_nationality', $_POST['artist_nationality_'.$string]);
				if (isset($_POST['artist_artbo_'.$string]))
					$artist->__set('artist_artbo', 1);				
				$artist->__set('user_id', $_SESSION['user_id']);
				$artist->save();
			}
		}
		redirectUrl(APPLICATION_URL.'registro-artistas-0440/saved.html');
	break;
	case 'selectStand':
		$user 		= new User($_SESSION['user_id']);
		foreach ($_POST as $key => $value)
			$user->__set($key, $value);	
		$user->update();
		redirectUrl(APPLICATION_URL.'registro-espacio-0450/saved.html');
	break;
	case 'uploadDocuments':
		$user 		= new User($_SESSION['user_id']);
		foreach ($_POST as $key => $value)
			$user->__set($key, $value);				
		if($_FILES["user_document"]["name"] != "")
		{

			if(!file_exists('resources/images/' . makeUrlClear(utf8_decode($user->__get('user_name')))))
			{
				mkdir('resources/images/' . makeUrlClear(utf8_decode($user->__get('user_name'))), 0755);
			}

			$ext	= getFileExtension($_FILES["user_document"]['name']);
			$name 	= md5(date("YmdHis")) . $ext;
		
			if(uploadFile('resources/images/' . makeUrlClear(utf8_decode($user->__get('user_name'))) . '/', $_FILES["user_document"]['tmp_name'], $name))
			{
				$user->__set('user_document', $name);						
			}				
		}	
		$user->update();
		redirectUrl(APPLICATION_URL.'registro-documentos-0440/saved.html');
	break;
	case 'update':
		$user 	=  new User($_POST['user_id']);
		foreach ($_POST as $key => $value)
			$user->__set($key, $value);
		$user->__set('user_password', md5($_POST['user_password']));
		$user->__set('user_datetime_update', formatDate());
		$user->__set('user_validation', '');
		//Logo
		if( (isset($_FILES["user_avatar"]["name"])) && ($_FILES["user_avatar"]["name"] != ""))
		{
			$ext = getFileExtension($_FILES["user_avatar"]['name']);
			$name = md5(date("YmdHis")) . $ext;
		
			if(uploadFile('resources/images/', $_FILES["user_avatar"]['tmp_name'], $name))
			{
				$accept = array('jpg', 'gif', 'png', 'jpeg');
				$medio = new Medio($name , $accept, 'resources/images/');  
				$user->__set('user_image', $name);						
			}				
		}	
		if ($_POST['user_id'] == $_SESSION['user_id'])
			$user->update();
			
		//Genero el log de creacion de universidad
		$nameUsers	= $user->__get('user_names').' '.$user->__get('user_surnames');
		$controlUser = new ControlUser($_SESSION['control_user_id']);
		$msgLog		= '['.date("d/m/Y H:i:s").']: '.$controlUser->__get('user_full_name').'<br />Se actualizo el usuario: '.$nameUsers;
		$newLog		= new CoreLog();
		$newLog->__set('object_id',$_POST['user_id']);
		$newLog->__set('log_action_name',$nameUsers);
		$newLog->__set('log_content',$msgLog);
		$newLog->__set('log_date',date('Y-m-d H:i:s'));
		$newLog->save();
		
		redirectUrl(APPLICATION_URL.'user_thanks.html');
	break;
	case 'add':
		$user 			= (isset($_POST['user_id'])) ? new User($_POST['user_id']) : new User();
		foreach ($_POST as $key => $value)
			$user->__set($key, $value);
		$user->__set('user_creation_datetime', formatDate());			
		$user->__set('user_datetime_update', formatDate());
		$user->__set('user_state', 'A');
		//Logo
		if($_FILES["user_avatar"]["name"] != "")
		{
			$ext = getFileExtension($_FILES["user_avatar"]['name']);
			$name = md5(date("YmdHis")) . $ext;
		
			if(uploadFile('resources/images/', $_FILES["user_avatar"]['tmp_name'], $name))
			{
				$accept = array('jpg', 'gif', 'png', 'jpeg');
				$medio = new Medio($name , $accept, 'resources/images/');  
				$user->__set('user_image', $name);						
			}				
		}	
		if (!isset($_POST['user_id']))
		{
			$validate	=	md5(date("YmdHis"));
			$user->__set('user_validation', $validate); 
			$user2		= new User($_SESSION['user_id']);	//SESSION USER
			$type		= ($user->__get('company_id') != 0) ? 'C' : 'G';
			$html		= MailHelper::invitationMail($type, $user->__get('user_names'), APPLICATION_FULL_URL.'user_invite/'.$validate.'.html', $user2->__get('user_names'));
			$args = array('to'	=> $user->__get('user_email'),
						'from'    	=> 'contactenos@creatic.org.co',
						'html'     	=> $html,
						'subject'  	=> 'Bienvenido a CreaTiC',
						'fromName' 	=> 'CreaTiC',
						'replyTo'  	=> 'contactenos@creatic.org.co');	
			EmailHelper::sendMail($args);
		}
		$action	= 'creado';
		$controlUser = new ControlUser($_SESSION['control_user_id']);
		if (isset($_POST['user_id']))
		{
			$user->update();
			$nameUsers	= $user->__get('user_names').' '.$user->__get('user_surnames');
			$msgLog		= '['.date("d/m/Y H:i:s").']: '.$controlUser->__get('user_full_name').'<br />Usuario modificado: '.$nameUsers;
			$action	= 'modificado';
		}
		else 
		{
			$save = $user->save();		
			$nameUsers	=  $_POST['user_names'].' '.$_POST['user_surnames'];
			$msgLog		= '['.date("d/m/Y H:i:s").']: '.$controlUser->__get('user_full_name').'<br />Usuario Creado: '.$nameUsers;
		}
		$_POST['user_id'] = isset($_POST['user_id']) ? $_POST['user_id'] : $save['insert_id'];
		//Genero el log de creacion de universidad
		$newLog		= new CoreLog();
		$newLog->__set('object_id',$_POST['user_id']);
		$newLog->__set('log_action_name',$nameUsers);
		$newLog->__set('log_content',$msgLog);
		$newLog->__set('log_date',date('Y-m-d H:i:s'));
		$newLog->save();
		
		if (isset($_POST['company_id'])) 
			redirectUrl(APPLICATION_URL.'user_list_b2/'.$action.'.html');
		else
			redirectUrl(APPLICATION_URL.'user_list_c2/'.$action.'.html');
	break;
	case 'deactivate':
		$deactivate		= true;
		$userPrimary 	= new User($_SESSION['user_id']);
		if ($userPrimary->__get('user_primary') == 0)
			$deactivate	= false;
		$user 	= new User($_GET[1]);
		if ($userPrimary->__get('group_id') != $user->__get('group_id'))
			$deactivate	= false;
		if ($userPrimary->__get('company_id') != $user->__get('company_id'))
			$deactivate	= false;
		$user->__set('user_state', 'D');
		$user->__set('user_datetime_update', formatDate());
		if ($deactivate)
			$save = $user->update();
		$action		= 'eliminado';
		
		//Genero el log de creacion de universidad
		$nameUsers	= $userPrimary->__get('user_names').' '.$userPrimary->__get('user_surnames');
		$controlUser = new ControlUser($_SESSION['control_user_id']);
		$msgLog		= '['.date("d/m/Y H:i:s").']: '.$controlUser->__get('user_full_name').'<br />Usuario eliminado : '.$nameUsers;
		$newLog		= new CoreLog();
		$newLog->__set('object_id',escape($_GET[0]));
		$newLog->__set('log_action_name',$userPrimary->__get('user_id'));
		$newLog->__set('log_content',$msgLog);
		$newLog->__set('log_date',date('Y-m-d H:i:s'));
		$newLog->save();
		
		if ($userPrimary->__get('company_id') != 0) 
			redirectUrl(APPLICATION_URL.'user_list_b2/'.$action.'.html');
		else
			redirectUrl(APPLICATION_URL.'user_list_c2/'.$action.'.html');	
	break;	
	case 'updateProfile':
		$user 	=  new User($_POST['user_id']);
		foreach ($_POST as $key => $value)
			$user->__set($key, $value);
		$user->__set('user_datetime_update', formatDate());
		//Logo
		if( (isset($_FILES["user_avatar"]["name"])) && ($_FILES["user_avatar"]["name"] != ""))
		{
			$ext = getFileExtension($_FILES["user_avatar"]['name']);
			$name = md5(date("YmdHis")) . $ext;
		
			if(uploadFile('resources/images/', $_FILES["user_avatar"]['tmp_name'], $name))
			{
				$accept = array('jpg', 'gif', 'png', 'jpeg');
				$medio = new Medio($name , $accept, 'resources/images/');  
				$user->__set('user_image', $name);						
			}				
		}	
		if ($_POST['user_id'] == $_SESSION['user_id'])
			$user->update();
		//Genero el log
		$nameUsers	= $user->__get('user_names').' '.$user->__get('user_surnames');
		$controlUser = new ControlUser($_SESSION['control_user_id']);
		$msgLog		= '['.date("d/m/Y H:i:s").']: '.$controlUser->__get('user_full_name').'<br />Usuario actualizo su perfil : '.$nameUsers;
		$newLog		= new CoreLog();
		$newLog->__set('object_id',escape($_GET[0]));
		$newLog->__set('log_action_name',$user->__get('user_id'));
		$newLog->__set('log_content',$msgLog);
		$newLog->__set('log_date',date('Y-m-d H:i:s'));
		$newLog->save();
		redirectUrl(APPLICATION_URL.'user_profile_update/modificado.html');
	break;	
	case 'updatePassword':
		$user 	=  new User($_POST['user_id']);
		$change	= ($user->__get('user_password') == md5($_POST['old_password'])) ? true : false;
		if ($change)
		{

			$user->__set('user_password', md5($_POST['user_password']));	
			$user->__set('user_datetime_update', formatDate());
			if ($_POST['user_id'] == $_SESSION['user_id'])
				$user->update();
			//Genero el log
			$nameUsers	= $user->__get('user_names').' '.$user->__get('user_surnames');
			$controlUser = new ControlUser($_SESSION['control_user_id']);
			$msgLog		= '['.date("d/m/Y H:i:s").']: '.$controlUser->__get('user_full_name').'<br />Usuario cambio contraseña : '.$nameUsers;
			$newLog		= new CoreLog();
			$newLog->__set('object_id',escape($_GET[0]));
			$newLog->__set('log_action_name',$user->__get('user_id'));
			$newLog->__set('log_content',$msgLog);
			$newLog->__set('log_date',date('Y-m-d H:i:s'));
			$newLog->save();
		}
		redirectUrl(APPLICATION_URL.'user_profile_update/modificado.html');
	break;		
	case 'login':
		$user 	= UserHelper::retrieveUsers("AND user_email = '".escape($_POST['user_email']). "' AND user_password = '" .md5($_POST['user_password']) . "'");
		if(count($user) > 0)
		{
			if ($user[0]->__get('user_id') != '')	//user_users user
			{
				$_SESSION['user_id']	= $user[0]->__get('user_id');
				redirectUrl(APPLICATION_URL.'registro-inicio-0400.html');
			}
		}
		else
			redirectUrl(APPLICATION_URL."home/error/1.html");
		
	break;	
	
	case 'RememberPassword':
		$userExist	= UserHelper::retrieveUsers(' AND user_email = "'.trim($_POST['user_email']).'"');
		if(count($userExist)>0)
		{
			$newPassword = base64_encode(strftime('%d%H%S'));
			$changeUser = new user($userExist[0]->__get('user_id'));
			$changeUser->__set('user_password',md5($newPassword));
			$changeUser->update();
			//Envio notificacion al usuario
			$name 			= $changeUser->__get('user_names').' '.$changeUser->__get('user_surnames');
			$email 			= $changeUser->__get('user_email');
			/* DESTINATARIO */
			$asunto 	= 'Recuperar clave CreaTiC';
			$mensaje 	= "Coordial saludo: $name <br />Su nueva clave es: ".$newPassword . "<br>Equipo CreaTiC";
			$headers 	=  "Content-Type: text/html; charset=ISO-8859-1\r\n";
			mail($email, $asunto, $mensaje, $headers);
			
			//Genero el log
			$nameUsers	= $changeUser->__get('user_names').' '.$changeUser->__get('user_surnames');
			$controlUser = new ControlUser($_SESSION['control_user_id']);
			$msgLog		= '['.date("d/m/Y H:i:s").']: '.$controlUser->__get('user_full_name').'<br />Recuperar contraseña : '.$nameUsers;
			$newLog		= new CoreLog();
			$newLog->__set('object_id',escape($_GET[0]));
			$newLog->__set('log_action_name',$changeUser->__get('user_id'));
			$newLog->__set('log_content',$msgLog);
			$newLog->__set('log_date',date('Y-m-d H:i:s'));
			$newLog->save();
			
			redirectUrl(APPLICATION_URL.'user_remember/Send/'.urlencode($email).'.html');
		}
		else
		{
			redirectUrl(APPLICATION_URL.'user_remember/Error.html');
		}
	break;
	
	case 'RegisterUser':
		//verifico la existencia de un usuario facebook
		if(strlen(trim($_POST['facebook_id'])) > 1)
			$exisUser	= UserHelper::retrieveUsers(' AND facebook_id = "'.trim($_POST['facebook_id']).'"');
		else	
			$exisUser	= UserHelper::retrieveUsers(' AND user_names LIKE "%'.trim($_POST['user_names']).'%" AND user_surnames LIKE "%'.trim($_POST['user_surnames']).'%"');
		
		//verifico si guardo o actualizo
		$validSave	= (count($exisUser)>0) ? true : false; 
		$newUser	= (count($exisUser)>0) ? $exisUser[0] : new User();	
		
		//Guardo la información
		foreach($_POST as $key => $value)
			$newUser->__set($key,$value);
		
		if(count($exisUser)>0)	//Actualiza
		{
			$newUser->__set('user_datetime_update',date('Y-m-d H:i:s'));
			$newUser->update();
			redirectUrl(APPLICATION_URL.'registro_finalizado.html');
		}
		else //Guarda
		{
			$validateCode	= md5(date('Y-m-d H:i:s'));
			$newUser->__set('user_date_creation',date('Y-m-d H:i:s'));
			$newUser->__set('user_verification_code',$validateCode);	
			$newUser->__set('user_state','I');	
			$newUser->save();
			$html = 'Para confirmar su registro en GZGG haz clic <a href="'.APPLICATION_FULL_URL.'validacion_registro/'.urlencode($validateCode).'.html">aqu&iacute;</a>';
			$headers = "MIME-Version: 1.0\r\n"; 
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";				
			$headers .= "From: GZGG <GZGG@GZGG.com>\r\n";
			mail($_POST['user_email'],'Activar cuenta GZGG',$html,$headers);
			redirectUrl(APPLICATION_URL.'finalizando_registro.html');
		}
	break;
	
	case 'updateUser':
		$updateUser = new User($_POST['user_id']);
		$redirect = true;
		foreach($_POST as $key => $value)
			$updateUser->__set($key,$value);
		$updateUser->__set('user_datetime_update',date('Y-m-d H:i:s'));	
		//verifico si solicito cambio de contraseña
		$updateUser->update();
		if(isset($_POST['user_password1']) && $_POST['user_password1'] != '')
		{
			if(isset($_POST['user_password1']) && $_POST['user_password1'] != '')
			{
				if($updateUser->__get('user_password') == "")
				{
					if($_POST['user_passwordNew'] != $_POST['user_passwordRetype'])
					{
						redirectUrl(APPLICATION_URL.'actualizar/Error.html');
						$redirect = false;
					}
					else
					{
						$updateUser->__set('user_password',md5($_POST['user_passwordNew']));
						$updateUser->update();
					}
				}
			}
		}
		if($redirect)
			redirectUrl(APPLICATION_URL.'actualizar/Update.html');
	break;
	case 'deleteA':
		$user 		= new User($_GET[1]);
		$user->__set('user_state', 'D');	
		$user->update();
		redirectUrl(APPLICATION_URL.'index.php?home.control');
	break;	
	case 'changePasswordOC':
		$user 	=  new User($_SESSION['user_id']);	
		$user->__set('user_verification', '');
		$user->__set('user_password', md5($_POST['contrasena']));
		$user->update();
		redirectUrl(APPLICATION_URL."login-recuperar-contrasena-0140/exito.html");
	break;		
endswitch;
?>