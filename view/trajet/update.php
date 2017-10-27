<?php
	echo "<form method=\"get\" action=\"index.php\">";
	if ( isset( $_GET[ ModelTrajet ::getPrimary () ] ) ) {
		$v = ModelTrajet ::select ( $_GET[ ModelTrajet ::getPrimary () ] );

		echo "<fieldset>
	<legend>Mon formulaire :</legend>
	<p>
	
		<label for=\"id\">ID</label> :
		<input type=\"text\" name=\"id\" id=\"id\" value=\"" . $_GET[ ModelTrajet ::getPrimary () ] . "\" readonly/>
		
		<label for=\"depart_id\">Depart</label> :
		<input type=\"text\" placeholder=\"Ex : France\" name=\"depart\" id=\"depart_id\" value=\"" . $v -> getDepart () . "\" required/>
		
		<label for=\"arrivee_id\">Arrivee</label> :
		<input type=\"text\" placeholder=\"Ex : Suisse\" name=\"arrivee\" id=\"arrivee_id\" value=\"" . $v -> getArrivee () . "\" required/>
		
		<label for=\"date_id\">Date</label> :
		<input type=\"date\" placeholder=\"Ex : 11/01/2017\" name=\"date\" id=\"date_id\" value=\"" . $v -> getDate () . "\" required/>
		
		<label for=\"nbplaces_id\">Nombre de places</label> :
		<input type=\"text\" placeholder=\"Ex : Suisse\" name=\"nbplaces\" id=\"nbplaces_id\" value=\"" . $v -> getNbplaces () . "\" required/>
		
		<label for=\"prix_id\">Prix</label> :
		<input type=\"text\" placeholder=\"Ex : Suisse\" name=\"prix\" id=\"prix_id\" value=\"" . $v -> getPrix () . "\" required/>
		
		<label for=\"conducteur_login_id\">Login du conducteur</label> :
		<input type=\"text\" placeholder=\"Ex : Suisse\" name=\"conducteur_login\" id=\"conducteur_login_id\" value=\"" . $v -> getConducteurLogin () . "\" required/>
		
		
		
		<input type='hidden' name='action' value='updated'>
		<input type='hidden' name='controller' value='trajet'>
	</p>
	<p>
		<input type=\"submit\" value=\"Envoyer\"/>
	</p>
</fieldset>
</form>";
	}
	else {
		echo "
<fieldset>
	<legend>Mon formulaire :</legend>
	<p>
	
		<label for=\"depart_id\">Depart</label> :
		<input type=\"text\" placeholder=\"Ex : France\" name=\"depart\" id=\"depart_id\" required/>
		
		<label for=\"arrivee_id\">Arrivee</label> :
		<input type=\"text\" placeholder=\"Ex : Suisse\" name=\"arrivee\" id=\"arrivee_id\"  required/>
		
		<label for=\"date_id\">Date</label> :
		<input type=\"date\" placeholder=\"Ex : 11/01/2017\" name=\"date\" id=\"date_id\" required/>
		
		<label for=\"nbplaces_id\">Nombre de places</label> :
		<input type=\"text\" placeholder=\"Ex : Suisse\" name=\"nbplaces\" id=\"nbplaces_id\" required/>
		
		<label for=\"prix_id\">Prix</label> :
		<input type=\"text\" placeholder=\"Ex : Suisse\" name=\"prix\" id=\"prix_id\" required/>
		
		<label for=\"conducteur_login_id\">Login du conducteur</label> :
		<input type=\"text\" placeholder=\"Ex : Suisse\" name=\"conducteur_login\" id=\"conducteur_login_id\" required/>
		
		<input type='hidden' name='action' value='created'>
		<input type='hidden' name='controller' value='trajet'>

	</p>
	<p>
		<input type=\"submit\" value=\"Envoyer\"/>
	</p>
</fieldset>
</form>
";
	}
?>
