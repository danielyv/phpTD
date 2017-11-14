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
			$v=FALSE;
			if(isset($_SESSION["login"])){
				$v=$_SESSION["login"];
			}
			$object = 'utilisateur';
			$view = 'list';
			$pagetitle = 'Liste des utilisateurs';
			require ( File ::build_path ( [ 'view' , 'view.php' ] ) );  //"redirige" vers la vue

		}

		public static function read ( $login )
		{
			$v = ModelUser ::select ( $login );
			$_SESSION['login']=$v;
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
			require ( File ::build_path ( [ 'view' , 'view.php' ] ) );
		}

		public static function updated ( $data )
		{
			ModelUser ::update ( $data );

			$object = 'utilisateur';
			$view = 'updated';
			$pagetitle = 'User updated';
			$tab_v = ModelUser ::selectAll ();

			require ( File ::build_path ( [ 'view' , 'view.php' ] ) );
		}
		public static function created ( $data )
		{
			ModelUser::save ($data);
			$tab_v = ModelUser ::selectAll ();
			$object = 'utilisateur';
			$view = 'created';
			$pagetitle = 'Liste des utilisateurs';
			require ( File ::build_path ( [ 'view' , 'view.php' ] ) );
		}
	}

?>