<?php 
require_once ("verificationOtentification.php");
require_once ("connexionPDO.php");

$login = $_POST['login'];
$motDePasse = $_POST['motDePasse'];

$mdpCrypte = md5($motDePasse);


// $sqlLog = "SELECT login, password, niveau FROM user WHERE login = '$login' 
// AND password = '$mdpCrypte'";
// echo $sqlLog;
$stmt = $conn-> prepare("select niveau from user where login = :login and password = :password");
$stmt->bindParam(':login', $login);
$stmt->bindParam(':password', $mdpCrypte);

$stmt->execute();


if ($user=$stmt->fetch(PDO::FETCH_ASSOC)) {
    session_start();
    $_SESSION['niveau']=$user['niveau'];
    header("location:affichéUnEtudianKalile.php");
} else {
    header("location:index.php");
}

