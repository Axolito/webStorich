<div class="fexplo">
	<form name="form1" action="delete.php" method="post">

		<?php
			$d = dir("./".$_SESSION["user"]."/");
			while($entry = $d->read()) {
				if ((($entry == ".") or ($entry == ".."))==0){
					echo "<input type='radio' id='file' name='file' value='" . $entry ."'>".$entry."<br>";
					}
				}
			$d->close();
		?>

		<input type="submit" value="Supprimer" class="lienhub">
	</form>

	      
	<form action = "upload.php" method = "POST" enctype = "multipart/form-data">
		<input type = "file" name = "upfile"/>
		<input type = "submit" class="lienhub"/>	
	</form>
</div>

