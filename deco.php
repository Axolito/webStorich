<?php
	session_start();
	echo $_POST["deco"];
	if ($_POST["deco"] == 1){
		$_SESSION["connecte"] = 0;
	}
	echo $_SESSION["connecte"];
?>

<script type="text/javascript">
	window.location.replace("index.php");
</script>