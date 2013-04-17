<?php
$action = isset($_POST['action']) ? $_POST['action'] : $_GET[0];
switch ($action):
	//USUARIO NO REGISTRADO
	case 'login':
		$user 	= UserHelper::retrieveUsers("AND user_email = '".escape($_POST['user_email']). "' AND user_password = '" .md5($_POST['user_password']) . "'");
		if(count($user) > 0)
		{
			if ($user[0]->__get('user_id') != '')	//user_users user
			{
				$_SESSION['user_id']	= $user[0]->__get('user_id');
				$user[0]->__set('user_date_login', date('Y-m-d H:i:s'));
				$user[0]->update();
				redirectUrl(APPLICATION_URL.'registro-inicio-0400.html');
			}
		}
		else
		{
			$user 	= UserHelper::retrieveUsers("AND user_email = '".escape($_POST['user_email'])."'");
			if(count($user) > 0)
			{			
				if ($user[0]->__get('user_finalizado') == 0)
					redirectUrl(APPLICATION_URL."login/error.html");
				else
					redirectUrl(APPLICATION_URL."login/finalizado.html");
			}
			else
				redirectUrl(APPLICATION_URL."register/norecord.html");
		}
	break;
	//REGISTRO
	case 'create':
		$users	= UserHelper::retrieveUsers(" AND user_email = '" . escape($_POST['user_email']) . "'");
		if (count($users) == 0)
		{
			$user 	= (isset($_POST['user_id'])) ? new User($_POST['user_id']) : new User();
			foreach ($_POST as $key => $value)
				$user->__set($key, $value);
			$user->__set('user_password', md5($_POST['user_password']));
			$user->__set('user_creation_datetime', formatDate());			
			$user->__set('user_state', 'A');
			$insert	= $user->save();
			$_SESSION['user_id']	= $insert['insert_id'];
			redirectUrl(APPLICATION_URL.'registro-inicio-0400.html');
			$html 		= '<div style="background: #f5f5f5; padding-bottom: 30px;margin-top: 0; width: 600px; font-family: Arial;"><div style="background: #9c1a36; padding: 10px 50px;"><img src="http://i.imgur.com/pUNnGGF.png" alt="artBO" /></div><div style="margin-top: 30px; padding: 10px 50px;"><h1 style="margin-bottom:30px;">Le damos la Bienvenida al proceso de aplicación del Pabell&oacute;n Artec&aacute;mara en artBO 2013</h1><p style="margin-bottom:30px;">A partir de ahora, usted podr&aacute; adelantar su proceso de registro e inscripci&oacute;n.</p><p>artBO, Feria Internacional de Arte de Bogot&aacute;</p></div>'; 
			$subject	= utf8_decode('Registro exitoso');
			$from		= 'agendacultural@ccb.org.co';
			$to			= $user->__get('user_email');
			$fromName	= 'Artecámara | artBO';
			$replyTo	= 'agendacultural@ccb.org.co';
			$args 		= array('html'		=> $html,
								'from'		=> $from,
								'to'		=> $to,
								'subject'	=> $subject,
								'fromName'	=> $fromName,
								'replyTo'	=> $replyTo);	

			EmailHelper::sendMail($args);			
		}
		else
		{
			redirectUrl(APPLICATION_URL.'register/error/0.html');
		}
	break;
	//OLVIDO CONTRASEÑA
	case 'recover_password':
		$users	= UserHelper::retrieveUsers(" AND user_email = '" . escape($_POST['user_email']) . "'");
		if (count($users) > 0)
		{
			$password 	= substr(md5(date('YmdHis')), 0, 8);
			$user 		=& $users[0];
			$user->__set('user_verification', md5($password));
			$user->update();
			$html  	   .= '<div style="background: #f5f5f5; padding-bottom: 30px;margin-top: 0; width: 600px; font-family: Arial;"><div style="background: #9c1a36; padding: 10px 50px;"><img src="http://i.imgur.com/pUNnGGF.png" alt="artBO" /></div><div style="margin-top: 30px; padding: 10px 50px;"><h1 style="margin-bottom:30px;">Restablecer Clave</h1><p style="margin-bottom:30px;">Hemos recibido una petici&oacute;n para restablecer su clave. Para completar el proceso de restablecer su clave, haga clic en el siguiente link o c&oacute;pielo en su navegador:</p><a style="text-decoration: none; color: #3a6cdd;" href="http://activemgmd.com/ccb/ccb-artista/restablecer-contrasena/'.md5($password).'.html">http://activemgmd.com/ccb/ccb-artista/restablecer-contrasena/'.md5($password).'.html</a><br /><p>Si usted no ha solicitado este cambio, por favor haga caso omiso de este correo.</p><p>artBO, Feria Internacional de Arte de Bogot&aacute;</p></div>'; 
			$subject	= utf8_decode('Restablecer clave');
			$from		= 'agendacultural@ccb.org.co';
			$to			= $user->__get('user_email');
			$fromName	= 'Artecámara | artBO';
			$replyTo	= 'agendacultural@ccb.org.co';
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
	case 'changePasswordOC':
		$user 	=  new User($_SESSION['user_id']);	
		$user->__set('user_verification', '');
		$user->__set('user_password', md5($_POST['contrasena']));
		$user->update();
		redirectUrl(APPLICATION_URL."login-recuperar-contrasena-0140/exito.html");
	break;
	//INFO BASICA
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
	//	
	case 'gallerySelect':
		$user 		= new User($_SESSION['user_id']);
		$user->__set('user_gallery_type', $_GET[1]);
		$user->update();
		redirectUrl(APPLICATION_URL.'registro-galerias-0410.html');
	break;
	//PRIMERA PAGINA
	case 'first':
		$user 		= new User($_SESSION['user_id']);
		foreach ($_POST as $key => $value)
			$user->__set($key, $value);	
		$user->__set('user_phone', $_POST['phone_0'].'-'.$_POST['phone_1'].'-'.$_POST['phone_2']);
		$user->__set('user_mobile', $_POST['mobile_0'].'-'.$_POST['mobile_1'].'-'.$_POST['mobile_2']);				
		$userForms	= UserFormHelper::selectUserForms(" AND user_id = ".escape($_SESSION['user_id'])." AND form_number = 1");
		if ($userForms['num_rows'] == 0)
		{
			$accept		= true;
			$fields		= UserFieldHelper::retrieveUserFields();
			foreach ($fields as $field)
			{
				if (($user->__get($field->__get('field_name')) == '') || ($user->__get($field->__get('field_name')) == '0') || ($user->__get($field->__get('field_name')) == 'NULL'))
					$accept	= false;
			}
			if ($accept)
			{
				$userForms	= UserFormHelper::selectUserForms(" AND user_id = ".escape($_SESSION['user_id'])." AND form_number = 1");
				if ($userForms['num_rows'] == 0)
				{
					$form	= new UserForm();
					$form->__set('user_id', $_SESSION['user_id']);
					$form->__set('form_number', 1);
					$form->save();
				}
			}
		}		
		$user->update();
		if (!isset($_GET[1]))
			redirectUrl(APPLICATION_URL.'registro-hoja-vida-0420/saved.html');
		else
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
				$expo->__set('country_id', $_POST['expo_country_id_'.$string]);
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
				$expo->__set('country_id', $_POST['prize_country_id_'.$string]);
				$expo->__set('user_id', $_SESSION['user_id']);
				$expo->save();
				
			}
		}
		$userForms	= UserFormHelper::selectUserForms(" AND user_id = ".escape($_SESSION['user_id'])." AND form_number = 2");
		if ($userForms['num_rows'] == 0)
		{
			$form	= new UserForm();
			$form->__set('user_id', $_SESSION['user_id']);
			$form->__set('form_number', 2);
			$form->save();
		}		
		if (!isset($_GET[1]))
			redirectUrl(APPLICATION_URL.'registro-proyecto-0430/saved.html');
		else		
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
		$userForms	= UserFormHelper::selectUserForms(" AND user_id = ".escape($_SESSION['user_id'])." AND form_number = 3");
		if ($userForms['num_rows'] == 0)
		{
			$form	= new UserForm();
			$form->__set('user_id', $_SESSION['user_id']);
			$form->__set('form_number', 3);
			$form->save();
		}		
		if (!isset($_GET[1]))
			redirectUrl(APPLICATION_URL.'registro-portafolio-0440/saved.html');
		else		
			redirectUrl(APPLICATION_URL.'registro-proyecto-0430/saved.html');
	break;	
	case 'createPortfolio':
		$user		= new User($_SESSION['user_id']);
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
				$obra->__set('obra_key', $_POST['obra_key_'.$string]);
				
				if ($obra->__get('obra_id') != '')  
					$obra->update();				
				else
					$obra->save();

			}
		}
		$userForms	= UserFormHelper::selectUserForms(" AND user_id = ".escape($_SESSION['user_id'])." AND form_number = 4");
		if ($userForms['num_rows'] == 0)
		{
			$form	= new UserForm();
			$form->__set('user_id', $_SESSION['user_id']);
			$form->__set('form_number', 4);
			$form->save();
		}
		if (!isset($_GET[1]))
			redirectUrl(APPLICATION_URL.'registro-documentos-0450.html');
		else		
			redirectUrl(APPLICATION_URL.'registro-portafolio-0440/saved.html');		
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
		$userForms	= UserFormHelper::selectUserForms(" AND user_id = ".escape($_SESSION['user_id'])." AND form_number = 4");
		if ($userForms['num_rows'] == 0)
		{
			$form	= new UserForm();
			$form->__set('user_id', $_SESSION['user_id']);
			$form->__set('form_number', 4);
			$form->save();
		}		
		if (!isset($_GET[1]))
			redirectUrl(APPLICATION_URL.'registro-portafolio-0440/saved.html');
		else		
			redirectUrl(APPLICATION_URL.'registro-artistas-0440/saved.html');	
		
	break;
	case 'saveDocuments':
		$user 		= new User($_SESSION['user_id']);
		foreach ($_POST as $key => $value)
			$user->__set($key, $value);				
		$user->update();		
		redirectUrl(APPLICATION_URL.'registro-documentos-0450.html');		
	break;
	case 'uploadDocuments':
		$user 		= new User($_SESSION['user_id']);
		$finish = true;
		foreach ($_POST as $key => $value)
			$user->__set($key, $value);	
		if (($user->__get('user_document') == '') || ($user->__get('user_document_accept') == '') || ($user->__get('user_name_accept') == ''))
			$finish	= false;
		if ($finish)
		{
	
			$user->__set('user_finalizado', 1);
			$user->update();
			$dir		= 'resources/images/'. $user->__get('user_id'). '-' .  makeUrlClear(utf8_decode($user->__get('user_name'))).'/';
			
			//FIRST PAGE
			$country	= new Country($user->__get('country_id'));
			$phone		= explode("-", $user->__get('user_phone'));
			if (count($phone) < 3)
			{
				$phone[0]	= '';
				$phone[1]	= '';
				$phone[2]	= '';
			}
			$mobile		= explode("-", $user->__get('user_mobile'));
			if (count($mobile) < 3)
			{
				$mobile[0]	= '';
				$mobile[1]	= '';
				$mobile[2]	= '';
			}
			$html	= '<div style="background: #f5f5f5; padding-bottom: 30px;margin-top: 0; width: 600px; font-family: Arial;"><div style="background: #9c1a36; padding: 10px 50px;"><img src="http://i.imgur.com/pUNnGGF.png" alt="artBO" /></div><div style="margin-top: 30px; padding: 10px 50px;"><h1 style="margin-bottom:30px;">Ha finalizado su registro</h1><p style="margin-bottom:30px;">Usted ha completado el proceso de registro del Pabell&oacute;n Artec&aacute;mara en artBO 2013. <br />Agradecemos su participaci&oacute;n en la convocatoria.</p><p>artBO, Feria Internacional de Arte de Bogot&aacute;</p></div>';
			//FIRST
			$html	.= '<h3>Registro</h3><p>Nombre: <em>'.$user->__get('user_name').'</em><br />Apellido: <em>'.$user->__get('user_surname').'</em><br />Lugar de nacimiento: <em>'.$user->__get('user_born_city').'</em><br />Fecha de nacimiento: <em>'.$user->__get('user_birthday').'</em><br />Ciudad de residencia: <em>'.$user->__get('user_city').'</em><br />Pa&iacute;s de residencia: <em>'.$country->__get('country_name').'</em><br />Direcci&oacute;n de residencia <em>'.$user->__get('user_address').'</em><br />Tel&eacute;fono: '.$phone[0].' <em></em> '.$phone[1].' <em></em> '.$phone[2].'<em></em><br />M&oacute;vil: '.$mobile[0].' <em></em> '.$mobile[1].' <em></em> '.$mobile[2].' <em></em><br /></p>';
			//HOJA DE VIDA
			//---------------------------------
			$expositions	= ExpositionHelper::retrieveExpositions(" AND user_id = ". $user->__get('user_id') . " AND exposition_type = 1  ORDER by exposition_year");
			$expositions2	= ExpositionHelper::retrieveExpositions(" AND user_id = ". $user->__get('user_id') . " AND exposition_type = 2  ORDER by exposition_year");
			$expositions3	= ExpositionHelper::retrieveExpositions(" AND user_id = ". $user->__get('user_id') . " AND exposition_type = 3  ORDER by exposition_year");
			$prizes		= PrizeHelper::retrievePrizes(" AND user_id = ". $user->__get('user_id') . " ORDER by prize_year");
			//
			$html	.= "<h3>Hoja de vida</h3>";
			//ESTUDIOS
			$html	.= "<h4>Estudios realizados</h4>";
			foreach ($expositions3 as $exposition)
			{
				$country	= new Country($exposition->__get('country_id'));
				$html .= '<p>Nombre de la carrera: <em>'.$exposition->__get('exposition_name').'</em><br />Instituci&oacute;n: <em>'.$exposition->__get('exposition_institution').'</em><br />Ciudad: <em>'.$exposition->__get('exposition_city').'</em><br />Pa&iacute;s: <em>'.$country->__get('country_name').'</em><br />A&ntilde;o: <em>'.$exposition->__get('exposition_year').'</em><br /></p>';
			}
			//EXPOSICIONES
			$html	.= "<h4>Exposiciones individuales</h4>";
			//
			foreach ($expositions as $exposition)
			{
				$country	= new Country($exposition->__get('country_id'));
				$html .= '<p>Nombre de la exposici&oacute;n: <em>'.$exposition->__get('exposition_name').'</em><br />Instituci&oacute;n: <em>'.$exposition->__get('exposition_institution').'</em><br />Ciudad: <em>'.$exposition->__get('exposition_city').'</em><br />Pa&iacute;s: <em>'.$country->__get('country_name').'</em><br />A&ntilde;o: <em>'.$exposition->__get('exposition_year').'</em><br /></p>';
			}
			//EXPOSICIONES COLECTIVAS
			$html	.= "<h4>Exposiciones colectivas</h4>";
			//
			foreach ($expositions2 as $exposition)
			{
				$country	= new Country($exposition->__get('country_id'));
				$html .= '<p>Nombre de la exposici&oacute;n: <em>'.$exposition->__get('exposition_name').'</em><br />Instituci&oacute;n: <em>'.$exposition->__get('exposition_institution').'</em><br />Ciudad: <em>'.$exposition->__get('exposition_city').'</em><br />Pa&iacute;s: <em>'.$country->__get('country_name').'</em><br />A&ntilde;o: <em>'.$exposition->__get('exposition_year').'</em><br /></p>';
			}
			//PREMIOS
			$html	.= "<h4>Becas y premios</h4>";
			//
			foreach ($prizes as $prize)
			{
				$country	= new Country($prize->__get('country_id'));
				$html	.= '<p>  Nombre del premio: <em>'.$prize->__get('prize_name').'</em><br />Instituci&oacute;n: <em>'.$prize->__get('prize_institution').'</em><br />Ciudad: <em>'.$prize->__get('prize_city').'</em><br />Pa&iacute;s: <em>'.$country->__get('country_id').'</em><br />A&ntilde;o: <em>'.$prize->__get('prize_year').'</em><br /></p>';
			}
			//PROYECTO ARTECAMARA
			//-------------------------------
			$html	.= "<h3>Projecto Artec&aacute;mara</h3>";
			$html	.= '<p>Proyecto: <em>'.$user->__get('user_proyect_description').'</em><br />Nombre de la obra: <em>'.$user->__get('user_proyect_name').'</em><br />Dimensiones (mts): <em></em>'.$user->__get('user_proyect_dimensions').'<br />Formato o t&eacute;cnica: <em>'.$user->__get('user_proyect_format').'</em><br />A&ntilde;o: <em>'.$user->__get('user_proyect_year').'</em><br />Url de la obra: <em>'.$user->__get('user_proyect_url').'</em><br /></p>';
			$html	.= "<h3>Im&aacute;genes</h3>";
			$html	.= '<p>';
				$html	.= ($user->__get('user_proyect_image_1') != '') ? '<em>'.APPLICATION_FULL_URL.$dir.$user->__get('user_proyect_image_1').'</em><br />' : '';
				$html	.= ($user->__get('user_proyect_image_2') != '') ? '<em>'.APPLICATION_FULL_URL.$dir.$user->__get('user_proyect_image_2').'</em><br />' : '';
				$html	.= ($user->__get('user_proyect_image_3') != '') ? '<em>'.APPLICATION_FULL_URL.$dir.$user->__get('user_proyect_image_3').'</em><br />' : '';
			$html	.= '</p>';
			
			//PORTAFOLIO
			//-------------------------------
			$html	.= "<h3>Portafolio</h3>";
			//
			$obras	= ObraHelper::retrieveObras("AND user_id = '" . $user->__get('user_id') . "' ORDER by obra_id");
			//
			foreach ($obras as $obra)
			{
				if ($obra->__get('obra_name') != '')
				{
					$html	.= '<p>Imagen de la obra: <em>'.APPLICATION_FULL_URL.$dir.'portafolio/'.$obra->__get('obra_image').'</em><br />Nombre de la obra: <em>'.$obra->__get('obra_name').'</em><br />Dimensiones: <em>'.$obra->__get('obra_dimensions').'</em><br />Formato o t&eacute;cnica: <em>'.$obra->__get('obra_format').'</em><br />Url de la obra: <em>'.$obra->__get('obra_url').'</em><br />A&ntilde;o: <em>'.$obra->__get('obra_year').'</em><br /> </p>';
				}
			}
			//DOCUMENTOS
			//---------------------
			$image	=  APPLICATION_FULL_URL.$dir.$user->__get('user_document');
			$html	.= '<h3>Documentos</h3>';
			$html	.= '<p> Documento de identidad: <em>'.$image.'</em><br /></p>';
			
			$html		= utf8_decode($html); 
			$subject	= utf8_decode('Finalizado registro');
			$from		= 'agendacultural@ccb.org.co';
			$to			= $user->__get('user_email');
			$fromName	= 'Artecámara | artBO';
			$replyTo	= 'agendacultural@ccb.org.co';
			$args 		= array('html'		=> $html,
								'from'		=> $from,
								'to'		=> $to,
								'subject'	=> $subject,
								'fromName'	=> $fromName,
								'replyTo'	=> $replyTo);	
	
			EmailHelper::sendMail($args);	
			$args 		= array('html'		=> $html,
								'from'		=> $user->__get('user_email'),
								'to'		=> 'agendacultural@ccb.org.co',
								'subject'	=> $subject,
								'fromName'	=> $fromName,
								'replyTo'	=> $replyTo);	
	
			EmailHelper::sendMail($args);				
			
			redirectUrl(APPLICATION_URL.'finalizar.html');
			
		}
		{
		?>
			<script language="javascript">
                alert ('Debe subir el documento solicitado y completar los datos en la anterior página.');
                window.location.href="<?php echo APPLICATION_URL;?>registro-documentos-0450.html";
            </script>
        <?php
		}
	break;
			

	case 'changePassword':
		$user 	=  new User($_SESSION['user_id']);	
		$user->__set('user_password', md5($_POST['contrasena']));
		$user->update();
		redirectUrl(APPLICATION_URL."datos-artista-0300/exito.html");
	break;	
	
	case 'activate':
		$user 	= new User($_GET[1]);
		$state	= ($user->__get('user_state') == 'A') ? 'I' : 'A';
		$user->updateField('user_state', $state);
		redirectUrl(APPLICATION_URL . 'indice-artistas.panel.html');
	break;
		
endswitch;
?>