<?php

include '../../include/FUNCTIONS.php';
session_start();

$id = $_GET['id'];

    
    $conn = connect();

    $requette = "UPDATE `visiteur` SET `etat`='".$id."'";

    $resultat = $conn->query($requette);

    if($resultat){
        header('location:liste.php?valid=ok');
    }else{
        header('location:liste.php?valid=no');
}