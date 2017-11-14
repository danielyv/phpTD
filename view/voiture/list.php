<?php
	// Display of the cars stored in $tab_v

	if($v !== FALSE ){
		echo "Dernière voiture vue";
		require File ::build_path ( [ "view" , "voiture" , "detail.php" ]);
		setcookie ("immatriculation"," ",time()-1);

		echo "<br>";
	}
	else{
		echo "<p>Il n'y a pas de cookie login</p>";
	}
	foreach ( $tab_v as $k ) {
		echo '<p> Voiture d\'immatriculation <a href=\'./index.php?controller=voiture&action=read&'.ModelVoiture::getPrimary () .'=' . rawurlencode ( $k -> getImmatriculation () ) . '\'>' . htmlspecialchars ( $k -> getImmatriculation () ) . '</a>.</p>';
	}
?>
