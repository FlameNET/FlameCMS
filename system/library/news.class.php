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

class News {
	
	public function NewsWordLimit($string, $length = 75, $ellipsis = "...") {
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

	public function ago($time) {
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

}
