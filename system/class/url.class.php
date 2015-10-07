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

class Url {

	public function CleanString($toClean) {
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
}
