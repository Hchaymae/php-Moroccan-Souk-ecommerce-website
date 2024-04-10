<?php

session_start();


//1 Recuperation des données 
$nom = $_POST['nom'];
$desc = $_POST['desc'];
$prix = $_POST['prix'];
$createur = $_SESSION['id'];
$categorie = $_POST['categorie'];
$date_creation = date('Y-m-d');
$quantite = $_POST['quantite'];

//upload image 
if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    // Tester la taille du fichier
    if ($_FILES['image']['size'] <= 1000000) {
        // Tester si l'extension est autorisée
        
        $infofichier = pathinfo($_FILES['image']['name']);
        $extension_upload = $infofichier['extension'];
        $extension_autorisees  = array('jpg','jpeg','png','JPG','PNG','JPEG');
        $target_dir = "../../images/";
        $target_file = $target_dir.basename($_FILES['image']['name']);

        if(in_array($extension_upload,$extension_autorisees)){
            // stocker le fichier définitivement dans le dossier "image"
            move_uploaded_file($_FILES['image']['tmp_name'],$target_file);
            $image = $_FILES['image']['name'];
        } else {
            echo 'Erreur :Extension non autorisée.';
        }
    } else {
        echo 'Erreur :Fichier est trop gros';
    }
} else {
    echo 'Erreur :Erreur d\'envoi.';
}


//2 La chaine de connection

include"../../include/FUNCTIONS.php";
$conn = connect();


//3 La creation de la requette d'execution
try{

    $requette = "INSERT INTO `produits`(`nom`, `description`,`prix`,`image`,`categorie`,`createur`, `date_creation`) VALUES ('".$nom."','".$desc."','".$prix."','".$image."','".$categorie."','".$createur."','".$date_creation."')";
    //Execution de la requette
    $resultat = $conn->query($requette);
    
    
    if($resultat){
        $idproduit = $conn ->lastInsertId();
        $requette1="INSERT INTO `stock`(`produit`, `quantite`, `createur`, `date_creation`) VALUES ('".$idproduit."','".$quantite."','".$createur."','".$date_creation."')";
        $resultat1 = $conn->query($requette1);
        if($resultat1){
            header('location:liste.php?ajout=ok');
        }
    }
}catch(PDOException $e){
        // echo $e->getcode();
        if($e->getcode() == 23000)
            {
                header('location:liste.php?erreur=duplicate');
            }
}