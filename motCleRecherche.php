
<?php
require_once ("verificationOtentification.php");
require_once ("connexion.php");

$nom = $_POST['motCle'];

if (isset($_POST['motCle'])) {
  $sql = "SELECT code, nom, photo FROM etudiant WHERE nom LIKE '%$nom%'";
  $result = $conn->query($sql);
} /*else {
  $sql = "SELECT code, nom, photo FROM etudiant";
  $result = $conn->query($sql);
}

/* if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "code: " . $row["code"]. " - Nom: " . $row["nom"]. "<br>";
  }
} else {
  echo "0 results";
} */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="motCleRecherche.php" method="post">
    <p>Mot clé:</p>
    <input type="text" name="motCle">
    <input type="submit" name="rechercher">
</form>
    <table border="1" width="80%">
        <tr>
            <th>CODE</th><th>NOM</th><th>PHOTO</th>
        </tr>
        <?php while($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo($row['code']) ?></td>
                <td><?php echo($row['nom']) ?></td>
                <td><img max-width = 200px max-height = 200px src="images/<?php echo($row['photo']) ?>"></td>
                <td><a href="supprimerEtudiant.php?code=<?php echo($row['code']) ?>">Supprimer</a></td>
                <td><a href="editerEtudiant.php?code=<?php echo($row['code']) ?>">Modifier</a></td>
            </tr>
          <?php } ?>
    </table>
</body>
</html>