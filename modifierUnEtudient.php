<?php 
require_once ("connexionPDO.php");

$code = $_POST['code'];
$nom = $_POST['nom'];
$mail = $_POST['mail'];
$photo_nom = $_FILES ['photo']['name'];
$file_tmp_name = $_FILES['photo']['tmp_name'];
move_uploaded_file($file_tmp_name, "./images/$photo_nom");

$stmt = $conn-> prepare("UPDATE etudiant set nom=:nom, mail=:mail, photo=:photo WHERE code=:code");
$stmt->bindParam(':nom', $nom);
$stmt->bindParam(':mail', $email);
$stmt->bindParam(':photo', $photo_nom);
$stmt->bindParam(':code', $code);
$stmt->execute();

header("location:affichéUnEtudianKalile.php");

?>