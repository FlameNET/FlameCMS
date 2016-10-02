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

class Connection extends mysqli {

	/**
	* Gestiona la conexión con la base de datos
	*/
	private $db_host 	= HOST;
	private $db_user 	= USER;
	private $db_pass 	= PASSWORD;
	private $db_name 	= DB;
	private $port 		= PORT;
	private $auth;
	private $characters;
	private $world;

    /**
     * Connection with the database.
     * @return connection handle database
     */
	public function Connect(){

		$this->mysqli = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
		// Support for special characters in the database
		$this->mysqli->query("SET NAMES 'utf8'");

		if ($this->mysqli->connect_error){
			trigger_error("Failed to connect to Database: " . $this->mysqli->connect_error, E_USER_ERROR);
		}

		// Return connection 
		return $this->mysqli;
		
		// Close the connection
		$this->mysqli->close();
	}

	public function Auth(){

		$this->auth = new mysqli(SERVERHOST, SERVERUSER, SERVERPASSWORD, AUTH, SERVERPORT);
		$this->auth->query("SET NAMES 'utf8'");
		if (mysqli_connect_error()) {
			die("Failed to connect to Database (" . mysqli_connect_errno() . ") " . mysqli_connect_error());
		}
		return $this->auth;
	}

	public function Characters(){

		$this->characters = new mysqli(SERVERHOST, SERVERUSER, SERVERPASSWORD, CHARACTERS, SERVERPORT);
		/**
		* Language support in the database
		*/
		$this->characters->query("SET NAMES 'utf8'");

		if (mysqli_connect_error()) {
			die("Failed to connect to Database (" . mysqli_connect_errno() . ") " . mysqli_connect_error());
		}

		return $this->$characters;

	}

	public function World(){

		$this->world = new mysqli(SERVERHOST, SERVERUSER, SERVERPASSWORD, WORLD, SERVERPORT);
		/**
		* Language support in the database
		*/
		$this->world->query("SET NAMES 'utf8'");

		if (mysqli_connect_error()) {
			die("Failed to connect to Database (" . mysqli_connect_errno() . ") " . mysqli_connect_error());
		}

		return $this->world;

	}

	public function WebQuery($WebQuery){
		return $this->Connect()->query($WebQuery);
	}

	public function AuthQuery($AuthQuery){
		return $this->Auth()->query($AuthQuery);
	}

	public function CharQuery($CharQuery){
		return $this->Characters()->query($CharQuery);
	}

	public function WorldQuery($WorldQuery){
		return $this->World()->query($WorldQuery);
	}
}
