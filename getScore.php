<?php

//Connexion a la base
require_once 'configuration_bdd.php';
$connexion = new Database();
$connexion = $connexion->dataConnection();

$sql = "UPDATE `users` SET `score`= :score WHERE `user_id`= :id;";

$stmt = $connexion->prepare($sql);
$stmt->bindValue(':id', $_POST['id']);
$stmt->bindValue(':score', $_POST['score']);
$stmt->execute();