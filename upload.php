<?php
	if(isset($_FILES['upfile'])){
		$errors= array();
		$file_name = $_FILES['upfile']['name'];
		$file_size = $_FILES['upfile']['size'];
		$file_tmp = $_FILES['upfile']['tmp_name'];
		$file_type = $_FILES['upfile']['type'];

		if($file_size > 2097152) {
			$errors[]='File size must be excately 2 MB';
		}
		
		if(empty($errors)==true) {
			move_uploaded_file($file_tmp,"".$file_name);
			echo "Success";
		}
		else{
			print_r($errors);
		}
	}
	// header() renvoit sur une autre page
    header('Location: singed.php');
?>

<!--
<script type="text/javascript">
	window.location.replace("fexplo.php");
</script>
-->