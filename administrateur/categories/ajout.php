<?php


session_start();

$createur = $_SESSION['id'];

//1 Recuperation des données 
$nom = $_POST['nom'];
$desc = $_POST['desc'];
$date_creation = date('Y-m-d');

//2 La chaine de connection

include"../../include/FUNCTIONS.php";
$conn = connect();

//3 La creation de la requette d'execution
try{
    $requette = "INSERT INTO `categories`(`nom`, `description`, `createur`, `date_creation`) VALUES ('".$nom."','".$desc."','".$createur."','".$date_creation."')";

//Execution de la requette

$resultat = $conn->query($requette);

if($resultat){
    header('location:liste.php?ajout=ok');
}
    }catch(PDOException $e){
    // echo $e->getcode();
    if($e->getcode() == 23000)
        {
            header('location:liste.php?erreur=duplicate');
        }
    }







?>