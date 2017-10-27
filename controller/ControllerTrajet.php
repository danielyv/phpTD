<?php
	/**
	 * Created by PhpStorm.
	 * User: yves
	 * Date: 13/10/17
	 * Time: 09:36
	 */
	require_once ( File ::build_path ( [ "model" , "ModelTrajet.php" ] ) );

	class ControllerTrajet

	{

		protected static $object;

		public static function readAll ()
		{
			$tab_v = ModelTrajet ::selectAll ();     //appel au modèle pour gerer la BD
			$object = 'trajet';
			$view = 'list';
			$pagetitle = 'Liste des trajets';
			require ( File ::build_path ( [ 'view' , 'view.php' ] ) );  //"redirige" vers la vue

		}

		public static function read ( $login )
		{
			$v = ModelTrajet ::select ( $login );
			$object = 'trajet';
			$view = 'detail';
			$pagetitle = 'Détail du trajet.';
			require ( File ::build_path ( [ 'view' , 'view.php' ] ) );  //"redirige" vers la vue
		}

		public static function delete ( $login )
		{
			ModelTrajet ::delete ( $login );
			$tab_v = ModelTrajet ::selectAll ();

			$object = 'trajet';
			$view = 'delete';
			$pagetitle = 'Trajet supprimé';
			require ( File ::build_path ( [ 'view' , 'view.php' ] ) );
		}

		public static function update ( $imma )
		{
			$object = 'trajet';
			$view = 'update';
			$pagetitle = 'Trajet update';
			require ( File ::build_path ( [ 'view' , 'view.php' ] ) );
		}

		public static function updated ( $data )
		{
			ModelTrajet ::update ( $data );

			$object = 'trajet';
			$view = 'updated';
			$pagetitle = 'Trajet updated';
			$tab_v = ModelTrajet ::selectAll ();

			require ( File ::build_path ( [ 'view' , 'view.php' ] ) );
		}

		public static function created ( $data )
		{
			ModelTrajet ::save ( $data );
			$tab_v = ModelTrajet ::selectAll ();
			$object = 'trajet';
			$view = 'created';
			$pagetitle = 'Liste des trajets';
			require ( File ::build_path ( [ 'view' , 'view.php' ] ) );
		}
	}