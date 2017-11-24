<?php
	// Display of the cars stored in $tab_v

	foreach ( $tab_v as $k ) {

		echo '<p> Voiture d\'immatriculation <a href=\'./index.php?controller=voiture&action=read&'.ModelVoiture::getPrimary () .'=' . rawurlencode ( $k -> getImmatriculation () ) . '\'>' . htmlspecialchars ( $k -> getImmatriculation () ) . '</a>.</p>';
	}

?>
