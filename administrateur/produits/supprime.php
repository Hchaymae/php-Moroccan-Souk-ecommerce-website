<?php

include "../../include/FUNCTIONS.php";
// echo "ID de la categorie : ".$_GET['idc'];

$id_produit = $_GET ['idc'];


$conn = connect();

$requette = "DELETE FROM `produits` WHERE id = '".$id_produit."'";

$resultat = $conn->query($requette);

if($resultat){
    header('location:liste.php?supp=ok');
}


?>