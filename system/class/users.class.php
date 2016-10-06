<?php
/**
* Copyright (C) 2016 FlameCMS <http://flamenet.github.io/FlameCMS/>
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

	public function Encryption($user, $userpassword){
		$Salt 		= '$q%or@x&klmn#=0y1z2u34v5t678p9sw';
		$UserFilter	= strtoupper($users);
		$User		= filter_var($UserFilter, FILTER_SANITIZE_STRING);
		$PassFilter	= strtoupper($userpassword);
		$Pass		= filter_var($PassFilter, FILTER_SANITIZE_STRING);
		$Signo		= ':+';
		$PassHash	= serialize($users.$Signo.$Pass);
		$Password 	= hash('sha256', $Salt.$PassHash);
		$mac 		= hash_hmac('sha256', $Password, substr(bin2hex($Salt), -32));
		$base64 	= base64_encode($mac);
		return $base64;
	}

	public function AccountLoginQuery(){
		
		global $profile;
		global $profileAuth;
		global $_SESSION;
		
		$SessionEmail	= isset($_SESSION['email']) ? $_SESSION['email'] : null;
		$rankSQL		= $this->WebQuery("SELECT * FROM account where email = '{$SessionEmail}'");
		$profile		= $rankSQL->fetch_assoc();
		$authSQL		= $this->AuthQuery("SELECT * FROM account where email = '{$SessionEmail}'");
		$profileAuth	= $authSQL->fetch_assoc();
	}

	public function AccountLoginCheck(){
		
		global $profile;

		// Session can not be empty
		if($_SESSION['email'] == ''){
			header("Location: ".ACCOUNT_URL."login");
			exit();
		}

		if($profile['rol'] < 1){
			die('<center>
					<h2>What are you doing here?</h2>
				</center>');
			header("Location: ".ACCOUNT_URL."login");
		}

		// Generating session identifiers for new sessions
		if (isset($_SESSION['mark']) === false){
			session_regenerate_id(true);
			$_SESSION['mark'] = true;
		}

	}

	public function LogOut(){
		$_SESSION = array();
		session_unset();
		session_destroy();
		echo'<meta http-equiv="refresh" content="1;url='.BASE_URL.'"/>';
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

}
