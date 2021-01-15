<?php

class Connexion
{
	private static $cx;


	public function __construct()
	   {
	}

	public static function getCx()
	{

		try {

			//self::$cx = new PDO('mysql:host=localhost; dbname=emediam_highschool', 'pma', 'e-Emedia?20.');
			self::$cx = new PDO('mysql:host=localhost; dbname=emediam_highschool_mba_master', 'root', '');
		    self::$cx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			self::$cx->query("SET NAMES UTF8");
			date_default_timezone_set('Indian/Antananarivo');
			// Salut daholo an
			
		} catch (PDOException $e) {

			die($e->getMessage());
		}

		return self::$cx;
	}
}
