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

	include("config.php");

	if (!empty($_POST["id"] or $_POST["mdp"] or $_POST["level"])) {

		// affiche le contenu de la session
		var_dump($_SESSION);

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);

		// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}
		//echo "Connexion à la base de donné établie"."<br>";

		$sql = "INSERT INTO `user` (`id`, `mdp`, `level`) VALUES ('".$_POST["id"]."', '".$_POST["mdp"]."', '".$_POST["level"]."');";

		echo "$sql";

		mysqli_query($conn, $sql);

		mkdir($_POST["id"], 0700);
	}


	if (!empty($_POST["superuser"])) {
		if ($_POST["superuser"] == 1) {
			header("Location: index.php");
		}
	}
	else {
		header('Location: singed.php');
	}
?>