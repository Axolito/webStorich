<div class="fexplo">
	<form name="form1" action="delete.php" method="post">

		<?php
			$locationfile = './'.$_SESSION["user"].'/';
			$d = dir("./".$_SESSION["user"]."/");
			while($entry = $d->read()) {
				if ((($entry == ".") or ($entry == ".."))==0){
					echo "<input type='radio' id='file' name='file' value='" . $entry ."'>"."<a class='filelink' href= '".$locationfile.$entry."'>".$entry."</a>"."<br>";
					}
				}
			$d->close();
		?>

		<input type="submit" value="Supprimer" class="lienhub margetop">
	</form>



	<div class="divupload">
		<h3 class="titleup">Upload de fichier</h3>
		<form action = "upload.php" method = "POST" enctype = "multipart/form-data">
			<input type = "file" name = "upfile"/>
			<input type = "submit" class="lienhub" value="Uploader" />	
		</form>
	</div>
		
</div>