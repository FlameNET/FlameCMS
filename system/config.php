<?php
/**
* Copyright (C) 2015 FlameCMS <http://flamenet.github.io/FlameCMS/>
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
| Info: CMS Language System.
|--------------------------------------------------------------------------|
| Specifies the Language that your CMS will show.
| Under Heavy Work. Please do not touch.
|--------------------------------------------------------------------------|
*/
define('LANGUAGE',	'en');

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
define('TITLE',		'FlameCMS');
define('FACEBOOK', 	'https://www.facebook.com/');
define('TWITTER',  	'https://twitter.com/');
define('YOUTUBE',  	'https://www.youtube.com/');
define('REDDIT',   	'https://www.reddit.com/');

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
| If you don\'t know what you are doing, please contact with one of FlameCMS
| Developers to help you.
|--------------------------------------------------------------------------|
*/
define('HOST',		'YOUR HOST');
define('USER',		'YOUR USERNAME');
define('PASSWORD',	'YOUR PASS');
define('PORT',		'YOUR PORT');
define('DB',		'YOUR DATABASE');


/*
|--------------------------------------------------------------------------|
| Info: Server Connection Variables.
|--------------------------------------------------------------------------|
| Please set these to your MySQL Connection. 
| If you don\'t know what you are doing, please contact with one of FlameCMS
| Developers to help you.
|--------------------------------------------------------------------------|
*/
define('SERVERHOST',	'YOUR HOST');
define('SERVERUSER',	'YOUR USERNAME');
define('SERVERPASSWORD','YOUR PASS');
define('SERVERPORT',	'YOUR PORT');
define('AUTH',			'YOUR DATABASE AUTH');
define('CHARACTERS',	'YOUR DATABASE CHARACTERS');
define('WORLD',			'YOUR DATABASE WORLD');
define('REALMLIST', 	'YOUR REALMLIST');

/*
|--------------------------------------------------------------------------|
|  Soap settings
|--------------------------------------------------------------------------|
| Bind SOAP service to IP/hostname.
| TCP port to reach the SOAP service.
| SOAP IP		= 127.0.0.1
| SOAP PORT		= 7878
| SOAP SOAP		= 1#1 // EXAMPLE
| USER PASSWORD = your password account
| SOAP KEY		= your key
*/
define('SOAP_IP',		'YOUR HOST');
define('SOAP_PORT', 	'YOUR PORT');
define('SOAP_USER', 	'YOUR USERNAME');
define('SOAP_PASS', 	'YOUR PASS');
define('SOAP_KEY',		'abcdefghijklmnopqrstuvwxyz0123456789');

/*
|--------------------------------------------------------------------------|
| Info: DO NOT TOUCH THESE UNLESS YOU KNOW WHAT YOU ARE DOING.
|--------------------------------------------------------------------------|
*/
define('BASE_URL',		'YOUR URL');
define('ADMIN_URL',		'YOUR ADMIN URL');
define('ACCOUNT_URL',	'YOUR ACCOUNT');
define('TIMEZONE',		'America/Costa_Rica');

/*
|--------------------------------------------------------------------------|
| System Core CMS FlameNet.
|--------------------------------------------------------------------------|
*/
require('FlameCore.php');
