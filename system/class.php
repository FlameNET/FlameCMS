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

/*
|--------------------------------------------------------------------------|
| Autoload Class
|--------------------------------------------------------------------------|
*/
function __autoload($className) {
	if (file_exists(CLASS_DIR . strtolower($className).'.class.php')) {
		require_once(CLASS_DIR . strtolower($className).'.class.php');
	}
}
$connect	= new Connection();
$news		= new News();
$register	= new Users();
$account	= new Users();
$url		= new Url();
