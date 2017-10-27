<?php
	/**
	 * Created by PhpStorm.
	 * ModelUser: yves
	 * Date: 29/09/17
	 * Time: 10:39
	 */
	if ( $v !== FALSE ) {

		echo "<p> Voiture ".htmlspecialchars($v->getImmatriculation())." de marque ".htmlspecialchars($v->getMarque())."  (couleur ".htmlspecialchars($v->getCouleur()).")
    <a href=index.php?controller=voiture&action=delete&".ModelVoiture::getPrimary () ."=". rawurlencode ( $v -> getImmatriculation () ).">Delete</a> 
        <a href=index.php?controller=voiture&action=update&".ModelVoiture::getPrimary () ."=". rawurlencode ( $v -> getImmatriculation () ).">Update</a> 
</p>";
	}
	else{
		require File::build_path (array ('view','voiture','error.php'));
	}
?>