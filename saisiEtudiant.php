<?php
require_once ("verificationOtentification.php");
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
    <form action="ajoutEtudiant.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Nom:</td>
                <td><input type="text" name="nom"></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="email" name="email"></td>
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