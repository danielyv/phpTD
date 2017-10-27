<?php
	foreach ( $tab_v as $v ) {
		$primary=ModelTrajet ::getPrimary ();
		$id=$v -> getId ();
		$depart=$v -> getDepart ();
		$arrivee=$v -> getArrivee ();
		$idEncode=rawurlencode ( $id);
		$date=$v -> getDate ();
		echo <<< EOT
 			<p>
 			IDtrajet 
 			<a href=./index.php?controller=trajet&action=read&$primary=$idEncode>$id</a>
			$depart -> $arrivee  at $date
			<a href=./index.php?controller=trajet&action=delete&$primary=$idEncode>DELETE</a>
			</p>
EOT;
	}
?>
