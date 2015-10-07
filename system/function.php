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
		ini_set('error_log', SYSTEM.'tmp'.DS.'logs'.DS.'error.log');
	}
}
setReporting();

/**
 *  Maintenance Mode
 */
function MaintenanceMode($mode = MAINTENANCE){ # $mode either equals true or false 
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
MaintenanceMode(); # Leave blank to not be in maintenance mode or use maintenance(TRUE);

# get the file name 
function filename($url){
    $pos = strrpos($url,'/');
    $str = substr($url,$pos+1);

    return $str;

}


/**
 *  Mysqli Num Row function
 */
function MysqliNumRowsFlame($result){
        $numRows = mysqli_num_rows($result); 
        return $numRows==1; 
}

/**
 *  Mysqli result function
 */
function MysqliResultFlame($res,$row=0,$col=0){ 
    $numrows = MysqliNumRowsFlame($res); 
    if ($numrows && $row <= ($numrows-1) && $row >=0){
        mysqli_data_seek($res,$row);
        $resrow = (is_numeric($col)) ? mysqli_fetch_row($res) : mysqli_fetch_assoc($res);
        if (isset($resrow[$col])){
            return $resrow[$col];
        }
    }
    return false;
}

function footer() {
	include(WEBKIT.'footer.php');
}
