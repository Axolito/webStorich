<?php
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
			if ($_SESSION["connecte"] == 1){
				echo "<script type='text/javascript'>";
				echo "window.location.replace('singed.php')";
				echo "</script>";					
				}
			?>

			<h1>Vous devez être connecté pour accéder au hub des tests</h1>

			<div class="formul">
				<form action="singed.php" method="post">
					Identifiant : <br><input type="text" name="user"><br>
					Mot de pass : <br><input type="password" name="mdp"><br>
					<button type="submit" class="lienhub" style="margin-top: 15px;">Se connecter</button>
				</form>
			</div>
		</div>

		<?php
			include("barre.html");
		?>
	</body>
</html>