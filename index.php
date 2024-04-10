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

    <div class="row col-12 mt-5">
        <?php
            foreach($products as $product){
                print '
                <div class="col-3 mb-4 mt-2">
                    <div class="card" style="width: 18rem; height: 28rem;">
                        <img src="images/'.$product['image'].'" class="card-img-top"  style="width:17.9rem; height:15rem;">
                        <div class="card-body">
                            <h5 class="card-title">'.$product['nom'].'</h5>
                            <p class="card-text">'.$product['description'].'</p> 
                            <a href="produit.php?id='.$product['id'].'" class="btn btn-primary">Afiicher Plus</a>
                        </div>
                    </div>
                </div>' ;
            
            }
        ?>
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