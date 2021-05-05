<?php
session_start();
if (!isset($_SESSION['niveau'])){
  header("location:index.php");
  exit;
}
?>
