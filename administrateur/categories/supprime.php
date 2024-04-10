<?php

include "../../include/FUNCTIONS.php";
// echo "ID de la categorie : ".$_GET['idc'];

$id_categorie = $_GET ['idc'];


$conn = connect();

$requette = "DELETE FROM categories WHERE id = '".$id_categorie."'";

$resultat = $conn->query($requette);

if($resultat){
    header('location:liste.php?supp=ok');
}


?>