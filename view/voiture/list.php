<?php
	// Display of the cars stored in $tab_v
	foreach ( $tab_v as $v ) {
		echo '<p> Voiture d\'immatriculation <a href=\'./index.php?controller=voiture&action=read&'.ModelVoiture::getPrimary () .'=' . rawurlencode ( $v -> getImmatriculation () ) . '\'>' . htmlspecialchars ( $v -> getImmatriculation () ) . '</a>.</p>';
	}
?>
