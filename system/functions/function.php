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
function Connect(){

	$mysqli = new mysqli(HOST, USER, PASSWORD, DB, PORT);
	/**
	* Language support in the database
	*/
	$mysqli ->query("SET NAMES 'utf8'");

	if (mysqli_connect_error()) {
		die("Failed to connect to Database (" . mysqli_connect_errno() . ") " . mysqli_connect_error());
	}

	return $mysqli;

}

function ago($time)
{
	$periods	= array("second", "minute", "hour", "day", "week", "month", "year", "decade");
	$lengths	= array("60","60","24","7","4.35","12","10");
	$now		= time();
	$difference	= $now - $time;
	$tense		= "ago";

	for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
		$difference /= $lengths[$j];
	}

	$difference = round($difference);

	if($difference != 1) {
		$periods[$j].= "s";
	}

	return "$difference $periods[$j] ago";
}

function CleanString($toClean) {
	$chars = array(
        '?' => 'S', '?' => 's', 'Ð' => 'Dj','?' => 'Z', '?' => 'z', 'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A',
        'Å' => 'A', 'Æ' => 'A', 'Ç' => 'C', 'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I',
        'Ï' => 'I', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U',
        'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'Þ' => 'B', 'ß' => 'Ss','à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a',
        'å' => 'a', 'æ' => 'a', 'ç' => 'c', 'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i',
        'ï' => 'i', 'ð' => 'o', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ø' => 'o', 'ù' => 'u',
        'ú' => 'u', 'û' => 'u', 'ý' => 'y', 'ý' => 'y', 'þ' => 'b', 'ÿ' => 'y', 'ƒ' => 'f', ',' => '',  '.' => '',  ':' => '',
        ';' => '',  '_' => '',  '<' => '',  '>' => '',  '\\'=> '',  'ª' => '',  'º' => '',  '!' => '',  '|' => '',  '"' => '',
        '@' => '',  '·' => '',  '#' => '',  '$' => '',  '~' => '',  '%' => '',  '€' => '',  '&' => '',  '¬' => '',  '/' => '',
        '(' => '',  ')' => '',  '=' => '',  '?' => '',  '\''=> '',  '¿' => '',  '¡' => '',  '`' => '',  '+' => '',  '´' => '',
        'ç' => '',  '^' => '',  '*' => '',  '¨' => '',  'Ç' => '',  '[' => '',  ']' => '',  '{' => '',  '}' => '',  '? '=> '-',
    );
	$toClean = str_replace('&', '-and-', $toClean);
	$toClean = str_replace('.', '', $toClean);
	$toClean = strtolower(strtr($toClean, $chars));
	$toClean = str_replace(' ', '-', $toClean);
	$toClean = str_replace('--', '-', $toClean);
	$toClean = str_replace('--', '-', $toClean);
	$toClean = preg_replace('/[^\w\d_ -]/si', '', $toClean);
	return trim($toClean);
}

function NewsWordLimit($string, $length = 75, $ellipsis = "...") {
	$words = explode(' ', $string);
	if (count($words) > $length)
	{
		return implode(' ', array_slice($words, 0, $length)) ." ". $ellipsis;
	}
	else
	{
		return $string;
	}
}

/**
 *  Register Account
 */

function Countries($country, $get){

	$country = Connect()->query("SELECT * FROM countries");
	while($get = mysqli_fetch_array($country))
	{
	echo'<option value="'.$get["isoAlpha3"].'">'.$get["countryName"].'</option>';
	}
	return $country;
}

function Day($day){
 
	for($day=1;$day<=31;$day++){
	echo'<option value="'.$day.'">'.$day.'</option>';
	}

	return $day;
} 

function Year($year){
 
	for($year=2015;$year>=1905;$year--){
	echo'<option value="'.$year.'">'.$year.'</option>';
	}

	return $year;
}


/**
 *  Reporting Error 
 */
function setReporting() {
	if (DEVELOPMENT_ENVIRONMENT == true) {
		error_reporting(E_ALL);
		ini_set('display_errors','On');
	} else {
		error_reporting(E_ALL);
		ini_set('display_errors','Off');
		ini_set('log_errors', 'On');
		ini_set('error_log', __ROOT__.DS.'system'.DS.'tmp'.DS.'logs'.DS.'error.log');
	}
}
setReporting();

/**
 *  Maintenance Mode 
 */
function maintain($mode = MAINTENANCE){ # $mode either equals true or false 
    if($mode){ 
        # if we are in maintenance, require all pages to go to the maintenance page 
        if(filename($_SERVER['SCRIPT_FILENAME']) != 'maintenance.php'){ 
            # Replace the location to the loacation of your maintenance page 
            header("Location: ".BASE_URL."maintenance.php"); 
            exit; 
        } 
    }else{
        # if we are not in maintenance, don't allow link to maintenance page
        if(filename($_SERVER['SCRIPT_FILENAME']) == 'maintenance.php'){
            # Replace the location to the loacation to your home page
            header("Location: BASE_URL");
            exit;
        }
    }
} 
# Run maintenance mode 
maintain(); # Leave blank to not be in maintenance mode or use maintain(TRUE); 

# get the file name 
function filename($url){ 
    $pos = strrpos($url,'/'); 
    $str = substr($url,$pos+1); 
    return $str; 
}
