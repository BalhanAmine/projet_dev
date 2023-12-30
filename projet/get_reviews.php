<?php

include('fonction.php');

connexion();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $comment = $_POST["comment"];
    $rating = $_POST["rating"];

   
    $insertSql = "INSERT INTO reviews (username, comment, rating) VALUES (:username, :comment, :rating)";
    $stmt = $bdd->prepare($insertSql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':comment', $comment);
    $stmt->bindParam(':rating', $rating);

   
    $stmt->execute();


}


?>