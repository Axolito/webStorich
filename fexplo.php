<FORM NAME="form1" action="delete.php" method="post">

	<?php
		$d = dir(".");
		while($entry = $d->read()) {
			if ((($entry == ".") or ($entry == ".."))==0){
				echo "<input type='radio' id='file' name='file' value='" . $entry ."'>".$entry."<br>";
				}
			}
		$d->close();
	?>

	<input type="submit" value="Supprimer">
</FORM>


<html>
   <body>
      
      <form action = "upload.php" method = "POST" enctype = "multipart/form-data">
         <input type = "file" name = "upfile" />
         <input type = "submit"/>
			
      </form>
      
   </body>
</html>