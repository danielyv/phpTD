<?php
	/**
	 * Created by PhpStorm.
	 * User: yves
	 * Date: 07/10/17
	 * Time: 12:54
	 */

	if ( $v !== FALSE ) {

		echo "<p>Nom:".$v->getNom()."<br> Prenom:".$v->getPrenom()."<br> Login:".$v->getLogin()."
		<br>";
		if(Session::is_user ($v->getLogin())){
			echo "<a href=index.php?controller=utilisateur&action=update&".ModelUser::getPrimary ()."=". rawurlencode ( $v -> getLogin () ).">Update</a> </p>";
		}
	}
	else{
		require File::build_path (array ('view','utilisateur','error.php'));
	}
?>