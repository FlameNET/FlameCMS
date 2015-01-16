<?php
/*
|--------------------------------------------------------------------------|
| Info: CMS Language System.
|--------------------------------------------------------------------------|
| Specifies the Language that your CMS will show.
| Under Heavy Work. Please do not touch.
|--------------------------------------------------------------------------|
*/
header('Cache-control: private'); // IE 6 FIX
if(isset($_GET['lang'])){
	$lang = $_GET['lang'];

	//register session
	$_SESSION['lang'] = $lang;
	
	//define cookie
	setcookie('lang', $lang, time() + (3600 * 24 * 30));
	
//Searches cookie and session var
}else if(isSet($_SESSION['lang'])){
	$lang = $_SESSION['lang'];
}else if(isSet($_COOKIE['lang'])){
	$lang = $_COOKIE['lang'];
}else{
	$lang = LANGUAGE;
}

switch ($lang) {
  case 'bg':
  $lang_file = 'lang.bg.php';
  break;
  case 'cn':
  $lang_file = 'lang.cn.php';
  break;
  case 'de':
  $lang_file = 'lang.de.php';
  break;
  case 'en':
  $lang_file = 'lang.en.php';
  break;
  case 'fr':
  $lang_file = 'lang.fr.php';
  break;
  case 'gr':
  $lang_file = 'lang.gr.php';
  break;
  case 'it':
  $lang_file = 'lang.it.php';
  break;
  case 'ro':
  $lang_file = 'lang.ro.php';
  break;
  case 'ru':
  $lang_file = 'lang.ru.php';
  break;
  case 'tw':
  $lang_file = 'lang.tw.php';
  break;

  default:
  $lang_file = 'lang.en.php';
}
include_once str_replace("//","/",dirname(__FILE__)."/") ."../system/languages/".$lang_file;

/*
|--------------------------------------------------------------------------|
| Info: CMS Language System END.
|--------------------------------------------------------------------------|
*/
/*
|--------------------------------------------------------------------------|
| Install CMS Required
|--------------------------------------------------------------------------|
*/
if(file_exists("install"))
{
	header("Location: install");
	die();
}
/*
|--------------------------------------------------------------------------|
| Functions CMS
|--------------------------------------------------------------------------|
*/
include( str_replace("//","/",dirname(__FILE__)."/") ."../system/functions/function.php");
include( str_replace("//","/",dirname(__FILE__)."/") ."../system/functions/function.page.php");
?>