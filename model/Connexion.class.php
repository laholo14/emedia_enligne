<?php

class Connexion
{
	private $cx;


	public function __construct()
	   {

		try {

			//$this->cx = new PDO('mysql:host=localhost; dbname=emediam_highschool', 'pma', 'e-Emedia?20.');
			$this->cx = new PDO('mysql:host=localhost; dbname=emediam_highschool', 'root', '');
		    $this->cx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->cx->query("SET NAMES UTF8");
			date_default_timezone_set('Indian/Antananarivo');
			
		} catch (Exception $e) {

			die('Misy olana kely');
		}
	}

	public function getCx()
	{

		return $this->cx;
	}
}
