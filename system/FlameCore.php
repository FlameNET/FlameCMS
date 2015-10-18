<?php
/**
* Copyright (C) 2015 FlameCMS <https://github.com/FlameNET/>
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
| FLAME SESSION
|-------------------------------------------------------------------------|
| @var $_SESSION
|-------------------------------------------------------------------------|
*/
 if (!isset($_SESSION)) session_start();

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
| Install CMS Required
|--------------------------------------------------------------------------|
*/
if(file_exists("install")){
	header("Location: install");
	die();
}

/*
|--------------------------------------------------------------------------|
| Prevent most browsers can not handle javascript through the "HttpOnly" attribute
|--------------------------------------------------------------------------|
*/
 ini_set('session.cookie_httponly', 1);

/*
|--------------------------------------------------------------------------|
| Only use cookies for session id propagation.
|--------------------------------------------------------------------------|
*/
 ini_set('session.use_only_cookies', 1);

/*
|--------------------------------------------------------------------------|
| Set the default time zone UTC.
|--------------------------------------------------------------------------|
*/
date_default_timezone_set(TIMEZONE);

/*
|--------------------------------------------------------------------------|
| CORE CMS
|--------------------------------------------------------------------------|
*/
define('MAINTENANCE', false);
define('DEVELOPMENT_ENVIRONMENT', false);
define('DS', DIRECTORY_SEPARATOR);
// Directory Root
define('__ROOT__', dirname(dirname(__FILE__)));
// Static files
define('STATIC', BASE_URL.'static/');
// Directory WebKit
define('SYSTEM', __ROOT__.'/system/');
define('WEBKIT', SYSTEM.'webkit/');
define('LANG', SYSTEM.'languages/');
define('CLASS_DIR', SYSTEM.'class/');

include(LANG."lang.php");
include(SYSTEM."class.php");
include(SYSTEM."function.php");
include(SYSTEM."OOP.php");
