<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo $pagetitle; ?></title>
	</head>
	<body>
		<header>
			<nav>
				<ul style="list-style-type : none;">
					<li style="display : inline;padding : 0 0.5em;"><a href="index.php">Index</a></li>
					<li style="display : inline;padding : 0 0.5em;">
						<a href="index.php?controller=voiture&action=readAll"> Car home page</a>
					</li>
					<li style="display : inline;padding : 0 0.5em;">
						<a href="index.php?action=readAll&controller=utilisateur">User home page</a>
					</li>
					<li style="display : inline;padding : 0 0.5em;">
						<a href="index.php?action=readAll&controller=trajet">Journey home page</a>
					</li style="display: inline
					;
						padding: 0 0.5em
					;">
					<li style="display : inline;padding : 0 0.5em;">
						<a href="preference.html">Preference</a>
					</li>
					<?php
						if ( !isset( $_SESSION[ "login" ] ) ) {
							echo "<li style=\"display : inline;padding : 0 0.5em;\"><a href=\"index.php?action=connect&controller=utilisateur\">Connect</a></li>";
						}
						else {
							echo "<li style=\"display : inline;padding : 0 0.5em;\"><a href=\"index.php?action=disconnect&controller=utilisateur\">Disconnect</a></li>";
						}
					?>

				</ul>
			</nav>
		</header>
		<?php
			// Si $controleur='voiture' et $view='list',
			// alors $filepath="/chemin_du_site/view/voiture/list.php"
			$filepath = File ::build_path ( [ "view" , $object , "$view.php" ] );
			require $filepath;
		?>
		<footer>
			<p style="border: 1px solid black;text-align:right;padding-right:1em;">
				Site de covoiturage de DANIEL Yves
			</p>
		</footer>
	</body>
</html>