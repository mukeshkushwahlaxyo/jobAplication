<?php

if(!function_exists('Gender')){
	function Gender(){
		return [
					'M'  => 'Male',
					'F'  => 'Female',
					'O'  => 'Other'	
				];
	}
}

if(!function_exists('City')){
	function City(){
		return [
				'1'  => 'Guna',
				'2'  => 'Indore',
				'3'  => 'Jabalpur',	
				'4'  => 'Ajmer',	
				'5'  => 'Kota',	
				'6'  => 'Jaipur',	
			];
	}
}

if(!function_exists('Eductaion')){
	function Eductaion(){
		return [
				'SSC'  			=> 'SSC',
				'HSC'  			=> 'HSC',
				'Graduation'  	=> 'Graduation',	
				'Master Degree' => 'Master Degree'
			];
	}
}

if(!function_exists('Languages')){
	function Languages(){
		return [
				'Hindi' 	=> 'Hindi',
				'English' 	=> 'English',
				'Gujarati' 	=> 'Gujarati',
			];
	}
}

if(!function_exists('LanOptions')){
	function LanOptions(){
		return [
				'read' 	=> 'Read',
				'write' => 'Write',
				'speak' => 'Speak'
			];
	}
}

if(!function_exists('Skils')){
	function Skils(){
		return [
				'PHP' 		=> 'PHP',
				'Mysql' 	=> 'Mysql',
				'Laravel' 	=> 'Laravel',
				'Oracle' 	=> 'Oracle',
			];
	}
}

if(!function_exists('SkilsOption')){
	function SkilsOption(){
		return [
				'B' 	=> 'Beginner',
				'M' 	=> 'Mediator',
				'E' 	=> 'Expert'
			];
	}
}