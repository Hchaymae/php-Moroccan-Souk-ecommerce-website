<?php
session_start();

$id = $_POST['id'];
$quantite=$_POST['quantite'];
$date_modification = date('Y-m-d');

include '../../include/FUNCTIONS.php';

$conn = connect();

if(isset($_POST['valider'])){
    
    $requette = "UPDATE `stock` SET `quantite`='".$quantite."',`date_modification`='".$date_modification."' WHERE `id`='".$id."' ";

    $resultat = $conn->query($requette);
    
    header('location:liste.php?modifie=ok');
}else{
    header('location:liset.php?modifie=no');
}