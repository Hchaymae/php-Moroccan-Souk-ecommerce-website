<?php
    session_start();
    include "../../include/FUNCTIONS.php";
    
    if (isset($_POST["submitphoto"])) {
        $image =  $_FILES['image']['name'];
        
        $conn = connect();
        $requete = "UPDATE `produits` SET `image`='".$image."' WHERE id = '".$_GET['id']."'";
        $resultat = $conn -> query($requete);
    
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            if ($_FILES['image']['size'] <= 1000000) {
                $infosfichier = pathinfo($_FILES['image']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg','JPG', 'png','PNG','JPEG', 'jpeg');
                if (in_array($extension_upload, $extensions_autorisees)) {
                    move_uploaded_file($_FILES['image']['tmp_name'], '../../images/' . basename($_FILES['image']['name']));
                    echo "L'image a bien été enregistrée !<br>";
                } else {
                    echo "Erreur :Extension non autorisée.<br>";
                }
            } else {
                echo "le fichier image est trop gros<br>";
            }
        } else {
            echo "Erreur  d'envoi de l'image<br>";
        }
        unlink($_SESSION['image']);
        $_SESSION["image"] = $_FILES["image"]["name"];
        header("location:modifierphoto.php?msg=ok");
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <title>Photo</title>
</head>

<body>
    <?php
        include('../../include/header.php');
        if(isset($_GET['msg']) && $_GET['msg'] == 'ok'){
            print'<div class="alert alert-success">
                Votre image a bien été modifiée
            </div>';
    }
    ?>

    <div class="row">
        <div class="mx-auto col-10 col-md-8 col-lg-6">
            <h1 id="description">Modifier votre photo</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="" class="form-label">Photo</label>
                    <input type="file" class="form-control" name="image" required>
                </div>
                <button type="submit" class="btn btn-primary" name="submitphoto">Submit</button>
                <input type="reset" value="annuler" name="reset" class="btn btn-danger"><br><br>
                <a href="liste.php" class="btn btn-primary">Retour à Profile</a>
            </form>
        </div>
    </div>

</body>

</html>