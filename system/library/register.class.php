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

class Register {

	public function Countries($country, $get){
		$country = Connection::Connect()->query("SELECT * FROM countries");
		while($get = mysqli_fetch_array($country))
		{
			echo'<option value="'.$get["isoAlpha3"].'">'.$get["countryName"].'</option>';
		}

		return $country;
	}

	public function Day($day){
		for($day=1;$day<=31;$day++){
			echo'<option value="'.$day.'">'.$day.'</option>';
		}

		return $day;
	}

	public function Year($year){
		for($year=2015;$year>=1905;$year--){
			echo'<option value="'.$year.'">'.$year.'</option>';
		}

		return $year;
	}
}
