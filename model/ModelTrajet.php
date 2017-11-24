<?php
	/**
	 * Created by PhpStorm.
	 * User: yves
	 * Date: 13/10/17
	 * Time: 09:22
	 */
	require_once ( File ::build_path ( [ "model" , "Model.php" ] ) );

	class ModelTrajet extends Model
	{

		static protected $object = "trajet";
		protected static $primary = 'id';
		public $id;
		public $depart;
		public $arrivee;
		public $date;
		public $nbplaces;
		public $prix;
		public $conducteur_login;

		public function __construct ( $id = NULL , $depart = NULL , $arrivee = NULL , $date = NULL , $nbplaces = NULL , $prix = NULL , $conducteur_login = NULL )
		{
			if ( $id != NULL && $depart != NULL && $arrivee != NULL && $date != NULL && $nbplaces != NULL && $prix != NULL && $conducteur_login != NULL ) {
				$this -> id = $id;
				$this -> depart = $depart;
				$this -> arrivee = $arrivee;
				$this -> date = $date;
				$this -> nbplaces = $nbplaces;
				$this -> prix = $prix;
				$this -> conducteur_login = $conducteur_login;
			}
		}

		/**
		 * @return mixed
		 */
		public function getArrivee ()
		{
			return $this -> arrivee;
		}

		/**
		 * @return mixed
		 */
		public function getConducteurLogin ()
		{
			return $this -> conducteur_login;
		}

		/**
		 * @return mixed
		 */
		public function getDate ()
		{
			return $this -> date;
		}

		/**
		 * @return mixed
		 */
		public function getDepart ()
		{
			return $this -> depart;
		}

		/**
		 * @return mixed
		 */
		public function getId ()
		{
			return $this -> id;
		}

		/**
		 * @return mixed
		 */
		public function getInfo ()
		{
			return $this -> info;
		}

		/**
		 * @return mixed
		 */
		public function getNbplaces ()
		{
			return $this -> nbplaces;
		}

		/**
		 * @return mixed
		 */
		public function getPrix ()
		{
			return $this -> prix;
		}

		/**
		 * @return string
		 */
		public static function getPrimary ()
		{
			return self ::$primary;
		}

		public function getAllPassengers ()
		{
			$sql = "SELECT U.nom,U.prenom
FROM passager P, user U
WHERE P.utilisateur_login=U.login and P.trajet_id=" . $this -> id;

			$req_prep = Model ::$pdo -> prepare ( $sql );
			$req_prep -> execute ();

			return $req_prep -> fetchAll ();
		}
	}