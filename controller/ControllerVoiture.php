<?php
	/**
	 * Created by PhpStorm.
	 * ModelUser: yves
	 * Date: 29/09/17
	 * Time: 10:20
	 */
	require_once ( File ::build_path ( explode ( '/' , 'model/ModelVoiture.php' ) ) ); // chargement du modèle
	class ControllerVoiture
	{
		protected static $object;
		public static function readAll ()
		{
			$tab_v = ModelVoiture :: selectAll ();     //appel au modèle pour gerer la BD
			$object = 'voiture';
			$view = 'list';
			$pagetitle = 'Liste des voitures';
			require ( File ::build_path ( [ 'view' , 'view.php' ] ) );  //"redirige" vers la vue

		}

		public static function read ( $immat )
		{
			$v = ModelVoiture ::select ( $immat );
			$object = 'voiture';
			$view = 'detail';
			$pagetitle = 'Détail de la voiture';
			require ( File ::build_path ( [ 'view' , 'view.php' ] ) );  //"redirige" vers la vue
		}

		public static function create ()
		{
			$object = 'voiture';
			$view = 'update';
			$pagetitle = 'Creation de la voiture';
			require ( File ::build_path ( [ 'view' , 'view.php' ] ) );  //"redirige" vers la vue
		}

		public static function created ( $data)
		{
			ModelVoiture::save ($data);
			$tab_v = ModelVoiture ::selectAll ();
			$object = 'voiture';
			$view = 'created';
			$pagetitle = 'Liste des voitures';
			require ( File ::build_path ( [ 'view' , 'view.php' ] ) );
		}

		public static function delete ( $imma )
		{
			ModelVoiture ::delete ( $imma );
			$tab_v = ModelVoiture ::selectAll ();
			$object = 'voiture';
			$view = 'delete';
			$pagetitle = 'Voiture supprimé';
			require ( File ::build_path ( [ 'view' , 'view.php' ] ) );
		}

		public static function err ()
		{

			$object = 'voiture';
			$view = 'error';
			$pagetitle = 'Erreur :(';
			require ( File ::build_path ( [ 'view' , 'view.php' ] ) );

		}

		public static function update ( $imma )
		{
			$object = 'voiture';
			$view = 'update';
			$pagetitle = 'Car update';
			require ( File ::build_path ( [ 'view' , 'view.php' ] ) );
		}

		public static function updated ( $data )
		{
			ModelVoiture ::update ( $data );

			$object = 'voiture';
			$view = 'updated';
			$pagetitle = 'Car updated';
			$tab_v = ModelVoiture ::selectAll ();

			require ( File ::build_path ( [ 'view' , 'view.php' ] ) );
		}
	}

?>