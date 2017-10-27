<?php
	/**
	 * Created by PhpStorm.
	 * User: yves
	 * Date: 07/10/17
	 * Time: 12:54
	 */
	if ( $v !== FALSE ) {

		echo "<p>ID:" . $v -> getId () . "
<br>Conducteur: " . $v -> getConducteurLogin () . "
<br>Trajet:" . $v -> getDepart () . "->" . $v -> getArrivee () . "
<br>Date: " . $v -> getDate () . "
<br>Prix:" . $v -> getPrix () . "
<br>Nombre de places:" . $v -> getNbplaces () . "
<br>Passagers:</br>";
		$tabPass=$v->getAllPassengers();
		if(count($tabPass)==0){
			echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspNo values<br>";
		}
		foreach ($tabPass as $k=>$value){
			echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$value[0]." ".$value[1]."<br>";
		}
		echo "<a href=index.php?controller=trajet&action=update&" . ModelTrajet ::getPrimary () . "=" . rawurlencode ( $v -> getId () ) . ">Update</a> </p>";
	} else {
		require File ::build_path ( [ 'view' , 'utilisateur' , 'error.php' ] );
	}
?>