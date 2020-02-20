<div class="fexplo">
	<div class="cadrefexplo">
		<table style="width:100%">
			<tr>
				<th>Identifiant</th>
				<th>Mot de passe</th>
				<th>Niveau</th>
			</tr>
				<?php
					include 'config.php';
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
</div>