<?php
/**
* Copyright (C) 2015 FlameCMS <YET TO BE DETERMINED>
*
* This program is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation; either version 2 of the License, or
* (at your option) any later version.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with this program; if not, write to the Free Software
* Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
**/

/**
 |-------------------------------------------------------------------------|
 | FLAME Version
 |-------------------------------------------------------------------------|
 | @var string
 |-------------------------------------------------------------------------|
 */
	define('FLAME_VERSION', '1.0');

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

	case 'cn':
	$lang_file = 'lang.cn.php';
	break;

	case 'de':
	$lang_file = 'lang.de.php';
	break;

	case 'en':
	$lang_file = 'lang.en.php';
	break;

	case 'es':
	$lang_file = 'lang.es.php';
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

	case 'ko':
	$lang_file = 'lang.ko.php';
	break;

	case 'pt':
	$lang_file = 'lang.pt.php';
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
include_once (__ROOT__.DS."system".DS."languages".DS.$lang_file);

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
include( __ROOT__.DS."system".DS."functions".DS."function.php");

/*
|--------------------------------------------------------------------------|
| Autoload Class
|--------------------------------------------------------------------------|
*/
function __autoload($className) {
	if (file_exists(__ROOT__ . DS . 'system' . DS . 'library' . DS . strtolower($className) . '.class.php')) {
		require_once(__ROOT__ . DS . 'system' . DS . 'library' . DS . strtolower($className) . '.class.php');
	}
}
$connect	= new Connection();
$news		= new News();
$register	= new Users();
$account	= new Users();
$url		= new Url();
