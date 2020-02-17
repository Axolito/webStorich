<?php
session_start();
?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
		<title>webStorich</title>
		<link rel="icon" type="image/png" href="iconewebStorich.png" />
		<link rel="stylesheet" href="style.css">
	</head>

	<body>
		<div id="carte">
			<?php
				if (((empty($_POST["user"]))or((empty($_POST["mdp"]))))and $_SESSION["connecte"] == 0)
				{
					echo "<h1>Vous ne pouvez pas laisser les champs vide !</h1>";
					echo '<p class="plienhub"><a href="index.php" class="lienhub">Retour</a></p>';
				}
				else
				{
					
					include("config.php");

					// Create connection
					$conn = new mysqli($servername, $username, $password, $dbname);

					// Check connection
					if ($conn->connect_error) {
					    die("Connection failed: " . $conn->connect_error);
					}
					//echo "Connected successfully";

					$truc = $_POST["user"];

					$sql = "SELECT id, mdp FROM user WHERE id='$truc'";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
					    // output data of each row
					    while($row = $result->fetch_assoc()) {
					        //echo $row["id"], $row["mdp"];
					        $user = $row["id"];
					        $mdp = $row["mdp"];
					    }
					} else {
					    //echo "0 results";
					    $user = 0;
					    $mdp = 0;
					}


					if ($_SESSION["connecte"] == 1){
						include("fexplo.php");
					}
					else{
						if (($_POST["mdp"] === $mdp) and ($_POST["user"] === $user)){
							$_SESSION["connecte"] = 1;
							include("fexplo.php");
						}
						else{
							echo ("<h1>Il y a une erreur !</h1>");
							echo '<p class="plienhub"><a href="index.php" class="lienhub">Retour</a></p>';
						}
					}
				}
			?>
		</div>

		<?php
			include("barre.html");
		?>
	</body>
</html>