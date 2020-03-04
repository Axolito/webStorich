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
					echo '<p class="plienhub"><a href="singin.php" class="lienhub">Retour</a></p>';
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


					if (!empty($_POST["user"])) {
						$truc = $_POST["user"];
						$sql = "SELECT id, mdp, level FROM user WHERE id='$truc'";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
						    // output data of each row
						    while($row = $result->fetch_assoc()) {
						        //echo $row["id"], $row["mdp"];
						        $user = $row["id"];
						        $mdp = $row["mdp"];
						        $level = $row["level"];
						    }
						} else {
						    //echo "0 results";
						    $user = 0;
						    $mdp = 0;
						    $level = 0;
						}
					}
					$conn->close();

					//var_dump($_SESSION["level"]);

					if ($_SESSION["connecte"] == 1){
						include("fexplo.php");
						
						if ($_SESSION["level"] == 1) {
							include("userexplo.php");
							//die();
							echo '<form action="deco.php" method="post">';
							echo '<button type="submit" class="lienhub" name="deco" value="1">Se déconnecter</button>';
							echo '</form>';
						}
						else{
							echo '<form action="deco.php" method="post">';
							echo '<button type="submit" class="lienhub" name="deco" value="1">Se déconnecter</button>';
							echo '</form>';
						}
					}
					else{
						if (($_POST["mdp"] === $mdp) and ($_POST["user"] === $user)){
							$_SESSION["connecte"] = 1;
							$_SESSION["level"] = $level;
							$_SESSION["user"] = $user;
							include("fexplo.php");

							if ($_SESSION["level"] == 1) {
								include("userexplo.php");
								//die();
								echo '<form action="deco.php" method="post">';
								echo '<button type="submit" class="lienhub" name="deco" value="1">Se déconnecter</button>';
								echo '</form>';
							}
							else{
								echo '<form action="deco.php" method="post">';
								echo '<button type="submit" class="lienhub" name="deco" value="1">Se déconnecter</button>';
								echo '</form>';
							}
						}
						else{
							echo ("<h1>Il y a une erreur !</h1>");
							echo '<p class="plienhub"><a href="singin.php" class="lienhub">Retour</a></p>';
						}

						// header() renvoit sur une autre page
						header('Location: singed.php');
					}
				}
			?>
		</div>

		<?php
			include("barre.html");
		?>
	</body>
</html>