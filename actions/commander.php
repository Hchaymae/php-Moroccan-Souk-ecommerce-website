<?php
include('../include/FUNCTIONS.php');
session_start();

// if(!isset($_SESSION['email'])){
//     header('location:../login.php');
//     exit();
// }


    
    $conn = connect();
    $visiteur =$_SESSION['id'];
    $id_produit = $_POST['produit'];
    $quantite = $_POST['quantite'];


    $requette = "SELECT prix FROM produits WHERE id = $id_produit";

    $resultat = $conn -> query($requette);

    $product = $resultat->fetch();

    if($resultat){
        $total = $quantite * $product['prix'] ;
    }

    $date = date('Y-m-d');

    $_SESSION['panier']=array($visiteur , 0 , $date ,array());
    $_SESSION['panier'][3] = array( $quantite,$total,$date,$date,$id_produit);

    echo"Panier <br />";
    var_dump($_SESSION['panier']);
    echo"commandes du Panier <br />";
    var_dump($_SESSION['panier'][3]);

//     //? Créaton du panier 

//     $requette_panier = "INSERT INTO panier (visiteur,total,date_creation) VALUES('".$visiteur."','".$total."','".$date."')";

//     $resultat_panier=$conn->query($requette_panier);
    
//     $panier=$conn->lastInsertId();

//     $requette = "INSERT INTO `commande`(`produit`, `quantite`, `panier`, `total`, `date_creation`) VALUES ('".$id_produit."','".$quantite."','".$panier."','".$total."','".$date."')";

//     $resultat_commande = $conn->query($requette);


header('location:../panier.php');





?>