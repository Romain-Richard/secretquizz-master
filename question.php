<?php 
  require_once('database.php');
  require('session.php');
  // $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_BASE); 
  // $sql = "SELECT * FROM bdd-test";
  // $result = mysqli_query($conn, $sql);
  // $res = mysqli_fetch_array($result); // revoir cette ligne
  // echo $res[2];
  // $Question= mysqli_real_escape_string($link, $_REQUEST['funfact']);
  // $question = "INSERT INTO Questions (funfact, reponse, personA, personB) VALUES ('$Question')";
  // mysqli_close($conn);

  $link = mysqli_connect("localhost", "root", "root", "bdd-test");
  $sql = "SELECT * FROM bdd-test";

  if($link === false){
    die("Impossible de se connecter" . mysqli_connect_error());
  }

  $first_name = mysqli_real_escape_string($link, $_REQUEST['first_name']);
  $last_name = mysqli_real_escape_string($link, $_REQUEST['last_name']);
  $email = mysqli_real_escape_string($link, $_REQUEST['email']);
   
  $sql = "INSERT INTO tabletest (first_name, last_name, email) VALUES ('$first_name', '$last_name', '$email')";
  // $reponse =  $bdd->query('SELECT * FROM tabletest ORDER BY RAND() LIMIT 1');
  //  while ($donnees = $reponse->fetch()) {
  //       echo $donnees['first_name'] ;
  //  }

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
      echo $_SESSION['first_name'] = $_POST['first_name'] ;
    ?>
  </h1>

  <h1 class="question">Question ici</h1>

  <form class="answers" action="insert.php" method="post">
    <div class="answers">
      <p>
        <input class="btn" type="submit" name="reponse" id="reponse" value="choix 1">
      </p>
      <p>
        <input class="btn" type="submit" name="personA" id="personA" value="choix 2">
      </p>
      <p>
        <input class="btn" type="submit" name="personA" id="personA" value="choix 3">
      </p>
    </div>
  </form>

</body>
</html>