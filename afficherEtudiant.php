<?php
require_once("connexion.php");

$sqlSelect = "SELECT CODE, NOM, MAIL, PHOTO FROM etudiant";
$result = mysqli_query($conn, $sqlSelect);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      echo "Code: " . $row["CODE"] . " " . "nom: " . $row["NOM"]. " - email: " . $row["MAIL"]. " " . $row["PHOTO"]. "<br>";
    }
  } else {
    echo "0 results";
}
  
mysqli_close($conn);
