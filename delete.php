<?php
	/*echo $_POST["file"];
	$locationfile = "./".$_SESSION["user"]."/".$_POST["file"];
	echo $locationfile;
	echo $d;
*/

	session_start();

	var_dump($_POST["file"]);

	// récupére le chemin du dossier actuel (celui de ce script)
	$path = dirname(__FILE__).'/';

	// affiche le contenu de la session
	var_dump($_SESSION);

	$locationfile = './'.$_SESSION["user"].'/'.$_POST["file"];

	var_dump($locationfile);

	// test si le dossier existe
	if (!file_exists($locationfile)) {
		var_dump('Introuvable');
		// tue le script
		die();
	}

	if (is_dir($_SESSION["user"]."/".$_POST["file"])) {
		rmdir ($_SESSION["user"]."/".$_POST["file"]);
	}
	else {
		unlink($_SESSION["user"]."/".$_POST["file"]);
	}

	// header() renvoit sur une autre page
    header('Location: singed.php');
?>

<!--
<script type="text/javascript">
	window.location.replace("fexplo.php");
</script>
-->
