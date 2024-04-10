<?php

session_start();





//1 Recuperation des données 
$nom = $_POST['nom'];
$desc = $_POST['desc'];
$date_modification = date('Y-m-d');
$id = $_POST['id'];

//2 La chaine de connection

include"../../include/FUNCTIONS.php";
$conn = connect();

//3 La creation de la requette d'execution

$requette = "UPDATE `categories` SET `nom`='".$nom."',`description`='".$desc."',`date_modification`='".$date_modification."' WHERE `id`='".$id."' ";
//Execution de la requette

$resultat = $conn->query($requette);

if($resultat){
    header('location:liste.php?modifie=ok');
}else{
    echo 'Erreur : Modification impossible';
}








?>