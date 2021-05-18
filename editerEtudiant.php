<?php
require_once ("verificationOtentification.php");
?>

<?php 
require_once ("connexionPDO.php");

$code = $_GET['code'];

$stmt = $conn-> prepare("SELECT code, nom, mail FROM etudiant WHERE code= :code");
$stmt->bindParam(':code', $code);
$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saisi étudiant</title>
</head>
<body>
    <form action="modifierUnEtudient.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Code:</td>
                <td><input type="text" name="code" value="<?php echo($user['code']) ?>"></td>
            </tr>
            <tr>
                <td>Nom:</td>
                <td><input type="text" name="nom" value="<?php echo($user['nom']) ?>"></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="email" name="email" value="<?php echo($user['mail']) ?>"></td>
            </tr>
            <tr>
                <td>Poto:</td>
                <td><input type="file" id="photo" name="photo" accept="image/png, image/jpeg"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Enregistrer"></td>
            </tr>
            
            
        </table>
    </form>
</body>
</html>