<?php
    include "include/FUNCTIONS.php";

    $categories = getAllcategories();

    if(isset($_GET['id'])){
        $product = getProductById($_GET['id']);
    }
    session_start();
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.8/sweetalert2.min.css" rel="stylesheet">
    <title>M-SHOP</title>
</head>

<body class="display-flex">
    <!-- debut include  -->
    <?php
        include "include/header.php";
    ?>
    <!-- fin include -->

    <!-- debut produits  -->

    <div class="row col-9 mt-5 ">
        <div class="card col-8 offset-2  ">
            <?php
                if(isset($_GET['msg'])&& $_GET['msg']=='cmd'){
                    print'<div class="alert alert-success">
                    Commande ajoutée avec succés dans le panier.
                    </div>';
                }
            ?>
            <img src="images/<?php echo $product['image'] ?>" class="card-img-top" style="width : 38rem; height:30rem;">
            <div class="card-body  ">
                <h5 class="card-title"><?php echo $product['nom'] ?></h5>
                <p class="card-text"><?php echo $product['description'] ?></p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><?php echo $product['prix'] ?> DH</li>
                <?php
                foreach($categories as $index=>$c){
                if($c['id']== $product['categorie']){
                ?>
                <li class="list-group-item"><?php echo $c['nom'] ?></li>
                <?php
                            }
                        }?>

            </ul>
            <div class="col-12 m-2">
                <form class="d-flex" action="actions/commander.php" method="post">

                    <input type="hidden" value="<?php  echo $product['id']  ?>" name="produit">
                    <input type="number" class="form-control" name="quantite" step="1"
                        placeholder="Quantité du produit...">
                    <button type="submit" class="btn btn-primary commander">Commander</button>

                </form>
            </div>
        </div>

    </div>

    <!-- fin produits  -->


    <!-- debut footer  -->
    <?php  include('include/footer.php')?>
    <!-- fin footer  -->
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.all.min.js"></script>


</html>