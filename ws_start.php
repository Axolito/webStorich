<?php
/*
 * webStorich
 * An ultra-light web page manager for HTML courses 
 *
 * https://github.com/Axolito/webStorich/
 *
 * (c) 2020 Axolito - https://github.com/Axolito
 *
 * license GNU AGPL v3.0
 * [en] https://www.gnu.org/licenses/agpl-3.0.html
 * [fr] https://www.gnu.org/licenses/agpl-3.0.en.html
 */
?>
<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
		<title>webStorich</title>
		<link rel="icon" type="image/png" href="iconewebStorich.png" />
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="style_start.css">
	</head>

	<body>
		<div class="carte-start fexplo">
			<h1>Page d'initialisation de webStorich</h1>

			<img src="iconewebStorich.png">

			<div class="divupload">
				<h3 class="titleup">Création du superutilisateur</h3>
				<form name="form4" action = "create_user.php" method = "post">
					<input type="text" id="id" name="id" placeholder="Identifiant">
					<input type="text" id="mdp" name="mdp" placeholder="Mot de passe">
					<input class="nodisplaylevel" type="number" id="level" name="level" placeholder="Niveau" value="1" readonly>
					<input class="nodisplaylevel" type="number" id="superuser" name="superuser" value="1" readonly>
					<input type = "submit" class="lienhub" value="Créer" />	
				</form>
			</div>
		</div>
	</body>
</html>