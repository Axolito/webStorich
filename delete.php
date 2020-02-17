<?php
	echo $_POST["file"];
	if (is_dir($_POST["file"])) {
		rmdir ($_POST["file"]);
	}
	else {
		unlink($_POST["file"]);
	}

	// header() renvoit sur une autre page
    header('Location: singed.php');
?>

<!--
<script type="text/javascript">
	window.location.replace("fexplo.php");
</script>
-->