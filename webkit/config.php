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
$cms["title"]		= "FlameCMS";
$cms["Facebook"] 	= "http://www.facebook.com/";
$cms["Twitter"]  	= "http://twitter.com/";
$cms["Youtube"]  	= "http://www.youtube.com/";
$cms["Reddit"]   	= "http://www.reddit.com/";
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
$cms_host			= "127.0.0.1";
$cms_user			= "root";
$cms_pass			= "password";
$cms_db				= "cms";
$cms_wdb			= "world";
$cms_adb			= "auth";
$cms_cdb			= "char";
/*
|--------------------------------------------------------------------------|
| Info: DO NOT TOUCH THESE UNLESS YOU KNOW WHAT YOU ARE DOING.
|--------------------------------------------------------------------------|
*/
$cms_core			= "webkit/";
$cms_root			= "/";
$cms_add			= "http://localhost/projects/FlameCMS/";
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
$con=mysqli_connect($cms_host,$cms_user,$cms_pass,$cms_db);
if (mysqli_connect_errno()) {
  echo "Failed to connect to Database: " . mysqli_connect_error();
}
/*
|--------------------------------------------------------------------------|
| Info: CMS Connection System END.
|--------------------------------------------------------------------------|
*/
