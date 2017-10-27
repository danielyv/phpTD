<?php

	class Conf
	{
		static private $debug = TRUE;

		static private $databases = [ // Hostname is webinfo at IUT
			// or localhost on your computer
			'hostname' => 'localhost' , // At IUT, you have a database named after your login
			// On your computer, please create a database
			'database' => 'TD' , // At IUT, it is your classical login
			// On your computer, you should have at least a 'root' account
			'login'    => 'root' , // At IUT, it is your database password
			// (=PHPMyAdmin pwd, INE by defaut)
			// On your computer, you created the pwd during setup
			'password' => 'azerty' ];

		static public function getLogin ()
		{
			//in PHP, indices of arrays car be strings (or integers)
			return self ::$databases[ 'login' ];
		}

		static public function getHostname ()
		{
			return self ::$databases[ 'hostname' ];
		}

		static public function getDatabase ()
		{
			return self ::$databases[ 'database' ];
		}

		static public function getPassword ()
		{
			return self ::$databases[ 'password' ];
		}

		static public function getDebug ()
		{
			return self ::$debug;
		}
	}

?>