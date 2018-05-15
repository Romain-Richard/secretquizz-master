<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
try
{
   $bdd = new PDO('mysql:host=localhost;dbname=bdd-test;charset=utf8', 'root', 'root'); 
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$link = mysqli_connect("localhost", "root", "root", "bdd-test");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$Prenom = mysqli_real_escape_string($link, $_REQUEST['Prenom']);
$Nom = mysqli_real_escape_string($link, $_REQUEST['Nom']);
$Email = mysqli_real_escape_string($link, $_REQUEST['Email']);
 
// attempt insert query execution
$sql = "INSERT INTO newtable (Prenom, Nom, Email) VALUES ('$Prenom', '$Nom', '$Email')";
// if(mysqli_query($link, $sql)){
//     echo "Prénom au hasard : ";
// } else{
//     echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
//}

$reponse =  $bdd->query('SELECT * FROM newtable ORDER BY RAND() LIMIT 1');
 // while ($donnees = $reponse->fetch()) {
 //      echo $donnees['Prenom'] ;
 //}

// close connection
mysqli_close($link);
?>

<!DOCTYPE html>
  <html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <title>ESD-Quizz</title>
</head>

<body>
	<h1>Bonjour 
		<?php
			echo $_POST['Prenom'] ;
		?>
	</h1>
	<form class="" action="question.php" method="post">
		<input class="btn" type="submit" value="Jouons">
	</form>
</body>

</html>



