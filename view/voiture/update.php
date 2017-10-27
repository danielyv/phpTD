<?php
	echo "<form method=\"get\" action=\"index.php?\">";
	if ( isset($_GET[ModelVoiture::getPrimary () ]) ) {
		$v = ModelVoiture ::select ( $_GET[ModelVoiture::getPrimary () ] );

		echo "<fieldset>
	<legend>Mon formulaire :</legend>
	<p>
	
		<label for=\"immat_id\">Immatriculation</label> :
		<input type=\"text\" placeholder=\"Ex : 256AB34\" name=\"immatriculation\" id=\"immat_id\" value=\"" . $_GET[ ModelVoiture::getPrimary () ] . "\" readonly required/>
		<label for=\"marque_id\">Marque</label> :
		<input type=\"text\" placeholder=\"Ex : Renault\" name=\"marque\" id=\"marque_id\" value=\"" . $v -> getMarque () . "\" required/>
		<label for=\"couleur_id\">Couleur</label> :
		<input type=\"text\" placeholder=\"Ex : Noir\" name=\"couleur\" id=\"couleur_id\" value=\"" . $v -> getCouleur () . "\" required/>
		<input type='hidden' name='action' value='updated'>
		<input type='hidden' name='controller' value='voiture'>
	</p>
	<p>
		<input type=\"submit\" value=\"Envoyer\"/>
	</p>
</fieldset>
</form>";
	} else {
		echo "
<fieldset>
	<legend>Mon formulaire :</legend>
	<p>
		<label for=\"immat_id\">Immatriculation</label> :
		<input type=\"text\" placeholder=\"Ex : 256AB34\" name=\"immatriculation\" id=\"immat_id\" required/>
		<label for=\"marque_id\">Marque</label> :
		<input type=\"text\" placeholder=\"Ex : Renault\" name=\"marque\" id=\"marque_id\" required/>
		<label for=\"couleur_id\">Couleur</label> :
		<input type=\"text\" placeholder=\"Ex : Noir\" name=\"couleur\" id=\"couleur_id\" required/>
		<input type='hidden' name='action' value='created'>
		<input type='hidden' name='controller' value='voiture'>

	</p>
	<p>
		<input type=\"submit\" value=\"Envoyer\"/>
	</p>
</fieldset>
</form>
";
	}
?>
