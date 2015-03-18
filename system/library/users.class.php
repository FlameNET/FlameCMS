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

class Users extends Connection {

	public function Countries($country, $get){
		
		$country = $this->Connect()->query("SELECT * FROM countries");

		while($get = mysqli_fetch_array($country))
		{
			if($get['isoAlpha3'] == $_GET['country'] ){
				echo'<option value="'.$get["isoAlpha3"].'"selected="selected">'.$get["countryName"].'</option>';
			}else{
				echo'<option value="'.$get["isoAlpha3"].'">'.$get["countryName"].'</option>';
			}
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

	public function AccountLoginQuery(){
		
		global $profile;
		global $profileAuth;
		
		$rankSQL	= $this->Connect()->query("SELECT * FROM account where email = '".$_SESSION['email']."'");
		$profile	= $rankSQL->fetch_assoc();

		$authSQL	= $this->Auth()->query("SELECT * FROM account where email = '".$_SESSION['email']."'");
		$profileAuth= $authSQL->fetch_assoc();
	}

	public function AccountLoginCheck(){
		
		global $profile;
		
		if($_SESSION['email'] == ''){
			header("Location: ".ACCOUNT_URL."login");
			exit();
		}
		if($profile['roles_account'] < 2){
			die('<center>
					<h2>What are you doing here?</h2>
				</center>');
			header("Location: ".ACCOUNT_URL."login");
		}
	}

	public function ConnectSOAP() {
		
		$client = new SoapClient(NULL, array(
		'location' 		=> 'http://'.SOAP_IP.':'.SOAP_PORT.'/',
		'uri'      		=> 'urn:TC',
		'user_agent'    => 'aframework',
		'style'    		=> SOAP_RPC,
		'trace'         => 1,
		'exceptions'    => 0,
		'login'			=> SOAP_USER,
		'password'		=> SOAP_PASS,
		));
	}

	public function accountCreate($email, $password){
		$command="bnetaccount create ".$email." ".$password."";
		try {
			$result = $this->ConnectSOAP()->executeCommand(new SoapParam($command, "command"));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

}
