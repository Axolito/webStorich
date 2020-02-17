<?php
	echo $_POST["file"];
	$locationfile = "./"+$_SESSION["user"]+"/".$_POST["file"];
	echo $locationfile;
	echo $d;
	if (is_dir($_SESSION["user"]."/".$_POST["file"])) {
		rmdir ($_SESSION["user"]."/".$_POST["file"]);
	}
	else {
		unlink($_SESSION["user"]."/".$_POST["file"]);
	}

	// header() renvoit sur une autre page
    //header('Location: singed.php');
?>

<!--
<script type="text/javascript">
	window.location.replace("fexplo.php");
</script>
-->