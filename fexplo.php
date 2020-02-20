<div class="fexplo">
	<form name="form1" action="delete.php" method="post">

		<div class="cadrefexplo">
			<?php
				$locationfile = './'.$_SESSION["user"].'/';
				$d = dir("./".$_SESSION["user"]."/");
				$nombre = 0;

				while($entry = $d->read()) {
					if ((($entry == ".") or ($entry == ".."))==0){
						if ($nombre%2 == 1){
							//nombre est impair
							echo "<div class= 'fexplolinei'><input type='radio' id='file' name='file' value='" . $entry ."'>"."<a class='filelink' href= '".$locationfile.$entry."'>".$entry."</a></div>";
						}
	     				else{
							//nombre est pair
	     					echo "<div class= 'fexplolined'><input type='radio' id='file' name='file' value='" . $entry ."'>"."<a class='filelink' href= '".$locationfile.$entry."'>".$entry."</a></div>";
						}
					$nombre = $nombre + 1;
					}
				}
				$d->close();
			?>
		</div>

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