<?php
	echo "<form method=\"get\" action=\"index.php?\">";
	if ( isset($_GET[ModelUser::getPrimary ()]) ) {
		$v = ModelUser ::select ( $_GET[ModelUser::getPrimary ()]);

		echo "<fieldset>
	<legend>Mon formulaire :</legend>
	<p>
	
		<label for=\"login_id\">Login</label> :
		<input type=\"text\" placeholder=\"Ex : daniely\" name=\"login\" id=\"login_id\" value=\"" . $_GET[ModelUser::getPrimary () ] . "\" readonly/>
		<label for=\"nom_id\">Nom</label> :
		<input type=\"text\" placeholder=\"Ex : Daniel\" name=\"nom\" id=\"nom_id\" value=\"" . $v -> getNom () . "\" required/>
		<label for=\"prenom_id\">Prenom</label> :
		<input type=\"text\" placeholder=\"Ex : Yves\" name=\"prenom\" id=\"prenom_id\" value=\"" . $v -> getPrenom () . "\" required/>
		<input type='hidden' name='action' value='updated'>
		<input type='hidden' name='controller' value='utilisateur'>
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
		<label for=\"login_id\">Login</label> :
		<input type=\"text\" placeholder=\"Ex : daniely\" name=\"login\" id=\"login_id\" required/>
		<label for=\"nom_id\">Nom</label> :
		<input type=\"text\" placeholder=\"Ex : Daniel\" name=\"nom\" id=\"nom_id\" required/>
		<label for=\"prenom_id\">Prenom</label> :
		<input type=\"text\" placeholder=\"Ex : Yves\" name=\"prenom\" id=\"prenom_id\" required/>
		<input type='hidden' name='action' value='created'>
		<input type='hidden' name='controller' value='utilisateur'>

	</p>
	<p>
		<input type=\"submit\" value=\"Envoyer\"/>
	</p>
</fieldset>
</form>
";
	}
?>
