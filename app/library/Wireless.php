<?php

class Wireless{

	protected static $channels = array(
		'2.4' => array(
			1 => 1, 
			2 => 2, 
			3 => 3, 
			4 => 4, 
			5 => 5, 
			6 => 6, 
			7 => 7, 
			8 => 8, 
			9 => 9, 
			10 => 10, 
			11 => 11, 
			12 => 12, 
			13 => 13, 
			14 => 14
		),
		'5' => array(
			36 => 36, 
			40 => 40, 
			44 => 44, 
			48 => 48, 
			52 => 52, 
			56 => 56, 
			60 => 60, 
			64 => 64, 
			100 => 100, 
			104 => 104, 
			108 => 108, 
			112 => 112, 
			116 => 116, 
			120 => 120, 
			124 => 124, 
			128 => 128, 
			132 => 132, 
			136 => 136, 
			140 => 140, 
			149 => 149, 
			153 => 153, 
			157 => 157, 
			161 => 161, 
			165 => 165
		)
	);

	/**
	 *	Return an array of available channes channels
	 *
	 *	@param string $frequency
	 *	@param string $country
	 *	@return array
	 **/
	public static function channels($frequency = '2.4', $country = 'EU'){
		$channels = array(
			'2.4' => array(
				// Not in EU channels
				'EU' => array(12 => 12, 13 => 13, 14 => 14),
				// Not in US channels
				'US' => array(14 => 14)
			),
			'5' => array(
				// Not in EU channels
				'EU' => array(149 => 149, 153 => 153, 157 => 157, 161 => 161, 165 => 165),
				// Not in US channels
				'US' => array(120 => 120, 124 => 124, 128 => 128, 132 => 132),					
				// Not in JP channels
				'JP' => array(149 => 149, 153 => 153, 157 => 157, 161 => 161, 165 => 165)
			)
		);

		return array_diff(self::$channels[$frequency], $channels[$frequency][$country]);
	}
}

?>