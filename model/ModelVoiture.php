<?php
	/**
	 * Created by PhpStorm.
	 * ModelUser: yves
	 * Date: 08/09/17
	 * Time: 11:54
	 */
	require_once(File::build_path (["model","Model.php"]));

	class ModelVoiture extends Model
	{
		static protected $object="voiture";
		protected static $primary='immatriculation';
		private $marque;
		private $couleur;
		private $immatriculation;


		/**
		 * @return string
		 */
		public static function getPrimary ()
		{
			return self ::$primary;
		}
		// a getter
		public function getMarque ()
		{
			return $this -> marque;
		}

		// a setter
		public function setMarque ( $marque2 )
		{
			$this -> marque = $marque2;
		}

		/**
		 * @return mixed
		 */
		public function getCouleur ()
		{
			return $this -> couleur;
		}

		/**
		 * @param mixed $immatriculation
		 */
		public function setImmatriculation ( $immatriculation )
		{
			if ( strlen ( $immatriculation ) == 8 ) {
				$this -> immatriculation = $immatriculation;
			}
		}

		/**
		 * @param mixed $couleur
		 */
		public function setCouleur ( $couleur )
		{
			$this -> couleur = $couleur;
		}

		/**
		 * @return mixed
		 */
		public function getImmatriculation ()
		{
			return $this -> immatriculation;
		}

		// a constructor
		public function __construct ( $m = NULL , $c = NULL , $i = NULL )
		{
			if ( !is_null ( $m ) && !is_null ( $c ) && !is_null ( $i ) ) {
				// If both $m, $c and $i are not NULL,
				// then they must have been supplied
				// so fall back to constructor with 3 arguments
				$this -> marque = $m;
				$this -> couleur = $c;
				$this -> immatriculation = $i;
			}
		}

	}