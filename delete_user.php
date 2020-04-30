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

	if (!empty($_POST["userdelete"])) {

		echo "test";
		echo $_SESSION["user"];
		echo $_POST["userdelete"];

		if (!($_SESSION["user"]==$_POST["userdelete"])) {

			var_dump($_POST["userdelete"]);

			// affiche le contenu de la session
			var_dump($_SESSION);

			// Create connection
			$conn = mysqli_connect($servername, $username, $password, $dbname);

			// Check connection
			if (!$conn) {
			    die("Connection failed: " . mysqli_connect_error());
			}
			//echo "Connexion à la base de donné établie"."<br>";

			$sql = "DELETE FROM `user` WHERE `id` = '".$_POST["userdelete"]."'";

			echo "$sql";

			mysqli_query($conn, $sql);

			mysqli_close($conn);

			rrmdir($_POST["userdelete"]);
		}		
	}
	// header() renvoit sur une autre page
	header('Location: singed.php');

		 // When the directory is not empty:
	function rrmdir($dir) {
		if (is_dir($dir)) {
	    	$objects = scandir($dir);
	    	foreach ($objects as $object) {
	    	if ($object != "." && $object != "..") {
	     		if (filetype($dir."/".$object) == "dir") rmdir($dir."/".$object); else unlink($dir."/".$object);
	    	}
		}
		reset($objects);
		rmdir($dir);
		}
	}
?>