<?php
	foreach ( $tab_v as $v ) {
		$login = $v -> getLogin ();
		echo "<p>Login d'utilisateur <a href=./index.php?controller=utilisateur&action=read&" . ModelUser ::getPrimary () . "=" . rawurlencode ( $login ) . ">" . $login . "</a>.  <a href=./index.php?controller=utilisateur&action=delete&" . ModelUser ::getPrimary () . "=" . rawurlencode ( $login ) . ">DELETE</a></p>";
	}
?>
