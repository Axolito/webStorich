<?php
	session_start();

	var_dump($_POST["file"]);

	// affiche le contenu de la session
	var_dump($_SESSION);

	// récupére le chemin du dossier actuel (celui de ce script)
	$path = dirname(__FILE__).'/';

	$locationfile = $path.$_SESSION["user"].'/'.$_POST["file"];

	var_dump($locationfile);

	// test si le dossier existe
	if (!file_exists($locationfile)) {
		var_dump('Introuvable');
		// tue le script
		die();
	}

	if (is_dir($locationfile)) {
		rmdir ($_SESSION["user"]."/".$_POST["file"]);
	}
	else {
		unlink($locationfile);
	}

	// header() renvoit sur une autre page
    //header('Location: singed.php');
?>

<!--
<script type="text/javascript">
	window.location.replace("fexplo.php");
</script>
-->
