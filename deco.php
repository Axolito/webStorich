<?php
	session_start();
	echo $_POST["deco"];
	if ($_POST["deco"] == 1){
		$_SESSION["connecte"] = 0;
	}
	echo $_SESSION["connecte"];
	// header() renvoit sur une autre page
    header('Location: index.php');
?>


<!--
<script type="text/javascript">
	window.location.replace("index.php");
</script>

-->