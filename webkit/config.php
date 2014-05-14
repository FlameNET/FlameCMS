<?php
/**
* Copyright (C) 2014 FlameCMS <YET TO BE DETERMINED>
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
/*
|--------------------------------------------------------------------------|
| Info: Session for Accounts.
| Special: DO NOT TOUCH!
|--------------------------------------------------------------------------|
| Creates Sessions that are saved so that accounts can stay connected.
|--------------------------------------------------------------------------|
*/
if (!isset($_SESSION))
    session_start();
/*
|--------------------------------------------------------------------------|
| Info: Session for Accounts. END.
|--------------------------------------------------------------------------|
*/
/*
|--------------------------------------------------------------------------|
| Info: CMS Language System.
|--------------------------------------------------------------------------|
| Specifies the Language that your CMS will show.
| Under Heavy Work. Please do not touch.
|--------------------------------------------------------------------------|
*/
if (isset($_GET['Local']))
    $lang = $_GET['Local'];
else if (isset($_SESSION['Local']))
    $lang = $_SESSION['Local'];
if (empty($lang))
    $lang = 'english';

$language = $lang;
$langs    = Array(
    "english" => null,
    "romanian" => null,
    "italian" => null,
    "german" => null,
    "spanish" => null,
    "bulgarian" => null,
    "greek" => null,
    "russian" => null,
    "french" => null
);

if (array_key_exists($lang, $langs))
    require_once("assets/lang/" . $lang . "");
else
    require_once("/assets/lang/english");
$_SESSION['Local'] = $language;
/*
|--------------------------------------------------------------------------|
| Info: CMS Language System END.
|--------------------------------------------------------------------------|
*/
/*
|--------------------------------------------------------------------------|
| Info: CMS Community System.
|--------------------------------------------------------------------------|
| Important Links to Social sites & the title of the CMS.
| Under Heavy Work. Please do not touch.
|--------------------------------------------------------------------------|
*/
$cms['title']		= "FlameCMS";
$cms['Facebook'] 	= "http://www.facebook.com/";
$cms['Twitter']  	= "http://twitter.com/";
$cms['Youtube']  	= "http://www.youtube.com/";
$cms['Reddit']   	= "http://www.reddit.com/";
/*
|--------------------------------------------------------------------------|
| Info: CMS Community System END.
|--------------------------------------------------------------------------|
*/
/*
|--------------------------------------------------------------------------|
| Info: CMS Connection Variables.
|--------------------------------------------------------------------------|
| Please set these to your MySQL Connection. 
| If you don't know what you are doing, please contact with one of FlameCMS
| Developers to help you.
|--------------------------------------------------------------------------|
*/
$cms_host			= "localhost";
$cms_user			= "root";
$cms_pass			= "password";
$cms_db				= "cms";
$cms_wdb			= "world";
$cmd_adb			= "auth";
/*
|--------------------------------------------------------------------------|
| Info: DO NOT TOUCH THESE UNLESS YOU KNOW WHAT YOU ARE DOING.
|--------------------------------------------------------------------------|
*/
$cms_core			= "webkit/";
$cms_root			= "/";
$cms_add			= "http://localhost/";
/*
|--------------------------------------------------------------------------|
| Info: CMS Connection Variables END.
|--------------------------------------------------------------------------|
*/
/*
|--------------------------------------------------------------------------|
| Info: CMS Connection System.
|--------------------------------------------------------------------------|
| Under Heavy Work. Please do not touch.
|--------------------------------------------------------------------------|
*/
$con=mysqli_connect("localhost","root","password","cms");
if (mysqli_connect_errno()) {
  echo "Failed to connect to Database: " . mysqli_connect_error();
}
/*
|--------------------------------------------------------------------------|
| Info: CMS Connection System END.
|--------------------------------------------------------------------------|
*/
?>
