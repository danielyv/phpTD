<?php

	require_once ( File ::build_path ( [ "model" , "Model.php" ] ) );

	class ModelUser extends Model
	{
		static protected $object = "user";
		protected static $primary='login';
		public $login;
		public $nom;
		public $prenom;


		public function __construct ( $login = NULL , $nom = NULL , $prenom = NULL )
		{
			if ( $login != NULL && $nom != NULL && $prenom != NULL ) {
				$this -> login = $login;
				$this -> nom = $nom;
				$this -> prenom = $prenom;
			}
		}

		/**
		 * @return string
		 */
		public static function getPrimary () : string
		{
			return self ::$primary;
		}
		/**
		 * @return mixed
		 */
		public function getPrenom ()
		{
			return $this -> prenom;
		}

		/**
		 * @return mixed
		 */
		public function getNom ()
		{
			return $this -> nom;
		}

		/**
		 * @return mixed
		 */
		public function getLogin ()
		{
			return $this -> login;
		}

		/**
		 * @param null $nom
		 */
		public function setNom ( $nom )
		{
			$this -> nom = $nom;
		}

		/**
		 * @param null $prenom
		 */
		public function setPrenom ( $prenom )
		{
			$this -> prenom = $prenom;
		}

		/**
		 * @param null $login
		 */
		public function setLogin ( $login )
		{
			$this -> login = $login;
		}


	}