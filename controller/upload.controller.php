<?php

//
// To see the PHP example in action, please do the following steps.
//
// 1. Open test/js/uploader-demo-jquery.js file and change the request.endpoint
// parameter to point to this file.
//
//  ...
//  request: {
//    endpoint: "../server/php/example.php"
//  }
//  ...
//
// 2. As a next step, make uploads and chunks folders writable.
//
// 3. Open test/jquery.html to see if everything is working correctly,
// the uploaded files should be going into uploads folder.
//
// 4. If the upload failed for any reason, please open the JavaScript console,
// if this does not help please read the excellent documentation we have for you.
//
// https://github.com/valums/file-uploader/blob/master/readme.md
//

// Include the uploader class
require_once('model/qqFileUploader.model.php');
$user			= new User($_GET[0]);
$extraFolder 	= isset($_GET[2]) ? '/' . $_GET[2] : '';
$uploader 		= new qqFileUploader();
if(!file_exists('resources/images/'. $user->__get('user_id'). '-' . makeUrlClear(utf8_decode($user->__get('user_name'))) . $extraFolder))
{
	mkdir('resources/images/'. $user->__get('user_id'). '-' .  makeUrlClear(utf8_decode($user->__get('user_name'))) . $extraFolder, 0755);
}

$dir	= 'resources/images/'. $user->__get('user_id'). '-' .  makeUrlClear(utf8_decode($user->__get('user_name'))) . $extraFolder;
// Specify the list of valid extensions, ex. array("jpeg", "xml", "bmp")
$uploader->allowedExtensions = array();

// Specify max file size in bytes.
$uploader->sizeLimit = 10 * 1024 * 1024;

// Specify the input name set in the javascript.
$uploader->inputName = 'qqfile';

// If you want to use resume feature for uploader, specify the folder to save parts.
$uploader->chunksFolder = 'chunks';

// Call handleUpload() with the name of the folder, relative to PHP's getcwd()
$result = $uploader->handleUpload($dir);

// To save the upload with a specified name, set the second parameter.
// $result = $uploader->handleUpload('uploads/', md5(mt_rand()).'_'.$uploader->getName());

// To return a name used for uploaded file you can use the following line.
$result['uploadName'] = $uploader->getUploadName();
$ext				  = explode('.', $result['uploadName']);
rename($dir.'/'.$result['uploadName'], $dir.'/'.$_GET[1].'.'.$ext[count($ext) - 1]);
$result['uploadName']	= $_GET[1].'.'.$ext[count($ext) - 1];

$user->__set($_GET[1], $result['uploadName']);
$user->update();

header("Content-Type: text/plain");
echo json_encode($result);