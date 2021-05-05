<?php
require_once ("verificationOtentification.php");
require_once ("connexionPDO.php");

$stmt = $conn-> prepare("SELECT code, nom, photo FROM etudiant");
$stmt->execute();

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
    <table border="1" width="80%">
        <tr>
            <th>CODE</th><th>NOM</th><th>PHOTO</th>
        </tr>
        <?php while($user=$stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo($user['code']) ?></td>
                <td><?php echo($user['nom']) ?></td>
                <td><img max-width = 200px max-height = 200px src="images/<?php echo($user['photo']) ?>"></td>
                <?php if($_SESSION['niveau'] == 1) { ?>
                <td><a href="supprimerEtudiant.php?code=<?php echo($user['code']) ?>">Supprimer</a></td>
                <td><a href="editerEtudiant.php?code=<?php echo($user['code']) ?>">Modifier</a></td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
