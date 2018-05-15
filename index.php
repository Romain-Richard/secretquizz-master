<?php
  require_once('database.php');
  session_start();
  $link = mysqli_connect("localhost", "root", "root", "bdd-test");
  if (isset ($_POST['Pseudo']) == 1) {
    $user = $_POST['Pseudo'];
    $user = htmlspecialchars($user);
    $_SESSION["Pseudo"] = $user;
    echo "$user";
    $sql = "INSERT INTO newtable (pseudo) VALUES ('$user')";
    mysqli_query($link, $sql);
  }
?>

<!DOCTYPE html>
  <html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <title>ESD-Quizz</title>
</head>

<body>
  <form class="form" action="question.php" method="post">
    <h1>Identification</h1>
    <p>
      <input class="champs" type="text" name="Pseudo" id="pseudo" placeholder="Pseudo">
    </p>
      <input class="btn" type="submit" value="Jouer">
  </form>
</body>

</html>