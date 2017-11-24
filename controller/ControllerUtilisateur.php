<?php
	/**
	 * Created by PhpStorm.
	 * ModelUser: yves
	 * Date: 07/10/17
	 * Time: 11:08
	 */
	require_once ( File ::build_path ( [ "model" , "ModelUser.php" ] ) );

	class ControllerUtilisateur
	{
		protected static $object;

		public static function readAll ()
		{
			$tab_v = ModelUser ::selectAll ();     //appel au modèle pour gerer la BD
			$object = 'utilisateur';
			$view = 'list';
			$pagetitle = 'Liste des utilisateurs';
			require ( File ::build_path ( [ 'view' , 'view.php' ] ) );  //"redirige" vers la vue

		}

		public static function read ( $login )
		{
			$v = ModelUser ::select ( $login );
			$object = 'utilisateur';
			$view = 'detail';
			$pagetitle = 'Détail de l\'utilisateur.';
			require ( File ::build_path ( [ 'view' , 'view.php' ] ) );  //"redirige" vers la vue
		}

		public static function delete ( $login )
		{
			ModelUser ::delete ( $login );
			$tab_v = ModelUser ::selectAll ();

			$object = 'utilisateur';
			$view = 'delete';
			$pagetitle = 'Utilisateur supprimé';
			require ( File ::build_path ( [ 'view' , 'view.php' ] ) );
		}

		public static function update ( $imma )
		{
			$object = 'utilisateur';
			$view = 'update';

			$pagetitle = 'User update';
			if(is_null ($imma)){
				$pagetitle="User creation";
			}else if(!Session::is_user ($imma)||!Session::is_admin ()){
				$view='list';
				$pagetitle = 'Liste des utilisateurs';
				$tab_v = ModelUser ::selectAll ();

			}
			require ( File ::build_path ( [ 'view' , 'view.php' ] ) );
		}

		public static function updated ( $data )
		{
			$object = 'utilisateur';
			$tab_v = ModelUser ::selectAll ();

			if((Session::is_admin ()||Session::is_user ($data["login"]))&&strcmp ( $data[ "mdp" ] , $data[ "mdp_conf" ] ) == 0){
				unset($data[ "mdp_conf" ]);
				$data[ "mdp" ] = Security ::chiffrer ( $data[ "mdp" ] );
				ModelUser ::update ( $data );
				$view = 'updated';
				$pagetitle = 'User updated';
			}
			else {
				$tab_v = ModelUser ::selectAll ();

				echo "Vous n'êtes pas connecté ou les deux mots de passes que vous avez rentré sont différent !";
				$view = 'list';
				$pagetitle = 'Liste des utilisateurs';
			}


			require ( File ::build_path ( [ 'view' , 'view.php' ] ) );
		}
		public static function created ( $data )
		{
			if(strcmp ( $data[ "mdp" ] , $data[ "mdp_conf" ] ) == 0	&& filter_var ($data["mail"],FILTER_VALIDATE_EMAIL)!==FALSE) {
				unset($data[ "mdp_conf" ]);
				$data[ "mdp" ] = Security ::chiffrer ( $data[ "mdp" ] );
				$data["nonce"] = Security::generateRandomHex ();
				$from="noreply@phptd.yvesdaniel.fr";
				ModelUser ::save ( $data );
				echo mail($data["mail"],
					"Validate your account",
					"Here is a link inorder to validate your account http://phptd.yvesdaniel.fr/index.php?login=".$data["login"]."&nonce=".$data["nonce"]."&controller=utilisateur&action=validate",
					"From:" . $from);
				$view = 'created';
				$pagetitle = 'Liste des utilisateurs';
			}
			else {
				echo "Vous n'êtes pas connecté ou les deux mots de passes que vous avez rentré sont différent !";
				$view = 'list';
				$pagetitle = 'Liste des utilisateurs';
			}
			$object = 'utilisateur';

			$tab_v = ModelUser ::selectAll ();
			require ( File ::build_path ( [ 'view' , 'view.php' ] ) );

		}
		public static function connect ()
		{
			if ( !isset( $_SESSION[ "login" ] ) ) {
				$object = 'utilisateur';
				$view = 'connect';
				$pagetitle = 'Connection à la page utilisateur';
				require ( File ::build_path ( [ 'view' , 'view.php' ] ) );
			}
			else {
				self ::readAll ();
			}
		}
		public static function connected ( $login , $mdp )
		{
			if ( !isset( $_SESSION[ "login" ] )) {
				$g=ModelUser::select ($login);

				if ( ModelUser ::checkPassword ( $login , $mdp )&&is_null ($g->getNonce())) {
					$_SESSION[ "login" ] = $g -> getLogin ();
					$_SESSION[ "admin" ] = $g -> getAdmin ();
					self ::readAll ();
				}
				else {
					echo "Mauvais mot de passe.";
					$object = 'utilisateur';
					$view = 'connect';
					$pagetitle = 'Connection à la page utilisateur';
					require ( File ::build_path ( [ 'view' , 'view.php' ] ) );
				}
			}
			else {
				self ::readAll ();
			}
		}
		public static function disconnect ()
		{
			if ( isset( $_SESSION[ "login" ] ) ) {
				session_unset ();
				session_destroy ();
				setcookie ( session_name () , '' , time () - 1 );
			}
			self ::readAll ();
		}
		public static function validate($login,$nonce){
			if(ModelUser::checkValidity ($login,$nonce)){
				$u=ModelUser::select ($login);
				$data=[
					"login"=>$u->getLogin(),
					"nonce"=>NULL
				];
				ModelUser::update ($data);
				self::readAll ();
			}
			else{
				echo "Wront login/nonce";
				self::readAll ();
			}
		}
	}

?>