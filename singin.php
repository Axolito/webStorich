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
session_start();
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
		<div id="carte">
			<?php
				if (!empty($_SESSION["connecte"])) {
					if ($_SESSION["connecte"] == 1){
						/*echo "<script type='text/javascript'>";
						echo "window.location.replace('singed.php')";
						echo "</script>";*/

						header('Location: singed.php');
					}
				}
			?>

			<h1 class="hsanstop">Vous devez être connecté pour accéder a l'interface de gestion</h1>

			<div class="formul">
				<form action="singed.php" method="post">
					Identifiant : <br><input class="text" type="text" name="user"><br>
					Mot de pass : <br><input class="text" type="password" name="mdp"><br>
					<button type="submit" class="lienhub" style="margin-top: 15px;">Se connecter</button>
				</form>
			</div>
		</div>

		<?php
			include("barre.html");
		?>
	</body>
</html>