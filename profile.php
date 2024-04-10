<?php


include('include/FUNCTIONS.php');
session_start();
$categories = getAllcategories();

if(!isset($_SESSION['nom'])){ //n'existe pas 
    header("Location:login.php");
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
    <title>Profile</title>
</head>

<body>

    <?php
    // <!-- Debut include -->
    include ("include/header.php");
    // <!-- fin include -->
?>

    <div class="container">
        <h1>Bienvenue <span class="text-primary"><?php echo $_SESSION['nom'];?></span>
            dans votre profile
        </h1>

    </div>


    <?php  include('include/footer.php')?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>

</html>