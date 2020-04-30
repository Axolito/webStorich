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

//include("config.php");


if (!file_exists("config.php")) {
    $is_install = 1;
}
else{
	$is_install = 0;
}





if (empty($_POST["id"])) {
	$db_iscreate = 0;
}

if (!empty($_POST["id"])) {

	$servername = $_POST["address"];
	$username = $_POST["id"];
	$password = $_POST["mdp"];


	if (!empty($_POST["create_db"])) {
		if ($_POST["create_db"] == 1) {

			// Create connection
			$conn = mysqli_connect($servername, $username, $password);
			$sql = "CREATE DATABASE webstorich";

			mysqli_query($conn, $sql);
			mysqli_close($conn);
		}
	}

	$conn = mysqli_connect($servername, $username, $password, "webstorich");
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	else {

		$config_file = fopen("config.php", "w");
		$txt = "<?php\n";
		fwrite($config_file, $txt);

		$txt = "$"."servername = '" . $servername . "';\n";
		fwrite($config_file, $txt);

		$txt = "$"."username = '" . $username . "';\n";
		fwrite($config_file, $txt);

		$txt = "$"."password = '" . $password . "';\n";
		fwrite($config_file, $txt);

		$txt = "$"."dbname = 'webstorich';\n";
		fwrite($config_file, $txt);


		$txt = "?>";
		fwrite($config_file, $txt);

		fclose($config_file);

		// Create connection
		$conn = mysqli_connect($servername, $username, $password);
		// sql to create table
		$sql = "CREATE TABLE `webstorich`.`user` ( `id` TEXT NOT NULL , `mdp` TEXT NOT NULL , `level` INT NOT NULL ) ENGINE = InnoDB";
		mysqli_query($conn, $sql);

		mysqli_close($conn);
		//echo "coucou";

		$db_iscreate = 1;

	}
}

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
			<h1>Page d'installation de webStorich</h1>

			<img src="iconewebStorich.png">

			<?php if ($is_install == 0): ?>

				<h2>webStorich est déjà installé !</h2>

			<?php elseif ($is_install == 1): ?>

				<?php if ($db_iscreate == 0): ?>

					<div class="divupload">
						<h3 class="titleup">Paramètres de la bese de données</h3>
						<form name="form5" action = "install.php" method = "post">
							<input type="checkbox" id="create_db" name="create_db" value="1">
							<label for="create_db"> Créer automatiquement la base de données</label><br>
							<p>Si cette case est décoché, assurez vous que vous avez bien créer un base de donnée apelé "webstorich"</p>

							<input type="text" id="address" name="address" placeholder="Adresse de la DB" class="install_zdt" required><br>
							<input type="text" id="id" name="id" placeholder="Identifiant SQL" class="install_zdt" required><br>
							<input type="text" id="mdp" name="mdp" placeholder="Mot de passe SQL" class="install_zdt"><br>

							<input type = "submit" class="lienhub" value="Installer" />
						</form>
					</div>









				<?php elseif ($db_iscreate == 1): ?>

					<div class="divupload">
						<h3 class="titleup">Création du superutilisateur</h3>
						<form name="form4" action = "create_user.php" method = "post">
							<input type="text" id="id" name="id" placeholder="Identifiant" required>
							<input type="text" id="mdp" name="mdp" placeholder="Mot de passe" required>
							<input class="nodisplaylevel" type="number" id="level" name="level" placeholder="Niveau" value="1" readonly>
							<input class="nodisplaylevel" type="number" id="superuser" name="superuser" value="1" readonly>
							<input type = "submit" class="lienhub" value="Créer" />	
						</form>
					</div>
				<?php endif; ?>

			<?php endif; ?>

		</div>
	</body>
</html>