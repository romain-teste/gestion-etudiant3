<?php 
require_once("connexion.php");

$code = $_POST['code'];
$nom = $_POST['nom'];
$mail = $_POST['mail'];
$photo_nom = $_FILES ['photo']['name'];
$file_tmp_name = $_FILES['photo']['tmp_name'];
move_uploaded_file($file_tmp_name, "./images/$photo_nom");

$rep = "UPDATE etudiant set nom='$nom', mail='$mail', photo='$photo_nom' WHERE code=$code";

$res = $conn->query($rep);

header("location:affichéUnEtudianKalile.php");

?>