<?php
	/*
	* webStorich
	* An ultra-light web page manager for HTML courses 
	*
	* https://github.com/Axolito/webStorich/
	*
	* (c) 2020 Axolito - https://github.com/Axolito
	*
	* license GNU AGPL v3.0
	* [en] https://www.gnu.org/licenses/agpl-3.0.html
	* [fr] https://www.gnu.org/licenses/agpl-3.0.en.html
	*/
?>

<div class="fexplo">
	<table style="width:100%" class="cadrefexplo">
		<tr>
			<th>Identifiant</th>
			<th>Mot de passe</th>
			<th>Niveau</th>
		</tr>
			<?php
				// Create connection
				$conn = mysqli_connect($servername, $username, $password, $dbname);

				// Check connection
				if (!$conn) {
				    die("Connection failed: " . mysqli_connect_error());
				}
				//echo "Connexion à la base de donné établie"."<br>";

				$sql = "SELECT * FROM `user`";
				$result = mysqli_query($conn, $sql);
				$nombre = 0;

				if (mysqli_num_rows($result) > 0) {
				    // output data of each row
				    while($row = mysqli_fetch_assoc($result)) {
				    	if ($nombre%2 == 1){
							echo "<tr class= 'fexplolinei'>";
							echo "<th>".$row["id"]."</th>";
							echo "<th>".$row["mdp"]."</th>";
							echo "<th>".$row["level"]."</th>";
							echo "</tr>";
				    	}
				    	else{
				    		echo "<tr class= 'fexplolined'>";
							echo "<th>".$row["id"]."</th>";
							echo "<th>".$row["mdp"]."</th>";
							echo "<th>".$row["level"]."</th>";
							echo "</tr>";
				    	}
						
						$nombre = $nombre + 1;
				    }
				} else {
				    echo "0 results";
				}

				mysqli_close($conn);
			?>
	</table>
</div>