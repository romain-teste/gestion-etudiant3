<?php
require_once ("verificationOtentification.php");
?>

<?php 
require_once ("connexionPDO.php");

$nom = $_POST['nom'];
$email = $_POST['email'];
$photo_nom = $_FILES ['photo']['name'];
$file_tmp_name = $_FILES['photo']['tmp_name'];
move_uploaded_file($file_tmp_name, "./images/$photo_nom");

// $sql = "INSERT INTO etudiant(NOM, MAIL, PHOTO)
// VALUES ('$nom', '$email', '$photo_nom')";

$stmt = $conn-> prepare("INSERT INTO etudiant(NOM, MAIL, PHOTO)
VALUES (:nom, :mail, :photo)");
$stmt->bindParam(':nom', $nom);
$stmt->bindParam(':mail', $email);
$stmt->bindParam(':photo', $photo_nom);
$stmt->execute();

// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }

// $conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <td>Nom :</td>
            <td><?php echo($nom) ?></td>
        </tr>
        <tr>
            <td>Mail :</td>
            <td><?php echo($email) ?></td>
        </tr>
        <tr>
            <td>Photo :</td>
            <td><img src="images/<?php echo($photo_nom) ?>"></td>
        </tr>
    </table>
</body>
</html>
