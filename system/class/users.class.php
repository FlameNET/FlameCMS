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

class Users extends Connection {

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
