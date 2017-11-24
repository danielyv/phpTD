<?php

	require_once ( File ::build_path ( [ "model" , "Model.php" ] ) );

	class ModelUser extends Model
	{
		static protected $object = "user";
		protected static $primary='login';
		private $login;
		private $nom;
		private $prenom;
		private $mdp;
		private $admin;
		private $mail;
		private $nonce;
		public function __construct ( $login = NULL , $nom = NULL , $prenom = NULL ,$mdp=NULL,$admin=NULL,$mail=NULL,$nonce=NULL)
		{
			if ( $login != NULL && $nom != NULL && $prenom != NULL && $mdp!=NULL && $admin != NULL && $mail !=NULL) {
				$this -> login = $login;
				$this -> nom = $nom;
				$this -> prenom = $prenom;
				$this->mdp=$mdp;
				$this->admin=$admin;
				$this->mail=$mail;
				$this->nonce=$nonce;
			}
		}

		/**
		 * @return null
		 */
		public function getNonce ()
		{
			return $this -> nonce;
		}

		/**
		 * @return null
		 */
		public function getMail ()
		{
			return $this -> mail;
		}

		/**
		 * @return string
		 */
		public static function getPrimary ()
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

		public static function checkPassword($login,$mot_de_passe_chiffre){
			$sql = "SELECT * 
					FROM user 
					WHERE mdp=:mdp and login=:login";
			$req_prep = Model ::$pdo -> prepare ( $sql );
			$match = [
				"login"  => $login ,
				"mdp" => Security::chiffrer ($mot_de_passe_chiffre)
			];
			$req_prep -> execute ( $match );
			$req_prep -> setFetchMode ( PDO::FETCH_CLASS , 'ModelUtilisateur' );
			return !empty($req_prep->fetchAll ());
		}

		/**
		 * @return null
		 */
		public function getAdmin ()
		{
			return $this -> admin;
		}
		public static function checkValidity($login,$nonce){
			$sql = "SELECT * 
					FROM user 
					WHERE nonce=:nonce and login=:login";
			$req_prep = Model ::$pdo -> prepare ( $sql );
			$match = [
				"login"  => $login ,
				"nonce" => $nonce
			];
			$req_prep -> execute ( $match );
			$req_prep -> setFetchMode ( PDO::FETCH_CLASS , 'ModelUtilisateur' );
			return !empty($req_prep->fetchAll ());
		}
	}