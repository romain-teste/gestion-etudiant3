<?php 
require_once ("connexion.php");

$code = $_GET['code'];
$sql = "DELETE FROM etudiant WHERE code=$code";

if ($conn->query($sql) !== TRUE){
    echo "Error deleting record: " . $conn->error;
}

$conn->close();

header("location:affichéUnEtudianKalile.php");


