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
	</head>

	<body>
		<div class="carte">
			<h1>webStorich</h1>
			<p>Un gestionnaire de pages web ultra-léger pour les cours en HTML<br>
				<br>
			</p>
			<img src="illustration.png" class="imgaboutus">
			<p>
				webStorich est un petit projet sans prétention visant à simplifier la gestion de plusieurs petits sites en HTML par les étudiants. La simplicité de webStorich permet de montrer aux élèves son fonctionnement et d'expliquer ce qu'est un logiciel libre.<br>
				<br>
				webStorich est principalement développé par Axel BRUA mais aussi par des contributeurs sur <a href="https://github.com/Axolito/webStorich">GitHub</a>.<br>
				<br>
				webStorich est sous liscence AGPL-3.0 consultable <a href="LICENSE">ici</a>
			</p>
		</div>

		<?php
			include("barre.html");
		?>
	</body>
</html>