<?php

    session_start();
    include "include/FUNCTIONS.php";
    $categories = getAllcategories();

    if(!empty($_POST)){ //Button search clicked
        // echo "Button Search clicked";
        // echo $_POST['search'];
        $products = SearchProducts($_POST['search']);
    }else{
        $products = getAllproducts();
    }
    


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <title>M-SHOP</title>
</head>

<body>
    <!-- debut include  -->
    <?php
        include "include/header.php";
    ?>
    <!-- fin include -->

    <!-- debut produits  -->

    <div class="row col-12 mt-5 p-5">
        <h1>Panier Utilisateur</h1>
        <button class="btn btn-success" style="width:100px;">Valider</button>
    </div>
    <!-- fin produits  -->




    <!-- debut footer  -->
    <?php  include('include/footer.php')?>
    <!-- fin footer  -->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>

</html>